<?php
	// define the following variables
	$section_image;
	$section_subheader;
	$section_header;
	$section_copy;
	$section_action_embed;
	$section_action_link;
	$section_action_text;
	$section_secondary_action_link;
	$section_secondary_action_text;
?>

<section class="wt_section">
	<aside class="wt_section__aside--image"
		   style="background:url(<?php echo esc_url($section_image['url']); ?>) center center no-repeat;"></aside>
	<aside class="wt_section__aside--content">
		<h2 class="wt_section__aside--subheader">
			<?php echo $section_subheader; ?>
		</h2>
		<h1 class="wt_section__aside--header">
			<?php echo $section_header; ?>
		</h1>
		<p class="wt_section__aside--copy">
			<?php echo $section_copy; ?>
		</p>
		<?php if ( $section_action_embed ): ?>
			<?php echo $section_action_embed; ?>
		<?php else: ?>
			<a class="wt_section__aside--action"
			   href="<?php echo $section__action_link; ?>">
				<?php echo $section_action_text; ?>   	
			</a>
		<?php endif; ?>
		<?php if ( $section_secondary_action_link ): ?>
		<a class="wt_section__aside--secondaryaction"
			   href="<?php echo $section_secondary_action_link; ?>">
			<i class="fal fa-arrow-to-right"></i>
			<span><?php echo $section_secondary_action_text; ?></span>
			<i class="fal fa-arrow-to-left"></i>  	
		</a>
		<?php endif; ?>
    </aside>
    <div class="clear"></div>
</section>
