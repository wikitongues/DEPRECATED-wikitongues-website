<?php get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital@0;1&display=swap');
</style>

<?php 

$banner_image = get_field('project_banner_image');
$banner_text = get_the_title();
$featured_videos = get_field('featured_videos');

include( 'components/banner.php' );

if (have_posts()): while (have_posts()) : the_post(); ?>

<div class="wt_single-projects">
	<!-- article -->
	<div class="wt_single-projects__copy">
		<?php the_content(); ?>
	</div>
	<!-- /article -->

<?php endwhile; ?>

<?php endif; ?>

<?php if ( $featured_videos ): ?>
	<div class="wt_single-projects__videos">
		<?php foreach( $featured_videos as $post ): setup_postdata( $post ); 

		if ( get_field('video_title') ) {
			$video_title = get_field('video_title');
		} else {
			$video_title = get_the_title($post);
		}

		$video_permalink = get_the_permalink();
		$video_thumbnail = get_field('video_thumbnail');
		$featured_languages = get_field('featured_languages');
		$video_description = get_field('video_description');
		$youtube_link = get_field('youtube_link');
		$wikimedia_commons_link = get_field('wikimedia_commons_link');
		$video_license = get_field('video_license');
		$license_link = get_field('license_link');
		$attribution_statement = get_field('attribution');

		include( locate_template('components/video-preview.php') );

		endforeach; wp_reset_postdata(); ?>
	</div>
</div>

<?php endif; ?>

	<!-- donate module -->
	<?php
		// define variables for donate CTA at bottom of layout
		$donate_banner_header = get_field('donate_banner_header');
		$donate_banner_copy = get_field('donate_banner_copy');
		$donate_banner_form_embed = get_field('donate_banner_form_embed');

		// load donate banner
		include( locate_template('components/donate-banner.php') );

		// define variabels for donate popup at the bottom of the page
		$donate_module_header = get_field('donate_module_header');
		$donate_module_text = get_field('donate_module_text');
		$donate_module_code = get_field('donate_module_code');

		// load donate popup
		include( locate_template('components/donate-module.php') ); ?>
	<!-- /donate module -->

<?php get_footer(); ?>