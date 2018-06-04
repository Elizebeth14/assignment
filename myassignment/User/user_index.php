<?php
include("../header.php");
include("user_mainmenu.php");
include("index.php");
error_reporting(0);	
?>			
<html>
<head>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" href="../header.css">
<title>Welcome <?php echo $fname;  ?></title>
</head>
<body>


<?php
include("../db/connection.php");
$result=mysqli_query($con,"SELECT * FROM shared_photos WHERE friends_id='$id'");
$count=mysqli_num_rows($result);
?>
<table id="select_table" border="0" align="center">
<tr>
	<th>Photo</th>
    <th>Shared By</th>
	</tr> 
<?php
if ($count > 0) 
{
	
while($row=mysqli_fetch_array($result))
{
	?>
   <tr>
   <td><img src="<?php echo $row['photo_link']; ?>" width="500" height="400"></td>
   <td>
   	<?php $owner_id = $row['owner_id']; 
    $result1=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$owner_id'");
    $row1=mysqli_fetch_array($result1);	
	echo $row1['fname'];
   ?>
   </td>
    </tr>
  <?php
}
}
else
{
?>
<td colspan="2" style="color:#F00; height:30px; font-size:20px;">No Images shared with you</td>
<?php } ?>







</body>
</html>