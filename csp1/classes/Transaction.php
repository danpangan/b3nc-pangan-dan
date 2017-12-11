<?php

class Transaction {
	private $_db,
			$_data,
			$_sessionName;

	public function __construct() {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');

		if(Session::exists($this->_sessionName)) {
			$this->find();
		}
	}

	private function find() {

		if(Session::exists($this->_sessionName)) {
			$data = $this->_db;
			$data->get('cart', array(
				'tTransactionId', '=', Session::get($this->_sessionName)
			), array(
				'products',
				'iProductId'
			));

			if($data->count()) {
				$this->_data = $data->results();
				return true;
			}
		}

		return false;
	}

	public function data($transaction = array()) {
		return $this->_data;
	}
}