<?php
/* The following variables may be defined for this template:
	$alert_link (required)
	$alert_title
	$alert_text
	$alert_image
	*/ ?>

<aside class="wt_alert wt_module">
    <img class="wt_alert-image" src="<?php echo $alert_image; ?>" alt="<?php echo $alert_title; ?>">
    <article class="wt_alert-message">
        <h2><?php echo $alert_title; ?></h2>
        <p><?php echo $alert_text; ?></p>
    </article>
    <button class="wt_close-module">×</button>
</aside>
