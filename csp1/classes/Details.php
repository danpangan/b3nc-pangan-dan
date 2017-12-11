<?php

class Details {

	private $_db,
			$_data;

	public function __construct($productId = null) {

		$this->_db = DB::getInstance();

		if($productId) {

			$this->find($productId);
		}

	}

	public function find($productId = null) {
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

			if($data->count()) {
				$this->_data = $data->first();

				return true;
			}
		}
	}

	public function data() {
		return $this->_data;
	}

}