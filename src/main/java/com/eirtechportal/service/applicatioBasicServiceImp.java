package com.eirtechportal.service;


import com.eirtechportal.daorepository.DocumentConversionDetailMasterDao;
import com.eirtechportal.daorepository.UserDao;
import com.eirtechportal.models.AmosDataEntity;
import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import com.spire.pdf.FileFormat;
import com.spire.pdf.PdfDocument;
import com.eirtechportal.models.UsersMasterForCsv;
import com.spire.pdf.conversion.XlsxLineLayoutOptions;
import org.apache.poi.ss.usermodel.*;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
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
import java.util.*;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;


@Repository
public class applicatioBasicServiceImp  implements applicatioBasicService  {



    @Value("${spring.operations.csv.datafolder}")
    private String csvFilesFolder;

    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(applicatioBasicServiceImp.class);



    @Autowired
    private UserDao usDao;


    @Autowired
    DocumentConversionDetailMasterDao docConvDao;


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
    public DocumentConversionDetailMaster uploadAdnConvertPdfFileToExcel(HttpServletResponse resp, MultipartFile files , String userName) throws IOException {

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
            Path inputFilepath = Paths.get(pdfFolder + "/"+ files.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", ""));
            String fileNameExt=files.getOriginalFilename().substring(files.getOriginalFilename().length() - 3);
            if(fileNameExt.equalsIgnoreCase("pdf")){

                //---- This part will upload file and save to the /pdf folder
                try {
                    Files.write(inputFilepath, bytes);
                    LOGGER.info(files.getOriginalFilename()+ " File Uploaded and ..  EXCEL Conversion started..");
                } catch (IOException e) {LOGGER.error(e.toString());}

                //--- THis part will convert PDF to Excel and save on /pdf folder
                PdfDocument pdf = new PdfDocument();
                pdf.loadFromFile(String.valueOf(inputFilepath));
                pdf.getConvertOptions().setPdfToXlsxOptions(new XlsxLineLayoutOptions(false,true,true));
                pdf.saveToFile(pdfFolder+"/"+outputFileName, FileFormat.XLSX);
                LOGGER.info(outputFileName + " Excel File Conversion is done..");


                // This part of code will update Converted Document detail to the DB
                documenUpdate = updateFileConversionDataTotheDataBase(pdfFilesFolder,inputFileName ,outputFileName ,userName );
                LOGGER.info("DB Update of the file is done..");

                //--- TODO --- Write a function to find and replace text in the Excel FIle--
                //findAndRemoveTextFromExcelSheet(documenUpdate.getOutputFileWithPath() , documenUpdate.getOutputFileWithPath()," Evaluation Warning : The document was created with Spire.PDF for java.");



                return documenUpdate;
            } // End of If --

        } catch (IOException e ) {
            LOGGER.error(e.toString());
            statusUpdate =e.toString();
        }


        return documenUpdate;
    }



    @Value ("${spring.operations.amos.csv.datafolder}")
    private String amosCsvFileRoot;

    @Override
    public DocumentConversionDetailMaster uploadAmosCsvFileAndCreateExcelReport(HttpServletResponse requEst, MultipartFile files, String userName) throws IOException {

        //--- Create Folder if not exist ------
        File amosCsvFileFolder = new File(amosCsvFileRoot);
        if (!amosCsvFileFolder.exists()) {amosCsvFileFolder.mkdir();}

        amosCsvFileFolder = new File(amosCsvFileRoot+userName);
        if (!amosCsvFileFolder.exists()) {amosCsvFileFolder.mkdir();}
        String outputFileName  = "amoscsvfile.csv";

        DocumentConversionDetailMaster documenUpdate = null;
        String statusUpdate = "Conversion Not Done !!!";

        byte[] bytes;
        try {
            bytes = files.getBytes();
            Path inputFilepath = Paths.get(amosCsvFileFolder + "/"+ outputFileName);
            //---- This part will upload file and save to the  AMOS Folder.
            try {

                Files.write(inputFilepath, bytes);
                LOGGER.info(files.getOriginalFilename()+ " AMOS csv File Uploaded and ..  EXCEL Conversion started..");

            } catch (IOException e) { LOGGER.error(e.toString());}

            String line = "";
            String splitBy = ",";
            //String fileAbsoultePath="C:\\JavaProject\\eirtechportal\\src\\test\\java\\AMOSExcel.csv";
            String fileAbsoultePath=inputFilepath.toString();
            List<AmosDataEntity> recordsToWrite = new ArrayList<AmosDataEntity>();

            try
            {
                //parsing a CSV file into BufferedReader class constructor
                BufferedReader br = new BufferedReader(new FileReader(fileAbsoultePath));
                br.readLine();
                int itemNo = 1;
                AmosDataEntity PrevObjAmosData = new AmosDataEntity();
                while ((line = br.readLine()) != null){             //returns a Boolean value

                    AmosDataEntity objAmosData = new AmosDataEntity();

                    if(line.toUpperCase().contains("SUBJECT")){
                        // Add Data
                        String commentData = line.replaceAll(",Subject:,,","");
                        PrevObjAmosData.setDocSubject(commentData.replace(",,,,,,,,,,",""));
                        recordsToWrite.add(PrevObjAmosData);
                        System.out.println("\n For the Airtech =>"+PrevObjAmosData);
                    }
                    else{

                        String[] columnArray = line.split(splitBy);    // use comma as separator
                        if(columnArray.length > 0) {
                            objAmosData.setItemNo(itemNo);
                            objAmosData.setDocNo(columnArray[0]);
                            objAmosData.setDocType (columnArray[1]);
                            objAmosData.setDocRev(columnArray[2]);
                            objAmosData.setDocComponent(columnArray[3]);
                            objAmosData.setDocAC(columnArray[4]);
                            objAmosData.setDocATA(columnArray[5]);
                            objAmosData.setDocStats(columnArray[6]);
                            objAmosData.setDocRep(columnArray[7]);
                            objAmosData.setDocDate(columnArray[8]);
                            objAmosData.setDocTahTsn(columnArray[9]);
                            objAmosData.setDocTacCsn(columnArray[10]);
                            objAmosData.setDocWo(columnArray[11]);
                            objAmosData.setDocDueDim1(columnArray[12]);
                            PrevObjAmosData = objAmosData;

                        }

                    }


                }
                itemNo++;

            }//-- End of while


            catch (IOException e) { e.printStackTrace();}


            //--- This part will write Data to the new file from 9th Row Onward
            try {

                String outputFileAbsoultePath= amosCsvFileFolder + "/"+ "report.xlsx";
                appendRows(8,recordsToWrite, new File(outputFileAbsoultePath));

            } catch (IOException e) { e.printStackTrace();}


        } catch (IOException e ) { LOGGER.error(e.toString()); statusUpdate =e.toString(); }


        return updateFileConversionDataTotheDataBase(amosCsvFileRoot,files.getOriginalFilename(),"report.xlsx",userName);

    }



    //--- this method will render data to the row.
    private void appendRows(int rowNumStartPossition,List<AmosDataEntity> recordsToWrite, File fileTowrite)
            throws IOException, NoClassDefFoundError {

        XSSFWorkbook workbook = new XSSFWorkbook(new FileInputStream(fileTowrite));
        Sheet sheet = workbook.getSheetAt(0);
        //int rowNum = sheet.getLastRowNum() + 1;
        int rowNum =rowNumStartPossition;

        //Create new style
        CellStyle style = workbook.createCellStyle();
        style.setWrapText(true);
        style.setAlignment(HorizontalAlignment.CENTER);
        style.setVerticalAlignment(VerticalAlignment.CENTER);

        Font font = workbook.createFont();
        font.setFontName("Calibri");
        font.setFontHeightInPoints((short) 8);
        style.setFont(font);



        Map<Integer, Object[]> data = prepareData(rowNum, recordsToWrite);

        Set<Integer> keySet = data.keySet();
        for (Integer key : keySet) {
            Row row = sheet.createRow(rowNum++);
            Object[] objArr = data.get(key);
            int cellNum = 0;
            for (Object obj : objArr) {
                Cell cell = row.createCell(cellNum++);
                cell.setCellStyle(style); // Setting Up Style to the cell
                if (obj instanceof String)
                    cell.setCellValue((String) obj);
                else if (obj instanceof Integer)
                    cell.setCellValue((Integer) obj);
            }
        }
        try {
            FileOutputStream out = new FileOutputStream(fileTowrite);
            workbook.write(out);
            out.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }




    private  Map<Integer, Object[]> prepareData(int rowNum, List<AmosDataEntity> recordsToWrite) {
        int itemNo=1;
        String blankString = " ";
        Map<Integer, Object[]> data = new HashMap<>();
        for (AmosDataEntity entity : recordsToWrite) {
            data.put(rowNum, new Object[]{
                    itemNo,
                    blankString,
                    entity.getDocNo(),
                    blankString,
                    entity.getDocSubject(),
                    blankString,
                    entity.getDocWo(),
                    entity.getDocDate(),
                    entity.getDocTahTsn(),
                    entity.getDocTacCsn(),
                    blankString,
                    blankString,
                    blankString,
                    blankString,
                    entity.getDocStats()
            });
            rowNum++;
            itemNo++;
        }
        return data;
    }



















    @Override
    public boolean PdfFileConversionLicenceStatus(String userName) {
        List<DocumentConversionDetailMaster> document = docConvDao.findUserDocumentsConvertedCount(userName);
        return document.size() < 7 ? true:false;
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

    private DocumentConversionDetailMaster updateFileConversionDataTotheDataBase(String rootFolderName,String inputFileName ,String outputFileName , String UserName ){
        DocumentConversionDetailMaster docObj = new DocumentConversionDetailMaster();
        docObj.setInputFileWithPath(rootFolderName+UserName+"/"+inputFileName);
        docObj.setOutputFileWithPath(rootFolderName+UserName+"/"+outputFileName);
        docObj.setConversionDate(new Date());
        docObj.setUserFullName(UserName);
        return docConvDao.save(docObj);
    }








    public void updateUserLastLoginDateAdnLoginCount(String username) {
        UserMaster userDetail = usDao.findByusername(username);
        userDetail.setUserLoginCount(userDetail.getUserLoginCount() + 1);
        userDetail.setLastLoginDate(new Date());
        usDao.save(userDetail);
    }




}
