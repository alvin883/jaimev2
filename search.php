<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package jaime
 */
// printf( esc_html__( 'Search Results for: %s', 'jaime' ), '<span>' . get_search_query() . '</span>' );

	get_header();
?>
	<div id="mini-header">
		<div class="sub-header">
			<div class="subtitle opacity-8">Results for : </div>
			<div class="title"><?php echo get_search_query(); ?></div>
			<div class="subtitle opacity-6"><?php echo 'Found ' . $wp_query->found_posts . ' items'; ?></div>
		</div>
	</div>	
<?php

    if(have_posts()){ ?>
        <div class="card-columns">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content-search');
                }
            ?>
        </div>
    <?php
    } else {
        get_template_part('404.php');
    }
	
	// get_template_part('template-parts/landingpage/footer');

	//get_sidebar();

	get_footer();
?>
