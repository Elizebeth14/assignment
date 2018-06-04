<?php
error_reporting(0); 
session_start();
$id=$_SESSION['id'];
if($_SESSION['id']=="")
{
	?>
<title>Photo sharing web service</title>    
<div id="header">
    <br />
      <center>
         <span id="head_white">
           Friends Zone!!
         </span>
 </center>    
  </div>
  
  <?php
  
}
else
{
include("../db/connection.php");
$result=mysqli_query($con,"SELECT fname,photo FROM user_reg WHERE id='$id'");
$row=mysqli_fetch_array($result);
?>
<title>Photo sharing web service</title>
<div id="header">
    <br />
      <center>
         <span id="head_white">
           Friends Zone!!
         </span>
          
 </center> 
 <span style="margin-left:1200px;">
           <img src="<?php echo $row['photo']; ?>" width="50" height="50"><span style="color:#0000A0; margin-left:20px; font-family:'Comic Sans MS', cursive;"><?php echo $row['fname']; ?></span>
         </span>   
  </div>
  <?php
}
?>