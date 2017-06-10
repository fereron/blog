<?php
require 'includes/config.php';
include 'includes/header.php';


$categories_q = mysqli_query($connection, "SELECT * FROM `articles_categories`"); 
$categories = array();
while ( ($cat = mysqli_fetch_assoc($categories_q)) ) {
	$categories[] = $cat;
} ?>

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


<?php
$articles = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` = " . (int) $_GET['id']);
if ( mysqli_num_rows($articles) <= 0 ) {
	?>
	<div class="content_article">
		<p>Запрашиваемая статья не найдена!</p>
	</div>
<?php  } else {
?>

 <div class="content_article">
 			<?php 
 			$art = mysqli_fetch_assoc($articles);
 			mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = " . $art['id'] );
			?>

		<div class="full_text">
		<div class="title-line">
			<h3><?=$art['title'];?></h3> <p><?=$art['views'];?> просмотров</p>
		</div>
			<div class="img_div"><img src="images/<?=$art['image'];?>" alt="Paper"></div>
			<p class="text"><?=$art['text'];?></p>
		</div>

 </div>
 <?php } ?>

 <?php include 'includes/sidebar.php'; ?>




 <?php include 'includes/footer.php'; ?>