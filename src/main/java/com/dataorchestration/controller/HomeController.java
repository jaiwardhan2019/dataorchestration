/**
 * 
 */
package com.dataorchestration.controller;

import org.springframework.http.MediaType;
import org.springframework.http.ResponseEntity;
import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import javax.servlet.http.HttpServletRequest;


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






}
