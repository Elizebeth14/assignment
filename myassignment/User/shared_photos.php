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
$result=mysqli_query($con,"SELECT * FROM shared_photos WHERE friends_id='$id'");
$count=mysqli_num_rows($result);
echo '<table id="select_table"  border="1" align="center" style="margin-top:7px;"><tbody><tr>';
if ($count > 0) {
$count = 0;
while($row=mysqli_fetch_array($result))
{
	if ($count && $count % 6 == 0) echo '</tr><tr>';
        echo '<td align="left" valign="middle" class="td">' ?><img src="<?php echo $row['photo_link']; ?>" width="150" height="150"><br>

		<?php '</td>';
        $count++;
    }
}

echo '</tr></tbody></table>';
?>







<br>
</body>
</html>