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

$wcuid = $_GET['wcuid'];
$wcuid = mysql_real_escape_string($wcuid);

$query = "UPDATE users SET active=0 WHERE id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM user_points WHERE user_id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM pick_winners WHERE user_id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM pick_all_americans WHERE user_id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());

$query = "DELETE FROM pick_all_americans_placement WHERE user_id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());

echo "Account Deleted.";
//echo $wcuid;

?>
