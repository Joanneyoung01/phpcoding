<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>
<?php include('header.php'); ?>
</head>


<body>
<div id='maincontent'>

<?php

session_start();

$username = trim(strip_tags($_POST['username']));
$password = trim(strip_tags($_POST['password']));
$id = trim(strip_tags($_POST['id']));

if ($username&&$password&&id)
{

	$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
	mysql_select_db("b200548738_phplogin") or die ("couldn't find db");
	

	$query = mysql_query("SELECT * FROM employers WHERE username='$username'");
	
	$numrows = mysql_num_rows($query);
	
		if($numrows > 0)
		{
		while ($row = mysql_fetch_assoc($query))
		  	{
		  	 $dbusername = $row['username'];
		   	 $dbpassword = $row['password'];
		   	 $dbid = $row['id'];
			}
		  if ($username==$dbusername&&$password==$dbpassword)
		   	{
		   	
		   	 if ($username==$dbusername&&$password==$dbpassword&&$dbid==$id)
		   	{
		   	
		  		echo "You're logged in! <a href='index.php'>here</a>";
		  		$_SESSION['username']=$username;
		  		$_SESSION['id']=$id;
		  		}
		  	
		  		else 
		  		echo "Please enter the correct employer id";
		  	}
		  	
		  else 
		  	echo "Incorrect password";
		}
		
		else
			die ("That username doesn't exist");
}

else

	die ("please enter a username and password and employer id");
	
	

?>
</div>
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