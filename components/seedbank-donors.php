<?php
// donor query args
$args = array(
	'post_type' => 'donors',
	'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'total_gifts',
							'value' => '249.00',
							'compare' => '>',
							'type' => 'NUMERIC'
						),
						array(
							'key' => 'donor_segment',
							'value' => 'Archive',
							'compare' => 'LIKE'
						)
					),
	'meta_key' => 'total_gifts',
	'orderby' => 'meta_value_num',
	'order' => 'DESC',
	'posts_per_page' => '200'
);
// Get current page and append to custom query parameters array
$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
// Instantiate contributors query
$donors = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $donors;

if ( $donors->have_posts() ) { ?>
	<div class="wt_seedbank-donors">
		<h2 class="wt_seedbank-donors--header">This language archive is made possible by genorous donors</h2>
		<div class="wt_seedbank-donors--names">
			<?php
			while ( $donors->have_posts() ){
				$donors->the_post();

				$name = get_the_title();

				include( locate_template('components/member-profile.php') );
			} wp_reset_postdata(); ?>
		</div>
	</div><?php
}