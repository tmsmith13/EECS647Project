<?php
require_once('model.php');

class SaleModel extends Model {

	public static $default_columns = array('sale_id', 'subtotal', 'total', 'commission', 'sale_date');

	public static function GetSales($start = 0, $limit = 30, $joins = array(), $additional_columns = array()) {
		$columns = self::$default_columns;
		$columns = array_merge($columns, $additional_columns);

		$options = array(
			'joins' => $joins,
			'order' => 'sale_date DESC',
			'limit' => array($start, $limit)
		);
		return parent::Select('sales', $columns, $options);
	}

	public static function GetSale($id, $joins = array(), $additional_columns = array()) {
		$columns = self::$default_columns;
		$columns = array_merge($columns, $additional_columns);

		$options = array(
			'joins'      => $joins,
			'conditions' => "sale_id = $id",
			'limit'      => 1
		);
		$result = parent::Select('sales', $columns, $options);
		return empty($result) ? null : $result[0];
	}

	public static function Insert($sale) {
		$query = "
				INSERT INTO sales (customer_id, employee_id, vehicle_id, subtotal, total, commission, sale_date)
				VALUES ({$sale['customer_id']}, {$sale['employee_id']}, {$sale['vehicle_id']}, {$sale['subtotal']}, {$sale['total']}, {$sale['commission']}, '{$sale['sale_date']}')
		";
		global $conn;
		$conn->query($query);
	}

}
