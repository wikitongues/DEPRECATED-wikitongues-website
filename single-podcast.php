<?php get_header(); 

// vars
$audio_embed = get_field('audio_embed');
$audio_file = get_field('audio_file');
$podcast_summary = get_field('podcast_summary');
$associated_videos = get_field('associated_videos');
$associated_blog_posts = get_field('associated_blog_posts');
$transcript = get_field('transcript');
$transcript = nl2br($transcript);
$short_transcript =  explode('<br', $transcript)[0]; ?>

<div class="wt_single-podcast">
	<h1 class="wt_single-podcast__title">
		<?php the_title(); ?>
	</h1>
	
	<div class="wt_single-podcast__episode"><?php
		if ( $audio_file ): ?>
		<audio controls>
			<source src="<?php echo $audio_file; ?>" type="audio/mpeg">
		</audio><?php
		else:
			echo $audio_embed; 
		endif; ?>
	</div>
	
	<div class="wt_single-podcast__summary">
		<?php echo $podcast_summary; ?>
  </div>
  
  <div class="wt_single-podcast__transcript">
    <h2 class="wt_single-podcast__subheader">Transcript</h2>
    <div id="transcriptContent" class="wt_single-podcast__transcript-content">
      <?php if (empty($transcript)): ?>
        <div class="wt_single-podcast__no-transcript">
          This episode has not been transcribed yet, please check back later.
        </div>
      <?php else: ?>
        <?php echo $short_transcript; ?>
        <br><br>
        <a href="#" id="readMore">Read more</a>
      <?php endif; ?>
    </div>
  </div>

	<div class="wt_single-podcast__videos">
		<h2 class="wt_single-podcast__subheader">Related Language Videos</h2><?php
		foreach($associated_videos as $post){ 
			setup_postdata( $post );
			$featured_item_link = get_field('youtube_link');
			$featured_item_title = get_field('video_title');
			$featured_item_text = get_field('video_description');
			$featured_item_image = get_field('video_thumbnail');

			preg_match('#\((.*?)\)#', $featured_item_image, $match);

			include( locate_template('components/featured-item.php') );
		} wp_reset_postdata(); ?>
	</div>
</div><!-- / .wt_single-podcast -->

<div class="wt_single-podcast__reading">
	<h2 class="wt_single-podcast__subheader">Further Reading</h2><?php 
	foreach($associated_blog_posts as $post){ 
		setup_postdata( $post );
		// define section variables
		$section_image = get_field('blog_featured_image');
		$section_image_caption = null;
		$section_title = get_the_title();
		$section_text = get_the_excerpt();
		$section_cta_link_alt = get_field('post_permalink');
		$section_cta_link = get_the_permalink();
		$section_cta_text = 'Read This';
		$section_identifier = 'news'; // unique section identifier for each $i++ loop
		$featured_items = null;

		// load section template
		include( locate_template('components/section.php') );
	} wp_reset_postdata(); ?>
</div>

<div class="wt_single-podcast__navigation">
	<span><?php previous_post_link(); ?></span>
	<span><?php next_post_link(); ?></span><br />
	<div class="wt_single-podcast__navigation--back">
		<a href="<?php bloginfo('url'); ?>/podcast">Back to podcast</a>
	</div>

</div>

<script>
var transcript = <?php echo json_encode($transcript); ?>;
var shortTranscript = <?php echo json_encode($short_transcript); ?>;

document.getElementById('readMore').addEventListener('click', expandTranscript);

function expandTranscript() {
  document.getElementById('transcriptContent').innerHTML = transcript;
}
</script>

<?php get_footer(); ?>