<?php get_header(); 

	$language_name = get_field('standard_name'); 
	$alternate_names = get_field('alternate_names');
	$language_description = get_field('language_description'); 
	$speakers_recorded = get_field('speakers_recorded'); ?>

<!-- this should be made compatible with the page-intro tempalte -->
<div class="wt_page-intro">
	<h1><?php echo $language_name; ?></h1>
	<h2>Also known as</h2>
	<p><?php echo $alternate_names; ?></p>
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
	<div class="wt_no-videos">
		<p>We don't have a video for this language yet.</p>
		<a href="<?php bloginfo('url'); ?>/submit-a-video" class="wt_cta">Submit a video</a>
	</div>
<?php endif; ?>
<!-- /video grid -->

<div class="pagination">
	<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a> | <a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
</div>

<?php get_footer(); ?>