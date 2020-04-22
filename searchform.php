
<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$wt_search_unique_id = uniqid('search-form-');

$wt_search_aria_label = ! empty( $args['label'] ) ? 'aria-label="' . esc_attr( $args['label'] ) . '"' : '';
?>
<form class="wt_search-form" role="search" <?php echo $wt_search_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $wt_search_unique_id ); ?>">
		<input type="search" id="<?php echo esc_attr( $wt_search_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search Wikitongues &hellip;', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<input type="submit" class="search-submit wt_search-form__submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
</form>