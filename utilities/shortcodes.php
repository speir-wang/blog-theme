<?php 


function homeURL() {
	return get_home_url();
}
add_shortcode( 'homeURL', 'homeURL' );

function button_shortcode( $atts, $content = null ) {
	// Extract shortcode attributes
	extract( shortcode_atts( array(
		'href'    => '',
		'title'  => '',
		'target' => '',
		'text'   => '',
		'class'  => '',
	), $atts ) );

	// Use text value for items without content
	$content = $text ? $text : $content;

	// Return button with link
	if ( $href ) {

		$link_attr = array(
			'href'   => esc_url( $href ),
			'title'  => esc_attr( $title ),
			'target' => ( '_blank' == $target ) ? '_blank' : '',
			'class'  => esc_attr( $class )
		);

		$link_attrs_str = '';

		foreach ( $link_attr as $key => $val ) {
			if ( $val ) {
				$link_attrs_str .= ' '. $key .'="'. $val .'"';
			}
		}

		return '<a'. $link_attrs_str .'><span>'. do_shortcode( $content ) .'</span></a>';
	}
	// No link defined so return button as a span
	else {
		return '<span class="myprefix-button"><span>'. do_shortcode( $content ) .'</span></span>';
	}
}
add_shortcode( 'button', 'button_shortcode' );
