<?php 
/**
 * D: This CLass is created for showing latest event
 * Class: EventsWidget 
 *
 */

  class textwidget extends Widget {
    protected $data;
    function __construct() {

      $widget_ops     = array(
        'classname'   => 'textwidget',
        'description' => 'Widget for showing Events.'
      );

      parent::__construct( 'textwidget', 'Text Widget', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;

    

      echo '<div class="textwidget">';
       // print_r($instance);
        $this->data = $instance;
       $View = new View('textwidget', $this->data);
        
       echo $View->Output();
      echo '</div>';

      echo $after_widget;

    }
      
      
      
     
      
      
      
      
      

    function update( $new_instance, $old_instance ) {

      $instance = array();
        $instance = Widget::preupdate($new_instance, $old_instance);
    
        $instance['title']			= ( !empty($new_instance['title']) ? strip_tags( $new_instance['title']) : '' );
        $instance['heading'] = ( !empty($new_instance['title']) ? strip_tags( $new_instance['title']) : '' );
		$instance['content']		= ( !empty($new_instance['content']) ? $new_instance['content'] : '' );
		$instance['output_title']	= ( isset($new_instance['output_title']) && $new_instance['output_title'] == "1" ? 1 : 0 );

		do_action( 'wp_editor_widget_update', $new_instance, $instance );

 	 	return apply_filters( 'wp_editor_widget_update_instance', $instance, $new_instance );

    }
      
      
	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function WidgetFields( $instance ) {

		if ( isset($instance['title']) ) {
			$title = $instance['title'];
		}
		else {
			$title = __( 'New title', 'wp-editor-widget' );
		}

		if ( isset($instance['content']) ) {
			$content = $instance['content'];
		}
		else {
			$content = "";
		}

		$output_title = ( isset($instance['output_title']) && $instance['output_title'] == "1" ? true : false );
		?>
		<input type="hidden" id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>" value="<?php echo esc_attr($content); ?>">
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'wp-editor-widget' ); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<p>
			<a href="javascript:WPEditorWidget.showEditor('<?php echo $this->get_field_id( 'content' ); ?>');" class="button"><?php _e( 'Edit content', 'wp-editor-widget' ) ?></a>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('output_title'); ?>">
				<input type="checkbox" id="<?php echo $this->get_field_id('output_title'); ?>" name="<?php echo $this->get_field_name('output_title'); ?>" value="1" <?php checked($output_title, true) ?>> <?php _e( 'Output title', 'wp-editor-widget' ); ?>
			</label>
		</p>
		<?php

	} // END form()

    
      
      
      

 }

