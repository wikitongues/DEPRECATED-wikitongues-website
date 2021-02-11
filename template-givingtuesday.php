<?php /* Template name: Giving Tuesday */ get_header(); ?>

<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:ital@0;1&display=swap');
</style>

<div class="wt_giving-tuesday">
	<div class="wt_giving-tuesday__intro">
		<?php $giving_tuesday_graphic = get_field('giving_tuesday_graphic'); ?>
		<div class="wt_giving-tuesday__intro--graphic">
			<img src="<?php echo $giving_tuesday_graphic['url']; ?>" alt="">
		</div>
		<h1>It's #GivingTuesday!</h1>
		<h2>These are our core projects for 2021. Please consider donating, volunteering, or simply spreading the word.</h2>
	</div>
	<div class="wt_giving-tuesday__content">
<!-- 		<div class="wt_giving-tuesday__content--summary">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nemo voluptas rem dolores autem nihil dolorem quae doloremque? Est veritatis eum soluta tempore consectetur odit corporis quis officiis iusto placeat.
		</div> -->
		<?php // query featured projects array
		$featured_projects = get_field('featured_projects');

		// start loop
		if ( $featured_projects ) {

			// define $i for $i++ loop
			$i;

			foreach ( $featured_projects as $post ) {

				// run $i++ to assign unique IDs to each section
				$i++;

				// initialize post data
				setup_postdata( $post );
				
				// define content variables
				$section_image = get_field('project_banner_image');
				$section_subheader = get_field('project_subheader');
				$section_header = get_the_title();
				$section_copy = get_field('project_excerpt');
				$section_action_embed;
				$section_action_link = get_field('project_call_to_action')['cta_link'];
				$section_action_text = get_field('project_call_to_action')['cta_text'];
				$section_secondary_action_link = get_field('project_secondary_action')['cta_link'];
				$section_secondary_action_text = get_field('project_secondary_action')['cta_text'];

				// load section template
				include( locate_template('components/section.php') );
			}

			wp_reset_postdata();
		} ?>
		<!-- in-kind donations CTA -->
	</div>
</div>

<?php get_footer(); ?>