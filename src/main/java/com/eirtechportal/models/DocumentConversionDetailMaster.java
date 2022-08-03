package com.eirtechportal.models;

import javax.persistence.*;
import java.util.Date;

@Entity
@Table(name = "document_conversion_detail_master",uniqueConstraints = { @UniqueConstraint(columnNames = "ID") })
public class DocumentConversionDetailMaster {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "ID")
	private long Id;

	@Column(name = "INPUTFILEWITHPATH")
	private String inputFileWithPath;

	@Column(name = "OUTPUTFILEWITHPATH")
	private String outputFileWithPath;

	@Column(name = "USERFULLNAME")
	private String userFullName;

	@Column(name = "CONVERSIONDATE")
	private Date conversionDate;

	public long getId() {
		return Id;
	}

	public void setId(int id) {
		Id = id;
	}

	public String getInputFileWithPath() {
		return inputFileWithPath;
	}

	public void setInputFileWithPath(String inputFileWithPath) {
		this.inputFileWithPath = inputFileWithPath;
	}

	public String getOutputFileWithPath() {
		return outputFileWithPath;
	}

	public void setOutputFileWithPath(String outputFileWithPath) {
		this.outputFileWithPath = outputFileWithPath;
	}

	public String getUserFullName() {
		return userFullName;
	}

	public void setUserFullName(String userFullName) {
		this.userFullName = userFullName;
	}

	public Date getConversionDate() {
		return conversionDate;
	}

	public void setConversionDate(Date conversionDate) {
		this.conversionDate = conversionDate;
	}

}