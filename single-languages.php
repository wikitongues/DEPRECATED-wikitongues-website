<?php get_header(); 

	$language_name = get_field('standard_name'); 
	$alternate_names = get_field('alternate_names');
	$nations_of_origin = get_field('nations_of_origin');
	$linguistic_genealogy = get_field('linguistic_genealogy');
	// $language_description = get_field('language_description');
	// $wikipedia_url = get_field('wikipedia_url'); 
	$speakers_recorded = get_field('speakers_recorded');
	$lexicon_source = get_field('lexicon_source'); ?>

<!-- this is for trying out new typography on the languages page. we will incorporate this into the primary stylesheet eventually -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital@0;1&display=swap');
</style>

<div class="wt_single-languages">
	<!-- this should be made compatible with the page-intro tempalte -->
	<div class="wt_single-languages__intro">
		<div class="wt_page-intro wt_page-intro--short">
			<div class="wt_single-languages__intro--names">
				<h1><?php echo $language_name; ?></h1>
				<h2><?php echo $alternate_names; ?></h2>
			</div>
			<div class="wt_single-languages__intro--origins">
				<!-- can we start this with a/an depending on whether or not the family starts w a vowel? -->
				<!-- we also need to thank about when to preceed the country name with "the" -->
				<?php if ( $linguistic_genealogy || $nations_of_origin ): ?>
				<p>
					<span>A </span>
					<?php if ( $linguistic_genealogy ): ?>
						<?php echo $linguistic_genealogy; ?> 
					<?php endif; ?>
					<span>language</span>
					<?php if ( $nations_of_origin ): ?>
						<span> of </span>
						<?php echo $nations_of_origin; ?>
					<?php endif; ?>
				</p>
				<?php endif; ?>
			</div>
			<!-- Ideally, we'll incorporate the Wikipedia description as a call-to-action for our user group -->
		</div>
	</div>

	<div class="wt_single-languages__content">
	<!-- video grid -->
	<?php if( $speakers_recorded ): ?>
		<h2>Videos</h2>
		<p>The following samples were recorded by volunteers from around the world. Submit your own video <a href="<?php bloginfo('url'); ?>/submit-a-video">here</a>.</p>
		<?php foreach( $speakers_recorded as $post ): setup_postdata( $post ); 

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
	</div>
	<!-- /content -->

	<div class="clear"></div>

	<!-- pagination -->
	<div class="wt_single-languages__pagination pagination">
		<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a> | <a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
	</div>
	<!-- /pagination -->

	<!-- archive donors -->
	<?php include( locate_template('components/seedbank-donors.php') ); ?>
	<!-- /archive donors -->

	<!-- donate module -->
	<?php
		$donate_module_header = 'While you\'re here...';
		$donate_module_text = 'To date, Wikitongues has archived 607 languages. Can you help us reach 150 more languages in 2021? <br> <br>On average, it costs $250—just $20.84/month—to safeguard materials in a new language.';
		$donate_module_code = '<script src="https://app.giveforms.com/install-popup-button.js" type="text/javascript" defer></script><link rel="stylesheet" href="https://app.giveforms.com/giveforms_embed.css"/><a class="giveforms-donation-button" href="https://wikitonguesorg.giveforms.com/default-giveform-2" data-multi-step="true">Donate</a>';

		include( locate_template('components/donate-module.php') ); ?>
	<!-- /donate module -->
</div>
<?php get_footer(); ?>