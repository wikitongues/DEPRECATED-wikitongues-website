<?php 
/* The following variables may be defined for this template:
	$donate_banner_image;
	$donate_banner_image_caption;
	$donate_banner_header;
	$donate_banner_copy;
	$donate_banner_form_embed;
	$donate_banner_form_shortcode;
	*/ ?>

<div class="wt_donate-banner bannet_element" style="background:url('<?php echo $donate_banner_image; ?>') center center no-repeat;">
	<aside class="wt_donate-banner-content">
	<?php 
		if ( $donate_banner_header ) { 

			echo '<h1>' . $donate_banner_header . '</h1>'; 

		}

		if ( $donate_banner_copy ) {

			echo '<p>' . $donate_banner_copy . '</p>';

		}

		if ( $donate_banner_form_embed ) {
			
			echo $donate_banner_form_embed;	
	
		} else { 

			echo do_shortcode( $donate_banner_form_shortcode );

		} ?>
	</aside>
	<p class="wt_banner-image-caption">
	<?php
		if ( $donate_banner_image_caption ) {
			echo $donate_banner_image_caption;
		} ?>
	</p>
</div>
