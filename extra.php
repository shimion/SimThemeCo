<?php 

// Register Posttype event
add_action('init', function(){
    $type = array(
        'name' => 'event',
        'slug' => 'events',
        'singular' => 'Event',
        'plural' => 'Events',
        'taxonomy_support' => true
        );
    $tax = array(
        'name' => 'type',
        'slug' => 'types',
        'singular' => 'Type',
        'plural' => 'Types',
    );
   PostType($type, $tax); 
});

// Register Posttype event
add_action('init', function(){
    $type = array(
        'name' => 'st-slider',
        'slug' => 'st-slider',
        'singular' => 'Slider',
        'plural' => 'Sliders',
        'public' => false,
        'taxonomy_support' => false
        );
    $tax = array();
   PostType($type, $tax); 
});

// Register Posttype Request
add_action('init', function(){
    $type = array(
        'name' => 'request',
        'slug' => 'requests',
        'singular' => 'Requests',
        'plural' => 'Requests',
        'taxonomy_support' => false
        );
        $tax = '';
   PostType($type, $tax); 
});


//Register Posttype Good Deed
add_action('init', function(){
    $type = array(
        'name' => 'good-deed',
        'slug' => 'good-deeds',
        'singular' => 'Good Deed',
        'plural' => 'Good Deeds',
        'taxonomy_support' => false
        );
   $tax = '';
   PostType($type, $tax); 
});




// framework options filter example
function RequestMetaBox( $options ) {

 // $options      = array();


// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_requests_additional_settings',
  'title'     => 'Request Additional Settings',
  'post_type' => 'request',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'request_additional_settings',
      'fields' => array(

       array(
          'id'    => 'request_name',
          'type'  => 'text',
          'title' => 'Name',
        ),
          
          
        array(
          'id'    => 'request_location',
          'type'  => 'text',
          'title' => 'Location',
        ),

      ),
    ),

  ),
);

  return $options;

}
add_filter( 'cs_metabox_options', 'RequestMetaBox' );





