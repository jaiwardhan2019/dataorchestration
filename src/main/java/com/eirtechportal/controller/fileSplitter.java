package com.eirtechportal.controller;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import java.io.*;
import java.nio.channels.FileChannel;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;
import java.util.UUID;


@Service
public class fileSplitter {

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;


    public void splitFile(String fileAbsolutePath , int noofLinePerFile){
        try {
            // Reading file and getting no. of files to be generated
            File file = new File(fileAbsolutePath);
            Scanner scanner = new Scanner(file);
            int count = 0;
           // while (scanner.hasNextLine()) { scanner.nextLine(); count++; }
            System.out.println("Lines in the file: " + count);     // Displays no. of lines in the input file.
            double temp = (count / noofLinePerFile);
            int temp1 = (int) temp;
            int nof = 0;
            if (temp1 == temp) { nof = temp1; } else { nof = temp1 + 1;}
            System.out.println("No. of files to be generated :" + nof); // Displays no. of files to be generated.

            splitFile(fileAbsolutePath,10,noofLinePerFile);

        } catch (FileNotFoundException e) { e.printStackTrace(); }
    }



    private void splitFile(String inputFileAbsolutePath, int numberOfFile, int noOfLine){

        try{

            FileInputStream fstream = new FileInputStream(inputFileAbsolutePath);
            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));
            String strLine;

            for (int j=1;j<=numberOfFile;j++)
            {
                FileWriter fstream1 = new FileWriter(xmlFilesFolder+"DataFile-"+j+".xml");     // Destination File Location
                BufferedWriter out = new BufferedWriter(fstream1);
                for (int i=1;i<=noOfLine;i++)
                {
                    strLine = br.readLine();
                    if (strLine!= null)
                    {
                        out.write(strLine);
                        if(i!=noOfLine)
                        {
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











}
