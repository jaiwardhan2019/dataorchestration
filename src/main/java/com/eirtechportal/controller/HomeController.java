/**
 * 
 */
package com.eirtechportal.controller;

import com.eirtechportal.models.UserMaster;
import com.eirtechportal.models.UsersMasterForCsv;
import com.eirtechportal.service.applicatioBasicService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
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
import java.util.List;
import org.apache.log4j.Logger;


@RestController
@CrossOrigin
public class HomeController {


    private static final Logger LOGGER = Logger.getLogger(HomeController.class);


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
    applicatioBasicService objDataOrch;







    //----- Will register User to the DB With Encoded Password ----------
    @RequestMapping(value = "/register", method = { RequestMethod.POST,RequestMethod.GET},produces = MediaType.APPLICATION_JSON_VALUE)
    public ResponseEntity<?> saveUser(@RequestBody UserMaster user) throws Exception {
        UserMaster registerUser = objDataOrch.registerNewUser(user);
        return ResponseEntity.ok(registerUser);
    }


















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


    @Value("${spring.operations.pdf.datafolder}")
    private String pdfFilesFolder;
    /**
     * This API will Collect All  file for a project and make 1 zip file and then download.
     * Input Parameter : File Name
     * Output          : Same File downloaded to the user.
     */
    @RequestMapping(value = "/viewdownloadalldocuments/{filFullName}", method = {RequestMethod.POST, RequestMethod.GET})
    public void zipanddownloadalldocuments(@PathVariable String filFullName, HttpServletRequest reqObj, HttpServletResponse resObj) throws Exception {
                try {
                    String fileFullAbsoulutePath = pdfFilesFolder+File.separator+filFullName;
                    viewDownloadDocumentInBrowser(resObj,  filFullName, fileFullAbsoulutePath, "DOWNLOAD");
                } catch (IOException e) { System.out.println(e.toString()); }

    }





    @RequestMapping(value = "/loadcsvconvertergui", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView uploadandConvertCsvfile(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("convertcsvfile");
        return modelAndView;
    }




    @RequestMapping(value = "/convertcsvfile", method = { RequestMethod.POST, RequestMethod.GET })
    public ModelAndView convertCsvFile(@RequestParam("cfile") MultipartFile files, HttpServletRequest req,ModelMap model) throws IOException {

        List<UsersMasterForCsv> listDataObj=objDataOrch.uploadAdnConvertCsvFile(req,files);
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
    @RequestMapping(value = "/guisample",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView sample(HttpServletRequest req, ModelMap model) throws Exception{
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("sample_gui_layer");
        return modelAndView;
    }//--------------- End Of Function -------------





    //---------- This will download / view file -----
    public void viewDownloadDocumentInBrowser(HttpServletResponse res, String fileName, String documentAbsolutePath, String operation) throws IOException {

        res.setContentType("application/octet-stream");
        operation= "DOWNLOAD";
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
