<?php get_header(); ?>

<div class="wt_archive-podcast">
	<div class="wt_archive-videos__intro">
		<div class="wt_page-intro wt_page-intro--short">
			<h1>Speaking of Us</h1>
		</div>
	</div>

	<?php
	// video query args
	$args = array(
		'post_type' => 'podcast',
		'posts_per_page' => '10'//,
		// 'meta_key' => 'youtube_publish_date',
		// 'orderby' => 'meta_value_num',
		// 'order' => 'DESC'
	);

	$args['meta_query'] = $meta_query;

	// Get current page and append to custom query parameters array
	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$podcast = new WP_Query( $args );
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $podcast;

	// Run podcast loop
	if ( $podcast->have_posts() ) {  ?>
	<div class="wt_archive-podcast__grid"><!-- podcast thumbnails grid -->
	<?php
		while ( $podcast->have_posts() ) { $podcast->the_post();
			$podcast_title = get_the_title($post);
			$podcast_permalink = get_the_permalink();
			$podcast_thumbnail = get_the_post_thumbnail();
			$podcast_date = get_the_date(); ?>

		<div class="wt_archive-podcast__episode"><?php
			if ( $podcast_thumbnail ): ?>
			<aside class="wt_archive-podcast__thumbnail">
				<a href="<?php echo $podcast_permalink; ?>">
					<?php echo $podcast_thumbnail; ?>
				</a>
			</aside>
			<?php endif; ?>
			<div class="wt_archive-podcast__meta">
				<h2 class="wt_archive-podcast__title">
					<a href="<?php echo $podcast_permalink; ?>">
						<?php echo $podcast_title; ?>
					</a>
				</h2>
				<p class="wt_archive-podcast__date">From <?php echo $podcast_date; ?></p>
			</div>			
		</div><?php
		} 
	} wp_reset_postdata(); 

	// Custom query loop pagination
	get_template_part('components/pagination');

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; 

	// Reset post data after query reset to reactive page variables below
	wp_reset_postdata(); ?>

	</div><!-- /video thumbnails grid -->

</div>
<?php get_footer(); ?>