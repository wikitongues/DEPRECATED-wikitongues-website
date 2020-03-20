<?php get_header(); ?>

<div class="wt_archive-videos">
	<div class="wt_archive-videos__intro">
		<div class="wt_page-intro wt_page-intro--short">
			<h1>Language Videos</h1>
		</div>

		<!-- Search form -->
		<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
			<input id="videos_search" maxlength="150" name="videos_search" size="20" type="text" value="" class="txt" placeholder="Search videos" />
			<input name="post_type" type="hidden" value="videos" />
			<input id="searchsubmit" class="btn" type="submit" value="Search" />
		</form>
	</div>

	<?php
	// video query args
	$args = array(
		'post_type' => 'videos',
		'posts_per_page' => '30',
		'meta_key' => 'youtube_publish_date',
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);

	// Check url parameter or search query
	$language_or_search = get_query_var('videos_search');
	if (empty($language_or_search)) {
		$language_or_search = $s;
	}

	if (!empty($language_or_search)) {
		// Find matching languages
		$language_args = array(
			'post_type' => 'languages',
			'numberposts' => -1,
			'meta_query' => array(
				array(
					'key' => 'wt_id',
					'value' => $language_or_search,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'standard_name',
					'value' => $language_or_search,
					'compare' => 'LIKE'
				),
				array(
					'key' => 'alternate_names',
					'value' => $language_or_search,
					'compare' => 'LIKE'
				),
				'relation' => 'OR'
			)
		);
		$existing_languages = get_posts($language_args);

		// Query by video post title
		$meta_query[] = array(
			'key' => 'post_title',
			'value' => $language_or_search,
			'compare' => 'LIKE'
		);

		foreach ($existing_languages as $language_post) {
			// Query videos by post ID of featured languages (post object)
			$meta_query[] = array(
				'key' => 'featured_languages',
				'value' => $language_post->ID,
				'compare' => 'LIKE'
			);
			$meta_query['relation'] = 'OR';
		}
	}

	$args['meta_query'] = $meta_query;

	// Get current page and append to custom query parameters array
	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$video = new WP_Query( $args );
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $video;

	// Run video loop
	if ( $video->have_posts() ) {  ?>
	<div class="wt_archive-videos__grid"><!-- video thumbnails grid -->
	<?php
		while ( $video->have_posts() ) { $video->the_post();
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
			$public_status = get_field('public_status');

			include( locate_template('components/video-preview.php') );
		} 
	} else { // No videos matching search query ?>
		<div class="wt_archive-videos__no-search-results">
			<p>No videos to show</p>
			<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a>
		</div>
	<?php }
	wp_reset_postdata(); 

	// Link to all videos if search query is applied
	if (!empty($language_or_search) && $video->have_posts()) { ?>
		<div class="wt_archive-videos__all-videos">
			<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a>
		</div>
	<?php }

	// Custom query loop pagination
	get_template_part('pagination');

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; 

	// Reset post data after query reset to reactive page variables below
	wp_reset_postdata(); ?>

	</div><!-- /video thumbnails grid -->
	<!-- 
	/* ================= *\
	*   Donate Banner   *
	\* ================= */ -->
	<?php 
	// define variables for donate CTA at bottom of layout
	$donate_banner_header = get_field('donate_banner_header');
	$donate_banner_copy = get_field('donate_banner_copy');
	$donate_banner_form_embed = get_field('donate_banner_form_embed');

	// load donate CTA ?>
	<div class="wt_donate-banner banner_element">
		<div class="inner-wrap">
			<aside class="wt_donate-banner-header">
				<h1>For $250, you can help save a language</h1>
				<p>
					<strong>*</strong> That's just <strong>$20.84 per month</strong>!
				</p>
			</aside>
			<aside class="wt_donate-banner-form">
				<script src="https://donorbox.org/widget.js" paypalExpress="false"></script><iframe src="https://donorbox.org/embed/wikitongues?amount=20.84&default_interval=m" height="685px" width="100%" style="max-width:500px; min-width:310px; max-height:none!important" seamless="seamless" name="donorbox" frameborder="0" scrolling="no" allowpaymentrequest></iframe>
			</aside>
			<div class="clear"></div>
		</div>
	</div>
	<!--
	[Video Image]
		Featured languages
		// for each of the video's languages
			// grab the name
			Kenyan Sign Language (simple text) (language as variable group)

			// if either ISO code or Glottocode exists
				// if ISO code exists
				ISO code: xki (simple text)
				// else 
				If none: This language is not yet recognized by ISO.

				// if Glottocode exists
				Glottcode: keny1241 (simple text)
				// else
				If none: This language is not yet recognized by Glottolog.

			// if neither exists
				If none: This language is not yet recognized by ISO or Glottolog and may be unclassified by linguists.

		// if status is removed
		This video has been made private.
		// else
			// if distribution links exists, for each
			Youtube [link]
			Wikimedia Commons [link]
			Library of Congress (on-site only) ** this doesn't account for videos that have been made private with the exception of LOC
			// else
			This video is not yet publicly available.
		
		// Grab the video license
			CC-by-NC 4.0 [link]
			Attribution statement: **compose -->

</div>
<?php get_footer(); ?>