<?php /* Template name: Community */ get_header();

include( locate_template('components/page-intro.php') );

$current_page = 'contributors';
include( locate_template('components/team-nav.php') ); 

// Custom Query args
$args = array( 
	'post_type' => 'contributors',
	'meta_key' => 'total_video_count', // can we sort by multiple values (i.e., count, then date added, and so on...?
	'orderby' => 'meta_value_num',
	'order' => 'DESC'
 );
// Get current page and append to custom query parameters array
$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
// Instantiate contributors query
$contributors = new WP_Query( $args ); 
// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $contributors;
// Run contributors loop
if ( $contributors->have_posts() ) {  ?>

<div class="wt_face-grid small">
<?php
	while ( $contributors->have_posts() ) { $contributors->the_post();
		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		include( locate_template('components/member-profile.php') );
	} 
} wp_reset_postdata(); 

// Custom query loop pagination
get_template_part('components/pagination');

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query; 

// Reset post data after query reset to reactive page variables below
wp_reset_postdata(); ?>
</div><!-- /.wt_face-grid -->

<?php
// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA
include( locate_template('components/donate-banner.php') );

get_footer(); ?>