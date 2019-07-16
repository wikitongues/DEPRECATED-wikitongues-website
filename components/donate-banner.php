<?php 
/* The following variables may be defined for this template:
	$donate_banner_header;
	$donate_banner_copy;
	$donate_banner_form_embed;
	$donate_banner_form_shortcode;
	*/ ?>

<div class="wt_donate-banner banner_element">
	<div class="inner-wrap">
		<aside class="wt_donate-banner-header">
		<?php
			if ( $donate_banner_header ) { 

				echo '<h1>' . $donate_banner_header . '</h1>'; 

			}

			if ( $donate_banner_copy ) {

				echo '<p>' . $donate_banner_copy . '</p>';

			}
		?>
		</aside>
		<aside class="wt_donate-banner-form">
		<?php
			if ( $donate_banner_form_embed ) {
				
				echo $donate_banner_form_embed;	
		
			} else { 

				echo do_shortcode( $donate_banner_form_shortcode );

			} ?>
		</aside>
		<div class="clear"></div>
	</div>
</div>
