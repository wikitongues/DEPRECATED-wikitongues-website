<? 
/*available vars:

$cta_link;
$unique_class;
$cta_text;
$secondary_cta_link;
$secondary_cta_text; */ ?>

<div class="wt_cta">
	<a href="<?php echo $cta_link; ?>" class="<?php if ( $unique_class ) : ?>wt_<?php echo $unique_class; ?>__cta<?php endif; ?> wt_cta__link">
		<?php echo $cta_text; ?>
	</a>

	<?php if ( $secondary_cta_link ): ?>
	<a href="<?php echo $secondary_cta_link; ?>" class="wt_cta__secondary">
		<i class="fal fa-arrow-to-right"></i>
		<span><?php echo $secondary_cta_text; ?></span>
	</a>
	<?php endif; ?>
</div>