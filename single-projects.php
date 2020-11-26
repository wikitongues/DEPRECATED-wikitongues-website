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
		$donate_module_header = 'While you\'re here...';
		$donate_module_text = 'To date, Wikitongues has archived 607 languages. Can you help us reach 150 more languages in 2021? <br> <br>On average, it costs $250—just $20.84/month—to safeguard materials in a new language.';
		$donate_embed_code = '<script src="https://app.giveforms.com/install-popup-button.js" type="text/javascript" defer></script><link rel="stylesheet" href="https://app.giveforms.com/giveforms_embed.css"/><a class="giveforms-donation-button" href="https://wikitonguesorg.giveforms.com/default-giveform-2" data-multi-step="true">Donate</a>';

		include( locate_template('components/donate-module.php') ); ?>
	<!-- /donate module -->

<?php get_footer(); ?>