<?php /* Template name: Languages */ get_header(); ?>

<div class="wt_page-intro">
	<h1>Every language in the world</h1>
	<p>Here is a directory of every language we have safeguarded, as classified by Ethnologue. It should be noted that not all languages are classified, and there are ongoing debates about how already classified languages are organized. Still, this is a good place to start.</p>
</div>

<?php
// languages query args
$args = array(
	'post_type' => 'languages',
	'posts_per_page' => '100',
	'order' => 'ASC'
);
// Get current page and append to custom query parameters array
$args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$languages = new WP_Query( $args );
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $languages;

// Run languages loop
if ( $languages->have_posts() ) { ?>
<div class="wt_main">
	<?php
	while ( $languages->have_posts() ) { 
		$languages->the_post(); 

		$ISO_code = get_the_title();
		$language_name = get_field('standard_name');
		$language_url = get_the_permalink(); ?>

	<a href="<?php echo $language_url; ?>">
		<?php echo $language_name; ?> [<?php echo $ISO_code; ?>]
	</a>

	<?php		
		}
	} wp_reset_postdata(); ?>
</div>

<?php
// Custom query loop pagination
get_template_part('pagination');

// Reset main query object
$wp_query = NULL;
$wp_query = $temp_query; 

// Reset post data after query reset to reactive page variables below
wp_reset_postdata();

get_footer(); ?>