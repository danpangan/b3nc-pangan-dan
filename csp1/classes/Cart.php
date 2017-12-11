<?php

class Cart {

	private $_db,
			$_data,
			$_sessionName;

	public function __construct($action = null, $productId = null) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Session::get('user');
	
		if($productId) {
				
			if($action) {

				if($this->find($productId)) {
					
					$this->delete($productId);

				}

			} else {
					
				if($this->find($productId)) {
					$this->update($productId, $this->data()->iQty);
				} else {
					$this->insert($productId);
				}
			}

		}
	}

	private function find($productId = null) {
		if($productId) {

			$data = $this->_db;
			$data->get('cart', array(
				'iProductId', '=', $productId,
				'tTransactionId', '=', $this->_sessionName
			), null);

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}

			
		}

		return false;
	}

	private function insert($productId = null) {
		if($productId) {

			$data = $this->_db;
			$data->insert('cart', array(
				'tTransactionId' => $this->_sessionName,
				'iProductId' => $productId
			)); 

		}
	}

	private function update($productId = null, $qty = null) {
		if($productId) {
			
			$qty = $qty + 1;

			$data = $this->_db;
			$data->update('cart', array(
				'iProductId', '=', $productId,
				'tTransactionId', '=', $this->_sessionName
			), array(
				'iQty' => $qty 
			));
		}
	}

	private function delete($productId) {
		if($productId) {

			$data = $this->_db;
			$data->delete('cart', array(
				'iProductId', '=', $productId,
				'tTransactionId', '=', $this->_sessionName
			));
		}
	}

	public function data() {
		return $this->_data;
	}
}