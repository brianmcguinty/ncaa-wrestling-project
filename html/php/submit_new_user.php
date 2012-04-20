<?php

$dbhost = "localhost";
$dbuser = "ncaa";
$dbpass = "n0rth0f25";
$dbname = "wrestling";
	//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
mysql_select_db($dbname) or die(mysql_error());
	// Retrieve data from Query String

$username = $_GET['username'];
$username = mysql_real_escape_string($username);
$fname = $_GET['fname'];
$fname = mysql_real_escape_string($fname);
$lname = $_GET['lname'];
$lname = mysql_real_escape_string($lname);
$email = $_GET['email'];
$email = mysql_real_escape_string($email);
$password = $_GET['password'];
$password = mysql_real_escape_string($password);

$query = "SELECT username FROM users WHERE username=\"".$username."\" AND active=1";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$username_test = $row['username'];
if( $username_test == $username )
{
	echo $username ." is already taken.";
}
else
{
 

	$query = "INSERT INTO users( username, fname, lname, email, password, active ) VALUES ( '".$username. "', '".$fname."', '".$lname."', '".$email."', '".$password. "',1 )";
	$success = mysql_query($query) or die(mysql_error());

	$query = "SELECT id FROM users WHERE username=\"".$username."\" AND password=\"".$password."\" AND active=1";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$user_id = $row['id'];

	// Create entry in the points table for the new user
	$query = "INSERT INTO user_points( user_id ) VALUES ( '".$user_id."' )";
	$success = mysql_query($query) or die(mysql_error());

	//echo "User credentials successfully submitted.";
	//echo $query;
	echo $user_id;
}

?>
