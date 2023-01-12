/**
 * 
 */
package com.eirtechportal.controller;

import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import com.eirtechportal.models.UsersMasterForCsv;
import com.eirtechportal.service.applicatioBasicService;
import org.slf4j.LoggerFactory;
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
import java.util.Date;
import java.util.List;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;


@RestController
@CrossOrigin
public class HomeController {



    final static Logger LOGGER = (Logger) LoggerFactory.getLogger(HomeController.class);


    @RequestMapping(value = "/test", method = {RequestMethod.POST, RequestMethod.GET}, produces = MediaType.APPLICATION_JSON_VALUE)
    public ResponseEntity<?> uploadFilesToUserFolder() {
        return ResponseEntity.ok("Welcome to REST API......");
    }

    //-------THis Will be Called when link is clicked form the Header -----------------
    @RequestMapping(value = "/index",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView invoiceConversionTool(HttpServletRequest req, ModelMap model) throws Exception{
    	ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("homepage");
        return modelAndView;
    }//--------------- End Of Function -------------


    //-------THis Will be Called when link is clicked form the Header -----------------
    @RequestMapping(value = "/logout",method = {RequestMethod.POST,RequestMethod.GET})
    public ModelAndView logout(HttpServletRequest req, ModelMap model) throws Exception{
        req.getSession().setAttribute("userFullName",null);
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("loginpage");
        return modelAndView;
    }//--------------- End Of Function -------------



    //------ Login Page -------------------
    @RequestMapping(value = "/", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView loadloginpage(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        model.put("loginStatus","Please login to the application..");
        modelAndView.setViewName("loginpage");
        return modelAndView;
    }



    @Autowired
    applicatioBasicService objDataOrch;


     //------- Will verify user -- from login page -------
    @RequestMapping(value = "/authenticate", method = { RequestMethod.POST})
    public ModelAndView authenticateUserDetail(HttpServletRequest req, ModelMap model) throws Exception {

        String userStatus[] = objDataOrch.validateUserLoginDetail(req.getParameter("loginname"),req.getParameter("password"));

        ModelAndView modelAndView = new ModelAndView();
        if(userStatus[0].equalsIgnoreCase("OK")) {
            model.put("userFullName",userStatus[1]);
            model.put("userLastLoginDate",userStatus[2]);
            modelAndView.setViewName("homepage");
            LOGGER.info("User # "+userStatus[1] + " logged on @ "+ new Date());
        }
        else
        {
            model.put("loginStatus",userStatus[1]);
            modelAndView.setViewName("loginpage");

        }

        req.getSession().setAttribute("userFullName",userStatus[1]);
        return modelAndView;
    }




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
        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        return modelAndView;
    }



    @RequestMapping(value = "/convertpdffiletoexcel", method = { RequestMethod.POST, RequestMethod.GET })
    public ModelAndView convertpdffiletoexcel(@RequestParam("cfile") MultipartFile files, HttpServletRequest req, HttpServletResponse res, ModelMap model) throws IOException {

        //--- Check if Licence is valid or not
        if(!objDataOrch.PdfFileConversionLicenceStatus(req.getSession().getAttribute("userFullName").toString())) {
            model.addAttribute("licenceStatus", "Your PDF to Excel File Conversion Licence is Expired !! <BR><BR> Please contact #  jai.wardhan@radiantsolutions.ie  / +353-861760595 ");
        }
        else
        {
            //--- This part of code will convert the pdf file to Excel and save in the same location
            DocumentConversionDetailMaster conversionDetail = objDataOrch.uploadAdnConvertPdfFileToExcel(res, files, req.getSession().getAttribute("userFullName").toString());

            String[] pdfFileName = conversionDetail.getInputFileWithPath().split("/");
            String[] excelFileName = conversionDetail.getOutputFileWithPath().split("/");

            model.addAttribute("pdfFileName",pdfFileName[4]);
            model.addAttribute("excelFileName",excelFileName[4]);

        }


        req.getSession().setAttribute("userFullName",req.getSession().getAttribute("userFullName"));
        ModelAndView modelAndView = new ModelAndView();
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
    public void downloadViewDocuments(@PathVariable String filFullName, HttpServletRequest reqObj, HttpServletResponse resObj) throws Exception {
        try {

            //-- TODO --  this need to be changed to be based on DB query.
            String fileFullAbsoulutePath = pdfFilesFolder+reqObj.getSession().getAttribute("userFullName").toString()+File.separator+filFullName;
            viewDownloadDocumentInBrowser(resObj,  filFullName, fileFullAbsoulutePath, "DOWNLOAD");
        } catch (IOException e) { System.out.println(e.toString()); }

    }





    @RequestMapping(value = "/loadlargefileuploadergui", method = { RequestMethod.POST, RequestMethod.GET }, produces = {MimeTypeUtils.APPLICATION_JSON_VALUE })
    public ModelAndView loadLargeFileuploaderGui(HttpServletRequest req, ModelMap model) throws IOException {
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("uploadlargefile");
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
