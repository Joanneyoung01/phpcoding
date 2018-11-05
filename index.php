<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">

       <head>

<?php include('header.php'); 
session_start();
$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
					mysql_select_db("b200548738_phplogin") or die ("couldn't find db");
					

?>

</head>

<body>
<div id='maincontent'>
<center>
<strong>Welcome to Student Hands</strong><br>
<br>
Student hands is an free service to all students<Br>
All employers have met our code of standards.<br>
We aim to bridge the gap between students and employers in advertising local student friendly jobs<br>


</center>
</div>
<!-- students-->
<div class="students"> 
<a href="member.php"></a> 
</div>

<!-- employers-->
<div class="employers"> 
<a href="newjobs.php"></a> 
</div>


<div id='sidebar'>
<?php

if ($_SESSION['username'])


echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	die("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a>");
	
?>
</div>
</body>
</html>




















