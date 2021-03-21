<?php get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital@0;1&display=swap');
</style>

<?php 

$title = get_the_title();
$banner_image = get_field('project_banner_image');
$banner_header = get_field('project_header');
$banner_text = get_field('project_banner_text');
$featured_videos = get_field('featured_videos');

include( 'components/banner.php' );

if ( have_posts() ) {
	while ( have_posts() ) { 
		the_post();

		if ( $title == 'Language Revitalization' ) {
			include( 'components/language-revitalization.php' );
			
		} elseif ( $title == 'Jewish Languages' ) {
			include( 'components/jewish-languages.php' );
			
		} else {
			include( 'components/project-content.php' );
			
		}
	} 
}

get_footer(); ?>