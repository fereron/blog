<?php 
require '../includes/config.php';


if (isset($_POST['submit'])) {
	$password = $_POST['password'];

	if ($password == $config['admin']['password']) {
		// echo "Good";
	}
	else {
		echo "BAD";
		exit();
	}



}

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" href="../resources/style.css?t=<?php echo(microtime(true)); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
 	<title>Панель администратора</title>
 	<style> 
		body {
			background: url(../images/skulls.png) repeat;
		}
	</style>	
 </head>
 <body>
 	<div class="administration">
 		<p><a href="paste.php">Добавить статью</a></p> <br>
 		<p><a href="delete.php">Удалить статью</a></p> <br>




 	</div>
 </body>
 </html>