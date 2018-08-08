<?php 

get_header();

	/* =============== *\
	 *   Page Banner   *
	\* =============== */

	// define page banner variables
	$banner_image = get_field('banner_image');
	$banner_text = get_field('banner_text');
	$banner_cta_link = get_field('banner_cta_link');
	$banner_cta_text = get_field('banner_cta_text');
	
	// load page banner template
	include( locate_template('components/banner.php') );

	/* ======================= *\
	 *     New Video Alert     *
	\* ======================= */

	$args = array(
		'post_type' => 'videos', 
		'posts_per_page' => 1
	);
	$video_posts = new WP_Query( $args );

	if ( $video_posts->have_posts() ):

		while ( $video_posts->have_posts() ): $video_posts->the_post();

			the_title();

		endwhile;

	endif; wp_reset_postdata();

	/* ================ *\
	 *     Partners     *
	\* ================ */

	$featured_partners = get_field('partners');

	if ( $featured_partners ):

		echo '<ul>';

		foreach ( $featured_partners as $post ): setup_postdata($post);

			// define content variables
			$wikitongues_url = get_site_url(); // this should be defined globally later
			$partner_logo = get_field('partner_logo');
			$partner_name = $post->the_title; // do we want to include this?
			$partner_website = get_field('partner_website'); // do we want to include this?

			echo '<li>'.
				 '<a href="'.$wikitongues_url.'/partners">'.
				 '<img src="'.$partner_logo['url'].'" alt="'.$partner_logo['alt'].'">'.
				 '</a></li>';

		endforeach; wp_reset_postdata();

		echo '</ul>';

	endif;

	/* ===================== *\
	 *   Featured Sections   *
	\* ===================== */

	// loop through page sections
	if ( have_rows('sections') ): $i; // $i++ assigns unique section IDs

		while ( have_rows('sections') ): $i++; the_row();

			// define page section variables
			$section_image = get_sub_field('section_image');
			$section_title = get_sub_field('section_title');
			$section_text = get_sub_field('section_text');
			$section_cta = get_sub_field('section_cta'); 
			$section_cta_link = $section_cta['cta_link'];
			$section_cta_text = $section_cta['cta_text'];
			$featured_items = get_sub_field('featured_items');
			$section_identifier = 'primary'; // unique section identifier for each $i++ loop

			// load section template
			include( locate_template('components/section.php') );

		endwhile;

	endif;

	/* ================= *\
	 *   Featured News   *
	\* ================= */

	$news_items = get_field('news_items');

	if ( $news_items ): $i = 0; // $i++ assigns unique section IDs

		echo '<h1>Recent News</h1>';
	
		foreach( $news_items as $post ): setup_postdata( $post ); $i++;
			
			// TO DO --> set up vars once medium sync is initialized
			$section_image = get_the_post_thumbnail_url();
			$section_title = get_the_title();
			$section_text = get_the_excerpt();
			$section_cta_link = get_the_permalink();
			$section_cta_text = 'Read More';
			$section_identifier = 'news'; // unique section identifier for each $i++ loop
			$featured_items = null;

			// load section template
			include( locate_template('components/section.php') );
		
		endforeach; wp_reset_postdata();

	endif;

get_footer();