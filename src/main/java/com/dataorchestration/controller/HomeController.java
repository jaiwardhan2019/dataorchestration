/**
 * 
 */
package com.dataorchestration.controller;

import com.dataorchestration.models.UsersMaster;
import com.dataorchestration.service.dataOrchesTration;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.List;


@RestController
public class HomeController {

    @RequestMapping(value = "/test", method = {RequestMethod.POST, RequestMethod.GET}, produces = MediaType.APPLICATION_JSON_VALUE)
    public ResponseEntity<?> uploadFilesToUserFolder() {
        return ResponseEntity.ok("Welcome to REST API......");
    }




    //-------THis Will be Called when link is clicked form the Header -----------------
    @RequestMapping(value = "/index",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView invoiceConversionTool(HttpServletRequest req, ModelMap model) throws Exception{
    	ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("index");
        return modelAndView;
    }//--------------- End Of Function -------------






    @Autowired
    dataOrchesTration objDataOrch;









    @RequestMapping(value = "/loadpdftoexcelgui", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView loadpdftoexcelgui(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("convertpdffile");
        return modelAndView;
    }



    @RequestMapping(value = "/convertpdffiletoexcel", method = { RequestMethod.POST, RequestMethod.GET })
    public ModelAndView convertpdffiletoexcel(@RequestParam("cfile") MultipartFile files, HttpServletRequest req, HttpServletResponse res, ModelMap model) throws IOException {

        String  conversionStatus=objDataOrch.uploadAdnConvertPdfFileToExcel(res,files);
        ModelAndView modelAndView = new ModelAndView();
        model.put("dataList",conversionStatus);
        modelAndView.setViewName("convertpdffile");
        return modelAndView;

    }











    @RequestMapping(value = "/loadcsvconvertergui", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView uploadandConvertCsvfile(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("convertcsvfile");
        return modelAndView;
    }




    @RequestMapping(value = "/convertcsvfile", method = { RequestMethod.POST, RequestMethod.GET })
    public ModelAndView convertCsvFile(@RequestParam("cfile") MultipartFile files, HttpServletRequest req,ModelMap model) throws IOException {

        List<UsersMaster> listDataObj=objDataOrch.uploadAdnConvertCsvFile(req,files);
        ModelAndView modelAndView = new ModelAndView();

        model.put("dataList",listDataObj);
        modelAndView.setViewName("convertcsvfile");
        return modelAndView;

    }





    @RequestMapping(value = "/loadjsonconvertergui", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView loadjsonconvertergui(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("convertjsonfile");
        return modelAndView;
    }






    //-------THis Will be Called when link is clicked form the Header -----------------
    @RequestMapping(value = "/sample",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView sample(HttpServletRequest req, ModelMap model) throws Exception{
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("sample_gui_layer");
        return modelAndView;
    }//--------------- End Of Function -------------




    public void  viewDownloadDocumentInBrowser(HttpServletResponse res,  String fileName, String documentAbsolutePath, String operation) throws IOException {

        res.setContentType("application/octet-stream");
        PrintWriter out = res.getWriter();

        if (operation.equalsIgnoreCase("VIEW")) {
            res.setHeader("Content-Disposition", "inline;filename=\"" + fileName.trim() + "\"");    // View in new windows
        }

        if (operation.equalsIgnoreCase("DOWNLOAD")) {
            res.setHeader("Content-Disposition", "attachment; filename=\"" + fileName.trim() + "\"");    // Download
        }

        FileInputStream fileInputStream = new FileInputStream(documentAbsolutePath);

        int i;
        while ((i = fileInputStream.read()) != -1) {
            out.write(i);
        }


        fileInputStream.close();
        out.close();


    }





}
