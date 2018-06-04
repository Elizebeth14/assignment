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
if(isset($_POST['add']))
{
$uploadDir = 'gallery/';
$fileName = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];
$fileType = $_FILES['photo']['type'];	
date_default_timezone_set("Asia/Calcutta");  
$filePath = $uploadDir .date('d-m-Y H-i-s'). "-".$fileName;
if($fileName!="")
{  
$result = move_uploaded_file($tmpName, $filePath);
$query1 ="INSERT INTO photos(user_id,photo_link)VALUES('$id','$filePath')";
mysqli_query($con,$query1);
}
else
{
?>
<script type="text/javascript">
alert("Please choose an image");
</script>
<?php	
}
}
$result=mysqli_query($con,"SELECT * FROM photos WHERE user_id='$id'");
$count=mysqli_num_rows($result);
echo '<table id="select_table"  border="1" align="center" style="margin-top:7px;"><tbody><tr>';
if ($count > 0) {
    $count = 0;
while($row=mysqli_fetch_array($result))
{
	if ($count && $count % 4 == 0) echo '</tr><tr>';
        echo '<td align="left" valign="middle" class="td">' ?><img src="<?php echo $row['photo_link']; ?>" width="150" height="150"><?php '</td>';
        $count++;
    }
}
echo '</tr></tbody></table>';
?>

<table id="select_table" border="0" align="center">
<tr>
<form method="post" name="user_regform" id="user_regform" enctype="multipart/form-data">
<td><input type="file" name="photo"/>
<input type="submit" value="Add Photos" name="add" id="button" /></td>
</form>
</tr>
</table>






<br>
</body>
</html>