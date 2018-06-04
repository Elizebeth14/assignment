<?php
include("../header.php");
include("user_mainmenu.php");
error_reporting(0);	
?>
<html>
<head>
<link rel="stylesheet" href="../header.css">
<title>Welcome <?php echo $fname;  ?></title>
</head>
<body>
<?php
include("../db/connection.php");
$result=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$id'");
$row=mysqli_fetch_array($result);
?>

<table id="test_table" border="0" align="center">
<tr>
	<th colspan="2" align="center"><h3>PERSONAL DETAILS</h3></th>
</tr> 
<tr>
	<th>First Name:</th>
	<td><?php echo $row['fname']; ?></td>
</tr> 
<tr>
	<th>Middle Name:</th>
    <td><?php echo $row['mname']; ?></td>
</tr>
<tr>
	<th>Last Name:</th>
    <td><?php echo $row['lname']; ?></td>
</tr>
<tr>
	<th>Phone Number:</th>
    <td><?php echo $row['phone_no']; ?></td>
</tr>
<tr>
	<th>Email Id: </th>
    <td><?php echo $row['email_id']; ?></td>
</tr>
<tr>
	<th>Password:</th>
    <td>******</td>
</tr>
<tr>
	<th>DOB:</th>
    <td><?php echo $row['dob']; ?></td>
</tr>
<tr>
	<th>Photo:</th>
    <td><img src="<?php echo $row['photo']; ?>" width="150" height="150">
    <a href="edit_personal.php">Edit Personal Details</a></td>
</tr>
<tr>
	<th colspan="2" align="center"><h3>PROFESSIONAL DETAILS</h3></th>
</tr> 
<?php
$result1=mysqli_query($con,"SELECT * FROM user_details WHERE user_id='$id'");
$row1=mysqli_fetch_array($result1);
$num_rows=mysqli_num_rows($result1);
if($num_rows>0)
{
?>
<tr>
	<th>Lives at:</th>
    <td><?php echo $row1['lives_at']; ?></td>
</tr>
<tr>
	<th>Studied at:</th>
    <td><?php echo $row1['studied_at']; ?></td>
</tr>
<tr>
	<th>Working at:</th>
    <td><?php echo $row1['working_at']; ?></td>
</tr>
<tr>
	<th>Marital Status:</th>
    <td><?php echo $row1['marital_status']; ?></td>
</tr>    
<tr>
	<th>Native Place:</th>
    <td><?php echo $row1['native_place']; ?>
    <a href="edit_professional.php?id=<?php echo $row1['id']; ?>" style="margin-left:125px;">Edit Professional Details</a></td>
</tr>    
<?php
}
else
{
?>
<tr>
	<th colspan="2" style="padding-left:300px;"><a href="add_details.php">ADD DETAILS</a></th>
</tr>    
<?php
}
?>
</table>
<br>
</body>
</html>