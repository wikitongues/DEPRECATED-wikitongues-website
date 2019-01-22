<?php 
/* The following variables may be defined for this template:
	$banner_image;
	$banner_text;
	$banner_form_header;
	$banner_form_embed;
	$banner_form_shortcode;
	*/ ?>

<div class="wt_form-banner banner-element" style="background:url('<?php echo $banner_image; ?>') center center no-repeat;">
	<aside class="wt_form-banner-message">
	<?php 
		if ( $banner_text ) { 

			echo '<h1>' . $banner_text . '</h1>'; 

		} ?>
	</aside>
</div>

<div class="wt_form-banner-form">
	<?php
		if ( $banner_form_header ) {
			echo '<h1>' . $banner_form_header . '</h1>';
		}

		if ( $banner_form_embed ) {
			
			echo $banner_form_embed;	
	
		} else { 

			echo do_shortcode( $banner_form_shortcode );

		} ?>
</div>