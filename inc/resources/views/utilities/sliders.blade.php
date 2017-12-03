<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

    @if($Settings['nevi'])
    <!-- Indicators -->
    <ol class="carousel-indicators">
     @if($Sliders)
     @foreach($Sliders as $key => $slide)
      <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class="@if($key == 1) active @endif"></li>
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
        <div class="st_image_wapper" data-src="{{ $slide['image']['image'] }}" style="background-image: url({{ $slide['image']['image'] }});" ></div>
        @endif
         @if($Settings['caption'])
        
        <div class="carousel-caption"  >
            <div class="caption-inner-wapper" data-background="{{  $slide['caption']['caption_background']['normal'] }}">
             @if($slide['title'])
              <h3>{{ $slide['title'] }}</h3>
              @endif
              @if($slide['text'])
              <p>{{ $slide['text'] }}</p>
              @endif



               @if($slide['link'])
              <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{ $slide['link'] }}" role="button">{{ $slide['link_text'] }}</a>
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
     <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    @endif

  </div><!-- /#myCarousel -->




