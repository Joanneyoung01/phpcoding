<?php include('header.php'); ?>
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
		  		echo "you're in! <a href='member.php'>click here to enter members area</a>";
		  		$_SESSION['username']=$username;
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