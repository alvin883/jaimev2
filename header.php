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

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

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
									<a class="m-1" href="<?php echo $value;?>">
										<button class="btn-fab">
											<i class="fab fa-<?php echo $social_icons[$key]["font"]; ?>"></i>
										</button>
									</a>
                                <?php
                            }

                        }
                    }
                ?>
			</div>
			
			<img src="<?php if(theme_options('general_nav_logo',false,'url') != ''){echo theme_options('general_nav_logo',false,'url');} ?>" alt="Jaime Logo" class="logo">

			<button class="btn-fab m-1" onclick="toggleSearchPage();">
				<i class="fas fa-search"></i>
			</button>
		</nav>
		<nav class="navbar second">
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Blog</a> -
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Jaime</a> -
			<a href="<?php echo get_home_url('/'); ?>" class="m-2">Contact</a>
		</nav>
	</div>