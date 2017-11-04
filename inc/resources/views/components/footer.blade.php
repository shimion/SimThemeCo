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
@if(  is_active_sidebar('footer') )
 <footer class="st-footer text-muted">
  <div class=" container">
        <div class="row">
            @if(  ! dynamic_sidebar('footer') )
            @endif     
        </div>
    </div>
</footer>
@endif