
    <div class="caption-wapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if($show_image)
                    <a href="{{ $link }}" >
                        <img src="{{ $image }}" title="{{ $title }}" />
                    </a>
                    @endif

                     @if($show_title)
                    <h2>
                        <a href="{{ $link }}" >{{ $title }}</a>
                    </h2>
                    @endif
                    @if($show_text)
                        <p>{{ $text }}</p>
                    @endif
                    @if($show_readmore)
                       <a href="{{ $link }}" >{{ $readmore }}</a>
                    @endif
                    
                    </div>
                </div>
            </div>
        </div>
                