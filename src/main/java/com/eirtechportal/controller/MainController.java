package com.eirtechportal.controller;

import org.springframework.ui.ModelMap;
import org.springframework.util.MimeTypeUtils;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.servlet.ModelAndView;


@RestController
@CrossOrigin
public class MainController {


    @RequestMapping(value = {"/" , "/home"},method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView invoiceHomePage(ModelMap model) throws Exception{
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("homePage");
        return modelAndView;
    }//--------------- End Of Function -------------


    @RequestMapping(value = {"/contactus"},method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView invoiceContactUsPage(ModelMap model) throws Exception{

        model.addAttribute("address", "Vietnam");
        model.addAttribute("phone", "...");
        model.addAttribute("email", "...");
        model.addAttribute("email", "...");
        model.addAttribute("email", "...");
        model.addAttribute("email", "...");
        model.addAttribute("email", "...");
        model.addAttribute("email", "...");

        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("contactusPage");
        return modelAndView;
    }//--------------- End Of Function -------------


    @RequestMapping(value = "/test",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public ModelAndView invoiceConversionTool(ModelMap model) throws Exception{
        //if (true) {throw new UserException("This is error message ");}
        ModelAndView modelAndView = new ModelAndView();
        modelAndView.setViewName("testPage");
        return modelAndView;
    }//--------------- End Of Function -------------

/*

    @Autowired
    JdbcTemplate objJdbcTemplet;

    @RequestMapping(value = "/testdb",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public String testDb() throws Exception{

        Connection con = objJdbcTemplet.getDataSource().getConnection();
        DatabaseMetaData obj = (DatabaseMetaData) con.getMetaData();
        Statement sta2 = con.createStatement();
        ResultSet rs = sta2.executeQuery("select * from HCR_Patient where HCRName='\\M09\\D08\\FM\\WM230000.HCR\'");
        String allName = "";
        while(rs.next()){
            System.out.println(rs.getString("Name"));
            allName = allName + rs.getString("Name");
        }
        return "Database Name :"+obj.getDatabaseProductName()+ "  Version :" +obj.getDatabaseMajorVersion() + allName;

    }//--------------- End Of Function -------------


    private final String HRC_NAME       = "\\M12\\D22\\FP\\AP830000.HCR\n";
    private final String TRANSACTION_VERSION = "11VM01000S4KCRHPT5G9AE9GIHKLO5UTHZZ";
    private final String RDV_ID = "{9C8ED948-17B9-4B94-9A46-50F17157BE3Z}";
    private final String RESOURCES_NAME = "UDr Pramod Kumar Agarwal";
    private final float  DURATION   = 10;
    private final String BLOCK_DETAIL   = "Block 10 min";


    @RequestMapping(value = "/createbooking",method = {RequestMethod.POST,RequestMethod.GET}, produces = { MimeTypeUtils.TEXT_PLAIN_VALUE })
    public String createBooking() throws Exception{

        Connection con = objJdbcTemplet.getDataSource().getConnection();
        DatabaseMetaData obj = (DatabaseMetaData) con.getMetaData();
        Statement sta2 = con.createStatement();
        ResultSet rs = sta2.executeQuery("select * from HCR_Patient where HCRName='\\M01\\D01\\FJ\\UJ000000.HCR'");
        String allName = "";
        while(rs.next()){
            System.out.println(rs.getString("Name"));
            allName = allName + rs.getString("Name");
        }

        DateTimeFormatter DT_FOMATTER = DateTimeFormatter.ofPattern("yyyy-MM-dd HH:mm:ss:SSS");
        String curentDateTime = DT_FOMATTER.format(LocalDateTime.now());

        String sqlInsert = "insert into RDV_Appointment(HCRName , TransactionVersionID , RdvID , ScheduleDate , BookDate , Duration , Ressources , RdvType ) " +

                " values( '"+HRC_NAME+"', '"+TRANSACTION_VERSION+"' , '"+RDV_ID+"' ,'"+curentDateTime+"' , '"+curentDateTime+"' , " +
                  DURATION +",'"+RESOURCES_NAME+"' , '"+BLOCK_DETAIL+"')";

        System.out.println(sqlInsert);

        return "Booking Created Status # "+sta2.execute(sqlInsert)+ " # with this date :"+curentDateTime;

    }//--------------- End Of Function -------------



*/




}
