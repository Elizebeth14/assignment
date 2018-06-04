<?php 
error_reporting(0);
if(isset($_POST['login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	include("../db/connection.php");
	$match1="SELECT * FROM user_reg WHERE email_id='$username' and password='$password'";
	$qry1 = mysqli_query($con,$match1);
	$num_rows1 = mysqli_num_rows($qry1);
	if($num_rows1>0)
	{
		 session_start();
		 while($row=mysqli_fetch_assoc($qry1))
			{
				$_SESSION['id']=$row['id'];
				$_SESSION['fname']= $row['fname'];
				$_SESSION['email_id']= $row['email_id'];
				$_SESSION['phone_no']= $row['phone_no'];
				header("location:user_index.php");
			}
     }
	 else
     {
		$error="invalid";
		header("location:user_login.php?status=$error");
	 }
}

	?>
    