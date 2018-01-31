<section id="{{$sid}}" class="about-wilson {{$class}}" {{ $Attr }}>

<div class="container">
    {!! $Container !!}
<div class="row">
       @if($Data['layout'])
        @foreach($Data['layout'] as $lout)
            <div class="col-md-3">
            @if( $lout['icon'] )
            <h3><i class="fa {{ $lout['icon'] }}"></i></h3>
            @endif
            <h4>{{ $lout['title'] }}</h4>
            <p>{{ $lout['text'] }}</p>
            </div>
        @endforeach   
        @endif 
</div>
</div>
</section>