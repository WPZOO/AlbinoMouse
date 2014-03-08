<?php
/**
 * The template for displaying search form in header
 * @package AlbinoMouse
 */
?>
<form role="search" method="get" id="searchform" class="navbar-form navbar-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="sr-only"><?php _ex( 'Search for:', 'label', 'albinomouse' ); ?></span>
	    <input type="text" class="search-field form-control input-lg" value="" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'albinomouse' ); ?>"/>
	</div>
</form>