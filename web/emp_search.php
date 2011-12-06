<?php
require_once('session_check.php');
include('db_config.php');


$link = db_mysql_connect();

$e_id = mysql_real_escape_string($_POST['e_id']);

$result = mysql_query("SELECT * FROM employees WHERE employee_id = $e_id LIMIT 1");

if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$employee = mysql_fetch_assoc($result);
?>

<div id ="employee_result_table">

	<div id="img" padding:"20px";>
		<center><img src="images/<?= $employee['first_name'] ?>.png" border="5" alt="<?= $employee['first_name'] ?>"/> </center>
	</div>
	
	<div id="e_data">
		<table id="employee" border="2" text-align="center">		
		
			<tr>
				<td colspan="2" style="background-color:#616D7E"><b><?= $employee['first_name']." ".$employee['first_name']?></td>
			</tr>
		
			<tr>
				<td><b>Employee ID:</b></td> 
				<td><?= $employee['employee_id'] ?></td>
			</tr>
			
			<tr>
				<td><b>First Name:</b></td> 
				<td><?= $employee['first_name'] ?></td>
			</tr>

			<tr>
				<td><b>Last Name:</b></td> 
				<td><?= $employee['last_name'] ?></td>
			</tr>
			<!--
			<tr>
				<td><b>SSN:</b></td> 
				<td><?= $employee['ssn'] ?></td>
			</tr>
			-->
			<tr>
				<td><b>DOB:</b></td> 
				<td><?= $employee['date_of_birth'] ?></td>
			</tr>
			
			<tr>
				<td><b>Email:</b></td> 
				<td><?= $employee['email'] ?></td>
			</tr>
			
			<tr>
				<td><b>Street:</b></td> 
				<td><?= $employee['street'] ?></td>
			</tr>

			<tr>
				<td><b>Zip Code:</b></td> 
				<td><?= $employee['zip'] ?></td>
			</tr>
			
			<tr>
				<td><b>Phone Number:</b></td> 
				<td><?= $employee['phone_number'] ?></td>
			</tr>
		</table>
	</div>
	
</div>