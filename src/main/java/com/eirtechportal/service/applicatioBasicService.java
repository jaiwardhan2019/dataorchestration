package com.eirtechportal.service;

import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.UserMaster;
import com.eirtechportal.models.UsersMasterForCsv;
import org.springframework.web.multipart.MultipartFile;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.List;

public interface applicatioBasicService {



    /*
     *  Author  : Jai Wardhan
     *  Date    : 28 - July -2022
     *  Purpose : Register User and save their detail to the DB
     * */
    public UserMaster registerNewUser(UserMaster user) throws Exception;



    /*
     *  Author  : Jai Wardhan
     *  Date    : 29 - July -2022
     *  Purpose : Validate  User Name and Password from DB
     * */
    public String[] validateUserLoginDetail(String userLoginName , String userPassword) throws Exception;





    /*
    *  Author  : Jai Wardhan
    *  Date    : 03 - Jun -2022
    *  Purpose : Purpose of this method to upload the .csv file to the given folder and once the file is uploaded then do the
    *            orchastation and save data in the new file.
    * */
    public List<UsersMasterForCsv> uploadAdnConvertCsvFile(HttpServletRequest requEst, MultipartFile files)throws IOException;




    /*
     *  Author  : Jai Wardhan
     *  Date    : 26 - July -2022
     *  Purpose : Purpose of this method to upload the .pdf file to the given folder and once the file is uploaded then do the
     *            orchastation and save data in the new file.
     * */
    public String uploadAdnConvertPdfFileToExcel(HttpServletResponse requEst, MultipartFile files , String userName)throws IOException;

}
