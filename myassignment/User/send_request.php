<?php
include("../header.php");
include("user_mainmenu.php");
error_reporting(0);	
$status=$_REQUEST['status'];
if($status=="success")
{
?>
<script type="text/javascript">
alert("Requested");
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
if(isset($_POST['request']))
{
$query ="INSERT INTO friend_requests(request_from,request_to)VALUES('$_POST[request_from]','$_POST[request_to]')";
if (!mysqli_query($con,$query))
  {
  $status="error";
  header("location:send_request.php?status=$status");
  }
else
  { 
   $status="success"; 
  header("location:send_request.php?status=$status");
}
}
?>

<table id="select_table" border="0" align="center">
<tr>
	<th>First Name</th>
    <th>Lives At</th>
    <th>Native Place</th>
    <th>Profile Pic</th>
    <th>Status</th>
    <th>View Profile</th>
</tr> 
<?php 
$result=mysqli_query($con,"SELECT * FROM user_reg WHERE id!='$id'");
$count=mysqli_num_rows($result);
if($count>=1)
{
while($row=mysqli_fetch_array($result))
{
$user_id=$row['id'];
$result1=mysqli_query($con,"SELECT * FROM user_details WHERE user_id='$user_id'");
$row1=mysqli_fetch_array($result1);	
//echo "login_id".$id;
//echo "user_id".$user_id;
$result2=mysqli_query($con,"SELECT * FROM friend_requests WHERE (request_from='$id' AND request_to='$user_id') OR (request_from='$user_id' AND request_to='$id') ");
$count2=mysqli_num_rows($result2);
$row2=mysqli_fetch_array($result2);	
//echo $count2;
?>
	
<tr>
    <td><?php echo $row['fname']; ?></td>
    <td><?php echo $row1['lives_at']; ?></td>
    <td><?php echo $row1['native_place']; ?></td>
    <td><img src="<?php echo $row['photo']; ?>" width="100" height="100"></td>
    <td>
	<?php if($count2>0) 
	{ 
    $status=$row2['status'];
	if($status=="requested")
	{
	?>
    <input type="button" value="Already Requested" name="all_requested" id="button" />
    <?php
	}
	elseif($status=="accepted")
	{
		$block_status=$row2['block_status'];
		if($block_status=="blocked")
		{
		?>
		<input type="button" value="Blocked" name="blocked" id="button" />	
    	<?php
		}
		else
		{
	?>
    <input type="button" value="Following" name="friends" id="button" />
    <?php	
	}
	}
	else
	{
	?>
    <input type="button" value="Not Accepted" name="cancelled" id="button" />
    <?php	
	}
	} 
	else
	{	
	$result3=mysqli_query($con,"SELECT * FROM friend_requests WHERE request_to='$id' AND request_from='$user_id'");
	$count3=mysqli_num_rows($result3);
	$row3=mysqli_fetch_array($result3);		
		//echo $count3;
	if($count3>0) 
	{ 
    $status=$row3['status'];
	if($status=="requested")
	{
	?>
    <input type="button" value="Already Requested" name="all_requested" id="button" />
    <?php
	}
	else
	{
	?>
    <input type="button" value="Friends" name="friends" id="button" />
    <?php
		
	}
	} 	
	else
	{
?>
        <form method="post">
        <input type="hidden" name="request_from" value="<?php echo $id; ?>">
        <input type="hidden" name="request_to" value="<?php echo $user_id; ?>">
        <input type="submit" value="Follow" name="request" id="button" />
		</form>
        <?php
	}
	}
	?>
    <td>
    <?php 
	if($block_status=="unblocked")
	{
	?>
    <a href="view_profile.php?user_id=<?php echo $user_id; ?>">view</a>
    <?php
	}
	elseif($block_status=="")
	{
	?>
	<a href="view_profile.php?user_id=<?php echo $user_id; ?>">view</a>
    <?php
	}
	else
	{
	?>
	<a href="#">blocked</a>	
    <?php
	}
	?>
    </td>
</tr>


<?php
}
}
else
{
?>
<td colspan="6" style="color:#F00; height:30px; font-size:20px;">No Friends to Add</td>
<?php } ?>
</table>
</body>
</html>