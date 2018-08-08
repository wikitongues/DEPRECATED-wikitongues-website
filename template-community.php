<?php /* Template name: Community */ get_header(); ?>

<?php include( locate_template('components/page-intro.php') ); ?>

<h1>Community Leaders</h1>

<?php 
	$community_leaders = get_field('community_leaders');

	// start the loop
	if ( $community_leaders ) {

		// define array storing community leader IDs
		$community_leaders_ids = array();
		
		foreach ( $community_leaders as $post ) { 
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

			// load each community leader ID into array
			$community_leaders_ids[] = $post->ID;
		}

		wp_reset_postdata();
	} ?>

<h1>Volunteers</h1>

<?php 
	$featured_contributors = get_field('featured_contributors');

	// start the loop
	if ( $featured_contributors ) {

		// define array storing featured contributor IDs
		$featured_contributors_ids = array();
		
		foreach ( $featured_contributors as $post ) { 
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

			// load each featured contributors ID into array			
			$featured_contributors_ids[] = $post->ID;
		}

		wp_reset_postdata();
	} ?>

<h1>Contributors</h1>

<?php
	// merge community leader and featured volunteer arrays
	$featured_volunteers = array_merge($community_leaders_ids, $featured_contributors_ids);

	// query all community members
	$community_members = new WP_Query( 
		array( 
			'post_type' => 'members',
			'post__not_in' => $featured_volunteers, // exclude leaders, featured volunteers
			'category__not_in' => '4', // exclude board members, advisors, associates
			'posts_per_page' => -1 // no return limit
		)
	);

	// start the loop
	if ( $community_members->have_posts() ) {
		
		while ( $community_members->have_posts() ) { 
			// initialize row data
			$community_members->the_post();

			// define content variables
			$name = get_the_title($post);
			$location = get_field('location');

			echo '<h2>'.$name.'</h2>'.
				 '<p>'.$location['country'].'</p>';
		}

		wp_reset_postdata();
	} ?>

<?php get_footer(); ?>