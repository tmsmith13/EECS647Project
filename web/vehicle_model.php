<?php
require_once('model.php');

class VehicleModel extends Model {

	public static $default_columns = array('vehicle_id', 'model_year', 'model_id');

	public static function GetVehicles($start = 0, $limit = 30, $joins = array(), $additional_columns = array()) {
		$columns = self::$default_columns;
		$columns = array_merge($columns, $additional_columns);

		$options = array(
			'joins' => $joins,
			'limit' => array($start, $limit)
		);
		return parent::Select('vehicles', $columns, $options);
	}

}
