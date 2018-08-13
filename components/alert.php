<?php
/* The following variables may be defined for this template:
	$alert_link (required)
	$alert_title
	$alert_text
	$alert_image
	*/ ?>

<aside class="wt_alert">
    <img class="wt_alert-image" src="<?php echo $alert_image; ?>" alt="<?php echo $alert_title; ?>">
    <article class="wt_alert-message">
        <h2><?php echo $alert_title; ?></h2>
        <?php echo $alert_text; ?>
    </article>
    <button class="wt_close-module">Close</button>
</aside>
