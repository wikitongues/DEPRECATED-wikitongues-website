<?php 
/* The following variables may be defined for this template:
	$banner_image;
	$banner_image_caption;
	$banner_header;
	$banner_copy;
	$banner_form_embed;
	$banner_form_shortcode;
	*/ ?>

<div class="wt_donate-banner bannet_element" style="background:url('<?php echo $banner_image; ?>') center center no-repeat;">
	<aside class="wt_donate-banner-content">
	<?php 
		if ( $banner_header ) { 

			echo '<h1>' . $banner_header . '</h1>'; 

		}

		if ( $banner_copy ) {

			echo '<p>' . $banner_copy . '</p>';

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
