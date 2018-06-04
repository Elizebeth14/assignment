<?php
include("../header.php");
include("user_mainmenu.php");
error_reporting(0);	
$status=$_REQUEST['status'];
$status1=$_REQUEST['status1'];
if($status=="success")
{
?>
<script type="text/javascript">
alert("Request Accepted");
</script>
<?php		
}
if($status1=="success")
{
?>
<script type="text/javascript">
alert("Request Canceled");
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
if(isset($_POST['accept']))
{
$query ="UPDATE friend_requests SET status='accepted' WHERE id='$_POST[request_id]'";
if (!mysqli_query($con,$query))
  {
  $status="error";
  header("location:view_request.php?status=$status");
  }
else
  { 
   $status="success"; 
  header("location:view_request.php?status=$status");
}
}

if(isset($_POST['cancel']))
{
$query ="UPDATE friend_requests SET status='cancelled' WHERE id='$_POST[request_id]'";
if (!mysqli_query($con,$query))
  {
  $status="error";
  header("location:view_request.php?status1=$status");
  }
else
  { 
   $status="success"; 
  header("location:view_request.php?status1=$status");
}
}
?>

<table id="select_table" border="0" align="center">
<tr>
	<th>First Name</th>
    <th>Lives At</th>
    <th>Native Place</th>
    <th>Profile Pic</th>
    <th>View Profile</th>
    <th>Accept</th>
    <th>Cancel</th>
</tr> 
<?php 
$result=mysqli_query($con,"SELECT * FROM friend_requests WHERE request_to='$id' AND status='requested'");
$count=mysqli_num_rows($result);
if($count>=1)
{
while($row=mysqli_fetch_array($result))
{
$user_id=$row['request_from'];
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
    <td><a href="view_profile1.php?user_id=<?php echo $user_id; ?>">view</a></td>
    <td>
        <form method="post">
        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
        <input type="submit" value="Confirm" name="accept" id="button" />
		</form>     
    </td>
    <td>
        <form method="post">
        <input type="hidden" name="request_id" value="<?php echo $request_id; ?>">
        <input type="submit" value="Cancel " name="cancel" id="button" />
		</form>
        
    </td>
</tr>
<?php
}
}
else
{
?>
<td colspan="7" style="color:#F00; height:30px; font-size:20px;">No Requests Found</td>
<?php } ?>
</table>
</body>
</html>