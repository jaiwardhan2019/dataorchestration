package com.eirtechportal.service;

import org.apache.tomcat.util.http.fileupload.IOUtils;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.*;
import java.nio.channels.FileChannel;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Arrays;
import java.util.Date;
import java.util.Scanner;


@Service
public class fileUploader {

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;



    //  https://www.amitph.com/java-read-write-large-files-efficiently/
    @Async
    public void uploadFilesUsingBuffeReaderAndStreaming(MultipartFile[] files, String uploadRootDirectory) throws IOException {

        File uploadDir = new File(uploadRootDirectory);
        if(!uploadDir.exists()){uploadDir.mkdir();}

        //--- List of File --------------
        Arrays.asList(files).stream().forEach(file -> {

            try {

                String FileName = file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
                Path filePath = Paths.get(uploadRootDirectory + File.separator + FileName);
                FileOutputStream fout = new FileOutputStream(String.valueOf(filePath));

                // Create the source and target channel
                try (FileChannel sourceChannel = new FileInputStream((File) file).getChannel();
                     FileChannel targetChannel = new FileOutputStream(String.valueOf(filePath)).getChannel()) {
                    // Copy data from the source channel into the target channel
                    targetChannel.transferFrom(sourceChannel, 0, sourceChannel.size());
                } catch (Exception e) { e.printStackTrace(); }


                //System.out.println("File Name :" + FileName + "\nuploadedFileSize :" + uploadedFileSize);
            } catch (IOException e) { e.printStackTrace();}

        });

    }




    @Async
    public String uploadFilesUsingStreaming(MultipartFile[] files, String uploadRootDirectory) throws IOException {

        File uploadDir = new File(uploadRootDirectory);
        if(!uploadDir.exists()){uploadDir.mkdir();}

        final String[] finalFileName = {null};
        //--- List of File --------------
        Arrays.asList(files).stream().forEach(file -> {

            try {

                InputStream fileInputStream = file.getInputStream();
                String FileName = file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
                Path filePath = Paths.get(uploadRootDirectory + File.separator + FileName);
                FileOutputStream foutStream = new FileOutputStream(String.valueOf(filePath));
                Long uploadedFileSize = IOUtils.copyLarge(fileInputStream, foutStream);
                foutStream.close();
                IOUtils.closeQuietly(fileInputStream);
                finalFileName[0] = FileName;
            } catch (IOException e) { e.printStackTrace();}

        });

        return finalFileName[0];
    }


    public void uploadFilesUsingByteCopy(MultipartFile[] files, String uploadRootDirectory) throws IOException {

        //-------- Loop for the file list.
        Arrays.asList(files).stream().forEach(file -> {
            byte[] bytes;
            try {
                //--- File upload part ---
                bytes = file.getBytes();
                String FileName = file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
                Path filePath = Paths.get(uploadRootDirectory + File.separator + FileName);
                // Start of file upload if file exist on the file system then this will overwrite
                Files.write(filePath, bytes);
                //--- End of File upload part ---
            } catch (IOException e) {
                System.out.println("ERROR : While uploading file" + e.toString() + " @ " + new Date());
            }
        });
    }



}
