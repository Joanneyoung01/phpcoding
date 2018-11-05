



<?php include('header.php'); 
session_start();?>

<div id='maincontent'>

Welcome to Student hands

<!-- students-->
<div class="students"> 
<a href="members.php"></a> 
</div>

<!-- employers-->
<div class="members"> 
<a href="newjobs.php"></a> 
</div>
</div>

<div id='sidebar'>
<?php

if ($_SESSION['username'])

echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	die("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a>");
	
?>





















