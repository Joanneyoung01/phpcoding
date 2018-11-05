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
$name = strip_tags($_POST['name']);
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
$email = strip_tags($_POST['email']);
$number = strip_tags($_POST['number']);
$company = strip_tags($_POST['company']);


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
	if ($name&&$username&&$password&&$repeatpassword)
	{
		
		if($password==$repeatpassword)
		{
		
			//CHECK CHAR LENGTH OF USERNAME/FULLNAME
			if (strlen($number)>11||strlen($number)<11)
			{
			echo "Number is not long enough";
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
					
					$query = "INSERT INTO employers (name, company, number, email, username, password, repeatpassword) VALUES ('$name','$company', '$number','$email','$username', '$password','$repeatpassword')"; mysql_query($query) or die("Insert failed. " . mysql_error() . "<br />" . $query);
					
					die ("You have been registered, log in, click <A href='loginbox.php'>here</a> to sign in<br>
					We will be in contact with you within the next 1-3 working days<br>
					Once you have recieved your employer id, you will be able to sign in<br>");
					
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
<form action='employerregister.php' method='POST' action='employerregister.php'>
		<table>
			<tr>
				<td>
				Name:
				
				</td>
				<td>
				<input type='text' name='name' value='<?php echo $name; ?>'>
				
				</td>
			</tr>
			<tr>
				<td>
				Company:
				
				</td>
				<td>
				<input type='text' name='company' value='<?php echo $company; ?>'>
				
				</td>
			</tr>
			 <tr>
				<td>
				Username:
				
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
				<input type='repeatpassword' name='repeatpassword'>
				
				</td>
			</tr>
			
			<tr>
			
			<tr>
				<td>
				Contact Number:
				
				</td>
				<td>
				<input type='number' name='number'>
				
				</td>
			</tr>
			<tr>
				<td>
				Email:
				
				</td>
				<td>
				<input type='email' name='email'>
				
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





