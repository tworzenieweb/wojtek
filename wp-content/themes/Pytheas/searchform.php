<?php
/**
 * The template for displaying search forms in Pytheas.
 *
 * @package WordPress
 * @subpackage Pytheas
 * @since Pytheas 1.0
 */
?>

<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wpex' ); ?>" />
    <button type="submit" class="submit" id="searchsubmit"><i class="icon-search"></i></button>
</form>