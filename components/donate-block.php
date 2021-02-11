<?php 

// define the following variables 
$donate_header;
$donate_copy;
$donate_embed;
$donate_secondary_action_text;
$donate_secondary_action_link;
?>

<div class="wt_donate">
	<h1 class="wt_donate__header">
		<?php echo $donate_header; ?>
	</h1>
	<?php if ( $donate_copy ) : ?>
	<p class="wt_donate__copy">
		<?php echo $donate_copy; ?>
	</p>
	<?php endif; ?>
	<div class="wt_donate__embed">
		<?php echo $donate_embed; ?>
	</div>
	<a class="wt_donate__secondaryaction"
	   href="<?php echo $donate_secondary_action_link; ?>">
		<i class="fal fa-arrow-to-right"></i> 
		<span><?php echo $donate_secondary_action_text; ?></span>	
	</a>
</div>
