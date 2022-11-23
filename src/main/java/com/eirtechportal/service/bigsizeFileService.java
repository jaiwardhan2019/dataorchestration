package com.eirtechportal.service;

import com.eirtechportal.models.DocumentConversionDetailMaster;
import com.eirtechportal.models.FileDetail;
import com.eirtechportal.models.UserMaster;
import com.eirtechportal.models.UsersMasterForCsv;
import org.springframework.web.multipart.MultipartFile;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.util.List;

public interface bigsizeFileService {

    /*
     *  Author  : Jai Wardhan
     *  Date    : 05 - Nov -2022
     *  Purpose : Upload Big size XML File and save to the server
     * */

    public List<FileDetail> uploadBigSizeFile(HttpServletResponse requEst, MultipartFile files , String userName);

}
