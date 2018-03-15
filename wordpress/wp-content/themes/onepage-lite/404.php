<?php
/**
 * The template for displaying 404 (Not Found) pages.
 */
?>
<?php get_header(); ?>
<div id="page">
	<article class="article">
		<div id="content_box">
			<div class="single_post">
				<header>
					<div class="title">
						<h1><?php _e('Error 404 Not Found', 'onepage-lite' ); ?></h1>
					</div>
				</header>
				<div class="post-content">
					<p><?php _e('Oops! We couldn\'t find this Page.', 'onepage-lite' ); ?></p>
					<p><?php _e('Please check your URL or use the search form below.', 'onepage-lite' ); ?></p>
					<?php get_search_form();?>
				</div><!--.post-content--><!--#error404 .post-->
			</div>
		</div><!--#content-->
	</article>
	<?php get_sidebar(); ?>
</div><!-- #page -->
<?php get_footer(); ?>