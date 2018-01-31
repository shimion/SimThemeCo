    <header id="header">
        <nav class="navbar navbar-default navbar-expand-lg navbar-light bg-light sticky" data-toggle="sticky-onscroll">
            <div class="container-fluid container">
                
                <!-- Brand and toggle get grouped for better mobile display -->
                {!! $Data->Get('global.logo') !!}
                
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                     {!! $Menu !!}
                </div><!-- /.navbar-collapse -->
                
            </div><!-- /.container-fluid -->
        </nav>
        <div class="clear"></div>
    </header>

