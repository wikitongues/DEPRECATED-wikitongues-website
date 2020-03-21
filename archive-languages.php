<?php /* Template name: Languages */ get_header(); ?>

<div class="wt_archive-languages">
	<div class="wt_page-intro">
		<h1>Every language in the world</h1>
		<p>Here is a directory of every language we have safeguarded, as classified by Ethnologue. It should be noted that not all languages are classified, and there are ongoing debates about how already classified languages are organized. Still, this is a good place to start.</p>

		<!-- Search form -->
		<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get" class="wt_archive-languages__searchform">
			<input id="languages_search" maxlength="150" name="languages_search" size="20" type="text" value="" class="txt" placeholder="Search languages" />
			<input name="post_type" type="hidden" value="languages" />
			<input id="searchsubmit" class="btn" type="submit" value="Search" />
		</form>
	</div>

	<?php
	// languages query args
	$args = array(
		'post_type' => 'languages',
		'posts_per_page' => '100',
		'order' => 'ASC'
	);

	$languages_search = get_query_var('languages_search');

	if (!empty($languages_search)) {
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
			$language_url = get_the_permalink(); ?>

		<a class="wt_archive-languages__link" href="<?php echo $language_url; ?>">
			<?php echo $language_name; ?> [<?php echo $ISO_code; ?>]
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
		<?php }

	// Custom query loop pagination
	get_template_part('pagination');

	// Reset main query object
	$wp_query = NULL;
	$wp_query = $temp_query; 

	// Reset post data after query reset to reactive page variables below
	wp_reset_postdata();

	?>
</div>

<?php get_footer(); ?>