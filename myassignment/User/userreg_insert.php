<?php 
if(isset($_POST['register']))
{
include("../db/connection.php");
$email_id=$_POST['email_id'];
	$query1="SELECT * FROM user_reg WHERE email_id='$email_id'";
	$sql=mysqli_query($con,$query1);
 if(mysqli_num_rows($sql)>=1)
   {
    $status="user exists";
    header("Location:user_registration.php?status=$status");
   }
 else
    {



$uploadDir = 'profile/';
$fileName = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
$fileSize = $_FILES['photo']['size'];
$fileType = $_FILES['photo']['type'];	
date_default_timezone_set("Asia/Calcutta");  
$filePath = $uploadDir .date('d-m-Y H-i-s'). "-".$fileName;  
$result = move_uploaded_file($tmpName, $filePath);
$query ="INSERT INTO user_reg(fname,mname,lname,phone_no,email_id,password,dob,photo)VALUES('$_POST[fname]','$_POST[mname]','$_POST[lname]','$_POST[phone_no]','$_POST[email_id]','$_POST[password]','$_POST[dob]','$filePath')";
if (!mysqli_query($con,$query))
  {
  $status="Insertion not successfull";
  header("location:user_registration.php?status=$status");
  }
else
  {  
  $status="Insertion successfull";
  
  header("location:user_registration.php?status=$status");
  }
	}
}
?>
