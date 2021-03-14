<?php
// variables
$project_header = get_field('project_header');
$how_to_help = get_field('how_to_help');
$giveforms_embed_code = get_field('giveforms_embed_code');

// variables
$videos_header = get_field('videos_header');
$videos_copy = get_field('videos_copy'); ?>

<div class="wt_single-projects">
	<h1 class="wt_single-projects__header">
		<?php echo $project_header; ?>
	</h1>
	<div class="wt_single-projects__copy">
		<?php the_content(); ?>
	</div>
	<div class="wt_single-projects__help">
		<h1>How you can help</h1>
			<?php if ( $how_to_help ): ?>
			<p><?php echo $how_to_help; ?></p>
		<?php endif; ?>
		<?php echo $giveforms_embed_code; ?>
		<!-- <p>If you or someone in your community speaks a Jewish language, or you'd like to volunteer your time as a field linguist, <a href="#">sign up</a>.</p> -->
	</div>
	<?php if ( $featured_videos ): ?>
	<div class="wt_single-projects__videos">
		<h1><?php echo $videos_header; ?></h1>
		<p><?php echo $videos_copy; ?></p>
		<?php foreach( $featured_videos as $post ): setup_postdata( $post ); 

		if ( get_field('video_title') ) {
			$video_title = get_field('video_title');
		} else {
			$video_title = get_the_title($post);
		}

		$video_permalink = get_the_permalink();
		$video_thumbnail = get_field('video_thumbnail');
		$featured_languages = get_field('featured_languages');
		$video_description = get_field('video_description');
		$youtube_link = get_field('youtube_link');
		$wikimedia_commons_link = get_field('wikimedia_commons_link');
		$video_license = get_field('video_license');
		$license_link = get_field('license_link');
		$attribution_statement = get_field('attribution');

		include( locate_template('components/video-preview.php') );

		endforeach; wp_reset_postdata(); ?>
	</div>
	<?php endif; ?>
</div>
