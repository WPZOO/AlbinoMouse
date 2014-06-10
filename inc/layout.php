<?php

function albinomouse_get_content_class() {
	$options = get_option( 'albinomouse' );

	if( ! isset( $options['sidebar-layout'] ) || '2c-r' == $options['sidebar-layout'] ){
		$class = 'col-md-7';
	} elseif( '2c-rs' == $options['sidebar-layout'] ) {
		$class = 'col-md-8';
	} elseif( '2c-l' == $options['sidebar-layout'] )
		$class = 'col-md-7 col-md-offset-1 pull-right';
	} elseif( '2c-ls' == $options['sidebar-layout'] ) {
		$class = 'col-md-8 col-md-offset-1 pull-right';
	} else {
		$class = 'col-md-12';
	}
	return $class;
}

function albinomouse_get_sidebar_class() {
	$options = get_option( 'albinomouse' );

	if( ! isset( $options['sidebar-layout'] ) || '2c-r' == $options['sidebar-layout'] ){
		$class = 'col-md-4 col-md-offset-1';
	} elseif( '2c-rs' == $options['sidebar-layout'] ) {
		$class = 'col-md-3 col-md-offset-1';
	} elseif( '2c-l' == $options['sidebar-layout'] )
		$class = 'col-md-4 pull-left';
	} elseif( '2c-ls' == $options['sidebar-layout'] ) {
		$class = 'col-md-3 pull-left';
	}
	return $class;
}
