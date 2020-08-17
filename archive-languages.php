<?php /* Template name: Languages */ get_header(); ?>

<div class="wt_archive-languages">
	<div class="wt_page-intro">
	<?php
	// languages query args
	$args = array(
		'post_type' => 'languages',
		'posts_per_page' => '30',
		'order' => 'ASC'
	);

	$languages_search = get_query_var('languages_search'); 

	if ($languages_search): ?>

	<h2><?php echo "Showing results for \"" . $languages_search . "\""; ?>
		
	<?php else: ?>
	
	<h2>Every language in the world</h2>

	<?php endif; ?>
	</h2>
	</div>

	<?php if (!empty($languages_search)) {
		$args['meta_query'] = array(
			array(
				'key' => 'wt_id',
				'value' => $languages_search,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'standard_name',
				'value' => $languages_search,
				'compare' => 'LIKE'
			),
			array(
				'key' => 'alternate_names',
				'value' => $languages_search,
				'compare' => 'LIKE'
			),
			'relation' => 'OR'
		);
	}

	// Get current page and append to custom query parameters array
	$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$languages = new WP_Query( $args );
	$temp_query = $wp_query;
	$wp_query   = NULL;
	$wp_query   = $languages;

	// Run languages loop
	if ( $languages->have_posts() ) { ?>
	<div class="wt_archive-languages__main">
		<?php
		while ( $languages->have_posts() ) { 
			$languages->the_post(); 

			$ISO_code = get_the_title();
			$language_name = get_field('standard_name');
			$language_url = get_the_permalink(); 
			$speakers_recorded = get_field('speakers_recorded');
			$lexicon_source = get_field('lexicon_source');
			$video_count = sizeOf($speakers_recorded);
			$lexicon_count = sizeOf($lexicon_source); ?>

		<a class="wt_archive-languages__link" href="<?php echo $language_url; ?>">
			<h3><?php echo $language_name; ?> [<?php echo $ISO_code; ?>]</h3>
			<span><?php echo $video_count . " videos recorded"; ?></span><br>
			<span><?php	echo $lexicon_count . " lexicon documents"; ?></span>
		</a>

		<?php		
			}
		} else { // No languages matching search query ?>
			<div class="wt_archive-languages__no-search-results">
				<p>No languages to show</p>
				<a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
			</div>
		<?php }
		wp_reset_postdata(); 
		?>
	</div>

	<?php // Link to all videos if search query is applied
		if (!empty($languages_search) && $languages->have_posts()) { ?>
			<div class="wt_archive-languages__all-languages">
				<a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
			</div>
		<?php } ?>

	<div class="wt_archive-languages__pagination">
		<?php
		// Custom query loop pagination
		get_template_part('components/pagination');
		?>
	</div>

	<?php

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; 

	// Reset post data after query reset to reactive page variables below
	wp_reset_postdata();

	?>
</div>

<?php get_footer(); ?>