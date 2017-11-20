<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class SectionWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'section_settings_widget',
        'description' => 'A very helpfull widget that helps to wrap any container or section. '
      );

      parent::__construct( 'section_settings_widget', 'Section Controller Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );
      //echo apply_filters( 'Action_Wapper_Controller', $instance );
        if( $instance['start_section'])   echo '<section class="'.$instance['section_class'].'">'; 
 
        if( $instance['start_container'])   echo '<div class="container">'; 
        if( $instance['enable_section_title']):
        echo '<div class="row">'; 
        echo '<h3 class="widgettitle">'.$instance['section_title'].'</h3>';
        echo '</div>';
        endif;
        if( $instance['start_section'])   echo '<div class="row">';
        if( $instance['end_section'])   echo '</div>';       
        if( $instance['end_container'])   echo '</div>'; 
         if( $instance['end_section'])   echo '</section>';       
    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
    //  $instance['title']   = $new_instance['title'];
      $instance['start_section']    = $new_instance['start_section'];
      $instance['section_class']    = $new_instance['section_class']; 
      $instance['section_background']    = $new_instance['section_background'];  
      $instance['section_color']    = $new_instance['section_color']; 
      $instance['enable_section_title']    = $new_instance['enable_section_title'];
      $instance['section_title']    = $new_instance['section_title'];        
      $instance['end_section']    = $new_instance['end_section'];    
      $instance['start_container']    = $new_instance['start_container'];
      $instance['end_container']    = $new_instance['end_container'];

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'start_section'   => false,
        'section_class'   => uniqid('sto_'),  
        'section_background'   => '',  
        'section_color'   => '',  
          'enable_section_title'   => false,  
          'section_title'   => '',  
        'end_section'    => false,
        'start_container'    => false,
        'end_container'    => false,
      ));

      //
      // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['start_section'] );
      $text_field = array(
        'id'    => $this->get_field_name('start_section'),
        'name'  => $this->get_field_name('start_section'),
        'type'  => 'switcher',
        'title' => 'Start Section',
        
      );

      echo cs_add_element( $text_field, $text_value );

     // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['enable_section_title'] );
      $text_field = array(
        'id'    => $this->get_field_name('enable_section_title'),
        'name'  => $this->get_field_name('enable_section_title'),
        'type'  => 'switcher',
        'title' => 'Enable Section Title',
        'dependency'   => array( $this->get_field_name('start_section'), '!=', false ), 
      );

      echo cs_add_element( $text_field, $text_value );

     // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['section_title'] );
      $text_field = array(
        'id'    => $this->get_field_name('section_title'),
        'name'  => $this->get_field_name('section_title'),
        'type'  => 'text',
        'title' => 'Section Title',
        'dependency'   => array( $this->get_field_name('enable_section_title'), '!=', false ),  
      );

      echo cs_add_element( $text_field, $text_value );

        
        
        
        
      // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['section_class'] );
      $text_field = array(
        'id'    => $this->get_field_name('section_class'),
        'name'  => $this->get_field_name('section_class'),
        'type'  => 'text',
        'title' => 'Section Class',
        'dependency'   => array( $this->get_field_name('start_section'), '!=', false ),  
      );

      echo cs_add_element( $text_field, $text_value );

      // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['section_background'] );
      $text_field = array(
        'id'    => $this->get_field_name('section_background'),
        'name'  => $this->get_field_name('section_background'),
        'type'  => 'color_picker',
        'title' => 'Section Background Color',
        'dependency'   => array( $this->get_field_name('start_section'), '!=', false ),  
      );

      echo cs_add_element( $text_field, $text_value );

      // Start Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['section_color'] );
      $text_field = array(
        'id'    => $this->get_field_name('section_color'),
        'name'  => $this->get_field_name('section_color'),
        'type'  => 'color_picker',
        'title' => 'Section Text Color',
        'dependency'   => array( $this->get_field_name('start_section'), '!=', false ),  
      );

      echo cs_add_element( $text_field, $text_value );

       //
      // End Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['end_section'] );
      $text_field = array(
        'id'    => $this->get_field_name('end_section'),
        'name'  => $this->get_field_name('end_section'),
        'type'  => 'switcher',
        'title' => 'End Section',
      );

      echo cs_add_element( $text_field, $text_value );

        //
      // End Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['start_container'] );
      $text_field = array(
        'id'    => $this->get_field_name('start_container'),
        'name'  => $this->get_field_name('start_container'),
        'type'  => 'switcher',
        'title' => 'Start Container',
      );

      echo cs_add_element( $text_field, $text_value );

       //
      // End Section Controller
      // -------------------------------------------------
      $text_value = esc_attr( $instance['end_container'] );
      $text_field = array(
        'id'    => $this->get_field_name('end_container'),
        'name'  => $this->get_field_name('end_container'),
        'type'  => 'switcher',
        'title' => 'End Container',
      );

      echo cs_add_element( $text_field, $text_value );



      //

    }
  }

