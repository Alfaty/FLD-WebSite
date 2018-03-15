<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onepage-lite
 */

get_header(); ?>

<div id="page" class="single">
	<article class="article">
		<div id="content_box">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
					<div class="single_post clearfix">
						<header>
							<h1 class="title entry-title"><?php the_title(); ?></h1>
						</header>

						<div class="post-content box mark-links entry-content">
							<?php the_content(); ?>
						</div>

					</div>
				</div>

			<?php comments_template( '', true ); ?>
			<?php endwhile; /* end loop */ ?>

		</div>
	</article><!-- #main -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->
<?php
get_footer();
