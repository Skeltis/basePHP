<?php

class UserSession
{
	function __construct() {
		if (empty($_SESSION)) {
			$_SESSION['userlevel'] = 'guest';
		}
	}

	public function __set($name, $value) {
		switch($name) {
			case 'Message':
				$_SESSION['msg'] = $value;
		}
	}

	public function __get($name) {
		switch($name) {
			case 'Message':
				return $_SESSION['msg'];
			case 'UserName':
				return $_SESSION['username'];
			case 'EMail':
				return $_SESSION['email'];
			case 'UserLevel':
				return $_SESSION['userlevel'];
		}
	}

	public function echoMessage() {
		if ($_SESSION['msg']){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	}

	public function Authentificate($dprovider, $userInfo, $salt = '') {
		if (!$dprovider->checkIfRecordExists('username', $userInfo['username'])) {
			$this->Message = "User {$userInfo['username']} doesn't exist!";
		} else {
			$user = $dprovider->getItemsByField('username', $userInfo['username'])[0];
			if (md5(md5($userInfo['password']) . $salt) == $user['password']) {
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['userlevel'] = 'user';
			} else {
				$this->Message = "Incorrect pair login/password!";
			}
		}
	}

	public function Register($dprovider, $userInfo, $salt = '') {
		if (!$dprovider->checkIfRecordExists('username', $_POST['username'])) {
			$dprovider->addItem([
				'username' => $userInfo['username'],
				'password' => md5(md5($userInfo['password']) . $salt),
				'email' => $userInfo['email']
			]);

			if ($dprovider->checkIfRecordExists('username', $_POST['username'])) {
				$this->Message = "Congratulations, {$userInfo['username']}, you was registered!";
			} else {
				$this->Message = "We are sorry, {$userInfo['username']}, something gone wrong";
			}
		} else {
			$this->Message = 'The user is already exists!';
		}
	}

	public function LogOut() {
		session_destroy();
		$this->__construct();
	}
}