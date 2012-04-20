<?php

$dbhost = "localhost";
$dbuser = "ncaa";
$dbpass = "n0rth0f25";
$dbname = "wrestling";
//Connect to MySQL Server
mysql_connect($dbhost, $dbuser, $dbpass);
//Select Database
mysql_select_db($dbname) or die(mysql_error());

$email = $_GET['email'];
$email = mysql_real_escape_string($email);

$query = "SELECT username,password FROM users WHERE email='".$email."' and active=1";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
$username = $row['username'];
$password = $row['password'];
if( $username != "" )
{

	$subject = "Wrestling Pick'em Contest - Login Credentials";

	$body = "Your username is ".$username." and you password is ".$password.".";
	$headers = "From: brian@foodang.com \r\n" .
	"Reply-To: brian@foodang.com \r\n" .
	"X-Mailer: PHP/" . phpversion();

	if (mail($email, $subject, $body, $headers)) 
	{
		echo("<p>Login credentials sent!</p> <a href=\"http://www.important-info.com/ncaa/\">Login</a>");
	} 
}
else 
{
	echo("<p>Email not found!</p> <a href=\"http://www.important-info.com/ncaa/\">Create Account</a>");
}

?>
