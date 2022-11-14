/**
 * 
 */
package com.eirtechportal.controller;

import java.nio.channels.FileChannel;
import com.eirtechportal.service.applicatioBasicService;
import org.apache.tomcat.util.http.fileupload.*;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.scheduling.annotation.Async;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;
import java.io.*;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;
import java.util.Arrays;
import java.util.Date;


@Controller
public class bigFileManagerController {



    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(bigFileManagerController.class);

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;


    @Autowired
    applicatioBasicService objDataOrch;


    @RequestMapping(value = "/uploadlargefile", method = { RequestMethod.POST})
    public ModelAndView uploadlargefile(@RequestParam("cfile") MultipartFile[] files,HttpServletRequest req,  ModelMap model) throws IOException {

        //uploadFilesUsingByteCopy(files, xmlFilesFolder);  <<--- Cost Big Memory
        uploadFilesUsingStreaming(files, xmlFilesFolder);  // Streaming Cost very low Memory

        model.addAttribute("fileStatus","File Uploaded Sucessfully..");


        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }




    //  https://www.amitph.com/java-read-write-large-files-efficiently/
    @Async
    private void uploadFilesUsingBuffeReaderAndStreaming(MultipartFile[] files, String uploadRootDirectory) throws IOException {

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
    private void uploadFilesUsingStreaming(MultipartFile[] files, String uploadRootDirectory) throws IOException {

        File uploadDir = new File(uploadRootDirectory);
        if(!uploadDir.exists()){uploadDir.mkdir();}

        //--- List of File --------------
        Arrays.asList(files).stream().forEach(file -> {

            try {

                InputStream uploadedStream = file.getInputStream();
                String FileName = file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
                Path filePath = Paths.get(uploadRootDirectory + File.separator + FileName);
                FileOutputStream fout = new FileOutputStream(String.valueOf(filePath));
                Long uploadedFileSize = IOUtils.copyLarge(uploadedStream, fout);
                //Long uploadedFileSize = copyLargeFile(uploadedStream, fout);
                fout.close();
                IOUtils.closeQuietly(uploadedStream);
                System.out.println("File Name :" + FileName + "\nuploadedFileSize :" + uploadedFileSize);
            } catch (IOException e) { e.printStackTrace();}

        });

    }


    private void uploadFilesUsingByteCopy(MultipartFile[] files, String uploadRootDirectory) throws IOException {

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







    @RequestMapping(value = "/splitlargefile", method = { RequestMethod.POST})
    public ModelAndView splitlargefile(HttpServletRequest req,  ModelMap model) throws IOException {

        Path filePath = Paths.get(xmlFilesFolder + File.separator + "TestData.xml");
        fileSplitter.splitFile(String.valueOf(filePath),(1024*8));

        model.addAttribute("fileStatus","File Split Sucessfully..");
        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }




}
