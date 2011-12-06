<?php

require_once('page_setup.php');
$title = 'Car Details';
include('page_header.php');

require_once('model.php');
$vehicle_id = clean_param($conn, 'vehicle_id', 1);

require_once('car_model.php');
$result = CarModel::GetCar($vehicle_id);
$basic = $result['vehicle'];
$features = Model::Select('features', array('string_position','feature'), NULL);
$engine = $result['engine'];
$transmission = $result['transmission'];
$brakes = $result['brakes'];

?>
<h1>Car Details</h1>
<h2>Basic Information</h2>
<? if (!empty($basic)): ?>
<table class="tabular" border="1">
	<tr>
		<th>Make</th>
		<th>Model</th>
		<th>Trim</th>
		<th>Body Type</th>
		<th>Model Year</th>
		<th>Condition</th>
		<th>Color</th>
		<th>Highway MPG</th>
		<th>City MPG</th>
		<th>Fuel Tank Size</th>
		<th>Miles</th>
		<th>Sale Price</th>
	</tr>
	<? foreach($basic as $b): ?>
	<tr>
		<td><?= $b['make_name'] ?></td>
		<td><?= $b['model_name'] ?></td>
		<td><?= $b['trim'] ?></td>
		<td><?= $b['body_type'] ?></td>
		<td><?= $b['model_year'] ?></td>
		<td><?= $b['vehicle_condition'] ?></td>
		<td><?= $b['body_color'] ?></td>
		<td class="numerical"><?= $b['hwy_mpg'] ?></td>
		<td class="numerical"><?= $b['city_mpg'] ?></td>
		<td class="numerical"><?= $b['fuel_tank_size'] ?></td>
		<td class="numerical"><?= $b['miles'] ?></td>
		<td class="numerical"><?= $b['advertised_sale_price'] ?></td>
	</tr>
	<? endforeach ?>
</table>
<? endif ?>
<h2>Features</h2>
<? if (!empty($features)): ?>
<table class="tabular" border="1">
	<tr>
	<? foreach($features as $f): ?>
		<th><?= $f['feature'] ?></th>
	<? endforeach ?>
	</tr>
	<tr>
	<? foreach($features as $f): ?>
     <td><?= ( (1 << $f['string_position']) & intval($basic[0]['feature_set'])) ? 'Yes' : 'No' ?></td>
	<? endforeach ?>
	</tr>
</table>
<? endif ?>
<h2>Engine</h2>
<? if (!empty($engine)): ?>
<table class="tabular" border="1">
	<tr>
		<th>Displacement</th>
		<th>Fuel System</th>
		<th>Horsepower</th>
		<th>Torque</th>
		<th>Cylinders</th>
		<th>Shape</th>
	</tr>
	<? foreach($engine as $e): ?>
	<tr>
		<td class="numerical"><?= $e['displacement'] ?></td>
		<td><?= $e['fuel_system'] ?></td>
		<td class="numerical"><?= $e['horsepower'] ?></td>
		<td class="numerical"><?= $e['torque'] ?></td>
		<td><?= $e['cylinders'] ?></td>
		<td><?= $e['shape'] ?></td>
	</tr>
	<? endforeach ?>
</table>
<? endif ?>
<h2>Transmission</h2>
<? if (!empty($transmission)): ?>
<table class="tabular" border="1">
	<tr>
		<th>Drivetrain</th>
		<th>Type</th>
		<th>Gears</th>
	</tr>
	<? foreach($transmission as $t): ?>
	<tr>
		<td><?= $t['drivetrain'] ?></td>
		<td><?= $t['transmission_type'] ?></td>
		<td><?= $t['num_gears'] ?></td>
	</tr>
	<? endforeach ?>
</table>
<? endif ?>
<h2>Brakes</h2>
<? if (!empty($brakes)): ?>
<table class="tabular" border="1">
	<tr>
		<th>ABS System</th>
		<th>Front Brake Type</th>
		<th>Rear Brake Type</th>
	</tr>
	<? foreach($brakes as $b): ?>
	<tr>
                <td><?= $b['brake_abs_system'] ? 'Yes' : 'No'?></td>
                <td><?= $b['front_brake_type'] ? 'Disc' : 'Drum' ?></td>
                <td><?= $b['rear_brake_type'] ? 'Disc' : 'Drum' ?></td>
	</tr>
	<? endforeach ?>
</table>
<? endif ?>
<?php include('page_footer.php'); ?>
