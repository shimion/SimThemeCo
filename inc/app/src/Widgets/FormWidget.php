<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class FormWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'form_widget',
        'description' => 'It will help to display theme builting forms.'
      );

      parent::__construct( 'form_widget', 'Form Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Form', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['button_text']    = $new_instance['button_text'];
      $instance['thank_you_url']    = $new_instance['thank_you_url'];

      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Events',
        'button_text'    => 'Submit',
        'thank_you_url'    => '',
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
        'info'  => 'Here you can change the form submit text.',
      );

      echo cs_add_element( $date_field, $date_value );

     // Call to action button url
      // -------------------------------------------------
      $thank_you_url_value = esc_attr( $instance['thank_you_url'] );
      $thank_you_url_field = array(
        'id'    => $this->get_field_name('thank_you_url'),
        'name'  => $this->get_field_name('thank_you_url'),
        'type'  => 'text',
        'title' => 'Thank You Page URL',
        'default' => '',
        'info'  => 'Use this field to set a custom thank you page when submit a form..',
      );

      echo cs_add_element( $thank_you_url_field, $thank_you_url_value );


      //

    }
  }

