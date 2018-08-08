<?php /* Template name: Leadership */ get_header(); ?>

<?php include( locate_template('components/page-intro.php') ); ?>

<h1>Governing Board</h1>

<?php 
	$board_members = get_field('board_members');

	// start the loop
	if ( $board_members ) {
		
		foreach ( $board_members as $post ) { 
			// initialize row data
			setup_postdata($post);

			// define content variables
			$name = get_the_title($post);
			$profile_picture = get_field('profile_picture');
			$location = get_field('location');
			$credentials = get_field('credentials');
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	} ?>

<h1>Advisory Council</h1>

<?php 
	$advisors = get_field('advisors');

	// start the loop
	if ( $advisors ) {
		
		foreach ( $advisors as $post ) { 
			// initialize row data
			setup_postdata($post);

			// define content variables
			$name = get_the_title($post);
			$profile_picture = get_field('profile_picture');
			$location = get_field('location');
			$credentials = get_field('credentials');
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	} ?>

<h1>Associate Board</h1>

<?php 
	$associates = get_field('associates');

	// start the loop
	if ( $associates ) {
		
		foreach ( $associates as $post ) { 
			// initialize row data
			setup_postdata($post);

			// define content variables
			$name = get_the_title($post);
			$profile_picture = get_field('profile_picture');
			$location = get_field('location');
			$credentials = get_field('credentials');
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	} 

get_footer(); ?>