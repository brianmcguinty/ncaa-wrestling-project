<?php

$dbhost = "localhost";
$dbuser = "ncaa";
$dbpass = "n0rth0f25";
$dbname = "wrestling";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());




$wcuid = $_GET['wcuid'];
$wcuid = mysql_real_escape_string($wcuid);
$weight = $_GET['weight'];
$weight = mysql_real_escape_string($weight);

$query = "SELECT * from bouts_".$weight."_".$wcuid;
$result = mysql_query($query);
if( !$result )
{
	//CREATE TABLE IF NOT EXISTS bouts_125_2 SELECT * from bouts_125;
	$query = "CREATE TABLE IF NOT EXISTS bouts_".$weight."_".$wcuid." SELECT * from bouts_".$weight;
	$result = mysql_query($query) or die(mysql_error());
}


$headerFile = "../templates/header.template.html";
$fh = fopen($headerFile, 'r');
$theHeaderData = fread($fh, filesize($headerFile));
fclose($fh);

$footerFile = "../templates/footer.template.html";
$fh = fopen($footerFile, 'r');
$theFooterData = fread($fh, filesize($footerFile));
fclose($fh);


// Put the header data into the return string
$display_string .= $theHeaderData;

// Start building the Cahmpionship bracket
$display_string .= "<br/>";
$display_string .= "<br/>";
$display_string .= "Championship Bracket";
$display_string .= "<br/>";
$display_string .= "<br/>";


$display_string .= "<table class='bracket-table' border='0'>";

$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";

//Row #1
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 2, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td class='bracket-bout-number-r1'>Pigtail Match</td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #2
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(2);
$display_string .= markUpBoutWinnerDivTag2(2, 18, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getWrestlerOpeningRound( 125, 1, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #3
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 2, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay( 1 );
$display_string .= specialPigTailMarkUp( 1, 14, '', $weight, $wcuid);
$display_string .= "</tr>";


//Row #4
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(18);
$display_string .= markUpBoutWinnerDivTag2(18, 26, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getWrestlerOpeningRound( 125, 1, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #5
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 3, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #6
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(3);
$display_string .= markUpBoutWinnerDivTag2( 3, 18, 'green', $weight, $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #7
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 3, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #8
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(26);
$display_string .= markUpBoutWinnerDivTag2(26, 30, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #9
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 4, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #10
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(4);
$display_string .= markUpBoutWinnerDivTag2( 4, 19, 'red', $weight, $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #11
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 4, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #12
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(19);
$display_string .= markUpBoutWinnerDivTag2(19, 26, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #13
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 5, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #14
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(5);
$display_string .= markUpBoutWinnerDivTag2( 5, 19, 'green', $weight, $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #15
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 5, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #16
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay( 30 );
$display_string .= markUpBoutWinnerDivTag2( 30, 32, 'red', $weight, $wcuid );
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #17
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 6, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #18
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(6);
$display_string .= markUpBoutWinnerDivTag2(6, 20, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #19
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 6, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #20
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(20);
$display_string .= markUpBoutWinnerDivTag2(20, 27, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #21
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 7, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #22
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(7);
$display_string .= markUpBoutWinnerDivTag2(7, 20, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #23
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 7, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #24
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(27);
$display_string .= markUpBoutWinnerDivTag2(27, 30, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #25
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 8, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #26
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(8);
$display_string .= markUpBoutWinnerDivTag2(8, 21, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #27
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 8, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #28
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(21);
$display_string .= markUpBoutWinnerDivTag2(21, 27, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #29
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 9, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #30
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(9);
$display_string .= markUpBoutWinnerDivTag2(9, 21, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #31
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 9, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #32
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(32);
$display_string .= markUpBoutWinnerDivTag2(32, 32, 'winner', $weight, $wcuid);
$display_string .= "</tr>";

//Row #33
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 10, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td class='bracket-placement'>Champion</td>";
$display_string .= "</tr>";

//Row #34
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(10);
$display_string .= markUpBoutWinnerDivTag2(10, 22, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #35
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 10, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #36
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(22);
$display_string .= markUpBoutWinnerDivTag2(22, 28, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #37
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 11, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #38
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(11);
$display_string .= markUpBoutWinnerDivTag2(11, 22, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #39
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 11, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #40
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(28);
$display_string .= markUpBoutWinnerDivTag2(28, 31, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #41
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 12, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #42
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(12);
$display_string .= markUpBoutWinnerDivTag2(12, 23, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #43
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 12, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #44
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(23);
$display_string .= markUpBoutWinnerDivTag2(23, 28, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #45
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 13, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #46
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(13);
$display_string .= markUpBoutWinnerDivTag2(13, 23, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #47
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 13, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #48
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(31);
$display_string .= markUpBoutWinnerDivTag2(31, 32, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Row #49
$display_string .= "<tr>";
//$display_string .= "<td class='bracket-red-wrestler-r1' ><div id='winner-bout-1'>Winner bout 1</div></td>";
$display_string .= getWrestlerOpeningRound( 125, 14, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #50
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(14);
$display_string .= markUpBoutWinnerDivTag2(14, 24, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #51
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 14, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #52
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(24);
$display_string .= markUpBoutWinnerDivTag2(24, 29, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #53
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 15, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #54
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(15);
$display_string .= markUpBoutWinnerDivTag2(15, 24, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #55
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 15, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #56
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(29);
$display_string .= markUpBoutWinnerDivTag2(29, 31, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #57
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 16, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #58
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(16);
$display_string .= markUpBoutWinnerDivTag2(16, 25, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #59
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 16, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #60
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(25);
$display_string .= markUpBoutWinnerDivTag2(25, 29, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #61
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 17, 'red', $wcuid );
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #62
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(17);
$display_string .= markUpBoutWinnerDivTag2(17, 25, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Row #63
$display_string .= "<tr>";
$display_string .= getWrestlerOpeningRound( 125, 17, 'green', $wcuid );
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

// End Championship table
$display_string .= "</table>";




// Start building the Consolation bracket
$display_string .= "<br/>";
$display_string .= "<br/>";
$display_string .= "Consolation Bracket";
$display_string .= "<br/>";
$display_string .= "<br/>";

$display_string .= "<table class='bracket-table-wrestle-backs' border='0'>";

$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";
$display_string .= "<col width=100>";

//Consolations Row #1
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(17, 34, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td class='bracket-bout-number-r1'>Pigtail Match</td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #2
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(34);
$display_string .= markUpBoutWinnerDivTag2(34, 42, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(1, 33, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #3
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(16, 34, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(42);
$display_string .= markUpBoutWinnerDivTag2(42, 50, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(33);
$display_string .= specialPigTailMarkUp( 33, 40, '', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #4
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(20, 42, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= markUpBoutLoserDivTag2(5, 33, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #5
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(15, 35, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(50);
$display_string .= markUpBoutWinnerDivTag2(50, 54, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #6
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(35);
$display_string .= markUpBoutWinnerDivTag2(35, 43, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #7
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(14, 35, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(43);
$display_string .= markUpBoutWinnerDivTag2(43, 50, 'green', $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(54);
$display_string .= markUpBoutWinnerDivTag2(54, 58, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #8
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(21, 43, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #9
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(13, 36, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(28, 54, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #10
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(36);
$display_string .= markUpBoutWinnerDivTag2(36, 44, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #11
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(12, 36, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(44);
$display_string .= markUpBoutWinnerDivTag2(44, 51, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(58);
$display_string .= markUpBoutWinnerDivTag2(58, 60, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #12
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(18, 44, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #13
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(11, 37, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(51);
$display_string .= markUpBoutWinnerDivTag2(51, 55, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #14
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(37);
$display_string .= markUpBoutWinnerDivTag2(37, 45, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= markUpBoutNumberDisplayWrestleBacks(60);
$display_string .= markUpBoutWinnerDivTag2(60, 62, 'red', $weight, $wcuid);
$display_string .= "</tr>";

//Consolations Row #15
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(10, 37, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(45);
$display_string .= markUpBoutWinnerDivTag2(45, 51, 'green', $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(55);
$display_string .= markUpBoutWinnerDivTag2(55, 58, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #16
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(19, 45, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #17
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(29, 55, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= markUpBoutLoserDivTag2(30, 60, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #18
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(9, 38, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #19
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(38);
$display_string .= markUpBoutWinnerDivTag2(38, 46, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #20
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(8, 38, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(46);
$display_string .= markUpBoutWinnerDivTag2(46, 52, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #21
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(24, 46, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #22
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(7, 39, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(52);
$display_string .= markUpBoutWinnerDivTag2(52, 56, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #23
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(39);
$display_string .= markUpBoutWinnerDivTag2(39, 47, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(62);
$display_string .= markUpBoutWinnerDivTag2(62, 62, 'winner', $weight, $wcuid);
$display_string .= "</tr>";

//Consolations Row #24
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(6, 39, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(47);
$display_string .= markUpBoutWinnerDivTag2(47, 52, 'green', $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(56);
$display_string .= markUpBoutWinnerDivTag2(56, 59, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td class='bracket-placement'>3rd Place</td>";
$display_string .= "</tr>";

//Consolations Row #25
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(25, 47, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #26
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(33, 40, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(26, 56, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #27
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(40);
$display_string .= markUpBoutWinnerDivTag2(40, 48, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #28
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(4, 40, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(48);
$display_string .= markUpBoutWinnerDivTag2(48, 53, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(59);
$display_string .= markUpBoutWinnerDivTag2(59, 61, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #29
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(22, 48, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #30
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(3, 41, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(53);
$display_string .= markUpBoutWinnerDivTag2(53, 57, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #31
$display_string .= "<tr>";
$display_string .= markUpBoutNumberDisplay(41);
$display_string .= markUpBoutWinnerDivTag2(41, 49, 'red', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= markUpBoutNumberDisplayWrestleBacks(61);
$display_string .= markUpBoutWinnerDivTag2(61, 62, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "</tr>";

//Consolations Row #32
$display_string .= "<tr>";
$display_string .= markUpBoutLoserDivTag2(2, 41, green, $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(49);
$display_string .= markUpBoutWinnerDivTag2(49, 53, 'green', $weight, $wcuid);
$display_string .= markUpBoutNumberDisplayWrestleBacks(57);
$display_string .= markUpBoutWinnerDivTag2(57, 59, 'green', $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #33
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(23, 49, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #34
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(27, 57, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= markUpBoutLoserDivTag2(31, 61, green, $weight, $wcuid);
$display_string .= getVerticalLineLeft();
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #35
$display_string .= "<tr>";
$display_string .= "<td >&nbsp;</td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #36
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(58, 63, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(60, 64, red, $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #37
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(63);
$display_string .= markUpBoutWinnerDivTag2(63, 63, 'winner', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= markUpBoutNumberDisplay(64);
$display_string .= markUpBoutWinnerDivTag2(64, 64, 'winner', $weight, $wcuid);
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

//Consolations Row #38
$display_string .= "<tr>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(59, 63, green, $weight, $wcuid);
$display_string .= "<td class='bracket-placement'>7th Place</td>";
$display_string .= "<td ></td>";
$display_string .= markUpBoutLoserDivTag2(61, 64, green, $weight, $wcuid);
$display_string .= "<td class='bracket-placement'>5th Place</td>";
$display_string .= "<td ></td>";
$display_string .= "<td ></td>";
$display_string .= "</tr>";

$display_string .= "</table>";


// Put the footer data into the return string
$display_string .= $theFooterData;

//$return_string = "Got Here ...";

echo $display_string;


// Function to get the wrestler and their info from the bouts table
function getWrestlerOpeningRound( $weight, $bout_number, $anklet_color, $wcuid )
{
	//SELECT wrestlers.lname,wrestlers.seed, schools.abrv FROM wrestlers, bouts_125, schools WHERE ((bouts_125.id=1 AND wrestlers.id=bouts_125.green) AND (wrestlers.school=schools.id));

	$query = "SELECT wrestlers.lname, wrestlers.id, wrestlers.seed, bouts_".$weight."_".$wcuid.".w_bout_number, bouts_".$weight."_".$wcuid.".l_bout_number, schools.abrv FROM wrestlers, bouts_".$weight."_".$wcuid.", schools WHERE ((bouts_".$weight."_".$wcuid.".id=".$bout_number." AND wrestlers.id=bouts_".$weight."_".$wcuid.".".$anklet_color.") AND (wrestlers.school=schools.id))";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$wrestler = $row['lname'];
	$wrestler_id = $row['id'];
	$seed = $row['seed'];
	$school = $row['school'];
	$winner_bout_number = $row['w_bout_number'];
	$loser_bout_number = $row['l_bout_number'];

	// If we get a NULL return the winner of the pigtail match goes here
	if( $wrestler == "" )
	{
		if( $anklet_color == "red" )
		{
			$return_string .= "<td class='bracket-red-wrestler-r1' ><div id='winner-bout-1'>Winner bout 1</div></td>";
		}
		else if( $anklet_color == "green" )
		{
			$return_string .= "<td class='bracket-green-wrestler-r1' ><div id='winner-bout-1'>Winner bout 1</div></td>";
		}
		return $return_string;
	}

	//$return_string .= "<td class='bracket-wrestler-r1'>";
	$return_string .= "<td style='border-bottom: 2px solid;'>";
	$return_string .= "<table border='0'>";
	$return_string .= "<tr>";
	if( $seed != 0 )
	{
		if( $anklet_color == "red" )
		{
			$return_string .= "<td style='font-size: 13; text-align: center; background-color:#F87594; border-radius: 3px; width: 15px;'>".$seed."</td>";
			$return_string .= "<td style='font-size: 12; text-align: left; background-color:#F87594; border-radius: 3px; width: 85px;'> <a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>".$wrestler."</a></td>";
		}
		else if( $anklet_color == "green" )
		{
			$return_string .= "<td style='font-size: 13; text-align: center; background-color:#67F867; border-radius: 3px; width: 15px;'>".$seed."</td>";
			$return_string .= "<td style='font-size: 12; text-align: left; background-color:#67F867; border-radius: 3px; width: 85px;'> <a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>".$wrestler."</a></td>";
		}
	}
	else
	{
		if( $anklet_color == "red" )
		{
			$return_string .= "<td style='font-size: 12; text-align: left; background-color:#F87594; border-radius: 3px; width: 100px;'> <a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>".$wrestler."</a></td>";
		}
		else if( $anklet_color == "green" )
		{
			$return_string .= "<td style='font-size: 12; text-align: left; background-color:#67F867; border-radius: 3px; width: 100px;'> <a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>".$wrestler."</a></td>";
		}
	}

	$return_string .= "</tr>";
	$return_string .= "</table>";
	$return_string .= "</td>";

	return $return_string;

}

// Function to get the wrestler and their info from the bouts table
function getWrestler( $weight, $bout_number, $anklet_color, $wcuid )
{
	//SELECT wrestlers.lname,wrestlers.seed, schools.abrv FROM wrestlers, bouts_125, schools WHERE ((bouts_125.id=1 AND wrestlers.id=bouts_125.green) AND (wrestlers.school=schools.id));

	$query = "SELECT wrestlers.lname, wrestlers.id, wrestlers.seed, bouts_".$weight."_".$wcuid.".w_bout_number, bouts_".$weight."_".$wcuid.".l_bout_number, schools.abrv FROM wrestlers, bouts_".$weight."_".$wcuid.", schools WHERE ((bouts_".$weight."_".$wcuid.".id=".$bout_number." AND wrestlers.id=bouts_".$weight."_".$wcuid.".".$anklet_color.") AND (wrestlers.school=schools.id))";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$wrestler = $row['lname'];
	$wrestler_id = $row['id'];
	$seed = $row['seed'];
	$school = $row['school'];
	$winner_bout_number = $row['w_bout_number'];
	$loser_bout_number = $row['l_bout_number'];

	// If we get a NULL return the winner of the pigtail match goes here
	if( $wrestler == "" )
	{
		$return_string = "";
		return $return_string;
	}

	if( $seed != 0 )
	{
		$return_string .= "<a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>&nbsp;(".$seed.")".$wrestler."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
		$return_string .= "</td>";
	}
	else
	{
		$return_string .= "<a href='#winner-bout-' onclick='advanceWrestler(\"".$wrestler."\", ".$wrestler_id.", ".$weight.", ".$bout_number.", ".$winner_bout_number.", ".$loser_bout_number.")'>&nbsp;".$wrestler."</a>";
		// Put in the removeal tag
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";
		$return_string .= "</td>";
	}

	return $return_string;

}

function getVerticalLineLeft()
{
	$return_string .= "<td style='border-left: 2px solid;height: 23px;'></td>";
	return $return_string;
}

function getEmptyCell()
{
	$return_string .= "<td ></td>";
	return $return_string;
}

function markUpBoutNumberDisplay($bout_number)
{
	$return_string .= "<td class='bracket-bout-number-r1'>bout ".$bout_number."</td>";
	return $return_string;
}

function markUpBoutNumberDisplayWrestleBacks($bout_number)
{
	$return_string .= "<td class='bracket-bout-number-wbr1'>bout ".$bout_number."</td>";
	return $return_string;
}

// This function will be depricated in favor of markUpBoutWinnerDivTag2
function markUpBoutWinnerDivTag($bout_number)
{
	$return_string .= "<td class='bracket-winner-r1'><div id='winner-bout-".$bout_number."'></div></td>";
	return $return_string;
}

// Get the wrestlers who have been selected by the contestant
function markUpBoutWinnerDivTag2($last_bout_number, $current_bout_number, $anklet_color, $weight, $wcuid)
{
	$return_string .= "<td class='bracket-winner-r1'><div id='winner-bout-".$last_bout_number."'>";
	$return_string .= getWrestler($weight, $current_bout_number, $anklet_color, $wcuid );
	$return_string .= "</div></td>";
	return $return_string;
}

function markUpBoutLoserDivTag($bout_number, $anklet_color)
{
	if( $anklet_color == "red" )
	{
		$return_string .= "<td style='border-bottom: 2px solid; font-size: 12; text-align: left; background-color:#F87594; border-radius: 3px; width: 100px;'><div id='loser-bout-".$bout_number."'>Loser bout ".$bout_number."</div></td>";
	}
	else if( $anklet_color == "green" )
	{
		$return_string .= "<td style='border-bottom: 2px solid; font-size: 12; text-align: left; background-color:#67F867; border-radius: 3px; width: 100px;'><div id='loser-bout-".$bout_number."'>Loser bout ".$bout_number."</div></td>";
	}
	return $return_string;
}

function markUpBoutLoserDivTag2($last_bout_number, $current_bout_number, $anklet_color, $weight, $wcuid)
{
	$wrestler_bout_info = getWrestler($weight, $current_bout_number, $anklet_color, $wcuid );

	if( ($last_bout_number == 33) && ($wrestler_bout_info == "") )
	{
		return "<td class='bracket-red-wrestler-r1'><div id='winner-bout-33'>Winner bout 33</div></td>";
	}

	if( $anklet_color == "red" )
	{
		$return_string .= "<td style='border-bottom: 2px solid; font-size: 12; text-align: left; background-color:#F87594; border-radius: 3px; width: 100px;'><div id='loser-bout-".$last_bout_number."'>";

		if( $wrestler_bout_info == "" )
			$return_string .= "Loser bout ".$last_bout_number; 
		else
			$return_string .= $wrestler_bout_info;

		$return_string .= "</div></td>";
	}
	else if( $anklet_color == "green" )
	{
		$return_string .= "<td style='border-bottom: 2px solid; font-size: 12; text-align: left; background-color:#67F867; border-radius: 3px; width: 100px;'><div id='loser-bout-".$last_bout_number."'>";

		if( $wrestler_bout_info == "" )
			$return_string .= "Loser bout ".$last_bout_number; 
		else
			$return_string .= $wrestler_bout_info;

		$return_string .= "</div></td>";
	}
	return $return_string;
}

function specialPigTailMarkUp($last_bout_number, $current_bout_number, $anklet_color, $weight, $wcuid)
{
	// select w_bout_number from bouts_125_2 where id=1;
	$query = "SELECT w_bout_number FROM bouts_".$weight."_".$wcuid." WHERE id=1";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$winner_bout_number = $row['w_bout_number'];

	//$query = "select wrestlers.lname,wrestlers.seed from wrestlers, bouts_125_2 WHERE ((bouts_125_2.id=1) AND (wrestlers.id=bouts_125_2.winner))";
	$query = "SELECT wrestlers.lname,wrestlers.seed FROM wrestlers, bouts_".$weight."_".$wcuid." WHERE (bouts_".$weight."_".$wcuid.".id=".$last_bout_number.") AND (wrestlers.id=bouts_".$weight."_".$wcuid.".winner)";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$wrestler = $row['lname'];
	$seed = $row['seed'];

	if( $wrestler == "" )
	{
		$return_string = "<td class='bracket-winner-r1'><div id='winner-bout-".$last_bout_number."A'>";
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";

		$return_string .= "Winner to bout ";
		$return_string .= $winner_bout_number;
		$return_string .= "</div></td>";
	}
	else
	{
		$return_string = "<td class='bracket-winner-r1'><div id='winner-bout-".$last_bout_number."A'>";
		$return_string .= "<a href='#holder' onclick='removeWrestler()'> <img src='http://www.important-info.com/ncaa/images/close-image.jpeg' alt='Remove selection' height='9' width='9' align='right'> </a>";

		if( $seed != 0 )
		{
			$return_string .= "(".$seed.")";
		}
		$return_string .= $wrestler;
		$return_string .= "</div></td>";
	}

	return $return_string;
}


?>
