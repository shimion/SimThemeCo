// Extract from codestar framework
//Customizer fields repeator
//Work with Codestart framework
jQuery(document).ready( function($) {
     var i = 0;
    $('body').on('click','.cs-add-group', function( e ) {
        var as = $(this).attr('data-index');
        var as = parseInt(as) + 1;
        $(this).attr('data-index', as);
        $(this).parents('.cs-fieldset').addClass('newboss');
        e.preventDefault();

//alert("Welcome");
        var _this_click           = $(this);
         var _this           = $('.newboss');
       var   field_groups    = _this.find('.cs-groups');
       var   accordion_group = _this.find('.cs-accordion');
        var  clone_group     = _this.find('.cs-group:first').clone();
        
        var sgp = $(field_groups).find('.cs-group');
       var n_name = _this.find('.hidden_id_helper');
        var n_name = n_name.attr('data-name');
        console.log(sgp.length);
        var lt =$(field_groups).data('index');
        alert(lt);
        if(lt == 0){
        if(sgp.length > 0){
           lt = sgp.length ;
            }else{
              lt = 1;  
            }   
        
        }else{
        lt = parseInt(lt + 1);
        }
        $(field_groups).attr('data-index', lt);
      console.log(lt);
        $(sgp).each(function(index){
            $(this).data('index', index);
          var inp =  $(this).find('input');
            $(inp).data('index', index);
        });
        console.log(sgp.length);
        if ( accordion_group.length ) {
        accordion_group.accordion({
          header: '.cs-group-title',
          collapsible : true,
          active: false,
          animate: 250,
          heightStyle: 'content',
          icons: {
            'header': 'dashicons dashicons-arrow-right',
            'activeHeader': 'dashicons dashicons-arrow-down'
          },
          beforeActivate: function( event, ui ) {
            $(ui.newPanel).CSFRAMEWORK_DEPENDENCY( 'sub' );
          }
        });
      }
        
        field_groups.sortable({
        axis: 'y',
        handle: '.cs-group-title',
        helper: 'original',
        cursor: 'move',
        placeholder: 'widget-placeholder',
        start: function( event, ui ) {
          var inside = ui.item.children('.cs-group-content');
          if ( inside.css('display') === 'block' ) {
            inside.hide();
            field_groups.sortable('refreshPositions');
          }
        },
        stop: function( event, ui ) {
          ui.item.children( '.cs-group-title' ).triggerHandler( 'focusout' );
          accordion_group.accordion({ active:false });
        }
      });
        
        
        
    clone_group.find('input, select, textarea').each( function (index) {
        
            var n_name_field = $(this).data('sub-depend-id');
            var cls_field = $(this).closest('.cs-group');
            var cls_field = $(_this_click).attr('data-index');
            console.log('sgp.length:' + sgp.length);
            var n_name = n_name + '['+ as +']'+ '['+ n_name_field +']';
          $(this).attr('name', n_name);
        });

        var cloned = clone_group.clone().removeClass('hidden');
        field_groups.append(cloned);

        if ( accordion_group.length ) {
          field_groups.accordion('refresh');
          field_groups.accordion({ active: cloned.index() });
        }

        field_groups.find('input, select, textarea').each( function () {
          var dt =  $('.newboss .hidden_id_helper').data('name');
            console.log(dt);
             
         this.name = this.name.replace('undefined', dt);
        });

        // run all field plugins
        cloned.CSFRAMEWORK_DEPENDENCY( 'sub' );
        cloned.CSFRAMEWORK_RELOAD_PLUGINS();

        i++;

      

      field_groups.on('click', '.cs-remove-group', function(e) {
        e.preventDefault();
        $(this).closest('.cs-group').remove();
      });
       
 

	})
  });