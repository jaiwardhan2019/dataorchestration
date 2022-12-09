package com.eirtechportal.controller;

import com.eirtechportal.models.Employee;
import com.eirtechportal.service.RabbitMQSender;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.actuate.endpoint.web.annotation.RestControllerEndpoint;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;

@Component
@RestControllerEndpoint(id = "rest-end-point")
public class testController {


	@GetMapping(value = "/test")
	public String producer1() {
		return "Message sent to the RabbitMQ JavaInUse Successfully";
	}



}

