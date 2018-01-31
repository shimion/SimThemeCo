<!----    Header Two    ---->
    
    <header class="header_two" id="{{$sid}}">
 <nav class="navbar navbar-expand-lg navbar-light bg-light sticky" data-toggle="sticky-onscroll">

            <div class="container-fluid container">
                <!-- Brand and toggle get grouped for better mobile display -->
                
                    <button class="navbar-toggler collapsed" type="button" onclick="showhide()" aria-expanded="false">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </button>
                    {!! $App['Data']->Get('global.logo') !!}
                

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        {!! $App['Menu'] !!}
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="clear"></div>
    </header>
    
<!----    Header Two End    ---->