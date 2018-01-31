<section id="{{$sid}}" class="about-wilson {{$class}}" {{ $Attr }}>

<div class="container">
    {!! $Container !!}
<div class="row">
<div class="col-md-3"><h3><i class="fa {{ $Data['data_1_icon'] }}"></i></h3><h4>{{ $Data['data_1_title'] }}</h4><p>{{ $Data['data_1_text'] }}</p></div>
<div class="col-md-3"><h3><i class="fa {{ $Data['data_2_icon'] }}"></i></h3><h4>{{ $Data['data_2_title'] }}</h4><p>{{ $Data['data_2_text'] }}</p></div>
<div class="col-md-3"><h3><i class="fa {{ $Data['data_3_icon'] }}"></i></h3><h4>{{ $Data['data_3_title'] }}</h4><p>{{ $Data['data_3_text'] }}</p></div>
<div class="col-md-3"><h3><i class="fa {{ $Data['data_4_icon'] }}"></i></h3><h4>{{ $Data['data_4_title'] }}</h4><p>{{ $Data['data_4_text'] }}</p></div>
</div>
</div>
</section>