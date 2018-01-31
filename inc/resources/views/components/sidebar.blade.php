
@if( ! $Data->Get('global.disable_sidebar') )
@if(  is_active_sidebar($Data->Get('sidebar.main')) )
<aside class="col-sm-4 main-sidebar list-group">
           
   @php 
    if(  ! dynamic_sidebar( $Data->Get('sidebar.main')) ) :
    endif;
    @endphp
        
       
 
</aside>     
@endif 
@endif     

