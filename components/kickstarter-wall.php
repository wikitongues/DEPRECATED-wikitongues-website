<?php
// donor query args
$args = array(
	'post_type' => 'donors',
	'meta_query' => array(
						'key' => 'donor_segment',
						'value' => 'Kickstarter'
					),
	'meta_key' => 'total_gifts',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'posts_per_page' => -1
);
// Instantiate contributors query
$donors = new WP_Query( $args );
// Run donors loop
if ( $donors->have_posts() ) {  ?>
<div class="wt_section-intro kickstarter">
	<h2>2016 Kickstarter Backers</h2>
	<!-- more content soon -->
</div>
<div class="wt_face-grid names-only kickstarter">
<?php
	while ( $donors->have_posts() ) { $donors->the_post();
		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		// $location = get_field('contributor_location');
		$bio = get_field('bio');

		include( locate_template('components/member-profile.php') );
	} 
} wp_reset_postdata(); ?>
</div><!-- /.wt_face-grid -->
<!-- CTA read more about Poly -->