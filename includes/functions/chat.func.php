<?php

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