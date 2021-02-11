<?php

get_header();

	/* =============== *\
	 *   Page Banner   *
	\* =============== */

	// re-define page banner variables
	$banner_image = get_field('banner_image');
	$banner_header = get_field('banner_header');
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

	/* ============ *\
	 *   Features   *
	\* ============ */

	if ( have_rows('features') ) {
		while ( have_rows('features') ) {
			// initiate data
			the_row();

			// define variables
			$feature_image = get_sub_field('feature_image');
			$feature_subheader = get_sub_field('feature_subheader');
			$feature_title = get_sub_field('feature_title');
			$feature_copy = get_sub_field('feature_copy');
			$feature_action_text = get_sub_field('feature_action_text');
			$feature_action_link = get_sub_field('feature_action_link');
			$feature_secondary_action_text = get_sub_field('feature_secondary_action_text');
			$feature_secondary_action_link = get_sub_field('feature_secondary_action_link');

			// load feature template
			include( locate_template('components/feature.php') );
		}
	}

	/* ============ *\
	 *   Projects   *
	\* ============ */

	// loop through page sections
	if ( have_rows('projects') ) {
		while ( have_rows('projects') ) {
			// initiate data
			the_row();

			// define page section variables
			$section_image = get_sub_field('project_image');
			$section_subheader = get_sub_field('project_subheader');
			$section_header = get_sub_field('project_title');
			$section_copy = get_sub_field('project_text');
			$section_action_text = get_sub_field('project_action_text');
			$section_action_link = get_sub_field('project_action_link');
			$section_action_embed = get_sub_field('project_action_embed');
			$section_secondary_action_link = get_sub_field('project_secondary_action_link');
			$section_secondary_action_text = get_sub_field('project_secondary_action_text');

			// load section template
			include( locate_template('components/section.php') );
		}
	}

	/* ================= *\
	 *   Donate Block   *
	\* ================= */

	// define variables for donate CTA at bottom of layout
	$donate_header = get_field('donate_header');
	$donate_copy = get_field('donate_copy');
	$donate_embed = get_field('donate_embed');
	$donate_secondary_action_text = get_field('donate_secondary_action_text');
	$donate_secondary_action_link = get_field('donate_secondary_action_link');

	// load donate CTA
	include( locate_template('components/donate-block.php') );

get_footer();
