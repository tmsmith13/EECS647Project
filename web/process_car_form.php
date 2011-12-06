<?php
require_once('session_check.php');
include('db_config.php');

$link = db_mysql_connect();

$make = mysql_real_escape_string($_POST['make']);
$model = mysql_real_escape_string($_POST['model']);
$year = mysql_real_escape_string($_POST['year']);
$body_t = mysql_real_escape_string($_POST['body_ty']);
$condition = mysql_real_escape_string($_POST['condition']);
$lowest_price = mysql_real_escape_string($_POST['lowest_price']);
$highest_price = mysql_real_escape_string($_POST['highest_price']);
$trans = mysql_real_escape_string($_POST['trans']);
$fuel_type = mysql_real_escape_string($_POST['fuel_type']);
$mileage = mysql_real_escape_string($_POST['mileage']);
$color = mysql_real_escape_string($_POST['color']);

$wheres = array();

if(!empty($make)) 
	$wheres[] = "make_name ='$make'";
if(!empty($model)) 
	$wheres[] = "model_name ='$model'";
if(!empty($year)) 
	$wheres[] = "model_year ='$year'";
if(!empty($body_t)) 
	$wheres[] = "body_type ='$body_t'";
if(!empty($condition)) 
	$wheres[] = "vehicle_condition ='$condition'";
if(!empty($lowest_price)) 
	$wheres[] = "low_price ='$lowest_price'";
if(!empty($highest_price)) 
	$wheres[] = "high_price ='$highest_price'";
if(!empty($trans)) 
	$wheres[] = "transmission_type ='$trans'";
if(!empty($fuel_type)) 
	$wheres[] = "fuel_system ='$fuel_type'";	
if(!empty($mileage)) 
	$wheres[] = "miles ='$mileage'";
if(!empty($color)) 
	$wheres[] = "body_color ='$color'";	

$where = join(' AND ', $wheres);

//echo $where;

$que ="
SELECT vehicle_id,model_year,make_name, model_name,body_type,vehicle_condition,advertised_sale_price
FROM vehicles
NATURAL JOIN models
NATURAL JOIN makes
NATURAL JOIN transmissions
NATURAL JOIN engines
WHERE $where
		";
//echo $que;
$result = mysql_query($que);

if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$cars = array();

while($row = mysql_fetch_assoc($result))
{
	$cars[]=$row;
}
?>

<? if (!empty($cars)): ?>
<div id ="car_search_result">	
	<table id="car_result" border="1" text-align="center">
		<tr>
			<th width="90"><i>Vehicle ID</i></th>
			<th><i>Car</i></th>
			<th><i>Price</i></th>
		</tr>
		<? foreach($cars as $car): ?>
		<tr>
			<td><center><?= $car['vehicle_id'] ?></center></td>
			<td>
				<center><a href="<?= $apppath ?>car_details.php?vehicle_id=<?= $car['vehicle_id'] ?>" >
					<i><?= $car['vehicle_condition'] ?>&nbsp&nbsp</i>
					<?= $car['model_year']." ".$car['make_name']." ".$car['model_name'] ?></a>
				</center>
			</td>
			<td><center>$<?= $car['advertised_sale_price'] ?></center</td>
		</tr>
		<? endforeach ?>
	</table>
</div>
<? endif?>