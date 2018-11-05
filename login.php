<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
       <head>
<?php include('header.php'); 
session_start();?>
</head>

<body>
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
	("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a></div>
	<div id='maincontent'>you must be logged in</div>");
	
?>
</div>




<div id='maincontent'>
<?php

session_start();

$username = trim(strip_tags($_POST['username']));
$password = trim(strip_tags($_POST['password']));

if ($username&&$password)
{

	$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
	mysql_select_db("b200548738_phplogin") or die ("couldn't find db");
	

	$query = mysql_query("SELECT * FROM users WHERE username='$username'");
	
	$numrows = mysql_num_rows($query);
	
		if($numrows > 0)
		{
		while ($row = mysql_fetch_assoc($query))
		  	{
		  	 $dbusername = $row['username'];
		   	 $dbpassword = $row['password'];
			}
		  if ($username==$dbusername&&$password==$dbpassword)
		   	{
		   		if ($username==$dbusername&&$password==$dbpassword)
		   		{
		   	
		  			echo "You're logged in! <a href='index.php'>click here to enter members area</a>";
		  			$_SESSION['username']=$username;
					}
		  	
		  		else 
		  	echo "Incorrect password";
		  	}
		  	
		  else 
		  	echo "Incorrect password";
		}
		
		else
			die ("That username doesn't exist");
}

else

	die ("please enter a username and password");
	
	

?>
</div>

<div id='sidebar'>
<?php
session_start();

if ($_SESSION['username'])

echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	"<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a>";
	
?>

</div>

</body>
</html>


