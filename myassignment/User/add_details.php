<?php
include("../header.php");
include("user_mainmenu.php");
include("../calendar.php");
include("../db/connection.php");
error_reporting(0);	
?>
<html>
<head>
<body>
<link rel="stylesheet" href="../header.css">
<script type="text/javascript" src="../validation/jquery.validate.min.js"></script>
<script type="text/javascript" src="../validation/jquery.js"></script>
<script type="text/javascript">
jQuery.validator.addMethod("notEqual", function(value, element, param) {return this.optional(element) || value != param;}, "Please enter your name");

$(document).ready(function() {jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

			$("#user_detailform").validate({
				submitHandler:function(form) 
				{
					SubmittingForm();
				},
				rules: 
				{
					lives_at:
					{
						required: true
					},
					studied_at:
					{
						required:true
					},
					working_at: 
					{
						required: true
					},
					marital_status: 
					{
						required: true	
					},
					native_place: 
					{
						required: true	
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
<form action="details_insert.php" method="post" name="user_detailform" id="user_detailform">
 <fieldset>
 
<table id="form_table" border="0" align="center" style="margin-top:20px;">
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
 <fieldset>
<table>
<tr>
<input type="hidden" name="user_id" value="<?php echo $id; ?>" />
	<td>Lives At:</td>
	<td><input type="text" name="lives_at" /></td>
</tr> 
<tr>
	<td>Studied At:</td>
	<td><input type="text" name="studied_at"/></td>
</tr>
<tr>
	<td>Working At:</td>
	<td><input type="text" name="working_at"/></td>
</tr>
<tr>
	<td>Marital Status:</td>
	<td><input type="radio" name="marital_status" value="single"/>Single
    <input type="radio" name="marital_status" value="married"/>Married</td>
</tr>
<tr>
	<td>Native Place:</td>
	<td><input type="text" name="native_place"/></td>
</tr>

</table>
</fieldset>
</td>
 



</tr>

<tr>
<td colspan="3" align="center"><input type="submit" value="Add" name="add" id="button" />
<button type="button" name="cancel" id="button" onClick="window.location.href='my_profile.php'">Cancel</button></td>
</tr>




</table>
</fieldset>
</form>

</body>
</html>