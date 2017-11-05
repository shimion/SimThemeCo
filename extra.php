<?php 
add_filter('filter_minify_css', function ($styles){
    $styles[] = _CSS. 'mercer.css';
    return $styles;
});