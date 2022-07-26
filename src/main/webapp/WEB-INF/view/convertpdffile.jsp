<%@include file="include/header.jsp" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn" %>

<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<script type="text/javascript">


function search_progress() {
    var e = document.getElementById("convertbtn");
    if(e.style.display == 'block')
       e.style.display = 'none';
    else
       e.style.display = 'block';

    var e1 = document.getElementById("searchbutton1");
    if(e1.style.display == 'block')
        e1.style.display = 'none';
     else
        e1.style.display = 'block';
 }



function Validate_Xml_File(filePath) {

	var allowedExtensions = /(\.pdf)$/i;

	if (!allowedExtensions.exec(filePath)) {
		document.getElementById('validationstatus').innerHTML = "<span style='color:red' > Invalid file type\n You have to select .pdf File Only..!! </span>";
		return false;
	} else {
		return true;
	}
}


function validateSupplierInvoice(){
    var filelist = document.getElementById('cfile').files;
    for(var i=0; i<filelist.length; i++){writefiles(filelist[i]);}
}

function writefiles(file){
    var reader = new FileReader();
    reader.onload = function(){
        alert(reader.result);
    }
    reader.readAsText(file, "UTF-8");
}





function Convert_CsvFile() {

	if (document.convertpdffile.cfile.value == "") {
		document.getElementById('validationstatus').innerHTML = "<span style='color:red' > Please Select File....!! </span>";
		document.convertpdffile.cfile.focus();
		return false;
	}
	if (Validate_Xml_File(document.convertpdffile.cfile.value)) {
		//search_progress();
		document.convertpdffile.method = "POST";
		document.convertpdffile.action = "convertpdffiletoexcel";
	    document.convertpdffile.submit();
		return true;
	}

}//---------- End Of Function  ------------------



function Download_Excel_File(fileFullPath) {

		document.convertpdffile.method = "POST";
		document.convertpdffile.action = "viewdownloadalldocuments/"+fileFullPath;
	    document.convertpdffile.submit();
		return true;

}//---------- End Of Function  ------------------





</script>









<body >
<br>
<br>
<br>


<!-- First Part of page -->
<ul class="breadcrumb">
    <li><a href="javascript:void();" onClick="calHomePage();">Home</a></li>
    <li>Convert File </li>
    <li>Convert PDF File</li>
</ul>

<div class="col-md-12 col-sm-12 col-xs-12"  align="left">
    <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>&ensp;&ensp;<span style="font-weight:600;font-size:13pt;">Convert PDF to Excel </span></a>
</div>
 <br>
 <br>
 <br>
<!-- End First Part of page -->



<!-- Start Body Part of page -->

 <div class="container" align="center">
 <div class="col-md-12 col-sm-12 col-xs-12" align="center">

 <form name="convertpdffile" id="convertpdffile" method="post" enctype="multipart/form-data">

    <input type="hidden" id="profilelist" name="profilelist" value="${profilelist}">

      <table class="table table-striped table-bordered" border="1" style="width: 40%;" align="center">
    		<tbody>
			     <tr align="center">
					 <td  bgcolor="#0070BA" colspan="2">
					   <span style="color:white;"> <i class="fa fa-file-excel-o" aria-hidden="true"></i> &nbsp;<b>
					    Convert PDF File &nbsp;&nbsp;
					   </b></span>
					 </td>
			     </tr>



	           <tr>
	              <td align="right" bgcolor="white" width="40%">
					<div><label>.PDF File </label></div>
				  </td>

                 <td align="right" bgcolor="white" width="60%">
			         	<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-paperclip fa-lg" aria-hidden="true"></i></span>
									 <input type="file"  id="cfile"  name="cfile"   class="form-control"/>
						</div>
				 </td>

	           </tr>

	                <tr align="center" >

						<td  bgcolor="white" colspan="2">

					        <span style="display:block" id="convertbtn">
					           <input type="button"   class="btn btn-primary" value="Convert" onclick="Convert_CsvFile();" />
					        </span>

					        <span style="display:none" id="searchbutton1">
					                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:100%">
							         <b>Converting File please wait....</b>&nbsp;&nbsp;<i class="fa fa-spinner fa-pulse fa-2x"></i>
							         </div>
					        </span>
			 			     </td>
				     </tr>


					      <tr align="center">
							<td  bgcolor="white" colspan="2" id="validationstatus">
							  <span style="color:red" >  </span>
							</td>
						  </tr>




				    </tbody>
			</table>
	    </form>
     </div>

  </div>



	 <c:if test="${fn:length(dataList) > 0}">
              <br>
              <br>
              <table class="table table-striped table-bordered" border="1" style="width: 60%;" align="center">
                    <tbody>
                         <tr align="center">
                             <td  colspan="5" align="center">
                               <span style="color:blue;"> <i class="fa fa-download" aria-hidden="true"></i> <a href="javascript:void()" onClick="Download_Excel_File('${dataList}');"> Download File </a> </span><br>

                             </td>
                         </tr>

                          </tbody>
                    </table>

 </c:if>







</body>
</html>
<br>
<br>
<br>
<br>
<%@include file="include/footer.jsp" %>