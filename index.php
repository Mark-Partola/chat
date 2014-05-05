<?php
header('Content-type: text/html; charset=utf-8');
require('includes/core.inc.php');
require('includes/functions/chat.func.php');

$act = isset($_GET['act']) ? $_GET['act'] : 'guest';
switch ($act) {
	case 'guest':
		require ('templates/guest.php');
		break;
	case 'registration':
		$dataReg = checkRegForm();
		if($dataReg){
		 	if(createNewUser($login, $password)){
		 		echo "Создан";
		 	}else{
		 		echo "Ошибка";
		 	}
		 }else{
			echo "Не все поля!";
		}
		break;
	case 'login':
		require ('login.php');
		break;
	default:
}