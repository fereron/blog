<?php 
require 'includes/config.php';

?>

<?php  $title = 'Главная';  include 'includes/header.php';  ?>

<?php 
$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`"); 
$categories = array();
while ( ($cat = mysqli_fetch_assoc($categories_q)) ) {
	$categories[] = $cat;
}

?>
	<div class="header_bottom">
		<nav class="navigation">
			<ul class="navigation_list">
				<?php 
					foreach($categories as $cat) {
					?>
						<li><a href="articles.php?id=<?=$cat['id'];?>"><?=$cat['title'];?></a></li>
					<?php	}	?>
			</ul>
		</nav>
	</div>

<div class="content">
		<p>Новейшее в блоге 
			<a href="articles.php" id="zapis" >Все записи</a>
		</p>
		
	<?php 
	$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 10");?>

		<?php while( ($art = mysqli_fetch_assoc($articles)) ) {
			?>

		<div class="article">
			<img src="images/<?=$art['image']?>" alt="Paper">
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
			<p><?=mb_substr($art['text'], 0, 100, 'utf-8')?>...</p>
		</div>

			<?php
			} ?>
		
</div>
<?php 	include 'includes/sidebar.php';  ?>

<div class="content">
		<p>Программирование
			<a href="#" id="zapis" >Все записи</a>
		</p>
		
	<?php 
	$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = 1 ORDER BY `id` DESC LIMIT 10");?>

		<?php while( ($art = mysqli_fetch_assoc($articles)) ) {
			?>

		<div class="article">
			<img src="images/<?=$art['image']?>" alt="Paper">
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
			<p><?=mb_substr($art['text'], 0, 100, 'utf-8')?>...</p>
		</div>
			<?php } ?>
		
</div>

<div class="content">
		<p>Стиль жизни
			<a href="#" id="zapis" >Все записи</a> </p>
		
	<?php 
	$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categories_id` = 2 ORDER BY `id` DESC LIMIT 10");?>

		<?php while( ($art = mysqli_fetch_assoc($articles)) ) {
			?>

		<div class="article">
			<img src="images/<?=$art['image']?>" alt="Paper">
			<a href="article.php?id=<?=$art['id']?>" title="<?=$art['title'];?>" ><h4><?=mb_substr($art['title'], 0, 40, 'utf-8');?></h4></a>
			<?php $art_cat = false;
				foreach ($categories as $cat) {
				if ($cat['id'] == $art['categories_id']) {
					$art_cat = $cat;
					break;
				}
				} ?>
			<p>Категория: <a href="articles.php?id=<?=$cat['id'];?>"><?=$art_cat['title'];?></a></p>
			<p><?=mb_substr($art['text'], 0, 100, 'utf-8')?>...</p>
		</div>
			<?php } ?>
		
</div>

