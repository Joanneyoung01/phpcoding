<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>
<?php include('header.php'); ?>
<div id='maincontent'>
<?php

session_start();

session_destroy();

echo "You've been logged out. <a href='index.php'>Click here</a> to return.";
?>

</div>
<body>
<div id='sidebar'>
<?php

if ($_SESSION['username'])

echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	die("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a>");
	
?>
</body>
</html>