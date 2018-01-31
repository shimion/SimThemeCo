<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class LatestEventWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'latest_events_widget',
        'description' => 'Widget for showing latest events.'
      );

      parent::__construct( 'latest_events_widget', 'Latest Events Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Latest_Event_listing', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['total_posts']    = $new_instance['total_posts'];
      $instance['date']    = $new_instance['date'];
      $instance['time'] = $new_instance['time'];
     $instance['register_button'] = $new_instance['register_button'];

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Events',
        'total_posts'    => '',
        'date'    => '',
        'time' => '',
        'register_button' => '',  
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

      //
      // upload field example
      // -------------------------------------------------
      $posts_value = esc_attr( $instance['total_posts'] );
      $total_posts = array(
        'id'    => $this->get_field_name('total_posts'),
        'name'  => $this->get_field_name('total_posts'),
        'type'  => 'number',
        'title' => 'Total Events',
        'desc'  => 'The number of events will show on this widget',
      );

      echo cs_add_element( $total_posts, $posts_value );

      //
      // image field example
      // -------------------------------------------------
      $date_value = esc_attr( $instance['date'] );
      $date_field = array(
        'id'    => $this->get_field_name('sure'),
        'name'  => $this->get_field_name('sure'),
        'type'  => 'switcher',
        'title' => 'Enable Date',
        'default' => true,
        'info'  => 'Disable to hide date from the widget?',
      );

      echo cs_add_element( $date_field, $date_value );

      //
      // Switch field example
      // -------------------------------------------------
      $time_value = esc_attr( $instance['time'] );
      $time_field = array(
        'id'    => $this->get_field_name('time'),
        'name'  => $this->get_field_name('time'),
        'type'  => 'switcher',
        'title' => 'Enable Time',
        'default' => true,
        'info'  => 'Disable to hide time from the widget?',
      );

      echo cs_add_element( $time_field, $time_value );

     //
      // Switch field example
      // -------------------------------------------------
      $register_button_value = esc_attr( $instance['register_button'] );
      $register_button_field = array(
        'id'    => $this->get_field_name('register_button'),
        'name'  => $this->get_field_name('register_button'),
        'type'  => 'switcher',
        'title' => 'Enable Register Button',
        'default' => true,
        'info'  => 'Disable to hide time from the widget?',
      );

      echo cs_add_element( $register_button_field, $register_button_value );

    }
  }

