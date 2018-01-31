<?php 
// cs-framework/fields/datepicker/datepicker.php
/**
 *
 * Field: Password
 *
 * @since 1.0
 * @version 1.0
 *
 */
class CSFramework_Option_datepicker extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){

    echo $this->element_before();

    echo '<input type="text" id="datepicker_'.$this->field["id"].'" class="datepicker" name="'. $this->element_name() .'" value="'. $this->element_value() .'"'. $this->element_class() . $this->element_attributes() .'/>';
      
    echo $this->element_after();

  }

}