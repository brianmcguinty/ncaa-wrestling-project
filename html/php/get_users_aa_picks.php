<?php
	$dbhost = "localhost";
	$dbuser = "ncaa";
	$dbpass = "n0rth0f25";
	$dbname = "wrestling";
	//Connect to MySQL Server
	mysql_connect($dbhost, $dbuser, $dbpass);
	//Select Database
	mysql_select_db($dbname) or die(mysql_error());
	//build query

	$wcuid = $_GET['wcuid'];
	$wcuid = mysql_real_escape_string($wcuid);
	$wcusername = $_GET['wcun'];
	$wcusername = mysql_real_escape_string($wcusername);

	
		//Build Result String
	$display_string = "";

	$counter = 0;
	
	$display_string .= "<table border=\"0\">";

	$display_string .= "<tr id=\"selections-username-title-bar\">";

	$display_string .= "<td>";
	$display_string .= $wcusername;
	$display_string .= "</td>";

	$display_string .= "<td colspan=\"10\">";
	$display_string .= "Pick All Americans";
	$display_string .= "</td>";

	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners-weights\">";
	$display_string .= "<td>";
	$display_string .= "&#160;";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "125";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "133";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "141";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "149";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "157";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "165";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "174";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "184";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "197";
	$display_string .= "</td>";
	$display_string .= "<td>";
	$display_string .= "285";
	$display_string .= "</td>";
	$display_string .= "</tr>";
	
	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "1", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "2", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "3", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "4", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "5", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "6", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "7", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "<tr id=\"selections-pick-winners\">";
	$display_string .= "<td>";
	$display_string .= "</td>";
	$display_string .= buildRowOfAAPlacers( "null", "8", $wcuid );
	$display_string .= "</tr>";

	$display_string .= "</table>";

	$display_string .= " ";

echo $display_string;

function buildRowOfAAPlacers( $weight, $placement, $user_id )
{
	
	// Query to get the individual winner picks for the user
	$query = "select wrestlers.fname, wrestlers.lname, wrestlers.seed, schools.name from wrestlers, pick_all_americans, schools where (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_125_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_133_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_141_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_149_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_157_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_165_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_174_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_184_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_197_".$placement."=wrestlers.id and wrestlers.school=schools.id) OR (pick_all_americans.user_id=".$user_id." and pick_all_americans.aa_285_".$placement."=wrestlers.id and wrestlers.school=schools.id)";
	//Execute query
	$qry_result = mysql_query($query) or die(mysql_error());



	// Insert a new row in the table for each person returned
	while($row = mysql_fetch_array($qry_result))
	{
		$display_string .= "<td>";
		$display_string .= "$row[fname]";
		$display_string .= "&#160;";
		$display_string .= "$row[lname]";
		$display_string .= "(";
		$display_string .= "$row[seed]";
		$display_string .= ")";
		$display_string .= "<br />";
		$display_string .= "$row[name]";
		$display_string .= "</td>";
		++$counter;
	}
	return $display_string;
}

?>
