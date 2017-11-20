// Extract from codestar framework
//Customizer fields repeator
//Work with Codestart framework
jQuery(document).ready( function($) {
     var i = 0;
    $('body').on('click','.cs-add-group', function( e ) {
        $(this).parents('.cs-fieldset').addClass('newboss');
        e.preventDefault();

alert("Welcome");
        
         var _this           = $('.newboss');
       var   field_groups    = _this.find('.cs-groups');
       var   accordion_group = _this.find('.cs-accordion');
        var  clone_group     = _this.find('.cs-group:first').clone();
        field_groups.addClass('shimion');
        
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
        
        
        
    clone_group.find('input, select, textarea').each( function () {
          this.name = this.name.replace(/\[(\d+)\]/,function(string, id) {
            return '[' + (parseInt(id,10)+1) + ']';
          });
        });

        var cloned = clone_group.clone().removeClass('hidden');
        field_groups.append(cloned);

        if ( accordion_group.length ) {
          field_groups.accordion('refresh');
          field_groups.accordion({ active: cloned.index() });
        }

        field_groups.find('input, select, textarea').each( function () {
          this.name = this.name.replace('[_nonce]', '');
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