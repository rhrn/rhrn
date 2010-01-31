<?php
class AppController extends Controller {

        var $components = array('Auth', 'Session');

        function beforeFilter() {
                //Security::setHash('md5');
                Configure::write('Config.language', 'ru');

		$this->Auth->loginError = "somthing wrong";
		$this->Auth->authError = "T_T";
		$this->Auth->logoutRedirect = '/';
		$this->Auth->fields = array(
			'username' => 'email',
			'password' => 'passwd'
		);

		//$this->Auth->authorize = 'controller';
                $this->Auth->allow('*');

                if ($user = $this->Auth->user()) {
                        $uid    = $user['User']['id'];
                        $login  = $user['User']['email'];
                        $this->set('User', $login);
                }
        }

}
