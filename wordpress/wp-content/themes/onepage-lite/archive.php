<?php
/**
 * The template for displaying archive pages.
 *
 * Used for displaying archive-type pages. These views can be further customized by
 * creating a separate template for each one.
 *
 * - author.php (Author archive)
 * - category.php (Category archive)
 * - date.php (Date archive)
 * - tag.php (Tag archive)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

get_header(); ?>

<div id="page">
	<div id="content_box">
		<h1 class="postsby">
			<span><?php the_archive_title(); ?></span>
		</h1>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('g post latestPost'); ?>>
				<div class="post-img">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( 'onepage-lite-featured', array( 'title' => '' ) ); ?>
						<?php } else { ?>
							<img class="wp-post-image" src="<?php echo get_template_directory_uri() . '/images/nothumb-onepage-lite-featured.png'; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
						<?php } ?>
					</a>
				</div>
				<div class="post-data">
					<div class="post-data-container">
						<div class="post-title">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
						</div>
						<div class="post-info">
							<span class="theauthor"><span><?php _e('By', 'onepage-lite'); ?> <?php the_author_posts_link(); ?></span></span>
							<span class="thetime updated"><?php _e('Posted on', 'onepage-lite'); ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
							<span class="thecategory"><?php mts_the_category(' '); ?></span>
							<span class="thecomment"><a rel="nofollow" href="<?php comments_link(); ?>"><?php echo comments_number();?></a></span>
						</div> <!--.post-info-->
						<div class="front-view-content">
							<?php echo mts_excerpt(16); ?>
						</div>
						<?php mts_readmore(); ?>
					</div>
				</div>
			</article>
		<?php endwhile; else: ?>
			<div class="no-results">
				<h2><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'onepage-lite' ); ?></h2>
				<?php get_search_form(); ?>
			</div><!--noResults-->
		<?php endif; ?>

		<?php onepage_lite_post_navigation(); ?>
	</div>
</div><!-- #page -->
<?php get_footer(); ?>