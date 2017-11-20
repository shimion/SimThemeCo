<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class CallToActionWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'call_to_action_widget',
        'description' => 'Widget for displaying call to action button with additional info.'
      );

      parent::__construct( 'call_to_action_widget', 'Call To Action Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Call_To_Action', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['button_text']    = $new_instance['button_text'];
    $instance['button_url']    = $new_instance['button_url'];
      $instance['additional_text']    = $new_instance['additional_text'];

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Events',
        'button_text'    => 'Get Subscribe',
        'button_url'    => '',
        'additional_text'    => 'Total Subscriber | 10.3k',
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

      // Call to action button text
      // -------------------------------------------------
      $date_value = esc_attr( $instance['button_text'] );
      $date_field = array(
        'id'    => $this->get_field_name('button_text'),
        'name'  => $this->get_field_name('button_text'),
        'type'  => 'text',
        'title' => 'Button Text Here',
        'default' => '',
        'info'  => 'Change the call to action button text from here.',
      );

      echo cs_add_element( $date_field, $date_value );

     // Call to action button url
      // -------------------------------------------------
      $date_value = esc_attr( $instance['button_url'] );
      $date_field = array(
        'id'    => $this->get_field_name('button_url'),
        'name'  => $this->get_field_name('button_url'),
        'type'  => 'text',
        'title' => 'Button Url Here',
        'default' => '',
        'info'  => 'Change the call to action button url.',
      );

      echo cs_add_element( $date_field, $date_value );

     // Call to action additional text
      // -------------------------------------------------
      $date_value = esc_attr( $instance['additional_text'] );
      $date_field = array(
        'id'    => $this->get_field_name('additional_text'),
        'name'  => $this->get_field_name('additional_text'),
        'type'  => 'textarea',
        'title' => 'Button Text Here',
        'default' => '',
        'info'  => 'Additional text for call to action button.',
      );

      echo cs_add_element( $date_field, $date_value );

      //

    }
  }

