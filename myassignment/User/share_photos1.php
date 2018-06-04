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

<script type='text/javascript'>
		function myfunction()
		{
		alert('Are you sure?');
		window.location = "share_photos.php";	
		}
		</script>
<?php
if(isset($_POST['share']))
{

	$photo_id=$_POST['photo_id'];
	$owner_id=$_POST['owner_id'];
	foreach($_POST['friends_id'] as $friends_id) 
	{
		
		
$result3=mysqli_query($con,"SELECT * FROM shared_photos WHERE photo_id='$photo_id' AND owner_id='$owner_id' AND friends_id='$friends_id' ");
$count3=mysqli_num_rows($result3);
//echo $count3;	
$row3=mysqli_fetch_array($result3);
	if($count3>0)
	{
  $result4=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$friends_id'");
  $row4=mysqli_fetch_array($result4);
  $friend_name = $row4['fname'];
  $status="error"; 
  header("location:share_photos.php?status=$status&&friend_name=$friend_name");			
	}
	else
	{
	$query ="INSERT INTO shared_photos (owner_id,friends_id,photo_id,photo_link) VALUES ('$_POST[owner_id]','$friends_id','$_POST[photo_id]','$_POST[photo_link]')";
   mysqli_query($con,$query); 
	
   $status="success"; 
   header("location:share_photos.php?status=$status");
	}
	}
	
}
	
	

$result=mysqli_query($con,"SELECT * FROM photos WHERE id='$_POST[id]'");
$row=mysqli_fetch_array($result);
?>
<center>
<img src="<?php echo $row['photo_link']; ?>" width="300" height="250" style="margin-top:7px;">
</center>
<?php
$result1=mysqli_query($con,"SELECT * FROM friend_requests WHERE (request_to='$id' AND status='accepted' AND block_status='unblocked') OR (request_from='$id' AND status='accepted' AND block_status='unblocked')");
$count1=mysqli_num_rows($result1);
//echo $count1;
if($count1>=1)
{
	?>
    <form method="post">
        <input type="hidden" name="owner_id" value="<?php echo $id; ?>">
        <input type="hidden" name="photo_id" value="<?php echo $_POST['id']; ?>">
        <input type="hidden" name="photo_link" value="<?php echo $row['photo_link']; ?>">
    <?php
while($row1=mysqli_fetch_array($result1))
{
?>
        

  <?php 
  $user_id=$row1['request_to']; 
  if($user_id==$id)
  {
	$user_id=$row1['request_from']; 
  }
  ?>
  
   <input type="checkbox" name="friends_id[]" value="<?php echo $user_id; ?>" multiple >
  <?php
  $result2=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$user_id'");
  $row2=mysqli_fetch_array($result2);
  echo $row2['fname'];	
  ?>

    
<?php
}
?>
<input type="submit" value="Confirm" name="share" id="button" />
<input type="button" value="Cancel" name="cancel" id="button" onClick="myfunction();" />
</form> 
    
<?php
}
else
{
?>
<table id="select_table" border="0" align="center">
<tr>
<td colspan="3" style="color:#F00; font-size:20px;">No Friends to List</td>
</tr>
</table>
<?php } ?>


</body>
</html>