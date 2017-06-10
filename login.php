<?php 
require 'includes/config.php';

$title = 'Форма входа';  include 'includes/header.php';  

if ( isset($_POST['done'])) {

	$login = $_POST['login'];
	$password = $_POST['password'];

	$error = false;
	$login_error = "";
	$password_error = "";

	if ($login == '') {
		$login_error = "Введите ваш логин!";
		$error = true;
	}
	if ($password == '') {
		$password_error = "Введите пароль!";
		$error = true;
	}


	if ( !$error) {

	$log = mysqli_query($connection, "SELECT * FROM `users` WHERE `login` = '".$login."' ");
	$log_result = mysqli_fetch_assoc($log);
	// password_verify($password, $log_result['password'])
	 if  ($login == $log_result['login'] && password_verify($password, $log_result['password'])) {
	 	echo "Вы авторизованы";
	 }
	 else {
	 	echo "Введен неверный логин или пароль!";
	 }
	}



}



?>


<div class="registration">
	<h2 id="login">Вход</h2>
	<form action="login.php" method="post">

	<label><strong>Введите логин</strong></label>: <br>
	<input type="text" placeholder="Логин" name="login" value="<?=$login;?>">  
	<span  id="test"style="color: red; font-size: 15px;"><?=$login_error?><?=$login_error_count;?></span> <br>

	<label><strong>Введите пароль</strong></label>: <br>
	<input type="password" placeholder="Пароль" name="password"> 
	<span style="color: red; font-size: 15px;"><?=$password_error?></span> <br>

	<input type="submit" value="Войти" name="done" class="login"> <br>

	</form>
</div>
























