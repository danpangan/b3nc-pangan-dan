<?php

class Products {
	
	private $_db,
			$_data;

	public function __construct() {

		$this->_db = DB::getInstance();
		$this->search();
	}

	public function search() {

		$data = $this->_db;

		$data->get('products', array(), null);
		if($data->count()) {
			$this->_data = $data->results();
			return true;

			
		}
	}
	public function data($product = array()) {
		return $this->_data;
	}

}