<?php /* Template name: Projects */ get_header(); ?>

<h1>projects archive</h1>
<?
/*
include( locate_template('components/page-intro.php') );

// query featured projects array
$featured_projects = get_field('featured_projects');

// start loop
if ( $featured_projects ) {

	// define $i for $i++ loop
	$i;

	foreach ( $featured_projects as $post ) {

		// run $i++ to assign unique IDs to each section
		$i++;

		// initialize post data
		setup_postdata( $post );
		
		// define content variables
		$section_image = get_field('project_banner_image');
		$section_image_caption = get_field('project_image_caption');
		$section_title = get_the_title($post);
		$section_text = get_field('project_excerpt');
		$section_cta = get_field('project_call_to_action');
		$section_cta_link = $section_cta['cta_link'];
		$section_cta_text = $section_cta['cta_text'];
		$section_identifier = 'wt_project';

		// load section template
		include( locate_template('components/section.php') );
	}

	wp_reset_postdata();
}

// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA
include( locate_template('components/donate-banner.php') ); */

get_footer(); ?>