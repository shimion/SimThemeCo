<?php 
require _ADMIN. "option/cs-framework.php";
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
function Remove_Customizer( $wp_customize ) {
   
    $wp_customize->remove_section( 'title_tagline' );
     $wp_customize->remove_section( 'header_image' );
    
    $wp_customize->add_section('sidebar-sidebar', array(
        'title'    => __('Color Scheme', 'themename'),
        'description' => '',
        'priority' => 120,
    ));
 
    //  =============================
    //  = Text Input                =
    //  =============================
    $wp_customize->add_setting('sidebar-sidebar-widgets', array(
        'default'        => 'value_xyz',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('themename_text_test', array(
        'label'      => __('Text Test', 'themename'),
        'section'    => 'sidebar-sidebar',
        'settings'   => 'sidebar-sidebar-widgets',
    ));
    
}
add_action( 'customize_register', 'Remove_Customizer', 99 );