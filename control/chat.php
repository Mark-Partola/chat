<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>

<body>

<h1>Страница авторизованного пользователя</h1>
<form action="" method="GET">
	<input type="submit" value="Logout" name="logout">
</form>
<?
	if($_GET['logout']){
		$_SESSION['login'] = false;
		header('Location: ../index.php');
	}
?>

<body>
</html>

