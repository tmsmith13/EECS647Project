<?php
require_once('model.php');

$makes = Model::Select('makes', array('make_name'), NULL);
?>

<div class="left_pane_container">
	<p id="db_car_search">Search Car Database</p>

	<div class="search_form">

		<form id="car_search" name="car_search" method="post" action="process_car_form.php">
			<ul>
				<li>
					<label>Make</label>
					<select type="text" id="make" name="make">
    <? foreach ($makes as $make): ?>
    <option value="<?= $make['make_name'] ?>"><?= $make['make_name'] ?></option>
    <? endforeach ?>
					<option selected="yes"></option>
					</select>
				</li>

				<li><label>Model:</label><input type="text" name="model" id="model" size="31"/></li>

				<li><label>Year:</label><input type="text" name="year" id="year" size="31"/></li>
				<p id="eg"><sup>Example "1970, 2002-04"</sup></p>

				<li>
					<label>Body Type:</label>
					<select name="body_ty" id="body_ty">
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
					<select name ="condition"id="condition">
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
					<input type="text" name="lowest_price" id="low_price" size ="1"/>
					to $
					<input type="text" name="highest_price" id="high_price" size ="6"/>
				</li>

				<li>
					<label>Transmission:</label>
					<select type="text" name="trans" id="trans">
						<option>Automatic</option>
						<option>Manual</option>
						<option selected="yes"></option>
					</select>
				</li>

				<li>
					<label>Fuel System:</label>
					<select type="text" name="fuel_type" id="fuel_type">
						<option>Fuel injected</option>
						<option>Carburated</option>
						<option>Hybrid-Electric</option>
						<option selected="yes"></option>
					</select>
				</li>

				<li>
					<label>City Mileage:</label>
					<select type="text" name="mileage" id="mileage">
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
					<select type="text" name="color" id="color">
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
					<label><input type="checkbox" id="power_door" name="power_door" />Power Door</label>
					<label><input type="checkbox" id="keyless_entry" name="keyless_entry" />Keyless Entry</label>
					<label><input type="checkbox" id="rearview_Camera" name="rearview_Camera"/>RearView Camera</label>
					<label><input type="checkbox" id="gps" name="gps" />GPS</label>
					<label><input type="checkbox" id="power_window" name="power_window" />Power Window</label>
					<label><input type="checkbox" id="satellite_radio" name="satellite_radio" />Satellite Radio</label>
					<label><input type="checkbox" id="hybrid" name="hybrid" />Hybrid</label>
					<label><input type="checkbox" id="window_tinted" name="window_tinted" />Window Tinted</label>
					<label><input type="checkbox" id="sunroof" name="sunroof" />Sunroof</label>
				</li>

				<li>
					<input type="submit" class="button" id="submit_btn" value="Search" />
					<input type="reset" value="reset"><br>
				</li>
			</ul>
		</form>
	</div><!--end search_form-->
</div> <!--end left_pane_container-->