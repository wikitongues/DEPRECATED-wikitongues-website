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
</div>
