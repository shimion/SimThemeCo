

@if(  is_active_sidebar('sidebar') )
<aside class="col-sm-4 main-sidebar list-group">
@if(  ! dynamic_sidebar('sidebar') )
@endif   
</aside>     
@endif 
    

