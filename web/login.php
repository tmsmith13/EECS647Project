<?php

function __autoload($Connection) {
    include $Connection.'.php';
}

require_once('page_setup.php');

$errflag = false;

require_once('db_config.php');

//Connect to mysql server
$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(!$link) {
	die('Failed to connect to server: ' . mysql_error());
}


$db = mysql_select_db(DB_DATABASE);
if(!$db) {
	die("Unable to select database");
}

function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}

//Sanitize the POST values
$login = clean($_POST['username']);
$password = clean($_POST['password']);

//check input for blank
if($login == '')
	$errflag = true;
if($password == '')
	$errflag = true;

if($errflag){
	session_write_close();
	echo "Envalid user name or password";
	header("location: fail.php");
	exit();
}

//Query for username and password
$qry = "SELECT ssn,first_name,last_name FROM employees WHERE email='$login' AND password=UNHEX('".sha1($password)."') LIMIT 1";
$result = mysql_query($qry);

//Check whether the query was successful or not
if($result)
{
	if(mysql_num_rows($result) == 1)  //we should not get duplicates.
	{
		//successful login
		session_regenerate_id();
		$member = mysql_fetch_assoc($result);
		$_SESSION['SESSION_MEMBER_ID'] = $member['ssn'];
		$_SESSION['SESSION_FIRST_NAME'] = $member['first_name'];
		$_SESSION['SESSION_LAST_NAME'] = $member['last_name'];
		session_write_close();

		header("location: $app_path");
		exit();
	}else {
		//Login failed
		header("location: fail.html");
		exit();
	}
}
else
{
	die("Query failed");
}
?>
