<?php /* Template name: Leadership */ get_header(); ?>

<ul class="wt_who-navigation">
	<li class="active">
		<a href="<?php bloginfo('url'); ?>/who/leadership">Leadership</a>
	</li>
	<li>
		<a href="<?php bloginfo('url'); ?>/who/contributors">Contributors</a>
	</li>
	<li>
		<a href="<?php bloginfo('url'); ?>/who/supporters">Supporters</a>
	</li>
</ul>

<?php include( locate_template('components/page-intro.php') ); ?>

<h1>Governing Board</h1>

<div class="wt_face-grid large">

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
			$credentials = get_field('credentials');
			$credentials_title = $credentials['title'];
			$credentials_institution = $credentials['institution_or_company'];
			$location = get_field('location');
			$location_city = $location['city_and_territory'];
			$location_country = $location['country'];
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	} ?>

</div><!-- /two column face grid -->

<h1>Advisory Council</h1>

<div class="wt_face-grid large">

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
			$credentials = get_field('credentials');
			$credentials_title = $credentials['title'];
			$credentials_institution = $credentials['institution_or_company'];
			$location = get_field('location');
			$location_city = $location['city_and_territory'];
			$location_country = $location['country'];
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	} ?>

</div><!-- /two column face grid -->

<h1>Associate Board</h1>

<div class="wt_face-grid small">

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
			$credentials = get_field('credentials');
			$credentials_title = $credentials['title'];
			$credentials_institution = $credentials['institution_or_company'];
			$location = get_field('location');
			$location_city = $location['city_and_territory'];
			$location_country = $location['country'];
			$bio = get_field('bio');

			// load member profile template
			include( locate_template('components/member-profile.php') );
		}

		wp_reset_postdata();
	}  ?>

</div><!-- /two column face grid -->

<?php get_footer(); ?>