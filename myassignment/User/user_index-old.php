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
    <td><img src="<?php echo $row['photo']; ?>" width="150" height="150"></td>
</tr>


</table>

</body>
</html>