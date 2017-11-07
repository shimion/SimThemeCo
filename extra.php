<?php 

//Add All additional Functionality here...

add_filter('filter_minify_css', function ($styles){
    $styles[] = _CSS. 'mercer.css';
    return $styles;
});


// Add Filters to change the search form layout
add_filter('search_form_filter', function($form){
    $form = '<form action="' . home_url( '/' ) . '" method="get" class="form-inline searchform">
                        <fieldset>
                            <div class="input-group">
                                <input type="text" name="s" id="search" placeholder="" value="" class="form-control">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default submitbtn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </span>
                            </div>
                        </fieldset>
                    </form>';
    return $form;
});



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