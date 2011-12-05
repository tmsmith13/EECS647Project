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
			$joins = array();
			foreach ($options['joins'] as $tablename) $joins[] = "NATURAL JOIN $tablename";
			$joins = join("\n", $joins);
		}

		// order
		$order_by = '';
		if (isset($options['order'])) {
			$order_by = 'ORDER BY ' . $options['order'];
		}

		// start & limit
		$limit = '';
		if (isset($options['limit'])) {
			$limit = 'LIMIT ';
			$o_limit = $options['limit'];
			if (is_array($o_limit))
				$limit .= join(',', $o_limit);
			else
				$limit .= $o_limit;
		}

		$query = "
			SELECT $columns
			FROM $from_table
			$joins
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

}
