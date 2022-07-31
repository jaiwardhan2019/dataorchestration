package com.eirtechportal.daorepository;


import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import org.springframework.data.repository.CrudRepository;


public interface DocumentConversionDetailMasterDao extends CrudRepository<DocumentConversionDetailMaster, Long> {
	
	UserMaster findByuserFullName(String userFullName);


}