 jQuery(document).ready( function($) {  
    
     

     
 // ======================================================
  // CSFRAMEWORK MEDIA UPLOADER / UPLOAD
  // ------------------------------------------------------
  $("body").on('click','.cs-element-import-layout',  function() {
        $(this).parents('#post').addClass('ajax-entry');
       var Form = $('.ajax-entry');    
        
    
         var post_ID = $(Form).find('#post_ID');
        var id = $(post_ID).val();
      console.log(id);
      var $this  = $(this),
          $add   = $this.find('.cs-add'),
          $input = $this.find('input'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({

          // Set the title of the modal.
          title: $add.data('frame-title'),

          // Tell the modal to show only images.
          library: {
            type: $add.data('upload-type')
          },

          // Customize the submit button.
          button: {
            // Set the text of the button.
            text: $add.data('insert-title'),
          }

        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          // Grab the selected attachment.
          var attachment = wp_media_frame.state().get('selection').first();
          $input.val( attachment.attributes.url ).trigger('change');
            console.log(attachment.attributes.url);
            return $.ajax({
                    url: admin_ajax_object.ajax_url,
                    type: 'POST',
                    data: {
                        'action': 'AdminAjaxImport',
                        'data' : attachment.attributes.url,
                        'post_ID': id,
                    },
                    success: function( response ) {
                        console.log(response);
                        let FormData = {
                            //data : response.data,
                            
                        };
                        //window.location.replace(response.redirect);
                      //   window.location.replace(response.redirect);

                       // $('.Form_Widget').html(ThankYou(data));
                            console.log(FormData);
                    },
            });

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

  });
    
     
     
     
     
$('body').on('blend', '.cs-element-import-layut', function(){
         let self = this;
   
   
		$(self).parents('#post').addClass('ajax-entry');
       var Form = $('.ajax-entry');    
        
    
         var post_ID = $(Form).find('#post_ID');
         var importdata = $(Form).find('.customizer-upload-button');
         var importdata = $(importdata).val();
    
         console.log(importdata);
         var customizer = true;
        if(!importdata){
            alert('Please select a json file');
            return;
        }
       //self.LoadingCheck(self.Loading, self.Form);
        return $.ajax({
            url: admin_ajax_object.ajax_url,
            type: 'POST',
            data: {
                'action': 'AdminAjaxImport',
                'post_ID': post_ID,
                'customizer': customizer,
                'data' : importdata,
            },
            success: function( response ) {
                console.log(response);
                let FormData = {
                    data : response.data,
                };
              //  window.location.replace(response.redirect);
                
                
               // $('.Form_Widget').html(ThankYou(data));
                    console.log(FormData);
            },
        });
    
    });
     
     
$('body').on('change', '.cs-element-enable-customizer-for-this-page', function(){
        let self = this;
		var data = $(self).parents('#post').addClass('ajax-entry');
        var Form = $('.ajax-entry');    
        //var str = $( Form ).submit();
        console.log()
        var dtitle = data.find('#title').val() ;
       var post_id = data.find('#post_ID').val() ; 
        var enable_customizer = true;     
            $(self).find('input').val(enable_customizer);
       //self.LoadingCheck(self.Loading, self.Form);
        return $.ajax({
            url: admin_ajax_object.ajax_url,
            type: 'POST',
            data: {
                'action': 'AdminAjaxData',
                'post_title': dtitle,
                'post_ID': post_id,
                'customizer': enable_customizer,
            },
            success: function( response ) {
                console.log(response);
              window.location.replace(response.redirect);
                
                
               // $('.Form_Widget').html(ThankYou(data));
                    console.log(FormData);
            },
        });
    });
});