<? 
/*available vars:

$cta_link;
$unique_class;
$cta_text;
$secondary_cta_link;
$secondary_cta_text; */ ?>

<a href="<?php echo $cta_link; ?>" class="<?php if ( $unique_class ) : ?>wt_<?php echo $unique_class; ?>__cta<?php endif; ?> wt_cta">
	<?php echo $cta_text; ?>
</a>

<?php if ( $secondary_cta_link ): ?>
<a href="<?php echo $secondary_cta_link; ?>" class="wt_secondary-cta">
	<?php echo $secondary_cta_text; ?>
</a>
<?php endif; ?>