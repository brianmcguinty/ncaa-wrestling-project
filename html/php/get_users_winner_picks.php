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

	// Query to get the individual winner picks for the user
	$query = "select users.username, wrestlers.fname, wrestlers.lname, schools.name, wrestlers.weight, wrestlers.seed from users, wrestlers, pick_winners, schools where schools.id=wrestlers.school AND pick_winners.user_id=".$wcuid." AND pick_winners.user_id=users.id AND (wrestlers.id=pick_winners.winner_125 OR wrestlers.id=pick_winners.winner_133 OR wrestlers.id=pick_winners.winner_141 OR wrestlers.id=pick_winners.winner_149 OR wrestlers.id=pick_winners.winner_157 OR wrestlers.id=pick_winners.winner_165 OR wrestlers.id=pick_winners.winner_174 OR wrestlers.id=pick_winners.winner_184 OR wrestlers.id=pick_winners.winner_197 OR wrestlers.id=pick_winners.winner_285)";
	//Execute query
	$qry_result = mysql_query($query) or die(mysql_error());
	
		//Build Result String
	$display_string = "";

	$counter = 0;
	
	$display_string .= "<table border=\"0\">";

	$display_string .= "<tr id=\"selections-username-title-bar\">";

	$display_string .= "<td>";
	$display_string .= $wcusername;
	$display_string .= "</td>";

	$display_string .= "<td colspan=\"10\">";
	$display_string .= "Pick Individual Winners";
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
	$display_string .= "</tr>";

	$display_string .= "</table>";

	$display_string .= " ";

echo $display_string;

?>
