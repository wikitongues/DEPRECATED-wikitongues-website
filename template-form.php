<?php /* Template name: Submission Form */ get_header(); 

// define content variables for page banner
$banner_image = get_field('banner_image');
$banner_text = get_field('banner_text');
$banner_form_shortcode = get_field('banner_form_shortcode');

// load banner template
include( locate_template('components/form-banner.php') );

echo '<main class="main">';

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

// start the loop
// if ( $featured_resources ) {

// 	foreach ( $featured_resources as $post ) {
		
// 		// initialize post data
// 		setup_postdata( $post );

// 		// define content variables
// 		$featured_item_link = get_sub_field('featured_resource_link');
// 		$featured_item_title = get_sub_field('featured_resource_title');
// 		$featured_item_text = get_sub_field('featured_resource_text');
// 		$featured_item_image = get_sub_field('featured_resource_image');

// 		echo $featured_item_title;

// 		// load featured item template
// 		include( locate_template('components/featured-item.php') );
// 	}

// 	wp_reset_postdata( $post );

// }

echo '</main>';

get_footer();