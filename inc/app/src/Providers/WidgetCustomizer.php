<?php 
namespace ST\Providers;
use WP_Widget as DWP_Widget;
class WidgetCustomizer extends DWP_Widget 
 {
    public $class_attr;
   // $instance = apply_filters( 'widget_display_callback', $instance, $this, $args );
 
    function __construct() {
        add_filter('in_widget_form', array($this, 'AddAdditionalFormFields'), 10, 3 );
        add_filter('widget_update_callback', array($this, 'SaveAddAdditionalFormFields'), 10, 2 );
        //$this->class_attr = isset( $instance['class_attr'] ) ? $instance['class_attr'] : '';
       add_filter('widget_display_callback', array($this, 'call_widget_filter_header_top'), 10, 3);
	}
	
    public function call_widget_filter_header_top($instance, $class, $args){
        $args['before_widget'] = '<div id="'.$class->id.'" class="col-sm '.$instance['class_attr'].' widget_'.$class->id.'">';
        $class->widget( $args, $instance );
        return false;
    }
	
	public function AddAdditionalFormFields( $widget, $return, $instance ) {
 
  
 
        // Display the class_attr option.
        $class_attr = isset( $instance['class_attr'] ) ? $instance['class_attr'] : '';
        ?>
            <p>
                <input class="input" type="text" id="<?php echo $widget->get_field_id('class_attr'); ?>" name="<?php echo $widget->get_field_name('class_attr'); ?>" value="<?php echo $class_attr; ?>" />
                <label for="<?php echo $widget->get_field_id('class_attr'); ?>">
                    <?php _e( 'Show class', NAME ); ?>
                </label>
            </p>
        <?php
   
}
    
    
   public function SaveAddAdditionalFormFields( $instance, $new_instance  ) {
 
    
         $instance['class_attr'] = $new_instance['class_attr'];
    return $instance;
    }


    
    
	
}
