<?php /* Template name: Videos */ get_header(); ?>

<?php include( locate_template('components/page-intro.php') ); ?>

<?php
// video query args
$args = array(
	'post_type' => 'videos'
);
// Get current page and append to custom query parameters array
$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$video = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $video;

// Run video loop
if ( $video->have_posts() ) {  ?>
<div><!-- video thumbnails grid -->
<?php
	while ( $video->have_posts() ) { $video->the_post();
		$video_title = get_the_title($post);
		$video_thumbnail = get_field('video_thumbnail');
		$featured_languages = get_field('featured_languages');
		$video_description = get_field('video_description');
		$youtube_link = get_field('youtube_link');
		$wikimedia_commons_link = get_field('wikimedia_commons_link');
		$video_license = get_field('video_license');
		$license_link = get_field('license_link');
		$attribution_statement = get_field('attribution_statement');
		$public_status = get_field('public_status');

		include( locate_template('components/video-thumbnail.php') );
	} 
} wp_reset_postdata(); 

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

// load donate CTA
include( locate_template('components/donate-banner.php') ); ?>
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

<?php get_footer(); ?>