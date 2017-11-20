@if(  is_active_sidebar('before-footer') )
   <div class="wapper-footer-top container">

            @if(  ! dynamic_sidebar('before-footer') )
            @endif     

    </div>
@endif 