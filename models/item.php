<?php
class Item extends AppModel {
	var $name = 'Item';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'нaпиши что нить здесь'
		),
		'desc' => array(
			'rule' => 'notEmpty',
			'message' => 'а как же описание?'
		),
		'link' => array(
			'rule' => 'notEmpty',
			'message' => 'даёшь линку с ценой!'
		),
	);

	var $hasMany = array(
		'Image' => array(
			'className' => 'Image',
			'foreignKey' => 'item_id',
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

	function saveItem($data, $uid) {
		$return = false;
		if (!isset($data['Item']['id'])) {
			$data['Item']['user_id'] = $uid;
		}

		$this->save($data['Item']);

		if ($this->id) {

			if ($this->id && !empty($data['Image'])) {
				$this->Image->saveImage($data['Image'], $uid, $this->id);
			}

			$return = $this->id;
		}
		return $return;
	}

}
