<?php /* Template name: Donate */ get_header(); 

// define content variables for page banner
$banner_image = get_field('banner_image');
$banner_header = get_field('banner_header');
$banner_copy = get_field('banner_copy');
$banner_form_embed = get_field('banner_form_embed');

// load banner template
include( locate_template('components/donate-banner.php') );

// loop through page sections
if ( have_rows( 'page_sections' ) ) {

	while ( have_rows( 'page_sections') ) {

		//initialize row data
		the_row();

		// define page section variables
		$section_image = get_sub_field('section_image');
		$section_title = get_sub_field('section_title');
		$section_text = get_sub_field('section_text');
		$section_cta_link = get_sub_field('section_cta_link');
		$section_cta_text = get_sub_field('section_cta_text');
		$featured_items = get_sub_field('featured_items');
		$section_identifier = 'wt_donor-justification'; // unique section identifier for each $i++ loop

		// load section template
		include( locate_template('components/section.php') );
	}
}

get_footer(); ?>