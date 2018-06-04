<?php
include("../header.php");
include("user_mainmenu.php");
error_reporting(0);	
$status=$_REQUEST['status'];
if($status=="success")
{
?>
<script type="text/javascript">
alert("Unfollowed Successfully");
</script>
<?php		
}
if($status=="unblock")
{
?>
<script type="text/javascript">
alert("Following");
</script>
<?php		
}
?>
<html>
<head>
<link rel="stylesheet" href="../header.css">
<title>Welcome <?php echo $fname;  ?></title>
</head>
<body>
<?php
include("../db/connection.php");
if(isset($_POST['block']))
{
$query ="UPDATE friend_requests SET block_status='blocked',blocked_by='$id' WHERE id='$_POST[request_id]'";
if (!mysqli_query($con,$query))
  {
  $status="error";
  header("location:block_friends.php?status=$status");
  }
else
  { 
   $status="success"; 
  header("location:block_friends.php?status=$status");
}
}


if(isset($_POST['unblock']))
{
$result3=mysqli_query($con,"SELECT * FROM friend_requests WHERE id='$_POST[request_id]'");
$row3=mysqli_fetch_array($result3);	
$blocked_by=$row3['blocked_by'];
if($blocked_by!=$id)
{
?>
<script type="text/javascript">
alert("You can't unblock");
</script>
<?php
}
else
{
$query ="UPDATE friend_requests SET block_status='unblocked',blocked_by='0' WHERE id='$_POST[request_id]'";
if (!mysqli_query($con,$query))
  {
  $status="error";
  header("location:block_friends.php?status=$status");
  }
else
  { 
   $status="unblock"; 
  header("location:block_friends.php?status=$status");
}
}
}
?>

<table id="select_table" border="0" align="center">
<tr>
	<th>First Name</th>
    <th>Lives At</th>
    <th>Native Place</th>
    <th>Profile Pic</th>
    <th>Block</th>
</tr> 
<?php 
$result=mysqli_query($con,"SELECT * FROM friend_requests WHERE (request_to='$id' AND status='accepted' AND block_status='unblocked') OR (request_from='$id' AND status='accepted' AND block_status='unblocked') OR (request_to='$id' AND status='accepted' AND block_status='blocked') OR (request_from='$id' AND status='accepted' AND block_status='blocked')");
$count=mysqli_num_rows($result);
if($count>=1)
{
while($row=mysqli_fetch_array($result))
{
$block_status=$row['block_status'];
$user_id=$row['request_from'];
if($user_id=="$id")
{
$user_id=$row['request_to'];		
}
//echo $user_id;
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
    <?php
	if($block_status=="unblocked")
	{
		?>
        <form method="post">
        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
        <input type="submit" value="Unfollow" name="block" id="button" />
		</form> 
     <?php 
	 }
	 else
	 {
	 ?>
       <form method="post">
        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
        <input type="submit" value="Follow" name="unblock" id="button" />
		</form> 
       <?php } ?>  
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