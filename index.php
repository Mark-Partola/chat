<?php
header('Content-type: text/html; charset=utf-8');
require('includes/core.inc.php');
require('includes/functions/chat.func.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Chat</title>
	<link type="text/css" rel="stylesheet" href="public/css/main.css" />
</head>
<header>
	<p>Online Chat</p>
</header>
<body>
	<div class="container">
		<div id="input">
			<div id="feedback"></div>
			<form action="" method="post" id="form_input">
				<lable>Name: <input placeholder="name" type="text" name="sender" id="sender" /></lable>
				<br/><lable>Message:<br/> <textarea placeholder="Your message" id="message" cols="28" rows="4"></textarea></lable>
				<input type="submit" name="send" value="Send Message" id="send" />
			</form>
		</div>

		<div id="messages">
		
		</div>
	</div>

	<script type="text/javascript" src="scripts/js/jquery.js"></script>
	<script type="text/javascript" src="scripts/js/auto_chat.js"></script>
	<script type="text/javascript" src="scripts/js/send.js"></script>
</body>
</html>