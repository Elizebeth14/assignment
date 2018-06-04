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
?>

<table id="select_table" border="0" align="center">
<tr>
	<th>First Name</th>
    <th>Lives At</th>
    <th>Native Place</th>
    <th>Profile Picture</th>
    <th>Message</th>
</tr> 
<?php 
$result=mysqli_query($con,"SELECT * FROM friend_requests WHERE (request_to='$id' AND status='accepted' AND block_status='unblocked') OR (request_from='$id' AND status='accepted' AND block_status='unblocked')");
$count=mysqli_num_rows($result);
if($count>=1)
{
while($row=mysqli_fetch_array($result))
{
$user_id=$row['request_from'];
if($user_id==$id)
{
	$user_id=$row['request_to'];
}
$request_id=$row['id'];
$result1=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$user_id'");
$row1=mysqli_fetch_array($result1);	
//echo "login_id".$id;
//echo "user_id".$user_id;
$result2=mysqli_query($con,"SELECT * FROM user_details WHERE user_id='$user_id'");
$count2=mysqli_num_rows($result2);
$row2=mysqli_fetch_array($result2);	
//echo $count2;
?>
	
<tr>
    <td><?php echo $row1['fname']; ?></td>
    <td><?php echo $row2['lives_at']; ?></td>
    <td><?php echo $row2['native_place']; ?></td>
    <td><img src="<?php echo $row1['photo']; ?>" width="100" height="100"></td>
    <td>
        <form method="post" action="home.php">
        <input type="hidden" name="msg_from" value="<?php echo $id; ?>">
        <input type="hidden" name="msg_fromname" value="<?php echo $fname; ?>">
        <input type="hidden" name="msg_to" value="<?php echo $user_id; ?>">
        <input type="hidden" name="msg_toname" value="<?php echo $row1['fname']; ?>">
        <input type="submit" value="Message" name="chat" id="button" />
		</form>     
    </td>
</tr>
<?php
}
}
else
{
?>
<td colspan="5" style="color:#F00; height:30px; font-size:20px;">No Friends to List</td>
<?php } ?>
</table>
</body>
</html>