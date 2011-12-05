<?php
require_once('db_config.php');

if (!isset($conn) || !$conn)
	$conn = db_connect();

class Model {

	public static function Select($from_table, $columns, $options = array()) {
		/* Prepare query variables */

		// columns
		$columns = join(',', $columns);

		// joins
		$joins = '';
		if (isset($options['joins'])) {
			$joins = self::NaturalJoins($options['joins']);
		}

		// conditions
		$conditions = '';
		if (isset($options['conditions'])) {
			$conditions = 'WHERE ' . self::Conditions($options['conditions']);
		}

		// order
		$order_by = '';
		if (isset($options['order'])) {
			$order_by = 'ORDER BY ' . $options['order'];
		}

		// start & limit
		$limit = '';
		if (isset($options['limit'])) {
			$limit = 'LIMIT ' . self::LIMIT($options['limit']);
		}

		$query = "
			SELECT $columns
			FROM $from_table
			$joins
			$conditions
			$order_by
			$limit
		";

		// results
		global $conn;

		if ($result = $conn->query($query)) {
			$rv = array();
			while ($row = $result->fetch_assoc()) {
				$rv[] = $row;
			}

			return $rv;
		}
		else {
			echo $conn->error;
			return null;
		}
	}

	public static function NaturalJoins($joins) {
		$tmp = array();
		foreach ($joins as $tablename) $tmp[] = "NATURAL JOIN $tablename";
		return join("\n", $tmp);
	}

	public static function Conditions($conditions) {
		if (!is_array($conditions))
			return $conditions;

		$tmp = array();
		foreach($conditions as $c) {
			$tmp[] = "($c)";
		}
		return join(' AND ', $tmp);
	}

	public static function Limit($limit) {
		if (is_array($limit))
			return 'LIMIT ' . join(',', $limit);
		else
			return $limit;
	}

}
