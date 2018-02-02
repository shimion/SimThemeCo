
<section style="@if($Action['slider_height']) height:{{ $Action['slider_height'] }}; @endif width: 100%; overflow: hidden;">

<div id="carouselExampleIndicators" class="carousel carousel-fade slide st-slider-wapper" data-ride="carousel">

       @if($Action['sliders'])
        <ol class="carousel-indicators">
        @foreach( $Action['sliders'] as $key=>$slider)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class=" @if($key ==0) active @endif" data-background="{{ $Action['pagination_color'] }}" data-background-hover="{{ $Action['pagination_active_color'] }}"></li>
        @endforeach
   </ol>           
      @endif

  <div class="carousel-inner" role="listbox">
      
      
                @if($Action['sliders'])
                        @foreach( $Action['sliders'] as $key=>$slider)
                                <div class="carousel-item @if($key == 0) active @endif">
                                        
                                    <div class="slider-image-wapper d-block js-colorize" style='background-image: url("{!! $slider['background']['image'] !!}"); background-color:{{ $slider['background']['color'] }}; background-repeat: {{ $slider['background']['repeat'] }}; background-attachment: {{ $slider['background']['attachment'] }}; @if($slider['background']['position']) background-position: {{ $slider['background']['position'] }}; @endif  @if($slider['background']['size']) background-size: {{ $slider['background']['size'] }}; @endif @if($Action['width']) width:{{ $Action['width'] }} ; @endif @if($Action['height']) height:{{ $Action['height'] }}; @endif  ' alt="{{ $slider['title'] }}"></div>
                                    @if($slider['overlay'])
                                    <div class='slider-overlay-layer' style="background: {{ $slider['overlay'] }}"></div>
                                    @elseif($Action['overlay'])
                                    <div class='slider-overlay-layer' style="background: {{ $Action['overlay'] }}"></div>
                                    @endif
                                    
                                    <div class="carousel-caption-container">
                                    
                                    
                                        <div class="carousel-caption d-none d-md-block js-colorize"  data-background="{{ $slider['caption_box_background'] }}" data-background-hover="{{ $slider['caption_box_background'] }}" data-border="{{ $slider['caption_box_border'] }}" data-border-hover="{{ $slider['caption_box_border'] }}" style="@if($slider['caption_box_width']) max-width: {{ $slider['caption_box_width'] }}px @endif; @if($slider['position']) {{ $slider['position'] }} @endif; ">
                                                {!! $slider['title'] !!}
                                                {!! $slider['text'] !!}
                                                {!! $slider['link'] !!}
                                        </div> 
                                        
                                </div>
                                    
                                    
                                
                            </div>
                                
                    
                        @endforeach
                    
                    @endif    
      

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"  data-color="{{ $Action['pagination_color'] }}" data-color-hover="{{ $Action['pagination_active_color'] }}"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    </section>
