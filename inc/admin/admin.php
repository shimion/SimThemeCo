<?php 
require _ADMIN. "option/cs-framework.php";
require _ADMIN. "slider-meta.php";
// add a link to the WP Toolbar
function reminify_admin_toolbar_links($wp_admin_bar) {
    $args = array(
        'id' => 'minify',
        'title' => 'Minify', 
        'href' => admin_url( 'admin-ajax.php?action=Minify' ), 
        'meta' => array(
            'class' => 'st-minify', 
            'title' => 'Minify Js/Css'
            )
    );
    $wp_admin_bar->add_node($args);
}
add_action('admin_bar_menu', 'reminify_admin_toolbar_links', 999);


/*add_action('customize_controls_print_scripts', 'your_function');
function your_function(){
  echo  '<script type="text/javascript">';
include(CS_URI .'/assets/js/cs-plugins.js');
    include(CS_URI .'/assets/js/cs-framework.js');
     echo  '</script>';
}*/




function Remove_Customizer( $wp_customize ) {
   
    $wp_customize->remove_section( 'title_tagline' );
     $wp_customize->remove_section( 'header_image' );
    
  
    //  =============================
    //  = Text Input                =
    //  =============================
 
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'sidebar-sidebar',
        'settings'   => 'sidebar-sidebar-widgets',
    ));
    
}
add_action( 'customize_register', 'Remove_Customizer', 99 );
 
    //  =============================
    //  = Enquery  jquery-ui-datepicker for admin only            =
    //  =============================
add_action( 'admin_enqueue_scripts', 'enquery_datepicker_optionframework' );
function enquery_datepicker_optionframework(){
     
         wp_enqueue_script( 'jquery-ui-datepicker' );
        
}

/**
 * Adds the datepicker settings to the admin footer.
 * Only loads on the plugin-name settings page
 */
function admin_footer() {

	$screen = get_current_screen();
        
	//if ( $screen->id == 'post' ) {

		?><script type="text/javascript">
			jQuery(document).ready(function($){
				
               $("#datepicker_event_start_date").datepicker({
					dateFormat : 'm/d/yy'
				});
                 $("#datepicker_event_end_date").datepicker({
					dateFormat : 'm/d/yy'
				});
			});
		</script><?php
		
	//}

} //  admin_footer()
add_action( 'admin_print_scripts', 'admin_footer', 1000 );

/**
 * Enqueues a Datepicker theme
 * Only loads on the plugin-name settings page
 */
function enqueue_datepicker_uistyles( $hook_suffix ) {

	$screen = get_current_screen();

	

		//wp_enqueue_style( 'jquery.ui.theme', ADMIN . '/option/assets/css/ui-date-picker.css' ), array( 'jquery-ui-core', 'jquery-ui-datepicker' ), $this->version, 'all' );
        wp_enqueue_style('jquery-ui-css',   '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
	

} // enqueue_styles()
add_action( 'admin_enqueue_scripts', 'enqueue_datepicker_uistyles' );



add_action('admin_footer', function(){
    
    
    ?>
    
    <style>
            body.post-php .cs-element.cs-element-no-title.cs-field-heading {
            font-size: 15px;
        }

        body.post-php .cs-title {
            float: none;
            display: block;
            width: 100%;
            padding-bottom: 10px;
        }

        body.post-php .cs-fieldset {
            margin-left: 0;
        }

        body.post-php input[type="text"] {
            /* width: 100%; */
            padding-top: 5px;
            padding-bottom: 5px;
        }

        body.post-php .cs-element.cs-element-no-title.cs-field-color_picker.cs-pseudo-field {
            top: 0;
            margin-top: auto;
            vertical-align: -webkit-baseline-middle;
            margin-bottom: 0;
        }
        
       body.post-php .cs-field-group .st-colors-sideyside .cs-element {
            max-width: 50%;
            display: inline-block;
}
    </style>
    <?php
    
});