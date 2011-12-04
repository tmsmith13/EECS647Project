<?php
	session_start();
	//remove session identifiers stored in session then take user back to default view
	unset($_SESSION['SESSION_MEMBER_ID']);
	unset($_SESSION['SESSION_FIRST_NAME']);
	unset($_SESSION['SESSION_LAST_NAME']);
	header("location: index.php");
?>
