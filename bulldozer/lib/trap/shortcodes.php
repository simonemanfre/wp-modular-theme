<?php
	add_shortcode( 'cta', 'cta_shortcode' );
	function cta_shortcode( $atts ) {

		extract( shortcode_atts(
			array(
				'label' => '',
				'link' => '',
			), $atts )
		);

		$shortcode_output =   '<a href="'.$link.'" class="c-button">'.$label.'</a>';
		return $shortcode_output;
	}

?>