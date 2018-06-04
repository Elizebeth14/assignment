<?php 
if(isset($_POST['add']))
{
include("../db/connection.php");
$query ="INSERT INTO user_details(user_id,lives_at,studied_at,working_at,marital_status,native_place)VALUES('$_POST[user_id]','$_POST[lives_at]','$_POST[studied_at]','$_POST[working_at]','$_POST[marital_status]','$_POST[native_place]')";
if (!mysqli_query($con,$query))
  {
  $status="Insertion not successfull";
  header("location:add_details.php?status=$status");
  }
else
  {  
  $status="Insertion successfull";
  
  header("location:my_profile.php?status=$status");
  }
}
?>
