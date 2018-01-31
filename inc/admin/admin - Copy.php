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
        wp_enqueue_script( 'cs-customizer-repeator',  JS .'admin.js',  array( 'jquery' ), '0.1', true );
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
        
        
        .cs-inner.st-colors-sideyside .cs-field-color_picker {
    display: inline-block;
}

.cs-inner.st-colors-sideyside .cs-field-color_picker:first-child {
    padding-left: 0;
}
        
        

           
    </style>
    <?php
    
});

add_action('customize_controls_print_scripts', function(){   
    ?>
<script>
jQuery(document).ready( function($) {
    $('.st_settings_wapper').hide();
    $('body').on('click','.settings_title', function(){
		$('.st_settings_wapper').toggle('slow');
	});
    
    
    $('body').on('change','.module_type_selector', function(){
        var selector = $(this).val();
		$('.individual-fieldset-wapper').hide();
        $('.' + selector).show();
	});
    
   
});
    
  jQuery(document).ready( function($) {   
/*        $(window).load( function(){
       var has = $('.cs-field-image-select .individual-fieldset-wapper .lable-image-fieldset img.treaget_modules.active').data('attr');
                  
                      console.log(has);
               
      
        });*/
      
      
      
      
      $('body').on('click','.widget-rendered', function(){
         var widgetinside = $(this).find('.widget-inside');
         var form = widgetinside.find('.form');
          var widgetcontent = form.find('.widget-content');
          
          var image_select_fieldset = widgetcontent.find('.cs-field-image_select_fieldset');
          var csfieldset = image_select_fieldset.find('.cs-fieldset');
          var imageselect = csfieldset.find('.cs-field-image-select .individual-fieldset-wapper');
          imageselect.each(function(){
            var act =  $(this).find('.lable-image-fieldset.active');
             var act = act.find('.treaget_modules.active');
             //console.log(act.attr('data-attr'));
             var selector = act.attr('data-attr');
              var viewselector    =  $('.'+selector + '.custom_data_field');
              
             $('.default_data_field').closest('.cs-element').show(); 
             // console.log(viewselector.data('type'));
              if(viewselector.data('type') =='group'){
                var ele =  viewselector.find('.cs-element.cs-field-group');
                  ele.show();
                  ele.addClass('testclass');
              }else{
                 viewselector.closest('.cs-element').show();
              }
		      
          });
          
      });
        
      
        $('body').on('click','.treaget_modules', function(){
             $('.treaget_modules').removeClass('active');
            $('.dynamic-config-wapper .cs-element').hide();
        var selector = $(this).data('attr');
            $(this).addClass('active');
            console.log(selector);
            var viewselector    =  $('.'+selector + '.custom_data_field');
            $('.default_data_field').closest('.cs-element').show();
		    viewselector.closest('.cs-element').show();
        
	});   
  
  });     
        
    
    
   jQuery(document).ready( function($) {    
   
         $('body').on('click','.layer_selector_title', function(){    
            var selector = $(this).closest('.cs-element-select-module-type .module_type_selector option:selected').attr("value");
            var selector = $('.module_type_selector option:selected').attr("value");
             console.log(selector);
            $('.individual-fieldset-wapper.'+selector).toggle('slow');
            
         }); 
       
       
         $('body').on('click','.layer_field_editor_content', function(){ 
             $('.dynamic-config-main-wapper').toggle('slow');
            var active_layer_selector = $(this).closest('.individual-fieldset-wapper .treaget_modules.active').attr("data-attr");
            var viewselector    =  $('.'+active_layer_selector + '.custom_data_field');
            $('.default_data_field').closest('.cs-element').show();
		    viewselector.closest('.cs-element').show();
            
            
         }); 
       
       
       
        $('body').on('click','.General_field_field_editor_content', function(){ 
            var theclosest =  $(this).closest('.dynamic-config-main-wapper');
             theclosest.toggle('slow');
            theclosest.find('.cs-element').toggle('slow');
            
            
         }); 
       
       
       
   /*    
      ---- .st-clospore-panel
                --- ..closepore_title
                --- .clospore_content
      ---   end
       */
       $('body').on('click','.closepore_title', function(){ 
           $('.closepore_title').removeClass('active');
           
           $(this).parent().find('.clospore_content').toggle('slow');
          if($(this).hasClass('active')  == true){
             $(this).removeClass('active');  
          }else{
           $(this).addClass('active');    
          }
            
         }); 
       
       
       
  }); 
    
    
    
    
</script>    
<?php
});

add_action('customize_controls_print_styles', function(){   
    ?>
<style>
fieldset.background-setting-wapper {
    margin-right: 0;
    margin-left: 0;
    padding: 10px 12px;
}

.individual-fieldset-wapper{ display: none;}

fieldset.background-setting-wapper .cs-element.cs-element-no-title.cs-field-color_picker.cs-pseudo-field {margin-left: 0px !important;margin-right: 0px !important;padding-left: 7px !important;margin-top: 1px;margin-bottom: 0;vertical-align: top;}

fieldset.background-setting-wapper .cs-element.cs-element-no-title.cs-field-color_picker.cs-pseudo-field button.button.wp-color-result {
    margin-bottom: 0;
    height: 27px;
}        
        
 .cs-title.custom-style h4 {
    background: #dbdbdb;
    padding: 14px 10px;
    margin-left: -10px;
    margin-right: -10px;
    cursor: pointer;
    background: #dc3232; 
     color: #fff; 
    border: 1px solid #dc3232;
}   
    
    
    .cs-title.custom-style h4:hover {
    border-bottom: 4px solid #900505;
    transition-delay: .4s;
    transition-duration: .4s;
    background-color: #ff2e2e;
}
.dynamic-config-wapper .cs-element {display: none;}     
    .treaget_modules.active, .treaget_modules:hover{ opacity: .2}
    .dynamic-config-main-wapper{display: none;}
    

.cs-title.custom-style.closepore_title h4{background: #007bff; color: #fff; border: 1px solid #007bff;}
.background-setting-wapper.clospore_content, fieldset.background-setting-wapper{ display: none;}
    
    
    
    .cs-title.custom-style.closepore_title h4:hover, .cs-title.custom-style.closepore_title.active h4 {
    background: #208cff;
    border-bottom: 4px solid #0057b5;
}
   .cs-title.dynamic-heading h4{
    background: #dddddd40 !important;
    padding: 1.33em 10px !important;
    margin-left: -10px !important;
    margin-right: -10px !important;
    border: 1px solid #ddd !important;
    
} 
    
    
    label.lable-image-fieldset.active {
    display: block;
    background: #008ec2;
    border: 2px solid #008ec2;
    /* z-index: 111111111; */
}
    
    
    .cs-groups.cs-accordion.custom_data_field .cs-element { display: block !important;}
    .cs-field-group .cs-group{display: block !important;}
    .cs-group-content{ display: block;}
    .cs-field-group .cs-group-content .cs-group{display: block !important;}
    .dynamic-config-wapper .cs-field-group .cs-group-content .cs-element{display: block ;}
    .cs-group.cs-group-title-field-field-adding.hidden{ display: none !important;}
    .cs-element.cs-element-group-field.cs-field-group {
    display: block;
    }
    </style>
    <?php
    
});