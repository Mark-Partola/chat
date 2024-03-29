<?php

function clearStr($string){
	return trim(strip_tags($string));
}

function get_msg(){
	global $db;

	$query = "SELECT sender, message
				 FROM chat
				 ORDER BY mgs_ID DESC";

	// if(method_exists($db, 'getInfo')){
	// 	return $db->get_msg();
	// }
	$result = $db->query($query);

	$messages = array();
	while($message = $result->fetch_assoc()){
		$messages[] = array('sender'=>$message['sender'],
							'message'=>$message['message']);
	}

	return $messages;
}

function send_msg($sender, $message){
	global $db;

	if(!empty($sender) && !empty($message)){
		$sender = $db->real_escape_string($sender);
		$message = $db->real_escape_string($message);

		$query = "INSERT INTO chat
					VALUES (null, '{$sender}', '$message')";

		if($result = $db->query($query)){
			//header('Location: index.php');
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function checkCaptcha(){
	if(isset($_POST['str'])){
		$str = trim(strip_tags($_POST['str']));
	}else{
		return false;
	}
	if(isset($_SESSION['randStr'])){
		$randStr = $_SESSION['randStr'];
		if($randStr === $str){
			return true;
		}else{
			return false;
		}
	}

}

function checkRegForm(){
	global $db;
	$dataReg = array();

	if(strlen(clearStr($_POST['login'])) > 6){
		$login = clearStr($_POST['login']);
	}else{
		$login = false;
	}

	if(strlen(clearStr($_POST['password'])) > 6){
		$password = md5(clearStr($_POST['password']));
	}else{
		$password = false;
	}

	if($login && $password){
		echo "Creating...";
		
		$sql = "SELECT user_ID FROM users WHERE login = '$login'";
		$result = $db->query($sql);
		
		if(!$result) $feedback[] = "Ошибка базы данных";

		$check = $result->fetch_assoc();

		if(isset($check['user_ID'])){
			$feedback[] = "Логин уже занят";
			header("Location: index.php");
		}
		else{ 
			$dataReg['login'] = $login;
			$dataReg['password'] = $password;
			return $dataReg;
		}
	}else{
		return false;
	}

}

function createNewUser($login, $password, $role = 5){
	global $db;

	if (!empty($login) && !empty($password)){
		$sql = "INSERT INTO users(login, password, role) VALUES(?,?,?)";
		$result = $db->prepare($sql);
		$result->bind_param('ssi', $login, $password, $role);

		if($result->execute()){
			echo "New user created!";
			return true;
		}else
			echo "New user don't created!";
			return false;

	}
}

function checkFormLogin(){
	global $db;

	$login = clearStr($_POST['login']);
	$password = (clearStr($_POST['password']));

	$sql = "SELECT user_ID FROM users 
				WHERE login = '$login' and password = '$password'";

	$result = $db->query($sql);

	if(!$result){ 
		// $feedback[] = 'Ошибка при выборке пароля и логина!';
		echo 'Ошибка при выборке пароля и логина!';
		return false;
	}

	$check = $result->fetch_assoc();
	var_dump($check);

	if($check['user_ID']) {
		$_SESSION['login'] = true;
		// $_SESSION['role'] = 5;
		return true;
	}
	else
		return false;


}
