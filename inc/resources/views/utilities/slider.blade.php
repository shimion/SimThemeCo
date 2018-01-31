<section id="carouselExampleIndicators" class="carousel slide st-slider-wapper" data-ride="carousel">
  <ol class="carousel-indicators">
       @if($Action['sliders'])
        @foreach( $Action['sliders'] as $key=>$slider)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class=" @if($key ==0) active @endif"></li>
        @endforeach
      @endif
  </ol>
  <div class="carousel-inner" role="listbox">
      
      
                @if($Action['sliders'])
                        @foreach( $Action['sliders'] as $key=>$slider)
                                <div class="carousel-item @if($key == 0) active @endif">
                                        
                                  <img class="d-block img-fluid" src="{!! $slider['background']['image'] !!}" alt="{{ $slider['title'] }}">
                                    <h3>{{ $slider['title'] }}</h3>
                                        {{ $slider['text'] }}
                                  </div>
                                </div>
                    
                        @endforeach
                    
                    @endif    
      

  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</section>