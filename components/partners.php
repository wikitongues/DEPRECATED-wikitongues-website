<?php
// calculate one year ago
$date = strtotime('-1 year');
$lastyear = date('Ymd', $date);
// donor query args
$args = array(
	'post_type' => 'donors',
	'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'total_gifts',
							'value' => '1000.00',
							'compare' => '>',
							'type' => 'NUMERIC'
						),
						array(
							'key' => 'most_recent_gift',
							'value' => $lastyear,
							'compare' => '>'
						)
					),
	'meta_key' => 'total_gifts',
	'orderby' => 'meta_value_num',
	'order' => 'DESC'
);
// Get current page and append to custom query parameters array
$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
// Instantiate contributors query
$donors = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $donors;
// Run donors loop
if ( $donors->have_posts() ) {  ?>
<div class="wt_section-intro">
	<h1>Partners</h1>
	<p>If you believe in our work and are interested in high-capacity giving, please write us directly at <a href="mailto:hello@wikitongues.org">hello@wikitongues.org</a>.</p>
</div>
<div class="wt_face-grid small">
<?php
	while ( $donors->have_posts() ) { $donors->the_post();
		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		include( locate_template('components/member-profile.php') );
	} 
} wp_reset_postdata(); 

// Custom query loop pagination
get_template_part('pagination');

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query; 

// Reset post data after query reset to reactive page variables below
wp_reset_postdata(); ?>
</div><!-- /.wt_face-grid -->
<!-- CTA: sign up for office hours -->