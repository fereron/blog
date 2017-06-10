<?php 
require 'includes/config.php';

$title = 'Регистрация';  include 'includes/header.php';  



// include 'includes/captcha/TextGen.php';

// var_dump($_SESSION['3DCaptchaText']);

if ( isset($_POST['done'])) {

	$login = trim($_POST['login']);
	$email = trim($_POST['email']);
	$password = $_POST['password'];
	$password_2 = $_POST['password_2'];
	$captcha = $_POST['captcha'];

	$_SESSION['login'] = $login;
	// var_dump($captcha);


	$error = false;
	// if ($captcha != $_SESSION['3DCaptchaText']) {
	// 	echo "не равняется";
	// 	$error = true;
	// }
	if (htmlspecialchars($login) == '') {
		$login_error = "Введите логин!";
		$error = true;
	}
	if (htmlspecialchars($email) == '') {
		$email_error = "Введите Email!";
		$error = true;
	}
	else if (!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/",$email)) {
		$email_error = "<BR> <style> span#test {margin-left: 100px;}</style>Введите правильный Email!";
		$error = true;
	}
	// endif;
	if (($password) == '') {
		$password_error = "Введите пароль!";
		$error = true;
	}
	if (($password_2) != $password) {
		$password_2_error = "Введенные пароли не совпадают!";
		$error = true;
	}
	// if ($captcha == $_SESSION['3DCaptchaText']) {
	// 	// $captcha_error = "Вы ввели неправильные символы";
	// 	echo "Вы ввели правильные символы";
	// 	$error = true;
	// 	// exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
	// }
	// else {
	// 	echo "bad";
	// }

	///==========  ДЕЛАЕМ ПРОВЕРКУ НА ЗАНЯТОСТЬ ЛОГИНА   ==========////////
	$login_test = mysqli_query($connection, "SELECT COUNT(`id`) AS `login_count` FROM `users` WHERE `login` =  '". $_POST['login']."' ");
	$login_test_result = mysqli_fetch_assoc($login_test);

	if ( $login_test_result['login_count'] > 0) {
		$login_error_count = "<BR> <style> span#test {margin-left: 100px;}</style>Такой логин уже существует!";
		$error = true;
	}


	if (!$error) 
	{
		mysqli_query($connection, "INSERT INTO `users` (`login`, `email`, `password`) VALUES ('".$login."', '".$email."', '".password_hash($password, PASSWORD_DEFAULT)."')");
		$success = "<div style='text-align: center;'><span style='color: green;'>Вы успешно зарегестрировались!</span> <br> <a style='margin: 0' href='/''>Вернуться на главную</a></div>";
	}


}

?>



<div class="registration">
	<h2>Регистрация</h2>
	<form action="register.php" method="post">

	<label><strong>Введите логин</strong></label>: <br>
	<input type="text" placeholder="Логин" name="login" value="<?=$_SESSION['login'];?>" minlength="4" maxlength="12">  
	<span  id="test" style="color: red; font-size: 15px;"><?=$login_error?><?=$login_error_count;?></span> <br>

	<label><strong>Введите Email</strong></label>: <br>
	<input type="text" placeholder="Email" name="email" value="<?=$email;?>"> 
	<span id="test" style="color: red; font-size: 15px;"><?=$email_error?></span> <br>

	<label><strong>Введите пароль</strong></label>: <br>
	<input type="password" placeholder="Пароль" name="password" minlength="4" maxlength="12"> 
	<span style="color: red; font-size: 15px;"><?=$password_error?></span> <br>


	<label><strong>Повторите пароль</strong></label>: <br>
	<input type="password" placeholder="Пароль" name="password_2"> <br>
	<span style="color: red; font-size: 15px; margin-left: 90px"><?=$password_2_error?></span> <br> 

<!-- 	<img src="includes/captcha/3DCaptcha.php" alt="captcha">
	<input type="text" name="captcha" placeholder="Введите капчу">	 -->

	<input type="submit" value="Зарегестрироваться" name="done" class="register"> <br>
	<?=$success;?>
	




	</form>
</div>























<?php include 'includes/footer.php'; ?>