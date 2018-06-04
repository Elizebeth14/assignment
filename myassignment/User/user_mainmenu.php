<?php
$id=$_SESSION['id'];
$fname=$_SESSION['fname'];
$email_id=$_SESSION['email_id'];
$phone_no=$_SESSION['phone_no'];
?>

<center>
<div id="menu_wrapper">
     <div id="menu">
         <a href="user_index.php">Home</a>|
         <a href="my_profile.php">My Profile</a>|
         <a href="send_request.php">Suggestions</a>|
         <a href="view_request.php">Follow Requests</a>|
         <a href="block_friends.php">Unfollow Friends</a>|
         <a href="photos.php">Add Photos</a>|
         <a href="share_photos.php">Share Photos</a>|
         <a href="shared_photos.php">Shared Photos</a>|
         <a href="friends_list.php">Followers</a>|
         <a href="user_login.php?status=logout">Log Out</a>     
    </div>
</div>
</center>