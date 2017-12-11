<?php

class Products {

	private $_db,
			$_data;

	public function __construct($productId = null) {

		$this->_db = DB::getInstance();
		$this->search();



		if($productId) {

			$this->find($productId);
		}

	}

	public function search($productId = null) {
		if($productId) {

			$data = $this->_db;
			$data->get('products', array('iProductId', '=', $productId), array(
				'family',
				'iFamilyId',
				'subfamily',
				'iSubfamilyId',
				'tribe',
				'iTribeId',
				'subtribe',
				'iSubtribeId',
				'genus',
				'iGenusId'
			));

			
		} else {

			$data = $this->_db;
			$data->get('products', null, array(
				'family',
				'iFamilyId',
				'subfamily',
				'iSubfamilyId',
				'tribe',
				'iTribeId',
				'subtribe',
				'iSubtribeId',
				'genus',
				'iGenusId'
			));
		}

		if($data->count()) {
			$this->_data = $data->results();

			return true;
		}
	}

	public function data($product = array()) {
		return $this->_data;
	}

}