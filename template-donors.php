<?php /* Template name: Donors */ get_header(); ?>

<?php include( locate_template('components/page-intro.php') ); ?>

<ul class="wt_who-navigation">
	<li>
		<a href="<?php bloginfo('url'); ?>/who/leadership">Leadership</a>
	</li>
	<li>
		<a href="<?php bloginfo('url'); ?>/who/contributors">Contributors</a>
	</li>
	<li class="active">
		<a href="<?php bloginfo('url'); ?>/who/supporters">Supporters</a>
	</li>
</ul>

<h1>Annual Partners</h1>

<div class="wt_face-grid small">

<?php 
	$tier_1_donors = get_field('tier_1_donors');

	// start the loop
	if ( $tier_1_donors ) {

		// define array storing community leader IDs
		$tier_1_donors_ids = array();
		
		foreach ( $tier_1_donors as $post ) { 
			// initialize row data
			setup_postdata($post);

			// define content variables
			$name = get_the_title($post);
			$profile_picture = get_field('profile_picture');
			$credentials = get_field('credentials');
			$credentials_title = $credentials['title'];
			$credentials_institution = $credentials['institution_or_company'];
			$location = get_field('location');
			$location_city = $location['city_and_territory'];
			$location_country = $location['country'];
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );

			// load each community leader ID into array
			$tier_1_donors_ids[] = $post->ID;
		}

		wp_reset_postdata();
	} ?>

</div><!-- /two column face grid -->

<h1>Monthly Supporters</h1>

<div class="wt_face-grid names-only">

<?php 
	$tier_2_donors = get_field('tier_2_donors');

	// start the loop
	if ( $tier_2_donors ) {

		// define array storing featured contributor IDs
		$tier_2_donors_ids = array();
		
		foreach ( $tier_2_donors as $post ) { 
			// initialize row data
			setup_postdata($post);

			// define content variables
			$name = get_the_title($post);
			$profile_picture = get_field('profile_picture');
			$credentials = get_field('credentials');
			$credentials_title = $credentials['title'];
			$credentials_institution = $credentials['institution_or_company'];
			$location = get_field('location');
			$location_city = $location['city_and_territory'];
			$location_country = $location['country'];
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );

			// load each featured contributors ID into array			
			$tier_2_donors_ids[] = $post->ID;
		}

		wp_reset_postdata();
	} ?>

</div><!-- /three column face grid -->

<!-- <h1>Tier 3 Donors</h1>

<div class="wt_names-list">

<?php
	// merge community leader and featured volunteer arrays
	$major_donors = array_merge($tier_1_donor_ids, $tier_2_donors_ids);

	// query all community members
	$small_donors = new WP_Query( 
		array( 
			'post_type' => 'members',
			'category_name' => 'donor',
			'post__not_in' => $major_donors, // exclude tier 1 + 2 donors
			'posts_per_page' => -1 // no return limit
		)
	);

	// start the loop
	if ( $small_donors->have_posts() ) {
		
		while ( $small_donors->have_posts() ) { 
			// initialize row data
			$small_donors->the_post();

			// define content variables
			$name = get_the_title($post);
			$location = get_field('location');

			echo '<div class="wt_name-location"><h2>'.$name.'</h2>'.
				 '<p>'.$location['country'].'</p></div>';
		}

		wp_reset_postdata();
	} ?>

</div> --><!-- /names list -->

<?php get_footer(); ?>
