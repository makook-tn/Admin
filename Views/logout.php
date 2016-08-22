<?php
	require_once('../Modeles/session.php');
	require_once('../Modeles/class.user.php');
       
	$user_logout = new USER();
	
	if($user_logout->is_loggedin()!="")
	{
		$user_logout->redirect('Views/home.php');
	}
	if(isset($_GET['logout']) && $_GET['logout']=="true")
	{
		$user_logout->doLogout();
		$user_logout->redirect('../index.php');
	}
