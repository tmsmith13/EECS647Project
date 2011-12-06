<?php
require_once('page_setup.php');
$title = 'Vehicle Search';
$javascripts = array('jquery.form', 'other_searches');
include('page_header.php');
?>
			<div class="left_pane_container">
				<h1>Search Car Database</h1>

				<div class="search_form">

				<form name="" method="post" action="">
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

						<li><label>Model:</label><input type="text" name="model" id="model" size="28"/></li>

						<li><label>Year:</label><input type="text" name="year" id="year" size="28"/></li>
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
				<div id="place_holder" style="text-align:center">
					<h1>Welcome to Billy Joe's <br>Car Dealership</h1>
					<i>Start Your Next Car Search here</i>
				</div><!--end palce holder-->
			</div><!--end middle_pane_container-->

			<? if (check_login()): ?>
			<div class="right_pane_container">
				<? include('other_searches.php') ?>
			</div> <!--end_right_pane_container-->
			<? endif ?>

		</div><!--main_body_container-->
		<?php include('page_footer.php'); ?>

    </div><!--end page_container-->

</body>

</html>
