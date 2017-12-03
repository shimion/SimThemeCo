<?php 
namespace ST\Widgets;
use WP_Widget as Load;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class SlidersWidget extends Load {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'sliders_settings_widget',
        'description' => 'Slider widget to show multiple images as a carousel on any sidebar.'
      );

      parent::__construct( 'sliders_settings_widget', 'Slider Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Sliders', $instance );
      echo '</div>';

      echo $after_widget;

    }
      
    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['slider_id']    = $new_instance['slider_id'];
      return $instance;

    }

    function form( $instance ) {


      $instance   = wp_parse_args( $instance, array(
        'title'   => '',
        'slider_id'   => '',  
      ));

      $value = esc_attr( $instance['title'] );
      $field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
        
      );

      echo cs_add_element( $field, $value );
        
      $value = esc_attr( $instance['slider_id'] );
      $field = array(
        'id'    => $this->get_field_name('slider_id'),
        'name'  => $this->get_field_name('slider_id'),
        'type'  => 'text',
        'title' => 'Select Slider',
        
      );

      echo cs_add_element( $field, $value );


    }
  }

