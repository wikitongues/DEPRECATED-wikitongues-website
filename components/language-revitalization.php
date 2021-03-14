<div class="single-projects__revitalization">
<?php 
	if ( have_rows('revitalization_layout') ) {
		while ( have_rows('revitalization_layout') ) {
			the_row();

			if ( get_row_layout() == 'summary' ) {
				// summary layout variables
				$summary_title = get_sub_field('summary_title');
				$summary_text = get_sub_field('summary_text');

				// summary layout markup
				echo '<div class="wt_content-block">'.
					 '<h1>'.$summary_title.'</h1>'.
					 $summary_text.
					 '</div>';

			} elseif ( get_row_layout() == 'activist_cohort' ) {
				// activist  variable
				$activist = get_sub_field('activist');

				// run loop on activists
				if ( have_rows('activist') ) {
					while ( have_rows('activist') ) {
						the_row();

						// grab variables for individual activist
						$section_image = get_sub_field('activist_image');
						$section_subheader = get_sub_field('activist_subheader');
						$section_header = get_sub_field('activist_title');
						$section_copy = get_sub_field('activist_text');
						$section_action_embed = get_sub_field('giveforms_embed_code');
						$section_action_link = get_sub_field('activist_primary_link_url');
						$section_action_text = get_sub_field('activist_primary_link_text');
						$section_secondary_action_link = get_sub_field('activist_secondary_link_url');
						$section_secondary_action_text = get_sub_field('activist_secondary_link_text');

						include( locate_template('components/section.php') );
					}
				}

			} elseif ( get_row_layout() == 'toolkit' ) {
				// toolkit layout variables
				$toolkit_title = get_sub_field('toolkit_title');
				$toolkit_text = get_sub_field('toolkit_text');

				// toolkit layout markup
				echo '<div class="wt_content-block">'.
					 '<h1>'.$toolkit_title.'</h1>'.
					 $toolkit_text.
					 '</div>';

				$cta_link = get_bloginfo('url').'/toolkit';
				$cta_text = 'Get the toolkit';
				$secondary_cta_link = get_bloginfo('url');
				$secondary_cta_text = 'Or join our activist cohort';

				include( locate_template('components/cta.php') );	
			}
		}
	}
?></div><!-- / .wt_single-projects__revitalization -->