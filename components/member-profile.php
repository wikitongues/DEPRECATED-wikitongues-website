<?php
/* The following variables may be defined for this template:
	$profile_picture (required)
	$location
	$credentials
	$bio
	*/ ?>

<div class="wt_member">
	<div class="wt_member-photo" style="background:url('<?php echo $profile_picture['url']; ?>') center center no-repeat;"></div>
	<div class="wt_member-information">
		<h2><?php echo $name; ?></h2>
		<?php
			if ( $location ) {
				echo '<div class="wt_member-location">'.
					 '<p class="wt_member-city">'.$location['city_and_territory'].'</p>'.
					 '<p class="wt_member-country">'.$location['country'].'</p>'.
					 '</div>';
			}

			if ( $credentials ) {
				echo '<div class="wt_member-credentials">'.
					 '<p class="wt_member-title">'.$credentials['title'].'</p>'.
					 '<p class="wt_institution">'.$credentials['institution_or_company'].'</p>'.
					 '</div>';
			} ?>
	</div>
</div>