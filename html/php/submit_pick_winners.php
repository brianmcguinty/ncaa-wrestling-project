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

$winner125 = $_GET['winner_125'];
$winner133 = $_GET['winner_133'];
$winner141 = $_GET['winner_141'];
$winner149 = $_GET['winner_149'];
$winner157 = $_GET['winner_157'];
$winner165 = $_GET['winner_165'];
$winner174 = $_GET['winner_174'];
$winner184 = $_GET['winner_184'];
$winner197 = $_GET['winner_197'];
$winner285 = $_GET['winner_285'];
$wcuid = $_GET['wcuid'];
$winner125 = mysql_real_escape_string($winner125);
$winner133 = mysql_real_escape_string($winner133);
$winner141 = mysql_real_escape_string($winner141);
$winner149 = mysql_real_escape_string($winner149);
$winner157 = mysql_real_escape_string($winner157);
$winner165 = mysql_real_escape_string($winner165);
$winner174 = mysql_real_escape_string($winner174);
$winner184 = mysql_real_escape_string($winner184);
$winner197 = mysql_real_escape_string($winner197);
$winner285 = mysql_real_escape_string($winner285);
$wcuid = mysql_real_escape_string($wcuid);

$w125_array = explode(" ", $winner125);
$query = "SELECT id FROM wrestlers WHERE weight=".$w125_array[0]." AND fname=\"".$w125_array[1]."\" AND lname=\"".$w125_array[2]."\"";
$w125_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w125_result);
$w125_id_number = $row['id'];

$w133_array = explode(" ", $winner133);
$query = "SELECT id FROM wrestlers WHERE weight=".$w133_array[0]." AND fname=\"".$w133_array[1]."\" AND lname=\"".$w133_array[2]."\"";
$w133_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w133_result);
$w133_id_number = $row['id'];

$w141_array = explode(" ", $winner141);
$query = "SELECT id FROM wrestlers WHERE weight=".$w141_array[0]." AND fname=\"".$w141_array[1]."\" AND lname=\"".$w141_array[2]."\"";
$w141_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w141_result);
$w141_id_number = $row['id'];

$w149_array = explode(" ", $winner149);
$query = "SELECT id FROM wrestlers WHERE weight=".$w149_array[0]." AND fname=\"".$w149_array[1]."\" AND lname=\"".$w149_array[2]."\"";
$w149_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w149_result);
$w149_id_number = $row['id'];

$w157_array = explode(" ", $winner157);
$query = "SELECT id FROM wrestlers WHERE weight=".$w157_array[0]." AND fname=\"".$w157_array[1]."\" AND lname=\"".$w157_array[2]."\"";
$w157_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w157_result);
$w157_id_number = $row['id'];

$w165_array = explode(" ", $winner165);
$query = "SELECT id FROM wrestlers WHERE weight=".$w165_array[0]." AND fname=\"".$w165_array[1]."\" AND lname=\"".$w165_array[2]."\"";
$w165_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w165_result);
$w165_id_number = $row['id'];

$w174_array = explode(" ", $winner174);
$query = "SELECT id FROM wrestlers WHERE weight=".$w174_array[0]." AND fname=\"".$w174_array[1]."\" AND lname=\"".$w174_array[2]."\"";
$w174_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w174_result);
$w174_id_number = $row['id'];

$w184_array = explode(" ", $winner184);
$query = "SELECT id FROM wrestlers WHERE weight=".$w184_array[0]." AND fname=\"".$w184_array[1]."\" AND lname=\"".$w184_array[2]."\"";
$w184_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w184_result);
$w184_id_number = $row['id'];

$w197_array = explode(" ", $winner197);
$query = "SELECT id FROM wrestlers WHERE weight=".$w197_array[0]." AND fname=\"".$w197_array[1]."\" AND lname=\"".$w197_array[2]."\"";
$w197_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w197_result);
$w197_id_number = $row['id'];

$w285_array = explode(" ", $winner285);
$query = "SELECT id FROM wrestlers WHERE weight=".$w285_array[0]." AND fname=\"".$w285_array[1]."\" AND lname=\"".$w285_array[2]."\"";
$w285_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($w285_result);
$w285_id_number = $row['id'];

// We need to fix it so the user can not submit more than once on the same user id
$query = "SELECT user_id FROM pick_winners WHERE user_id=".$wcuid;
$valid_user_id_result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($valid_user_id_result);
$valid_user_id = $row['user_id'];

$display_string = "";

// If the user already has a skew in the db for this contest remove it
if( $valid_user_id == $wcuid )
{
	// Delete their current picks
	$query = "DELETE FROM pick_winners WHERE user_id=".$wcuid;
	$success = mysql_query($query) or die(mysql_error());
	$display_string = "Your old selections have been updated.";
	$display_string .= "<br/>";
	$display_string .= "<br/>";
}

$query = "INSERT INTO pick_winners( user_id, winner_125, winner_133, winner_141, winner_149, winner_157, winner_165, winner_174, winner_184, winner_197, winner_285) VALUES ( ".$wcuid.", ".$w125_id_number.", ".$w133_id_number.", ".$w141_id_number.", ".$w149_id_number.", ".$w157_id_number.", ".$w165_id_number.", ".$w174_id_number.", ".$w184_id_number.", ".$w197_id_number.", ".$w285_id_number." )";
$success = mysql_query($query) or die(mysql_error());

$query = "UPDATE pick_winners set points_125=8, points_133=8, points_141=8, points_149=8, points_157=8, points_165=8, points_174=8, points_184=8, points_197=8, points_285=8 WHERE user_id=".user_id;
$success = mysql_query($query) or die(mysql_error());

$query = "UPDATE user_points set pick_winners=(SELECT (select points_125 from pick_winners where user_id=".$wcuid.") + (select points_133 from pick_winners where user_id=".$wcuid.") + (select points_141 from pick_winners where user_id=".$wcuid.") + (select points_149 from pick_winners where user_id=".$wcuid.") + (select points_157 from pick_winners where user_id=".$wcuid.") + (select points_165 from pick_winners where user_id=".$wcuid.") + (select points_174 from pick_winners where user_id=".$wcuid.") + (select points_184 from pick_winners where user_id=".$wcuid.") + (select points_197 from pick_winners where user_id=".$wcuid.") + (select points_285 from pick_winners where user_id=".$wcuid.") ) where user_id =".$wcuid;
$success = mysql_query($query) or die(mysql_error());

$query = "UPDATE user_points set total_points = pick_winners + pick_aa + pick_aa_place + pick_bouts WHERE user_id=".$wcuid;
$success = mysql_query($query) or die(mysql_error());


$display_string .= $winner125;
$display_string .= "<br/>";
$display_string .= $winner133;
$display_string .= "<br/>";
$display_string .= $winner141;
$display_string .= "<br/>";
$display_string .= $winner149;
$display_string .= "<br/>";
$display_string .= $winner157;
$display_string .= "<br/>";
$display_string .= $winner165;
$display_string .= "<br/>";
$display_string .= $winner174;
$display_string .= "<br/>";
$display_string .= $winner184;
$display_string .= "<br/>";
$display_string .= $winner197;
$display_string .= "<br/>";
$display_string .= $winner285;
$display_string .= "<br/>";

$display_string .= "<br/>";
$display_string .= "YOUR PICKS HAVE BEEN SUBMITTED.";

//$display_string .= "<br/>";
//$display_string .= $wcuid;
//$display_string .= " ";
//$display_string .= $w125_array[2];
//$display_string .= " ";
//$display_string .= $row['id'];
//$display_string .= "<br/>";

echo "$display_string";

?>
