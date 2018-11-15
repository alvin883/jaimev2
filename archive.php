<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jaime
 */

get_header();

        $titleText = '';
        $detail = '';

        // Define what this archieve refers to
        if(is_category()){
            // Category
            $titleText = 'Category';
            $detail = single_cat_title('',false);
        }else if(is_tag()){
            // Tag
            $titleText = 'Tag';
            $detail = single_cat_title('',false);
        }else if(is_author()){
            // Author
            $titleText = 'Author';
            $detail = get_the_author();
        }else if(is_day()){
            // Day
            $titleText = 'Daily';
            $detail = get_the_date();
        }else if(is_month()){
            // Month
            $titleText = 'Monthly';
            $detail = get_the_date('F Y');
        }else if(is_year()){
            // Year
            $titleText = 'Yearly';
            $detail = get_the_date('Y');
        }
?>
	<div id="mini-header">
		<div class="sub-header">
			<div class="subtitle"><?php echo $titleText; ?> Archive</div>
			<div class="title"><?php echo $detail; ?></div>
			<div class="subtitle"><?php echo 'Found ' . $wp_query->found_posts . ' items'; ?></div>
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
        get_template_part('404');
    }
	
	// get_template_part('template-parts/landingpage/footer');

	//get_sidebar();

	get_footer();
?>

