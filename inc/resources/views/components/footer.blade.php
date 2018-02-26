@if(  is_active_sidebar('footer-widget-section') )
  <section class="footer-widget-section mt-0 mb-0">
            <div class="container">
                <div class="row">
                    @if(  ! dynamic_sidebar('footer-widget-section') )
                    @endif 
                </div>    
            </div>
                     
     </section>
@endif 



<footer id="footer" class="footer-distributed st-footer">
        <div class="container">
            <div class="row">
                
                <div class="footer-left col-sm-4">
                     {!! $Data->Get('global.logo') !!}
                </div>

                <div class="footer-right col-sm-8 text-right">
                    <div class="footer-icons">
                       @include('utilities.social')  
                    </div>
                    {!! $FooterMenu !!}
                    {!! $CoppyRight !!}
                </div>

            </div>
        </div>
    </footer>

