<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

       "http://www.w3.org/TR/html4/strict.dtd">

<?php
error_reporting (E_ALL ^ E_NOTICE);
mysql_connect('localhost', 'b200548738','cs10jy');
mysql_select_db('b200548738_phplogin');

$username = $_SESSION['username'];
session_start();


?>
    
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
	die("<a href='index.php'>Home</a> | <a href='loginbox.php'>Login</a></div>
	<div id='maincontent'>you must be logged in</div>");
	
?>
</div>

</head>
<body>



</div>




<?php

mysql_connect('localhost', 'b200548738','cs10jy');
mysql_select_db('b200548738_studenthands');

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


	



				$db_hostname = 'localhost';					
				$db_database = 'b200548738_studenthands';
				$db_username = 'b200548738';
				$db_password = 'cs10jy';
				$db_status = 'not initialised';
				$str_result = '';
				$str_options = 'Option list creation failed';
				$db_server = mysql_connect($db_hostname, $db_username, $db_password);
				$db_status = "connected";
				
				//Test connection
				if (!$db_server){
					die("Unable to connect to MySQL: " . mysql_error());
				$db_status = "not connected";
				}else{
					
						// If connected, get MP names from database and write out DropDownMenu
						mysql_select_db($db_studenthands);
						$query = "SELECT DISTINCT location FROM jobs ORDER BY location";
						$result = mysql_query($query);
						if (!$result) die("Database access failed: " . mysql_error());
						
						
						// Get the numer of rows returned
						$rows = mysql_num_rows($result);
						if ($rows > 0) $str_options = '';

						// Cycle through list of MPs, writing <OPTION tags>
						for($j=0; $j<$rows; ++$j)
							{
							$str_options = $str_options . "<option value=" . 
							mysql_result($result, $j, 'location') . ">";
							$str_options = $str_options . mysql_result($result, $j, 'location');
							$str_options = $str_options . "</option>";
							}
						}
						
				
				if (!$db_server){
					die("Unable to connect to MySQL: " . mysql_error());
				$db_status = "not connected";
				}else{
						
				// If connected, get MP names from database and write out DropDownMenu
						mysql_select_db($db_studenthands);
						$query2 = "SELECT DISTINCT hours FROM jobs ORDER BY hours";
						$result = mysql_query($query2);
						if (!$result) die("Database access failed: " . mysql_error());
						
						
						// Get the numer of rows returned
						$rows = mysql_num_rows($result);
						if ($rows > 0) $str_options2 = '';

						// Cycle through list of MPs, writing <OPTION tags>
						for($j=0; $j<$rows; ++$j)
							{
							$str_options2 = $str_options2 . "<option value=" . 
							mysql_result($result, $j, 'hours') . ">";
							$str_options2 = $str_options2 . mysql_result($result, $j, 'hours'); 
							$str_options2 = $str_options2 . "</option>";
							}
						}	
						
				if (!$db_server){
					
					die("Unable to connect to MySQL: " . mysql_error());
				$db_status = "not connected";
				}else{
						
				// If connected, get MP names from database and write out DropDownMenu
						mysql_select_db($db_studenthands);
						$query2 = "SELECT DISTINCT hours FROM jobs ORDER BY hours";
						$result = mysql_query($query2);
						if (!$result) die("Database access failed: " . mysql_error());
						
						
						// Get the numer of rows returned
						$rows = mysql_num_rows($result);
						if ($rows > 0) $str_options2 = '';

						// Cycle through list of MPs, writing <OPTION tags>
						for($j=0; $j<$rows; ++$j)
							{
							$str_options2 = $str_options2 . "<option value=" . 
							mysql_result($result, $j, 'hours') . ">";
							$str_options2 = $str_options2 . mysql_result($result, $j, 'hours'); 
							$str_options2 = $str_options2 . "</option>";
							}
						}	









?>





<html>
<body>
<div id='maincontent'>
	<div align="right">

	<form id="jobs" action="" method="post">
    		
        			</br>
    				<input type="text" name="keywords" value="Search all jobs" onblur="if(this.value == ''){ this.value = 'Search all jobs'; this.style.color = '#BBB';}" onfocus="if(this.value == 'Search all jobs'){ this.value = ''; this.style.color = '#000';}" style="color:#BBB;" />
     	   			<input type="submit" name="submit" value="search" /><Br>
     	   			
    </form>
    </div>
    <br>
   
    <?php
        echo "Jobs available for " . date("l F jS Y", time()+ 0 * 24 * 60 * 60); ?>:<br>
        <Br>

    
     	
     	
	Search by area....<br>
	<form id="location" action="member.php" method="post">
						<select name="location">
							<?php echo $str_options; ?>
						</select>
							<input type="submit" id="submit2" name="submit2" value="Submit" /> 
	</form><hr>
	<br>
	Search by hours....<br>
	<form id="hours" action="member.php" method="post">
	<select name="hours">
							<?php echo $str_options2; ?>
						</select>
							<input type="submit" id="submit3" name="submit3" value="Submit" /> 
	</form><hr>
	<br>
	
	
	
    
        
        
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
		
		//echo $_POST["location"];
	mysql_select_db($db_studenthands);
	
	if(isset($_POST['submit'])){
	
		$query = "SELECT * FROM jobs WHERE keywords LIKE '%" . $_POST["keywords"] . "%'";
		$result = mysql_query($query);
		
		
		if (!$result) die ("Datebase access failed: " . mysql_error());
		
		
		$rows = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
				echo "<p>Title: " . $row['title'] . '<br />'.
					" Position: " . $row['position'] . '<br />'.
					" Pay: " . $row['pay'] . '<br />'.
					" Hours: " . $row['hours'] . '<br />'.
					" Location: " . $row['location'] . '<br />'.
					" Requirements: " . $row['requirements'] . '<br />'.
					" Description: " . $row['description'] ."<br />";
					" Contact: " . $row['contact'] ."</p>";
		}
	}
	
	if(isset($_POST['submit2'])){
	
		$query = "SELECT title, position, pay, hours, location, requirements, description, contact FROM jobs WHERE location LIKE '%" . $_POST["location"] . "%'";
		$result = mysql_query($query);
		
		
		if (!$result) die ("Datebase access failed: " . mysql_error());
		
		$rows = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
				echo "<p>Title: " . $row['title'] . '<br />'.
					" Position: " . $row['position'] . '<br />'.
					" Pay: " . $row['pay'] . '<br />'.
					" Hours: " . $row['hours'] . '<br />'.
					" Location: " . $row['location'] . '<br />'.
					" Requirements: " . $row['requirements'] . '<br />'.
					" Contact: " . $row['contact'] ."<br />";
					" Description: " . $row['description'] ."<br />";
					
					
					" : " . $row[''] ."</p>";
		}
	}
	
	if(isset($_POST['submit3'])){
	
		$query2 = "SELECT title, position, pay, hours, location, requirements, description, contact FROM jobs WHERE hours LIKE '%" . $_POST["hours"] . "%'";
		$result = mysql_query($query2);
		
		
		if (!$result) die ("Datebase access failed: " . mysql_error());
		
		$rows = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
				echo "<p>Title: " . $row['title'] . '<br />'.
					" Position: " . $row['position'] . '<br />'.
					" Pay: " . $row['pay'] . '<br />'.
					" Hours: " . $row['hours'] . '<br />'.
					" Location: " . $row['location'] . '<br />'.
					" Requirements: " . $row['requirements'] . '<br />'.
					" Contact: " . $row['contact'] ."<br />";
					" Description: " . $row['description'] ."<br />";
					
					" : " . $row[''] ."</p>";
		}
	}
	
	if(isset($_POST['submit4'])){
	
		$query2 = "SELECT title, position, pay, hours, location, requirements, description, contact FROM jobs WHERE position LIKE '%" . $_POST["position"] . "%'";
		$result = mysql_query($query2);
		
		
		if (!$result) die ("Datebase access failed: " . mysql_error());
		
		$rows = mysql_num_rows($result);
		while($row = mysql_fetch_array($result))
		{
				echo "<p>Title: " . $row['title'] . '<br />'.
					" Position: " . $row['position'] . '<br />'.
					" Pay: " . $row['pay'] . '<br />'.
					" Hours: " . $row['hours'] . '<br />'.
					" Location: " . $row['location'] . '<br />'.
					" Requirements: " . $row['requirements'] . '<br />'.
					" Contact: " . $row['contact'] ."<br />";
					" Description: " . $row['description'] ."<br />";
					
					" : " . $row[''] ."</p>";
		}
	}
	





	
?> 
</div>
</body>
</html>




        