<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn" %>
<%@ taglib prefix = "fmt" uri = "http://java.sun.com/jsp/jstl/fmt" %>


<!DOCTYPE html>
<html lang="en">
<head>

<script>


    /*--- THIS PIECE OF CODE WILL DISABLE THE MOUSE RIGHT CLICK ------------ --


    var isNS = (navigator.appName == "Netscape") ? 1 : 0;
	if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);

	function mischandler(){
	    return false;
	}

	function mousehandler(e){
	var myevent = (isNS) ? e : event;
	var eventbutton = (isNS) ? myevent.which : myevent.button;
	if((eventbutton==2)||(eventbutton==3)) return false;
	}

	document.oncontextmenu = mischandler;
	document.onmousedown = mousehandler;
	document.onmouseup = mousehandler;
	*/
</script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">




	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custome CSS -->
	<link rel="stylesheet" href="css/freelancer.css">

	<!-- FontAwesome FA FA ICONS -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">

	<!-- CUSTOM CSS BY SURAJIT -->
	<link rel="stylesheet" href="css/custom-style.css">

	<!-- Offline GOOGLE Fonts -->
	<link href="google-font/google-font-montserrat-400-700.css" rel="stylesheet" type="text/css">
    <link href="google-font/google-font-400-700.css" rel="stylesheet" type="text/css">

	<!-- Favicon -->
	<link rel="icon" type="image/png"  href="include/images/logo/favicon.png">



</head>






<script type="text/javascript">





//--- This function will be loading all pages to the body main area
//function loadJspPagetoTheBody(callingpagename) {
//		var callingurl = "loadjsppage?pagename="+callingpagename;
//		$('#mainbody').load(callingurl);
//}


function calHomePage(){
	document.portal.method="POST";
	document.portal.action="index";
    document.portal.submit();
	return true;
}

function loadCsvFileConversionPage() {
    document.portal.method="POST";
	document.portal.action="loadcsvconvertergui";
    document.portal.submit();
	return true;
}



function loadPdfFileConversionPage() {
    document.portal.method="POST";
	document.portal.action="loadpdftoexcelgui";
    document.portal.submit();
	return true;
}





function loadJsonFileConversionPage() {
    document.portal.method="POST";
	document.portal.action="loadjsonconvertergui";
    document.portal.submit();
	return true;
}



function Logout_application(){

	 if (confirm("Close Window?")) {
        close();
      }



}

</script>

<form name="portal" id="portal">

</form>




<!-- Menu --->
<nav class="navbar navbar-default navbar-fixed-top panel-shadow">

<div class="container-fluid" style="background:#0071ba;" >

    <div class="navbar-header">
	     <img src="images/radiant-logo.png" alt="Home Page" class="img-responsive"  />
		<!--<span style="color:white"> <h5> Company Name  </h5> </span> -->
    </div>


 <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="navbar-header navbar-right">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href=""></a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

             <li class="dropdown">
                <a href="javascript:void();" onClick="calHomePage();" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-home fa-lg" aria-hidden="true"></i> Home</a>
            </li>




            <li class="dropdown">

                <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Convert File <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="left:0;width:200px;">
                        <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="loadPdfFileConversionPage();"  style="font-size:09pt;color:#FDFEFE;">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;PDF to Excel </a>
                        </li>

              </ul>
            </li>


            <!--

            <li class="dropdown">

                <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;Data Orchestation <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="left:0;width:200px;">
                        <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="loadCsvFileConversionPage();"  style="font-size:09pt;color:#FDFEFE;">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Convert CSV File</a>
                        </li>
                        <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="loadJsonFileConversionPage();"  style="font-size:09pt;color:#FDFEFE;">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Convert Json File</a>
                         </li>
              </ul>
            </li>

            -->



			<li class="dropdown">
			  <a onmouseover="this.click()" href="#" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i>&nbspJai Wardhan<span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li style="margin-top:3px;margin-bottom:3px;"><a  href="javascript:window.close();" onClick="javascript:window.close();" style="font-size:9pt;">Logout</a></li>
			  </ul>
			</li>



	        <!--
				         <li class="dropdown">

							  <a onmouseover="this.click()" style="font-size:09pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-plane" aria-hidden="true"></i> &nbsp;Reports <span class="caret"></span></a>

								  <ul class="dropdown-menu" style="left:0;width:200px;">
					   		               <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calFlightReport('flightreport?airlinecode=ALL&airportcode=ALL&flightno=');"  style="font-size:09pt;color:black;"><img src="images/database.png">&nbsp;&nbsp;Flight Report (MayFly)</a></li>
								         <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calFlightReport('reliablityflightreport?airlinecode=ALL&airportcode=ALL&delayCodeGroupCode=ALL&tolerance=0&flightno=');"  style="font-size:09pt;color:black;"><img src="images/database.png">&nbsp;&nbsp;Reliability Report</a></li>


									  <c:if test = "${fn:contains(profilelist, 'DelayReport')}">
									         <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calFlightReport('delayflightreport?airlinecode=ALL&airportcode=ALL&tolerance=0&delayCodeGroupCode=ALL&flightno=');"  style="font-size:09pt;color:black;"><img src="images/database.png">&nbsp;&nbsp;Delay Reports</a></li>
									    </c:if>

									     <c:if test = "${fn:contains(profilelist, 'OtpReport')}">
									        <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calFlightReport('otpflightreport?airlinecode=ALL&airportcode=ALL&tolerance=0&delayCodeGroupCode=ALL');"   style="font-size:09pt;color:black;"><img src="images/database.png">&nbsp;&nbsp;OTP Report</a></li>
									     </c:if>

							    </ul>

						</li>

				<li class="dropdown">
					   <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;GCI /GCM /GCR&nbsp;<span class="caret"></span></a>
				   	   <ul class="dropdown-menu" style="left:0;width:200px;">
		 		   	    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=GCI&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png">  &nbsp;&nbsp;Ground Crew Instructions &nbsp; </a></li>
		 		   	    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=GCM&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Ground Crew Memos &nbsp; </a></li>
		 		   	    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=GCR&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Ground Crew Reminders &nbsp; </a></li>

			            </ul>
				</li>


	    <li class="dropdown">
	  	    <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Manuals&nbsp;<span class="caret"></span></a>
	  	   	   <ul class="dropdown-menu" style="left:0;width:200px;">
      		   	    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=MAND&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;De-Icing Manuals &nbsp; </a></li>
      		   	    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=MANG&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Ground Ops Manual &nbsp; </a></li>

            </ul>
		</li>


		    <li class="dropdown">

		  	    <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Safety / Security / Compliance<span class="caret"></span></a>

		  	   	   <ul class="dropdown-menu" style="left:0;width:227px;">

				   	      <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SCM&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Compliance Monitoring &nbsp; </a></li>
				   	      <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SGO&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Ground Ops Safety Statistics &nbsp; </a></li>
		 	   	         <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dgopm&operation=view&alfresco=YES');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Ground Ops Manual </a></li>
				   	      <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSB&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Safety Bulletins &nbsp; </a></li>
				   	      <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSM&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;&nbsp;Safety Manual &nbsp; </a></li>
						  <li class="dropdown-submenu" style="margin-top:3px;margin-bottom:3px;">
								<a class="test" tabindex="-1"  style="font-size:09pt;"><img src="images/folder.png"> &nbsp;&nbsp;Security &nbsp;&nbsp;<i class="fa fa-caret-right" style="font-size:14px"></i>&nbsp;</a>
									<ul class="dropdown-menu" style="width:200px;">
									        <li><a class="navclass"  href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSEP&operation=view&alfresco=YES');" style="font-size:09pt;"><img src="images/folder.png">&nbsp;Security Programme  </a></li>
									         <li><a class="navclass"  href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSEN&operation=view&alfresco=YES');" style="font-size:09pt;"><img src="images/folder.png">&nbsp;Security Notice</a></li>
									         <li><a class="navclass"  href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSEI&operation=view&alfresco=YES');" style="font-size:09pt;"><img src="images/folder.png">&nbsp;Security Instructions</a></li>
									         <li><a class="navclass"  href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=SSEF&operation=view&alfresco=YES');" style="font-size:09pt;"><img src="images/folder.png">&nbsp;Security Forms</a></li>
									</ul>

						  </li>


				     </ul>
			</li>


		    <li class="dropdown">
		  	    <a onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Training  &nbsp;<span class="caret"></span></a>
		  	   	   <ul class="dropdown-menu" style="left:0;width:250px;">
	 		    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=trd&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Dispatch and Load Control </a></li>
			    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=trbg&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Baggage Tracing General </a></li>
			    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=tras&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Aer Lingus Airport Service Guide </a></li>
			    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=trac&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Aer Lingus Check-in and Boarding </a></li>
			    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=trar&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Aer Lingus Reservations </a></li>
			    	       <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=trs&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Stobart Air Training Modules </a></li>
		             </ul>
			</li>


		    <li class="dropdown">
			  <a href="javascript:void();" onClick="calDocumentReport('wtstatement?airlinecode=ALL&airlinereg=ALL');" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Weight Statements</a>
			</li>





	    <li class="dropdown">
		  <a   onmouseover="this.click()" style="font-size:9pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;Documentation&nbsp;<span class="caret"></span></a>

			   <ul class="dropdown-menu" style="left:0;width:250px;">
 		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dchm&operation=view&alfresco=YES');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Catering - HAACP Manual</a></li>

		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=diam&operation=view&alfresco=YES');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;De-icing & Anti-Icing Manual</a></li>
		     	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dcompm&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Compliance Monitoring </a></li>

			    <li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dcle&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Cleaning </a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dqrd&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Quick Reference Documents </a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=derp&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Emergency Response Plan </a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dalso&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Aer Lingus Station Overview </a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dcls&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Computerised Loading-System</a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a href="javascript:void();" onClick="calDocumentReport('listdocuments?cat=dseat&operation=view');"  style="font-size:09pt;color:black;"><img src="images/folder.png"> &nbsp;Seat Maps</a></li>


              	<li style="margin-top:3px;margin-bottom:3px;"><a  href="AerLingusStationOverview.pdf" target="_new"  style="font-size:09pt;color:black;"><img src="pdf.png"> &nbsp;Aer Lingus Station Overview </a></li>
		    	<li style="margin-top:3px;margin-bottom:3px;"><a  href="StatusofComputerisedLoadsystems.pdf" target="_new"  style="font-size:09pt;color:black;"><img src="pdf.png"> &nbsp;Computerised Loading-System </a></li>

		       </ul>

		</li>

			<li class="dropdown">
					  <a href="#" onmouseover="this.click()" style="font-size:09pt;font-weight:600;color:#FDFEFE;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-user-circle"></i>&nbsp;&nbsp;User Name &nbsp;<span class="caret"></span></a>
					  <ul class="dropdown-menu" style="left:0;width:200px;">
					      <li style="margin-top:0px;margin-bottom:0px;"><a href="logout" style="font-size:09pt;color:black;"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a></li>

					  </ul>
			 </li>

         -->



		</ul>

		  </div>

      </div>





</nav>




<!-- End of  Menu  --->




<!-- jQuery -->
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
