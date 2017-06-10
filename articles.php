<?php 
require 'includes/config.php';

?>

<?php  $title = 'Все статьи';  include 'includes/header.php';  ?>

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
	<p>Все записи</p>
		
	<?php 
	$per_page = 1;
	$page = 1;

	if (isset ($_GET['page'])) 
	{
		$page = (int) $_GET['page'];
	}

	$total_count_q = mysqli_query($connection, "SELECT COUNT(id) AS `total_count` FROM `articles`");
	$total_count = mysqli_fetch_assoc($total_count_q);
	$total_count = $total_count['total_count'];

	$total_pages = ceil( $total_count / $per_page );
	if ($page <= 1 || $page > $total_count)
	{
		$page = 1;
	}

	$offset = ($per_page * $page) - $per_page;
	$articles = mysqli_query($connection, "SELECT * FROM `articles` LIMIT $offset,$per_page");
	while( ($art = mysqli_fetch_assoc($articles)) ) {
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
			
			
			<div class="paginator">
			<?php 

			if ($page > 1)
			{
				echo '<a href="/articles.php?page='.($page - 1).'">Предыдущая страница </a>';
			}
			if ($page < $total_pages)
			{
				echo '<a href="/articles.php?page='.($page + 1).'">Следующая страница </a>';
			}
			 ?>
			 </div>
			
		
</div>
<?php 	include 'includes/sidebar.php';  ?>


