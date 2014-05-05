<?php
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if($db->connect_errno){
	$feedback[] = 'Не удалось подключиться к серверу! '.$db->connect_error.'<br />';
} else {
	$feedback[] = 'Connected to Databases Server...<br />';
}