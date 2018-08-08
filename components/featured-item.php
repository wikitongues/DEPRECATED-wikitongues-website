<?php
/* The following variables may be defined for this template:
	$featured_item_link (required)
	$featured_item_title
	$featured_item_text
	$featured_item_image
	*/ ?>

<div class="wt_featured-item">
	<!-- on home page, this should link externally to YouTube, not the videos post permalink -->
	<a href="<?php echo $featured_item_link ?>" target="_blank">
		<div class="wt_featured-item-image" style="background:url('<?php echo $featured_item_image; ?>') center center no-repeat;"></div>
		<h2><?php echo $featured_item_title; ?></h2>
		<p><?php echo $featured_item_text; ?></p>
	</a>
	<!-- not sure why this was here? <button class="wt_close-module">Close</button>	 -->
</div>