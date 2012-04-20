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
	$query = "select users.username, user_points.total_points from users, user_points where users.id=user_points.user_id ORDER by total_points DESC";
	//Execute query
	$qry_result = mysql_query($query) or die(mysql_error());
	
		//Build Result String
	$display_string = "";

	// Number of leaders to show
	$leaders_to_display = 5;
	$counter = 0;
	// Insert a new row in the table for each person returned
	while($row = mysql_fetch_array($qry_result)){
		if( $counter == $leaders_to_display ) break;
		if ($counter % 2)
		{
			$display_string .= "<div id=\"home-content-leaderboard-individuals-odd\">";
		}
		else
		{
			$display_string .= "<div id=\"home-content-leaderboard-individuals-even\">";
		}

		$display_string .= "<leaders class=\"align_left\">";
		$display_string .= "$row[username]";
		$display_string .= "</leaders>";
		$display_string .= "<leaders class=\"align_right\">";
		$display_string .= "$row[total_points]";
		$display_string .= "</leaders>";
		$display_string .= "<div style=\"clear: both;\"></div>";

		$display_string .= "</div>";
		++$counter;
	
	}
	$display_string .= " ";

echo $display_string;

?>
