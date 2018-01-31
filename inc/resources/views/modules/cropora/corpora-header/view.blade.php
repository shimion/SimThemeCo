<!--=======================nav main============================-->

<header class="header" id="{{$sid}}">
    <nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light sticky" data-toggle="sticky-onscroll">
        <div class="container-fluid container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {!! $App['Data']->Get('global.logo') !!}
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {!! $App['Menu'] !!}
            </div>
            <!-- /.navbar-collapse --> 
        </div>
        <!-- /.container-fluid --> 
    </nav>
    {!! $ExtraData !!}
</header>

<!--=======================nav============================--> 