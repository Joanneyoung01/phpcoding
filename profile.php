<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>
<?php include('header.php'); ?>


<?php

mysql_connect('localhost', 'b200548738','cs10jy');
mysql_select_db('b200548738_phplogin');

session_start();
?>



<div id='sidebar'>

<?php
session_start();
if ($_SESSION['username'])

echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	die("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a></div>
	<div id='maincontent'>you must be logged in</div>");
	
?>
</div>
</head>

<body>
<div id='maincontent'>
<?php

$username = $_SESSION['username'];
$fullname = $_SESSION['fullname'];
$studentid = $_SESSION['studentid'];
$year = $_SESSION['year'];
$hours = $_SESSION['hours'];
$residence = $_SESSION['residence'];
$username = $_SESSION['username'];
$name = $_SESSION['name'];
$company = $_SESSION['company'];
$number = $_SESSION['number'];
$email = $_SESSION['email'];

	
	 
     $query = "SELECT username, fullname, studentid, year, hours, residence FROM users WHERE username ='$username'";
	$result = mysql_query($query);
	 
	 if (!$result) die ("Datebase access failed: " . mysql_error());
		
		
	 $rows = mysql_num_rows($result);
		
		while($row = mysql_fetch_array($result)) {
		echo "<p>Username: " . $row['username'] . '<br />'.
		 "Full name: " . $row['fullname'] . '<br />'.
		 "Student ID: " . $row['studentid'] . '<br />'.
		 "Year of Study: " . $row['year'] . '<br />'.
		 "Available Hours per week: " . $row['hours'] . '<br />'.
		 "Area of Residency: " . $row['residence'] ."</p>";
	}
	
	 $query = "SELECT username, name, number, company, number, email FROM employers WHERE username ='$username'";
	$result = mysql_query($query);
	 
	 if (!$result) die ("Datebase access failed: " . mysql_error());
		
		
	 $rows = mysql_num_rows($result);
		
		while($row = mysql_fetch_array($result)) {
		echo "<p>Username: " . $row['username'] . '<br />'.
		 "Name: " . $row['name'] . '<br />'.
		 "Company: " . $row['company'] . '<br />'.
		 "Number: " . $row['number'] . '<br />'.
		 "email: " . $row['email'] ."</p>";
	}

	

?>
</div>
</body>
