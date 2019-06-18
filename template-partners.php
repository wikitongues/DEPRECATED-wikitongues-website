<?php /* Template name: Partners */ get_header(); ?>

<!-- URGENT - need to resolve partners post type and template slug conflict -->

<?php include( locate_template('components/page-intro.php') ); ?>

<?php
	$partners = new WP_Query(
		array(
			'post_type' => 'partners',
			'orderby' => 'menu_order'
		));

	// start the loop
	if ( $partners->have_posts() ) {

		echo '<ul id="wt_full-partners-list">';

		while ( $partners->have_posts() ) {
			// initialize post data
			$partners->the_post();

			// define content variables 
			$partner_logo = get_field('partner_logo');
			$partner_website = get_field('partner_website');
			$partner_bio = get_field('partner_bio');

			echo '<li class="wt_partner"><img src="'.$partner_logo['url'].'"></li>';

		} 

		wp_reset_postdata();

		echo '</ul>';
	}

get_footer(); ?>