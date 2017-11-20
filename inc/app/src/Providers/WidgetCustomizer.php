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
        $args['before_widget'] = $this->WidgetLayoutBefore($instance, $class, $args);
        $args['after_widget'] = $this->WidgetLayoutAfter($instance, $class, $args);
        $class->widget( $args, $instance );
        return false;
    }
    
    
    public function WidgetLayoutBefore($instance, $class, $args){
        $html = '';
        $class_attr = !empty($instance['class_attr']) ? $instance['class_attr'] : '';
        if(isset($instance['layout_widget']) && !empty($instance['layout_widget'])){
           if( $instance['layout_widget'] == 'fullwidth'){
               $html .= '<section class="'.str_replace(' ', '_', $class->name).'">';
                $html .= '<div class="container container_'.str_replace(' ', '_', $class->name).'">';
                }elseif( $instance['layout_widget'] == 'fullwidth_stretch' ){
                $html .= '<section class="'.str_replace(' ', '_', $class->name).'">';  
                $html .= '<div class="container-full container_'.str_replace(' ', '_', $class->name).'">';  
           }
       
            }else{
                $html .= '<div id="'.$class->id.'" class="col-sm '.str_replace(' ', '_', $class->name).' '.$class_attr.' widget widget_'.$class->id.'">';
            }
        
        return $html;
    }
    
    
	
    public function WidgetLayoutAfter($instance, $class, $args){
       $html = '';
        if(isset($instance['layout_widget'] ) && !empty($instance['layout_widget'] )){
        
            if( $instance['layout_widget'] == 'fullwidth'){
         
            $html .= '</div>';
            $html .= '</section>';
            }elseif( $instance['layout_widget'] == 'fullwidth_stretch' ){
            $html .= '</div>';
            $html .= '</section>';
            }
        }else{
         $html .= '</div>';
       }
        
        return $html;
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
        
        
        
        // $layout = esc_attr( $instance['layout'] );
         $layout_values = esc_attr( $instance['layout_widget'] ?? '' );
      $layout_fields = array(
                  'id'    => $widget->get_field_name('layout_widget'),
                    'name'    => $widget->get_field_name('layout_widget'),
                  'type'  => 'select',
                  'title' => 'Select Layout',
                  
                  'options'        => array(
                    'default'          => 'Default Layout',
                    'fullwidth'     => 'Full Width Layout',
                    'fullwidth_stretch'         => 'Full Width Stretch Layout',
                  ),
                  'default' => 'default',
                
      );
        
        
        
        

      echo cs_add_element( $layout_fields, $layout_values );
        
        
        
   
}
    
    
   public function SaveAddAdditionalFormFields( $instance, $new_instance  ) {
 
    
         $instance['class_attr'] = $new_instance['class_attr'];
       $instance['layout_widget'] = $new_instance['layout_widget'];
    return $instance;
    }


    
    
	
}
