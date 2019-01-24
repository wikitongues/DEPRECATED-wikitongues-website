<?php

get_header();

	/* =============== *\
	 *   Page Banner   *
	\* =============== */

	// define page banner variables
	$banner_image = get_field('banner_image');
	$banner_image_caption = get_field('banner_image_caption');
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

			// define page banner variables
			$alert_link = get_field('video_url');
			$alert_title = get_the_title();
			$alert_text = get_the_excerpt();
			$alert_image = get_the_post_thumbnail_url();

			// include alert template
			include( locate_template('components/alert.php') );

		endwhile;

	endif; wp_reset_postdata();

	/* ================ *\
	 *     Partners     *
	\* ================ */

	$featured_partners = get_field('partners');

	if ( $featured_partners ):

		echo '<ul class="wt_featured-partners">';

		foreach ( $featured_partners as $post ): setup_postdata($post);

			// define content variables
			$wikitongues_url = get_site_url(); // this should be defined globally later
			$partner_logo = get_field('partner_logo');
			$partner_name = $post->the_title; // do we want to include this?
			$partner_website = get_field('partner_website'); // do we want to include this?

			echo '<li>'.
				 '<a href="'.$wikitongues_url.'/our_partners">'.
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
			$section_image_caption = get_sub_field('section_image_caption');
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

		echo '<h1 id="wt_blog-title">From the blog</h1>';

		foreach( $news_items as $post ): setup_postdata( $post ); $i++;

			// define section variables
			$section_image = get_field('blog_featured_image');
			$section_image_caption = null;
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
