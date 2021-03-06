<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jaime
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php get_search_form(); ?>
	<div id="navbar-top">
		<nav class="navbar first">
			<div class="btn-group social">
				<?php
                    if(theme_options('general_social') != ''){
						$social_icons = get_social_media_icons();
                        foreach (theme_options('general_social') as $key => $value) {

                            if(array_key_exists($key,$social_icons) && $value != '' && !empty($value)){
								?>
									<a class="m-1 btn-fab" href="<?php echo $value;?>">
											<i class="fab fa-<?php echo $social_icons[$key]["font"]; ?>"></i>
									</a>
                                <?php
                            }

                        }
                    }
                ?>
			</div>
			
			<img src="<?php echo get_template_directory_uri(); ?>/src/img/jaime-logo.png" alt="Jaime Logo" class="logo">

			<button class="btn-fab m-1 js__toggle-searchbar">
				<i class="fas fa-search"></i>
			</button>
		</nav>
		<nav class="navbar second">
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Blog</a> -
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Jaime</a> -
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Contact</a>
		</nav>
	</div>