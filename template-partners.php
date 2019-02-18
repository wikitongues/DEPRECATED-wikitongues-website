<?php /* Template name: Partners */ get_header(); ?>

<!-- URGENT - need to resolve partners post type and template slug conflict -->

<?php include( locate_template('components/page-intro.php') ); ?>

<?php
	$partners = new WP_Query(
		array(
			'post_type' => 'partners',
			'orderby' => 'menu_order'
		));

	// number of partners per row of grid
	$partners_per_row = 4;

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
			// grid contains row of partner images, followed by expandable profiles of each partner in row
			// profile gets entire row
			$grid_row = intdiv($i, $partners_per_row) * ($partners_per_row + 1) + 1;

			// js function to call onclick
			$function_call = 'expandPartner('.$i.', '.$partners_per_row.')';

			// css grid-row of image
			$style = 'grid-row: '.$grid_row;

			// css grid-row of expandable profile
			$profile_style = 'grid-row: '.($grid_row + 1 + $i % $partners_per_row).'; grid-column: span '.$partners_per_row;

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
// index of currently expanded partner
var expandedPartner = -1;

function expandPartner (i, partnersPerRow) {
	// collapse all other profiles
	const allProfiles = document.querySelectorAll('.wt_partner-profile');
	allProfiles.forEach(profile => profile.classList.remove('expanded'));

	// hide carat for all other partners
	const allLogos = document.querySelectorAll('.wt_partner');
	allLogos.forEach(logo => logo.classList.remove('selected'));

	if (i === expandedPartner) {
		// currently expanded partner clicked; expand no profile
		expandedPartner = -1;
		allProfiles.forEach(profile => profile.classList.remove('row-expanded'));
	} else {
		// expand selected profile
		const profile = document.getElementById(`partner-profile-${i}`);
		profile.classList.add('expanded');

		const row = Math.floor(i / partnersPerRow);
		if (row !== Math.floor(expandedPartner / partnersPerRow)) {
			// partner not in same row as currently expanded partner
			allProfiles.forEach(profile => profile.classList.remove('row-expanded'));

			for (let j = row * partnersPerRow; j < (row + 1) * partnersPerRow; j++) {
				let profileInRow = document.getElementById(`partner-profile-${j}`);

				// row-expanded triggers animated transition
				profileInRow.classList.add('row-expanded');
			}

			profile.scrollIntoView({
				behavior: 'smooth',
				block: 'center',
				inline: 'start'
			});
		}

		// show carat attached to profile panel pointing to logo in grid
		const logo = document.getElementById(`partner-${i}`);
		logo.classList.add('selected');

		expandedPartner = i;
	}
}
</script>