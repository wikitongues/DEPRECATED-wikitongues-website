<?php 
/* The following variables may be defined for this template:
	$banner_image;
	$banner_text;
	$banner_form_embed;
	$banner_form_shortcode;
	*/ ?>

<div class="wt_form-banner" style="background:url('<?php echo $banner_image; ?>') center center no-repeat;">
	<aside class="wt_form-banner-message">
	<?php 
		if ( $banner_text ) { 

			echo '<h1>' . $banner_text . '</h1>'; 

		} ?>
	</aside>
	<aside class="wt_form-banner-form">
	<?php
		if ( $banner_form_embed ) {
			
			echo $banner_form_embed;	
	
		} else { 

			echo do_shortcode( $banner_form_shortcode );

		} ?>
	</aside>
</div>
