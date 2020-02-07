<?php get_header();

    $post_title = get_the_title($post);
    $video_title = get_field('video_title');
    $video_permalink = get_the_permalink();
    $video_thumbnail = get_field('video_thumbnail');
    $featured_languages = get_field('featured_languages');
    $video_description = get_field('video_description');
    $youtube_link = get_field('youtube_link');
    $wikimedia_commons_link = get_field('wikimedia_commons_link');
    $video_license = get_field('video_license');
    $license_link = get_field('license_link');
    $attribution_statement = get_field('attribution_statement');
    $public_status = get_field('public_status'); 
    $youtube_publish_date = get_field('youtube_publish_date');

    $date = date_create_from_format('Ymd', $youtube_publish_date);
    $formatted_date = date_format($date, 'F j, Y');

    if (is_array($license_link)) {
        $license_link = $license_link[0];
    }
    
    // Converts YouTube URL's to embeddable form
    // https://stackoverflow.com/a/41910059
    function get_youtube_embed_url($url) {
         $short_url_regex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
         $long_url_regex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
    
        if (preg_match($long_url_regex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
    
        if (preg_match($short_url_regex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }

    // Gets the URL of the video file from the Wikimedia Commons URL
    function get_wikimedia_upload_url($url) {
        // https://stackoverflow.com/a/46441957
        return str_replace('wiki/', 'wiki/Special:FilePath/', $url);
    }
    
    ?>

<div class="wt_page-intro">
    <?php if( $video_title ): ?>
        <h1><?php echo $video_title; ?></h1>
    <?php else: ?>
        <h1><?php echo $post_title; ?></h1>
    <?php endif; ?>

	<?php if ( $public_status == 'Removed' || $public_status == 'Private' ): ?>
		<p>This video is not publicly available.</p>
	<?php else: ?>
		<?php if ( $youtube_link != 'No ID' || $wikimedia_commons_link ): ?>
            <?php if ( $youtube_link != 'No ID' ): ?>
                <!-- Embed YouTube video -->
                <iframe width="480" height="270"
                    src="<?php echo get_youtube_embed_url($youtube_link); ?>">
                </iframe> 
            <?php elseif ( $wikimedia_commons_link ): ?>
                <!-- Embed Wikimedia video -->
                <video width="480" height="270" controls>
                    <source src="<?php echo get_wikimedia_upload_url($wikimedia_commons_link); ?>" type="video/webm">
                    Your browser does not support this video.
                </video>
            <?php endif; ?>
        <?php else: ?>
            <p>This video is not yet available. <a class="inline" href="http://www.youtube.com/user/wikitongues?sub_confirmation=1">Subscribe on YouTube</a> to know when it's published.</p>
        <?php endif; ?>
    <?php endif; ?>

    <p>
        Published: <?php echo $formatted_date; ?>
    </p>

    <p>
        <?php echo $video_description; ?>
    </p>

	<!-- show language names -->
	<h2>Featured Languages</h2>
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
    
    <small>
        Licensing: <a href="<?php echo $license_link; ?>"><?php echo $video_license; ?></a>
        <br>
        <?php echo $attribution_statement; ?>
    </small>
</div>

<div class="pagination">
	<a href="<?php bloginfo('url'); ?>/videos">Explore all videos</a> | <a href="<?php bloginfo('url'); ?>/languages">Explore all languages</a>
</div>

<!-- 
/* ================= *\
 *   Donate Banner   *
\* ================= */ -->
<?php 
// define variables for donate CTA at bottom of layout
$donate_banner_header = get_field('donate_banner_header');
$donate_banner_copy = get_field('donate_banner_copy');
$donate_banner_form_embed = get_field('donate_banner_form_embed');

// load donate CTA ?>
<div class="wt_donate-banner banner_element">
	<div class="inner-wrap">
		<aside class="wt_donate-banner-header">
			<h1>For $250, you can help save a language</h1>
			<p>
				<strong>*</strong> That's just <strong>$20.84 per month</strong>!
			</p>
		</aside>
		<aside class="wt_donate-banner-form">
			<script src="https://donorbox.org/widget.js" paypalExpress="false"></script><iframe src="https://donorbox.org/embed/wikitongues?amount=20.84&default_interval=m" height="685px" width="100%" style="max-width:500px; min-width:310px; max-height:none!important" seamless="seamless" name="donorbox" frameborder="0" scrolling="no" allowpaymentrequest></iframe>
		</aside>
		<div class="clear"></div>
	</div>
</div>

<?php get_footer(); ?>