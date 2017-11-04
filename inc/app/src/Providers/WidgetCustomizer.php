<?php 
namespace ST\Providers;
// resource take from https://themefoundation.com/custom-widget-options/
class WidgetCustomizer
 {
    
    
    function __construct() {
        add_filter('in_widget_form', array($this, 'AddAdditionalFormFields'), 10, 3 );
        add_filter('widget_update_callback', array($this, 'SaveAddAdditionalFormFields'), 10, 2 );
       
	}
	

	
	public function AddAdditionalFormFields( $widget, $return, $instance ) {
 
  
 
        // Display the description option.
        $description = isset( $instance['description'] ) ? $instance['description'] : '';
        ?>
            <p>
                <input class="checkbox" type="checkbox" id="<?php echo $widget->get_field_id('description'); ?>" name="<?php echo $widget->get_field_name('description'); ?>" <?php checked( true , $description ); ?> />
                <label for="<?php echo $widget->get_field_id('description'); ?>">
                    <?php _e( 'Show descriptions', 'thmfdn_textdomain' ); ?>
                </label>
            </p>
        <?php
   
}
    
    
    function SaveAddAdditionalFormFields( $instance, $new_instance ) {
 
    // Is the instance a nav menu and are descriptions enabled?
        if($new_instance['description'] )  {
        $new_instance['description'] = 1;
        }
 
        return $new_instance;
    }


    
    
	
}
