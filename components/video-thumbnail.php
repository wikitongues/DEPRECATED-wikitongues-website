<?php
/* The following variables may be defined for this component:
	$video_title, for now, ID
	$video_thumbnail
	$featured_languages
	$video_description
	$youtube_link
	$wikimedia_commons_link
	$video_license
	$license_link
	$attribution_statement
	$public_status
	*/ ?>
<div class="wt_video-preview">
	<!-- we should find a way to format this string correctly in the exported Airtable CSV rather than parsing the string here -->
	<?php if ( $video_thumbnail ): 
		preg_match('#\((.*?)\)#', $video_thumbnail, $match); ?>
		<div class="wt_video-thumbnail" style="background:url('<?php echo $match[1]; ?>') center center no-repeat;"></div>
		<?php else: ?>
		<div class="wt_video-thumbnail empty"></div>
	<?php endif; ?>

	<!-- show language names -->
	<h3>Featured Languages</h3>
	<?php if( $featured_languages ): ?>
		<p>
		<?php foreach( $featured_languages as $post ):
				setup_postdata( $post ); 

				$ISO_code = get_the_title();
				$language_name = get_field('standard_name');
				$language_url = get_the_permalink(); ?>
				<span>
					<a href="<?php echo $language_url; ?>">
						<?php echo $language_name; ?> [<?php echo $ISO_code; ?>]
					</a>
				</span>
		<?php endforeach; wp_reset_postdata(); ?>
		</p>
	<?php else: ?>
		<p>Sorry, languages aren't loading right now.</p>
	<?php endif; ?>
	<!-- /show language names -->
	
	<!-- Show distribution links -->
	<h3>Distribution</h3>
	<?php if ( $public_status == 'Removed' || $public_status == 'Private' ): ?>
		<p>This video is not publicly available.</p>
	<?php else: ?>
		<?php if ( $youtube_link != 'No ID' || $wikimedia_commons_link ): ?>
			<?php if ( $youtube_link != 'No ID' ): ?>
				<p>
					<a href="<?php echo $youtube_link; ?>">YouTube</a>
				</p>
			<?php endif; ?>
			<?php if ( $wikimedia_commons_link ): ?>
				<p>
					<a href="<?php echo $wikimedia_commons_link; ?>">Wikimedia Commons</a>
				</p>
			<?php endif; ?>
		<?php else: ?>
			<p>This video is not yet available. <a class="inline" href="http://www.youtube.com/user/wikitongues?sub_confirmation=1">Subscribe on YouTube</a> to know when it's published.</p>
		<?php endif; ?>
	<?php endif; ?>
	<!-- /Show distribution links -->

	<!-- Show Licensing -->
	<h3>Licensing</h3>
	<p>
		<?php if ( $video_license == 'Standard' ) {
			echo 'Protected';
		} else {
			echo $video_license; 
		} ?>
	</p>
	<!-- /Show licensing -->
</div>

<!--

	Video object
	Video Image
	Title (v2)
	Featured language(s) by given name
	Featured language(s) by ISO code
	Featured language(s) by Glottocde (v2)
	Captioned languages (v2)
	Amara link (v2)
	File Distribution: YouTube link
	File Distribution: Wikimedia Commons link
	File Distributino: Dropbox link (v2)
	Video license
	Attribution Information
	Video status

Layout
	[Video Image]
	Featured languages 
		Kenyan Sign Language 
		ISO code: xki [link]
			If none: This language is not yet recognized by ISO.
		Glottcode: keny1241 [link]
			If none: This language is not yet recognized by Glottolog.
		If none: This language is not yet recognized by ISO or Glottolog and may be unclassified by linguists.
	Captions/translations
		English
		ISO code: eng
		Glottocode: stan1293
		Amara link
		If none: This video has not been captioned or translated. Help us by adding subtitles [Amara link].
	Distribution
		Youtube [link]
		Wikimedia Commons [link]
		Library of Congress (on-site only)
		If none: This video is not yet publicly available.
		If removed: This video has been made private.
	Licensing (last thing to figure out )
		CC-by-NC 4.0 [link]
		Attribution statement: **compose

		-->