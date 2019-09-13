<?php /* Template name: Leadership */ get_header(); ?>

<?php include( locate_template('components/page-intro.php') ); ?>

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
<?php
// Custom Query args
$args = array( 
	'post_type' => 'leadership',
	'meta_key' => 'appearance_order',
	'orderby' => 'meta_value_num',
	'order' => 'ASC'
 );
// Instantiate leadership query
$leadership = new WP_Query( $args ); 
// Run leadership loop
if ( $leadership->have_posts() ) {  ?>

<div class="wt_face-grid large">
<?php
	while ( $leadership->have_posts() ) { $leadership->the_post();
		$name = get_the_title($post);
		$profile_picture = get_field('profile_picture');
		$location = get_field('contributor_location');
		$title = get_field('leadership_title');
		$bio = get_field('bio');

		include( locate_template('components/member-profile.php') );
	} 
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