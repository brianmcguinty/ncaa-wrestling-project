<?php

// Database crednetials
$dbhost = "localhost";
$dbuser = "ncaa";
$dbpass = "n0rth0f25";
$dbname = "wrestling";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());

// Read & Parse the incoming URL
//
// URL Example
//
// User ID number
$wcuid = $_GET['wcuid'];
$wcuid = mysql_real_escape_string($wcuid);

// Winner from the URL
$winner_from_url = $_GET['winner'];
$winner_from_url = mysql_real_escape_string($winner_from_url);

// Wrestler ID from URL
$wrestler_id_from_url = $_GET['wrestler_id'];
$wrestler_id_from_url = mysql_real_escape_string($wrestler_id_from_url);

// Logically negated winner from URL - so this is the loser string !Name's string
$loser = $_GET['loser'];
$loser = mysql_real_escape_string($loser);

// Current bout number from URL
$current_bout_number_from_url = $_GET['bout_number'];
$current_bout_number_from_url = mysql_real_escape_string($current_bout_number_from_url);

// Weight class
$weight = $_GET['weight'];
$weight = mysql_real_escape_string($weight);

// Winner of the current bout goes to this bout number
$winner_bout_number_from_url = $_GET['winner_bout_number'];
$winner_bout_number_from_url = mysql_real_escape_string($winner_bout_number_from_url);

// Loser of the current bout goes to this bout number
$loser_bout_number_from_url = $_GET['loser_bout_number'];
$loser_bout_number_from_url = mysql_real_escape_string($loser_bout_number_from_url);

// Set the name of the table we will be working with
$bracket_table_name = "bouts_".$weight."_".$wcuid;

$display_string = "";

if( $winner_from_url != "" )
{
	// Update the winner and loser in the row for the current bout
	$losing_wrestler_id = updateTheCurrentBoutRowWithResults( $bracket_table_name, $current_bout_number_from_url, $wrestler_id_from_url );

	// Figure out if winner is red or green for next bout
	$anklet_color_next_bout = determineIfWrestlerIsRedOrGreenNextBout($winner_from_url, $current_bout_number_from_url, $wrestler_id_from_url);

	// Update the upcoming bout row in database for that wrester
	putWrestlerIdInRowOfUpcomingBout($bracket_table_name, $wrestler_id_from_url, $winner_bout_number_from_url, $anklet_color_next_bout);

	// Figure out if the loser is red or green for next bout
	$anklet_color_next_bout = determineIfWrestlerIsRedOrGreenNextBout("", $current_bout_number_from_url, $losing_wrestler_id);

	// Update the upcoming bout row in database for the losing wrester
	putWrestlerIdInRowOfUpcomingBout($bracket_table_name, $losing_wrestler_id, $loser_bout_number_from_url, $anklet_color_next_bout);

	// Set up the resturn respond that has Name, weight, current bout, winner bout, loser bout
	$display_string .= setUpWinnerHTMLForDivTag($bracket_table_name, $winner_from_url, $wrestler_id_from_url, $weight, $winner_bout_number_from_url);

	// Get name of loser
	// Set up the resturn respond that has Name, weight, current bout, winner bout, loser bout
}
else
{
	// /ncaa/php/advance_wrester.php?loser=!Patterson&wrestler_id=7&bout_number=1&weight=125&winner_bout_number=14&loser_bout_number=33&wcuid=2 
	$losing_wrestler_info = getLosingWrestlersName($bracket_table_name, $current_bout_number_from_url);

	$display_string = setUpLoserHTMLForDivTag($bracket_table_name, $losing_wrestler_info, $loser_bout_number_from_url, $weight);
}

echo $display_string;

function updateTheCurrentBoutRowWithResults( $bracket_table_name, $current_bout_number_from_url, $wrestler_id_from_url )
{
	// Get the red and green wrestlers id numbers
	// select red,green from bouts_125_2 where id=1;
	$query = "SELECT red, green FROM ".$bracket_table_name." WHERE id=".$current_bout_number_from_url;
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$red_wrestler_id = $row['red'];
	$green_wrestler_id = $row['green'];

	if( ($green_wrestler_id == 0) || ($red_wrestler_id == 0) )
	{
		//echo "<script language='javascript'>alert('Please Pick Bouts In Order.');</script>";
		echo "<script language='javascript'>alert('You Need to Have an Oppenent Selected');</script>";
		die();
	}

	// Update the current bout row with winner and loser
	if( $wrestler_id_from_url == $red_wrestler_id )
	{
		$query = "UPDATE ".$bracket_table_name." SET winner=".$red_wrestler_id.", loser=".$green_wrestler_id." WHERE id=".$current_bout_number_from_url;
		$result = mysql_query($query) or die(mysql_error());
		return $green_wrestler_id;
	}
	else
	{
		$query = "UPDATE ".$bracket_table_name." SET winner=".$green_wrestler_id.", loser=".$red_wrestler_id." WHERE id=".$current_bout_number_from_url;
		$result = mysql_query($query) or die(mysql_error());
		return $red_wrestler_id;
	}
}

// Figure out if winner is red or green for next bout
function determineIfWrestlerIsRedOrGreenNextBout( $winner_from_url, $current_bout_number_from_url, $wrestler_id_from_url )
{
	switch($current_bout_number_from_url)
	{
		case 1:
			return "red";
		case 5:
			return "green";
		case 19:
			return "green";
		case 21:
			return "green";
		case 23:
			return "green";
		case 25:
			return "green";
		case 27:
			return "green";
		case 29:
			return "green";
		case 31:
			return "green";
		case 33:
			return "red";
		case 32:
			return "eot";
		case 35:
			return "red";
		case 37:
			return "red";
		case 39:
			return "red";
		case 41:
			return "red";
		case 51:
			return "red";
		case 53:
			return "red";
		case 59:
			return "red";
		default:
			$mod_result = $current_bout_number_from_url % 2;
			if( ($mod_result == 0) && ($winner_from_url != "") )
				return "red";
			if( ($mod_result == 1) && ($winner_from_url != "") )
				return "green";
			if($mod_result == 0)
				return "green";
			if($mod_result == 1)
				return "red";
	}
}

function putWrestlerIdInRowOfUpcomingBout( $bracket_table_name, $wrestler_id, $bout_number_from_url, $anklet_color_next_bout )
{
	if( $anklet_color_next_bout != "eot" )
	{
		$query = "UPDATE ".$bracket_table_name." SET ".$anklet_color_next_bout."=".$wrestler_id." WHERE id=".$bout_number_from_url;
		$result = mysql_query($query) or die(mysql_error());
	}
}

function setUpWinnerHTMLForDivTag( $bracket_table_name, $winner_from_url, $wrestler_id_from_url, $weight, $winner_bout_number_from_url )
{
	$query = "SELECT w_bout_number, l_bout_number FROM ".$bracket_table_name." WHERE id=".$winner_bout_number_from_url;
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$next_bout_winner_bout_number = $row['w_bout_number'];
	$next_bout_loser_bout_number = $row['l_bout_number'];
	
	$return_string = "";

	if( $wrestler_id_from_url < 13 )
	{
		$return_string = "<a href=\"#winner-bout-".$bout_number."\" onclick='advanceWrestler(\"".$winner_from_url."\", ".$wrestler_id_from_url.", ".$weight.", ".$winner_bout_number_from_url.", ".$next_bout_winner_bout_number.", ".$next_bout_loser_bout_number.")'>&nbsp;(".$wrestler_id_from_url.")".$winner_from_url."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
	}
	else
	{
		$return_string = "<a href=\"#winner-bout-".$bout_number."\" onclick='advanceWrestler(\"".$winner_from_url."\", ".$wrestler_id_from_url.", ".$weight.", ".$winner_bout_number_from_url.", ".$next_bout_winner_bout_number.", ".$next_bout_loser_bout_number.")'>&nbsp;".$winner_from_url."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
	}
	return $return_string;
}

function getLosingWrestlersName( $bracket_table_name, $current_bout_number_from_url )
{
	// select wrestlers.id, wrestlers.lname, bouts_125_2.l_bout_number from wrestlers, bouts_125_2 where ((bouts_125_2.id=1) AND (wrestlers.id=bouts_125_2.loser));
	$query = "SELECT wrestlers.id, wrestlers.lname, ".$bracket_table_name.".l_bout_number, wrestlers.seed FROM wrestlers, ".$bracket_table_name." WHERE ((".$bracket_table_name.".id=".$current_bout_number_from_url.") AND (wrestlers.id=".$bracket_table_name.".loser))";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$wrestler_id = $row['id'];
	$loser_name = $row['lname'];
	$seed = $row['seed'];
	$loser_bout_number_local_scope = $row['l_bout_number'];
 
	return $wrestler_id.":".$loser_name.":".$seed;

}

function setUpLoserHTMLForDivTag( $bracket_table_name, $losing_wrestler_info, $loser_bout_number_from_url, $weight )
{
	$wrestler_info = explode(":", $losing_wrestler_info);

	// select red, green, w_bout_number, l_bout_number from bouts_125_2 where id=33;
	$query = "SELECT red, green, w_bout_number, l_bout_number FROM ".$bracket_table_name." WHERE id=".$loser_bout_number_from_url;
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$loser_id = $wrestler_info[0];
	$loser_name = $wrestler_info[1];
	$seed = $wrestler_info[2];
	$winner_bout_number = $row['w_bout_number'];
	$loser_bout_nmber = $row['l_bout_number'];

	if( $seed != 0 )
	{
		$return_string = "<a href=\"#loser-bout-".$bout_number."\" onclick='advanceWrestler(\"".$loser_name."\", ".$loser_id.", ".$weight.", ".$loser_bout_number_from_url.", ".$winner_bout_number.", ".$loser_bout_nmber.")'>&nbsp;(".$seed.")".$loser_name."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
	}
	else
	{
		$return_string = "<a href=\"#loser-bout-".$bout_number."\" onclick='advanceWrestler(\"".$loser_name."\", ".$loser_id.", ".$weight.", ".$loser_bout_number_from_url.", ".$winner_bout_number.", ".$loser_bout_nmber.")'>&nbsp;".$loser_name."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
	}

	return $return_string;
}

?>
