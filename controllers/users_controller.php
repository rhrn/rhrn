<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Email');

	function beforeFilter() {
		parent::beforeFilter();
	}

	function login() {}

	function register() {
		if (!empty($this->data)) {
			$pass = $this->User->genPass();
			$this->data['User']['passwd'] = $this->Auth->password($pass);
			if ($data = $this->User->register($this->data)) {
				$this->Email->template = 'register';
				$this->Email->to = $this->data['User']['email'];
				$this->Email->from = 'Mayhem Project <noreply@mayhem.rhrn.locum.ru>';
				$this->Email->subject = 'регистрация';
				$this->Email->sendAs = 'both';
				$data['pass'] = $pass;
				$this->set($data);
				var_dump($this->Email->send());
			}
		}
	}

	function logout() {
		$this->redirect($this->Auth->logout());
	}
}
