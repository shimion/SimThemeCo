<header class="header_one" id="{{$sid}}">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    {!! $App['Menu'] !!}

  </div>
                
   
        <nav class="navbar bg-dark navbar-dark">
             <div class="container">
             {!! $App['Data']->Get('global.logo') !!}
            <button id="collapsed" class="navbar-toggler collapsed" type="button" onclick="showhide()" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </nav>
    
    <div class="clear"></div>
</header>