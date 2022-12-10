/**
 * 
 */
package com.eirtechportal.controller;

import com.eirtechportal.service.*;
import com.google.common.base.Stopwatch;
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
import javax.xml.stream.XMLStreamException;
import java.io.*;

import static java.util.concurrent.TimeUnit.MILLISECONDS;
import static java.util.concurrent.TimeUnit.SECONDS;


@Controller
public class bigFileManagerController {



    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(bigFileManagerController.class);

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;


    @Autowired
    applicatioBasicService objDataOrch;



    @Autowired
    fileUploader fileUploaderObj;

    @RequestMapping(value = "/uploadlargefile", method = { RequestMethod.POST})
    public ModelAndView uploadlargefile(@RequestParam("cfile") MultipartFile[] files,HttpServletRequest req,  ModelMap model) throws IOException {

        Stopwatch stopwatch = Stopwatch.createStarted();
        // 1. Upload File and Split if it is bigger in size.
        //fileUploaderObj.uploadAndSplitFileIfSizeBigger(files,xmlFilesFolder,(1024*1024*15));
        //fileUploaderObj.uploadFilesUsingBuffeReaderAndStreaming(files,xmlFilesFolder);
        fileUploaderObj.uploadFilesUsingStreaming(files,xmlFilesFolder);
        stopwatch.stop();
        System.out.println("Time taken in upload and Split : # "+stopwatch.elapsed(SECONDS));


        model.addAttribute("fileStatus","File Uploaded Sucessfully..");

        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }






    @Autowired
    fileParsher  fileParsherObj;

    @RequestMapping(value = "/parselargefile", method = { RequestMethod.POST, RequestMethod.GET})
    public void parselargefile(HttpServletRequest req,  ModelMap model) throws IOException, XMLStreamException {

        Stopwatch stopwatch = Stopwatch.createStarted();

        fileParsherObj.parseBigFile();

        stopwatch.stop();
        System.out.println("Time taken to parse file  : # "+stopwatch.elapsed(SECONDS));


        /*
        model.addAttribute("fileStatus","File Split Sucessfully..");
        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;*/
    }





    @RequestMapping(value = "/splitlargefile", method = { RequestMethod.POST, RequestMethod.GET})
    public ModelAndView splitlargefile(HttpServletRequest req,  ModelMap model) throws IOException {

        String fileAbsolutePath = xmlFilesFolder + File.separatorChar + "recordsmaster.xml";

        //---Write splitter Code...

        model.addAttribute("fileStatus","File Split Sucessfully..");
        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }



    @Autowired
    xmlFileCreator objFileCreator;

    @RequestMapping(value = "/createxmlfile", method = { RequestMethod.POST, RequestMethod.GET})
    public void createxmlfile(HttpServletRequest req,  ModelMap model) throws IOException {

        objFileCreator.createTestXmlFile();

        //---Write splitter Code...
    }








}
