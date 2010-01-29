<?php
    $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('email', array('label'=>'email'));
    echo $form->input('passwd', array('label'=>'password'));
    echo $form->end('Login');
?>
