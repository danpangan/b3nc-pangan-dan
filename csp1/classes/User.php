<?php

class User {
	private $_db,
			$_data,
			$_sessionName, 
			$_cookieName, 
			$_isLoggedIn;

	public function __construct($user = null) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$user) {
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					//process logout
				}
			}
		} else {
			$this->find($user);
		}
	}

	public function update($fields = array(), $id = null) {

		if(!$id && $this->isLoggedIn()) {
			$id = $this->data()->iId;
		}

		$this->_db->update('users', $id, $fields);
 
		/*if(!$this->_db->update('users', $id, $fields)) {
			throw new Exception('There was a problem updating');
		}*/
	}

	public function create($fields = array()) {
		$this->_db->insert('users', $fields);

		/*if(!$this->_db->insert('users', $fields)) {
			throw new Exception('There was a problem creating an account.');
		}*/
	}

	public function find($user = null) {
		if($user) {
			$field = (is_numeric($user)) ? 'iId' : 'vUsername';
			$data = $this->_db;
			$data->get('users', array($field, '=', $user));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}

		return false;
	}

	public function login($username = null, $password = null, $remember = null) {
		$user = $this->find($username);

		if(!$username && !$password && $this->exists()) {

			Session::put($this->_sessionName, $this->data()->iId);

		} else {

			if($user) {
				if($this->data()->vPassword === Hash::make($password, $this->data()->vSalt)) {
					Session::put($this->_sessionName, $this->data()->iId);

					if($remember) {
						$hash = Hash::unique();
						$hashCheck = $this->_db;
						$hashCheck->get('user_session', array('iUserId','=', $this->data()->iId));

						if(!$hashCheck->count()) {
							$this->_db->insert('user_session', array(
								'iUserId' => $this->data()->iId,
								'tHash' => $hash
							));
						} else {
							$hash = $hashCheck->first()->tHash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
			}
		}	

		return false;
	}

	public function hasPermission($key) {
		$group = $this->_db->get('groups', array('iId', '=', $this->data()->group));
	}

	public function exists() {
		return (!empty($this->_data)) ? true : false;
	}

	public function logout() {

		$this->_db->delete('user_session', array('iUserId', '=', $this->data()->iId));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data() {
		return $this->_data;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}
}