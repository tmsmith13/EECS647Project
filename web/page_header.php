<!DOCTYPE html>
<html>
<head>
	<title><? if (isset($title)): ?><?= $title ?> - <? endif ?>Billy Joe's Car Dealership</title>
	<link rel="stylesheet" href="<?= $app_path ?>css/master.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= $app_path ?>css/navbar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= $app_path ?>css/pretty_form.css" type="text/css" media="screen" />

	<script type="text/javascript" src="<?= $app_path ?>js/jquery.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="js/runonload.js"></script>
	<script type="text/javascript" src="<?= $app_path ?>js/application.js" charset="utf-8"></script>
	<? if (isset($javascripts)): ?>
	<? foreach($javascripts as $js): ?>
	<script type="text/javascript" src="<?= $app_path?>js/<?= $js ?>.js"></script>
	<? endforeach ?>
	<? endif ?>
</head>
<body>

	<div id="page_container">
		<div class="title_container">
			<p id="logo">The Bug Makers Car Dealership</p>
			
			<div id="userbox">
				<? if (check_login()): ?>
				Welcome <a href="<?= $app_path?>employee_profile.php"><?= $_SESSION['SESSION_FIRST_NAME']; ?></a>
				<span style="width:4em">&nbsp;</span>
				<a href="<?= $app_path ?>logout.php">Logout</a>
				<? else: ?>
				<a href="javascript:login('show');">Login</a>
				<? endif ?>
			</div>
		</div> <!--end title_container-->
		
		<? if (!check_login()) include('login_popup.php'); ?>

		<? include('navbar.php') ?>

		<div class="main_body_container">
