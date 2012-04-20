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
$weight = $_GET['weight'];
$weight = mysql_real_escape_string($weight);
	//build query
$query = "SELECT fname, lname, seed FROM wrestlers WHERE weight = '$weight'";
	//Execute query
$qry_result = mysql_query($query) or die(mysql_error());

	//Build Result String
$display_string = "<select name=125_1>";

	// Insert a new row in the table for each person returned
while($row = mysql_fetch_array($qry_result)){
	$display_string .= "<option>";
	$display_string .= "$row[fname]";
	$display_string .= " ";
	$display_string .= "$row[lname]";
	$display_string .= " (";
	if( $row[seed] == 0)
	{
		$display_string .= "NS";
		$display_string .= ")";
	}
	else
	{
		$display_string .= "$row[seed]";
		$display_string .= ")";
	}
	$display_string .= "</option>";
	
}
echo "Query: " . $query . "<br />";
$display_string .= "</select><br>";
echo $display_string;
?>
