<%@include file="include/header.jsp" %>
<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/functions" prefix="fn" %>

<html>
<head>
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

	var allowedExtensions = /(\.xml)$/i;

	if (!allowedExtensions.exec(filePath)) {
		document.getElementById('validationstatus').innerHTML = "<span style='color:red' > Invalid file type\n You have to select .xml File Only..!! </span>";
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





function uploadXmlFile() {

	if (document.uploadlargefile.cfile.value == "") {
		document.getElementById('validationstatus').innerHTML = "<span style='color:red' > Please Select File....!! </span>";
		document.uploadlargefile.cfile.focus();
		return false;
	}
	if (Validate_Xml_File(document.uploadlargefile.cfile.value)) {
		search_progress();
		document.uploadlargefile.method = "POST";
		document.uploadlargefile.action = "uploadlargefile";
	    document.uploadlargefile.submit();
		return true;
	}

}//---------- End Of Function  ------------------



function Download_Excel_File(fileFullPath) {

		document.uploadlargefile.method = "POST";
		document.uploadlargefile.action = "viewdownloadalldocuments/"+fileFullPath;
	    document.uploadlargefile.submit();
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
    <li>Large File Process </li>
    <li>Upload File </li>
</ul>

<div class="col-md-12 col-sm-12 col-xs-12"  align="left">
    <i class="fa fa-cogs fa-2x" aria-hidden="true"></i>&ensp;&ensp;<span style="font-weight:600;font-size:13pt;">Upload Large File </span></a>
</div>
 <br>
 <br>
 <br>


<!-- Start Body Part of page -->

 <div class="container" align="center">

 <div class="col-md-12 col-sm-12 col-xs-12" align="center">

 <form name="uploadlargefile" id="uploadlargefile" method="post" enctype="multipart/form-data">
    <input type="hidden" id="profilelist" name="profilelist" value="${profilelist}">
      <table class="table table-striped table-bordered" border="1" style="width: 40%;" align="center">
    		<tbody>
			     <tr align="center">
					 <td  bgcolor="#0070BA" colspan="2">
					   <span style="color:white;"> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> &nbsp;<b>
					    Customer File Upload &nbsp;&nbsp;
					   </b></span>
					 </td>
			     </tr>

	           <tr>
	              <td align="right" bgcolor="white" width="40%">
					<div><label>.XML File </label></div>
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
					           <input type="button"   class="btn btn-primary" value="Upload" onclick="uploadXmlFile();" />
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

<br>

        <c:if test="${not empty fileStatus}">
        <br>

          <table class="table table-striped table-bordered" border="1" style="width: 40%;" align="center">
                <tbody>
                     <tr align="center">

                         <td  colspan="3" align="left">
                             <img src="images/page_white_text.png"/> &nbsp;&nbsp;
                             <a href="javascript:void()" onClick="Download_Excel_File('${fileStatus}');">
                              ${fileStatus}
                              </a>

                         </td>

                         <td   align="center">
                            <a href="javascript:void()" onClick="Download_Excel_File('${fileStatus}');">
                               <i class="fa fa-download" aria-hidden="true"></i> </span>
                            </a>
                         </td>
                     </tr>


                    </tbody>
                </table>
        </c:if>




</body>
</html>
<%@include file="include/footer.jsp" %>