<?php 
// if($_SESSION['login'])
// 	header('Location: control/chat.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Chat</title>
	<link type="text/css" rel="stylesheet" href="public/css/main.css" />
	<script type="text/javascript" src="scripts/js/jquery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){

/*При клике по кнопки регистрации появляется блок на весь экран с формой*/
			$('#btn_authorization').on('click', function(){
				$('#div_authorization').css({
					"display": "block"
				 }).animate({
				 	"opacity": "0.9"
				 }), 2000;

			/*$('#btn_authorization').on('click', function(){
				$('#div_authorization').css({
					"display": "block"
				 }).animate({
				 	"opacity": "0.9"
				 }), 2000;
			});*/




/*Если блок видимый, при клике по нему, но не по форме, скрывать его (магия)*/
				if($('#div_authorization').is(":visible")){
					$('#div_authorization').click(function(event){
						if($(event.target).closest('#form_auth').length === 0){
							$('#div_authorization').css({
									"display": "none",
									"opacity": "0"
							});
						}
					});
				}

			});

		});
	</script>

</head>
<header>
	<p><a href="?">Online Chat</a></p>
	<ul>
		<li id="btn_registration"><a href="?act=registration">Регистрация</a></li>
		<li id="btn_authorization"><a href="#">Вход</a></li>
	</ul>
</header>
<body>
	<div id="div_authorization">
		<form action="?act=login" method="post" id="form_auth">
			<!-- <h1>Регистрация</h1>
			<label>Login: <input type="text" name="login" placeholder="login"></label>
			<label>Password: <input type="password" name="password" placeholder="password"></label>
			<img src="includes/functions/noise_image.php">
			<label>Enter the string: <input type="text" name="str"></label>
			<input type="submit" value="Регистрация"> -->

			<h1>Авторизация</h1>
			<label>Логин: <input type="text" name="login" placeholder="Ваш логин"></label>
			<label>Пароль: <input type="password" name="password" placeholder="Ваш пароль"></label>
			<input type="submit" value="Вход">

		</form>
	</div>
	<div class="container">
		<p>Авторизуйтесь, чтобы оставлять сообщения</p>
		<!-- <div id="input">
			<div id="feedback"></div>
			<form action="" method="post" id="form_input">
				<lable>Name: <input placeholder="name" type="text" name="sender" id="sender" /></lable>
				<br/><lable>Message:<br/> <textarea placeholder="Your message" id="message" cols="28" rows="4"></textarea></lable>
				<input type="submit" name="send" value="Send Message" id="send" />
			</form>
		</div> -->
		<p id=""></p>
		<div id="messages">
		
		</div>
	</div>

	<script type="text/javascript" src="scripts/js/auto_chat.js"></script>
	<script type="text/javascript" src="scripts/js/send.js"></script>
</body>
</html>