<?php
	require('../../includes/database/connect.db.php');
	require('../../includes/functions/chat.func.php');

	$messages = get_msg();

	foreach($messages as $message){
		echo '<div class="msg-wrap">';
			echo '<p class="snd"><strong>'.$message['sender'].' Отправил: </strong></p>';
			echo '<p class="msg">'.$message['message'].'</p>';
		echo '</div>';
	}