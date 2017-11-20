
//import ThankYou from "../templates/components/ThankYou.html";
jQuery(document).ready(function($) {
  // Custom 
 
/*
 * SimThemeCo
 */
//import ThankYou from "../templates/components/ThankYou.html";
var SimThemeCo = function(options){

    /*
     * Variables accessible
     * in the class
     */
    var vars = {
        action  : '',
        data    : '',
    };
    
    var Action = '';
    var Form = '';
    var Loading = false;
    /*
     * Can access this.method
     * inside other methods using
     * root.method()
     */
    var root = this;

    /*
     * Constructor
     */
    this.construct = function(options){
        $.extend(vars , options);
        this.Form = $('.simthemeco-form');
        this.ActionType = $('.simthemeco-form').attr('data-form-type');
        
        this.SubmitForm();
    };


    
    
    
    
    this.stickyToggle = function(sticky, stickyWrapper, scrollElement) {
    var stickyHeight = sticky.outerHeight();
    var stickyTop = stickyWrapper.offset().top;
    if (scrollElement.scrollTop() >= stickyTop){
      stickyWrapper.height(stickyHeight);
      sticky.addClass("is-sticky");
    }
    else{
      sticky.removeClass("is-sticky");
      stickyWrapper.height('auto');
    }
  };
    
  
    
    
      // Find all data-toggle="sticky-onscroll" elements
   this.Menu = function(){
       $('[data-toggle="sticky-onscroll"]').each(function() {
        var sticky = $(this);
        var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
        sticky.before(stickyWrapper);
        sticky.addClass('sticky');

        // Scroll & resize events
        $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
          root.stickyToggle(sticky, stickyWrapper, $(this));
        });

        // On page load
        root.stickyToggle(sticky, stickyWrapper, $(window));
      });
    
    }
    

   
   // Define Ajax Function
   this.AjaxColler =    function(form_data){     
        console.log(this.ActionType);
        let self = this;
       //self.LoadingCheck(self.Loading, self.Form);
        return $.ajax({
            url: ajax_object.ajax_url,
            type: 'POST',
            data: {
                'action': 'AjaxData',
                'type': self.ActionType,
                'data' : form_data,
            },
            success: function( response ) {
                console.log(response);
                self.Loading = false;
                self.LoadingCheck(self.Loading, self.Form);
                
                
                let FormData = {
                    data : response.data,
                };
               // $('.Form_Widget').html(ThankYou(data));
                    console.log(FormData);
                    self.Result(response);
            },
        });
    }  
   
   
   this.SubmitForm = function (){
        let self = this;
       self.Form.on('submit', function(e){
           e.preventDefault();
           $('.form-control').removeClass('is-invalid');
           $('.invalid-feedback').remove();
           self.Loading = true;
           
         var formData = self.Form.serializeArray();
         //  console.log(formData);
            var data = JSON.stringify(formData);
            self.AjaxColler( data);
           
           
            
       })
   }
   
   
  this.Result = function (response){
        let self = this;
       var res = response.output;
     // console.log(res.output);
      if(response.success == false){
          $.each(res, function(key, value){
              var id = '#form_field_wapper_'+ key;
              console.log('#form_field_wapper_'+ key);
              $(id).append(value);
              $(id).find('.form-control').addClass('is-invalid');
          });
     }else if(response.success == true){
        // console.log('Winner');
         this.Form.after(res);
         this.Form.hide();
        }
      
      
   }
   
   
   
   
   
   
   
    this.LoadingCheck = function (loading, wapper){  
        let self = this;
      //  console.log(wapper);
            if(loading){
                if(! wapper.hasClass('loading')){    
                    wapper.addClass('loading');
                    }
            }else{
                    wapper.removeClass('loading');
                
            }
        
            return;
        }
   

    /*
     * Pass options when class instantiated
     */
    this.construct(options);

};


/*
 * USAGE
 */

/*
 * Set variable myVar to new value
 */
var newSimThemeCo = new SimThemeCo();

/*
 * Call myMethod inside SimThemeCo
 */
newSimThemeCo.Menu();
    
    

});