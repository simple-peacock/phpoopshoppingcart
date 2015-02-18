<?php

namespace SimplePeacock;

/*
 *
 * Database abstraction class
 *
 */

class DB {

	private static $_instance = null; // store an instance of our database

	private $_pdo,
					$_query,
					$_error = false,
					$_results,
					$_count = 0;



	/*
	 *
	 * Constructor function
	 *
	 */

	private function __construct() {

			try {
				$this->_pdo = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USERNAME, PASSWORD);

		} catch(PDOException $e) {

			die($e->getMessage());

		}
	}


	/*
	 *
	 * getInstance() function
	 *
	 * check if we have already instantiated our object (and therefore connected)
	 * if instantiated return our instance
	 * avoid connecting more than once
	 *
	 */

	public static function getInstance() {

		if(!isset(self::$_instance)) {

			self::$_instance = new DB();

		}

		return self::$_instance;
	}



	/*
	 *
	 * query() function
	 *
	 *
	 */

	public function query($sql, $params = array()) {

		$this->_error = false; // we don't want to return an error from a previous query

		// check if we have a valid query
		if($this->_query = $this ->_pdo->prepare($sql)) {

			// check there parameters that we will bind
			$x = 1;

			if(count($params)) {

				foreach($params as $param) {

					$this->_query->bindValue($x, $param);
					$x++;

				}
			}

			// execute the query regardless if there are any paramaters
			if($this->_query->execute()) {

				$this->_results = $this->_query->fetchAll(\PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();

			} else {

				$this->_error = true;

			}
		}

		return $this; // allows us to chain on error() method
	}




	/*
	 *
	 * action() function
	 *
	 */

	public function action($action, $table, $where = array()) {

		if(count($where) === 3) {  //need field, operator, value

			$operators = array('=', '>', '<', '>=', '<='); // set allowed operators

			$field 		= $where[0];
			$operator 	= $where[1];
			$value 		= $where[2];

			if(in_array($operator, $operators)) { // check if operator is allowed

				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

				if(!$this->query($sql, array($value))->error()) {

					return $this;

				}
			}
		}

		return false;
	}




	/*
	 *
	 * get() function
	 *
	 */

	public function get($table, $where) {

		return $this->action('SELECT *', $table, $where);

	}



	/*
	 *
	 * delete() function
	 *
	 */

	public function delete($table, $where) {

		return $this->action('DELETE', $table, $where);

	}




	/*
	 *
	 * insert() function
	 *
	 */

	public function insert($table, $fields = array()) {

		$keys = array_keys($fields);
		$values = "";
		$x = 1;

		foreach($fields as $field) {

			$values .= "?";

			if($x < count($fields)) {

				$values .= ", ";

			}

			$x++;
		}

		$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) .  "`) VALUES ({$values})"; // INSERT INTO users (`username`, `password`, `salt`) VALUES (?, ?, ?)

		// perform the query
		if(!$this->query($sql, $fields)->error()) {

			echo "success";

			return true;
		}

		return false;
	}




	/*
	 *
	 * update() function
	 *
	 */

	public function update($table, $id, $fields) {

		$set = "";
		$x = 1;

		foreach($fields as $name => $value) {

			$set .= "{$name} = ?";

			if($x < count($fields)) {

				$set .= ", ";

			}

			$x++;

		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		// perform the query
		if(!$this->query($sql, $fields)->error()) {

			return true;
		}

		return false;
	}



	public function results() {

		return $this->_results;

	}



	public function first() {

		return $this->results()[0]; // need newer PHP version for this

	}



	public function error() {

		return $this->_error;

	}



	// count of results (if any) returned
	public function count() {

		return $this->_count;

	}
}
