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
		<p class="wt_alternate-form-notice"><span>!</span>If you have trouble submitting, please submit your video with this <a href="https://docs.google.com/forms/d/1OUp26FeEO0vjEhd6l55gHbsoTtssnfKY2VCtHIVYoIA/viewform?edit_requested=true">alternate form</a> instead.</p>
		<style>
			.wt_alternate-form-notice {
				font-size: 1.75rem;
			}
			.wt_alternate-form-notice span {
				display: inline-block;
				background: #b70202;
				width: 20px;
				height: 20px;
				border-radius: 100%;
				text-align: center;
				font-weight: bold;
				color: white;
				margin-right: 5px;
			}
			.wt_alternate-form-notice a {
				display: inline !important;
				font-weight: bold;
			}
			input[type="submit"] {
				display: block;
				width: 100%;
				white-space: nowrap;
				margin: 5rem auto 2rem 0;
				text-align: center;
				padding: 3rem;
				font-size: 2rem;
				font-weight: bold;
				background-color: #4799fc;
				border-radius: 1rem;
				color: #fff;
				text-transform: uppercase;
				letter-spacing: 0.1rem;
				border: 0;
			}
		</style>
</div>
