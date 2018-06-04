<?php
include("../header.php");
include("user_menu.php");
include('../calendar.php');
error_reporting(0);	
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

			$("#user_regform").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					fname:
					{
						required: true	
					},
					mname:
					{
						required:false
					},
					lname: 
					{
						required: true
					},
					password: 
					{
						required: true,
					 	rangelength: [4, 8]		
					},
					password1: 
					{
						required: true,
						equalTo:'#password'	
					}, 
					dob: 
					{
						required: true
					},
					email_id: 
					{
						required: true,
						email: true	
					},
					phone_no: 
					{
						required: true,
						rangelength: [10,10]
					},
					},
					messages: 
					{
						comment: "Please enter a comment.",
						password1: "Password Doesn't Matched"
					}
					
			});	
		});	
</script>

<title>User Registration</title>
</head>
<form action="userreg_insert.php" method="post" name="user_regform" id="user_regform" enctype="multipart/form-data">

 
<table id="form_table" border="0" align="center" style="margin-top:20px;" bgcolor="#0066FF">
<tr>
<?php 
error_reporting(0);
$status=$_REQUEST['status'];
if ($status == "Insertion successfull")
{
?>
<p id="try" style="font-size:15px; color:#F00; text-align:center; font-weight:bold;"><?php echo "Registration Successfull"; echo "<br />";?></p>
<?php
}
if ($status == "user exists")
{
?>
<p id="try" style="font-size:15px; color:#F00; text-align:center; font-weight:bold;"><?php echo "Sorry: User Already Exists"; echo "<br />";?></p>
<?php
}
?>



 <th colspan="3" align="center"><font size="3" color="#800080">USER REGISTRATION</font></th>
 </tr>
 <tr>
 
 <td>

<table>
<tr>
	<td>First Name:</td>
	<td><input type="text" name="fname" /></td>
</tr> 
<tr>
	<td>Middle Name:</td>
	<td><input type="text" name="mname"/></td>
</tr>
<tr>
	<td>Last Name:</td>
	<td><input type="text" name="lname"/></td>
</tr>
<tr>
	<td>Phone No:</td>
	<td><input type="text" name="phone_no"/></td>
</tr>
<tr>
	<td>Email Id:</td>
	<td><input type="text" name="email_id"/></td>
</tr>
<tr>
	<td>DOB:</td>
	<td><input type="text" name="dob" id="dob"/></td>
</tr>
<tr>
	<td>Password:</td>
	<td><input type="password" name="password" id="password"/></td>
</tr>
<tr>
	<td>Confirm Password:</td>
	<td><input type="password" name="password1" name="password1"/></td>
</tr>
<tr>
	<td>Photo:</td>
	<td><input type="file" name="photo"/></td>
</tr>
</table>
</td>
 



</tr>

<tr>
<td colspan="3" align="center"><input type="submit" value="Register" name="register" id="button" />
<button type="button" name="cancel" id="button" onClick="window.location.href='user_login.php'">Cancel</button></td>
</tr>




</table>

</form>

</body>
</html>