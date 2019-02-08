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

		$i = 0;

		while ( $partners->have_posts() ) {
			// initialize post data
			$partners->the_post();

			$partner_name = get_the_title();

			// define content variables 
			$partner_logo = get_field('partner_logo');
			$partner_website = get_field('partner_website');
			$partner_bio = get_field('partner_bio');

			// assign to row of css grid
			$grid_row = intdiv($i, 4) * 2 + 1;

			// js function to call onclick
			$function_call = 'expandPartner('.$i.')';

			// css grid-row of image
			$style = 'grid-row: '.$grid_row.'/'.($grid_row + 1);

			// css grid-row of expandable profile
			$profile_style = 'grid-row: '.($grid_row + 1).'/'.($grid_row + 2);

			echo '<li class="wt_partner" id="partner-'.$i.'" onclick="'.$function_call.'" style="'.$style.'"><img src="'.$partner_logo['url'].'"></li>';

			// expandable profile component
			include( locate_template('components/partner-profile.php') );

			$i++;
		} 

		wp_reset_postdata();

		echo '</ul>';
	}

get_footer(); ?>

<script>
function expandPartner (i) {
	// collapse all other profiles
	const allProfiles = document.querySelectorAll('.wt_partner-profile');
	allProfiles.forEach(profile => profile.style.display = 'none');

	// expand selected profile
	const profile = document.getElementById(`partner-profile-${i}`);
	profile.style.display = 'block';
}
</script>