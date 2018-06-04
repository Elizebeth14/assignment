<style>
p{
border-top: 1px solid #EEEEEE;
margin-top: 0px; margin-bottom: 5px; padding-top: 5px;
}
</style>
<?php
session_start();
require_once 'connection1.php';
$msg_from = $_SESSION['id'];
$msg_to = $_COOKIE['msg_to'];
$sql = "SELECT * FROM chat WHERE (msg_from='$msg_from' AND msg_to='$msg_to') OR (msg_from='$msg_to' AND msg_to='$msg_from') ORDER BY date_time";
$qry = $con->prepare($sql);
$qry->execute();
$fetch = $qry->fetchAll();
foreach ($fetch as $row):
require_once '../db/connection.php';
$msg_fromid=$row['msg_from'];
$msg_toid=$row['msg_to'];
$result1=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$msg_fromid'");
$row1=mysqli_fetch_array($result1);	
$msg_fromname=$row1['fname'];
$result2=mysqli_query($con,"SELECT * FROM user_reg WHERE id='$msg_toid'");
$row2=mysqli_fetch_array($result2);
$msg_toname=$row2['fname'];	

	$time = date("Y-m-d",strtotime($row['date_time']));
	$now = date("Y-m-d");
	if (($row['msg_from'] == $msg_from) && ($time == $now)) {
		$user = '<strong style="color:green;">'.$msg_fromname.'</strong>'; 
	}else{
		$user = '<strong style="color:blue;">'.$msg_fromname.'</strong>'; 			
	}	
	if ($time == $now) {
		$hourAndMinutes = date("h:i A", strtotime($row['date_time']));
	}else{
		$hourAndMinutes = date("Y-m-d", strtotime($row['date_time']));
	}
	echo '<p>'.$user.':<em>('.$hourAndMinutes.')</em>'.'<br/>'.$row['msg']. '</p>';

endforeach; 

?>