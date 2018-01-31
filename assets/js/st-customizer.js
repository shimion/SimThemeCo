( function( $ ){
    wp.customize( '_cs_customize_options[custom_text_on_the_header]', function( value ) {
        value.bind( function( to ) {
            $( '#site-generator a.wptuts-credits' ).html( to );
            console.log(st_c)
        } );
    } );
} )( jQuery );