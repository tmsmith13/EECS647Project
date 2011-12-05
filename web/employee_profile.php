<?php
	require_once('session_check.php');
?>
<!doctype html>  
<html>  
<head>  
    <title>The Bug Makers Car Dealership</title> 
	
	<script type="text/javascript" src="js/jquery-1.2.3.pack.js"></script>
	<script type="text/javascript" src="js/runonload.js"></script>
	<script type="text/javascript" src="js/update.js"></script>
	
	<link rel="stylesheet" href="./css/master.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="./css/pretty_form.css" type="text/css" media="screen" /> 
	
	<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript" charset="utf-8">
		function login(showhide)
		{
			if(showhide == "show")
				document.getElementById('popupbox').style.visibility="visible";
			else if(showhide == "hide")
				document.getElementById('popupbox').style.visibility="hidden"; 
		}
	</script>

    <STYLE>
	</STYLE>

</head>  
<body>
    <div id="page_container">   
		<div class="title_container">
			<p id="logo"><a href="index.php">The Bug Makers Car Dealership</a></p>
		
			<ul id="nav">
				<li id="login">Welcome <a href="employee_profile.php"><?php echo $_SESSION['SESSION_FIRST_NAME'];?></a> | <a href="logout.php">Logout</a></li>
			</ul>
		</div> <!--end title_conatiner--> 
		

		<div class="main_body_container">
		
			<div class="left_pane_container">
			</div> <!--end left_pane_container-->
			
			
			<div id="middle_pane_container">        
			employee info here
			</div><!--end middle_pane_container-->
			
			<div class="right_pane_container">
			</div> <!--end_rigt_pane_conatiner-->
		
		</div><!--main_body_container-->
		
		
		<div class="footer">
		</div><!--end footer-->
		
    </div><!--end page_container-->

</body>

</html>
