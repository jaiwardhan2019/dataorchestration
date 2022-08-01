package com.eirtechportal.service;


import com.eirtechportal.controller.HomeController;
import com.eirtechportal.daorepository.DocumentConversionDetailMasterDao;
import com.eirtechportal.daorepository.UserDao;
import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import org.apache.log4j.Logger;


import com.spire.pdf.FileFormat;
import com.spire.pdf.PdfDocument;

import com.eirtechportal.models.UsersMasterForCsv;
import com.spire.pdf.conversion.XlsxLineLayoutOptions;
import org.apache.tomcat.util.http.fileupload.FileUtils;
import org.springframework.beans.factory.annotation.Autowired;
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
import java.util.Date;
import java.util.List;


@Repository
public class applicatioBasicServiceImp  implements applicatioBasicService  {



    @Value("${spring.operations.csv.datafolder}")
    private String csvFilesFolder;


    private static final Logger LOGGER = Logger.getLogger(applicatioBasicServiceImp.class);



    @Autowired
    private UserDao usDao;




    //------ Save User And Encoded Password to the DataBase
    public UserMaster registerNewUser(UserMaster user) throws Exception {

        if (user.equals(null)) {
            throw new Exception("User details are Missing..!!:");
        }

        try {
            UserMaster newUser = new UserMaster();
            newUser.setUserFirstName(user.getUserFirstName());
            newUser.setUserLastName(user.getUserLastName());
            newUser.setUserEmailID(user.getUserEmailID());
            newUser.setUserPhoneNo(user.getUserPhoneNo());
            newUser.setUserFullAddress("");
            newUser.setUsername(user.getUsername());
            //--- Password Encryption
            String convertPassword = PasswordEnCryptValidate.hashpw(user.getPassword(),PasswordEnCryptValidate.gensalt(12));
            newUser.setPassword(convertPassword);
            newUser.setGdprConsent(user.getGdprConsent());
            newUser.setGdprConsentDate(new Date());
            newUser.setLastLoginDate(new Date());
            newUser.setUserIsActive(true);
            newUser.setUserRole(user.getUserRole());
            newUser = usDao.save(newUser);
            LOGGER.info(user.getUsername() + " : Registered on # " + new Date());
            return newUser;

        } catch (Exception e) {
            String errorMessage = e.toString();
            if (errorMessage.contains("USERNAME_UNIQUE")) {
                errorMessage = "Login Name :# " + user.getUsername() + " is already in use ...!!";
            }
            if (errorMessage.contains("EMAIL_UNIQUE")) {
                errorMessage = "Email ID :# " + user.getUserEmailID() + " is already in use " +
                        " Please Correct your given Email ID or contact your Admin User to fix this issue...!!";
            }
            throw new Exception(errorMessage);
        }



    }

    @Override
    public String[] validateUserLoginDetail(String userLoginName, String userPassword) throws Exception {

        String[] userDetailStatus = new String[3];
        UserMaster userDetail = usDao.findByusername(userLoginName);

        if (userDetail == null) {
            userDetailStatus[0] = userLoginName;
            userDetailStatus[1] = userLoginName+ ": Login name doesnt exist !!";
            return userDetailStatus;
        }

        if(PasswordEnCryptValidate.checkpw(userPassword, userDetail.getPassword())) {
            userDetailStatus[0] = "OK";
            userDetailStatus[1] = userDetail.getUserFirstName() + " " + userDetail.getUserLastName();
            userDetailStatus[2] = userDetail.getLastLoginDate().toString();
            updateUserLastLoginDateAdnLoginCount(userLoginName);
        }
        else
        {
            userDetailStatus[0] = "NOTOK";
            userDetailStatus[1] = "login name and password is not correct  !!";
        }
        return userDetailStatus;
    }







    @Override
    public List<UsersMasterForCsv> uploadAdnConvertCsvFile(HttpServletRequest filePath, MultipartFile files) throws IOException {

        //--- Create Folder if not exist ------
        File csvFolder = new File(csvFilesFolder);
        if (!csvFolder.exists()) {csvFolder.mkdir();}

        //--- Will clear all old existing file
        FileUtils.cleanDirectory(csvFolder);



        List<UsersMasterForCsv> listDataMaster = null;
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
    public String uploadAdnConvertPdfFileToExcel(HttpServletResponse resp, MultipartFile files , String userName) throws IOException {

        //--- Create Folder if not exist ------
        File pdfFolder = new File(pdfFilesFolder);
        if (!pdfFolder.exists()) {pdfFolder.mkdir();}


        pdfFolder = new File(pdfFilesFolder+userName);
        if (!pdfFolder.exists()) {pdfFolder.mkdir();}


        //--- Will clear all old existing file
        //FileUtils.cleanDirectory(pdfFolder);

        String inputFileName = files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
        String outputFileName  = inputFileName;
        outputFileName = outputFileName.substring(0, outputFileName.length()-3)+"xlsx";

        DocumentConversionDetailMaster documenUpdate = null;


                String statusUpdate = "Conversion Not Done !!!";
        // --------- This Part of code Will Loop For Multiple File and Save on the local Folder

        byte[] bytes;
        try {
            bytes = files.getBytes();
            Path inputFilepath = Paths.get(pdfFolder + File.separator+ files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", ""));
            String fileNameExt=files.getOriginalFilename().substring(files.getOriginalFilename().length() - 3);
            if(fileNameExt.equalsIgnoreCase("pdf")){

                //---- This part will upload file and save to the /pdf folder
                try {
                    Files.write(inputFilepath, bytes);
                } catch (IOException e) {e.printStackTrace();}

                //--- THis part will convert PDF to Excel and save on /pdf folder
                PdfDocument pdf = new PdfDocument();
                pdf.loadFromFile(String.valueOf(inputFilepath));
                pdf.getConvertOptions().setPdfToXlsxOptions(new XlsxLineLayoutOptions(false,true,true));
                pdf.saveToFile(pdfFolder+File.separator+outputFileName, FileFormat.XLSX);

                // This part of code will update Converted Document detail to the DB
                updateFileConversionDataTotheDataBase(inputFileName ,outputFileName ,userName );
                return outputFileName;
            } // End of If --

        } catch (IOException e ) {
            LOGGER.error(e.toString());
            statusUpdate =e.toString();
        }


        return outputFileName;
    }
















    //---- This method will read csvfile uploaded
    private List<UsersMasterForCsv> readUploadedCsvFileAndAnnonmize(String csvFileAbsolutePath) {

        List<UsersMasterForCsv> listUserMaster =  new ArrayList<UsersMasterForCsv>();

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
                listUserMaster.add(new UsersMasterForCsv(replaceLastThree(tempArr[0]), replaceLastThree(tempArr[1]), replaceLastThree(tempArr[2]),
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




    /*
    * This method will update document conversion detail to the Table
    * */
    @Autowired
    DocumentConversionDetailMasterDao docConvDao;
    private void updateFileConversionDataTotheDataBase(String inputFileName ,String outputFileName , String UserName ){
        DocumentConversionDetailMaster docObj = new DocumentConversionDetailMaster();
        docObj.setInputFileWithPath(pdfFilesFolder+inputFileName);
        docObj.setOutputFileWithPath(pdfFilesFolder+outputFileName);
        docObj.setConversionDate(new Date());
        docObj.setUserFullName(UserName);
        docConvDao.save(docObj);
    }






    public void updateUserLastLoginDateAdnLoginCount(String username) {
        UserMaster userDetail = usDao.findByusername(username);
        userDetail.setUserLoginCount(userDetail.getUserLoginCount() + 1);
        userDetail.setLastLoginDate(new Date());
        usDao.save(userDetail);
    }




}
