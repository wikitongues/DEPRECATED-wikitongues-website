<?php 
	// define the following variables
	$feature_image;
	$feature_subheader;
	$feature_title;
	$feature_copy;
	$feature_action_text;
	$feature_action_link;
	$feature_secondary_action_text;
	$feature_secondary_action_link; 
?>

<div class="wt_feature">
	<div class="wt_feature__aside--image"
		 style="background:url(<?php echo esc_url($feature_image['url']); ?>) center center no-repeat;"></div>
	<div class="wt_feature__aside--content">
		<h2 class="wt_feature__aside--subheader">
			<?php echo $feature_subheader; ?>
		</h2>
		<h1 class="wt_feature__aside--header">
			<?php echo $feature_title; ?>
		</h1>
		<p class="wt_feature__aside--copy">
			<?php echo $feature_copy; ?>
		</p>
		<a class="wt_feature__aside--action" 
		   href="<?php echo $feature_action_link; ?>">
			<?php echo $feature_action_text ;?>
		</a>
		<a class="wt_feature__aside--secondaryaction"
		   href="<?php echo $feature_secondary_action_link; ?>">
		   <i class="fal fa-arrow-to-right"></i>
		   <span><?php echo $feature_secondary_action_text; ?></span>
		   <i class="fal fa-arrow-to-left"></i>
		</a>
	</div>
</div>