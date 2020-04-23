
<?php
/**
 * The template for displaying Search Results pages
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
      <div class="wt_search-results">
        <header class="page-header wt_search-results__header">
          <h1 class="page-title">
          <?php
          /* translators: %s: Search query. */
          printf( __( 'Search Results for: %s' ), get_search_query() );
          ?>
          </h1>
        </header><!-- .page-header -->

        <?php
          
          // args for main search query
          $args = array(
            'post_type' => array('languages', 'videos'),
            'posts_per_page' => '30',
            'order' => 'ASC'
          );

          $search_query = get_search_query();

          // Meta query for searching languages
          $languages_meta = array(
            array(
              'key' => 'wt_id',
              'value' => $search_query,
              'compare' => 'LIKE'
            ),
            array(
              'key' => 'standard_name',
              'value' => $search_query,
              'compare' => 'LIKE'
            ),
            array(
              'key' => 'alternate_names',
              'value' => $search_query,
              'compare' => 'LIKE'
            ),
            'relation' => 'OR'
          );

          // Search all languages in separate query, since other post types
          // (e.g. videos) may refence languages as a post object field
          $language_args = array(
            'post_type' => 'languages',
            'numberposts' => -1,
            'meta_query' => $languages_meta
          );    
          $existing_languages = get_posts($language_args);

          // Meta for main query
          // Start with languages meta query
          $meta_query = $languages_meta;

          // Search by post title
          $meta_query[] = array(
            'key' => 'post_title',
            'value' => $search_query,
            'compare' => 'LIKE'
          );
      
          foreach ($existing_languages as $language_post) {
            // Query videos by post ID of featured languages (post object)
            $meta_query[] = array(
              'key' => 'featured_languages',
              'value' => $language_post->ID,
              'compare' => 'LIKE'
            );
            $meta_query['relation'] = 'OR';
          }    

          $args['meta_query'] = $meta_query;

          // Get current page and append to custom query parameters array
          $args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $custom_query = new WP_Query( $args );
          $temp_query = $wp_query;
          $wp_query   = NULL;
          $wp_query   = $custom_query; ?>

          <div class="wt_search-results__main">

            <?php 
            // Start the Loop.
            while ( $wp_query->have_posts() ) :
              $wp_query->the_post(); ?>    
              
              <div class="wt_search-results__item">
                <a class="wt_search-results__link" href="<?php echo get_the_permalink(); ?>">

                  <?php if (get_post_type() == 'languages'): ?>

                    <!-- Format standard language name with ISO code -->
                    <?php echo get_field('standard_name') . ' [' . get_the_title() . ']'; ?>

                  <?php else: echo get_the_title(); ?>
                  <?php endif; ?>
                </a>

                <?php 
                if (get_post_type() == 'languages'):
                  if (!empty(get_field('alternate_names'))): ?>
                    <div class="wt_search-results__text">
                      <?php echo 'Also known as: ' . get_field('alternate_names'); ?>
                    </div>
                  <?php endif; ?>
                  <div class="wt_search-results__text">
                    <?php echo get_field('language_description'); ?>
                  </div>
                <?php elseif (get_post_type() == 'videos'): ?>
                  <div class="wt_search-results__text">
                    <?php echo get_field('video_description'); ?>
                  </div>
                <?php endif; ?>

              </div>

              <?php endwhile; ?>

              <?php if (!$wp_query->have_posts()): ?>
                <div class="wt_search-results__no-search-results">
                  <p>No search results</p>
                </div>
              <?php endif; ?>

            </div>
            <div class="wt_search-results__pagination">
              <?php
                // Previous/next post navigation.
                get_template_part('pagination');
              ?>
            </div>
          </div>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php
// get_sidebar( 'content' );
// get_sidebar();
get_footer();