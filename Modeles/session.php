<?php

	session_start();
	
	require_once 'class.user.php';
        require_once 'autoloader.php';
	$session = new USER();
	if(!$session->is_loggedin())
	{
		
		$session->redirect('../index.php');
	}