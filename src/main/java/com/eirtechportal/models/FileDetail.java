package com.eirtechportal.models;

import javax.persistence.*;
import java.util.Date;


public class FileDetail {

	private String uploadedFileName;

	private int uploadedFileSizeinMb;

	private Date uploadeDate;

	private String uploadedByUserName;


	public String getUploadedFileName() {
		return uploadedFileName;
	}

	public void setUploadedFileName(String uploadedFileName) {
		this.uploadedFileName = uploadedFileName;
	}

	public int getUploadedFileSizeinMb() {
		return uploadedFileSizeinMb;
	}

	public void setUploadedFileSizeinMb(int uploadedFileSizeinMb) {
		this.uploadedFileSizeinMb = uploadedFileSizeinMb;
	}

	public Date getUploadeDate() {
		return uploadeDate;
	}

	public void setUploadeDate(Date uploadeDate) {
		this.uploadeDate = uploadeDate;
	}

	public String getUploadedByUserName() {
		return uploadedByUserName;
	}

	public void setUploadedByUserName(String uploadedByUserName) {
		this.uploadedByUserName = uploadedByUserName;
	}
}