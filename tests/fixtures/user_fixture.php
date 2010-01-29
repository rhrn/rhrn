<?php
/* User Fixture generated on: 2010-01-28 22:01:01 : 1264708021 */
class UserFixture extends CakeTestFixture {
	var $name = 'User';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'passwd' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 40),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'passwd' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>