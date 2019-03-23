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
	$n_items_shown = 3;
	if ( $featured_items ) {
		$i_featured_item = 0;
		$n_total_featured_items = count($featured_items);
		
		echo '<section class="wt_featured-items">';

		echo '<div class="wt_featured-items-button">' . 
				'<button id="featured-items-left-'.$i.'" onclick="featuredItemsLeft_'.$i.'()"><</button>' . 
				'</div>';

		foreach ( $featured_items as $post ) : setup_postdata( $post );

			$featured_item_link = get_field('video_url');
			$featured_item_title = get_the_title();
			$featured_item_text = get_the_excerpt();
			$featured_item_image = get_the_post_thumbnail_url();

			$hidden = $i_featured_item >= $n_items_shown;

			include( locate_template('components/featured-item.php') );

			$i_featured_item++;

			endforeach; wp_reset_postdata();
			
			echo '<div class="wt_featured-items-button">' . 
					'<button id="featured-items-right-'.$i.'" onclick="featuredItemsRight_'.$i.'()">></button>' . 
					'</div>';

	    echo '</section>';
	}
	?>
</section>

<script>
var hasFeaturedItems_<?php echo $i ?> = <?php echo $featured_items ? 'true' : 'false'; ?>;
var nTotalFeaturedItems_<?php echo $i ?> = <?php echo $n_total_featured_items ? $n_total_featured_items : 0 ?>;
var featuredItemsPosition_<?php echo $i ?> = 0;

if (hasFeaturedItems_<?php echo $i ?>) {
	var nFeaturedItemsShown = <?php echo $n_items_shown ?>;

	var leftButton = document.getElementById('featured-items-left-<?php echo $i ?>');
	var rightButton = document.getElementById('featured-items-right-<?php echo $i ?>');

	leftButton.style.display = 'none';

	if (nTotalFeaturedItems_<?php echo $i ?> <= nFeaturedItemsShown) {
		rightButton.style.display = 'none';
	}
}

function featuredItemsLeft_<?php echo $i ?> () {
	var itemToHide = document.getElementById('featured-item-' + (featuredItemsPosition_<?php echo $i ?> + nFeaturedItemsShown - 1));
	var itemToShow = document.getElementById('featured-item-' + (featuredItemsPosition_<?php echo $i ?> - 1));

	itemToHide.style.display = 'none';
	itemToShow.style.display = 'inline-block';

	var leftButton = document.getElementById('featured-items-left-<?php echo $i ?>');
	var rightButton = document.getElementById('featured-items-right-<?php echo $i ?>');

	rightButton.style.display = 'inline-block';

	featuredItemsPosition_<?php echo $i ?>--;

	if (featuredItemsPosition_<?php echo $i ?> === 0) {
		leftButton.style.display = 'none';
	}
}

function featuredItemsRight_<?php echo $i ?> () {
	var itemToHide = document.getElementById('featured-item-' + featuredItemsPosition_<?php echo $i ?>);
	var itemToShow = document.getElementById('featured-item-' + (featuredItemsPosition_<?php echo $i ?> + nFeaturedItemsShown));

	itemToHide.style.display = 'none';
	itemToShow.style.display = 'inline-block';

	var leftButton = document.getElementById('featured-items-left-<?php echo $i ?>');
	var rightButton = document.getElementById('featured-items-right-<?php echo $i ?>');

	leftButton.style.display = 'inline-block';

	featuredItemsPosition_<?php echo $i ?>++;

	if (featuredItemsPosition_<?php echo $i ?> >= nTotalFeaturedItems_<?php echo $i ?> - nFeaturedItemsShown) {
		rightButton.style.display = 'none';
	}
}
</script>