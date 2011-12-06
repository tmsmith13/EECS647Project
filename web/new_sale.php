<?php
require_once('session_check.php');

require_once('model.php');
require_once('page_setup.php');
require_once('vehicle_model.php');
require_once('customer_model.php');
require_once('location_model.php');
require_once('sale_model.php');

if (isset($_POST['vehicle_id'])) {
	$customer_id = null;
	
	if (!$_POST['customer_id']) {
		// need to create customer
		$customer = array();
		$location = array();
		$customer['first_name']    = clean_param_post($conn, 'first_name');
		$customer['last_name']     = clean_param_post($conn, 'last_name');
		$customer['date_of_birth'] = clean_param_post($conn, 'date_of_birth');
		$customer['street']        = clean_param_post($conn, 'street');
		$location['city']          = clean_param_post($conn, 'city');
		$location['state']         = clean_param_post($conn, 'state');
		$customer['zip']           = clean_param_post($conn, 'zip');
		$customer['phone_number']  = clean_param_post($conn, 'phone_number');

		LocationModel::Insert($customer['zip'], $location['city'], $location['state']);
		CustomerModel::Insert($customer);
		$customer_id = $conn->insert_id;
	}
	else
		$customer_id = clean_param_post($conn, 'customer_id');

	$sale = array();
	$sale['customer_id'] = $conn->insert_id;
//	$sale['employee_id'] = $_SESSION['SESSION_MEMBER_ID'];
	$sale['employee_id'] = 1;
	$sale['vehicle_id'] = clean_param_post($conn, 'vehicle_id');
	$sale['subtotal'] = clean_param_post($conn, 'subtotal');
	$sale['total'] = $sale['subtotal'] + clean_param_post($conn, 'tax');
	$sale['commission'] = 0;
	$sale['sale_date'] = date('Y-m-d');
	SaleModel::Insert($sale);

	header("Location:  $app_path");
}

$title = 'New Sale';
include('page_header.php');

$vehicles = VehicleModel::GetVehicles(0, 1000, array('models', 'makes'), array('model_name', 'make_name', 'vin'));
$customers = CustomerModel::GetCustomers(0, 1000);
?>
<h1>New Sale</h1>
<form method="post" action="<?= $app_path ?>new_sale.php">
	<div>
		<label for="vehicle_id">Vehicle:</label>
		<select id="vehicle_id" name="vehicle_id">
			<option value="">SELECT A CAR</option>
			<? foreach($vehicles as $v): ?>
			<option value="<?= $v['vehicle_id'] ?>"><?= "${v['model_year']} ${v['model_name']} ${v['make_name']}    vin ${v['vin']}" ?></option>
			<? endforeach ?>
		</select>
	</div>

	<div>
		<label for="customer_id">Customer:</label>
		<select id="customer_id" name="customer_id">
			<option value="">NEW CUSTOMER</option>
			<? foreach($customers as $c): ?>
			<option value="<?= $c['customer_id'] ?>"><?= "{$c['first_name']} {$c['last_name']}" ?></option>
			<? endforeach ?>
		</select>
	</div>

	<p>If new customer:</p>
	<div>
		<label for="first_name">First name:</label>
		<input type="text" id="first_name" name="first_name" />
	</div>
	<div>
		<label for="last_name">Last name:</label>
		<input type="text" id="last_name" name="last_name" />
	</div>
	<div>
		<label for="date_of_birth">Date of Birth:</label>
		<input type="text" id="date_of_birth" name="date_of_birth" />
	</div>
	<div>
		<label for="street">Street:</label>
		<input type="text" id="street" name="street" />
	</div>
	<div>
		<label for="city">City:</label>
		<input type="text" id="city" name="city" />
	</div>
	<div>
		<label for="state">State:</label>
		<input type="text" id="state" name="state" />
	</div>
	<div>
		<label for="zip">Zip:</label>
		<input type="text" id="zip" name="zip" />
	</div>
	<div>
		<label for="phone_number">Phone number:</label>
		<input type="text" id="phone_number" name="phone_number" />
	</div>

	<div>
		<label for="subtotal">Sale subtotal:</label>
		<input type="text" id="subtotal" name="subtotal" />
	</div>
	<div>
		<label for="tax">Sale tax:</label>
		<input type="text" id="tax" name="tax" />
	</div>
	<div>
		<input type="submit" name="submit" value="Create Sale" />
	</div>
</form>

<?php include('page_footer.php'); ?>
