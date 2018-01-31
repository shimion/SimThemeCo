<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class Load extends DWP_Widget {
      protected $configs = [];
/**
     * Echoes the widget content.
     *
     * Sub-classes should over-ride this function to generate their widget code.
     *
     * @since 2.8.0
     * @access public
     *
     * @param array $args     Display arguments including 'before_title', 'after_title',
     *                        'before_widget', and 'after_widget'.
     * @param array $instance The settings for the particular instance of the widget.
     */
        public function widget( $args, $instance ) {
            die('function WP_Widget::widget() must be over-ridden in a sub-class.');
        }
      
      
      
      
      
     public function preupdate($new_instance, $old_instance ) {

        $instance            = $old_instance;
        $instance['heading']   = $new_instance['heading']?? '';
         $instance['sid']   = $new_instance['sid'] ?? uniqid('section_');
        $instance['content']   = $new_instance['content']?? '';
        $instance['section_wapper']    = $new_instance['section_wapper'] ?? '';
        // $instance['section_background']    = $new_instance['section_background'] ?? '';
        $instance['section_title_color']    = $new_instance['section_title_color'] ?? '';
         $instance['section_color']    = $new_instance['section_color'] ?? '';
        $instance['section_link_color']    = $new_instance['section_link_color'] ?? ''; 
        $instance['section_background_image']    = $new_instance['section_background_image'] ?? 'none'; 
        $instance['section_background_repeat']    = $new_instance['section_background_repeat'] ?? 'no-repeat'; 
        $instance['section_background_position']    = $new_instance['section_background_position'] ?? 'none'; 
        $instance['section_background_attachment']    = $new_instance['section_background_attachment'] ?? ''; 
        $instance['section_background_size']    = $new_instance['section_background_size'] ?? ''; 
        $instance['section_background_color']    = $new_instance['section_background_color'] ?? '#FFF';  
        $instance['section_padding_top']    = $new_instance['section_padding_top'] ?? '50px'; 
         $instance['section_margin_top']    = $new_instance['section_margin_top'] ?? 'inherit'; 
        $instance['section_padding_bottom']    = $new_instance['section_padding_bottom'] ?? '50px'; 
         $instance['section_margin_bottom']    = $new_instance['section_margin_bottom'] ?? 'inherit'; 
        $instance['module_type']    = $new_instance['module_type'] ?? ''; 
        $instance['border_size']    = $new_instance['border_size'] ?? '0'; 
        $instance['border_position_top']    = $new_instance['border_position_top'] ?? ''; 
        $instance['border_position_bottom']    = $new_instance['border_position_bottom'] ?? ''; 
        $instance['border_position_left']    = $new_instance['border_position_left'] ?? ''; 
        $instance['border_position_right']    = $new_instance['border_position_right'] ?? ''; 
        $instance['border_color']    = $new_instance['border_color'] ?? 'none'; 
        $instance['title_aligment']    = $new_instance['title_aligment'] ?? 'none'; 
        $instance['text_aligment']    = $new_instance['text_aligment'] ?? 'none'; 
        $instance['section_link_color']    = $new_instance['section_link_color'] ?? 'inherit'; 
        $instance['section_link_color_hover']    = $new_instance['section_link_color_hover'] ?? 'inherit';
        $instance['paralax_overlay_opacity'] = $new_instance['paralax_overlay_opacity'] ?? '';
        $instance['paralax_overlay_color'] = $new_instance['paralax_overlay_color'] ?? '';
        $instance['enable_paralax_overlay'] = $new_instance['enable_paralax_overlay'] ?? false;
        $instance['section_additional_class'] = $new_instance['section_additional_class'] ?? '';
        $instance['section_content_bottom_space'] = $new_instance['section_content_bottom_space'] ?? '';
        $instance['section_enable_animation'] = $new_instance['section_enable_animation'] ?? false;
        //$instance = $this->AllConfigFieldsUpdateValue($new_instance, $instance);
       // print_r($instance);
       
        return $instance;

    }
      
      
      
     protected function AllConfigFieldsUpdateValue($new_instance, $instance){
          
          
            foreach ($this->configs as $key => $values) {
                
                  $instance[$values['id']] = $new_instance[$values['id']];
                
            }
          
         return $instance;
          
        }
      
      
            
      public function NewConfig(){
          return array();
      }
      
       
      
    function form( $instance ) {


      $instance   = wp_parse_args( $instance, array(
          'heading'   => '',
          'content'   => '', 
          'section_wapper'   => '', 
          'section_background_image'   => '',
          'section_background_repeat'   => '', 
          'section_background_position'   => '', 
          'section_background_attachment'   => '', 
          'section_background_size'   => '',
          'section_background_color'   => '',
          'section_color'   => '', 
          'section_title_color'   => '', 
          'section_link_color'   => '', 
          'module_type' => '',
          'border_size' => '',
          'border_position_top' => '',
          'border_position_bottom' => '',
          'border_position_left' => '',
          'border_position_right' => '',
          'title_aligment' => '',
          'text_aligment' => '',
          'section_link_color' => 'inherit',
          'section_link_color_hover' => 'inherit',
          'section_padding_top' => '50px',
          'section_padding_bottom' => '50px',
          'section_margin_top' => '0px',
          'section_margin_bottom' => '0px',
          'paralax_overlay_opacity' => '.5',
          'paralax_overlay_color' => '#1e73be',
          'enable_paralax_overlay' => false,
          'section_additional_class' => '',
           'section_content_bottom_space' => '',
          'section_enable_animation' => false,
          'layout' => '',
      ));
        
       // $this->Default('layout');

        
 
   

        
   echo '<div class="cs-title General_field_field_editor_content custom-style"><h4 style="margin-top: 0px; margin-bottom: 0px;">Widget Fields</h4></div>';   
        
        
        echo '<div class="dynamic-config-main-wapper">';
        
        echo '<div class="dynamic-config-wapper">';
        
      $value = esc_attr( $instance['heading'] );
      $field = array(
        'id'    => $this->get_field_name('heading'),
        'name'  => $this->get_field_name('heading'),
        'type'  => 'text',
        'title' => 'Title',
        'attributes'      => array(
          'class'     => 'default_data_field',
        ),
      );

      echo cs_add_element( $field, $value );
        
        
      $value = esc_attr( $instance['content'] ?? '');
      $field = array(
        'id'    => $this->get_field_name('content'),
        'name'  => $this->get_field_name('content'),
        'type'  => 'textarea',
        'title' => 'Description',
       
      );

        echo cs_add_element( $field, $value );
        echo  $this->UpdateForm($instance);
        
        echo '</div>';
        echo '</div>';
        
        
        
             $settings = '<div class="cs-title settings_title custom-style"><h4>Section Settings</h4></div>';
            $settings .= '<div class="st_settings_wapper" style="display: none;">';
       
            $value = esc_attr( $instance['section_wapper'] ?? '' );
            $field = array(
                'id'    => $this->get_field_name('section_wapper'),
                'name'    => $this->get_field_name('section_wapper'),
                'type'  => 'select',
                'title' => 'Section Wapper',
                'options' => array(
                'full-width' => 'Fullwidth',
                'full-width-stretch' => 'Fullwidth Stretch',
                )
            );

            $settings .= cs_add_element( $field, $value );
        
        
    $settings .= '<div class="st-clospore-panel" >';
    $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Background Settings</h4></div>';
        
        
    $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
    $value = esc_attr( $instance['section_background_image'] ?? '' );
    $field = array(
                'pseudo'          => true,
                'id'    => $this->get_field_name('section_background_image'),
                'name'    => $this->get_field_name('section_background_image'),
                'type'  => 'upload',
                'title' => 'Section Background',
    );

    $settings .= cs_add_element( $field, $value );
           
        
        
        
        
   // background attributes
     
     $value = esc_attr( $instance['section_background_repeat'] ?? '' );   
     $settings .= cs_add_element( array(
         'pseudo'          => true,
        'type'            => 'select',
        'name'            => $this->get_field_name('section_background_repeat'),
        'id'            => $this->get_field_name('section_background_repeat'),
        'options'         => array(
          ''              => 'repeat',
          'repeat-x'      => 'repeat-x',
          'repeat-y'      => 'repeat-y',
          'no-repeat'     => 'no-repeat',
          'inherit'       => 'inherit',
        ),
        'attributes'      => array(
          'data-atts'     => 'repeat',
        ),
        ),  $value);
      $value = esc_attr( $instance['section_background_position'] ?? '' );    
     $settings .= cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
        'name'            => $this->get_field_name('section_background_position'),
        'id'            => $this->get_field_name('section_background_position'),
        'options'         => array(
          ''              => 'left top',
          'left center'   => 'left center',
          'left bottom'   => 'left bottom',
          'right top'     => 'right top',
          'right center'  => 'right center',
          'right bottom'  => 'right bottom',
          'center top'    => 'center top',
          'center center' => 'center center',
          'center bottom' => 'center bottom'
        ),
        'attributes'      => array(
          'data-atts'     => 'position',
        ),

    ), $value );
    $value = esc_attr( $instance['section_background_attachment'] ?? '' );      
     $settings .= cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
         'name'            => $this->get_field_name('section_background_attachment'),
        'id'            => $this->get_field_name('section_background_attachment'),
       'options'         => array(
          ''              => 'scroll',
          'fixed'         => 'fixed',
        ),
        'attributes'      => array(
          'data-atts'     => 'attachment',
        ),
    ), $value );
    $value = esc_attr( $instance['section_background_size'] ?? '' );
     $settings .= cs_add_element( array(
        'pseudo'          => true,
        'type'            => 'select',
         'name'            => $this->get_field_name('section_background_size'),
        'id'            => $this->get_field_name('section_background_size'),
       'options'         => array(
          ''              => 'size',
          'cover'         => 'cover',
          'contain'       => 'contain',
          'inherit'       => 'inherit',
          'initial'       => 'initial',
        ),
        'attributes'      => array(
          'data-atts'     => 'size',
        ),
    ), $value );
     $value = esc_attr( $instance['section_background_color'] ?? '' );   
     $settings .= cs_add_element( array(
        'pseudo'          => true,
         'name'            => $this->get_field_name('section_background_color'),
        'id'            => $this->get_field_name('section_background_color'),
        'type'            => 'color_picker',
        'attributes'      => array(
          'data-atts'     => 'bgcolor',
        ),
         'rgba'            => '',
    ), $value );
            
        
        
        $settings .= '</fieldset>';
        $settings .= '</div>';
        
         
        
            $settings .= '<div class="st-clospore-panel" >';
             $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Section Spacing</h4></div>';
        
        
            $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
        
            $value = esc_attr( $instance['section_margin_top'] ?? '' );   
            $settings .= cs_add_element( array(
           // 'pseudo'          => true,
             'name'            => $this->get_field_name('section_margin_top'),
            'id'            => $this->get_field_name('section_margin_top'),
            'type'            => 'text',
            'attributes'      => array(
              'placeholder' => '30px',
            ),
                
             'title'            => 'Margin Top',
        ), $value );
        
        $value = esc_attr( $instance['section_margin_bottom'] ?? '' );   
            $settings .= cs_add_element( array(
         //   'pseudo'          => true,
             'name'            => $this->get_field_name('section_margin_bottom'),
            'id'            => $this->get_field_name('section_margin_bottom'),
            'type'            => 'text',
            'attributes'      => array(
              'placeholder' => '30px',
            ),
             'title'            => 'Margin Bottom',
        ), $value );
      
        
     $value = esc_attr( $instance['section_padding_top'] ?? '' );   
     $settings .= cs_add_element( array(
      //  'pseudo'          => true,
         'name'            => $this->get_field_name('section_padding_top'),
        'id'            => $this->get_field_name('section_padding_top'),
        'type'            => 'text',
        'attributes'      => array(
          'placeholder' => '50px',
        ),
         'title'            => 'Padding Top',
    ), $value );

    $value = esc_attr( $instance['section_padding_bottom'] ?? '' );   
     $settings .= cs_add_element( array(
      //  'pseudo'          => true,
         'name'            => $this->get_field_name('section_padding_bottom'),
        'id'            => $this->get_field_name('section_padding_bottom'),
        'type'            => 'text',
        'attributes'      => array(
          'placeholder' => '50px',
        ),
         'title'            => 'Padding Bottom',
    ), $value );

        $settings .= '</fieldset>';
        $settings .= '</div>';
      
   
    
    //border start    
    $settings .= '<div class="st-clospore-panel" >';
    $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Section Border</h4></div>';
        
        
    $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
       
     $value = esc_attr( $instance['border_size'] ?? '' );   
     $settings .= cs_add_element( array(
        //'pseudo'          => true,
         'name'            => $this->get_field_name('border_size'),
        'id'            => $this->get_field_name('border_size'),
        'type'            => 'text',
         'title'            => 'Border size',
    ), $value );

        
     $value = esc_attr( $instance['border_position_top'] ?? '' );   
     $settings .= cs_add_element( array(
        //'pseudo'          => true,
         'name'            => $this->get_field_name('border_position_top'),
        'id'            => $this->get_field_name('border_position_top'),
        'type'            => 'switcher',
         'title'        => 'Enable Border top   '
    ), $value );

        
    $value = esc_attr( $instance['border_position_right'] ?? '' );   
     $settings .= cs_add_element( array(
      //  'pseudo'          => true,
         'name'            => $this->get_field_name('border_position_right'),
        'id'            => $this->get_field_name('border_position_right'),
        'type'            => 'switcher',
         'title'        => 'Enable Border right   '
    ), $value );
                 
    $value = esc_attr( $instance['border_position_bottom'] ?? '' );   
     $settings .= cs_add_element( array(
      //  'pseudo'          => true,
         'name'            => $this->get_field_name('border_position_bottom'),
        'id'            => $this->get_field_name('border_position_bottom'),
        'type'            => 'switcher',
         'title'        => 'Enable Border bottom   '
    ), $value );

        
    $value = esc_attr( $instance['border_position_left'] ?? '' );   
     $settings .= cs_add_element( array(
       // 'pseudo'          => true,
         'name'            => $this->get_field_name('border_position_left'),
        'id'            => $this->get_field_name('border_position_left'),
        'type'            => 'switcher',
         'title'        => 'Enable Border left   '
    ), $value );

   $value = esc_attr( $instance['border_color'] ?? '' );   
     $settings .= cs_add_element( array(
      //  'pseudo'          => true,
         'name'            => $this->get_field_name('border_color'),
        'id'            => $this->get_field_name('border_color'),
        'type'            => 'color_picker',
           'title'            => 'Border Color',
    ), $value );      
        
        
           
       
           
         $settings .= '</fieldset>';
        $settings .= '</div>';
      
   

        
 // $settings .= '</fieldset" >';      
        
        
        
       
        
        
      //Section content styles        
        
             $settings .= '<div class="st-clospore-panel" >';
             $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Section Content Style</h4></div>';
        
        
            $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
        
       
        
            $value = esc_attr( $instance['section_title_color'] ?? '' );
            $field = array(
                'id'    => $this->get_field_name('section_title_color'),
                'name'    => $this->get_field_name('section_title_color'),
                'type'  => 'color_picker',
                'title' => 'Section Title Color',
            );

       
        $settings .= cs_add_element( $field, $value );
        
        
       
            $value = esc_attr( $instance['section_color'] ?? '' );
            $field = array(
                'id'    => $this->get_field_name('section_color'),
                'name'    => $this->get_field_name('section_color'),
                'type'  => 'color_picker',
                'title' => 'Section Text Color',
            );

            $settings .= cs_add_element( $field, $value );
        
            $value = esc_attr( $instance['section_link_color'] ?? 'inherant' );
            $field = array(
                'id'    => $this->get_field_name('section_link_color'),
                'name'    => $this->get_field_name('section_link_color'),
                'type'  => 'color_picker',
                'title' => 'Link Color',
            );

            $settings .= cs_add_element( $field, $value );
           
            $value = esc_attr( $instance['section_link_color_hover'] ?? 'inherant' );
            $field = array(
                'id'    => $this->get_field_name('section_link_color_hover'),
                'name'    => $this->get_field_name('section_link_color_hover'),
                'type'  => 'color_picker',
                'title' => 'Link Color Hover',
            );

            $settings .= cs_add_element( $field, $value );
        
            $value = esc_attr( $instance['title_aligment'] ?? '' );
            $field = array(
                'id'    => $this->get_field_name('title_aligment'),
                'name'    => $this->get_field_name('title_aligment'),
                'type'  => 'select',
                'title' => 'Title Alignment',
               'options' => array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right',
                )
                
            );

            $settings .= cs_add_element( $field, $value );
        
            $value = esc_attr( $instance['text_aligment'] ?? '' );
            $field = array(
                'id'    => $this->get_field_name('text_aligment'),
                'name'    => $this->get_field_name('text_aligment'),
                'type'  => 'select',
                'title' => 'Text Alignment',
                'options' => array(
                    'center' => 'Center',
                    'left' => 'Left',
                    'right' => 'Right',
                )
            );

        $settings .= cs_add_element( $field, $value );
        
         $value = esc_attr( $instance['section_content_bottom_space'] ?? '' );   
             $settings .= cs_add_element( array(
              //  'pseudo'          => true,
                 'name'            => $this->get_field_name('section_content_bottom_space'),
                'id'            => $this->get_field_name('section_content_bottom_space'),
                'type'            => 'text',
                    'attributes'      => array(
                    'placeholder' => '50px',
                ),
                'title'            => 'Content Bottom Space',
                'help'            => 'This space will add under the title and content section. It helps when you have additional content after the main title and content.', 
            ), $value );      

        
        
        
        
        $settings .= '</fieldset>';
        $settings .= '</div>';
        
        
        $settings .= '<div class="st-clospore-panel" >';
        $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Section Additional Settings</h4></div>';
        $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
        $value = esc_attr( $instance['enable_paralax_overlay'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('enable_paralax_overlay'),
                'name'    => $this->get_field_name('enable_paralax_overlay'),
                'type'  => 'switcher',
                'title' => 'Enable Paralax Overlay',
                'help' => 'Enable to show custom paralax overlay.',
            
            );
        $settings .= cs_add_element( $field, $value );

        $value = esc_attr( $instance['paralax_overlay_opacity'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('paralax_overlay_opacity'),
                'name'    => $this->get_field_name('paralax_overlay_opacity'),
                'type'  => 'select',
                'title' => 'Paralax Overlay Opacity',
                'options' => array(
                    '.1' => '10',
                     '.2' => '20',
                     '.3' => '30',
                     '.4' => '40',
                     '.5' => '50',
                     '.6' => '60',
                     '.7' => '70',
                     '.8' => '80',
                     '.9' => '90',
                     '1' => '100',
                        ),
                
            );
        $settings .= cs_add_element( $field, $value );

       $value = esc_attr( $instance['paralax_overlay_color'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('paralax_overlay_color'),
                'name'    => $this->get_field_name('paralax_overlay_color'),
                'type'  => 'color_picker',
                'title' => 'Paralax Overlay Background',
            );
        $settings .= cs_add_element( $field, $value );

        $value = esc_attr( $instance['section_additional_class'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('section_additional_class'),
                'name'    => $this->get_field_name('section_additional_class'),
                'type'  => 'text',
                'title' => 'Section Additional Class',
                'help' => 'This class will add to the section wapper at the very top. It will help to add additional CSS.'
            );
        $settings .= cs_add_element( $field, $value );
        
        
        $value = esc_attr( $instance['section_enable_animation'] ?? false );
        $field = array(
                'id'    => $this->get_field_name('section_enable_animation'),
                'name'    => $this->get_field_name('section_enable_animation'),
                'type'  => 'switcher',
                'title' => 'Animation',
                'help' => 'Enable to add animation to this specific section'
            );
        $settings .= cs_add_element( $field, $value );       
        
        
        
        $settings .= '</fieldset>';
        $settings .= '</div>';        
        
        
        
        
        
        // Add some space and then add a section 
        //formet example
        /*
        
        $settings .= '<div class="st-clospore-panel" >';
        $settings .= '<div class="cs-title closepore_title_widget custom-style"><h4>Section Content Style</h4></div>';
        $settings .= '<fieldset class="background-setting-wapper clospore_content" >';
        $value = esc_attr( $instance['section_title_color'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('section_title_color'),
                'name'    => $this->get_field_name('section_title_color'),
                'type'  => 'color_picker',
                'title' => 'Section Title Color',
            );
        $settings .= cs_add_element( $field, $value );
        $settings .= '</fieldset>';
        $settings .= '</div>';
        
        
        
        //end the section
        //Note: It is a clospore section where class .st-clospore-panel is the wapper
        // It has title wapper where you need to click to view the section.
        // every fields will be placed under "<fieldset class="background-setting-wapper clospore_content" >"
        
        
        // A individual field example is :
        $value = esc_attr( $instance['section_title_color'] ?? '' );
        $field = array(
                'id'    => $this->get_field_name('section_title_color'),
                'name'    => $this->get_field_name('section_title_color'),
                'type'  => 'color_picker',
                'title' => 'Section Title Color',
            );
        $settings .= cs_add_element( $field, $value );
        // end if a individual section
        // here we have type they can be set to text, textarea, color, media, image, select, color_picker . 
        // More detailes here at: http://codestarframework.com/documentation/#options
        
        */
        
        
        
        
        
            // End content style
          $settings .= '</div>';
            echo $settings;
        
        
        
        
        
        


    }
      
     
      public function UpdateForm($instance){
          
      }
      
}