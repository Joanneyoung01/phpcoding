<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">
    
<html>
<head>
<?php include('header.php'); ?>

<div id='sidebar'>
<?php


session_start();

if ($_SESSION['username'])

echo "Welcome, ".$_SESSION['username']."!  <br>
	<a href='index.php'>Home</a> | <a href='profile.php'>Profile</a> | <a href='logout.php'>Logout</a>";
else
	echo ("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a>");
	
?>
</div>
</head>


<body>
<div id='maincontent'>

<?php
echo "<h1>Register</h1>";



$submit = strip_tags($_POST['submit']);
$fullname = strip_tags($_POST['fullname']);
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
$date = date("Y-m-d");
$studentid = strip_tags($_POST['studentid']);
$year = strip_tags($_POST['year']);
$hours = strip_tags($_POST['hours']);
$residence = strip_tags($_POST['residence']);
$university = strip_tags($_POST['university']);

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


if ($submit)
{
	//CHECK FOR EXISTANCE
	if ($fullname&&$username&&$password&&$repeatpassword)
	{
		
		if($password==$repeatpassword)
		{
		
			//CHECK CHAR LENGTH OF USERNAME/FULLNAME
			if (strlen($student)>9||strlen($fullname)<9)
			{
			echo "Student ID must be 9 digits";
			}
			else
			{
				//CHECK PASSWORD LENGTH
				if (strlen($password)>25||strlen($password)<6)
				{
				 echo "password must be be between 6 and 25 characters";
				}
				else
				{
					//register user
					//open database
					$connect = mysql_connect("localhost","b200548738","cs10jy") or die ("Couldn't connect!");
					mysql_select_db("b200548738_phplogin") or die ("couldn't find db");
					
					$query = "INSERT INTO users (fullname, username, password, date, studentid, hours, residence, year, university) VALUES ('$fullname','$username', '$password','$date','$studentid','$hours','$residence','$year','$university')"; mysql_query($query) or die("Insert failed. " . mysql_error() . "<br />" . $query);
					
					die ("You have been registered, log in <A href='loginbox.php'>here</a>");
					
				}
			}
				
		}
		else
			echo "Your passwords do not match";
		
	}
	else
		echo "Please enter <b>all</b> fields";

}



?>




<html>
<br>
<form action='register.php' method='POST' action='register.php'>
		<table>
			<tr>
				<td>
				Your full name:
				
				</td>
				<td>
				<input type='text' name='fullname' value='<?php echo $fullname; ?>'>
				
				</td>
			</tr>
			<tr>
				<td>
				Choose a username:
				
				</td>
				<td>
				<input type='text' name='username' value='<?php echo $username; ?>'>
				
				</td>
			</tr>
			<tr>
				<td>
				Choose a password:
				
				</td>
				<td>
				<input type='password' name='password'>
				
				</td>
			</tr>
			<tr>
				<td>
				Repeat password:
				
				</td>
				<td>
				<input type='password' name='repeatpassword'>
				
				</td>
			</tr>
			
			<tr>
			<tr>
				<td>
				Institute of Study:
				
				</td>
				<td>
				<select name="university">
 				<option value="University of Leeds">University of Leeds</option>
 				<option value="Leeds Metropolitan University">Leeds Metropolitan University</option>
 				<option value="Leeds Trinity">Leeds Trinity</option>
 				<option value="Leeds City College">Leeds City College</option>
 				<option value="Leeds College of Art">Leeds College of Art</option>
 				<option value="Leeds College of Music">Leeds College of Music</option>
 				<option value="Notre Dame Sixth Form College">Notre Dame Sixth Form College</option>
				</select>
				
				</td>
			</tr>
			<tr>
				<td>
				Valid 9 digit student ID:
				
				</td>
				<td>
				<input type='studentid' name='studentid'>
				
				</td>
			</tr>
			
			<tr>
				<td>
				Year of Study:
				
				</td>
				<td>
				<select name="year">
 				<option value="Year 1">1st Year</option>
 				<option value="Year 2">2nd Year</option>
 				<option value="Year 3">3rd Year</option>
 				<option value="Year 4">4th Year</option>
 				<option value="Year 5">5th Year</option>
 				<option value="Postgraduate">Postgraduate</option>
				</select>
			
				
				</td>
			</tr>
			<tr>
				<td>
				Availability per week:
				
				</td>
				<td>
				<select name="hours">
 				<option value="1-10">1-10 hours</option>
 				<option value="11-30">11-30 hours</option>
 				<option value="31+">30+</option>
				</select>
				
				</td>
			</tr>
			<tr>
				<td>
				Area of Residence:
				
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
			
			
			
			
			
			
			
			
			
		</table>
	<?php echo $recaptcha_form; ?>
        <?php
        	require_once($_SERVER['DOCUMENT_ROOT'] . '/recaptcha/recaptchalib.php');
    		$publickey = "6Ldbd8ASAAAAAL96lIWHSDRmoaVJhgQJuKQwXNbd";
			echo recaptcha_get_html($publickey);
		?>
		<p>
		<input type='submit' name='submit' value='register'>
</html>


<?php //recaptcha_process.php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/recaptcha/recaptchalib.php');
		$privatekey = "6Ldbd8ASAAAAAFz8VT29H5w4WLNjsbI-mFY2QkaC";
  		$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
		$message = "";
   			if (!$resp->is_valid) {
    	// What happens when the CAPTCHA was entered incorrectly
		$message = "The reCAPTCHA wasn't entered correctly. Go back and try it again. 
    	(reCAPTCHA said: " . $resp->error . ")";
   } 	else {
    	// ADD YOUR CODE HERE to handle a successful ReCAPTCHA submission
    	// e.g. Validate the data
		$unsafe_name = $_POST['fullname'];
		
		
		//comment coding
		
		
	
		
   }
echo $message;
?>

</div>
</body>
</html>




