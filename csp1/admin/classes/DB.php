<?php

class DB {


	private static $_instance = null;
	private $_pdo,
		    $_query,
		    $_error = false,
		    $_results,
		    $_count = 0;

	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname='. Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	} 

	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DB();
		}
		return self::$_instance;
	}

	public function query($sql, $params = array()) {
		$this->_error = false;

		if(!is_null($params)) {

			if($this->_query = $this->_pdo->prepare($sql)) {
				$x = 1;
				if(count($params)) {
					foreach($params as $param) {
						$this->_query->bindValue($x, $param);
						$x++;
					}

					if($this->_query->execute()) {
						$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
						$this->_count = $this->_query->rowCount();

					} else {
						$this->_error = true;
					}
				}

			}

		} else {

			if($this->_query = $this->_pdo->prepare($sql)) {

				if($this->_query->execute()) {
						$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();

				} else {
					$this->_error = true;
				}

			}
		}

		

		return $this;
	}

	private function action($action, $table, $where = array(), $join = array()) {
		$joinCount = count($join);
		$whereCount = count($where);
		$joinString = "";


		if(count($where) === 3) {
			$operators = array('=', '<', '>', '<=', '>=', '!=');

			$field 		= $where[0]; 
			$operator 	= $where[1];
			$value 		= $where[2];

			if($joinCount > 0)  {

				$joinString = "";
				$joinTable = "";
				$joinColumn = "";

				$x=0;
				for ($x=0; $x<$joinCount; $x++) {
					if($x%2 == 0) {
						$joinTable = $join[$x];

						$joinString .= " LEFT JOIN " . $joinTable;
					} else {
						$joinColumn = $join[$x];

						$joinString .= " ON " . $table . "." . $joinColumn . " = " . $joinTable . "." . $joinColumn;

					}
				}
			}

			if(in_array($operator, $operators)) {
				$sql = "{$action} FROM {$table} {$joinString} WHERE {$field} {$operator} ?";

				if(!$this->query($sql, array($value))->error()) {
					return $this;
				}
			}

		} else {

			$sql = "{$action} FROM {$table}";

			if(!$this->query($sql, null)->error()) {
				return $this;
			}
		}

		return false; 
	}

	public function get($table, $where, $join) {
		return $this->action('SELECT *', $table, $where, $join);
	}

	public function delete($table, $where) {
		return $this->action('DELETE', $table, $where);
	}

	public function insert($table, $fields = array()) {
		if(count($fields)) {

			$keys = array_keys($fields);
			$values = '';
			$x = 1;

			foreach($fields as $field) {
				$values .= '?';

				if($x < count($fields)) {
					$values .= ', '; 
				}
				$x++;
			}

			$sql = "INSERT INTO {$table} (`" . implode('`,`', $keys) . "`) VALUES ({$values})";

			if(!$this->query($sql, $fields)->error()) {	
				return true;
			}
		}

		return false;
	}

	public function update($table, $id, $fields) {
		$set = '';
		$x = 1;

		foreach($fields as $name => $value) {

			$set .= "{$name} = ?";

			if($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE iId = {$id}";
		if(!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function results() {
		return $this->_results;
	}

	public function first($index = 0) {
		return $this->results()[$index];
	}

	public function error() {
		return $this->_error = true;
	}

	public function count() {
		return $this->_count;
	}
}