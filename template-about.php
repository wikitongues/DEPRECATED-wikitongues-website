<?php /* Template name: About */ get_header(); ?>

<?php
// define page banner variables
$banner_image = get_field('banner_image');
$banner_text = get_field('banner_text');
$banner_cta_link = get_field('banner_cta_link');
$banner_cta_text = get_field('banner_cta_text'); ?>

<?php include( locate_template('components/banner.php') ); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>