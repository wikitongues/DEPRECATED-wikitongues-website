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
	 *    Newsletter Signup    *
	\* ======================= */


	$form_embed_code = get_field('form_embed_code');

	include( locate_template('components/newsletter.php') );

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

	$blog_posts = get_field('blog_posts');

	if ( $blog_posts ): $i = 0; // $i++ assigns unique section IDs

		echo '<h1 id="wt_blog-title">Dive Deeper</h1>';

		foreach( $blog_posts as $post ): setup_postdata( $post ); $i++;

			// define section variables
			$section_image = get_field('blog_featured_image');
			$section_image_caption = null;
			$section_title = get_the_title();
			$section_text = get_the_excerpt();
			$section_cta_link_alt = get_field('post_permalink');
			$section_cta_link = get_the_permalink();
			$section_cta_text = 'Read This';
			$section_identifier = 'news'; // unique section identifier for each $i++ loop
			$featured_items = null;

			// load section template
			include( locate_template('components/section.php') );

		endforeach; wp_reset_postdata();

	endif;

	/* =================== *\
	 *   Featured Press    *
	\* =================== */

	$featured_press = get_field('featured_press');

	if ( $featured_press ):

		echo '<h2 class="wt_featured-press-title">We\'re Featured In</h2>';

		echo '<ul class="wt_featured-press">';

		foreach ( $featured_press as $post ): setup_postdata($post);

			//define content variables
			$press_logo = get_the_post_thumbnail_url();
			$press_url = get_field('press_item_url');
			$press_title = $post->post_title;

			echo '<li>'.
				 '<a href="'.$press_url.'">'.
				 '<img src="'.$press_logo.'" alt="'.$press_title.'">'.
				 '</a></li>';

		endforeach; wp_reset_postdata();

		echo '</ul>';

	endif;

	/* ================ *\
	 *     Partners     *
	\* ================ */

	$featured_partners = get_field('partners');

	if ( $featured_partners ):

		echo '<h2 class="wt_featured-partners-title">We Work With</h2>';

		echo '<ul class="wt_featured-partners">';

		foreach ( $featured_partners as $post ): setup_postdata($post);

			// define content variables
			$wikitongues_url = get_site_url(); // this should be defined globally later
			$partner_logo = get_field('partner_logo');
			$partner_name = $post->post_title; // do we want to include this?
			$partner_website = get_field('partner_website'); // do we want to include this?

			echo '<li>'.
				 '<a href="'.$partner_website.'">'.
				 '<img src="'.$partner_logo['url'].'" alt="'.$partner_logo['alt'].'">'.
				 '<h3>'.$partner_name.'</h3>'.
				 '</a></li>';

		endforeach; wp_reset_postdata();

		echo '</ul>';

	endif;

	/* ================= *\
	 *   Donate Banner   *
	\* ================= */

	// define variables for donate CTA at bottom of layout
	$donate_banner_header = get_field('donate_banner_header');
	$donate_banner_copy = get_field('donate_banner_copy');
	$donate_banner_form_embed = get_field('donate_banner_form_embed');

	// load donate CTA
	include( locate_template('components/donate-banner.php') );

	/* ================= *\
	 *   Popup Notice    *
	\* ================= */
	//include( locate_template('components/popup-notice.php') );

get_footer();
