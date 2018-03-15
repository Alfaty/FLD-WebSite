<?php
/**
 * Template Name: Home Page
 *
 */
get_header(); ?>

<div id="home" class="content-area">

	<?php
		if ( is_active_sidebar( 'sidebar-homepage' ) ) {

			dynamic_sidebar( 'sidebar-homepage' );

		} elseif ( current_user_can( 'edit_theme_options' ) ) {

			if ( is_customize_preview() ) {
				printf( __( 'You need to install the %s plugin to be able to add Features, Services, Testimonials and Clients widgets.','onepage-lite' ), 'MyThemeShop Theme Customizer' );
			} else {
				printf( __( 'You need to install the %s plugin to be able to add Features, Services, Testimonials and Clients widgets.','onepage-lite' ), sprintf( '<a href="%1$s" class="onepage-default-links">%2$s</a>', esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=mythemeshop-theme-customizer' ), 'install-plugin_mythemeshop-theme-customizer' ) ), 'MyThemeShop Theme Customizer' ) );
			}

		}
	?>

</div><!-- #page -->

<?php
get_footer();