<?php
/* The following variables may be defined for this template:
	$section_image (required)
	$section_image_caption
	$section_title
	$section_text
	$section_cta_link
	$section_cta_text
	$section_identifier
	*/ ?>

<section class="wt_page-section <?php echo $section_identifier; ?>_content-block" id="<?php echo $section_identifier; ?>_content-block-<?php echo $i; ?>">
	<div class="wt_section-content">
		<aside class="wt_section-image">
		<?php
			if ( $section_image ) {
				echo '<img src="' . $section_image['url'] . '" alt="' . $section_image['alt'] . '">';

				if ( $section_image_caption ) {
					echo '<p class="wt_section-image-caption">' . $section_image_caption . '</p>';
				}
			} ?>
		</aside>
		<aside class="wt_section-message">
		<?php
			if ( $section_title ) {
				echo '<h1>' . $section_title . '</h1>' .
					 '<p>' . $section_text . '</h1>' .
           '<br>' .
					 '<a class="wt_cta" href="' . $section_cta_link . '">' . $section_cta_text . '</a>';
			} ?>
	    </aside>
    </div>
	<?php
	if ( $featured_items ) {
		echo '<section class="wt_featured-items">';

			foreach ( $featured_items as $post ) : setup_postdata( $post );

				$featured_item_link = get_field('video_url');
				$featured_item_title = get_the_title();
				$featured_item_text = get_the_excerpt();
				$featured_item_image = get_the_post_thumbnail_url();

				include( locate_template('components/featured-item.php') );

		    endforeach; wp_reset_postdata();

		    // should eventually be configured as editable within the CMS
			echo '<div class="wt_featured-item"><a href="https://youtube.com/wikitongues" target="_blank"><h2>Watch on YouTube</h2></a></div>';
		
		echo '</section>';
	}
	?>
</section>
