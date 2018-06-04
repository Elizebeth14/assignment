<?php
error_reporting(0);	
include("../header.php");
include("user_mainmenu.php");
include("../calendar.php");
include("../db/connection.php");
if(isset($_POST['update']))
{
$password=$_POST['password'];

if($password=="")
{
$uploadDir = 'profile/';
$fileName = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];
$fileType = $_FILES['photo']['type'];	
date_default_timezone_set("Asia/Calcutta");  
$filePath = $uploadDir .date('d-m-Y H-i-s'). "-".$fileName;  
if(move_uploaded_file($tmpName, $filePath))
{
	$query= "UPDATE user_reg SET fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]',phone_no='$_POST[phone_no]',dob='$_POST[dob]',photo='$filePath' WHERE id='$id'";
	if (mysqli_query($con,$query))
    {  
 header("location:my_profile.php");
	}
	else
	{
 header("location:edit_personal.php");
	}
}
else
{
$query= "UPDATE user_reg SET fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]', phone_no='$_POST[phone_no]',dob='$_POST[dob]' WHERE id='$id'";
	if (mysqli_query($con,$query))
    {  
 header("location:my_profile.php");
	}
	else
	{
 header("location:edit_personal.php");
	}	
}
}
else
{
	
	$uploadDir = 'profile/';
$fileName = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];
$fileType = $_FILES['photo']['type'];	
date_default_timezone_set("Asia/Calcutta");  
$filePath = $uploadDir .date('d-m-Y H-i-s'). "-".$fileName;  
if(move_uploaded_file($tmpName, $filePath))
{
	$query= "UPDATE user_reg SET fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]',phone_no='$_POST[phone_no]',password='$_POST[password]',dob='$_POST[dob]',photo='$filePath' WHERE id='$id'";
	if (mysqli_query($con,$query))
    {  
 header("location:my_profile.php");
	}
	else
	{
 header("location:edit_personal.php");
	}
}
else
{
$query= "UPDATE user_reg SET fname='$_POST[fname]',mname='$_POST[mname]',lname='$_POST[lname]', phone_no='$_POST[phone_no]',password='$_POST[password]',dob='$_POST[dob]' WHERE id='$id'";
	if (mysqli_query($con,$query))
    {  
 header("location:my_profile.php");
	}
	else
	{
 header("location:edit_personal.php");
	}	
}
}
}

?>
<html>
<head>
<link rel="stylesheet" href="../header.css">
<html>
<head>
<body>
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
					dob: 
					{
						required: true
					},
					old_password: 
					{
						required: true,
					 	rangelength: [4, 8]	,
						equalTo:'#current_password'	
					},
					password: 
					{
						rangelength: [4, 8]		
					},
					password1: 
					{
						equalTo:'#password'	
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
						password1: "Password Doesn't Matched",
						old_password: "Please enter your correct password"
						
					}
					
			});	
		});	
</script>

<title>Welcome <?php echo $fname;  ?></title>
</head>
<body>
<?php
$result=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$id'");
$row=mysqli_fetch_array($result);
?>

<form method="post" name="user_regform" id="user_regform" enctype="multipart/form-data">
 <fieldset>
 
<table id="form_table" border="0" align="center" style="margin-top:20px;">
<tr>
<th colspan="3" align="center"><font size="3" color="#800080">USER UPDATION</font></th>
 </tr>
 <tr>
 
 <td>
 <fieldset>
<table>
<tr>
	<td>First Name:</td>
	<td><input type="text" name="fname" value="<?php echo $row['fname']; ?>" /></td>
</tr> 
<tr>
	<td>Middle Name:</td>
	<td><input type="text" name="mname" value="<?php echo $row['mname']; ?>"/></td>
</tr>
<tr>
	<td>Last Name:</td>
	<td><input type="text" name="lname" value="<?php echo $row['lname']; ?>"/></td>
</tr>
<tr>
	<td>Phone No:</td>
	<td><input type="text" name="phone_no" value="<?php echo $row['phone_no']; ?>"/></td>
</tr>
<tr>
	<td>DOB:</td>
	<td><input type="text" name="dob" id="dob" value="<?php echo $row['dob']; ?>"/></td>
</tr>
<tr>
	<td>Old Password:</td>
	<td>
    <input type="hidden" name="current_password" id="current_password" value="<?php echo $row['password']; ?>"/>
    <input type="password" name="old_password" id="old_password"/></td>
</tr>
<tr>
	<td>New Password:</td>
	<td><input type="password" name="password" id="password"/></td>
</tr>
<tr>
	<td>Confirm Password:</td>
	<td><input type="password" name="password1" id="password1"/></td>
</tr>
<tr>
	<td>Photo:</td>
	<td><img src="<?php echo $row['photo']; ?>" width="150" height="150"><input type="file" name="photo"/></td>
</tr>
</table>
</fieldset>
</td>
 



</tr>

<tr>
<td colspan="3" align="center"><input type="submit" value="Update" name="update" id="button" />
<button type="button" name="cancel" id="button" onClick="window.location.href='my_profile.php'">Cancel</button></td>
</tr>




</table>
</fieldset>
</form>



</body>
</html>