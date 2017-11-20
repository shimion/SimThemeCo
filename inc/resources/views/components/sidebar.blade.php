
@if( ! $Data->Get('global.disable_sidebar') )
@if(  is_active_sidebar('sidebar') )
<aside class="col-sm-4 main-sidebar list-group">
@if(  ! dynamic_sidebar('sidebar') )
@endif   
</aside>     
@endif 
@endif     

