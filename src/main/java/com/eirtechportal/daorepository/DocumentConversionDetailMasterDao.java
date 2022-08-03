package com.eirtechportal.daorepository;


import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import java.util.List;


public interface DocumentConversionDetailMasterDao extends CrudRepository<DocumentConversionDetailMaster, Long> {
	
	UserMaster findByuserFullName(String userFullName);

	@Query("select doc from DocumentConversionDetailMaster doc  where doc.userFullName=?1")
	List<DocumentConversionDetailMaster> findUserDocumentsConvertedCount(String userFullName);



}