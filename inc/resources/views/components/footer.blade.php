@if(  is_active_sidebar('footer-widget-section') )
  <section class="footer-widget-section">
       <div class=" container">
            <div class="row">
                @if(  ! dynamic_sidebar('footer-widget-section') )
                @endif     
            </div>
        </div> 
    </section>
@endif 

 <footer class="st-footer text-muted mt-0 mb-2 pt-2 pb-2">
  <div class=" container">
        <div class="row">
           @if(  is_active_sidebar('footer') )
                @php(dynamic_sidebar('footer'))
            @endif
            @if( !  is_active_sidebar('footer') )
                @include('components.footer-copy-right-section')    
            @endif  
        </div>
    </div>
</footer>
