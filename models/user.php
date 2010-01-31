<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'email';
	var $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'рельни контактни мейл?',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'вы уже зареганы?'
			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'user_id' => array(
			'className' => 'Items',
			'foreignKey' => 'id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	function register($data) {
		if (!empty($data['User']['email'])) {
			$this->set($data);
			if ($this->validates()) {
				$data['User']['uuid'] = String::uuid();	
				if ($this->save($data, false)) {
					$data['User']['id'] = $this->id;
					return $data;
				}
			}
		}
		return false;
	}

	function genPass() {
		srand((double)microtime()*1000000);
		$chars = 'qwertyuiopasdfghjklzxcvbnm';
		$pass = '';
		for ($i = 0; $i < 5; $i++) {
			$num = rand() % 26;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
		}

		return $pass . rand(00, 99);
	}

}
?>
