@if(  is_active_sidebar('footer-widget-section') )
  <section class="footer-widget-section">
                  @if(  ! dynamic_sidebar('footer-widget-section') )
                @endif     
     </section>
@endif 

 <footer class="st-footer text-muted mt-0 ">
            @if(  is_active_sidebar('footer') )
                @php(dynamic_sidebar('footer'))
            @endif
            @if( !  is_active_sidebar('footer') )
                @include('components.footer-copy-right-section')    
            @endif  
</footer>
