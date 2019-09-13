<?php
/* The following variables may be defined for this template:
	$profile_picture (required)
	$name
	$location
	$title
	$bio
	*/ ?>

<div class="wt_member">
	<?php if ( $profile_picture ): ?>
		<!-- we should find a way to format this string correctly in the exported Airtable CSV rather than parsing the string here -->
		<?php preg_match('#\((.*?)\)#', $profile_picture, $match); ?>
		<div class="wt_member-photo" style="background:url('<?php echo $match[1]; ?>') center center no-repeat;"></div>
	<?php else: ?>
		<div class="wt_member-photo empty"></div>
	<?php endif; ?>
	<div class="wt_member-information">
		<h2><?php echo $name; ?></h2>
		<?php			
			if ( $title ) {
				echo '<div class="wt_leadership-title">'.$title.'</div>';
			}

			if ( $location ) {
				echo '<div class="wt_member-location">'.$location.'</div>';
			}

			if ( $bio ) {
				echo '<div class="wt_member-bio">'.$bio.'</div>';
			}
			?>
	</div>
</div>