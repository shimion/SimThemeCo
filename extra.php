<?php 

//Add All additional Functionality here...

add_filter('filter_minify_css', function ($styles){
    $styles[] = _CSS. 'mercer.css';
    return $styles;
});