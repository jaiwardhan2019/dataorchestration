package com.eirtechportal.models;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.UniqueConstraint;
import java.util.Date;

@Entity
@Table(name = "user_master",uniqueConstraints = { @UniqueConstraint(columnNames = "USERNAME") })
public class UserMaster {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "USERID")
	private int userId;

	@Column(name = "FIRSTNAME")
	private String userFirstName;

	@Column(name = "LASTNAME")
	private String userLastName;

	@Column(name = "EMAIL")
	private String userEmailID;

	@Column(name = "PHONENO")
	private String userPhoneNo;


	@Column(name = "ADDRESS")
	private String userFullAddress;


	@Column(name = "USERNAME")
	private String username;


	@Column(name = "PASSWORD")
	private String password;


	@Column(name = "GDPRCONSENT")
	private String gdprConsent;

	@Column(name = "GDPRCONSENT_DATE")
	private Date gdprConsentDate;

	@Column(name = "LASTLOGINDATE")
	private Date lastLoginDate;


	@Column(name = "USERLOGINCOUNT")
	private int userLoginCount;

	@Column(name = "ACTIVE")
	private boolean userIsActive;

	@Column(name = "ROLE")
	private String userRole;


	public int getUserId() {
		return userId;
	}

	public void setUserId(int userId) {
		this.userId = userId;
	}

	public String getUserFirstName() {
		return userFirstName;
	}

	public void setUserFirstName(String userFirstName) {
		this.userFirstName = userFirstName;
	}

	public String getUserLastName() {
		return userLastName;
	}

	public void setUserLastName(String userLastName) {
		this.userLastName = userLastName;
	}

	public String getUserEmailID() {
		return userEmailID;
	}

	public void setUserEmailID(String userEmailID) {
		this.userEmailID = userEmailID;
	}

	public String getUserPhoneNo() {
		return userPhoneNo;
	}

	public void setUserPhoneNo(String userPhoneNo) {
		this.userPhoneNo = userPhoneNo;
	}

	public String getUserFullAddress() {
		return userFullAddress;
	}

	public void setUserFullAddress(String userFullAddress) {
		this.userFullAddress = userFullAddress;
	}

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public String getGdprConsent() {
		return gdprConsent;
	}

	public void setGdprConsent(String gdprConsent) {
		this.gdprConsent = gdprConsent;
	}

	public Date getGdprConsentDate() {
		return gdprConsentDate;
	}

	public void setGdprConsentDate(Date gdprConsentDate) {
		this.gdprConsentDate = gdprConsentDate;
	}

	public Date getLastLoginDate() {
		return lastLoginDate;
	}

	public void setLastLoginDate(Date lastLoginDate) {
		this.lastLoginDate = lastLoginDate;
	}

	public int getUserLoginCount() {
		return userLoginCount;
	}

	public void setUserLoginCount(int userLoginCount) {
		this.userLoginCount = userLoginCount;
	}

	public boolean isUserIsActive() {
		return userIsActive;
	}

	public void setUserIsActive(boolean userIsActive) {
		this.userIsActive = userIsActive;
	}

	public String getUserRole() {
		return userRole;
	}

	public void setUserRole(String userRole) {
		this.userRole = userRole;
	}
}