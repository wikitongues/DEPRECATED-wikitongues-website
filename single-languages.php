<?php get_header(); 

	$language_name = get_field('standard_name'); 
	$alternate_names = get_field('alternate_names');
	$language_description = get_field('language_description'); 
	$speakers_recorded = get_field('speakers_recorded'); ?>

<div class="wt_single-languages">
	<!-- this should be made compatible with the page-intro tempalte -->
	<div class="wt_single-languages__intro">
		<div class="wt_page-intro wt_page-intro--short">
			<h1><?php echo $language_name; ?></h1>
			<h2>Also known as</h2>
			<p><?php echo $alternate_names; ?></p>
		</div>
	</div>

	<!-- video grid -->
	<?php if( $speakers_recorded ): ?>
		<?php foreach( $speakers_recorded as $post ): setup_postdata( $post ); 

			$video_title = get_the_title($post);
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
	<?php else: ?>
		<div class="wt_single-languages__no-videos">
			<p>We don't have a video for this language yet.</p>			
			<?php 
			$cta_link = get_bloginfo('url').'/submit-a-video';
			$unique_class = 'single-languages';
			$cta_text = 'Submit a video';
			
			include( locate_template('components/cta.php') ); ?>
		</div>
	<?php endif; ?>
	<!-- /video grid -->

	<div class="wt_single-languages__pagination pagination">
		<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a> | <a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
	</div>
</div>
<?php get_footer(); ?>