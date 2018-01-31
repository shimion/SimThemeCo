<?php 
namespace ST\Widgets;
use WP_Widget as DWP_Widget;
/**
 * D: This CLass is created for showing latest event
 * Class: LatestEventWidget 
 *
 */

  class PostTypeWidget extends DWP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'posttype_widget',
        'description' => 'Display any posttype with additional settings.'
      );

      parent::__construct( 'posttype_widget', 'Post Type Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

      if ( ! empty( $instance['title'] ) ) {
        echo $before_title . $instance['title'] . $after_title;
      }

      echo '<div class="textwidget">';
       // print_r($instance);
      echo apply_filters( 'Action_Post_Type', $instance );
      echo '</div>';

      echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['post_type']    = $new_instance['post_type'];
      $instance['thank_you_url']    = $new_instance['thank_you_url'];
      $instance['total_posts']    = $new_instance['total_posts'];
      $instance['title_text_limit']    = $new_instance['title_text_limit'];
      $instance['content_text_limit'] = $new_instance['content_text_limit'];
      $instance['view_all_text'] = $new_instance['view_all_text'];
      $instance['view_all_url'] = $new_instance['view_all_url'];           
      $instance['enable_button'] = $new_instance['enable_button'];  
      return $instance;

    }

    function form( $instance ) {

      //
      // set defaults
      // -------------------------------------------------
      $instance   = wp_parse_args( $instance, array(
        'title'   => 'Latest Post',
        'post_type'    => '',
        'total_posts'    => '',
        'enable_date'    => true,
        'enable_description' => true,
        'content_text_limit' => '5', 
        'title_text_limit' => '15',
        'view_all_url' => '',
        'view_all_text' => 'View All',
        'enable_button' => true,  
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

      // upload field example
      // -------------------------------------------------
      $value = esc_attr( $instance['post_type'] );
      $fields = array(
        'id'    => $this->get_field_name('post_type'),
        'name'  => $this->get_field_name('post_type'),
        'type'  => 'text',
        'title' => 'Post Type',
        'desc'  => 'The number of posts will show on this widget',
      );

      echo cs_add_element( $fields, $value );


      // upload field example
      // -------------------------------------------------
      $posts_value = esc_attr( $instance['total_posts'] );
      $total_posts = array(
        'id'    => $this->get_field_name('total_posts'),
        'name'  => $this->get_field_name('total_posts'),
        'type'  => 'number',
        'title' => 'Total Posts',
        'desc'  => 'The number of posts will show on this widget',
      );

      echo cs_add_element( $total_posts, $posts_value );


      // Title Limit FIeld
      // -------------------------------------------------
      $title_text_count_value = esc_attr( $instance['title_text_limit'] );
      $title_text_count_fields = array(
        'id'    => $this->get_field_name('title_text_limit'),
        'name'  => $this->get_field_name('title_text_limit'),
        'type'  => 'number',
        'title' => 'Title Words Limit',
        'default' => "3",
        'info'  => 'Provide the number of text you want to show on the title.',
      );

      echo cs_add_element( $title_text_count_fields, $title_text_count_value );

      // Content Limit FIeld
      // -------------------------------------------------
      $content_text_limit_value = esc_attr( $instance['content_text_limit'] );
      $content_text_limit_field = array(
        'id'    => $this->get_field_name('content_text_limit'),
        'name'  => $this->get_field_name('content_text_limit'),
        'type'  => 'number',
        'title' => 'Text Words Limit',
        'default' => "3",
        'info'  => 'Provide the number of text you want to show on the content.',
      );

      echo cs_add_element( $content_text_limit_field, $content_text_limit_value );

      
            // View All Button FIeld
      // -------------------------------------------------
      $view_all_value = esc_attr( $instance['enable_button'] );
      $view_all_field = array(
        'id'    => $this->get_field_name('enable_button'),
        'name'  => $this->get_field_name('enable_button'),
        'type'  => 'switcher',
        'title' => 'Enable View More Button',
        'info'  => 'Use this field to change the button text.',
      );

      echo cs_add_element( $view_all_field, $view_all_value );
    
        
        // View All Button FIeld
      // -------------------------------------------------
      $view_all_value = esc_attr( $instance['view_all_text'] );
      $view_all_field = array(
        'id'    => $this->get_field_name('view_all_text'),
        'name'  => $this->get_field_name('view_all_text'),
        'type'  => 'text',
        'title' => 'View All Posts Button Text',
        'info'  => 'Use this field to change the button text.',
      );

      echo cs_add_element( $view_all_field, $view_all_value );

     // View All Button FIeld
      // -------------------------------------------------
      $view_all_url_value = esc_attr( $instance['view_all_url'] );
      $view_all_url_field = array(
        'id'    => $this->get_field_name('view_all_url'),
        'name'  => $this->get_field_name('view_all_url'),
        'type'  => 'text',
        'title' => 'View All Request Button Url',
        'default' => "/",
        'info'  => 'Use this field to change the button url.',
      );

      echo cs_add_element( $view_all_url_field, $view_all_url_value );



      //

    }
  }

