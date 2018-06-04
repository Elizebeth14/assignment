<?php
include("../header.php");
include("user_mainmenu.php");
error_reporting(0);	
$user_id=$_REQUEST['user_id']
?>
<html>
<head>
<link rel="stylesheet" href="../header.css">
<title>Welcome <?php echo $fname;  ?></title>
</head>
<body>
<?php
include("../db/connection.php");
$result=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$user_id'");
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
	<th>DOB:</th>
    <td><?php echo $row['dob']; ?></td>
</tr>
<tr>
	<th>Photo:</th>
    <td><img src="<?php echo $row['photo']; ?>" width="150" height="150"></td>
</tr>
<tr>
	<th colspan="2" align="center"><h3>PROFESSIONAL DETAILS</h3></th>
</tr> 
<?php
$result1=mysqli_query($con,"SELECT * FROM user_details WHERE user_id='$user_id'");
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
    <td><?php echo $row1['native_place']; ?></td>
</tr>    
<?php
}
else
{
?>
<tr>
	<th colspan="2" style="padding-left:300px;"><a href="#">NO DETAILS TO SHOW</a></th>
</tr>    
<?php
}
?>

</table>
<br>
<table id="test_table" border="0" align="center">
<tr>
<td>
<a style="margin-left:550px;" href="send_request.php"> << Go Back << </a>
</a>
</td>
</tr>
</table>
</body>
</html>