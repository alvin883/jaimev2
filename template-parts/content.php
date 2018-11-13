<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaime
 */

?>
<div class="al-page">
	<div class="header">
	<?php if(has_post_thumbnail()){ ?>
		<div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
			<div class="centered_content">
				<div class="category">
					<?php
						$categories = get_the_category();
						if($categories){
								$iteration = 0;
								foreach ($categories as $category) {
									if($iteration != 0){echo ' - ';}
									echo $category->cat_name;
									$iteration ++;
								}
						} 
					?>
				</div>
				<div class="title"><?php the_title(); ?></div>
				<div class="detail">
					by <?php the_author(); ?> <span class="divider">|</span> <?php the_time('d F Y'); ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
	<div class="content-wrapper">
		<div class="left">
			<div class="content">
				<?php the_content(); ?>
			</div>
			<div class="footer">
				<?php
					$categories = get_the_category();
					if($categories){
							foreach ($categories as $category) {
				?> 
									<button class="m-1"><?php echo $category->cat_name; ?></button>
				<?php
							}
					} 
				?>
			</div>
		</div>
		<div class="right">
			<div class="sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>