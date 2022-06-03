package com.dataorchestration.service;

import com.dataorchestration.models.UsersMaster;
import org.apache.tomcat.util.http.fileupload.FileUtils;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Repository;
import org.springframework.web.multipart.MultipartFile;
import org.xml.sax.SAXException;

import javax.servlet.http.HttpServletRequest;
import javax.xml.parsers.ParserConfigurationException;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.IOException;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Arrays;
import java.util.List;


@Repository
public class dataOrchesTrationImp implements  dataOrchesTration{



    @Value("${spring.operations.csv.datafolder}")
    private String csvFilesFolder;
    @Override
    public List<UsersMaster> uploadAdnConvertCsvFile(HttpServletRequest filePath, MultipartFile[] files) throws IOException {

        //--- Create Folder if not exist ------
        File csvFolder = new File(csvFilesFolder);
        if (!csvFolder.exists()) {csvFolder.mkdir();}

        //--- Will clear all old existing file
        FileUtils.cleanDirectory(csvFolder);


        // --------- This Part of code Will Loop For Multiple File and Save on the local Folder
        Arrays.asList(files).stream().forEach(file -> {
            byte[] bytes;
            try {
                bytes = file.getBytes();
                Path inputFilepath = Paths.get(csvFolder + "/"+ file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", ""));
                String fileNameExt=file.getOriginalFilename().substring(file.getOriginalFilename().length() - 3);
                if(fileNameExt.equalsIgnoreCase("csv")){
                    try {
                        Files.write(inputFilepath, bytes);
                    } catch (IOException e) {e.printStackTrace();}
                    System.out.println("Upload is done please do the read and change Data..");
                    readUploadedCsvFile(inputFilepath.toString());

                }
            } catch (IOException e ) {e.printStackTrace();}
        });
        //------- End Of loop ---------

        return null;
    }








    //---- This method will read csvfile uploaded
    private void readUploadedCsvFile(String csvFileAbsolutePath) {
        try {
            final String delimiter = ",";
            File file = new File(csvFileAbsolutePath);
            FileReader frObject = new FileReader(file);
            BufferedReader brObject = new BufferedReader(frObject);
            String line = "";
            String[] tempArr;
            while((line = brObject.readLine()) != null) {
                tempArr = line.split(delimiter);
                for(String tempStr : tempArr) {
                    System.out.print(tempStr + " ");
                }
                System.out.println();
            }
            brObject.close();
            frObject.close();
        } catch(IOException ioe) {ioe.printStackTrace();}
    }














}
