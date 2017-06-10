<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title;?></title>
	<link rel="stylesheet" href="resources/style.css?t=<?php echo(microtime(true)); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="../js/jquery-3.1.1.js"></script>
</head>

<body>
	<header>
		<a href="/" class="logo" title="Главная"><h3>Anonymous</h3></a>
		<div class="log">
		<a href="/login.php" title="Войти">Войти </a>
		<a href="/register.php" title="Регистрация">Регистрация</a>
		<a href="/admin/admin.html">Админка</a>
		</div>
	</header>
	<style> 
	body {
		background: url(images/skulls.png) repeat;
	}
</style>	
