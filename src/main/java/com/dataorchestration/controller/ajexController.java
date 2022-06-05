package com.dataorchestration.controller;


import com.dataorchestration.models.UsersMaster;
import com.dataorchestration.service.dataOrchesTration;
import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.multipart.MultipartFile;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;
import java.io.IOException;
import java.util.List;


@RestController
public class ajexController {


	//-------THis will load  .jsp page to the the body----------------- 
	@RequestMapping(value = "/loadjsppage",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE})
	public ModelAndView loadJspPageToTheBody(HttpServletRequest req,ModelMap model) throws Exception{
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.setViewName(req.getParameter("pagename"));
		return modelAndView;	
	}//--------------- End Of Function -------------





	@Autowired
	dataOrchesTration objDataOrch;


	@RequestMapping(value = "uploadandconvertcsvfileajex", method = { RequestMethod.POST, RequestMethod.GET }, produces = {
			MimeTypeUtils.APPLICATION_JSON_VALUE })
	public ResponseEntity<List<UsersMaster>> getflightcomment(HttpServletRequest req,@RequestParam("cfile") MultipartFile files) {
		try {
			ResponseEntity<List<UsersMaster>> responseEntity = new ResponseEntity<List<UsersMaster>>(
					objDataOrch.uploadAdnConvertCsvFile(req,files), HttpStatus.OK);
			return responseEntity;
		} catch (Exception e) {
			return new ResponseEntity<List<UsersMaster>>(HttpStatus.BAD_REQUEST);
		}

	}





	/*//-------THis Will be Called when Convert Invoice Button will be clicked -----------------
	@RequestMapping(value = "/convertXmltoExcelandDownload", method = { RequestMethod.POST, RequestMethod.GET }, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
	public ModelAndView convert_Xml_Excel_Download(@RequestParam("cfile") MultipartFile[] files, HttpServletRequest req,
												   ModelMap model) throws Exception {

		String[] userEmailId   =  req.getParameter("profilelist").toString().split("#");
		model.addAttribute("profilelist",req.getParameter("profilelist"));

		if (docserv.convertXmltoExcelFormat(req, files)) {
			model.put("status", displayAllConvertedFile(req));
		} else {
			model.put("status", "<ul><li><i class='fa fa-exclamation-triangle' aria-hidden='true'></i>&nbsp;&nbsp; Error !!! </li> <li> Please make sure file type is .XML </li> <li>Please make sure the XML File Belongs to the Relevant Supplier.</li></ul>");
		}

		logger.info("User id:" + userEmailId[0] + " File Updated to the Folder :" + req.getParameter("cat"));

		ModelAndView modelAndView = new ModelAndView();
		modelAndView.setViewName("miscellanous/convertinvoice");
		return modelAndView;
	}
	*/








/*

	// --- FOR DELAY REPORT FETCH FLIGHT COMMENT DATE FROM DB
	@RequestMapping(value = "getflightcomment", method = { RequestMethod.POST, RequestMethod.GET }, produces = {
			MimeTypeUtils.APPLICATION_JSON_VALUE })
	public ResponseEntity<List<flightDelayComment>> getflightcomment(HttpServletRequest req) {
		try {
			ResponseEntity<List<flightDelayComment>> responseEntity = new ResponseEntity<List<flightDelayComment>>(
					gopsobj.showAllComment(req), HttpStatus.OK);
			return responseEntity;
		} catch (Exception e) {
			return new ResponseEntity<List<flightDelayComment>>(HttpStatus.BAD_REQUEST);
		}

	}
*/




}
