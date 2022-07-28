package com.dataorchestration.service;


import com.spire.pdf.FileFormat;
import com.spire.pdf.PdfDocument;

import com.dataorchestration.models.UsersMaster;
import com.spire.pdf.conversion.XlsxLineLayoutOptions;
import org.apache.tomcat.util.http.fileupload.FileUtils;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Repository;
import org.springframework.web.multipart.MultipartFile;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.*;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;
import java.util.concurrent.atomic.AtomicReference;


@Repository
public class dataOrchesTrationImp implements  dataOrchesTration{



    @Value("${spring.operations.csv.datafolder}")
    private String csvFilesFolder;
    @Override
    public List<UsersMaster> uploadAdnConvertCsvFile(HttpServletRequest filePath, MultipartFile files) throws IOException {

        //--- Create Folder if not exist ------
        File csvFolder = new File(csvFilesFolder);
        if (!csvFolder.exists()) {csvFolder.mkdir();}

        //--- Will clear all old existing file
        FileUtils.cleanDirectory(csvFolder);



        List<UsersMaster> listDataMaster = null;
        // --------- This Part of code Will Loop For Multiple File and Save on the local Folder

            byte[] bytes;
            try {
                bytes = files.getBytes();
                Path inputFilepath = Paths.get(csvFolder + "/"+ files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", ""));
                String fileNameExt=files.getOriginalFilename().substring(files.getOriginalFilename().length() - 3);
                if(fileNameExt.equalsIgnoreCase("csv")){
                    try {
                        Files.write(inputFilepath, bytes);
                    } catch (IOException e) {e.printStackTrace();}
                    System.out.println("Upload is done please do the read and change Data..");
                    listDataMaster= readUploadedCsvFileAndAnnonmize(inputFilepath.toString());

                }
            } catch (IOException e ) {e.printStackTrace();}

        //------- End Of loop ---------

        return listDataMaster;
    }



    @Value("${spring.operations.pdf.datafolder}")
    private String pdfFilesFolder;
    @Override
    public String uploadAdnConvertPdfFileToExcel(HttpServletResponse resp, MultipartFile files) throws IOException {

        //--- Create Folder if not exist ------
        File pdfFolder = new File(pdfFilesFolder);
        if (!pdfFolder.exists()) {pdfFolder.mkdir();}

        //--- Will clear all old existing file
        FileUtils.cleanDirectory(pdfFolder);

        String outputFileName = files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|-]", "");
        outputFileName = outputFileName.substring(0, outputFileName.length()-3)+"xlsx";


        String statusUpdate = "Conversion Not Done !!!";
        // --------- This Part of code Will Loop For Multiple File and Save on the local Folder

        byte[] bytes;
        try {
            bytes = files.getBytes();
            Path inputFilepath = Paths.get(pdfFolder + File.separator+ files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", ""));
            String fileNameExt=files.getOriginalFilename().substring(files.getOriginalFilename().length() - 3);
            if(fileNameExt.equalsIgnoreCase("pdf")){
                try {
                    Files.write(inputFilepath, bytes);
                } catch (IOException e) {e.printStackTrace();}

                //--- THis part will convert PDF to Excel and save on /pdf folder
                PdfDocument pdf = new PdfDocument();
                pdf.loadFromFile(String.valueOf(inputFilepath));
                pdf.getConvertOptions().setPdfToXlsxOptions(new XlsxLineLayoutOptions(false,true,true));
                pdf.saveToFile(pdfFilesFolder+File.separator+outputFileName, FileFormat.XLSX);


                statusUpdate = outputFileName;

            } // End of If --

        } catch (IOException e ) {
            e.printStackTrace();
            statusUpdate =e.toString();
            return statusUpdate;
        }



        return statusUpdate;
    }
















    //---- This method will read csvfile uploaded
    private List<UsersMaster> readUploadedCsvFileAndAnnonmize(String csvFileAbsolutePath) {

        List<UsersMaster> listUserMaster =  new ArrayList<UsersMaster>();

        try {
            final String delimiter = ";";
            File file = new File(csvFileAbsolutePath);
            FileReader frObject = new FileReader(file);
            BufferedReader brObject = new BufferedReader(frObject);
            String line = "";
            String[] tempArr;
            while ((line = brObject.readLine()) != null) {
                tempArr = line.split(delimiter);
                //--Create UserMaster obj with the data and adding to the List
                listUserMaster.add(new UsersMaster(replaceLastThree(tempArr[0]), replaceLastThree(tempArr[1]), replaceLastThree(tempArr[2]),
                        replaceLastThree(tempArr[3]), replaceLastThree(tempArr[4])));
              }
            brObject.close();
            frObject.close();
        } catch (IOException ioe) { ioe.printStackTrace(); }

        return listUserMaster;
    }


    private String replaceLastThree(String inputData){
        int length = inputData.length();
        String outputrawData = inputData;
        if (length > 4) {outputrawData = inputData.substring(0, length - 4) + "xxxx";}
        if (length < 4) {outputrawData = inputData.substring(0, length - 2) + "xx";}
        if (inputData.contains("@")) {outputrawData = "xxxx" + inputData.substring(4);}
        return outputrawData;
    }




    //---------- This will download / view file -----
    public void viewDownloadDocumentInBrowser(HttpServletResponse res, String fileName, String documentAbsolutePath, String operation) throws IOException {

        res.setContentType("application/octet-stream");
        operation= "DOWNLOAD";
        PrintWriter out = res.getWriter();

        if (operation.equalsIgnoreCase("VIEW")) {
            res.setHeader("Content-Disposition", "inline;filename=\"" + fileName.trim() + "\"");    // View in new windows
        }

        if (operation.equalsIgnoreCase("DOWNLOAD")) {
            res.setHeader("Content-Disposition", "attachment; filename=\"" + fileName.trim() + "\"");    // Download
        }

        FileInputStream fileInputStream = new FileInputStream(documentAbsolutePath);

        int i;
        while ((i = fileInputStream.read()) != -1) {
            out.write(i);
        }

        fileInputStream.close();
        out.close();

    }







}
