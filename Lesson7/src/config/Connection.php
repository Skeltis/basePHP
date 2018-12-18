<?php

class Connection
{
	private $_ip_addr;
	private $_dataBase;
	private $_credentials;

	private $_link;

	function __construct($ip_addr, $dataBase, $username, $password) {
		$this->_ip_addr = $ip_addr;
		$this->_dataBase = $dataBase;
		$this->_credentials = new class($username, $password) {
			public $login;
			public $password;

			function __construct($login, $password) {
				$this->login = $login;
				$this->password = $password;
			}
		};
	}

	public function getConnection() {
		if (empty($this->_link)){
			$this->_link = mysqli_connect(
				$this->_ip_addr,
				$this->_credentials->login,
				$this->_credentials->password,
				$this->_dataBase
			);
		}
		return $this->_link;
	}

	public function sendQuery($query) {
		return mysqli_query($this->getConnection(), $query);
	}

	public function closeConnection() {

	}
}