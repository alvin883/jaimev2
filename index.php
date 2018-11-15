<?php
	get_header();

	get_template_part('template-parts/landingpage/header-slider');

    if(have_posts()){ ?>
        <div class="card-columns">
            <?php
                while (have_posts()) {
                    the_post();
                    get_template_part('template-parts/content-thumbnail');
                }
            ?>
        </div>
    <?php
    } else {
        get_template_part('404');
    }
	
	get_template_part('template-parts/landingpage/footer');

	get_footer();
?>