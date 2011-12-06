<div class ="search_form">
	<h1>Search Sales Database</h1>
	<div id="contact_form" class="gapbelow">
		<form id="sales_form" method="post" action="<?= $app_path ?>sale.php">

				<label  id="sales_id">Sales ID</label>
				<input type="text" id="sales_id" name="sales_id" size="30" value="" class="text-input" />

				<br />
				<input type="submit" name="submit" class="button" id="submit_btn" value="Search" />

		</form>
	</div>

	<h1>Search Employee</h1>
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
