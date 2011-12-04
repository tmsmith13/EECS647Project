<?php
	require_once('session_check.php');
?>
<!doctype html>
<html>
<head>  
	<title>Employee Profile</title>
	<link rel="stylesheet" href="./css/master.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="./css/pretty_form.css" type="text/css" media="screen" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    
	<script type="text/javascript" charset="utf-8">
    $(function(){
        $("input, textarea, select, button").uniform();
    });
	
	function login(showhide)
	{
		if(showhide == "show")
			document.getElementById('popupbox').style.visibility="visible";
		else if(showhide == "hide")
			document.getElementById('popupbox').style.visibility="hidden"; 	
	}
    </script>
    
	<style type="text/css" media="screen">
    
	</style>
</head>

<body>
<div id="page_container">    
        
		<div class="title_container">
			<p id="logo"><a href="index.php">The Bug Makers Car Dealership</a></p>
			<ul id="nav">
				<li id="login">Welcome <a href="sales_profile.php"><?php echo $_SESSION['SESSION_FIRST_NAME'];?></a> | <a href="logout.php">Logout</a></li>
			</ul>
        </div> <!--end title_conatiner--> 
		
	
        <div class="main_body_container">
		
			<div class="left_pane_container">
			
				
			</div> <!--end left_pane_container-->
			
			
			<div class="middle_pane_container">  

			<h1>Employee Profile </h1>
				table containing all his sales, another table containing his personal info etc.
			</div><!--end middle_pane_container-->
			
			
			
			<div class="right_pane_container">		
				
			</div> <!--end_rigt_pane_conatiner-->
	    
        </div><!--main_body_container-->
		
		
		
		<div class="footer">
		this is footer
		</div><!--end footer-->
		
		
    </div><!--end page_container-->
<!--
<h1>My Profile </h1>
<a href="member-index.php">Home</a> | <a href="logout.php">Logout</a>
<p>This is another secure page. </p>-->





</body>

</html>
