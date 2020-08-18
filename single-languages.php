<?php get_header(); 

	$language_name = get_field('standard_name'); 
	$alternate_names = get_field('alternate_names');
	$language_description = get_field('language_description'); 
	$speakers_recorded = get_field('speakers_recorded');
	$lexicon_source = get_field('lexicon_source'); ?>

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
		<h2>Videos</h2>
		<p>The following samples were recorded by volunteers from around the world. Submit your own video <a href="<?php bloginfo('url'); ?>/submit-a-video">here</a>.</p>
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

	<!-- lexicon -->
	<h2>Lexicon</h2>
	<?php if ( $lexicon_source ): ?>
		<p>If you have a dictionary or other vocabulary materials for this language, please write to us at <a href="mailto:hello@wikitongues.org;">hello@wikitongues.org</a>.</p>
		<div class="wt_single-languages__lexicon">
		<?php foreach ( $lexicon_source as $post ): setup_postdata( $post ); 

			$lexicon_title = get_the_title($post);
			$lexicon_permalink = get_the_permalink();
			$source_languages = get_field('source_languages');
			$target_languages = get_field('target_languages');
			$dropbox_link = get_field('dropbox_link');
			$external_link = get_field('external_link');
			
			include( locate_template('components/lexicon-preview.php') );
			
		endforeach; wp_reset_postdata(); ?>
		</div><!-- /lexicon wrapper -->
	<?php else: ?>
		<p>No lexicon yet. If you have a dictionary or other vocabulary materials for this language, please write to us at <a href="mailto:hello@wikitongues.org;">hello@wikitongues.org</a>.</p>
	<?php endif; ?>
	<!-- /lexicon -->

	<!-- pagination -->
	<div class="wt_single-languages__pagination pagination">
		<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a> | <a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
	</div>
	<!-- /pagination -->

	<!-- archive donors -->
	<?php include( locate_template('components/seedbank-donors.php') ); ?>
	<!-- /archive donors -->
</div>
<?php get_footer(); ?>