<?php
$protocol = 'http';
$app_path = $protocol . '://' . dirname($_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/';

session_start();

function check_login() {
	return isset($_SESSION['SESSION_MEMBER_ID']) && trim($_SESSION['SESSION_MEMBER_ID']) != '';
}

function clean_param($conn, $param, $default) {
	return isset($_GET[$param]) ? $conn->real_escape_string($_GET[$param]) : $default;
}

function clean_param_post($conn, $param, $default = null) {
	return $conn->real_escape_string($_POST[$param]);
}
