<?php
include("../header.php");
include("user_mainmenu.php");
include("../calendar.php");
include("../db/connection.php");
error_reporting(0);
$detail_id=$_REQUEST['id'];
if(isset($_POST['update']))
{
$query= "UPDATE user_details SET lives_at='$_POST[lives_at]',studied_at='$_POST[studied_at]',working_at='$_POST[working_at]',marital_status='$_POST[marital_status]',native_place='$_POST[native_place]' WHERE id='$detail_id'";
	if (mysqli_query($con,$query))
    {  
 header("location:my_profile.php");
	}
	else
	{
 header("location:professional.php");
	}
}
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

			$("#edit_detailform").validate({
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
<form method="post" name="edit_detailform" id="edit_detailform">
 <fieldset>
 
<table id="form_table" border="0" align="center" style="margin-top:20px;">
<tr>
<?php 
$result=mysqli_query($con,"SELECT * FROM user_details WHERE id='$detail_id'");
$row=mysqli_fetch_array($result);
?>



 <th colspan="3" align="center"><font size="3" color="#800080">EDIT PROFESSIONAL</font></th>
 </tr>
 <tr>
 
 <td>
 <fieldset>
<table>
<tr>
<input type="hidden" name="user_id" value="<?php echo $id; ?>" />
	<td>Lives At:</td>
	<td><input type="text" name="lives_at" value="<?php echo $row['lives_at']; ?>"  /></td>
</tr> 
<tr>
	<td>Studied At:</td>
	<td><input type="text" name="studied_at" value="<?php echo $row['studied_at']; ?>" /></td>
</tr>
<tr>
	<td>Working At:</td>
	<td><input type="text" name="working_at" value="<?php echo $row['working_at']; ?>" /></td>
</tr>
<tr>
	<td>Marital Status:</td>
	<td><input type="radio" name="marital_status" value="single"
    <?php $marital_status=$row['marital_status'];
	if($marital_status=="single")
	{
	echo "checked";	
	}
	?>
    />Single
    <input type="radio" name="marital_status" value="married" 
	<?php if($marital_status=="married")
	{
	echo "checked";	
	}
	?>/>Married</td>
</tr>
<tr>
	<td>Native Place:</td>
	<td><input type="text" name="native_place" value="<?php echo $row['native_place']; ?>" /></td>
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