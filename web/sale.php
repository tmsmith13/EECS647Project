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

<div id ="sales_result_table">

	<table id="salesT" border="2" text-align="center">	
		<tr>
			<td colspan="2" style="background-color:#616D7E"><b>Sale ID: <?= $sale['sale_id'] ?></td>
		</tr>
	
		<tr>
			<td><b>Sale Date:</b></td> 
			<td><?= $sale['sale_date'] ?></td>
		</tr>
		
		<tr>
			<td><b>Customer Last:</b></td> 
			<td><?= $sale['custlast'] ?></td>
		</tr>

		<tr>
			<td><b>Customer First:</b></td> 
			<td><?= $sale['custfirst'] ?></td>
		</tr>

		<tr>
			<td><b>Vehicle Make:</b></td> 
			<td><?= $sale['make_name'] ?></td>
		</tr>
		
		<tr>
			<td><b>Vehicle Model:</b></td> 
			<td><?= $sale['model_name'] ?></td>
		</tr>
		
		<tr>
			<td><b>Vehicle Year:</b></td> 
			<td><?= $sale['model_year'] ?></td>
		</tr>
		
		<tr>
			<td><b>Vehicle VIN:</b></td> 
			<td><?= $sale['vin'] ?></td>
		</tr>
		
		<tr>
			<td><b>Subtotal:</b></td> 
			<td><?= $sale['subtotal'] ?></td>
		</tr>

		<tr>
			<td><b>Tax:</b></td> 
			<td><?= $sale['tax'] ?></td>
		</tr>
		
		<tr>
			<td><b>Total:</b></td> 
			<td><?= $sale['total'] ?></td>
		</tr>
	</table>
</div>
