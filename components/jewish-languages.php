<div class="single-projects_jewish">
<?php 
if( have_rows('jewish_languages_layout') ){
	while( have_rows('jewish_languages_layout') ){
		the_row();

		if( get_row_layout() == 'summary' ){
			// summary layout variables
			$header_text = get_sub_field('header_text');
			$copy_text = get_sub_field('copy_text');
			$first_action_text = get_sub_field('first_action_text');
			$first_action_link = get_sub_field('first_action_link');
			$second_action_text = get_sub_field('second_action_text');
			$second_action_link = get_sub_field('second_action_link');

			// summary layout markup
			echo '<div class="wt_content-block">'.
				 '<h1>'.$header_text.'</h1>'.
				 $copy_text.
				 '</div>';

			// calls-to-action

		} elseif ( get_row_layout() == 'languages' ){
			// languages layout variables
			$header_text = get_sub_field('header_text');
			$copy_text = get_sub_field('copy_text');

			echo '<div class="wt_content-block">'.
				 '<h1>'.$header_text.'</h1>'.
				 $copy_text;

			if( have_rows('jewish_languages') ){
				while( have_rows('jewish_languages') ){
					the_row();

					$language_name = get_sub_field('language_name');
					$language_information = get_sub_field('language_information');

					echo '<p>'.
						 '<strong>'.$language_name.'</strong><br />'.
						 $language_information.
						 '</p>';
				}
			}

			echo '</div>';

		} elseif ( get_row_layout() == 'featured_videos' ){
			// featured videos variables
			$header_text = get_sub_field('header_text');
			$copy_text = get_sub_field('copy_text');

			echo '<div class="wt_content-block">'.
				 '<h1>'.$header_text.'</h1>'.
				 $copy_text.
				 '</div>';

			// videos link

		}
	}
}
// define variables for donate CTA at bottom of layout
$donate_header = get_field('donate_header');
$donate_copy = get_field('donate_copy');
$donate_embed = get_field('donate_embed');
$donate_secondary_action_text = get_field('donate_secondary_action_text');
$donate_secondary_action_link = get_field('donate_secondary_action_link');

// load donate CTA
include( locate_template('components/donate-block.php') ); ?>
</div>