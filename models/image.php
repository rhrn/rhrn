<?php
class Image extends AppModel {
	var $name = 'Image';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	function saveImage($data, $uid, $itemID) {

		$imgDir = WWW_ROOT . DS . 'files' . DS . 'img' . DS . $itemID . DS;
		if (!file_exists($imgDir)) {
			mkdir($imgDir);
		}

		if (!empty($data['imglink'])) {
			foreach ($data['imglink'] as $k => $v) {
				$this->_saveImg($v, $uid, $itemID, $imgDir);
			}
		}

		if (!empty($data['file'])) {
			foreach ($data['file'] as $k => $v) {
				$this->_saveImg($v['tmp_name'], $uid, $itemID, $imgDir);
			}
		}
	}

	function _saveImg($path, $uid, $itemID, $imgDir) {
		if (!empty($path)) {
			$info = getimagesize($path); //pr ($info);
			if (!empty($info['mime'])) {
				$ext = $this->getExt($info['mime']);

				if ($ext) {
					$img['type']	= $info['mime'];
					$img['created']	= date('Y-m-d H:i:s');
					$img['hash']	= md5($itemID . rand(0, 99999) . $img['created']);
					$img['name'] 	= $img['hash'] . '.' . $ext;
					$img['item_id']	= $itemID;
					$img['user_id']	= $uid; //pr ($img);

					if (@copy($path, $imgDir . $img['name'])) {
						$this->create();
						$this->save($img);
					}
				}
			}
		}
	}

	function getExt($mime) {
		$types = $this->types();

		if (isset($types[$mime])) {
			return $types[$mime]['ext'];
		}

		return '';
	}

	function types() {
		$types = array(
			'image/jpeg'	=> array('ext'=>'jpg'),
			'image/pjpeg'	=> array('ext'=>'jpg'),
			'image/png'	=> array('ext'=>'png'),
			'image/x-png'	=> array('ext'=>'png'),
			'image/gif'	=> array('ext'=>'gif')
		);

		return $types;
	}
}
