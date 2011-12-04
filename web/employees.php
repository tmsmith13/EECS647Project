<?php
	require_once('session_check.php');
?>
<!doctype html>
<html>
<head>  
    <title>The Bug Makers Car Dealership</title> 
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
			<p id="logo">The Bug Makers Car Dealership</p>
			<ul id="nav">
				<li id="login">Welcome <a href="sales_profile.php"><?php echo $_SESSION['SESSION_FIRST_NAME'];?></a> | <a href="logout.php">Logout</a></li>
			</ul>
        </div> <!--end title_conatiner--> 
		
	
        <div class="main_body_container">
		
			<div class="left_pane_container">
			
				<p id="db_car_search">Search Car Database</p>
		
				<div class="search_form">
					<form>
						<ul>
							<li>
								<label>Make</label>
								<select>
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

						<li><label>Model:</label><input type="model" size="31"/></li>

						<li><label>Year:</label><input type="year" size="31"/></li>
						<p id="eg"><sup>Example "1970, 2002-04"</sup></p>

						<li>
							<label>Body Type:</label>
							<select>
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
							<select>
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
							<input type="lowest" size ="1"/>
							to $
							<input type="highest" size ="6"/>
						</li>

						<li>
							<label>Transmission:</label>
							<select>
								<option>Automatic</option>
								<option>Manual</option>
								<option selected="yes"></option>
							</select>
						</li>

						<li>
							<label>Fuel Type:</label>
							<select>
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
							<select>
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
							<select>
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
							<label><input type="radio" name="radio" />Power Door</label>
							<label><input type="radio" name="radio" />Keyless Entry</label>
							<label><input type="radio" name="radio" />RearView Camera</label>
							<label><input type="radio" name="radio" />GPS</label>
							<label><input type="radio" name="radio" />Power Window</label>
							<label><input type="radio" name="radio" />Satellite Radio</label>
							<label><input type="radio" name="radio" />Hybrid</label>
							<label><input type="radio" name="radio" />Window Tinted</label>
							<label><input type="radio" name="radio" />Sunroof</label>
						</li>
						<li>
							<input type="submit" />
							<input type="reset" />
						</li>
						</ul>
					</form>
				</div><!--end search_form-->
				
			</div> <!--end left_pane_container-->
			
			
			<div class="middle_pane_container">        
				search results will go here work in progress...
			</div><!--end middle_pane_container-->
			
			
			
			<div class="right_pane_container">
				Once employees log in we will show more search forms here. This means we have 2 views over all.
				1) anyone 2) employees. Once logged in employees can search for sales info, employee info etc.
				Those forms appear here.				
				
			</div> <!--end_rigt_pane_conatiner-->
	    
        </div><!--main_body_container-->
		
		
		
		<div class="footer">
		This is footer : ignore the dev. colors of the page for now. It helps me see where things end/start.
		If you are really board go here :  <a href="fail.html">something fun</a>  :))))
		</div><!--end footer-->
		
		
    </div><!--end page_container-->
	
	
	

    
</body>  









































</body>
</html>
