
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
    var Slider = '';
    var Bg = '';
    var WoW = '';
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
        this.Slider = $('.carousel');
        this.Form = $('.simthemeco-form');
        this.Bg = $('.caption-inner-wapper');
        this.Colorize = $('.js-colorize');
        this.ActionType = $('.simthemeco-form').attr('data-form-type');
        
        this.WoW =  new WOW(
                      {
                      boxClass:     'sta',      // default
                      animateClass: 'animated', // default
                      offset:       0,          // default
                      mobile:       true,       // default
                      live:         true        // default
                    }
                    )
        
        this.SubmitForm();
        this.STCarousel();
        this.SectionBG();
        this.Color();
        this.WoW.init();
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
   
   
    this.STCarousel = function (){
        let self = this;
        self.Slider.carousel({
                interval: 6000
            })

   }
   
   this.SectionBG       = function (){
        let self = this;
       
       self.Bg.each(function () {
			var $this = $(this),
				$animationType = $this.data('background');
			$this.css('background', $animationType);
		});       
   }
   
   
  
   this.Color       = function (){
        let self = this;
       
       self.Colorize.each(function () {
			var $this = $(this),

                            $background = $this.data('background');
                            if($background){
                             $this.css('background-color', $background);
                            }
                            $color = $this.data('color');
                            if($color){
                             $this.css('color', $color);
                            }

                $this.mouseover(
                        function(){
                        $background = $this.data('background-hover');
                            if($background){
                             $this.css('background-color', $background);
                            }
                            $color = $this.data('color-hover');
                            if($color){
                             $this.css('color', $color);
                            }
                    });

              $this.mouseout(
                        function(){
                        $background = $this.data('background');
                            if($background){
                             $this.css('background-color', $background);
                            }
                            $color = $this.data('color');
                            if($color){
                             $this.css('color', $color);
                            }
                    }


                );







				
                
		});       
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
var NewSimThemeCo = new SimThemeCo();

/*
 * Call myMethod inside SimThemeCo
 */
NewSimThemeCo.Menu();
    
    

});