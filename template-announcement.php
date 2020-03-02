<?php /* Template name: Announcement */ get_header(); ?>
	
	<?php 
	// banner variables
	$banner_image = get_field('banner_image');
	$banner_text = get_field('banner_text');
	$banner_cta_link = get_field('banner_cta_link');
	$banner_cta_text = get_field('banner_cta_text'); 
	
	// grab banner template
	include( locate_template('components/banner.php') );

	// initiate content loop
	if (have_posts()): while (have_posts()) : the_post(); ?>

	<div class="wt_announcement-page">
		<!-- title -->
		<h1 class="wt_announcement-page__title"><?php the_title(); ?></h1>
		
		<!-- content -->
		<div class="wt_announcement-page__content">

			<?php the_content(); ?>

			<br class="clear">

			<a class="wt_cta" href="' . $banner_cta_link . '">' . $banner_cta_text . '</a>
		</div>
		<!-- /content -->
	</div>

	<?php endwhile; endif; ?>
	<!-- /section -->

<?php get_footer(); ?>