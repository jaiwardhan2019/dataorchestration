<script>
/*
	EGO Developers | Surajit Majumdar
	Contact : +91 9614411550 | hello@surajitmajumdar.com | hello@egodevelopers.com
	Last update 9-Aug-2019
	
	v 1.0.6
*/

function login_admin()
{
	var u = document.getElementById("username").value;			// Set variables. Get them by their ID
	var p = document.getElementById("password").value;			// Set variables. Get them by their ID
	var al = document.getElementById("actual_link").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
	
// Validate form
if (u == null || u == "" || u == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_username").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your username!</font>";
		return false;
    }
else
	{
		document.getElementById("warning_username").innerHTML = "";
	}

if (p == null || p == "" || p == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_password").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your password!</font>";
		return false;
    }
else
	{
		document.getElementById("warning_password").innerHTML = "";
	}
// Validation done 

document.getElementById("login_message").innerHTML="<br /><i class='fa fa-circle-o-notch fa-spin'></i> Validating admin...";		//Flash this text while loading
if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{ 
          		var resp = xmlhttp.responseText;
				if (resp == 1)
					{
						document.getElementById("login_message").innerHTML = "<br /><div class='alert alert-success' style='margin-top:10px;'><strong><i class='fa fa-tick'></i> Great! </strong> Logged in successfully. Redirecting to home page shortly.</div>";
						//document.getElementById("login_user_flash").innerHTML = "";
						location.href = al;
					}
				else if (resp == 0)
					{
						document.getElementById("login_message").innerHTML = "<br /><div class='alert alert-danger' style='margin-top:10px;'><strong><i class='fa fa-exclamation-triangle'></i> Oops! </strong> Something went wrong with the authentication. Try again.</div>";
						//document.getElementById("login_user_flash").innerHTML = "";
					}
				else if (resp == 2)
					{
						document.getElementById("login_message").innerHTML = "<br /><div class='alert alert-danger' style='margin-top:10px;'><strong><i class='fa fa-exclamation-triangle'></i> Oops! </strong> No such admin is registered. You can always create admin from inside of an admin panel.</div>";
						//document.getElementById("login_user_flash").innerHTML = "";
					}
				else 
					{
						document.getElementById("login_message").innerHTML = "";
						//document.getElementById("login_user_flash").innerHTML = "";
					}
            }
    } 

     xmlhttp.open("GET","logicfiles/login-exec.php?username="+u+"&password="+p+"&actual_link="+al+"&"+rnd,true);
	 xmlhttp.send(); 
}

function register_complete()
{
	
	var fn=document.getElementById("fname").value;			// Set variables. Get them by their ID
	var ln=document.getElementById("lname").value;			// Set variables. Get them by their ID
	var em=document.getElementById("chkemail").value;			// Set variables. Get them by their ID
	var mo=document.getElementById("chkmobile").value;			// Set variables. Get them by their ID
	var ps=document.getElementById("chkpassword").value;			// Set variables. Get them by their ID
	var al=document.getElementById("actual_link").value;			// Set variables. Get them by their ID

	
// Validate form
if (fn==null || fn=="" || fn==" ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_fn").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your first name.</font>";
		return false;
    }
else
	{
		document.getElementById("warning_fn").innerHTML = "";
	}
	
if (ln==null || ln=="" || ln==" ")
    {
		//alert("Please fill your last name.");
		document.getElementById("warning_ln").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your last name.</font>";
		return false;
    }
else
	{
		document.getElementById("warning_ln").innerHTML = "";
	}

if (em==null || em=="" || em==" ")
    {
		//alert("Please fill your email id.");
		document.getElementById("warning_ln").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your email.</font>";
		return false;
    }
else
	{
		var atpos = em.indexOf("@");
		var dotpos = em.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= em.length)
			{
				document.getElementById("warning_email").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter a valid email.</font>";
				return false;
			}
		else
			{
				document.getElementById("warning_email").innerHTML = " ";
			}
	}
	
if (mo==null || mo=="" || mo==" ")
    {
		document.getElementById("warning_mobile").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter a mobile number.</font>";
		return false;
    }
else
	{
		var len_mo = mo.length;
		if (len_mo > 10 || len_mo < 10)
			{
				//alert("You missed the name for pickup location!");
				document.getElementById("warning_mobile").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter a valid 10 digit mobile number.</font>";
				return false;
			}
		else
			{
				document.getElementById("warning_mobile").innerHTML = " ";
			}
	}
	
if (ps==null || ps=="" || ps==" ")
    {
		//alert("Please fill your password.");
		document.getElementById("warning_password").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter a password.</font>";
		return false;
    }
else
	{
		document.getElementById("warning_password").innerHTML = "";
	}
	
if (al==null || al=="" || al==" ")
    {
		//alert("Please fill your password.");
		document.getElementById("warning_al").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Link error occurred! Try reloading the page.</font>";
		return false;
    }
else
	{
		document.getElementById("warning_al").innerHTML = "";
	}
// Validation done
	document.getElementById("register_user_flash").innerHTML="<br /><i class='fa fa-circle-o-notch fa-spin'></i> Registering...";		//Flash this text while loading
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     	} 
    else 
     	{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
		}
     xmlhttp.onreadystatechange = function() 
     	{
          	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
          		  	var resp = xmlhttp.responseText;
				if (resp == 1)
					{
						document.getElementById("register_user_refresh").innerHTML = "<div class='alert alert-success' style='border-radius:0px;'><strong>Great! </strong> Registered successfully.</div>";
						document.getElementById("register_user_flash").innerHTML = "";
						location.href = al;
					}
				else if (resp == 0)
					{
						document.getElementById("register_user_refresh").innerHTML = "<div class='alert alert-danger' style='border-radius:0px;'><strong>Oops! </strong> Something went wrong while registering. Try again.</div>";
						document.getElementById("register_user_flash").innerHTML = "";
					}
				else 
					{
						document.getElementById("register_user_refresh").innerHTML = "";
						document.getElementById("register_user_flash").innerHTML = "";
					}
              	}
        } 

     xmlhttp.open("GET","logicfiles/register-exec.php?fname="+fn+"&lname="+ln+"&email="+em+"&mobile="+mo+"&password="+ps,true);
	 xmlhttp.send(); 
}


function check_email()
{
	var ce=document.getElementById("chkemail").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
// Validate form
if (ce == null || ce == ""  || ce == " ")
      {
		alert("Please fill the email!");
		//document.getElementById("alert_pickup_email").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must provide valid email for communication while pickup!</font>";
		return false;
      }
 else	
	  {
		var atpos = ce.indexOf("@");
		var dotpos = ce.lastIndexOf(".");
		if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= ce.length)
			{
				alert("This is not an email");
				//document.getElementById("alert_pickup_email").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Only valid email id is applicable!</font>";
				return false;
			}
		else
			{
				//document.getElementById("alert_pickup_email").innerHTML = " ";
			}
		//document.getElementById("alert_pickup_email").innerHTML = " ";
	  }
// Validation done

document.getElementById("chk_email_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Checking...";		//Flash this text while loading
				if (window.XMLHttpRequest) 
			      {        		 
          		  xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     			  } 
     			  else 
     			 {       		  
          			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     			 }
     			 xmlhttp.onreadystatechange = function() 
     			 {
          		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		  { 
          		  	document.getElementById("chk_email_refresh").innerHTML =xmlhttp.responseText;
     			      document.getElementById("chk_email_flash").innerHTML="<br/>";
              		  }
             } 

     xmlhttp.open("GET","logicfiles/check_unique.php?email_unique&ce="+ce+"&"+rnd,true);
	 xmlhttp.send(); 
}

function check_mob()
{
	var cm = document.getElementById("chkmobile").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
	
// Validate form
 if (cm==null || cm=="")
      {
		alert("Please fill the phone number!");
		return false;
      }
// Validation done

document.getElementById("chk_mobile_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Checking...";		//Flash this text while loading
	if (window.XMLHttpRequest) {        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } else {       		  
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
			document.getElementById("chk_mobile_refresh").innerHTML =xmlhttp.responseText;
			document.getElementById("chk_mobile_flash").innerHTML="<br/>";
        }
    } 

    xmlhttp.open("GET","logicfiles/check_unique.php?mobile_unique&cm="+cm+"&"+rnd,true);
	xmlhttp.send(); 
}

function check_pass()
{
	var cp = document.getElementById("chkpassword").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
// Validate form
 if (cp==null || cp=="")
      {
		alert("Please fill the password!");
		return false;
      }
// Validation done

document.getElementById("chk_pass_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Checking...";		//Flash this text while loading
	if (window.XMLHttpRequest)  {        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } else {       		  
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
    xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
			document.getElementById("chk_pass_refresh").innerHTML =xmlhttp.responseText;
			document.getElementById("chk_pass_flash").innerHTML="<br/>";
		}
    } 

    xmlhttp.open("GET","logicfiles/check_unique.php?password_unique&cp="+cp+"&"+rnd,true);
	xmlhttp.send(); 
}

function save_prfl()
{
	var profname = document.getElementById("fname").value;			// Set variables. Get them by their ID
	var prolname = document.getElementById("lname").value;			// Set variables. Get them by their ID
	var proemail = document.getElementById("email").value;			// Set variables. Get them by their ID
	var promobile = document.getElementById("mobile").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
	
document.getElementById("prfl_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Saving...";		//Flash this text while loading
				if (window.XMLHttpRequest) 
			      {        		 
          		  xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     			  } 
     			  else 
     			 {       		  
          			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     			 }
     			 xmlhttp.onreadystatechange = function() 
     			 {
          		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		  { 
          		  	document.getElementById("prfl_refresh").innerHTML = xmlhttp.responseText;
     			    document.getElementById("prfl_flash").innerHTML = "<br/>";
              	  }
             } 

     xmlhttp.open("GET","logicfiles/save_profile_exec.php?save&fn="+profname+"&ln="+prolname+"&e="+proemail+"&m="+promobile+"&"+rnd,true);
	 xmlhttp.send(); 
}

function rcvr_account()
{
	var rd = document.getElementById("rcvr_data").value;			// Set variables. Get them by their ID
// Validate form
 if (rd==null || rd=="")
      {
		alert("You must provide at least some details!");
		return false;
      }
// Validation done
document.getElementById("rcvr_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Recovering...";		//Flash this text while loading
				if (window.XMLHttpRequest) 
			      {        		 
          		  xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     			  } 
     			  else 
     			 {       		  
          			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     			 }
     			 xmlhttp.onreadystatechange = function() 
     			 {
          		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		  { 
          		  	document.getElementById("rcvr_refresh").innerHTML = xmlhttp.responseText;
     			    document.getElementById("rcvr_flash").innerHTML = " ";
              	  }
             } 

     xmlhttp.open("GET","logicfiles/forgetpassword_exec.php?recover&data="+rd,true);
	 xmlhttp.send(); 
}

function check_pass_len()
{
	var np = document.getElementById("new_password").value;			// Set variables. Get them by their ID
// Validate form
 if (np==null || np=="")
      {
		alert("You must provide new password!");
		return false;
      }
// Validation done
document.getElementById("cng_pass_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Counting password length...";		//Flash this text while loading
				if (window.XMLHttpRequest) 
			      {        		 
          		  xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     			  } 
     			  else 
     			 {       		  
          			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     			 }
     			 xmlhttp.onreadystatechange = function() 
     			 {
          		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		  { 
          		  	document.getElementById("cng_pass_refresh").innerHTML = xmlhttp.responseText;
     			    document.getElementById("cng_pass_flash").innerHTML = " ";
              	  }
             } 

     xmlhttp.open("GET","logicfiles/check_unique.php?password_check&np="+np,true);
	 xmlhttp.send(); 
}

function change_password()
{
	var op = document.getElementById("old_password").value;			// Set variables. Get them by their ID
	var nep = document.getElementById("new_password").value;			// Set variables. Get them by their ID
	var ncp = document.getElementById("new_cnf_password").value;			// Set variables. Get them by their ID
	var rnd = Math.random();
// Validate form
 if (op==null || op=="")
      {
		alert("You must provide old password!");
		return false;
      }
 else if (ncp==null || ncp=="")
      {
		alert("You must confirm new password!");
		return false;
      }
 else if (nep != ncp)
	  {
		alert("Your new password and confirm password didn't matched!");
		return false;
	  }
 else 
	  {
		document.getElementById("cng_pwd_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Changing password...";		//Flash this text while loading
				if (window.XMLHttpRequest) 
			      {        		 
          		  xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
     			  } 
     			  else 
     			 {       		  
          			 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     			 }
     			 xmlhttp.onreadystatechange = function() 
     			 {
          		  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		  { 
          		  	document.getElementById("cng_pwd_refresh").innerHTML = xmlhttp.responseText;
     			    document.getElementById("cng_pwd_flash").innerHTML = " ";
              	  }
             } 

		xmlhttp.open("GET","logicfiles/change_password.php?password_change&op="+op+"&np="+nep+"&"+rnd,true);
		xmlhttp.send(); 
	  }
}



//----------------- INITIATE FORGET PASSWORD BUTTON ------>
function sendPassword_reset()
{
	var id = document.getElementById("recovery_id").value;		// Set variables. Get them by their ID

//--- Validation
if (id == null || id == "" || id == " " || id == 0)
	{
		document.getElementById("warning_forgotpassword").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter either your registered email id or your registered mobile number!</font>";
		return false;
	}
else
	{
		document.getElementById("warning_forgotpassword").innerHTML = "";
	}
//--- Validation done

	document.getElementById("reset_password_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Searching user...";		//Flash this text while loading
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var resp_pass_reset = xmlhttp.responseText;
					if(resp_pass_reset == 1)
						{
							document.getElementById("reset_password_refresh").innerHTML = "<div class='alert alert-success' style='border-radius:0px;'><strong>Great! </strong> We have sent you a password reset link to your mobile & email id.</div>";
							document.getElementById("reset_password_flash").innerHTML = " ";
						}
					else
						{
							document.getElementById("warning_forgotpassword").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> There is no such user as <b>"+id+"</b>!</font>";
							document.getElementById("reset_password_flash").innerHTML = " ";
						}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/send_passwordresetlink_exec.php?id="+id,true);
		xmlhttp.send(); 
}


//----------------- SAVE PASSWORD FROM RESET LINK ------>
function reset_changePassword()
{
	var r = document.getElementById("reset_id").value;		// Set variables. Get them by their ID
	var p = document.getElementById("pwd").value;		// Set variables. Get them by their ID
	var cp = document.getElementById("c_pwd").value;		// Set variables. Get them by their ID

//--- Validation
if (p == null || p == "" || p == " ")
	{
		document.getElementById("warning_newpwd").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your new password!</font>";
		return false;
		var len_p = p.length;
		if(len_p < 6)
			{
				document.getElementById("warning_newpwd").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You password length must be greater than 6 characters!</font>";
				return false;
			}
		else
			{
				document.getElementById("warning_newpwd").innerHTML = " ";
			}
	}
else
	{
		document.getElementById("warning_newpwd").innerHTML = " ";
	}

//--- Validation done
	document.getElementById("change_password_flash").innerHTML="<i class='fa fa-circle-o-notch fa-spin'></i> Searching user...";		//Flash this text while loading
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var resp_pass_change = xmlhttp.responseText;
					if(resp_pass_change == 1)
						{
							document.getElementById("change_password_refresh").innerHTML = "<div class='alert alert-success' style='border-radius:0px;'><strong>Great! </strong> Your new password is saved. Now try login with your new password</div>";
							//document.getElementById("change_password_refresh").innerHTML = resp_pass_change;
							document.getElementById("change_password_flash").innerHTML = " ";
						}
					else if(resp_pass_change == 2)
						{
							document.getElementById("warning_pwdnm").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> The password does not match!</font>";
							document.getElementById("change_password_flash").innerHTML = " ";
						}
					else if(resp_pass_change == 3)
						{
							document.getElementById("warning_pwdnm").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> New password cannot be same as old password!</font>";
							document.getElementById("change_password_flash").innerHTML = " ";
						}
					else
						{
							document.getElementById("warning_pwdnm").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Unable to change the password right now!</font>";
							//document.getElementById("warning_pwdnm").innerHTML = resp_pass_change;
							document.getElementById("change_password_flash").innerHTML = " ";
						}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/reset_password_exec.php?r="+r+"&p="+p+"&cp="+cp,true);
		xmlhttp.send();
}



//----------------- EDIT COMPANY DETAILS ------>
function edit_companyDetails()
{
	var n = document.getElementById("company_name").value;		// Set variables. Get them by their ID
		n = n.replace(/;/g, "SEMCO");
		n = n.replace(/&/g, "ampSNT");
		
	var l = document.getElementById("company_address").value;		// Set variables. Get them by their ID
		l = l.replace(/;/g, "SEMCO");
		l = l.replace(/&/g, "ampSNT");
		
	var c = document.getElementById("company_contact").value;		// Set variables. Get them by their ID
		c = c.replace(/;/g, "SEMCO");
		c = c.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var e = document.getElementById("company_email").value;		// Set variables. Get them by their ID
		e = e.replace(/;/g, "SEMCO");
		e = e.replace(/&/g, "ampSNT");
	
	var v = document.getElementById("company_vat").value;		// Set variables. Get them by their ID
		v = v.replace(/;/g, "SEMCO");
		v = v.replace(/&/g, "ampSNT");	
		
	var w = document.getElementById("company_website").value;		// Set variables. Get them by their ID
		w = w.replace(/;/g, "SEMCO");
		w = w.replace(/&/g, "ampSNT");
		
		
//--- Validation
if (n == null || n == "" || n == " ")
	{
		document.getElementById("warning_company_name").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i></font>";
		return false;
	}
else
	{
		document.getElementById("warning_company_name").innerHTML = " ";
	}

if (l == null || l == "" || l == " ")
	{
		document.getElementById("warning_company_address").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i></font>";
		return false;
	}
else
	{
		document.getElementById("warning_company_address").innerHTML = " ";
	}
	
if (c == null || c == "" || c == " ")
	{
		document.getElementById("warning_company_contact").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i></font>";
		return false;
	}
else
	{
		document.getElementById("warning_company_contact").innerHTML = " ";
	}
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("company_details_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving changes...";
	
		$.ajax({
			  url:'logicfiles/editcompany_exec.php',
			  type:"POST",
			  data:{
				  n:n,
				  l:l,
				  c:c,
				  state:state,
				  state_initials:state_initials,
				  state_code:state_code,
				  e:e,
				  v:v,
				  w:w,
				  },

			  success: function(data)
			  {
				if(data == 0)
					{
						document.getElementById("company_details_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request. As your initiative is very much valuable to us, can you please post your details once again?</div>";
					}
				else
					{
						document.getElementById("company_details_refresh").innerHTML = data;
						document.getElementById("company_details_flash").innerHTML = "";
						refresh_companyBanner(); //--Refresh company banner
					}

				}
  
    });
}

//-------REFRESH COMPANY BANNER IN SETTINGS PAGE ---------->
function refresh_companyBanner()
{
	var rnd = Math.random();
	
if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{ 
				document.getElementById("company_details_banner_refresh").innerHTML = xmlhttp.responseText;
			}
    } 

     xmlhttp.open("GET","ui/ajax/save_company_details_banner.php?rnd="+rnd,true);
	 xmlhttp.send(); 
}



//----------------- ADD MONEY -> MONEY TO WORDS > CASH ------>
function moneytoWord_cash()
{
	var money = document.getElementById("cash").value;		// Set variables. Get them by their ID

//--- Validation stats
if (money == null || money == "" || money == " " || money == 0) {
	document.getElementById("added_message").innerHTML = "";
	return false;
} else {
	document.getElementById("added_message").innerHTML = "";
}
//--- Validation done

	document.getElementById("added_message").innerHTML="<i class='fa fa-spinner fa-spin'></i> Loading...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("added_message").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/convertWords.php?p="+money,true);
		xmlhttp.send();
}

//----------------- ADD MONEY -> MONEY TO WORDS > BANK ------>
function moneytoWord_bank()
{
	var money = document.getElementById("cash_bank").value;		// Set variables. Get them by their ID

//--- Validation stats
if (money == null || money == "" || money == " " || money == 0) {
	document.getElementById("added_bank_message").innerHTML = "";
	return false;
} else {
	document.getElementById("added_bank_message").innerHTML = "";
}
//--- Validation done

	document.getElementById("added_bank_message").innerHTML="<i class='fa fa-spinner fa-spin'></i> Loading...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("added_bank_message").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/convertWords.php?p="+money,true);
		xmlhttp.send();
}


//-------ADD CASH ---------->
function nowAddCash()
{
//alert("Hola");
	var c = document.getElementById("cash").value;			// Set variables. Get them by their ID
	var p = document.getElementById("purpose").value;			// Set variables. Get them by their ID
	var d = document.getElementById("date").value;			// Set variables. Get them by their ID
	var o = document.getElementById("old_cash").value;			// Set variables. Get them by their ID
	var al = "cash-balance.php";			// Set variables. Get them by their ID

// Validate form
if (c == null || c == "" || c == " " || c == 0 || c < 0)
    {
		document.getElementById("warning_cash_amount").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-inr'></i></font>";
		return false;
    }
else
	{
		document.getElementById("warning_cash_amount").innerHTML = "<i class='fa fa-inr'></i>";
	}
	
if (d == null || d == "" || d == " ")
    {
		document.getElementById("added_bank_message").innerHTML = "<font style='color:#ff6666;'>On which date did you add this amount?</font>";
		return false;
    }
else
	{
		document.getElementById("added_bank_message").innerHTML = "";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{ 
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-success' style='margin-top:10px;'><strong><i class='fa fa-tick'></i> Great! </strong> Cash added successfully. Refreshing to home page shortly.</div>";
				location.href = al;
			}
		else 
			{
				document.getElementById("added_message").innerHTML = "";
			}
    } 

     xmlhttp.open("GET","logicfiles/add_cash_exec.php?c="+c+"&o="+o+"&p="+p+"&d="+d,true);
	 xmlhttp.send(); 
}

//-------ADD FUND IN BANK ---------->
function nowAddCash_bank()
{
//alert("Hola");
	var c = document.getElementById("cash_bank").value;			// Set variables. Get them by their ID
	var p = document.getElementById("purpose_bank").value;			// Set variables. Get them by their ID
	var d = document.getElementById("date_bank").value;			// Set variables. Get them by their ID
	var o = document.getElementById("old_bank").value;			// Set variables. Get them by their ID
	var al = "cash-balance.php";			// Set variables. Get them by their ID

// Validate form
if (c == null || c == "" || c == " " || c == 0 || c < 0)
    {
		document.getElementById("warning_bank_cash_amount").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-inr'></i></font>";
		return false;
    }
else
	{
		document.getElementById("warning_bank_cash_amount").innerHTML = "<i class='fa fa-inr'></i>";
	}
	
if (d == null || d == "" || d == " ")
    {
		document.getElementById("added_bank_message").innerHTML = "<font style='color:#ff6666;'>On which date did you add this amount?</font>";
		return false;
    }
else
	{
		document.getElementById("added_bank_message").innerHTML = "";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
xmlhttp.onreadystatechange = function() 
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{ 
				document.getElementById("added_bank_message").innerHTML = "<br /><div class='alert alert-success' style='margin-top:10px;'><strong><i class='fa fa-tick'></i> Great! </strong> Fund added successfully into bank. Refreshing to home page shortly.</div>";
				location.href = al;
			}
		else 
			{
				document.getElementById("added_bank_message").innerHTML = "";
			}
    } 

     xmlhttp.open("GET","logicfiles/add_cash_bank_exec.php?c="+c+"&o="+o+"&p="+p+"&d="+d,true);
	 xmlhttp.send(); 
}


//-------------- SEARCH MASTER CASH OVERFLOW  ----->
function checkmasterCash()
{
	var p = document.getElementById("lending_amount").value;
		p = p.replace(/;/g, "SEMCO");
		p = p.replace(/&/g, "ampSNT");
		p = Number(p);
	
	var o = document.getElementById("mastercash_amount").value;
		o = o.replace(/;/g, "SEMCO");
		o = o.replace(/&/g, "ampSNT");
		o = Number(o);
	
	if(o < p)
		{
			document.getElementById("mastercash_overflow_button").click();  //----Debit over credit
		}
	else 
		{
			
		}
}

//--------------- SELECT DATE RANGE FOR CASHBOOK----->
function searchDateRange_cashbook()
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var al = "cashbook_results_daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}


//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_invoice()
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var al = "invoice-records-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}


//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_expense()
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var al = "expense.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}

//----------------- CREATE INVOICE -> ADD ITEMS------>
function add_InvoiceItem()
{
	var item = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		item = item.replace(/;/g, "SEMCO");
		item = item.replace(/&/g, "ampSNT");
	
	var mfg = "";						// Set variables. Get them by their ID
	
	var type = "Shipment";				// Set variables. Get them by their ID

	var packing_type = "Box";			// Set variables. Get them by their ID
		
	var batch = "";						// Set variables. Get them by their ID
	
	var exp = "";						// Set variables. Get them by their ID
		
	var hsn = "9968";					// Set variables. Get them by their ID
		
	var lot = 0;						// Set variables. Get them by their ID
	var pack_of = 1;					// Set variables. Get them by their ID
	var total_quantity = 0;				// Set variables. Get them by their ID
	
	var sale_lot = (document.getElementById("sale_lot").value -0);		// Set variables. Get them by their ID
	var sale_pcs = 0;					// Set variables. Get them by their ID 
	
	var free = 0;						// Set variables. Get them by their ID
	var sale_total_qty = (sale_lot * pack_of) + free;
	
	var sale_price = 0;					// Set variables. Get them by their ID
	var rate = (document.getElementById("rate").value -0);		// Set variables. Get them by their ID
	var mrp = 0;						// Set variables. Get them by their ID
	var discount = 0;					// Set variables. Get them by their ID
	var margin = 0;						// Set variables. Get them by their ID
	var gst = document.getElementById("gst").value;		// Set variables. Get them by their ID
	var purchase_gst_amount = 0;		// Set variables. Get them by their ID
	var weight = 0;						// Set variables. Get them by their ID
	
	var product_id = "";		// Set variables. Get them by their ID
	var master_gstType = document.getElementById("master_gstType").value;		// Set variables. Get them by their ID
	var i = document.getElementById("invoice_token").value;		// Set variables. Get them by their ID

//--- Validation
if (item == null || item == "" || item == " ") {
	document.getElementById("warning_item_description").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Item Name</font>";
	return false;
} else {
	document.getElementById("warning_item_description").innerHTML = " ";
}
	
if (gst == null || gst == "" || gst == " ") {
	document.getElementById("warning_rate").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GST must be selected</font>";
	return false;
} else {
	document.getElementById("warning_rate").innerHTML = " ";
}

if (rate == null || rate == "" || rate == " " || rate == 0) {
	document.getElementById("warning_rate").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Price</font>";
	return false;
} else {
	document.getElementById("warning_rate").innerHTML = " ";
}
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("item_message_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adding item...";	
		$.ajax({
			  url:'logicfiles/addInvoiceItem_exec.php',
			  type:"POST",
			  data:{
				  product_id:product_id,
				  item:item,
				  mfg:mfg,
				  type:type,
				  packing_type:packing_type,
				  batch:batch,
				  exp:exp,
				  hsn:hsn,
				  lot:lot,
				  pack_of:pack_of,
				  total_quantity:total_quantity,
				  sale_lot:sale_lot,
				  sale_pcs:sale_pcs,
				  free:free,
				  sale_price:sale_price,
				  rate:rate,
				  margin:margin,
				  mrp:mrp,
				  discount:discount,
				  gst:gst,
				  weight:weight,
				  purchase_gst_amount:purchase_gst_amount,
				  master_gstType:master_gstType,
				  i:i,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{

						document.getElementById("item_description").value = "";
						document.getElementById("item_description").placeholder = "Item Description";
						document.getElementById("item_description").click();
						document.getElementById("item_description").focus();
						
						document.getElementById("rate").value = "";
						document.getElementById("rate").placeholder = "Each (Rs.)";
						
						document.getElementById("gst").value = "";
						document.getElementById("gst").placeholder = "GST (%)";
						
						document.getElementById("sale_lot").value = "";
						document.getElementById("sale_lot").placeholder = "Lot";
						
						document.getElementById("item_message_flash").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Added! </strong>Item added to invoice. You can add more.</div>";
						refresh_invoiceItem(); //--Refresh rep. List
					}
				else
					{
						alert(data);
						document.getElementById("item_message_flash").innerHTML = data;
						//document.getElementById("item_message_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}

				}
  
    });
}


//----------------- CREATE INVOICE -> RERESH ITEM LIST ------>
function refresh_invoiceItem()
{
	var id = document.getElementById("invoice_token").value;		// Set variables. Get them by their ID
	var rnd = Math.random();
	
	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Refreshing...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("item_message").innerHTML = xmlhttp.responseText;
					document.getElementById("item_message_flash").innerHTML = "";
					//alert("All");
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/invoiceItems_refresh.php?invoice_token="+id+"&"+rnd,true);
		xmlhttp.send();
}



//----------------- CREATE INVOICE -> DELETE FROM ITEM LIST ------>
function removeParticulars(i, product_id)
{
	var id = document.getElementById("item_id_"+i).value;		// Set variables. Get them by their ID
	
	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Removing...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("item_message").innerHTML = xmlhttp.responseText;
					document.getElementById("item_message_flash").innerHTML = "";
					
						document.getElementById("item_description").click();
						document.getElementById("item_description").focus();
						//document.getElementById("search_result_product_refresh").innerHTML = "<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'>Search by product name</a></li>";
					refresh_invoiceItem();
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removeParticulars_exec.php?id="+id+"&product_id="+product_id,true);
		xmlhttp.send();
}

//----------------- CREATE INVOICE -> ADJUST ROUND UP/DOWN CALCULATION ------>
function adjustRounding_invoice()
{
	var amount = (document.getElementById("transaction_round_amount").value -0);		// Set variables. Get them by their ID
	var type = document.getElementById("transaction_round_type").value;		// Set variables. Get them by their ID
	var id = document.getElementById("invoice_id").value;		// Set variables. Get them by their ID
	var rnd = Math.random();
	
//--- Validation stats
if (amount == null || amount == "" || amount == " " || amount == 0)
	{
		document.getElementById("warning_round_adjustment").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Enter some adjustment amount.</font>";
		return false;
	}
else
	{
		if (type == null || type == "" || type == " " || type == "---Round---")
			{
				document.getElementById("warning_round_adjustment").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select either to round up or down.</font>";
				return false;
			}
		else
			{
				document.getElementById("warning_round_adjustment").innerHTML = " ";
			}
	}
//--- Validation done

	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Adjusting...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("item_message").innerHTML = xmlhttp.responseText;
					document.getElementById("item_message_flash").innerHTML = "";
					//alert("All");
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/invoiceItems_refresh.php?invoice_id="+id+"&round_amount="+amount+"&round_type="+type+"&"+rnd,true);
		xmlhttp.send();
}

//----------------- CREATE INVOICE -> DISCOUNT CALCULATION [BEFORE GST] ------>
function calculateDiscount()
{
	var disc_type = document.getElementById("interest_type_selected").value;
	if(disc_type == "N/A")
		{
			document.getElementById("warning_invoice_discount").innerHTML = "<font style='font-size:9pt;color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select a discount type.</font>";
		}
	else if(disc_type == "per")
		{
			document.getElementById("warning_invoice_discount").innerHTML = "";
			span_amount = Math.round(((document.getElementById("gross_amount").value -0) - (((document.getElementById("gross_amount").value -0) * (document.getElementById("discount").value -0)) / 100))); //---0 Decimal points
			document.getElementById("total_payable_amount").value = span_amount;
			document.getElementById("total_amount_span").innerHTML = span_amount;
		}
	else if(disc_type == "inr")
		{
			document.getElementById("warning_invoice_discount").innerHTML = "";
			span_amount = Math.round((document.getElementById("gross_amount").value -0) - (document.getElementById("discount").value -0)); //---0 Decimal points
			document.getElementById("total_payable_amount").value = span_amount;
			document.getElementById("total_amount_span").innerHTML = span_amount;
		}
	else
		{
			//--Blank
		}	
}


//--------------  CREATE INVOICE ->  SELECT DISCOUNT TYPE PERCENTAGE ----->
function selectInterest_per()
{
	//alert("%");
	document.getElementById("selectedInterest_type").innerHTML = "%";
	document.getElementById("discount").placeholder = "Discount in (%)"; 
	document.getElementById("interest_type_selected").value = "per"; 
	calculateDiscount();
}

//--------------  CREATE INVOICE -> SELECT DISCOUNT TYPE INR ----->
function selectInterest_inr()
{
	//alert("INR");
	document.getElementById("selectedInterest_type").innerHTML = "<i class='fa fa-inr'></i>";
	document.getElementById("discount").placeholder = "Discount (Rs.)"; 
	document.getElementById("interest_type_selected").value = "inr"; 
	calculateDiscount();
}


//----------------- CREATE INVOICE -> GST CALCULATION ------>
function calculateGST()
{
	var gst = document.getElementById("gst").value;
	if(gst == "" || gst == " " || gst == 0 || gst < 0) {
		var gst_per = 0;
		span_amount = Math.round(((document.getElementById("total_payable_amount").value -0))); //---0 Decimal points
	} else {
		var gst_per = gst;
		span_amount = Math.round(((document.getElementById("total_payable_amount").value -0) + (((document.getElementById("total_payable_amount").value -0) * gst_per) / 100))); //---0 Decimal points
	}
	
	document.getElementById("total_payable_amount").value = span_amount;
	document.getElementById("total_amount_span").innerHTML = span_amount;
}


//----------------- CREATE INVOICE -> PAID & CREDIT CALCULATION ------>
function calculatePAID()
{
	document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - (document.getElementById("paid_amount").value -0)); //---0 Decimal points
}


//----------------- CREATE INVOICE -> PAID & CREDIT CALCULATION ------>
function calculateInvoicePAID()
{
	var paid = document.getElementById("paid_amount").value -0;
	var paid_bank = document.getElementById("paid_bank_amount").value -0;
	var paid_total = Math.round((paid + paid_bank));
	var total = document.getElementById("total_payable_amount").value -0;
	
	if(paid_total > total) {
		document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Hey Wait!</strong> Payment is more than the payable amount.</div>";
	} else {
		document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - paid_total); //---0 Decimal points
		
		document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizeInward();'>Finalize Invoice <i class='fa fa-chevron-right'></i></a>";
	}
}

//----------------- CREATE INVOICE -> FINALIZE INVOICE------>
function finalizeInward()
{
	
	calculateInvoicePAID();  //--Pre calculate the due once again
	
	
	var from = document.getElementById("packet_from").value;		// Set variables. Get them by their ID
		from = from.replace(/;/g, "SEMCO");
		from = from.replace(/&/g, "ampSNT");
	
	var to = document.getElementById("packet_to").value;		// Set variables. Get them by their ID
		to = to.replace(/;/g, "SEMCO");
		to = to.replace(/&/g, "ampSNT");
	
	var custom_invoice_id = document.getElementById("custom_invoice_id").value;		// Set variables. Get them by their ID
		custom_invoice_id = custom_invoice_id.replace(/;/g, "SEMCO");
		custom_invoice_id = custom_invoice_id.replace(/&/g, "ampSNT");
		
	var name = document.getElementById("customer_name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
	
	var address = document.getElementById("customer_address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("customer_contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
	
	var gstin = document.getElementById("customer_gst").value;		// Set variables. Get them by their ID
		gstin = gstin.replace(/;/g, "SEMCO");
		gstin = gstin.replace(/&/g, "ampSNT");
	
	var pan = document.getElementById("customer_pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
	
	var cin = document.getElementById("customer_cin").value;		// Set variables. Get them by their ID
		cin = cin.replace(/;/g, "SEMCO");
		cin = cin.replace(/&/g, "ampSNT");
		
	var salesman = document.getElementById("salesman").value;		// Set variables. Get them by their ID
		salesman = salesman.replace(/;/g, "SEMCO");
		salesman = salesman.replace(/&/g, "ampSNT");
	
	var salesman_contact = document.getElementById("salesman_contact").value;		// Set variables. Get them by their ID
		salesman_contact = salesman_contact.replace(/;/g, "SEMCO");
		salesman_contact = salesman_contact.replace(/&/g, "ampSNT");
		
	var transport = document.getElementById("transport").value;		// Set variables. Get them by their ID
		transport = transport.replace(/;/g, "SEMCO");
		transport = transport.replace(/&/g, "ampSNT");
		
	var vehicle = document.getElementById("vehicle").value;		// Set variables. Get them by their ID
		vehicle = vehicle.replace(/;/g, "SEMCO");
		vehicle = vehicle.replace(/&/g, "ampSNT");
		
	var carrier = document.getElementById("carrier").value;		// Set variables. Get them by their ID
		carrier = carrier.replace(/;/g, "SEMCO");
		carrier = carrier.replace(/&/g, "ampSNT");
		
	var payment_mode = document.getElementById("transaction_mode").value;		// Set variables. Get them by their ID
		payment_mode = payment_mode.replace(/;/g, "SEMCO");
		payment_mode = payment_mode.replace(/&/g, "ampSNT");
		
	var payment_reff = document.getElementById("transaction_reff").value;		// Set variables. Get them by their ID
		payment_reff = payment_reff.replace(/;/g, "SEMCO");
		payment_reff = payment_reff.replace(/&/g, "ampSNT");
		
	var invoice_token = document.getElementById("invoice_token").value;		// Set variables. Get them by their ID
	var customer_id = document.getElementById("customer_id").value;		// Set variables. Get them by their ID
	var invoice_date = document.getElementById("invoice_date").value;		// Set variables. Get them by their ID
	var shipment_date = document.getElementById("shipment_date").value;		// Set variables. Get them by their ID
	
	var packet_items_count = document.getElementById("packet_items_count").value;		// Set variables. Get them by their ID
	var gross_amount = document.getElementById("gross_amount").value;		// Set variables. Get them by their ID
	
	var round_amount = (document.getElementById("transaction_round_amount").value -0);		// Set variables. Get them by their ID
	var round_type = document.getElementById("transaction_round_type").value;		// Set variables. Get them by their ID
	
	var total_payable_amount = document.getElementById("total_payable_amount").value;		// Set variables. Get them by their ID
	var discount = document.getElementById("total_discount_amount").value;		// Set variables. Get them by their ID
	
	var paid_cash = (document.getElementById("paid_amount").value -0);		// Set variables. Get them by their ID
	var paid_bank = (document.getElementById("paid_bank_amount").value -0);		// Set variables. Get them by their ID
	var due_amount = (document.getElementById("due_amount").value -0);		// Set variables. Get them by their ID
	var non_tax = (document.getElementById("total_non_taxable_amount").value -0);		// Set variables. Get them by their ID
	var tax = document.getElementById("total_tax_amount").value;		// Set variables. Get them by their ID
	var tax_purchase = document.getElementById("total_tax_purchase_amount").value;		// Set variables. Get them by their ID
	
	var al = "invoice.php?invoice_token="+invoice_token;

//--- Validation
if (custom_invoice_id == null || custom_invoice_id == "" || custom_invoice_id == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Custom Invoice Number.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = "";
	}

if (from == null || from == "" || from == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Invoice range from.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = "";
	}
	
if (to == null || to == "" || to == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Invoice range to.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = "";
	}
	
if (name == null || name == "" || name == " ")
	{
		document.getElementById("warning_customer_name").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Customer name.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_customer_name").innerHTML = "";
	}

if (address == null || address == "" || address == " ")
	{
		document.getElementById("warning_customer_address").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Customer address.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_customer_address").innerHTML = " ";
	}
	
if (state == null || state == "" || state == " ")
	{
		document.getElementById("warning_customer_state").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Customer address.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_customer_state").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("warning_customer_phone").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Customer contact.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_customer_phone").innerHTML = " ";
	}
	
if (packet_items_count == null || packet_items_count == "" || packet_items_count == "N/A")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>No Items!</strong> No items added with this invoice. Some items must be added to proceed.</div>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = " ";
	}
//--- Validation done

//--- calculate due once again
calculateInvoicePAID();

//-- Initiate a spinner loading sign
	document.getElementById("compose_inward_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Finalizing invoice...";
	
		$.ajax({
			  url:'logicfiles/finalizeInvoice_exec.php',
			  type:"POST",
			  data:{
				  name:name,
				  address:address,
				  state:state,
				  state_initials:state_initials,
				  state_code:state_code,
				  contact:contact,
				  gstin:gstin,
				  pan:pan,
				  cin:cin,
				  salesman:salesman,
				  salesman_contact:salesman_contact,
				  transport:transport,
				  vehicle:vehicle,
				  carrier:carrier,
				  shipment_date:shipment_date,
				  gross_amount:gross_amount,
				  round_amount:round_amount,
				  round_type:round_type,
				  total_payable_amount:total_payable_amount,
				  discount:discount,
				  paid_cash:paid_cash,
				  paid_bank:paid_bank,
				  due_amount:due_amount,
				  tax:tax,
				  tax_purchase:tax_purchase,
				  non_tax:non_tax,
				  payment_mode:payment_mode,
				  payment_reff:payment_reff,
				  invoice_token:invoice_token,
				  customer_id:customer_id,
				  invoice_date:invoice_date,
				  custom_invoice_id:custom_invoice_id,
				  from:from,
				  to:to,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{	
						document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Invoice generated successfully.</div>";
						location.href = al; //--refresh
					}
				else
					{
						alert(data);
						document.getElementById("compose_inward_flash").innerHTML = data;
						//document.getElementById("compose_inward_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div> <br /><span class='btn btn-primary' onClick='finalizeInward();'>Finalize Invoice <i class='fa fa-chevron-right'></i></span>";
					}

				}
  
    });
}


//----------------- ADD EXPENSE ------>
function addExpense()
{
	var center_id = document.getElementById("center_id").value;		// Set variables. Get them by their ID
		center_id = center_id.replace(/;/g, "SEMCO");
		center_id = center_id.replace(/&/g, "ampSNT");
		
	var expense_head = document.getElementById("expense_head").value;		// Set variables. Get them by their ID
		expense_head = expense_head.replace(/;/g, "SEMCO");
		expense_head = expense_head.replace(/&/g, "ampSNT");
		
	var desc = document.getElementById("description").value;		// Set variables. Get them by their ID
		desc = desc.replace(/;/g, "SEMCO");
		desc = desc.replace(/&/g, "ampSNT");
		
	var amount = (document.getElementById("amount").value -0);		// Set variables. Get them by their ID
	
	var type = document.getElementById("type").value;		// Set variables. Get them by their ID
		type = type.replace(/;/g, "SEMCO");
		type = type.replace(/&/g, "ampSNT");
		
	var remarks = document.getElementById("remarks").value;		// Set variables. Get them by their ID
		remarks = remarks.replace(/;/g, "SEMCO");
		remarks = remarks.replace(/&/g, "ampSNT");
	
	var d = document.getElementById("date").value;		// Set variables. Get them by their ID
		d = d.replace(/;/g, "SEMCO");
		d = d.replace(/&/g, "ampSNT");
		
	var m_cash = (document.getElementById("master_cash").value -0);		// Set variables. Get them by their ID	
	var m_bank = (document.getElementById("master_bank").value -0);		// Set variables. Get them by their ID	
	var al = "expense.php";

//--Validation
if (expense_head == null || expense_head == "" || expense_head == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Expense head</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (desc == null || desc == "" || desc == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Expense description</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (amount == 0 || amount < 0)
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Expense amount</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = "";
	}
	
if (type == null || type == "" || type == " " || type == "---Select Type---")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Transaction mode</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	

//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adding expense...";
	$.ajax({
	  url:'logicfiles/addExpense_exec.php',
	  type:"POST",
	  data:{
		  center_id:center_id,
		  expense_head:expense_head,
		  desc:desc,
		  desc:desc,
		  amount:amount,
		  type:type,
		  remarks:remarks,
		  d:d,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>expense logged successfully.</div>";
				location.href = al; //--refresh
			}
		else if(data == 2)
			{
				alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Low bank balance!</strong> Your bank balance is low to make that expense.</div>";
			}
		else
			{
				alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}


//----------------- ADD PARTY -> STATE CODE AUTO SUGGEST ------>
function stateAutoSuggest()
{
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
	
	var rnd = Math.random();
	
//--Validation
if (state == null || state == "" || state == " ")
	{
		return false;
	}
else
	{
		//document.getElementById("search_gst_state").innerHTML = " ";
	}
//--Ends here 
	
	document.getElementById("search_gst_state").innerHTML="<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'><i class='fa fa-spinner fa-spin'></i> Searching state..</a></li>";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("search_gst_state").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/searchGST_State.php?state="+state+"&"+rnd,true);
		xmlhttp.send();
}


//----------------- ADD PARTY -> FOCUS -> ON FOCUS ACTIVE ------>
function focusState_code()
{
	document.getElementById("state").click();
}


//----------------- ADD PARTY -> SET -> STATE CODE AUTO SUGGEST ------>
function setState_code(state, state_initials, state_code)
{
	document.getElementById("state").value = state;
	document.getElementById("state_initial").value = state_initials;
	document.getElementById("state_code").value = state_code
}


//----------------- ADD PARTY ------>
function addParty()
{
	var centre_id = document.getElementById("centre_id").value;		// Set variables. Get them by their ID
		centre_id = centre_id.replace(/;/g, "SEMCO");
		centre_id = centre_id.replace(/&/g, "ampSNT");
		
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var aadhar = document.getElementById("aadhar").value;		// Set variables. Get them by their ID
		aadhar = aadhar.replace(/;/g, "SEMCO");
		aadhar = aadhar.replace(/&/g, "ampSNT");
		aadhar_len = aadhar.length;
	
	var pan = document.getElementById("pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
		pan_len = pan.length;
		
	var license = document.getElementById("license").value;		// Set variables. Get them by their ID
		license = license.replace(/;/g, "SEMCO");
		license = license.replace(/&/g, "ampSNT");
		
	var al = "new-party.php";

//--Validation
if (centre_id == null || centre_id == "" || centre_id == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select a centre</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Service provider name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Service provider address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Service provider contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (aadhar == null || aadhar == "" || aadhar == " ")
	{
		//return false;
	}
else
	{
		if (aadhar_len == 12)
			{
				document.getElementById("added_message").innerHTML = " ";
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Aadhar No. must be 12 digits in length</font>";
				return false;
			}
	}

if (pan == null || pan == "" || pan == " ")
	{
		//return false;
	}
else
	{
		if (pan_len == 10)
			{
				document.getElementById("added_message").innerHTML = " ";
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> PAN No. must be 10 digits in length</font>";
				return false;
			}
	}
//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating party...";
	$.ajax({
	  url:'logicfiles/addParty_exec.php',
	  type:"POST",
	  data:{
		  centre_id:centre_id,
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  aadhar:aadhar,
		  pan:pan,
		  license:license,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Service provider ceated successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}


//----------------- EDIT PARTY ------>
function editParty()
{
	var id = document.getElementById("party_id").value;		// Set variables. Get them by their ID
	
	var centre_id = document.getElementById("centre_id").value;		// Set variables. Get them by their ID
		centre_id = centre_id.replace(/;/g, "SEMCO");
		centre_id = centre_id.replace(/&/g, "ampSNT");
		
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var aadhar = document.getElementById("aadhar").value;		// Set variables. Get them by their ID
		aadhar = aadhar.replace(/;/g, "SEMCO");
		aadhar = aadhar.replace(/&/g, "ampSNT");
		aadhar_len = aadhar.length;
		
	var pan = document.getElementById("pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
		pan_len = pan.length;
	
	var license = document.getElementById("license").value;		// Set variables. Get them by their ID
		license = license.replace(/;/g, "SEMCO");
		license = license.replace(/&/g, "ampSNT");
		
	var al = "party-details.php?party_id="+id;

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (aadhar == null || aadhar == "" || aadhar == " ")
	{
		//return false;
	}
else
	{
		if (aadhar_len == 12)
			{
				document.getElementById("added_message").innerHTML = " ";
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Aadhar No. must be 12 digits in length</font>";
				return false;
			}
	}
	
if (pan == null || pan == "" || pan == " ")
	{
		//return false;
	}
else
	{
		if (pan_len == 10)
			{
				document.getElementById("added_message").innerHTML = " ";
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> PAN No. must be 10 digits in length</font>";
				return false;
			}
	}
//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving party...";
	$.ajax({
	  url:'logicfiles/editParty_exec.php',
	  type:"POST",
	  data:{
		  centre_id:centre_id,
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  aadhar:aadhar,
		  pan:pan,
		  license:license,
		  id:id,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Saved! </strong>party edited successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				//document.getElementById("added_message").innerHTML = data;
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}

//----------------- INVOICE RECORDS -> SEARCH BY NAME ------>
function searchInvoiceByName()
{
	var name = document.getElementById("search_by_name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var al = "search-invoice-record-name.php?search="+name;

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("search_message").innerHTML = "<font style='font-size:9pt;color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Enter a name</font>";
		return false;
	}
else
	{
		document.getElementById("search_message").innerHTML = " ";
	}
//--Ends here 
	
	location.href = al; //--refresh
}

//----------------- INVOICE RECORDS -> SEARCH BY ID ------>
function searchInvoiceByID()
{
	var id = document.getElementById("search_by_id").value;		// Set variables. Get them by their ID
		id = id.replace(/;/g, "SEMCO");
		id = id.replace(/&/g, "ampSNT");
		
	var al = "search-invoice-record-id.php?search="+id;

//--Validation
if (id == null || id == "" || id == " ")
	{
		document.getElementById("search_invoice_message").innerHTML = "<font style='font-size:9pt;color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Enter an invoice id</font>";
		return false;
	}
else
	{
		document.getElementById("search_invoice_message").innerHTML = " ";
	}
//--Ends here 
	
	location.href = al; //--refresh
}

//----------------- CREATE PURCHASE -> FOCUS / TRIGGER PARTY SELCTION MODAL ------>
function selectPartyModal()
{
	document.getElementById("firePartyModal").click();		// Set variables. Get them by their ID
}

//----------------- CREATE PURCHASE -> SELECT PARTY------>
function selectParty(i,name,address,contact,gstin,license,state,state_initials,state_code)
{
	document.getElementById("party_id").value = i;
	document.getElementById("party_name").value = name;
	document.getElementById("select_party").value = name;
	document.getElementById("party_address").value = address;
	document.getElementById("state").value = state;
	document.getElementById("state_initial").value = state_initials;
	document.getElementById("state_code").value = state_code;
	document.getElementById("party_contact").value = contact;
	document.getElementById("party_gstin").value = gstin;
	document.getElementById("party_license").value = license;
	document.getElementById("refresh_party_close_button").click();
}


//----------------- CREATE PURCHASE -> FOCUS / TRIGGER PRODUCT SUGGESTION POPUP ------>
function suggestionProduct()
{
	document.getElementById("item_description").click();		// Set variables. Get them by their ID
}

//----------------- CREATE PURCHASE -> FOCUS / TRIGGER TYPE SUGGESTION POPUP ------>
function suggestionProduct_type()
{
	document.getElementById("type").click();		// Set variables. Get them by their ID
}

//----------------- ACTUAL > CREATE PURCHASE -> FOCUS / TRIGGER PRODUCT SUGGESTION POPUP ------>
function suggestionProduct_new()
{
	//document.getElementById("item_description").click();		// Set variables. Get them by their ID
	document.getElementById("fireProductDropdown").click();		// Set variables. Get them by their ID
}

//----------------- ACTUAL > CREATE PURCHASE -> FOCUS / TRIGGER TYPE SUGGESTION POPUP ------>
function suggestionProduct_type_new()
{
	//document.getElementById("type").click();		// Set variables. Get them by their ID
	document.getElementById("fireTypeDropdown").click();		// Set variables. Get them by their ID
}

//----------------- CREATE PURCHASE -> ADD ITEMS------>
function add_PurchaseItem()
{
	var item = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		item = item.replace(/;/g, "SEMCO");
		item = item.replace(/&/g, "ampSNT");
	
	var mfg = "";
		
	var type = document.getElementById("type").value;		// Set variables. Get them by their ID
		type = type.replace(/;/g, "SEMCO");
		type = type.replace(/&/g, "ampSNT");

	var packing_type = "";
		
	var batch = "";
	
	var exp = "";
		
	var hsn = "";
		
	var lot = (document.getElementById("lot").value -0);		// Set variables. Get them by their ID
	var pack_of = 1;		// Set variables. Get them by their ID
	var free = 0;		// Set variables. Get them by their ID
	
	var rate = (document.getElementById("rate").value -0);		// Set variables. Get them by their ID
	var mrp = 0;		// Set variables. Get them by their ID
	var discount = 0;		// Set variables. Get them by their ID
	var gst = 0;		// Set variables. Get them by their ID
	var gst_type = "sc";		// Set variables. Get them by their ID
	
	var weight = 0;		// Set variables. Get them by their ID
	var base_margin = 0;		// Set variables. Get them by their ID
	
	var i = document.getElementById("purchase_token").value;		// Set variables. Get them by their ID
	
//--- Validation
if (item == null || item == "" || item == " ")
	{
		document.getElementById("warning_item_description").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Item?</font>";
		return false;
	}
else
	{
		document.getElementById("warning_item_description").innerHTML = " ";
	}

if (lot == null || lot == "" || lot == " " || lot == 0)
	{
		document.getElementById("warning_lot_quantity").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Lot?</font>";
		return false;
	}
else
	{
		document.getElementById("warning_lot_quantity").innerHTML = " ";
	}
	
if (rate == null || rate == "" || rate == " " || rate < 0 )
	{
		document.getElementById("warning_rate").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Rate?</font>";
		return false;
	}
else
	{
		document.getElementById("warning_rate").innerHTML = " ";
	}
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("item_message_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adding item...";
	
		$.ajax({
			  url:'logicfiles/addPurchaseitem_exec.php',
			  type:"POST",
			  data:{
				  item:item,
				  mfg:mfg,
				  exp:exp,
				  type:type,
				  packing_type:packing_type,
				  batch:batch,
				  hsn:hsn,
				  lot:lot,
				  pack_of:pack_of,
				  free:free,
				  rate:rate,
				  mrp:mrp,
				  discount:discount,
				  gst:gst,
				  gst_type:gst_type,
				  weight:weight,
				  base_margin:base_margin,
				  i:i,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{
						refresh_purchaseItem(); //--Refresh rep. List
						
						document.getElementById("lot").value = "";
						document.getElementById("lot").placeholder = "Qty";
						
						document.getElementById("rate").value = "";		
						document.getElementById("rate").placeholder = "Each (Rs.)";	
						
						document.getElementById("item_message_flash").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Added! </strong>Item added to invoice. You can add more.</div>";
						
					}
				else
					{
						alert(data);
						document.getElementById("item_message_flash").innerHTML = data;
						//document.getElementById("item_message_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}

				}
  
    });
}


//----------------- CREATE PURCHASE -> RERESH ITEM LIST ------>
function refresh_purchaseItem()
{
	var id = document.getElementById("purchase_token").value;		// Set variables. Get them by their ID
	var rnd = Math.random();
	
	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Refreshing...";
	if (window.XMLHttpRequest) {        		 
		xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
	} else {       		  
       	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
    xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { 
				document.getElementById("item_message").innerHTML = xmlhttp.responseText;
				document.getElementById("item_message_flash").innerHTML = "";
				//alert(rnd);
        }
    } 
		
	xmlhttp.open("GET","ui/ajax/purchaseItems_refresh.php?purchase_token="+id+"&"+rnd,true);
	xmlhttp.send();
}


//----------------- CREATE PURCHASE -> DELETE FROM ITEM LIST ------>
function removePurchaseParticulars(i, oop)
{
	var id = document.getElementById("item_id_"+i).value;		// Set variables. Get them by their ID
	var rnd = Math.random();
	
	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Removing...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("item_message").innerHTML = xmlhttp.responseText;
					document.getElementById("item_message_flash").innerHTML = "";
					refresh_purchaseItem();
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removePurchaseParticulars_exec.php?id="+id+"&oop_code="+oop+"&"+rnd,true);
		xmlhttp.send();
}


//----------------- CREATE PURCHASE -> ADJUST ROUND UP/DOWN CALCULATION ------>
function adjustRounding()
{
	var amount = (document.getElementById("transaction_round_amount").value -0);		// Set variables. Get them by their ID
	var type = document.getElementById("transaction_round_type").value;		// Set variables. Get them by their ID
	var id = document.getElementById("purchase_id").value;		// Set variables. Get them by their ID

//--- Validation stats
if (amount == null || amount == "" || amount == " " || amount == 0)
	{
		document.getElementById("warning_round_adjustment").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Enter some adjustment amount.</font>";
		return false;
	}
else
	{
		if (type == null || type == "" || type == " " || type == "---Round---")
			{
				document.getElementById("warning_round_adjustment").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select either to round up or down.</font>";
				return false;
			}
		else
			{
				document.getElementById("warning_round_adjustment").innerHTML = " ";
			}
	}
//--- Validation done

	document.getElementById("item_message_flash").innerHTML="<i class='fa fa-spinner fa-spin'></i> Adjusting...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("item_message").innerHTML = xmlhttp.responseText;
					document.getElementById("item_message_flash").innerHTML = "";
					//alert("All");
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/purchaseItems_refresh.php?purchase_id="+id+"&round_amount="+amount+"&round_type="+type,true);
		xmlhttp.send();
}

//----------------- CREATE PURCHASE -> PAID & CREDIT CALCULATION ------>
function calculatePurchasePAID()
{
	var paid_cash = document.getElementById("paid_amount").value -0;
	var paid_bank = document.getElementById("paid_bank_amount").value -0;
	var paid = paid_cash + paid_bank;
	var total = document.getElementById("total_payable_amount").value -0;
	var master_cash = document.getElementById("master_cash").value -0;
	var master_bank = document.getElementById("master_bank").value -0;
	
	if(paid > total) {
		if(paid_cash > master_cash) {
			//document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Purchase Overflow!</strong> You are paying more than you have in your cash balance.</div>";
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		} else {
			document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Hey Wait!</strong> Your payment is more than the payable amount.</div>";
		}
		
		if(paid_bank > master_bank) {
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		} else {
			document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Hey Wait!</strong> Your payment is more than the payable amount.</div>";
		}
	} else {
		if(paid_cash > master_cash) {
			document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - paid); //---0 Decimal points
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		} else {
			document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - paid); //---0 Decimal points
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		}

		if(paid_bank > master_bank) {
			document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - paid); //---0 Decimal points
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		} else {
			document.getElementById("due_amount").value = Math.round((document.getElementById("total_payable_amount").value -0) - paid); //---0 Decimal points
			document.getElementById("compose_inward_flash").innerHTML = "<a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
		}			
	}
}

//----------------- CREATE PURCHASE -> FINALIZE PURCHASE------>
function finalizePurchase()
{
	calculatePurchasePAID();
	
	var memo_id = document.getElementById("memo_id").value;		// Set variables. Get them by their ID
		memo_id = memo_id.replace(/;/g, "SEMCO");
		memo_id = memo_id.replace(/&/g, "ampSNT");

	var range_from = document.getElementById("packet_from").value;		// Set variables. Get them by their ID
		range_from = range_from.replace(/;/g, "SEMCO");
		range_from = range_from.replace(/&/g, "ampSNT");
		
	var range_to = document.getElementById("packet_to").value;		// Set variables. Get them by their ID
		range_to = range_to.replace(/;/g, "SEMCO");
		range_to = range_to.replace(/&/g, "ampSNT");
		
	var purchase_token = document.getElementById("purchase_token").value;		// Set variables. Get them by their ID
		purchase_token = purchase_token.replace(/;/g, "SEMCO");
		purchase_token = purchase_token.replace(/&/g, "ampSNT");
		
	var name = document.getElementById("party_name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
	
	var address = document.getElementById("party_address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("party_contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
	
	var gstin = document.getElementById("party_gstin").value;		// Set variables. Get them by their ID
		gstin = gstin.replace(/;/g, "SEMCO");
		gstin = gstin.replace(/&/g, "ampSNT");
		
	var license = document.getElementById("party_license").value;		// Set variables. Get them by their ID
		license = license.replace(/;/g, "SEMCO");
		license = license.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
	
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
			
	var party_id = document.getElementById("party_id").value;		// Set variables. Get them by their ID

	var purchase_date = document.getElementById("purchase_date").value;		// Set variables. Get them by their ID

	var packet_items_count = document.getElementById("packet_items_count").value;		// Set variables. Get them by their ID
	var gross_amount = document.getElementById("gross_amount").value;		// Set variables. Get them by their ID
	
	var round_amount = (document.getElementById("transaction_round_amount").value -0);		// Set variables. Get them by their ID
	var round_type = document.getElementById("transaction_round_type").value;		// Set variables. Get them by their ID
	
	var total_payable_amount = document.getElementById("total_payable_amount").value;		// Set variables. Get them by their ID
	var total_discount_amount = document.getElementById("total_discount_amount").value;		// Set variables. Get them by their ID
	var total_tax_amount = document.getElementById("total_tax_amount").value;		// Set variables. Get them by their ID
	var transaction_mode = document.getElementById("transaction_mode").value;		// Set variables. Get them by their ID
	var transaction_reff = document.getElementById("transaction_reff").value;		// Set variables. Get them by their ID
	var paid_amount = document.getElementById("paid_amount").value;		// Set variables. Get them by their ID
	var paid_bank = document.getElementById("paid_bank_amount").value -0;
	var due_amount = document.getElementById("due_amount").value;		// Set variables. Get them by their ID
	
	var al = "purchase.php?party_id="+party_id+"&purchase_token="+purchase_token;
//--- Validation
if (memo_id == null || memo_id == "" || memo_id == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Insert custom service provider invoice number.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = "";
	}
	
if (range_from == null || range_from == "" || range_from == " ") {
	document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Enter bill range.</font>";
	return false;
} else {
	document.getElementById("compose_inward_message").innerHTML = "";
}

if (range_to == null || range_to == "" || range_to == " ") {
	document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Enter bill range.</font>";
	return false;
} else {
	document.getElementById("compose_inward_message").innerHTML = "";
}
	
if (name == null || name == "" || name == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Party name.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = "";
	}

if (address == null || address == "" || address == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Party address.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Party contact.</font>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = " ";
	}

if (transaction_mode == null || transaction_mode == "" || transaction_mode == " " || transaction_mode == "---Mode---")
	{
		document.getElementById("warning_transaction_mode").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Must declare the mode of transaction.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_transaction_mode").innerHTML = " ";
	}
	
if (paid_amount == null || paid_amount == "" || paid_amount == " ")
	{
		document.getElementById("warning_paid_amount").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Paid amount.</font>";
		return false;
	}
else
	{
		document.getElementById("warning_paid_amount").innerHTML = " ";
	}
	
if (packet_items_count == null || packet_items_count == "" || packet_items_count == "N/A")
	{
		document.getElementById("compose_inward_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>No Items!</strong> No items added with this purchase. Some items must be added to proceed.</div>";
		return false;
	}
else
	{
		document.getElementById("compose_inward_message").innerHTML = " ";
	}

//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("compose_inward_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Finalizing purchase...";
	
		$.ajax({
			  url:'logicfiles/finalizePurchase_exec.php',
			  type:"POST",
			  data:{
				  name:name,
				  address:address,
				  contact:contact,
				  gstin:gstin,
				  license:license,
				  state:state,
				  state_initials:state_initials,
				  state_code:state_code,
				  gross_amount:gross_amount,
				  round_amount:round_amount,
				  round_type:round_type,
				  total_payable_amount:total_payable_amount,
				  total_discount_amount:total_discount_amount,
				  total_tax_amount:total_tax_amount,
				  transaction_mode:transaction_mode,
				  transaction_reff:transaction_reff,
				  paid_amount:paid_amount,
				  paid_bank:paid_bank,
				  due_amount:due_amount,
				  party_id:party_id,
				  purchase_token:purchase_token,
				  purchase_date:purchase_date,
				  memo_id:memo_id,
				  range_from:range_from,
				  range_to:range_to,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{	
						document.getElementById("compose_inward_flash").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Purchase generated successfully.</div>";
						location.href = al; //--refresh
					}
				else
					{
						alert(data);
						document.getElementById("compose_inward_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div> <br /><a href='javascript:void(0);' class='btn btn-primary' onClick='finalizePurchase();'>Finalize Purchase <i class='fa fa-chevron-right'></i></a>";
					}

				}
  
    });
}



//----------------- ADJUST DUE FROM INVOICE -> ------>
function adjustDue()
{
	var id = document.getElementById("invoice_id").value;		// Set variables. Get them by their ID
	var amount_cash = (document.getElementById("paying_amount").value -0);		// Set variables. Get them by their ID
	var amount_bank = (document.getElementById("paid_bank_amount").value -0);		// Set variables. Get them by their ID
	var amount = amount_cash + amount_bank;		// Set variables. Get them by their ID
	var mode = document.getElementById("transaction_mode").value;		// Set variables. Get them by their ID
	var reff = document.getElementById("transaction_reff").value;		// Set variables. Get them by their ID
	var dt = document.getElementById("paid_date").value;		// Set variables. Get them by their ID
	var al = "invoice.php?invoice_id="+id;		// Set variables. Get them by their ID
	var rnd = Math.random();
	
//--- Validation
if (amount == null || amount == "" || amount == "N/A" || amount == 0)
	{
		document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>No Amount!</strong> Enter amount to adjust</div>";
		return false;
	}
else
	{
		document.getElementById("due_message").innerHTML = " ";
	}

if (mode == null || mode == "" || mode == "---Mode---")
	{
		document.getElementById("warning_transaction_mode").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Mode!</strong> Mention transation mode.</div>";
		return false;
	}
else
	{
		document.getElementById("warning_transaction_mode").innerHTML = " ";
	}
//--- Validation done


	document.getElementById("due_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adjusting due...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1)
						{
							document.getElementById("due_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Purchase generated successfully.</div>";
							location.href = al; //--refresh
						}
					else
						{
							alert(reps);
							document.getElementById("due_message").innerHTML = reps;
							//document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
						}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/adjustDue_exec.php?invoice_id="+id+"&amount="+amount_cash+"&amount_bank="+amount_bank+"&mode="+mode+"&reff="+reff+"&due_date="+dt+"&"+rnd,true);
		xmlhttp.send();
}


//----------------- MEMBESHIP CARD -> ISSUE NEW CARD------>
function issueMembershipCard()
{
	document.getElementById("added_message").innerHTML = "<br /><br /><div class='alert alert-info text-center' style='font-size:9pt;'><i style='font-size:18pt;' class='fa fa-exclamation-triangle'></i><br /><strong>Processing!</strong> This part of the software is still under progress.</div>";
}



//----------------- CREATE NOTE ->------>
function createNote()
{
	var title = document.getElementById("title").value;		// Set variables. Get them by their ID
		title = title.replace(/;/g, "SEMCO");
		title = title.replace(/&/g, "ampSNT");
	
	var note = document.getElementById("note").value;		// Set variables. Get them by their ID
		note = note.replace(/;/g, "SEMCO");
		note = note.replace(/&/g, "ampSNT");
		
	var note_position = document.getElementById("note_posistion").value;		// Set variables. Get them by their ID
	var al = "home.php";
	
//--- Validation
if (title == null || title == "" || title == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Note title.</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = "";
	}

if (note == null || note == "" || note == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> What's the note?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving note...";
	
		$.ajax({
			  url:'logicfiles/createNote_exec.php',
			  type:"POST",
			  data:{
				  title:title,
				  note:note,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{	
						document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Note saved successfully.</div>";
						document.getElementById("title").value = "";
						document.getElementById("title").placeholder = "Title";
						document.getElementById("note").value = "";
						document.getElementById("note").placeholder = "Your note (No HTML)";
						if(note_position == 1)
							{	
								location.href = al; //--refresh
							}
						else
							{
								//--Nothing
							}
					}
				else
					{
						alert(data);
						document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}

				}
  
    });
}



//----------------- SETTINGS -> SET INVOICE HEADER------>
function set_inwardHeader()
{
	var inward = document.getElementById("inward_header").value;		// Set variables. Get them by their ID

	document.getElementById("inward_header_refresh").innerHTML="<i class='fa fa-spinner fa-spin'></i> Setting header...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("inward_header_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/settingsHeader_exec.php?inward&header="+inward,true);
		xmlhttp.send();
}


//----------------- SETTINGS -> SET SMS HEADER------>
function set_smsHeader()
{
	var inward = document.getElementById("sms_header").value;		// Set variables. Get them by their ID

	document.getElementById("sms_header_refresh").innerHTML="<i class='fa fa-spinner fa-spin'></i> Setting header...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("sms_header_refresh").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/settingsHeader_exec.php?sms_header&header="+inward,true);
		xmlhttp.send();
}



//----------------- SETTINGS -> SET MARGIN TYPE------>
function set_marginType()
{
	var type = document.getElementById("margin_type").value;		// Set variables. Get them by their ID

	document.getElementById("warning_margin_type").innerHTML="<i class='fa fa-spinner fa-spin'></i> Setting margin type...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					document.getElementById("warning_margin_type").innerHTML = xmlhttp.responseText;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/settingsMargin_type_exec.php?type="+type,true);
		xmlhttp.send();
}

//----------------- PRODUCT TYPE -> CREATE PRODUCT TYPE------>
function addProductType()
{
	var t = document.getElementById("product_type").value;		// Set variables. Get them by their ID
	var al = "new-product-type.php";
	
//--- Validation
if (t == null || t == "" || t == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Must enter the product type.</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = "";
	}

//--- Validation done

	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating type...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reff = xmlhttp.responseText;;
					if(reff == 1)
						{
							document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Product type created successfully.</div>";
							location.href = al; //--refresh
						}
					else
						{
							document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
						}
					
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/add_productType_exec.php?t="+t,true);
		xmlhttp.send();
}

//----------------- ADD CUSTOMER ------>
function addCustomer()
{
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var gstin = document.getElementById("gstin").value;		// Set variables. Get them by their ID
		gstin = gstin.replace(/;/g, "SEMCO");
		gstin = gstin.replace(/&/g, "ampSNT");
		gstin_len = gstin.length;
		
	var gstin_type = document.getElementById("gstin_type").value;		// Set variables. Get them by their ID
		gstin_type = gstin_type.replace(/;/g, "SEMCO");
		gstin_type = gstin_type.replace(/&/g, "ampSNT");
	
	var pan = document.getElementById("pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
		
	var cin = document.getElementById("cin").value;		// Set variables. Get them by their ID
		cin = cin.replace(/;/g, "SEMCO");
		cin = cin.replace(/&/g, "ampSNT");
		
	var al = "new-customer.php";

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (gstin == null || gstin == "" || gstin == " ")
	{
		//return false;
	}
else
	{
		if (gstin_len == 15)
			{
				if (gstin_type == null || gstin_type == "" || gstin_type == " "|| gstin_type == "---Type---")
					{
						document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN Type must be mentioned</font>";
						return false;
					}
				else
					{
						document.getElementById("added_message").innerHTML = " ";
					}
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN No. must be 15 digits in length</font>";
				return false;
			}
	}
	

//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating party...";
	$.ajax({
	  url:'logicfiles/addCustomer_exec.php',
	  type:"POST",
	  data:{
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  gstin:gstin,
		  gstin_type:gstin_type,
		  pan:pan,
		  cin:cin,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>customer ceated successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}


//----------------- CUSTOMER -> EDIT CUSTOMER ------>
function editCustomer()
{
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var gstin = document.getElementById("gstin").value;		// Set variables. Get them by their ID
		gstin = gstin.replace(/;/g, "SEMCO");
		gstin = gstin.replace(/&/g, "ampSNT");
		
	var gstin_type = document.getElementById("gstin_type").value;		// Set variables. Get them by their ID
		gstin_type = gstin_type.replace(/;/g, "SEMCO");
		gstin_type = gstin_type.replace(/&/g, "ampSNT");
		gstin_len = gstin.length;
	
	var pan = document.getElementById("pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
		
	var cin = document.getElementById("cin").value;		// Set variables. Get them by their ID
		cin = cin.replace(/;/g, "SEMCO");
		cin = cin.replace(/&/g, "ampSNT");
	
	var id = document.getElementById("customer_id").value;		// Set variables. Get them by their ID
	
	var al = "customer-details.php?customer_id="+id;

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (gstin == null || gstin == "" || gstin == " ")
	{
		//return false;
	}
else
	{
		if (gstin_len == 15)
			{
				if (gstin_type == null || gstin_type == "" || gstin_type == " "|| gstin_type == "---Type---")
					{
						document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN Type must be mentioned</font>";
						return false;
					}
				else
					{
						document.getElementById("added_message").innerHTML = " ";
					}
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN No. must be 15 digits in length</font>";
				return false;
			}
	}
//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving changes...";
	$.ajax({
	  url:'logicfiles/editCustomer_exec.php',
	  type:"POST",
	  data:{
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  gstin:gstin,
		  gstin_type:gstin_type,
		  pan:pan,
		  cin:cin,
		  id:id,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Saved! </strong>customer edited successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}



//----------------- ADJUST DUE FROM INVOICE -> ------>
function adjustPurchaseDue()
{
	var party_id = document.getElementById("party_id").value;		// Set variables. Get them by their ID
	var id = document.getElementById("purchase_id").value;		// Set variables. Get them by their ID
	var amount_cash = (document.getElementById("paying_amount").value -0);		// Set variables. Get them by their ID
	var amount_bank = (document.getElementById("paid_bank_amount").value -0);		// Set variables. Get them by their ID
	var master_cash = (document.getElementById("purchase_master_cash").value -0);		// Set variables. Get them by their ID
	var master_bank = (document.getElementById("purchase_master_bank").value -0);		// Set variables. Get them by their ID
	var amount = amount_cash + amount_bank;		// Set variables. Get them by their ID
	var purchase_due = (document.getElementById("purchase_due_amount").value -0);		// Set variables. Get them by their ID
	var mode = document.getElementById("transaction_mode").value;		// Set variables. Get them by their ID
	var reff = document.getElementById("transaction_reff").value;		// Set variables. Get them by their ID
	var dt = document.getElementById("paid_date").value;		// Set variables. Get them by their ID
	var al = "purchase.php?party_id="+party_id+"&purchase_id="+id;		// Set variables. Get them by their ID

//--- Validation
if (amount_cash > master_cash)
	{
		//document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Low cash balance!</strong> Your cash balance in low.</div>";
		//return false;
	}
else
	{
		document.getElementById("due_message").innerHTML = " ";
	}
	
if (amount_bank > master_bank)
	{
		//document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Low bank balance!</strong> Your bank balance in low.</div>";
		//return false;
	}
else
	{
		document.getElementById("due_message").innerHTML = " ";
	}
	
if (amount == null || amount == "" || amount == "N/A" || amount == 0)
	{
		document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>No Amount!</strong> Enter amount to adjust</div>";
		return false;
	}
else
	{
		if (amount > purchase_due)
			{
				document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Hey wait!</strong> You can not pay more than the due amount.</div>";
				return false;
			}
		else
			{
				document.getElementById("due_message").innerHTML = " ";
			}
	}

if (mode == null || mode == "" || mode == "---Mode---")
	{
		document.getElementById("warning_transaction_mode").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Mode!</strong> Mention transation mode.</div>";
		return false;
	}
else
	{
		document.getElementById("warning_transaction_mode").innerHTML = " ";
	}
//--- Validation done


	document.getElementById("due_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adjusting due...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1)
						{
							document.getElementById("due_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Purchase generated successfully.</div>";
							location.href = al; //--refresh
						}
					else
						{
							alert(reps);
							document.getElementById("due_message").innerHTML = reps;
							//document.getElementById("due_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
						}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/adjustPurchaseDue_exec.php?party_id="+party_id+"&purchase_id="+id+"&amount="+amount_cash+"&amount_bank="+amount_bank+"&mode="+mode+"&reff="+reff+"&due_date="+dt,true);
		xmlhttp.send();
}


//------------------------------CANCEL INVOICE
function cancelInvoice_id(i,customer_id)
{
	//document.getElementById("cancelInvoiceIcon").innerHTML = "<a href='logicfiles/cancelInvoice_exec.php?invoice_id="+i+"' class='btn btn-danger pull-left' style='font-weight:600;font-size:9pt;'>Delete</a>";
	document.getElementById("cancelInvoiceIcon").innerHTML = "<a href='logicfiles/removeInvoice_exec.php?invoice_id="+i+"&customer_id="+customer_id+"' class='btn btn-danger pull-left' style='font-weight:600;font-size:9pt;'>Delete</a>";
}


//--------------- PRODUCT SEARCH > PRODUCT NAME----->
function searchProduct_name()
{
	var a = document.getElementById("search_product_name").value;			// Set variables. Get them by their ID
	var al = "search-product.php?product&search="+a;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_product_name").innerHTML = "<i style='color:#ff6666;' class='fa fa-exclamation-triangle'></i> Product";
		return false;
    }
else
	{
		document.getElementById("warning_product_name").innerHTML = "Product";
	}
// Validation done 
	location.href = al;
}

//--------------- PRODUCT SEARCH > PRODUCT MFG----->
function searchProduct_mfg()
{
	var a = document.getElementById("search_product_mfg").value;			// Set variables. Get them by their ID
	var al = "search-product.php?mfg&search="+a;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_product_mfg").innerHTML = "<i style='color:#ff6666;' class='fa fa-exclamation-triangle'></i> MFG";
		return false;
    }
else
	{
		document.getElementById("warning_product_mfg").innerHTML = "MFG";
	}
// Validation done 
	location.href = al;
}

//--------------- PRODUCT SEARCH > PRODUCT BATCH----->
function searchProduct_batch()
{
	var a = document.getElementById("search_product_batch").value;			// Set variables. Get them by their ID
	var al = "search-product.php?batch&search="+a;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_product_batch").innerHTML = "<i style='color:#ff6666;' class='fa fa-exclamation-triangle'></i> Batch";
		return false;
    }
else
	{
		document.getElementById("warning_product_batch").innerHTML = "MFG";
	}
// Validation done 
	location.href = al;
}


//--------------- PURCASE SEARCH > PARTY NAME----->
function searchPurchase_name()
{
	var a = document.getElementById("search_by_name").value;			// Set variables. Get them by their ID
	var al = "search-purchase-record-name.php?party&search="+a;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("search_message").innerHTML = "<font style='font-size:9pt;'><i style='color:#ff6666;' class='fa fa-exclamation-triangle'></i> Party's name?</font>";
		return false;
    }
else
	{
		document.getElementById("search_message").innerHTML = "";
	}
// Validation done 
	location.href = al;
}

//--------------- PURCASE SEARCH > MEMO ID----->
function searchPurchase_id()
{
	var a = document.getElementById("search_by_id").value;			// Set variables. Get them by their ID
	var al = "search-purchase-record-id.php?memo_id&search="+a;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("search_memo_message").innerHTML = "<font style='font-size:9pt;'><i style='color:#ff6666;' class='fa fa-exclamation-triangle'></i> Purchase memo number?</font>";
		return false;
    }
else
	{
		document.getElementById("search_memo_message").innerHTML = "";
	}
// Validation done 
	location.href = al;
}

//--------------- PURCASE SEARCH > DATE RANGE----->
function searchDateRange_purchase()
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var al = "search-purchase-record-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}



//----------------- CREATE PRODUCT -> ADD A NEW PRODUCT------>
function addProduct()
{
	var item = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		item = item.replace(/;/g, "SEMCO");
		item = item.replace(/&/g, "ampSNT");
	
	var mfg = document.getElementById("product_mfg").value;		// Set variables. Get them by their ID
		mfg = mfg.replace(/;/g, "SEMCO");
		mfg = mfg.replace(/&/g, "ampSNT");
		
	var type = document.getElementById("product_type").value;		// Set variables. Get them by their ID
		type = type.replace(/;/g, "SEMCO");
		type = type.replace(/&/g, "ampSNT");
		
	var packing_type = document.getElementById("product_packing_type").value;		// Set variables. Get them by their ID
		packing_type = packing_type.replace(/;/g, "SEMCO");
		packing_type = packing_type.replace(/&/g, "ampSNT");
	
	var batch = document.getElementById("product_batch").value;		// Set variables. Get them by their ID
		batch = batch.replace(/;/g, "SEMCO");
		batch = batch.replace(/&/g, "ampSNT");
	
	var exp = document.getElementById("product_exp").value;		// Set variables. Get them by their ID
		exp = exp.replace(/;/g, "SEMCO");
		exp = exp.replace(/&/g, "ampSNT");
		
	var hsn = document.getElementById("product_hsn").value;		// Set variables. Get them by their ID
		hsn = hsn.replace(/;/g, "SEMCO");
		hsn = hsn.replace(/&/g, "ampSNT");
		
	var lot = (document.getElementById("product_lot").value -0);		// Set variables. Get them by their ID
	var pack_of = (document.getElementById("product_packof").value -0);		// Set variables. Get them by their ID
	var free = (document.getElementById("product_free").value -0);		// Set variables. Get them by their ID
	
	var rate = (document.getElementById("product_rate").value -0);		// Set variables. Get them by their ID
	var mrp = (document.getElementById("product_mrp").value -0);		// Set variables. Get them by their ID
	var gst = document.getElementById("product_gst").value;		// Set variables. Get them by their ID
	
	var weight = document.getElementById("product_weight").value;		// Set variables. Get them by their ID
	var base_margin = document.getElementById("product_margin").value;		// Set variables. Get them by their ID
	
	var al = "new-product.php";		// Set variables. Get them by their ID
	
//--- Validation
if (item == null || item == "" || item == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Item?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (mfg == null || mfg == "" || mfg == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> MFG?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}


if (exp == null || exp == "" || exp == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Expiry date/month/year?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (type == null || type == "" || type == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Type?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (batch == null || batch == "" || batch == " ")
	{
		//document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Batch?</font>";
		//return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (lot == null || lot == "" || lot == " " || lot == 0)
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Lot?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (pack_of == null || pack_of == "" || pack_of == " " || pack_of == 0)
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Pack of?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (rate == null || rate == "" || rate == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Rate?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

if (gst == null || gst == "" || gst == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GST?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}

	
if (mrp == null || mrp == "" || mrp == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> MRP?</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adding product...";
	
		$.ajax({
			  url:'logicfiles/addProductItem_exec.php',
			  type:"POST",
			  data:{
				  item:item,
				  mfg:mfg,
				  exp:exp,
				  type:type,
				  packing_type:packing_type,
				  batch:batch,
				  hsn:hsn,
				  lot:lot,
				  pack_of:pack_of,
				  free:free,
				  rate:rate,
				  mrp:mrp,
				  gst:gst,
				  weight:weight,
				  base_margin:base_margin,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{
						document.getElementById("item_description").value = "";
						document.getElementById("item_description").placeholder = "Item Description";
						document.getElementById("item_description").click();
						document.getElementById("item_description").focus();
						document.getElementById("search_result_product_refresh").innerHTML = "<li><a style='font-size:9pt;' class='disabled' href='javascript:void(0);'>Search by product name</a></li>";
						
						document.getElementById("product_mfg").value = "";
						document.getElementById("product_mfg").placeholder = "Manufacturer";
						
						document.getElementById("product_exp").value = "";
						document.getElementById("product_exp").placeholder = "Expiry";
						
						document.getElementById("product_type").value = "";
						document.getElementById("product_type").placeholder = "Type";
						
						document.getElementById("product_packing_type").value = "";
						document.getElementById("product_packing_type").placeholder = "Type";
						
						document.getElementById("product_batch").value = "";
						document.getElementById("product_batch").placeholder = "Batch";
						
						document.getElementById("product_hsn").value = "";
						document.getElementById("product_hsn").placeholder = "HSN Code";
						
						document.getElementById("product_lot").value = "";
						document.getElementById("product_lot").placeholder = "Lot";
						
						document.getElementById("product_packof").value = "";
						document.getElementById("product_packof").placeholder = "Pack of";
						
						document.getElementById("product_free").value = "";
						document.getElementById("product_free").placeholder = "Free packs";
						
						document.getElementById("product_rate").value = "";		
						document.getElementById("product_rate").placeholder = "Purchase / Lot (Rs.)";	

						
						document.getElementById("product_gst").value = "SC";
						document.getElementById("product_gst").placeholder = "GST (%)";
						
						document.getElementById("product_mrp").value = "";
						document.getElementById("product_mrp").placeholder = "MRP (Rs.)";
						
						document.getElementById("product_margin").value = "";
						document.getElementById("product_margin").placeholder = "(%)";
						
						document.getElementById("product_weight").value = "";
						document.getElementById("product_weight").placeholder = "(Gms.)";
						
						document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Added! </strong>Product added to stock. You can add more.</div>";
						location.href = al;
					}
				else
					{
						//alert(data);
						//document.getElementById("added_message").innerHTML = data;
						dcument.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}

				}
  
    });
}



//--------------- PRODUCT BARCODE > DYNAMIC MODAL----->
function barcodeModal(batch, qty,hsn,mfg,mrp)
{
	document.getElementById("product_barcode_batch").value = batch;
	document.getElementById("product_barcode_pcs").value = qty;
	document.getElementById("product_barcode_hsn").value = hsn;
	document.getElementById("product_barcode_mfg").value = mfg;
	document.getElementById("product_barcode_mrp").value = mrp;
}

//--------------- PRODUCT BARCODE > GENERATE BARCODE----->
function generateBarcode()
{
	var batch = document.getElementById("product_barcode_batch").value;
	var qty = document.getElementById("product_barcode_pcs").value;
	var type = document.getElementById("product_barcode_type").value;
	var ean = document.getElementById("product_ean_no").value;
	var hsn = document.getElementById("product_barcode_hsn").value;
	var mfg = document.getElementById("product_barcode_mfg").value;
	var mrp = document.getElementById("product_barcode_mrp").value;
	var pkd = document.getElementById("product_barcode_pkd").value;
	
	al = "generate-barcode.php?batch="+batch+"&qty="+qty+"&ean="+ean+"&hsn="+hsn+"&mfg="+mfg+"&mrp="+mrp+"&pkd="+pkd+"&"+type;
	
	if(ean == null || ean == "" || ean == " " || ean == "---Select EAN13---") {
		return false;
	} else {
		location.href = al;
	}
}


//----------------- SWITCH -> PACKING TYPE------>
function switchPackingType(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("packing_type_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?packing_type&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> MFG------>
function switchMFG(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("mfg_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?mfg&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> BATCH------>
function switchBatch(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("batch_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?batch&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> WEIGHT------>
function switchWeight(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("weight_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?weight&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> MRP------>
function switchMRP(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("mrp_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?mrp&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> EXP------>
function switchExpDate(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("exp_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?exp&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> DISCOUNT------>
function switchDiscount(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("discount_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?discount&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> INR------>
function switchINR(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("inr_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?inr&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> PURCHASE TRICK------>
function switchPurchase_trick(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("purchaseTrick_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?purchaseTrick&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> MASTER EXPIRY----->
function switchExpMaster(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("exp_master_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?expMaster&switch="+i,true);
		xmlhttp.send();
}

//----------------- SWITCH -> MASTER WEIGHT------>
function switchWeightMaster(i)
{
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("weight_master_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/switchSettings_exec.php?weighttMaster&switch="+i,true);
		xmlhttp.send();
}

//----------------- SETTINGS > STORE INITIALS------>
function set_storeInital()
{
	var s = document.getElementById("store_initial").value;
	
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("warning_store_initial").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/set_storeInitials_exec.php?ini="+s,true);
		xmlhttp.send();
}


//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_gstStatement()
{
	var a = document.getElementById("gst_statement_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("gst_statement_to").value;			// Set variables. Get them by their ID
	var al = "gst-statement-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gststatement_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gststatement_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gststatement_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gststatement_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 
	
	location.href = al;
}


//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_gstr1()
{
	var a = document.getElementById("gstr1_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("gstr1_to").value;			// Set variables. Get them by their ID
	var al = "gstr-1-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr1_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr1_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr1_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr1_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 
	
	location.href = al;
}

//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_gstr2()
{
	var a = document.getElementById("gstr2_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("gstr2_to").value;			// Set variables. Get them by their ID
	var al = "gstr-2-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr2_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr2_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr2_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr2_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 
	
	location.href = al;
}

//--------------- SELECT DATE RANGE FOR INVOICE RECORDS----->
function searchDateRange_gstr3b()
{
	var a = document.getElementById("gstr3b_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("gstr3b_to").value;			// Set variables. Get them by their ID
	var al = "gstr-3b-daterange.php?from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr3b_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr3b_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_gstr3b_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_gstr3b_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 
	
	location.href = al;
}


//--------------- SEARCH PRODUCT TYPE WISE----->
function searchProduct_type()
{
	var t = document.getElementById("type").value;			// Set variables. Get them by their ID
	var al = "search-product.php?type&search="+t;			// Set variables. Get them by their ID

// Validate form
if (t == null || t == "" || t == " " || t == "---Type---")
    {
		return false;
    }
else
	{
		//---
	}
// Validation done 

if(t == "All") {	
	location.href = "product.php";
} else {
	location.href = al;
}
}


//--------------- SELECT DATE RANGE FOR INVOICE SEARCH OF A SINGLE CUSTOMER----->
function searchDateRange_customer(i)
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var al = "customer_invoice_daterange.php?customer_id="+i+"&from="+a+"&to="+b;			// Set variables. Get them by their ID

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}

//-----------------ADD SCHEME ADJUSTMENT AMOUNT ------>
function adjustSchemePayment(party_id)
{
	var scheme_from = document.getElementById("scheme_from").value;		// Set variables. Get them by their ID
		scheme_from = scheme_from.replace(/;/g, "SEMCO");
		scheme_from = scheme_from.replace(/&/g, "ampSNT");
		
	var scheme_to = document.getElementById("scheme_to").value;		// Set variables. Get them by their ID
		scheme_to = scheme_to.replace(/;/g, "SEMCO");
		scheme_to = scheme_to.replace(/&/g, "ampSNT");
		
	var scheme_amount = (document.getElementById("scheme_amount").value -0);		// Set variables. Get them by their ID
		
	var scheme_payment_reff = document.getElementById("scheme_payment_reff").value;		// Set variables. Get them by their ID
		scheme_payment_reff = scheme_payment_reff.replace(/;/g, "SEMCO");
		scheme_payment_reff = scheme_payment_reff.replace(/&/g, "ampSNT");
		
	var scheme_paid_on = document.getElementById("scheme_paid_on").value;		// Set variables. Get them by their ID
		scheme_paid_on = scheme_paid_on.replace(/;/g, "SEMCO");
		scheme_paid_on = scheme_paid_on.replace(/&/g, "ampSNT");
		
//--- Validation
if (scheme_from == null || scheme_from == "" || scheme_from == " ")
	{
		document.getElementById("scheme_message_flash").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Mention scheme from date.</font>";
		return false;
	}
else
	{
		document.getElementById("scheme_message_flash").innerHTML = " ";
	}

if (scheme_to == null || scheme_to == "" || scheme_to == " ")
	{
		document.getElementById("scheme_message_flash").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Mention scheme upto date.</font>";
		return false;
	}
else
	{
		document.getElementById("scheme_message_flash").innerHTML = " ";
	}
	
if (scheme_amount == 0 || scheme_amount < 0)
	{
		document.getElementById("scheme_message_flash").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Mention a valid scheme adjustment amount.</font>";
		return false;
	}
else
	{
		document.getElementById("scheme_message_flash").innerHTML = " ";
	}
	
if (scheme_payment_reff == null || scheme_payment_reff == "" || scheme_payment_reff == " ")
	{
		document.getElementById("scheme_message_flash").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Mention adjustment payment reference.</font>";
		return false;
	}
else
	{
		document.getElementById("scheme_message_flash").innerHTML = " ";
	}
	
if (scheme_paid_on == null || scheme_paid_on == "" || scheme_paid_on == " ")
	{
		document.getElementById("scheme_message_flash").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Mention adjustment payment date.</font>";
		return false;
	}
else
	{
		document.getElementById("scheme_message_flash").innerHTML = " ";
	}
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("scheme_message_flash").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Adjusting scheme payment...";
	
		$.ajax({
			  url:'logicfiles/schemePayment_exec.php',
			  type:"POST",
			  data:{
				  party_id:party_id,
				  scheme_from:scheme_from,
				  scheme_to:scheme_to,
				  scheme_amount:scheme_amount,
				  scheme_payment_reff:scheme_payment_reff,
				  scheme_paid_on:scheme_paid_on,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{
						document.getElementById("scheme_message_flash").innerHTML = "<br /><div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Scheme amount has been successfully adjusted with.</div>";
						location.reload(true);
					}
				else
					{
						document.getElementById("scheme_message_flash").innerHTML = data;
						//document.getElementById("scheme_message_flash").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request. As your initiative is very much valuable to us, can you please post your details once again?</div>";
						//refresh_companyBanner(); //--Refresh company banner
					}

				}
  
    });
}

//----------------- EDIT PRODUCT > LOAD PRODUCT DETAILS IN A MODAL------>
function editModal(i,product)
{
	var rnd = Math.round();
	
	document.getElementById("edit_product_name_flash").innerHTML = product;
	
	document.getElementById("refresh_edit_product").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Loding product details...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("refresh_edit_product").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/editProduct_details_refresh.php?product_id="+i+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- EDIT PRODUCT -> SAVING THE CHANGES------>
function editProduct_save()
{
	var id = document.getElementById("edit_product_id").value;		// Set variables. Get them by their ID
	
	var item = document.getElementById("item_description").value;		// Set variables. Get them by their ID
		item = item.replace(/;/g, "SEMCO");
		item = item.replace(/&/g, "ampSNT");
	
	var mfg = document.getElementById("product_mfg").value;		// Set variables. Get them by their ID
		mfg = mfg.replace(/;/g, "SEMCO");
		mfg = mfg.replace(/&/g, "ampSNT");
		
	var type = document.getElementById("product_type").value;		// Set variables. Get them by their ID
		type = type.replace(/;/g, "SEMCO");
		type = type.replace(/&/g, "ampSNT");
		
	var packing_type = document.getElementById("product_packing_type").value;		// Set variables. Get them by their ID
		packing_type = packing_type.replace(/;/g, "SEMCO");
		packing_type = packing_type.replace(/&/g, "ampSNT");
	
	var batch = document.getElementById("product_batch").value;		// Set variables. Get them by their ID
		batch = batch.replace(/;/g, "SEMCO");
		batch = batch.replace(/&/g, "ampSNT");
	
	var exp = document.getElementById("product_exp").value;		// Set variables. Get them by their ID
		exp = exp.replace(/;/g, "SEMCO");
		exp = exp.replace(/&/g, "ampSNT");
		
	var hsn = document.getElementById("product_hsn").value;		// Set variables. Get them by their ID
		hsn = hsn.replace(/;/g, "SEMCO");
		hsn = hsn.replace(/&/g, "ampSNT");
		
	var lot = (document.getElementById("product_lot").value -0);		// Set variables. Get them by their ID
	var pack_of = (document.getElementById("product_packof").value -0);		// Set variables. Get them by their ID
	var free = (document.getElementById("product_free").value -0);		// Set variables. Get them by their ID
	
	var rate = (document.getElementById("product_rate").value -0);		// Set variables. Get them by their ID
	var mrp = (document.getElementById("product_mrp").value -0);		// Set variables. Get them by their ID
	var gst = document.getElementById("product_gst").value;		// Set variables. Get them by their ID
	
	var weight = document.getElementById("product_weight").value;		// Set variables. Get them by their ID
	var base_margin = document.getElementById("product_margin").value;		// Set variables. Get them by their ID
	
	var al = "new-product.php";		// Set variables. Get them by their ID
	
//--- Validation
if (item == null || item == "" || item == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Item name?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}

if (mfg == null || mfg == "" || mfg == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> MFG?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}


if (exp == null || exp == "" || exp == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Expiry date/month/year?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}
	
if (type == null || type == "" || type == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Type?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}
	
if (batch == null || batch == "" || batch == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Batch?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}

if (lot == null || lot == "" || lot == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Lot?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}
	
if (pack_of == null || pack_of == "" || pack_of == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Pack of?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}

if (rate == null || rate == "" || rate == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Rate?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}

if (gst == null || gst == "" || gst == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GST?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}

	
if (mrp == null || mrp == "" || mrp == " ")
	{
		document.getElementById("added_edit_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> MRP?</font>";
		return false;
	}
else
	{
		document.getElementById("added_edit_message").innerHTML = " ";
	}
	
//--- Validation done


//-- Initiate a spinner loading sign
	document.getElementById("added_edit_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving changes...";
	
		$.ajax({
			  url:'logicfiles/editProductItem_exec.php',
			  type:"POST",
			  data:{
				  id:id,
				  item:item,
				  mfg:mfg,
				  exp:exp,
				  type:type,
				  packing_type:packing_type,
				  batch:batch,
				  hsn:hsn,
				  lot:lot,
				  pack_of:pack_of,
				  free:free,
				  rate:rate,
				  mrp:mrp,
				  gst:gst,
				  weight:weight,
				  base_margin:base_margin,
				  },

			  success: function(data)
			  {
				if(data == 1)
					{
						document.getElementById("added_edit_message").innerHTML = "<br /><div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Saved! </strong>Product edited successfully.</div>";
						//location.href = al;
						location.reload(true);
					}
				else
					{
						//alert(data);
						//document.getElementById("added_edit_message").innerHTML = data;
						//document.getElementById("added_edit_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}

				}
  
    });
}



//----------------- ADD CENTRE  ------>
function addCentre()
{
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var al = "centre.php";

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Centre name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Centre address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Centre contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	

//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating centre...";
	$.ajax({
	  url:'logicfiles/addCentre_exec.php',
	  type:"POST",
	  data:{
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>centre ceated successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}


//----------------- CUSTOMER -> EDIT CUSTOMER ------>
function editCustomer()
{
	var name = document.getElementById("name").value;		// Set variables. Get them by their ID
		name = name.replace(/;/g, "SEMCO");
		name = name.replace(/&/g, "ampSNT");
		
	var address = document.getElementById("address").value;		// Set variables. Get them by their ID
		address = address.replace(/;/g, "SEMCO");
		address = address.replace(/&/g, "ampSNT");
	
	var contact = document.getElementById("contact").value;		// Set variables. Get them by their ID
		contact = contact.replace(/;/g, "SEMCO");
		contact = contact.replace(/&/g, "ampSNT");
		
	var state = document.getElementById("state").value;		// Set variables. Get them by their ID
		state = state.replace(/;/g, "SEMCO");
		state = state.replace(/&/g, "ampSNT");
		
	var state_initials = document.getElementById("state_initial").value;		// Set variables. Get them by their ID
		state_initials = state_initials.replace(/;/g, "SEMCO");
		state_initials = state_initials.replace(/&/g, "ampSNT");
		
	var state_code = document.getElementById("state_code").value;		// Set variables. Get them by their ID
		state_code = state_code.replace(/;/g, "SEMCO");
		state_code = state_code.replace(/&/g, "ampSNT");
		
	var gstin = document.getElementById("gstin").value;		// Set variables. Get them by their ID
		gstin = gstin.replace(/;/g, "SEMCO");
		gstin = gstin.replace(/&/g, "ampSNT");
		
	var gstin_type = document.getElementById("gstin_type").value;		// Set variables. Get them by their ID
		gstin_type = gstin_type.replace(/;/g, "SEMCO");
		gstin_type = gstin_type.replace(/&/g, "ampSNT");
		gstin_len = gstin.length;
	
	var pan = document.getElementById("pan").value;		// Set variables. Get them by their ID
		pan = pan.replace(/;/g, "SEMCO");
		pan = pan.replace(/&/g, "ampSNT");
		
	var cin = document.getElementById("cin").value;		// Set variables. Get them by their ID
		cin = cin.replace(/;/g, "SEMCO");
		cin = cin.replace(/&/g, "ampSNT");
	
	var id = document.getElementById("customer_id").value;		// Set variables. Get them by their ID
	
	var al = "customer-details.php?customer_id="+id;

//--Validation
if (name == null || name == "" || name == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party name</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (address == null || address == "" || address == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party address</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (contact == null || contact == "" || contact == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Party contact</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state == null || state == "" || state == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_initials == null || state_initials == "" || state_initials == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State initials must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (state_code == null || state_code == "" || state_code == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> State code must be mentioned</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = " ";
	}
	
if (gstin == null || gstin == "" || gstin == " ")
	{
		//return false;
	}
else
	{
		if (gstin_len == 15)
			{
				if (gstin_type == null || gstin_type == "" || gstin_type == " "|| gstin_type == "---Type---")
					{
						document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN Type must be mentioned</font>";
						return false;
					}
				else
					{
						document.getElementById("added_message").innerHTML = " ";
					}
			}
		else
			{
				document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> GSTIN No. must be 15 digits in length</font>";
				return false;
			}
	}
//--Ends here 
	
	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Saving changes...";
	$.ajax({
	  url:'logicfiles/editCustomer_exec.php',
	  type:"POST",
	  data:{
		  name:name,
		  address:address,
		  contact:contact,
		  state:state,
		  state_initials:state_initials,
		  state_code:state_code,
		  gstin:gstin,
		  gstin_type:gstin_type,
		  pan:pan,
		  cin:cin,
		  id:id,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Saved! </strong>customer edited successfully.</div>";
				location.href = al; //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}

//----------------- DAILY REGISTER > ADD RECORD------>
function addRecord(date)
{
	var sp_id = document.getElementById("sp_id").value;		// Set variables. Get them by their ID
		sp_id = sp_id.replace(/;/g, "SEMCO");
		sp_id = sp_id.replace(/&/g, "ampSNT");
	
	var as_package = (document.getElementById("as_package").value -0);		// Set variables. Get them by their ID
	var as_pickup = (document.getElementById("as_pickup").value -0);		// Set variables. Get them by their ID
	
	var us_package = (document.getElementById("us_package").value -0);		// Set variables. Get them by their ID
	var us_pickup = (document.getElementById("us_pickup").value -0);		// Set variables. Get them by their ID
	
	var rnd = Math.round();
	
//--Validation Start-->
	if (sp_id == null || sp_id == "" || sp_id == " ") {
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select a service provider</font>";
		return false;
	} else {
		document.getElementById("added_message").innerHTML = " ";
	}
	
//--Validation End-->


	document.getElementById("added_message").innerHTML = "<br /><i class='fa fa-spinner fa-spin'></i> Saving changes...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1) {
						document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Added! </strong>Record added to register.</div>";
						location.reload(true);
					} else {
						alert(reps);
						document.getElementById("added_message").innerHTML = reps;
						//document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
					}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/addRecord_exec.php?sp_id="+sp_id+"&as_package="+as_package+"&as_pickup="+as_pickup+"&us_package="+us_package+"&us_pickup="+us_pickup+"&date="+date+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- DAILY REGISTER > EDIT RECORD------>
function selectSP(party_id, party_name, date)
{
	document.getElementById("register_name").innerHTML = party_name;
	var rnd = Math.round();
	
	document.getElementById("register_refresh").innerHTML = "<br /><i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("register_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/editRecord_refresh.php?party_id="+party_id+"&date="+date+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- DAILY REGISTER > SAVE EDITED RECORD------>
function saveRecord(i, id, party_id)
{
	var as_package = (document.getElementById("package_"+i).value -0);		// Set variables. Get them by their ID
	var us_package = (document.getElementById("undelivered_"+i).value -0);		// Set variables. Get them by their ID
	var as_pickup = (document.getElementById("pickup_"+i).value -0);		// Set variables. Get them by their ID
	var us_pickup = (document.getElementById("us_pickup_"+i).value -0);		// Set variables. Get them by their ID
	
	var rnd = Math.round();
	
	document.getElementById("register_message").innerHTML = "<i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("register_message").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/editRecord_exec.php?id="+id+"&as_package="+as_package+"&us_package="+us_package+"&as_pickup="+as_pickup+"&us_pickup="+us_pickup+"&"+rnd,true);
		xmlhttp.send();
}

//----------------- DAILY REGISTER > DELETE RECORD------>
function removeRecord(i, id, party_id, date)
{
	var party_name = document.getElementById("register_name").value;		// Set variables. Get them by their ID
	var rnd = Math.round();
	var cnf = confirm("Are you sure you want remove this record?");
	if(cnf == true) {
		//--All good
	} else {
		return false;
	}
	
	document.getElementById("register_message").innerHTML = "<i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1) {
						document.getElementById("register_message").innerHTML = '<span style="color:#329999;font-weight:900;"><i class="fa fa-check fa-fw"></i> Record has been removed.</span>';
						selectSP(party_id, party_name, date); //--Reload area
						location.reload(true);
					} else {
						document.getElementById("register_message").innerHTML = '';
					}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removeRecord_exec.php?id="+id+"&"+rnd,true);
		xmlhttp.send();

}


//--------------- DAILY REGISTER > SEARCH RECORDS ----->
function searchDateRange_dailyRegister()
{
	var a = document.getElementById("packet_from").value;			// Set variables. Get them by their ID
	var b = document.getElementById("packet_to").value;			// Set variables. Get them by their ID
	var c = document.getElementById("service_provider_id").value;			// Set variables. Get them by their ID
	
	if (c == null || c == "" || c == " ") {
		var al = "register-records.php?from="+a+"&to="+b;			// Set variables. Get them by their ID
	} else {
		var al = "register-records.php?sp_id="+c+"&from="+a+"&to="+b;			// Set variables. Get them by their ID
	}

// Validate form
if (a == null || a == "" || a == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i style='color:#ff6666;' class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}

if (b == null || b == "" || b == " ")
    {
		//alert("Please fill your first name.");
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i style='color:#ff6666;' class='fa fa-calendar-check-o'></i>";
		return false;
    }
else
	{
		document.getElementById("warning_daterange").innerHTML = "<i class='fa fa-calendar'></i> <i class='fa fa-ellipsis-h'></i> <i class='fa fa-calendar-check-o'></i>";
	}
// Validation done 

if (window.XMLHttpRequest) 
	{        		 
        xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
    } 
else 
    {       		  
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
    }
	
	location.href = al;
}

//----------------- DAILY REGISTER > EDIT RECORD > IN A RANGE------>
function selectSP_range(party_id, party_name, from, to)
{
	document.getElementById("register_name").innerHTML = party_name;
	var rnd = Math.round();
	
	document.getElementById("register_refresh").innerHTML = "<br /><i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					document.getElementById("register_refresh").innerHTML = reps;
              	}
        } 
		
		xmlhttp.open("GET","ui/ajax/editRecord_range_refresh.php?party_id="+party_id+"&from="+from+"&to="+to+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- DAILY REGISTER > DELETE RECORD > RANGE ------>
function removeRecord_range(i, id, party_id, from, to)
{
	var party_name = document.getElementById("register_name").value;		// Set variables. Get them by their ID
	var rnd = Math.round();
	var cnf = confirm("Are you sure you want remove this record?");
	if(cnf == true) {
		//--All good
	} else {
		return false;
	}
	
	document.getElementById("register_message").innerHTML = "<i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1) {
						document.getElementById("register_message").innerHTML = '<span style="color:#329999;font-weight:900;"><i class="fa fa-check fa-fw"></i> Record has been removed.</span>';
						selectSP_range(party_id, party_name, from, to); //--Reload area
						location.reload(true);
					} else {
						document.getElementById("register_message").innerHTML = '';
					}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removeRecord_exec.php?id="+id+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- EXPENSE HEAD -> CREATE NEW------>
function addExpenseHead()
{
	var t = document.getElementById("product_type").value;		// Set variables. Get them by their ID
		t = t.replace(/;/g, "SEMCO");
		t = t.replace(/&/g, "ampSNT");
	
	var al = "expense_head.php";
	
//--- Validation
if (t == null || t == "" || t == " ")
	{
		document.getElementById("added_message").innerHTML = "<br /><font style='color:#ff6666;font-size:9pt;'><i class='fa fa-exclamation-triangle'></i> Must enter the expense head.</font>";
		return false;
	}
else
	{
		document.getElementById("added_message").innerHTML = "";
	}

//--- Validation done

	document.getElementById("added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating expense head...";
	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reff = xmlhttp.responseText;;
					if(reff == 1)
						{
							document.getElementById("added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>Product type created successfully.</div>";
							location.href = al; //--refresh
						}
					else
						{
							document.getElementById("added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;margin-top:10px;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
						}
					
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/add_expenseHead_exec.php?t="+t,true);
		xmlhttp.send();
}

//----------------- PARTY DETAILS > REMOVE FILE ------>
function removeFile(id, url)
{
	//alert(url);
	var rnd = Math.round();
	var cnf = confirm("Are you sure you want remove this file?");
	if(cnf == true) {
		//--All good
	} else {
		return false;
	}
	
	//document.getElementById("remove_message").innerHTML = "<i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1) {
						//document.getElementById("register_message").innerHTML = '<span style="color:#329999;font-weight:900;"><i class="fa fa-check fa-fw"></i> Record has been removed.</span>';
						//selectSP_range(party_id, party_name, from, to); //--Reload area
						alert('File has been removed successfully');
						location.reload(true);
					} else {
						//document.getElementById("register_message").innerHTML = '';
					}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removePartyFile_exec.php?id="+id+"&url="+url+"&"+rnd,true);
		xmlhttp.send();

}

//----------------- NEW REGISTRATION v2  ------>
function newUserRegistration()
{
	var fname = document.getElementById("new_fname").value;		// Set variables. Get them by their ID
		fname = fname.replace(/;/g, "SEMCO");
		fname = fname.replace(/&/g, "ampSNT");
	
	var lname = document.getElementById("new_lname").value;		// Set variables. Get them by their ID
		fname = fname.replace(/;/g, "SEMCO");
		fname = fname.replace(/&/g, "ampSNT");
		
	var username = document.getElementById("new_username").value;		// Set variables. Get them by their ID
		username = username.replace(/;/g, "SEMCO");
		username = username.replace(/&/g, "ampSNT");
	
	var email = document.getElementById("new_email").value;		// Set variables. Get them by their ID
		email = email.replace(/;/g, "SEMCO");
		email = email.replace(/&/g, "ampSNT");
		
	var center_id = document.getElementById("new_center").value;		// Set variables. Get them by their ID
		center_id = center_id.replace(/;/g, "SEMCO");
		center_id = center_id.replace(/&/g, "ampSNT");
		
	var user_type = document.getElementById("new_type").value;		// Set variables. Get them by their ID
		user_type = user_type.replace(/;/g, "SEMCO");
		user_type = user_type.replace(/&/g, "ampSNT");
		
//--Validation
if (fname == null || fname == "" || fname == " ") {
	document.getElementById("user_added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> First name</font>";
	return false;
} else {
	document.getElementById("user_added_message").innerHTML = " ";
}

if (lname == null || lname == "" || lname == " ") {
	document.getElementById("user_added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Last name</font>";
	return false;
} else {
	document.getElementById("user_added_message").innerHTML = " ";
}

if (username == null || username == "" || username == " " || username.length < 10 || username.length > 10) {
	document.getElementById("user_added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> 10 Digit Mobile only</font>";
	return false;
} else {
	document.getElementById("user_added_message").innerHTML = " ";
}

if (email==null || email=="" || email==" ") {
	document.getElementById(user_added_message).innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter your email.</font>";
	return false; 
} else {
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		document.getElementById("user_added_message").innerHTML = "<font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> You must enter a valid email.</font>";
		return false;
	} else {
		document.getElementById("user_added_message").innerHTML = " ";
	}
}

if (user_type == null || user_type == "" || user_type == " ") {
	document.getElementById("user_added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select a user type</font>";
	return false;
} else {
	if (user_type == "center_manager") {
		if (center_id == null || center_id == "" || center_id == " ") {
			document.getElementById("user_added_message").innerHTML = "<br /><font style='color:#ff6666;'><i class='fa fa-exclamation-triangle'></i> Select a centre</font>";
			return false;
		} else {
			document.getElementById("user_added_message").innerHTML = " ";
		}
	} else {
		document.getElementById("user_added_message").innerHTML = " ";
	}
}
//--Ends here 
	
	document.getElementById("user_added_message").innerHTML="<br /><i class='fa fa-spinner fa-spin'></i> Creating user...";
	$.ajax({
	  url:'logicfiles/newUser_registration_exec.php',
	  type:"POST",
	  data:{
		  fname:fname,
		  lname:lname,
		  username:username,
		  email:email,
		  center_id:center_id,
		  user_type:user_type,
		  },

	  success: function(data)
	  {
		if(data == 1)
			{	
				document.getElementById("user_added_message").innerHTML = "<div class='alert alert-success' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Success! </strong>user ceated successfully.</div>";
				//location.href = al; //--refresh
				alert("User has been created successfully!");
				location.reload(true); //--refresh
			}
		else
			{
				//alert(data);
				document.getElementById("user_added_message").innerHTML = "<br /><div class='alert alert-danger' style='font-size:9pt;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Oh Snap!</strong> There is an error while submitting your request.</div>";
			}

		}
  
    });
}

//----------------- USER MANAGEMENT > REMOVE USER ------>
function removeUser(id, master)
{
	//alert(url);
	var rnd = Math.round();
	var cnf = confirm("Are you sure you want remove this user?");
	if(cnf == true) {
		//--All good
	} else {
		return false;
	}
	
	//document.getElementById("remove_message").innerHTML = "<i class='fa fa-spinner fa-spin'></i> Loading...";

	if (window.XMLHttpRequest) 
	    {        		 
			xmlhttp = new XMLHttpRequest();	// code for IE7+, Firefox, Chrome, Opera, Safari
		} 
    else 
		{       		  
          	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");	// code for IE6, IE5
     	}
    xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
          		{ 
					var reps = xmlhttp.responseText;
					if(reps == 1) {
						//document.getElementById("register_message").innerHTML = '<span style="color:#329999;font-weight:900;"><i class="fa fa-check fa-fw"></i> Record has been removed.</span>';
						//selectSP_range(party_id, party_name, from, to); //--Reload area
						alert('User has been removed successfully');
						location.reload(true);
					} else if(reps == 2) {
						alert('Super admin can not be removed');
					} else {
						//document.getElementById("register_message").innerHTML = '';
					}
              	}
        } 
		
		xmlhttp.open("GET","logicfiles/removeUser_exec.php?auth_id="+id+"&master="+master+"&"+rnd,true);
		xmlhttp.send();

}
</script>