<?php
session_start();
require_once 'connection.php';

$username = $_POST['username'];
$message = $_POST['message'];
$recipient = $_POST['recipient'];
date_default_timezone_set("Asia/Kolkata");
$now = date("Y:m:d H:i:s");
//echo $now;
$sql = "INSERT INTO user_chat_messages
	(username,
	message_content,
	message_time,recipient)
	VALUES
	(:a,:b,:c,:d)";
$qry = $con->prepare($sql);
$qry->execute(array(':a'=>$username,':b'=>$message,':c'=>$now,':d'=>$recipient));
?>