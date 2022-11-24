package com.eirtechportal.service;

import org.apache.commons.io.FilenameUtils;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.*;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Scanner;


@Service
public class fileSplitter {

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;


    public void splitFileByNumberOfLine(String fileAbsolutePath, int noofLinePerFile) {
        try {
            // Reading file and getting no. of files to be generated
            File file = new File(fileAbsolutePath);
            Scanner scanner = new Scanner(file);
            int count = 0;
            while (scanner.hasNextLine()) {
                scanner.nextLine();
                count++;
            }
            System.out.println("Lines in the file: " + count);     // Displays no. of lines in the input file.
            double temp = (count / noofLinePerFile);
            int temp1 = (int) temp;
            int nof = 0;
            if (temp1 == temp) {
                nof = temp1;
            } else {
                nof = temp1 + 1;
            }
            System.out.println("No. of files to be generated :" + nof); // Displays no. of files to be generated.

            splitFile(fileAbsolutePath, nof, noofLinePerFile);

        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
    }


    private void splitFile(String inputFileAbsolutePath, int numberOfFile, int noOfLine) {

        try {

            FileInputStream fstream = new FileInputStream(inputFileAbsolutePath);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));
            String strLine;

            for (int j = 1; j <= numberOfFile; j++) {
                FileWriter fstream1 = new FileWriter(xmlFilesFolder + "DataFile-" + j + ".xml");     // Destination File Location
                BufferedWriter out = new BufferedWriter(fstream1);
                for (int i = 1; i <= noOfLine; i++) {
                    strLine = br.readLine();
                    if (strLine != null) {
                        out.write(strLine);
                        if (i != noOfLine) {
                            out.newLine();
                        }
                    }
                }
                out.close();
            }

            in.close();


        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

    }


    public void uploadAndSplitFileIfSizeBigger(MultipartFile[] files, String FilePath, int fileSize) throws IOException {

        long leninfile = 0, leng = 0;
        int count = 1, data;
        File filename = null;
        InputStream infile = new BufferedInputStream(files[0].getInputStream());
        data = infile.read();
        while (data != -1) {
            filename = generateTargetFileName(FilePath, files[0], fileSize, count);
            OutputStream outfile = new BufferedOutputStream(new FileOutputStream(filename));
            while (data != -1 && leng < fileSize) {
                outfile.write(data);
                leng++;
                data = infile.read();
            }
            leninfile += leng;
            leng = 0;
            outfile.close();
            count++;
        }

    }


    //--- Generate File Name with the no if size is bigger--
    private File generateTargetFileName(String FilePath, MultipartFile files, int targetFileSize, int fileCount) {

        File fileName = null;
        String tempFileName = null;
        if (files.getSize() > targetFileSize) {
            tempFileName =  FilenameUtils.removeExtension(files.getOriginalFilename())+"-"+fileCount+"."+FilenameUtils.getExtension(files.getOriginalFilename());
            fileName = new File(FilePath + tempFileName);
        } else {
            fileName = new File(FilePath + files.getOriginalFilename());

        }

        return fileName;

    }


    //---- Split File with the given lenght and placed on the same folder
    public void splitFileByNoOfByte(String FilePath, long splitlen) {

        long leninfile = 0, leng = 0;
        int count = 1, data;
        try {
            File filename = new File(FilePath);

            InputStream infile = new BufferedInputStream(new FileInputStream(filename));
            data = infile.read();
            while (data != -1) {
                filename = new File(FilePath + count + ".sp");
                OutputStream outfile = new BufferedOutputStream(new FileOutputStream(filename));
                while (data != -1 && leng < splitlen) {
                    outfile.write(data);
                    leng++;
                    data = infile.read();
                }
                leninfile += leng;
                leng = 0;
                outfile.close();
                count++;
            }

        } catch (Exception e) {
            e.printStackTrace();
        }
    }


}
