<?php 
require _ADMIN. "option/cs-framework.php";
//require _ADMIN. "customizer/customizer.php";

function Remove_Customizer( $wp_customize ) {
   
    $wp_customize->remove_section( 'title_tagline' );
     $wp_customize->remove_section( 'header_image' );
    
    $wp_customize->add_section('sidebar-sidebar', array(
        'title'    => __('Color Scheme', 'themename'),
        'description' => '',
        'priority' => 120,
    ));
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('sidebar-sidebar-widgets', array(
        'default'        => 'value_xyz',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'sidebar-sidebar',
        'settings'   => 'sidebar-sidebar-widgets',
    ));
    
}
add_action( 'customize_register', 'Remove_Customizer', 99 );

/********* Sanitization Functions ***********/
if ( ! function_exists( 'mytheme_allowed_tags' ) ) {
	/**
	 * Allowed tags function for wp_kses()
	 *
	 * @return array Array of allowed HTML tags
	 * @since 1.0.0
	 */
	function mytheme_allowed_tags() {
		return array(
			'a' => array(
				'href' => array(),
				'title' => array(),
			),
			'br' => array(),
			'span' => array(
				'class' => array(),
			),
			'em' => array(),
			'ul' => array(),
			'ol' => array(),
			'li' => array(),
			'strong' => array(),
			'pre' => array(),
			'code' => array(),
			'blockquote' => array(
				'cite' => true,
			),
			'i' => array(
				'class' => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'abbr' => array(
				'title' => true,
			),
			'select' => array(
				'id'   => array(),
				'name' => array(),
			),
			'option' => array(
				'value' => array(),
			),
		);
	}
}

if ( ! function_exists( 'mytheme_text_sanitization' ) ) {
	/**
	 * Text sanitization function for Customize API
	 *
	 * @param  string $input Input to be sanitized.
	 * @return string        Sanitized input.
	 * @since 1.0.0
	 */
	function mytheme_text_sanitization( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
	}
}

if ( ! function_exists( 'mytheme_checkbox_sanitization' ) ) {
	/**
	 * Checkbox sanitization function for Customize API
	 *
	 * @param  string $input Checkbox value.
	 * @return integer       Sanitized value.
	 * @since 1.0.0
	 */
	function mytheme_checkbox_sanitization( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'mytheme_sanitize_integer' ) ) {
	/**
	 * Integer sanitization function for Customize API
	 *
	 * @param  string $input Input value to check.
	 * @return integer        Returned integer value.
	 * @since 1.0.0
	 */
	function mytheme_sanitize_integer( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		}
	}
}
