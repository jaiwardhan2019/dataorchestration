package com.eirtechportal.controller;

import org.springframework.boot.actuate.endpoint.web.annotation.RestControllerEndpoint;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.GetMapping;

@Component
@RestControllerEndpoint(id = "rest-end-point")
public class AccuatorController {


	@GetMapping(value = "/test")
	public String producer1() {
		return "Message sent to the RabbitMQ JavaInUse Successfully";
	}

	//http://localhost:8080/manager/rest-end-point/test
	//http://localhost:8080/manager/threaddump


}

