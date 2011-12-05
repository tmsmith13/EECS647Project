<?php
require_once('session_check.php');

require_once('sale_model.php');
$sale = SaleModel::GetSale(
		$conn->real_escape_string($_POST['sales_id']),
		array('customers', 'vehicles', 'models', 'makes'),
		array(
			'customers.last_name AS custlast', 'customers.first_name AS custfirst',
			'total - subtotal AS tax',
			'model_year', 'model_name', 'make_name', 'vin'
		)
);
?>

<div>
	<span class="label">Sale ID:</span><?= $sale['sale_id'] ?>
</div>
<div>
	<span class="label">Sale Date:</span><?= $sale['sale_date'] ?>
</div>
<div>
	<span class="label">Customer Last:</span><?= $sale['custlast'] ?>
</div>
<div>
	<span class="label">Customer First:</span><?= $sale['custfirst'] ?>
</div>
<div>
	<span class="label">Vehicle Make:</span><?= $sale['make_name'] ?>
</div>
<div>
	<span class="label">Vehicle Model:</span><?= $sale['model_name'] ?>
</div>
<div>
	<span class="label">Vehicle Year:</span><?= $sale['model_year'] ?>
</div>
<div>
	<span class="label">Vehicle VIN:</span><?= $sale['vin'] ?>
</div>
<div>
	<span class="label">Subtotal:</span><?= $sale['subtotal'] ?>
</div>
<div>
	<span class="label">Tax:</span><?= $sale['tax'] ?>
</div>
<div>
	<span class="label">Total:</span><?= $sale['total'] ?>
</div>
