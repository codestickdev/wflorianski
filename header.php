<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wojciech_Floriański
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
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="siteHeader">
		<nav class="siteHeader__menu">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span></span>	
				<span></span>	
			</button>
			<div class="lang">
				<?php
					$langattr = array(
						'show_flags' 		=> 0,
						'show_names' 		=> 0,
						'hide_current'		=> true,
						'dropdown'			=> 0,
						'display_names_as'	=>'slug'
					);
					pll_the_languages($langattr);
				?>
			</div>
			<?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu')); ?>
		</nav>
		<div class="siteHeader__logo">
			<a href="<?php echo home_url('/'); ?>">Wojciech Florianski</a>
		</div>
		<div class="siteHeader__social">
			<a href="<?php echo get_permalink(pll_get_post(64)) ?>"><?php pll_e('O mnie'); ?></a>
			<a href="#" class="instagram">
				<img src="<?php echo get_template_directory_uri() . '/images/icons/ig_ico.svg'; ?>" />
			</a>
		</div>
	</header><!-- #masthead -->
	<div class="header-clone"></div>
	<div class="menuMobile">
		<div class="menuMobile__wrap">
			<?php wp_nav_menu(array('theme_location' => 'menu-mobile', 'menu_id' => 'mobile-menu')); ?>
		</div>
		<div class="menuMobile__lang">
			<?php pll_the_languages($langattr); ?>
		</div>
	</div>
