<nav class="navbar navbar-expand-lg navbar-light bg-light sticky" data-toggle="sticky-onscroll">
  <a class="navbar-brand" href="#">{!! $Data->Get('global.logo') !!}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
       {!! $Menu !!}
    @if($Data->Get('global.enable_search_header'))   
    {!! $Search !!}
    @endif
   

   <p class="header-custom-text">{{$Data->Get('global.menu_text')}}</p> 
   

  </div>
</nav>