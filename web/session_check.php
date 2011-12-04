<?php
	session_start();
	
	//Check whether the session variable SESSION_MEMBER_ID is present or not
	if(!isset($_SESSION['SESSION_MEMBER_ID']) || (trim($_SESSION['SESSION_MEMBER_ID']) == '')) 
	{
		header("location: fail.html");
		exit();
	}
?>