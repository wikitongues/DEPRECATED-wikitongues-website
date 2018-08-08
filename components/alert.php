<?php
/* The following variables may be defined for this template:
	$alert_link (required)
	$alert_title
	$alert_text
	$alert_image
	*/ ?>

<div class="wt_alert">
	<a href="<?php echo $alert_link ?>" target="_blank">
		<div class="wt_alert-image" style="background:url('<?php echo $alert_image; ?>') center center no-repeat;"></div>
		<h2><?php echo $alert_title; ?></h2>
		<p><?php echo $alert_text; ?></p>
	</a>
	<button class="wt_close-module">Close</button>	
</div>