<?php 
require '../includes/config.php';

?>


<?php 
$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`"); 
$categories = array();
while ( ($cat = mysqli_fetch_assoc($categories_q)) ) {
	$categories[] = $cat;
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Удаление статей</title>
	<link rel="stylesheet" href="../resources/style.css?t=<?php echo(microtime(true)); ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<style> 
		body { background: url(../images/skulls.png) repeat; 
				margin-top: 50px; margin-left: 50px;}
	</style>	
</head>
<body>
	


<div class="content">
		
	<?php 
	$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");?>

		<?php while( ($art = mysqli_fetch_assoc($articles)) ) {
			?>

		<div class="article">
			<img src="../images/<?=$art['image']?>" alt="Paper">
			<a href="article.php?id=<?=$art['id']?>" title="<?=$art['title'];?>" ><h4><?=mb_substr($art['title'], 0, 40, 'utf-8');?></h4></a>
			<?php $art_cat = false;
				foreach ($categories as $cat) {
				if ($cat['id'] == $art['categories_id']) {
					$art_cat = $cat;
					break;
				}
				}
				 ?>
			<p>Категория: <a href="articles.php?id=<?=$cat['id'];?>"><?=$art_cat['title'];?></a></p>
			<p><?=mb_substr($art['text'], 0, 70, 'utf-8')?>...</p>
			<a href="delete.php?id=<?=$art['id'];?>" style="
				color: red; font-size: 12px; float: right; margin-right: 20px;
			 ">Удалить</a>

		</div>



			<?php
			} ?>
<?php 

if ( isset($_GET['id'])) {
	mysqli_query($connection, "DELETE FROM `articles` WHERE `id` = " . $_GET['id']);
	exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
}




 ?>
 	<a href="../index.php" style="color: #000; font-size: 18px; font-weight: bold;">Вернуться на главную</a>
</div>


</body>
