<?php
/* The following variables may be defined for this template:
	$banner_image (required)
	$banner_image_caption
	$banner_text
	$banner_cta_link
	$banner_cta_text
	*/ ?>

<div class="wt_banner banner-element" style="background:url('<?php echo $banner_image; ?>') center center no-repeat;">
	<aside class="wt_banner-message">
	<?php 
		if ( $banner_text ) { 
			echo '<h1>' . $banner_text . '</h1>'; 
		} 
		
		if ( $banner_cta_link ) { 
			echo '<a class="wt_cta" href="' . $banner_cta_link . '">' . $banner_cta_text . '</a>'; 
		} ?>
	</aside>
	<p class="wt_banner-image-caption">
	<?php
		if ( $banner_image_caption ) {
			echo $banner_image_caption;
		} ?>
	</p>
</div>