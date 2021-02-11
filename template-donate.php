<?php /* Template name: Donate */ get_header(); 

// define content variables for page banner
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load banner template
include( locate_template('components/donate-banner.php') );

/*
// loop through page sections
if ( have_rows( 'sections' ) ) {

	// begin count for unique section IDs
	$i; 

	while ( have_rows( 'sections') ) {

		// run count while loop runs
		$i++;

		//initialize row data
		the_row();

		// define page section variables
		$section_image = get_sub_field('section_image');
		$section_image_caption = get_sub_field('section_image_caption');
		$section_title = get_sub_field('section_title');
		$section_text = get_sub_field('section_text');
		$section_cta = get_sub_field('section_cta');
		$section_cta_link = $section_cta['cta_link'];
		$section_cta_text = $section_cta['cta_text'];
		$featured_items = get_sub_field('featured_items');
		$section_identifier = 'wt_donor-justification'; // unique section identifier for each $i++ loop

		// load section template
		include( locate_template('components/section.php') );
	}
} */?>

<!-- <div class="wt_newsletter-signup-wrapper">
	<h1>Still not sure?</h1>
	<?php 
		$form_embed_code = get_field('form_embed_code');

		// include( locate_template('components/newsletter-deprecated.php') ); ?>
</div>
 -->
<?php get_footer(); ?>