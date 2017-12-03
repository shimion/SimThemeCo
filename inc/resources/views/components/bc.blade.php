       @if(! is_active_sidebar( $Data->Get('sidebar.bc') ))
            @if(  ! dynamic_sidebar($Data->Get('sidebar.bc')) ) @endif 
          
         @endif