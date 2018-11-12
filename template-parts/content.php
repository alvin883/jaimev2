<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaime
 */

?>


<div class="al-card">
	<div class="header">
    <?php if(has_post_thumbnail()){ ?>
		<img src="<?php the_post_thumbnail_url('banner'); ?>" alt="" width="100%">
        
    <?php } ?>
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
	</div>
	<div class="content">
		<?php the_excerpt(); ?>
	</div>
	<div class="footer">
		<button class="btn" onclick="gotoURL(this);" data-url="<?php the_permalink(); ?>">read more</button>
	</div>
</div>