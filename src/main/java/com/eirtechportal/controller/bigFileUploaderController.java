/**
 * 
 */
package com.eirtechportal.controller;

import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import com.eirtechportal.models.UsersMasterForCsv;
import com.eirtechportal.service.applicatioBasicService;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Date;
import java.util.List;


@Controller
public class bigFileUploaderController {



    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(bigFileUploaderController.class);

    @Value("${spring.operations.xml.datafolder}")
    private String xmlFilesFolder;



    @Autowired
    applicatioBasicService objDataOrch;

    @RequestMapping(value = "/uploadlargefile", method = { RequestMethod.POST, RequestMethod.PUT })
    public ModelAndView uploadlargefile(@RequestParam("cfile") MultipartFile files, HttpServletRequest req,  ModelMap model) throws IOException {


      //--- This part of code will convert the pdf file to Excel and save in the same location
           // DocumentConversionDetailMaster conversionDetail = objDataOrch.uploadAdnConvertPdfFileToExcel(res, files, req.getSession().getAttribute("userFullName").toString());

           // String[] pdfFileName = conversionDetail.getInputFileWithPath().split("/");
           // String[] excelFileName = conversionDetail.getOutputFileWithPath().split("/");

            model.addAttribute("pdfFileName","File Uploaded Sucessfully..");





        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
        return modelAndView;
    }


}
