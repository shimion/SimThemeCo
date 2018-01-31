       @if(! is_active_sidebar( $Data->Get('sidebar.ac') ))
            @if(  ! dynamic_sidebar($Data->Get('sidebar.ac')) ) @endif 
        @endif
