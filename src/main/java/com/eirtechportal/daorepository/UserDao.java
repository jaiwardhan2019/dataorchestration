package com.eirtechportal.daorepository;


import com.eirtechportal.models.UserMaster;
import org.springframework.data.repository.CrudRepository;


public interface UserDao extends CrudRepository<UserMaster, Integer> {
	
	UserMaster findByusername(String userlLogin);

	UserMaster findByuserId(int userId);



}