package com.eirtechportal.models;

import org.springframework.context.annotation.Scope;
import org.springframework.web.context.WebApplicationContext;

import java.io.Serializable;

@Scope(WebApplicationContext.SCOPE_REQUEST)
public class UsersMasterForCsv implements Serializable {
	

	private String  firstName;
	private String  lastName;
	private String  emailId;
	private String  phoneNumber;
	private String  eircode;

	public UsersMasterForCsv(String firstName, String lastName, String emailId, String phoneNumber, String eircode) {
		this.firstName = firstName;
		this.lastName = lastName;
		this.emailId = emailId;
		this.phoneNumber = phoneNumber;
		this.eircode = eircode;
	}

	public String getFirstName() {
		return firstName;
	}

	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}

	public String getLastName() {
		return lastName;
	}

	public void setLastName(String lastName) {
		this.lastName = lastName;
	}

	public String getEmailId() {
		return emailId;
	}

	public void setEmailId(String emailId) {
		this.emailId = emailId;
	}

	public String getPhoneNumber() {
		return phoneNumber;
	}

	public void setPhoneNumber(String phoneNumber) {
		this.phoneNumber = phoneNumber;
	}

	public String getEircode() {
		return eircode;
	}

	public void setEircode(String eircode) {
		this.eircode = eircode;
	}

	@Override
	public String toString() {
		return "UsersMaster{" +
				"firstName='" + firstName + '\'' +
				", lastName='" + lastName + '\'' +
				", emailId='" + emailId + '\'' +
				", phoneNumber='" + phoneNumber + '\'' +
				", eircode='" + eircode + '\'' +
				'}';
	}
}
