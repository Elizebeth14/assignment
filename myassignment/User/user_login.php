<?php
include("../header.php");
include("user_menu.php");
include('../calendar.php');
error_reporting(0);	
$status=$_REQUEST['status'];
if ($status == "logout")
{
	session_start();
    session_unset();
    session_destroy();
	header("location:user_login.php");
}
?>
<html>
<head>
<body background="pic.jpg">


<link rel="stylesheet" href="../header.css">

<script type="text/javascript" src="../validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="../validation/jquery.js"></script>
<script type="text/javascript">
jQuery.validator.addMethod("notEqual", function(value, element, param) {return this.optional(element) || value != param;}, "Please enter your name");

$(document).ready(function() {jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

			$("#login_form").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					username: 
					{
						required: true
					},
					password: 
					{
						required: true
					},
					comment: 
					{
						required: true
					}
					},
					messages: 
					{
						comment: "Please enter a comment.",
						password2: "Password Doesn't Matched"
					}
					
			});	
		});	
</script>

<title>User Login</title>
</head>
<form action="login_check.php" method="post" name="login_form" id="login_form">


 <table id="form_table" align="center" style="margin-top:20px;" bgcolor="#0066FF">
 
 <tr>
 <th colspan="2" align="center"><font size="3" color="#800080">USER LOGIN</font></th>
 </tr>
 
 <tr>
	<td>Email Id:</td>
	<td><input type="text" name="username" placeholder="Please enter your Email Id"/></td>
</tr>

<tr>
	<td>Password:</td>
	<td><input type="password" name="password" placeholder="Please enter your Password"/></td>
</tr>

<tr>
<td colspan="2" align="center" ><input type="submit" value="Login" name="login" id="button" /></td>
</tr>
</table>
</form>
<?php 
error_reporting(0);
$error=$_REQUEST['status'];
if ($error == "invalid")
{
?>
<p id="try" style="font-size:18px; color:#F00; text-align:center;"><?php echo "Sorry, Invalid Datas : Try again"; echo "<br />";?></p>
<?php
}
?>
</body>
</html>
     
       