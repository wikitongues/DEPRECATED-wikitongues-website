<?php 
/* The following variables may be defined for this template:
	$banner_image;
	$banner_image_caption;
	$banner_text;
	$banner_form_embed;
	$banner_form_shortcode;
	*/ ?>

<div class="wt_donate-banner bannet_element" style="background:url('<?php echo $banner_image; ?>') center center no-repeat;">
	<aside class="wt_donate-banner-content">
	<?php 
		if ( $banner_text ) { 

			echo '<h1>' . $banner_text . '</h1>'; 

		}

		if ( $banner_form_embed ) {
			
			echo $banner_form_embed;	
	
		} else { 

			echo do_shortcode( $banner_form_shortcode );

		} ?>
	</aside>
	<p class="wt_banner-image-caption">
	<?php
		if ( $banner_image_caption ) {
			echo $banner_image_caption;
		} ?>
	</p>
</div>
