<?php 
/*
Add Export_Layer Script 
Run Via ajax call
example: http://mercer.simtheme.com/wp-admin/admin-ajax.php?action=Export_Layer
*/
add_action( 'wp_ajax_Export_Layer', 'Export_Layer' );
add_action( 'wp_ajax_nopriv_Export_Layer', 'Export_Layer' );
function Export_Layer(){
    
    
    // Get all available widgets site supports.
	$available_widgets = st_available_widgets();

	// Get all widget instances for each widget.
	$widget_instances = array();

	// Loop widgets.
	foreach ( $available_widgets as $widget_data ) {

		// Get all instances for this ID base.
		$instances = get_option( 'widget_' . $widget_data['id_base'] );

		// Have instances.
		if ( ! empty( $instances ) ) {

			// Loop instances.
			foreach ( $instances as $instance_id => $instance_data ) {

				// Key is ID (not _multiwidget).
				if ( is_numeric( $instance_id ) ) {
					$unique_instance_id = $widget_data['id_base'] . '-' . $instance_id;
					$widget_instances[ $unique_instance_id ] = $instance_data;
				}

			}

		}

	}
    
    
    
    
    
    $sidebars_widgets = get_option( 'sidebars_widgets' );
    	$postID = $_REQUEST['postID'];
	$sidebars_widget_instances = array();
	foreach ( $sidebars_widgets as $sidebar_id => $widget_ids ) {
       // echo $postID;
		// Skip inactive widgets.
		if ( 'st-sidebar-'. $postID !== $sidebar_id ) {
			continue;
		}
       // print_r($sidebar_id).'<br>';
		// Skip if no data or not an array (array_version).
		if ( ! is_array( $widget_ids ) || empty( $widget_ids ) ) {
			continue;
		}
            
		// Loop widget IDs for this sidebar.
		foreach ( $widget_ids as $widget_id ) {

			// Is there an instance for this widget ID?
			if ( isset( $widget_instances[ $widget_id ] ) ) {

				// Add to array.
				$sidebars_widget_instances[ $sidebar_id ][ $widget_id ] = $widget_instances[ $widget_id ];
                

			}

		}

	}

	// Filter pre-encoded data.
	$data = apply_filters( 'st_unencoded_export_data', $sidebars_widget_instances );

	// Encode the data for file contents.
	$encoded_data = wp_json_encode( $sidebars_widget_instances );
        header('Content-disposition: attachment; filename=file.json');
        header('Content-type: application/json');
        echo $encoded_data;
        //echo $data;
    exit();

}

