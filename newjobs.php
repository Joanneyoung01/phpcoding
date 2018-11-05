<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>
<?php include('header.php'); ?>
<?php
$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
					mysql_select_db("b200548738_phplogin") or die ("couldn't find db");

error_reporting (E_ALL ^ E_NOTICE);
mysql_connect('localhost', 'b200548738','cs10jy');
mysql_select_db('b200548738_phplogin');

$username = $_SESSION['username'];

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



<body>
<div id='maincontent'>

<?php

	


function clean_string($string){
	// Remove whitespace
		$string = trim($string);
		$string = utf8_decode($string);
	// Test whether a connection is open, or the it returns an error
		if (mysql_real_escape_string($string)) 
		{
			//Remove characters potentially harmful to the database
			$string = mysql_real_escape_string($string);
		}

		// Strip dangerous escape characters (stripslahes is in the get_magic_quotes library)
		if (get_magic_quotes_gpc()) {
			$string = stripslashes($string);
		}
		// Return the processed data, with HTML tags transform into harmless escape characters
			return htmlentities($string);
}

// form data
$submit = strip_tags($_POST['submit']);
$title = strip_tags($_POST['title']);
$position = strip_tags($_POST['position']);
$pay = strip_tags($_POST['pay']);
$hours = strip_tags($_POST['hours']);
$location = strip_tags($_POST['location']);
$description = strip_tags($_POST['description']);
$requirements = strip_tags($_POST['requirements']);
$keywords = strip_tags($_POST['keywords']);
$contact = strip_tags($_POST['contact']);
$id = strip_tags($_POST['id']);
$dbusername = $_SESSION['username'];
$dbid = $_SESSION['id'];



if ($submit)
{
	//CHECK FOR EXISTANCE
	if ($title&&$position&&$pay&&$hours&&$location&&$description&&$keywords&&$contact&&id)
	{
	
		
		$query = "SELECT id FROM employers WHERE username ='$username'";
		$result = mysql_query($query);
		if (!$result) die ("Datebase access failed: " . mysql_error());
		
		
				if ($dbid==$id)
		   		{
		
					//register user
					//open database
					$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
					mysql_select_db("b200548738_studenthands") or die ("couldn't find db");
					
					$query = "INSERT INTO jobs (title, position, pay, hours, keywords, location, requirements, description, contact) VALUES ('$title', '$position','$pay','$hours','$keywords','$location','$requirements','$description','$contact')"; mysql_query($query) or die("Insert failed. " . mysql_error() . "<br />" . $query);
					
					die ("Your job has been listed, thank you! <A href='member.php'>here</a>");
				
			}
			else
				echo"please enter correct employer id";
				
		
	}
	else
		echo "Please enter <b>all</b> fields";

}



?>
	

<html>
<strong>Submit Vacancy</strong><br>
<br>
<form action='newjobs.php' method='POST' action='newjobs.php'>
		<table>
			<tr>
				<td>
				Employer id:
				
				</td>
				<td>
				<input type='id' name='id'>
				
				</td>
			</tr>
			<tr>
				<td>
				Title of Vacancy:
				
				</td>
				<td>
				<input type='text' name='title' value='<?php echo $title; ?>'>
				
				</td>
			</tr>
			<tr>
				<td>
				Position (Part time, full time, temp):
				
				</td>
				<td>
				<select name="position">
 				<option value="parttime">Part Time</option>
 				<option value="fulltime">Full Time</option>
 				<option value="Oneoff">One off project</option>
 				<option value="Seasonal">Seasonal</option>
				</select>
				
				</td>
			</tr>
			<tr>
				<td>
				Pay rate:
				
				</td>
				<td>
				<input type='pay' name='pay'>
				
				</td>
			</tr>
			<tr>
				<td>
				hours (10):
				
				</td>
				<td>
				<select name="hours">
 				<option value="0-10">0-10 hours</option>
 				<option value="11-30">11-30 hours</option>
 				<option value="30+">30+</option>
				</select>
				
				</td>
			</tr>
			
			<tr>
			<tr>
				<td>
				Location:
				
				</td>
				<td>
				<select name="location">
 				<option value="Headingly">Headingly</option>
 				<option value="Hyde Park">Hyde Park</option>
 				<option value="Burley">Burley</option>
 				<option value="Horsfoth">Horsforth</option>
 				<option value="Kirkstall">Kirkstall</option>
 				<option value="Meanwood">Meanwood</option>
 				<option value="Rawdon">Rawdon</option>
 				<option value="Roundhay">Roundhay</option>
 				<option value="City Centre">City Centre</option>
 				<option value="Woodhouse">Woodhouse</option>
 				<option value="Yeadon">Yeadon</option>
 				<option value="University of Leeds Campus">University Campus</option>
 				<option value="Leeds Metropoliton Campus">Leeds Metropoliton Campus</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>
				Requirements?:
				
				</td>
				<td>
				<input type='requirements' name='requirements'>
				
				</td>
			</tr>
			<tr>
				<td>
				Further Description:
				
				</td>
				<td>
				<input type='description' name='description'>
				
				</td>
			</tr>
			<tr>
				<td>
				Contact Details:
				
				</td>
				<td>
				<input type='contact' name='contact'>
				
				</td>
			</tr>
			<tr>
				<td>
				Key words:
				
				</td>
				<td>
				<input type='keywords' name='keywords'>
				
				</td>
			</tr>
			
			
			
			
			
			
			
			
			
			
		</table>
	
		<p>
		<input type='submit' name='submit' value='Submit Vacancy'>


<hr><br>
<strong>Advertising Vacancies to Students</strong><br>
We offer a service for employers advertising their jobs to students.<br>
Our Leeds office is based within Leeds Univeristy Union, we will ensure you get the maximum response possible to your advert.<br>
<br>

<b>We can help you...</b><br>
Find staff quickly<br>
For one off events and special projects<br>
Where it would be too expensive to take on a permanent member of staff<br>
When you need a permanent member of staff but haven't the resources to recruit and select.<br>

<b>Uploading Your own Vacancy</b><br>
Employers will need to create a student hands account, you can do this by registering from the 'log in' link in the side bar.<br>
Ensure you sign up as an employer - then email cs10jy@leeds.ac.uk informing us you have signed up<br>
We will be in contact with you within 1-2 working days<br>
After being required to pay a small joining fee (£5 all proceeds go towards Leeds university union)<br>
and passing our security check, you will recieve an employer id<br>
<b>Please contact Student Hands on tel: 0113 5627192 for any further assistance</b><br>
</div>
<br>


</html>


</body>
