       {{ $Data->Get('sidebar.main') }}
           @if(! is_active_sidebar( $Data->Get('sidebar.main') ))
            @if(  ! dynamic_sidebar('sidebar') ) @endif 
          
        @elseif(is_active_sidebar( $Data->Get('sidebar.main') ))
            @if(  ! dynamic_sidebar($Data->Get('sidebar.main')) ) @endif 
        @endif
