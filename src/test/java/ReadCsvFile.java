import com.fasterxml.jackson.databind.exc.InvalidFormatException;
import org.apache.poi.ss.usermodel.*;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

import java.io.*;
import java.security.NoSuchAlgorithmException;
import java.util.*;

public class ReadCsvFile {

    public static void main(String[] args) throws NoSuchAlgorithmException
    {

        String line = "";
        String splitBy = ",";
        String fileAbsoultePath="C:\\JavaProject\\eirtechportal\\src\\test\\java\\AMOSExcel.csv";

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

            String outputFileAbsoultePath="C:\\JavaProject\\eirtechportal\\src\\test\\java\\report.xlsx";
            appendRows(8,recordsToWrite, new File(outputFileAbsoultePath));

        } catch (IOException e) { e.printStackTrace();}

    }




    //--- this method will render data to the row.
    private static void appendRows(int rowNumStartPossition,List<AmosDataEntity> recordsToWrite, File fileTowrite)
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




    private static Map<Integer, Object[]> prepareData(int rowNum, List<AmosDataEntity> recordsToWrite) {
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





}
