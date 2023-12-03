package com.eirtechportal.models;

import java.io.Serializable;

public class PaitentBooking implements Serializable {

	private String  firstName;
	private String  lastName;
	private String  dateOfBirth;
	private String  ppsNo;
	private String  emailId;
	private String  phoneNumber;
	private String  eircode;
	private String  anyComment;
	private boolean havingMedicalCard;
	private AppointmentDetail appointmentDetail;

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

	public String getDateOfBirth() {
		return dateOfBirth;
	}

	public void setDateOfBirth(String dateOfBirth) {
		this.dateOfBirth = dateOfBirth;
	}

	public String getPpsNo() {
		return ppsNo;
	}

	public void setPpsNo(String ppsNo) {
		this.ppsNo = ppsNo;
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

	public String getAnyComment() {
		return anyComment;
	}

	public void setAnyComment(String anyComment) {
		this.anyComment = anyComment;
	}

	public boolean isHavingMedicalCard() {
		return havingMedicalCard;
	}

	public void setHavingMedicalCard(boolean havingMedicalCard) {
		this.havingMedicalCard = havingMedicalCard;
	}

	public AppointmentDetail getAppointmentDetail() {
		return appointmentDetail;
	}

	public void setAppointmentDetail(AppointmentDetail appointmentDetail) {
		this.appointmentDetail = appointmentDetail;
	}
}
