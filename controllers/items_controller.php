<?php
class ItemsController extends AppController {

	var $name = 'Items';
	//var $componets = array('Auth', 'Session');
	var $helpers = array('Form', 'Html');


	function beforeFilter() {
		pr ($this->Auth->user());
		parent::beforeFilter();
		$this->Auth->authorize = 'controller';
	}

	function isAuthorized() {
		if ($this->Auth->user('role') != 'admin') {
			return false;
		}
		return true;
	}

	function index() {
		$data['items'] = $this->Item->find('all');
		$this->set($data);
	}

	function add($id = null) {
		$uid = $this->Auth->user('id');

		//pr ($this->data);

		if (!empty($this->data)) {
			$savedID = $this->Item->saveItem($this->data, $uid);
			if ($savedID) {
				$link = '<a href="/items/add/">new one</a>';
				$this->Session->setFlash('saved ' . $link);
				$this->redirect('/items/add/' . $savedID);
			}
		}

		if ($id) {
			$this->data = $this->Item->findById($id);
		}
	}
}
