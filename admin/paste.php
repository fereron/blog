<?php 
include '../includes/config.php';

if ( isset($_POST['add'])) {

$title = $_POST['title'];
$text = $_POST['text'];
$categorie = $_POST['categorie'];


mysqli_query($connection, "INSERT INTO `articles` (`title` , `text` , `categories_id` , `pubdate`) VALUES ( '".$title."' , '".$text."' , '".$categorie."' , NOW() )");

$result = "Вы успешно добавили статью!";

}



 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../resources/style.css?t=<?php echo(microtime(true)); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<title>Добавление статьи</title>
	<style> 
		body { background: url(../images/skulls.png) repeat; }
	</style>	
</head>
<body>

	<div class="paste_article">	
		<form action="paste.php" method="post">
			<label for="title">Название статьи</label>: <br>
			<input type="text" name="title"> <br>

			<label for="text">Текст статьи</label>: <br>
			<textarea name="text" cols="100" rows="24"></textarea> <br>

			<label for="categorie">Название категории</label>: <br>
			<input type="text" name="categorie"> <br>

			<input type="submit" value="Добавить" name="add" class="add">

	<p style="color: lightgreen;"><?=$result;?></p>

	<a href="../index.php" style="color: #fff;">Вернуться на главную</a>

		</form>
	</div>

</body>
</html>