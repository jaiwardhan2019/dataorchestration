package com.dataorchestration.service;

import com.dataorchestration.models.UsersMaster;
import org.springframework.web.multipart.MultipartFile;
import org.xml.sax.SAXException;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.xml.parsers.ParserConfigurationException;
import java.io.IOException;
import java.util.List;

public interface dataOrchesTration {

    /*
    *  Author  : Jai Wardhan
    *  Date    : 03 - Jun -2022
    *  Purpose : Purpose of this method to upload the .csv file to the given folder and once the file is uploaded then do the
    *            orchastation and save data in the new file.
    * */
    public List<UsersMaster> uploadAdnConvertCsvFile(HttpServletRequest requEst, MultipartFile files)throws IOException;




    /*
     *  Author  : Jai Wardhan
     *  Date    : 26 - July -2022
     *  Purpose : Purpose of this method to upload the .pdf file to the given folder and once the file is uploaded then do the
     *            orchastation and save data in the new file.
     * */
    public String uploadAdnConvertPdfFileToExcel(HttpServletResponse requEst, MultipartFile files)throws IOException;

}
