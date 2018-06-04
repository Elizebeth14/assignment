<?php
session_start();
require_once 'connection1.php';

$msg_from = $_POST['username'];
$msg_to = $_POST['recipient'];
$message = $_POST['message'];


//echo $now;
$sql = "INSERT INTO chat
	(msg_from,
	msg_to,
	msg)
	VALUES
	(:a,:b,:c)";
$qry = $con->prepare($sql);
$qry->execute(array(':a'=>$msg_from,':b'=>$msg_to,':c'=>$message));
?>