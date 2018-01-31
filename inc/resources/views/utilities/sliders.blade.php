<div id="carouselDefaultCaptions" class="carousel slide" data-ride="carousel">

    @if($Settings['nevi'])
    <!-- Indicators -->
    <ol class="carousel-indicators">
     @if($Sliders)
     @foreach($Sliders as $key => $slide)
      <li data-target="#carouselDefaultCaptions" data-slide-to="{{ $key }}" class="@if($key == 1) active @endif"></li>
      @endforeach
      @endif  
    </ol>
    @endif

    <!-- Carousel items -->
    <div class="carousel-inner">

     
     @if($Sliders)
     @foreach($Sliders as $key => $slide)
      <div class="carousel-item @if($key == 1) active @endif" >
       @if($slide['image']['image'])
        <div class="st_image_wapper" data-src="{{ $slide['image']['image'] }}" style="background-image: url({{ $slide['image']['image'] }}); @if($slide['image']['repeat']) background-repeat:{{ $slide['image']['repeat'] }}; @endif @if($slide['image']['size']) background-size:{{ $slide['image']['size'] }}; @endif @if($slide['image']['position']) background-position:{{ $slide['image']['position'] }}; @endif @if($slide['image']['attachment']) background-attachment:{{ $slide['image']['attachment'] }}; @endif"  ></div>
        @endif
         @if($Settings['caption'])
        
        <div class="carousel-caption"  >
            <div class="caption-inner-wapper js-colorize" data-background="{{  $slide['caption']['caption_background']['normal'] }}">
             @if($slide['title'])
              <h3 class="js-colorize" data-color="{{  $slide['caption']['title_color']['normal'] }}" data-color-hover="{{  $slide['caption']['title_color']['hover'] }}">{{ $slide['title'] }}</h3>
              @endif
              @if($slide['text'])
              <p class="js-colorize" data-color="{{  $slide['caption']['title_color']['normal'] }}" data-color-hover="{{  $slide['caption']['title_color']['hover'] }}">{{ $slide['text'] }}</p>
              @endif



               @if($slide['link'])
              <p class="lead">
                <a class="btn btn-primary btn-lg js-colorize" data-background="{{  $slide['caption']['read_more_background']['normal'] }}" data-background-hover="{{  $slide['caption']['read_more_background']['hover'] }}" data-color="{{  $slide['caption']['read_more_text']['normal'] }}" data-color-hover="{{  $slide['caption']['read_more_text']['hover'] }}" href="{{ $slide['link'] }}" role="button">{{ $slide['link_text'] }}</a>
              </p>
              @endif

            </div>
            
        </div>
        
        
        
        @endif
      </div>
      
      @endforeach
      @endif    
    </div>

    @if($Settings['pagination'])
     <a class="carousel-control-prev" href="#carouselDefaultCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselDefaultCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    @endif

  </div><!-- /#myCarousel -->




