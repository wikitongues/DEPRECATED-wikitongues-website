<?php /* the following variables may defined for this component:
	$lexicon_title;
	$lexicon_permalink;
	$source_languages;
	$target_languages;
	$dropbox_link;
	$external_link; */ ?>

<div class="wt_lexicon-preview">
	<?php if ( $dropbox_link ): ?>
	<a class="wt_lexicon-preview--link" href="<?php echo $dropbox_link; ?>" target="_blank">
	<?php else: ?>
	<a class="wt_lexicon-preview--link" href="<?php echo $external_link; ?>" target="_blank">
	<?php endif; ?>
		<p>
			<strong>
				<?php foreach( $source_languages as $post) {
					setup_postdata( $post );

					the_field('standard_name');
				} wp_reset_postdata(); ?>
			</strong>
			<span> &#8594; </span>
			<strong>
				<?php foreach( $target_languages as $post) {
					setup_postdata( $post );

					echo get_field('standard_name') . " ";
				} wp_reset_postdata(); ?>
			</strong>
			<span>word list</span>
		</p>
	</a>
	<!-- ideally, we'll have source -> target language indicated here, as well as the number of words/phrases in the document -->
</div>

