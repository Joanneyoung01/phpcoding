<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>

<?php include('header.php'); ?>

</head>

<body>
<div id='maincontent'>
<strong>Student Login</strong>
<html>
	<form action='login.php' method='POST'>
	  Username: <input type='text' name='username'><br>
	  Password: <input type='password' name='password'><br>
	  <input type='submit' value='log in'>
	</form>
</html>
	<h4><a href='register.php'>Student sign up</a></h4>
	<hr>
	
<strong>Employer Login</strong>
<html>
	<form action='employerlogin.php' method='POST'>
	  Username: <input type='text' name='username'><br>
	  Password: <input type='password' name='password'><br>
	  Employer id <input type='id' name='id'><br>
	  <input type='submit' value='log in'>
	</form>
</html>
	<h4><a href='employerregister.php'>Employer sign up</a></h4>
	


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

















