<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class LayoutWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'layout_widget',
        'description' => 'It helps to build Awesome layout.'
      );

      parent::__construct( 'layout_widget', 'Layout Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       print_r($instance);
      echo apply_filters( 'Action_Layout_Widget', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
    $instance['layout']    =  array(
          'name'      => $this->get_field_name('layout'),
          'id'      => $this->get_field_name('layout'),
          'title'           => 'Group Field',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
            'type'            => 'group',
          'fields'          => array(

            array(
              'id'          => 'unique_group_1_text',
              'type'        => 'text',
              'title'       => 'Text Field',
            ),

            array(
              'id'          => 'unique_group_1_switcher',
              'type'        => 'switcher',
              'title'       => 'Switcher Field',
            ),

            array(
              'id'          => 'unique_group_1_textarea',
              'type'        => 'textarea',
              'title'       => 'Upload Field',
            ),

          ),              

        );
        
        echo maybe_serialize($new_instance['layout']);
        
        
        
        
        
      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Events',
        'layout'    =>   array(
          'name'      => $this->get_field_name('layout'),
          'id'      => $this->get_field_name('layout'),
          'title'           => 'Group Field',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
            'type'            => 'group',
          'fields'          => array(

            array(
              'id'          => 'unique_group_1_text',
              'type'        => 'text',
              'title'       => 'Text Field',
            ),

            array(
              'id'          => 'unique_group_1_switcher',
              'type'        => 'switcher',
              'title'       => 'Switcher Field',
            ),

            array(
              'id'          => 'unique_group_1_textarea',
              'type'        => 'textarea',
              'title'       => 'Upload Field',
            ),

          ),              
        )
        
      ));

      //
      // text field example
      // -------------------------------------------------
        
       $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );

      echo cs_add_element( $text_field, $text_value );

       
      $value =  $this->get_field_name('layout') ;
        
        
      $layout_value = esc_attr( $instance['layout'] );
      $layout_field = 
          
          
          array(
          'name'      => $this->get_field_name('layout'),
          'id'      => $this->get_field_name('layout'),
          'title'           => 'Group Field',
          'button_title'    => 'Add New',
          'accordion_title' => 'Add New Field',
            'type'            => 'group',
          'fields'          => array(

            array(
              'id'          => 'unique_group_1_text',
              'type'        => 'text',
              'title'       => 'Text Field',
            ),

            array(
              'id'          => 'unique_group_1_switcher',
              'type'        => 'switcher',
              'title'       => 'Switcher Field',
            ),

            array(
              'id'          => 'unique_group_1_textarea',
              'type'        => 'textarea',
              'title'       => 'Upload Field',
            ),

          ),              
        );



      echo cs_add_element( $layout_field, $layout_value );

    }
  }

