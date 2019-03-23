<?php
/* The following variables may be defined for this template:
	$featured_item_link (required)
	$featured_item_title
	$featured_item_text
	$featured_item_image
	*/ ?>

<?php
$id = isset($i_featured_item) ? 'featured-item-'.$i_featured_item : '';
?>

<div id="<?php echo $id ?>" class="wt_featured-item" style="display: <?php echo ($hidden ? 'none' : 'inline-block') ?>;">
	<a href="<?php echo $featured_item_link ?>" target="_blank">
    <div class="wt_featured-item-image" style="background:url('<?php echo $featured_item_image; ?>') center center no-repeat;"></div>
    <h2><?php echo $featured_item_title; ?></h2>
    <p><?php echo $featured_item_text; ?></p>
  </a>
</div>
