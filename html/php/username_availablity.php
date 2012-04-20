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

$query = "SELECT username FROM users WHERE username=\"".$username."\"" AND active=1;
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$username = $row['username'];


//echo $query;
//echo "Success";
echo $username;

?>
