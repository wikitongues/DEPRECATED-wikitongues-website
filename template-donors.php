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

<?php 
// locate component templates
// include( locate_template('components/partners.php') ); need to decide what this constitutes
include( locate_template('components/supporters.php') );
include( locate_template('components/kickstarter-wall.php') );

// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA
include( locate_template('components/donate-banner.php') );

get_footer(); ?>