<?php /* Template name: Team */ get_header(); 
include( locate_template('components/page-intro.php') ); 
include( locate_template('components/team-nav.php') ); 

// vars
$leadership = get_field('leadership');
$advisors = get_field('advisors');
$volunteers = get_field('volunteers');
$interns = get_field('interns'); ?>

<div class="wt_face-grid large">
	<h1>Leadership</h1>
	<p>Governing Board and Staff</p>
	<?php foreach( $leadership as $post ) {
		setup_postdata( $post );

		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		// we might want to change the name of this
		include( locate_template('components/member-profile.php') );
	} wp_reset_postdata(); ?>
	<h1>Advisory Board</h1>
	<p>Field experts who lend their knowledge on a volunteer basis</p>
	<?php foreach( $advisors as $post ) {
		setup_postdata( $post );

		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		// we might want to change the name of this
		include( locate_template('components/member-profile.php') );
	} wp_reset_postdata(); ?>
	<h1>Core Volunteers</h1>
	<p>Individuals who contribute their skillsets to core projects</p>
	<?php foreach( $volunteers as $post ) {
		setup_postdata( $post );

		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		// we might want to change the name of this
		include( locate_template('components/member-profile.php') );
	} wp_reset_postdata(); ?>
	<h1>Interns</h1>
	<p>Students who have completed a semester-long internships for credit</p>
	<?php foreach( $interns as $post ) {
		setup_postdata( $post );

		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$bio = get_field('bio');

		// we might want to change the name of this
		include( locate_template('components/member-profile.php') );
	} wp_reset_postdata(); ?>
</div><!-- /.wt_face-grid -->

<?php
// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA
include( locate_template('components/donate-banner.php') );

get_footer(); ?>