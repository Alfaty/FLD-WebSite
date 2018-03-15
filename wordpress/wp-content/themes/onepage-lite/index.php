<?php
/**
 * The main template file
 *
 * Used to display the homepage when home.php doesn't exist.
 */

get_header();

$blog_title = get_theme_mod('onepage_lite_blog_title', 'Blog');
$blog_subtitle = get_theme_mod('onepage_lite_blog_description', 'Lorem ipsum dolor sit amet consectetur');

if(!empty($blog_title) || !empty($blog_subtitle)) { ?>
	<section class="blog-title">
		<div class="container">
			<?php if( isset($blog_title) && !empty($blog_title) ) { ?>
				<h1 class="page-title"><?php echo $blog_title; ?></h1>
			<?php } ?>
			<?php if( isset($blog_subtitle) && !empty($blog_subtitle) ) { ?>
				<h2 class="page-subtitle"><?php echo $blog_subtitle; ?></h2>
			<?php } ?>
		</div>
	</section>
<?php } ?>

<div id="page" class="content-area">
	<div id="content_box">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('g post latestPost'); ?>>
				<div class="post-img">
					<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php the_post_thumbnail( 'onepage-lite-featured', array( 'title' => '' ) ); ?>
						<?php } else { ?>
							<img class="wp-post-image" src="<?php echo get_template_directory_uri() . '/images/nothumb-onepage-lite-featured.png'; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
						<?php } ?>
					</a>
					<?php if (function_exists('wp_review_show_total')) wp_review_show_total(true, 'latestPost-review-wrapper'); ?>
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

		<?php endwhile; endif; ?>

		<?php onepage_lite_post_navigation(); ?>

	</div><!-- #content -->
</div><!-- #page -->

<?php
get_footer();