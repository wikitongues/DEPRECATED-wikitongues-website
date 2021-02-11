<?php /* Template name: Toolkit */ get_header();

// define page banner variables
$banner_image = get_field('banner_image');
$banner_header = get_field('banner_header');
$banner_text = get_field('banner_text');
$banner_cta_link = get_field('banner_cta_link');
$banner_cta_text = get_field('banner_cta_text');

// load page banner template
include( locate_template('components/banner.php') );

echo '<main class="wt_toolkit-page">';

// load page intro
include( locate_template('components/page-intro.php') ); 

// query featured resources array
$featured_resources = get_field('featured_resources');

// start the loop
if ( have_rows('featured_resources') ) {

	while ( have_rows('featured_resources') ) {

		the_row();

		// define content variables
		$featured_item_link = get_sub_field('featured_resource_link');
		$featured_item_title = get_sub_field('featured_resource_title');
		$featured_item_text = get_sub_field('featured_resource_text');
		$featured_item_image = get_sub_field('featured_resource_image')['url'];

		// load featured item template
		include( locate_template('components/featured-item.php') );

	}
}

echo '</main>';

get_footer(); ?>