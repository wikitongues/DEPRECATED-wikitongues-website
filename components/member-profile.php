<?php
/* The following variables may be defined for this template:
	$profile_picture (required)
	$credentials
	$credentials_title
	$credentials_institution
	$location
	$location_city
	$location_country
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
			if ( $credentials ) {
				echo '<div class="wt_member-credentials">';

				if ( $credentials_title ) {
					echo '<span class="wt_member-title">'.$credentials_title.'</span>';
				}

				 if ( $credentials_institution ) {
					 echo '<span class="wt_institution">, '.$credentials_institution.'</span>';				 	
				 }
	
				echo '</div>';
			}

			if ( $location ) {
				echo '<div class="wt_member-location">';

				if ( $location_city ) {
					echo '<span class="wt_member-city">'.$location_city.', </span>';
				}

				if ( $location_country ) {
					echo '<span class="wt_member-country">'.$location_country.'</span>';			
				}
				
				echo '</div>';
			}
			?>
	</div>
</div>