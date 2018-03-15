<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onepage-lite
 */
?>
<aside id="sidebar" class="sidebar c-4-12">
	<?php if (!dynamic_sidebar('sidebar')) : ?>
		<div id="sidebar-search" class="widget">
			<div class="widget-content">
				<h3><?php _e('Search', 'onepage-lite'); ?></h3>
				<?php get_search_form(); ?>
			</div>
		</div>
		<div id="sidebar-archives" class="widget">
			<div class="widget-content">
				<h3><?php _e('Archives', 'onepage-lite') ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</div>
		</div>
		<div id="sidebar-meta" class="widget">
			<div class="widget-content">
				<h3><?php _e('Meta', 'onepage-lite') ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>
</aside>