package com.dataorchestration.controller;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;


@RestController
@RequestMapping("ajaxrest")
public class ajexController {


	//-------THis will load  .jsp page to the the body----------------- 
	@RequestMapping(value = "/loadjsppage",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE})
	public ModelAndView loadJspPageToTheBody(HttpServletRequest req,ModelMap model) throws Exception{
		ModelAndView modelAndView = new ModelAndView();
		modelAndView.setViewName(req.getParameter("pagename"));
		return modelAndView;	
	}//--------------- End Of Function -------------


	

}
