<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Wysiwyg
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_Wysiwyg extends CSFramework_Options {

 public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {
      $jid = preg_replace("/[^a-zA-Z0-9]/", "", $this->element_name());
    echo $this->element_before();
    echo $this->shortcode_generator();
    echo '<textarea id="wysiwygEditor" class="'.$jid.'" name="'. $this->element_name() .'"'. $this->element_attributes() .'>'. $this->element_value() .'</textarea>';
   //  echo '<input type="hidden" id="clos" value="'. $this->element_value().'" name="'. $this->element_name() .'"'. $this->element_class() . $this->element_attributes() .' />';  
    echo $this->element_after();  
      
    echo '        <script>
        jQuery(document).ready(function($) {
            $(".'.$jid.'").richText();
        
        
        
        $("body").on("type",".richText-editor", function(){ 
            var data = $(this).html();
			console.log(data);
	var cld =	$(this).parents(".richText").find("textarea");
            $(".'.$jid.'").val(data);
             $(".'.$jid.'").text(data);
            }); 
        
        
        });
        </script>';
   
      
  }

  public function shortcode_generator() {
    if( isset( $this->field['shortcode'] ) && CS_ACTIVE_SHORTCODE ) {
      echo '<a href="#" class="button button-primary cs-shortcode cs-shortcode-textarea">'. esc_html__( 'Add Shortcode', 'cs-framework' ) .'</a>';
    }
  }
    
    
}