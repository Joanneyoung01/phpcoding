<?php include('header.php'); ?>
<div id='maincontent'>
<?php
echo "<h1>Register</h1>";

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
$fullname = strip_tags($_POST['fullname']);
$username = strip_tags($_POST['username']);
$password = strip_tags($_POST['password']);
$repeatpassword = strip_tags($_POST['repeatpassword']);
$date = date("Y-m-d");

if ($submit)
{
	//CHECK FOR EXISTANCE
	if ($fullname&&$username&&$password&&$repeatpassword)
	{
		
		if($password==$repeatpassword)
		{
		
			//CHECK CHAR LENGTH OF USERNAME/FULLNAME
			if (strlen($username)>25||strlen($fullname)>25)
			{
			echo "Max length for Username and Full name is 25 characters";
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
					
					$query = "INSERT INTO users (fullname, username, password, date) VALUES ('$fullname','$username', '$password','$date')"; mysql_query($query) or die("Insert failed. " . mysql_error() . "<br />" . $query);
					
					die ("You have been registered, log in <A href='index.php'>here</a>");
					
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
				Repeat password
				
				</td>
				<td>
				<input type='password' name='repeatpassword'>
				
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

