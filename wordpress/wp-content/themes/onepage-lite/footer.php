<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onepage-lite
 */

$footer_copyrights = get_theme_mod('onepage_lite_footer_copyrights', 'Theme by <a href="http://mythemeshop.com/">MyThemeShop</a>');
?>

	<footer id="site-footer" class="clearfix" role="contentinfo">
		<div class="container">

			<div class="footer-nav">
	            <?php if ( has_nav_menu( 'footer' ) ) {  ?>
	            <?php wp_nav_menu( array( 'theme_location' => 'footer','menu_class' => 'footer') ); ?>
	            <?php } ?>
	        </div>

			<div class="copyrights">
	            <span>&copy; <?php _e("Copyright","onepage-lite"); ?> <?php echo date("Y") ?>, <?php echo !empty($footer_copyrights) ? $footer_copyrights : ''; ?></span>
				<div class="top"><a href="#top" class="toplink" rel="nofollow"><i class="fa fa-angle-up"></i></a></div>
	        </div> 

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
