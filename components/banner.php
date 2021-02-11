<?php
/* The following variables may be defined for this template:
	$banner_image (required)
	$banner_image_caption
	$banner_text
	$banner_cta_link
	$banner_cta_text
	*/ ?>

<div class="wt_banner banner-element" style="background:url('<?php echo $banner_image['url']; ?>') center center no-repeat;">
	<aside class="wt_banner__content">
		<h1 class="wt_banner__content--header">
			<?php echo $banner_header; ?>
		</h1>
		<p id="scroll-anchor" class="wt_banner__content--text">
			<?php echo $banner_text; ?>
		</p>
	</aside>
	<a href="#scroll-anchor" class="wt_banner__scroll"><i class="fal fa-arrow-to-bottom"></i> Scroll Down</a>
</div>