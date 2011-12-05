<?php
$protocol = 'http';
$app_path = $protocol . '://' . dirname($_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/';

session_start();

function check_login() {
	return isset($_SESSION['SESSION_MEMBER_ID']) && trim($_SESSION['SESSION_MEMBER_ID']) != '';
}

function clean_param($conn, $param, $default) {
	return $conn->real_escape_string(
		isset($_GET[$param]) ? $_GET[$param] :
		isset($_POST[$param]) ? $_POST[$param] :
		$default
	);
}
