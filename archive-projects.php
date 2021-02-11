<?php /* Template name: Projects */ get_header(); ?>

<h1>Current Projects</h1>

<?php
// start loop
if ( have_posts() ) {

	while ( have_posts() ) {

		// initialize post data
		the_post();
		
		// define content variables
		$section_image = get_field('project_banner_image');
		$section_subheader = get_field('project_subheader');
		$section_header = get_the_title();
		$section_copy = get_field('project_excerpt');
		$section_action_embed;
		$section_action_link = get_field('project_call_to_action')['cta_link'];
		$section_action_text = get_field('project_call_to_action')['cta_text'];
		$section_secondary_action_link = get_field('project_secondary_action')['cta_link'];
		$section_secondary_action_text = get_field('project_secondary_action')['cta_text'];

		// load section template
		include( locate_template('components/section.php') );
	}

	wp_reset_postdata();
}

get_footer(); ?>