<section id="{{$sid}}" class="schedule {{$class}}" {{ $Attr }}>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="textwidget">
                        @if($Action['title'])
                        <h3 class="panel-heading">{!! $Action['title'] !!}</h3>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="textwidget">
                        {!! $Action['content'] !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="textwidget">
                        @if($Action['url'])
                        <a class="btn" href="{{ $Action['url'] }}">{{ $Action['btn'] }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
