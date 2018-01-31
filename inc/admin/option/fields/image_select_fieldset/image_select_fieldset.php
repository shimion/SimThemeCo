<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Image Select
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_image_select_fieldset extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    $input_type  = ( ! empty( $this->field['radio'] ) ) ? 'radio' : 'checkbox';
    $input_attr  = ( ! empty( $this->field['multi_select'] ) ) ? '[]' : '';
      $html = '';
    echo $this->element_before();
    echo ( empty( $input_attr ) ) ? '<div class="cs-field-image-select">' : '';

    if( isset( $this->field['options'] ) ) {
      $options  = $this->field['options'];
      foreach ( $options as $ke => $val ) {
          if(is_array($val) && !empty($val)){
              
             $html .= '<div class="individual-fieldset-wapper '.$ke.'">';
              $html .= '<div class="cs-title"><h4>'.str_replace('-', ' ', $ke).'</h4></div>';
              
              foreach($val as $key=>$value){
                  $v = sprintf('%s/%s', $ke,$key);
                  $cked = $this->checked( $this->element_value(), $v );
                  $active = ($cked) ? 'active' : '';
                  $html .= '<label class="lable-image-fieldset '.$active.'"><input style="display: none;" type="'. $input_type .'" name="'. $this->element_name( $input_attr ) .'" value="'. $ke.'/'.$key .'"'. $this->element_class() . $this->element_attributes( $key ) . $cked .'/><img src="'.VIEW.'modules/'. $v .'/image.jpg" alt="'. $key .'" class="treaget_modules '. $active .'" data-attr="'.$ke.'-'.$key.'" /></label>';
              }
              
              $html .='</div>';
              
              
              
              
          }
        
      }
        
        echo $html;
    }

    echo ( empty( $input_attr ) ) ? '</div>' : '';
    echo $this->element_after();

  }

}
