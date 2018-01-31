<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Switcher
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_onoff extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    $label = ( isset( $this->field['label'] ) ) ? '<div class="cs-text-desc">'. $this->field['label'] . '</div>' : '';
    echo '<label><button name="'. $this->element_name() .'" value="off"'. $this->element_class() . $this->element_attributes() . checked( $this->element_value(), 'off', 'on' ) .'>'.esc_html__( 'Off', 'cs-framework' ).'</button></label>' . $label;
    echo $this->element_after();

  }

}
