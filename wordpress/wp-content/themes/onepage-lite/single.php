<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package onepage-lite
 */

get_header();

$related_posts = get_theme_mod('onepage_lite_single_related_posts', 1); ?>

<div id="page" class="single">
	<article class="article">
		<div id="content_box">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<div class="single_post clearfix">
						<header>
							<h1 class="single-title"><?php the_title(); ?></h1>
								<div class="post-info">
									<span class="theauthor"><?php _e( 'By ', 'onepage-lite' ); the_author_posts_link(); ?></span>
									<span class="thetime updated"><?php _e( 'Posted On ', 'onepage-lite' ); the_time( get_option( 'date_format' ) ); ?></span>
									<span class="thecategory"><?php the_category(', ') ?></span>
									<span class="thecomment"><a rel="nofollow" href="<?php comments_link(); ?>"><?php echo comments_number();?></a></span>
								</div>
						</header><!--.headline_area-->

						<div class="post-single-content box mark-links">
							<?php the_content(); ?>
						</div>

						<?php mts_the_tags('<div class="tags"><span class="tagtext">'.__('Tags', 'onepage-lite' ).':</span>',', ') ?>

					</div>
					<?php if( isset($related_posts) && $related_posts == 1 ) { mts_related_posts(); } ?>
				</div>

			<?php comments_template( '', true ); ?>
			<?php endwhile; /* end loop */ ?>

		</div>
	</article><!-- #main -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->
<?php
get_footer();
