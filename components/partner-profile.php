<?php
/* The following variables may be defined for this template:
    $i (required)
    $profile_style (required)
    $partner_name (required)
	$partner_logo (required)
	$partner_website (required)
	$partner_bio (required)
	*/ ?>

<div class="wt_partner-profile" id="partner-profile-<?php echo($i); ?>" style="<?php echo($profile_style) ?>">
    <div class="flex-container">
        <div class="wt_partner-profile-image">
            <img src="<?php echo($partner_logo['url']) ?>">
        </div>
        <div>
            <h2><?php echo($partner_name) ?></h2>
            <a href="<?php echo($partner_website); ?>"><?php echo($partner_website) ?></a>
            <p><?php echo($partner_bio); ?></p>
        </div>
    </div>
</div>