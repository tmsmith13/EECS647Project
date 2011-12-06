<?php
require_once('model.php');

class LocationModel extends Model {

	public static $default_columns = array('zip', 'city', 'state');

	public static function Insert($zip, $city, $state) {
		$query = "
				INSERT INTO locations (zip, city, state)
				VALUES ($zip, '$city', '$state')
		";
		global $conn;
		$conn->query($query);
	}

}
