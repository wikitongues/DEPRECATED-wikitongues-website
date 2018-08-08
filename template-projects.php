<!-- URGENT - need to resolve projects post type and template slug conflict -->

<?php /* Template name: Projects */ get_header();

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
		$section_title = get_the_title($post);
		$section_text = get_field('project_excerpt');
		$section_cta = get_field('project_call_to_action');
		$section_identifier = 'wt_project';

		// load section template
		include( locate_template('components/section.php') );
	}

	wp_reset_postdata();
}

// define variables for donate CTA at bottom of layout
$banner_image = get_field('banner_image');
$banner_text = get_field('banner_text');
$banner_form_embed = get_field('banner_form_embed');

// load donate CTA
include( locate_template('components/form-banner.php') );

get_footer(); ?>