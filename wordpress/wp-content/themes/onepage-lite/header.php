<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onepage-lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="homepage" class="main-container">

	<header id="site-header" role="banner">
		<div class="container clearfix">
			<div class="site-branding">
				<?php if (has_custom_logo()) { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
						<h1 id="logo" class="image-logo" itemprop="headline">
							<?php the_custom_logo(); ?>
						</h1><!-- END #logo -->
					<?php } else { ?>
					    <h2 id="logo" class="image-logo" itemprop="headline">
							<?php the_custom_logo(); ?>
						</h2><!-- END #logo -->
					<?php } ?>
				<?php } else { ?>
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
						<h1 id="logo" class="site-title" itemprop="headline">
							<a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
						</h1><!-- END #logo -->
					<?php } else { ?>
					    <h2 id="logo" class="site-title" itemprop="headline">
							<a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo( 'name' ); ?></a>
						</h2><!-- END #logo -->
					<?php } ?>
				<?php } ?>
			</div><!-- .site-branding -->

			<?php
			$header_icons = get_theme_mod('onepage_lite_header_social_icons', 1);
			$twitter_url = get_theme_mod('onepage_lite_twitter_url', '#');
			$facebook_url = get_theme_mod('onepage_lite_facebook_url', '#');
			$google_plus_url = get_theme_mod('onepage_lite_google_plus_url', '#');

			if( isset($header_icons) && $header_icons == 1 ) :
			?>			
				<div class="social-icons">
					<?php if( !empty($twitter_url) ) : ?>
						<a href="<?php echo $twitter_url; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
					<?php endif; ?>
					<?php if( !empty($facebook_url) ) : ?>
						<a href="<?php echo $facebook_url; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
					<?php endif; ?>
					<?php if( !empty($google_plus_url) ) : ?>
						<a href="<?php echo $google_plus_url; ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div id="primary-navigation">
				<a href="#" id="pull" class="toggle-mobile-menu"><?php _e('Menu', 'onepage-lite'); ?></a>
				<nav id="navigation" class="mobile-menu-wrapper" role="navigation">
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix', 'container' => '' ) ); ?>
					<?php } else { ?>
						<ul class="menu clearfix">
							<?php wp_list_categories('title_li='); ?>
						</ul>
					<?php } ?>
				</nav><!-- #site-navigation -->
			</div>
		</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
