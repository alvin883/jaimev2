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
	<div class="header <?php if(!has_post_thumbnail()){echo 'no-thumb';}?>">
		<div class="thumbnail" style="background-image: url('<?php if(has_post_thumbnail()){ the_post_thumbnail_url(); } ?>')">
			<div class="centered_content">
				<?php
					$categories = get_the_category();
					if($categories){
				?>
					<div class="category">
					<?php
								$iteration = 0;
								foreach ($categories as $category) {
									if($iteration != 0){echo ' - ';}
									echo $category->cat_name;
									$iteration ++;
								}
					?>
					</div>
				<?php } ?>
				<div class="title"><?php the_title(); ?></div>
				<div class="detail">
					by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a> <span class="divider">|</span> <?php the_time('d F Y'); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
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
										<a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->cat_name; ?></a>
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
		<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>
	</div>
</div>