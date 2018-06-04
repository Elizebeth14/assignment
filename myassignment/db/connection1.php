<?php
$con=mysql_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  mysql_select_db("red_db");
?>