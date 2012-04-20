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
$password = $_GET['password'];
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$query = "SELECT id FROM users WHERE username=\"".$username."\" AND password=\"".$password."\" AND active=1";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$user_id = $row['id'];


//echo $query;
//echo "Success";
echo $user_id;

?>
