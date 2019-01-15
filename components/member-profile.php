<?php
/* The following variables may be defined for this template:
	$profile_picture (required)
	$location
	$credentials
	$bio
	*/ ?>

<div class="wt_member">
	<?php if ( $profile_picture['url'] ): ?>
		<div class="wt_member-photo" style="background:url('<?php echo $profile_picture['url']; ?>') center center no-repeat;"></div>
	<?php else: ?>
		<div class="wt_member-photo empty"></div>
	<?php endif; ?>
	<div class="wt_member-information">
		<h2><?php echo $name; ?></h2>
		<?php
			if ( $credentials ) { // not testing correctly
				echo '<div class="wt_member-credentials">'.
					 '<span class="wt_member-title">'.$credentials['title'].'</span>'.
					 '<span class="wt_institution">, '.$credentials['institution_or_company'].'</span>'.
					 '</div>';
			}

			if ( $location ) {
				echo '<div class="wt_member-location">'.
					 '<span class="wt_member-city">'.$location['city_and_territory'].', </span>'.
					 '<span class="wt_member-country">'.$location['country'].'</span>'.
					 '</div>';
			}
			?>
	</div>
</div>