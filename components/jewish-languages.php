<div class="single-projects__jewish">
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
			$second_action_embed = get_sub_field('second_action_embed');

			// summary layout markup
			echo '<div class="wt_content-block">'.
				 '<h1>'.$header_text.'</h1>'.
				 $copy_text.
				 '<a class="wt_primary-action" href="'.$first_action_link.'">'.
				 $first_action_text.
				 '</a>'.
				 $second_action_embed.
				 '<a id="target" class="wt_donate__secondaryaction" href="#target"><i class="fal fa-arrow-to-bottom"></i><span>Or keep reading</span></a>'.
				 '</div>';

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
			$videos = get_sub_field('videos');

			echo '<div class="wt_content-block">'.
				 '<h1>'.$header_text.'</h1>'.
				 $copy_text.
				 '</div>';

			if( $videos ) {
				foreach( $videos as $post ){
					setup_postdata( $post );

					if ( get_field('video_title') ) {
						$video_title = get_field('video_title');
					} else {
						$video_title = get_the_title($post);
					}

					$video_permalink = get_the_permalink();
					$video_thumbnail = get_field('video_thumbnail');
					$featured_languages = get_field('featured_languages');
					$video_description = get_field('video_description');
					$dropbox_link = get_field('dropbox_link');
					$youtube_link = get_field('youtube_link');
					$wikimedia_commons_link = get_field('wikimedia_commons_link');
					$video_license = get_field('video_license');
					$license_link = get_field('license_link');
					$attribution_statement = get_field('attribution');

					include( locate_template('components/video-preview.php') );
				} 
				wp_reset_postdata();
			}
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