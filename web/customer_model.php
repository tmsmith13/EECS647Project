<?php
require_once('model.php');

class CustomerModel extends Model {

	public static $default_columns = array('customer_id', 'first_name', 'last_name');

	public static function GetCustomers($start = 0, $limit = 30, $joins = array(), $additional_columns = array()) {
		$columns = self::$default_columns;
		$columns = array_merge($columns, $additional_columns);

		$options = array(
			'joins' => $joins,
			'limit' => array($start, $limit)
		);
		return parent::Select('customers', $columns, $options);
	}
	
	public static function Insert($customer) {
		$query = "
				INSERT INTO customers (first_name, last_name, date_of_birth, street, zip, phone_number)
				VALUES ('{$customer['first_name']}', '{$customer['last_name']}', '{$customer['date_of_birth']}', '{$customer['street']}', {$customer['zip']}, '{$customer['phone_number']}')
		";
		global $conn;
		$conn->query($query);
	}

}
