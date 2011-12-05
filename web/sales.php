<?php
require_once('session_check.php');

require_once('page_setup.php');
$title = 'Sales';
include('page_header.php');

require_once('model.php');
$page = clean_param($conn, 'page', 1);
$perpage = clean_param($conn, 'perpage', 30);

require_once('sale_model.php');
$sales = SaleModel::GetSales(
		($page - 1) * $perpage,
		$perpage,
		array('employees', 'vehicles', 'models', 'makes'),
		array(
			'dealer_purchase_price',
			'subtotal - dealer_purchase_price AS profit',
			'employees.last_name', 'employees.first_name',
			'makes.make_name', 'models.model_name', 'vehicles.model_year'
		)
);

?>
<h1>Sales</h1>
<? if (!empty($sales)): ?>
<table class="tabular" border="1">
	<tr>
		<th>Sale Date</th>
		<th>Subtotal</th>
		<th>Dealer Purchase Price</th>
		<th>Profit</th>
		<th>Salesman</th>
		<th colspan="3">Vehicle Sold</th>
	</tr>
	<? foreach($sales as $sale): ?>
	<tr>
		<td><?= $sale['sale_date'] ?></td>
		<td class="numerical"><?= $sale['subtotal'] ?></td>
		<td class="numerical"><?= $sale['dealer_purchase_price'] ?></td>
		<td class="numerical"><?= $sale['profit'] ?></td>
		<td><?= $sale['last_name'] ?>, <?= $sale['first_name'] ?></td>
		<td><?= $sale['make_name'] ?></td>
		<td><?= $sale['model_name'] ?></td>
		<td><?= $sale['model_year'] ?></td>
	</tr>
	<? endforeach ?>
</table>
<? endif // 1+ sales ?>
<?php include('page_footer.php'); ?>
