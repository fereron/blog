	<aside>
		<h3 style="margin-top: 0">Топ читаемых статей</h3>

		<?php 
	$articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");?>

		<?php while( ($art = mysqli_fetch_assoc($articles)) ) {
			?>

		<div class="article_side">
			<img src="images/<?=$art['image']?>" alt="Paper">
			<a href="article.php?id=<?=$art['id']?>" title="<?=$art['title'];?>" ><h4><?=mb_substr($art['title'], 0, 30, 'utf-8');?></h4></a>
			<?php $art_cat = false;
				foreach ($categories as $cat) {
				if ($cat['id'] == $art['categories_id']) {
					$art_cat = $cat;
					break;
				}
				}
				 ?>
			<p>Категория: <a href="articles.php?id=<?=$cat['id'];?>"><?=$art_cat['title'];?></a></p>
			<p><?=mb_substr($art['text'], 0, 50, 'utf-8')?>...</p> 
		</div>

			<?php
			} ?>	
	</aside>