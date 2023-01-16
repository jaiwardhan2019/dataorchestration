<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<!DOCTYPE html>
<html lang="en">
<head>

<script>


</script>


    <meta charset="utf-8">   
    <title>Radiant | Portal | Login  </title>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<c:url value="css/freelancer.css"/>">

	<!-- FontAwesome FA FA ICONS -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">

	<!-- Offline GOOGLE Fonts -->

	<link href="<c:url value="google-font/google-font-montserrat-400-700.css"/>"  >
	<link href="<c:url value="google-font/google-font-400-700.css"/>"  >

	<!-- Favicon
	 <img src="images/radiant-logo.png" alt="Home Page" class="img-responsive"  />
    -->
    
<!--Login box shadow-->

<style>
	.panel-shadow{
		-webkit-box-shadow: 3px 3px 10px 0px rgba(50, 50, 50, 0.23);
		-moz-box-shadow:    3px 3px 10px 0px rgba(50, 50, 50, 0.23);
		box-shadow:         3px 3px 10px 0px rgba(50, 50, 50, 0.23);
	}
</style>
	
</head>


<body style="font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;background-color:#F8F9F9; background-position: 50% 50%;background-size:cover;">



<script>
function myFunction(){
   
    var loginname = document.getElementById("loginname").value.trim();
    var password = document.getElementById("password").value.trim();
    if(loginname == ''){
      document.getElementById('validationstatus').innerHTML = "<span style='color:red;' > Please enter your loginname</span>";
      document.getElementById("loginname").focus();
      return false;
    } 
    
    if(password == ''){
       	document.getElementById('validationstatus').innerHTML = "<span style='color:red;' > Please enter your password.</span>";
        document.getElementById("password").focus();
        return false;
    }
    
    if(loginname != '' && password != ''){
       	document.login.method = "post"
    	document.login.action = "authenticate";
        document.login.submit();
        return true;        
    }//----- End of if else 
      
    
}//------End of function 

</script>

<br>
<br>
<br>
<form method="post" name="login" onSubmit="return myFunction()";>
	 
<!-- Body Banner -->
<div class="container " style="margin-top:30px;">
	
	<div class="row">
        <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
			
			<div class="panel panel-default" style="height:350px;background:#0071ba;;">
				<div class="panel-body">
						
					<div class="row">
						<div class="col-md-5 col-sm-6 col-xs-12">
							<div class="panel panel-default panel-shadow" style="height:400px;">
								<div class="panel-body">									
									<div class="row hidden-md hidden-sm hidden-lg" style="margin-bottom:8px;">
										<div>
											
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<h5 class="" style="font-weight:600;color:#468499;">LOGIN TO  PORTAL</h5>
											<hr />
										</div>
									</div>
									
									<div class="row" style="margin-bottom:10px;">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2" style="background:#005da8;border-color:#005da8;color:#fff;"><i class="fa fa-user fa-fw"></i></span>
												<input type="text"  autofocus name="loginname"  id="loginname" style="font-size:9pt;" class="form-control" placeholder="Email Id or User ID" aria-describedby="sizing-addon2"/>
											</div>
											<span style="font-size:10pt;" id="warning_username"></span>
										</div>
									</div>
									
									<div class="row" style="margin-bottom:10px;">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="input-group">
												<span class="input-group-addon" id="sizing-addon2" style="background:#005da8;border-color:#005da8;color:#fff;"><i class="fa fa-lock fa-fw"></i></span>
												<input type="password" name="password" id="password" style="font-size:9pt;" class="form-control" placeholder="Enter Password" aria-describedby="sizing-addon2" />
											</div>
											
										</div>
									</div>
								
								
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12 text-right">
											<span class="btn btn-primary" id="login_button" style="font-weight:600;font-size:9pt;" onClick="myFunction();"><i class="fa fa-lock fa-fw"></i>Login Securely</span><br/>
											<input type="submit" value="submit" style="display:none;" /> <br>
											<a href="" target="_new" style="font-size:9pt;" >Forgot your password?</a>
										</div>
									</div>
                                     <br>
									<div class="row">
									    <p bgcolor="white" colspan="2" id="validationstatus" align="center"></p>
									    <p bgcolor="white" style='color:red;'   align="center"> ${loginStatus}</p>
									</div>


								</div>
							</div>
						</div>
						
						<div class="col-md-6 col-md-offset-1 col-sm-5 col-sm-offset-1 hidden-xs">
							<div class="row" style="margin-bottom:8px;">
								<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="padding-top:0px;">
									<img src="<c:url value="images/radiant-logo.png"/>" class="img-responsive" style="margin-top:-0px;"/>
								</div>
							</div>
							<hr style="margin-bottom:8px;margin-top:8px;"/>
							<div class="row">
								<div class="col-md-12 col-sm-9 col-xs-12" style="color:#FDFEFE;font-size:10pt;font-weight:400;">
									<i class="fa fa-pencil fa-fw" size="medium" color="white" aria-hidden="true"></i>
									&nbsp; Manage all in-house Business Activity in one place.
								</div>
							</div>
                            <hr style="margin-bottom:8px;margin-top:8px;"/>
							<div class="row">
								<div class="col-md-12 col-sm-9 col-xs-12" style="color:#FDFEFE;font-size:10pt;font-weight:400;">
									<i class="fa fa-file-pdf-o fa-fw" size="medium" color="white" aria-hidden="true"></i>
									&nbsp; Convert PDF File to EXCEL.
								</div>
							</div>
							<hr style="margin-bottom:8px;margin-top:8px;"/>
							<div class="row">
								<div class="col-md-12 col-sm-9 col-xs-12" style="color:#FDFEFE;font-size:10pt;font-weight:400;">
									<i class="fa fa-file-excel-o fa-fw" size="medium" color="white" aria-hidden="true"></i>
									&nbsp; Convert AMOS CSV File to EXCEL Report.
								</div>
							</div>
							<hr style="margin-bottom:8px;margin-top:8px;"/>
							<div class="row">
								<div class="col-md-12 col-sm-9 col-xs-12" style="color:#FDFEFE;font-size:10pt;font-weight:400;">
									<i class="fa fa-line-chart fa-fw" size="medium" color="white" aria-hidden="true"></i>
									&nbsp;Easy report generation.
								</div>
							</div>

						</div>
					</div>
			
				</div>
			</div>
		</div>
	</div>
</div>

</form>

<!--OnClick Trigger --->

	<script>

		$("#loginname").keyup(function(event){
			if(event.keyCode == 13){
				$("#login_button").click();
			}
		});
	</script>
	
</body>

<br>
<br>
<footer class="text-center" style="padding-top:0px;">
      <div class="col-lg-12" >
           <h6 style="color:#000;font-weight:600;">
                        @ Radiant Solutions  <%= new java.text.SimpleDateFormat("yyyy").format(new java.util.Date()) %>, All rights reserved.
            </h6>
        </div>
 </footer>


 <script>

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
 </script>
</html>

  
