@if(  is_active_sidebar('before-footer') )
   <div class="wapper-footer-top container">
        <div class="row">
            @if(  ! dynamic_sidebar('before-footer') )
            @endif     
        </div>
    </div>
@endif 