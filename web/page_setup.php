<?php
$protocol = 'http';
$app_path = $protocol . '://' . dirname($_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/';

function param($param, $default) {
	return mysql_real_escape_string(
		isset($_GET[$param]) ? $_GET[$param] :
		isset($_POST[$param]) ? $_POST[$param] :
		$default
	);
}
