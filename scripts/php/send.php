<?php
	require('../../includes/database/connect.db.php');
	require('../../includes/functions/chat.func.php');

	/*if(isset($_POST['send'])){ //clear
	if(send_msg($_POST['sender'],$_POST['message'])){
		echo 'Message Sent.';
	} else {
		echo 'Message Failed to sent.';
	}*/

	if(isset($_GET['sender']) && !empty($_GET['sender'])) {
		$sender = strip_tags($_GET['sender']);

		if(isset($_GET['message']) && !empty($_GET['message'])){
			$message = strip_tags($_GET['message']);

			if(send_msg($sender, $message)){
				echo 'Message sant.';
			} else {
				echo '<p style="color:#f44 !important">Message wasn\'t sant.</p>';
			}

		} else {
			echo 'No Message was entered!';
		}
	} else {
		echo '<p style="color:#f44 !important">No Name was entered!</p>';
	}