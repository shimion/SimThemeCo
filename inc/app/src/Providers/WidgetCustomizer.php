<?php 
// Depreciated Since 1.4
// Has Code: It is still 
// Having problem with Customizer Edit Icon
// Widgets are repeating on customizer


namespace ST\Providers;
use WP_Widget as CUS_Widget;
class WidgetCustomizer extends CUS_Widget 
 {
    public $class_attr;
   // $instance = apply_filters( 'widget_display_callback', $instance, $this, $args );
 
    function __construct() {
       add_filter('in_widget_form', array($this, 'AddAdditionalFormFields'), 10, 3 );
      //  add_filter('widget_update_callback', array($this, 'SaveAddAdditionalFormFields'), 10, 2 );
        //$this->class_attr = isset( $instance['class_attr'] ) ? $instance['class_attr'] : '';
     //  add_filter('widget_display_callback', array($this, 'call_widget_filter_header_top'), 10, 3);
        //add_filter('widget_display_callback', array($this, 'call_widget_filter_sidebar'), 10, 3);    
        
	}

    //Building repeating problem
    public function call_widget_filter_sidebar($instance, $class, $args){
        $args['before_widget'] = $args['before_widget'] ?? '';
        $args['after_widget'] = $args['after_widget'] ?? '';
        $class->widget( $args, $instance );
        return false;
    }
        
    
    //Building repeating problem
    public function call_widget_filter_header_top($instance, $class, $args){
        $args['before_widget'] = $this->WidgetLayoutBefore($instance, $class, $args);
        $args['after_widget'] = $this->WidgetLayoutAfter($instance, $class, $args);
        $class->widget( $args, $instance );
        return false;
    }
    
    //Building repeating problem
    public function WidgetLayoutBefore($instance, $class, $args){
        $html = '';
        $layoutWidget = isset($instance['layout_widget']) ? $instance['layout_widget'] : 'default';
        $sid = isset($instance['sid']) ? $instance['sid'] : 'default';
        $class_attr = !empty($instance['class_attr']) ? $instance['class_attr'] : '';
        /*if(isset($layoutWidget) && 'default' != $layoutWidget){
           if( $layoutWidget == 'fullwidth'){
               $html .= '<section id= "'.$sid.'" class="'.str_replace(' ', '_', $class->name).'">';
                $html .= '<div id= "container_'.$sid.'"  class="container container_'.str_replace(' ', '_', $class->name).'">';
                }elseif( $layoutWidget == 'fullwidth_stretch' ){
                $html .= '<section id= "'.$sid.'"  class="'.str_replace(' ', '_', $class->name).'">';  
                $html .= '<div id= "container_'.$sid.'" class="container-full container_'.str_replace(' ', '_', $class->name).'">';  
           }
       
            }elseif( $layoutWidget == 'default'){
                $html .= '<div id="'.$class->id.'" class="col-sm '.str_replace(' ', '_', $class->name).' '.$class_attr.' widget widget_'.$class->id.'">';
            }else{
                $html .= '<div id="'.$class->id.'" class="col-sm '.str_replace(' ', '_', $class->name).' '.$class_attr.' widget widget_'.$class->id.'">';
            }*/
        
        return $html;
    }
    
    
	
    public function WidgetLayoutAfter($instance, $class, $args){
       $html = '';
        $layoutWidget = isset($instance['layout_widget']) ? $instance['layout_widget'] : 'default';
       if(isset($layoutWidget) && 'default' != $layoutWidget){
        
            if( $layoutWidget == 'fullwidth'){
         
            $html .= '</div>';
            $html .= '</section>';
            }elseif( $layoutWidget == 'fullwidth_stretch' ){
            $html .= '</div>';
            $html .= '</section>';
            }
        }elseif( $layoutWidget == 'default'){
           $html .= '</div>';
        }else{
         $html .= '</div>';
       }
        
        return $html = '';
    }
    
    
	
	public function AddAdditionalFormFields( $widget, $return, $instance ) {
 
  
        $sid = isset( $instance['sid'] ) ? $instance['sid'] : $this->UniqueID();
        // Display the class_attr option.
        $class_attr = isset( $instance['class_attr'] ) ? $instance['class_attr'] : '';

        
        
        
        // $layout = esc_attr( $instance['layout'] );
        /* $layout_values = esc_attr( $instance['layout_widget'] ?? '' );
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
        */
        
        
   
}
    
    
   public function SaveAddAdditionalFormFields( $instance, $new_instance  ) {
 
    
         $instance['class_attr'] = $new_instance['class_attr'];
       $instance['layout_widget'] = $new_instance['layout_widget'];
       $instance['sid'] = $new_instance['sid'];
    return $instance;
    }


   public  function UniqueID(){
     return  uniqid('section_');
   } 
    
	
}
