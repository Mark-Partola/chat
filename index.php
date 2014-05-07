<?php
require('includes/core.inc.php');
require('includes/functions/chat.func.php');

$act = isset($_GET['act']) ? $_GET['act'] : 'guest';

switch ($act) {

	case 'guest':
		require ('templates/guest.php');
		break;

	case 'registration':
		require('templates/registration.php');
		break;

	case 'login':
		if(checkFormLogin()){
			header('Location: control/chat.php');
			
		}else{
			header('Location: index.php');
		}
		break;

	default:
		require('templates/errors/404.php');
}