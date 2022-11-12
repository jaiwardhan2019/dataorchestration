/**
 * 
 */
package com.eirtechportal.controller;

import com.eirtechportal.service.applicatioBasicService;
import org.apache.commons.fileupload.util.Streams;
import org.apache.tomcat.util.http.fileupload.*;
import org.apache.tomcat.util.http.fileupload.disk.DiskFileItemFactory;
import org.apache.tomcat.util.http.fileupload.servlet.ServletFileUpload;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
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
import java.util.List;


@Controller
public class bigFileUploaderController {



    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(bigFileUploaderController.class);

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;



    @Autowired
    applicatioBasicService objDataOrch;

    @RequestMapping(value = "/uploadlargefile", method = { RequestMethod.POST})
    public ModelAndView uploadlargefile(@RequestParam("cfile") MultipartFile[] files,HttpServletRequest req,  ModelMap model) throws IOException {



        //uploadFilesUsingByteCopy(files, xmlFilesFolder);

        uploadFilesUsingStreaming(files, xmlFilesFolder);


        model.addAttribute("fileStatus","File Uploaded Sucessfully..");




        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }







        private void uploadFilesUsingStreaming(MultipartFile[] files , String uploadRootDirectory) throws IOException {

            DiskFileItemFactory factory = new DiskFileItemFactory();
            factory.setRepository(new File(uploadRootDirectory));
            ServletFileUpload upload = new ServletFileUpload(factory);

            Arrays.asList(files).stream().forEach(file -> {

                try {

                    InputStream uploadedStream = file.getInputStream();

                    String FileName = file.getOriginalFilename().replaceAll("['\\\\/:*&?\"<>|]", "");
                    Path filePath = Paths.get(uploadRootDirectory + File.separator + FileName);
                    FileOutputStream fout= new FileOutputStream (String.valueOf(filePath));
                    Long uploadedFileSize=IOUtils.copyLarge(uploadedStream, fout);
                    System.out.println("uploadedFileSize :"+uploadedFileSize);
                    fout.close();
                } catch (IOException e) { e.printStackTrace();}


            });


        }






        private void uploadFilesUsingByteCopy(MultipartFile[] files , String uploadRootDirectory) throws IOException {

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



    private void uploadFileStreaming1(HttpServletRequest request) throws IOException {

        boolean isMultipart = ServletFileUpload.isMultipartContent(request);
        ServletFileUpload upload = new ServletFileUpload();
        // Parse the request
        FileItemIterator iter = upload.getItemIterator(request);
        while (iter.hasNext()) {
            FileItemStream item = iter.next();
            String name = item.getFieldName();
            InputStream stream = item.openStream();
            if (item.isFormField()) {
                System.out.println("Form field " + name + " with value " + Streams.asString(stream) + " detected.");
            } else {
                System.out.println("File field " + name + " with file name " + item.getName() + " detected.");
                FileOutputStream fout= new FileOutputStream (xmlFilesFolder+File.separatorChar);
                int byte_;
                while ((byte_=stream.read()) != -1)
                {
                    fout.write(byte_);
                }
                fout.close();        // Process the input stream

            }
        }


    }






    private void uploadFileFirst(HttpServletRequest req) throws IOException {
        //--- Write Code to Upload file--------
        boolean isMultipart = ServletFileUpload.isMultipartContent(req);
        DiskFileItemFactory factory = new DiskFileItemFactory();
        factory.setRepository(new File(System.getProperty("java.io.tmpdir")));
        factory.setSizeThreshold(DiskFileItemFactory.DEFAULT_SIZE_THRESHOLD);
        ServletFileUpload upload = new ServletFileUpload(factory);
        InputStream uploadedStream = req.getInputStream();
        OutputStream out = new FileOutputStream(xmlFilesFolder+File.separatorChar+"uploadfile.xml");
        IOUtils.copy(uploadedStream, out);
    }




}
