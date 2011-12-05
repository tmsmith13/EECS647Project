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

    <style type="text/css" media="screen">
    </style>

</head>  
<body>
   

   <div id="popupbox"> 	
		<form name="Login" action="login.php" method="post">
			<center>Username:</center>
			<center><input name="username" size="25" /></center>
			<center>Password:</center>
			<center><input name="password" type="password" size="25" /></center>
			<center><input type="submit" name="submit" value="Login" /></center>
		</form>
		<p id="result"></p>
		<center><a href="javascript:login('hide');">close</a></center>
	</div> <!--end popupbox-->
	
	
	
    <div id="page_container">    
        
		<div class="title_container">
			<p id="logo">The Bug Makers Car Dealership</p>
		
			<ul id="nav">
				<li id="login">Welcome <a href="employee_profile.php"><?php echo $_SESSION['SESSION_FIRST_NAME'];?></a> | <a href="logout.php">Logout</a></li>
			</ul>
        </div> <!--end title_conatiner--> 
		
	
        <div class="main_body_container">
        
			<div class="left_pane_container">
				<p id="db_car_search">Search Car Database</p>
					
				<div class="search_form">
								
				<form name="car_search_form" method="post" action="">
					<ul>
						<li>
							<label>Make</label>
							<select type="text" id="make">
							<option value="AMC">AMC</option>
							<option value="Acura">Acura</option>
							<option value="Alfa%20Romeo">Alfa Romeo</option>
							<option value="Aston%20Martin">Aston Martin</option>
							<option value="Audi">Audi</option>
							<option value="Austin">Austin</option>
							<option value="Austin%20Healey">Austin Healey</option>
							<option value="BMW">BMW</option>
							<option value="Bentley">Bentley</option>
							<option value="Bugatti">Bugatti</option>
							<option value="Buick">Buick</option>
							<option value="Cadillac">Cadillac</option>
							<option value="Chevrolet">Chevrolet</option>
							<option value="Chrysler">Chrysler</option>
							<option value="Citroen">Citroen</option>
							<option value="Cord">Cord</option>
							<option value="Daewoo">Daewoo</option>
							<option value="Datsun">Datsun</option>
							<option value="DeLorean">DeLorean</option>
							<option value="DeSoto">DeSoto</option>
							<option value="Dodge">Dodge</option>
							<option value="Eagle">Eagle</option>
							<option value="Edsel">Edsel</option>
							<option value="Ferrari">Ferrari</option>
							<option value="Fiat">Fiat</option>
							<option value="Ford">Ford</option>
							<option value="GMC">GMC</option>
							<option value="Geo">Geo</option>
							<option value="Honda">Honda</option>
							<option value="Hummer">Hummer</option>
							<option value="Hyundai">Hyundai</option>
							<option value="Infiniti">Infiniti</option>
							<option value="International%20Harvester">International Harvester</option>
							<option value="Isuzu">Isuzu</option>
							<option value="Jaguar">Jaguar</option>
							<option value="Jeep">Jeep</option>
							<option value="Kia">Kia</option>
							<option value="Lamborghini">Lamborghini</option>
							<option value="Lancia">Lancia</option>
							<option value="Land%20Rover">Land Rover</option>
							<option value="Lexus">Lexus</option>
							<option value="Lincoln">Lincoln</option>
							<option value="Lotus">Lotus</option>
							<option value="MG">MG</option>
							<option value="Maserati">Maserati</option>
							<option value="Maybach">Maybach</option>
							<option value="Mazda">Mazda</option>
							<option value="Mercedes%2DBenz">Mercedes-Benz</option>
							<option value="Mercury">Mercury</option>
							<option value="Mini">Mini</option>
							<option value="Mitsubishi">Mitsubishi</option>
							<option value="Nash">Nash</option>
							<option value="Nissan">Nissan</option>
							<option value="Oldsmobile">Oldsmobile</option>
							<option value="Opel">Opel</option>
							<option value="Other%20Makes">Other Makes</option>
							<option value="Packard">Packard</option>
							<option value="Peugeot">Peugeot</option>
							<option value="Plymouth">Plymouth</option>
							<option value="Pontiac">Pontiac</option>
							<option value="Porsche">Porsche</option>
							<option value="Ram">Ram</option>
							<option value="Renault">Renault</option>
							<option value="Replica%20%26%20Kit%20Makes">Replica &amp; Kit Makes</option>
							<option value="Rolls%2DRoyce">Rolls-Royce</option>
							<option value="Saab">Saab</option>
							<option value="Saturn">Saturn</option>
							<option value="Scion">Scion</option>
							<option value="Shelby">Shelby</option>
							<option value="Smart">Smart</option>
							<option value="Studebaker">Studebaker</option>
							<option value="Subaru">Subaru</option>
							<option value="Suzuki">Suzuki</option>
							<option value="Tesla">Tesla</option>
							<option value="Toyota">Toyota</option>
							<option value="Triumph">Triumph</option>
							<option value="Volkswagen">Volkswagen</option>
							<option value="Volvo">Volvo</option>
							<option value="Willys">Willys</option>
							<option selected="yes"></option>
							</select>
						</li>

						<li><label>Model:</label><input type="text" name="model" id="model" size="31"/></li>

						<li><label>Year:</label><input type="text" name="year" id="year" size="31"/></li>
						<p id="eg"><sup>Example "1970, 2002-04"</sup></p>

						<li>
							<label>Body Type:</label>
							<select name="body_type">
								<option>Convertible</option>
								<option>Coupe</option>
								<option>Hatchback</option>
								<option>Pickup Truck</option>
								<option>Sedan</option>
								<option>SUV</option>
								<option>Wagon</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label>Condition:</label>
							<select name ="condition">
								<option>New</option>
								<option>Used-Like New</option>
								<option>Used-Average</option>
								<option>Used-Rough</option>
								<option>Salvage</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label>Price:</label>
							$
							<input type="text" name="lowest_price" size ="1"/>
							to $
							<input type="text" name="highest_price" size ="6"/>
						</li>

						<li>
							<label>Transmission:</label>
							<select type="text" name="transmission">
								<option>Automatic</option>
								<option>Manual</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label>Fuel Type:</label>
							<select type="text" name="fuel_type">
								<option>Biodiesel</option>
								<option>Diesel</option>
								<option>Electric</option>
								<option>Ethanol</option>
								<option>Gasoline</option>
								<option>Hybrid-Electric</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label> Mileage:</label>
							<select type="text" name="mileage">
								<option>Less than 1,000 miles </option>
								<option>Less than 30,000 miles</option>
								<option>Less than 60,000 miles</option>
								<option>Less than 90,000 miles</option>
								<option>Less than 120,000 miles</option>
								<option>Less than 150,000 miles</option>
								<option> &#8250; 150,000 miles</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label> Color:</label>
							<select type="text" name="color">
								<option>Black</option>
								<option>Blue</option>
								<option>Brown</option>
								<option>Burgundy</option>
								<option>Gold</option>
								<option>Gray</option>
								<option>Green</option>
								<option>Orange</option>
								<option>Purple</option>
								<option>Red</option>
								<option>Silver</option>
								<option>Tan</option>
								<option>Teal</option>
								<option>White</option>
								<option>Yellow</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label>Features :</label>
							<label><input type="checkbox" name="power_door" />Power Door</label>
							<label><input type="checkbox" name="keyless_entry" />Keyless Entry</label>
							<label><input type="checkbox" name="rearview_Camera" />RearView Camera</label>
							<label><input type="checkbox" name="gps" />GPS</label>
							<label><input type="checkbox" name="power_window" />Power Window</label>
							<label><input type="checkbox" name="satellite_radio" />Satellite Radio</label>
							<label><input type="checkbox" name="hybrid" />Hybrid</label>
							<label><input type="checkbox" name="window_tinted" />Window Tinted</label>
							<label><input type="checkbox" name="sunroof" />Sunroof</label>
						</li>

						<li>
							<input type="submit" class="button" id="submit_btn" value="Send" />
							<input type="reset" value="reset"><br>
						</li>
					</ul>		
				</form>
				</div><!--end search_form-->
				
			</div> <!--end left_pane_container-->
			
			
			<div id="middle_pane_container">        
			search results will go here work in progress...
			</div><!--end middle_pane_container-->
			
			

			<div class="right_pane_container">
				<div class ="search_form">
					<p id="db_car_search">Search Sales Database</p><br/>
					<div id="contact_form">
						<form id="sales_form" method="post" action="">
					
								<label  id="sales_id">Sales ID</label>
								<input type="text"  id="sales_id" size="30" value="" class="text-input" />
								
								<label  id="cust_ssn">Customer SSN</label>
								<input type="text"  id="cust_first" size="30" value="" class="text-input" />
								
								<br>
								<input type="submit" name="submit" class="button" id="submit_btn" value="Search" />
				
						</form>
					</div>
					
					
					
					<br>	
					<p id="db_car_search">Search Employee</p><br/>
					<div id="contact_form">
						<form name="contact" method="post" action="">
						
								<label  id="e_id">Employee ID</label>
								<input type="text"  id="e_id" size="30" value="" class="text-input" />
					
								<label  id="e_ssn">SSN</label>
								<input type="text"  id="email" size="30" value="" class="text-input" />
								
								<br />
								<input type="submit" name="submit" class="button" id="submit_btn" value="Search" />				
						</form>
					</div>
				</div><!--end search form-->
			</div> <!--end_rigt_pane_conatiner-->
	    
        </div><!--main_body_container-->
		
		
		<div class="footer">
		This is footer : ignore the dev. colors of the page for now. It helps me see where things end/start.
		If you are really board go here :  <a href="fail.html">something fun</a>  :))))
		</div><!--end footer-->
		
		
    </div><!--end page_container-->    
</body>  

</html>
