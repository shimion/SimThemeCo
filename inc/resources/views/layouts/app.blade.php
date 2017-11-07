<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     @php wp_head() 
     @endphp
    </head>
         <body>
            @if($Data->Get('global.wapper') == true)
            <div class="wapper">
            @endif        
                 @include('components.header')
                 @include('components.header-bottom-section')            
               {{-- The main content section. It has also included the sidebar --}}
                <section class="content">
                    <div class="container">
                        <div class="row">
                             <main class="main col">
                                @yield('content')
                                
                             </main>
                                 @include('components.sidebar')
                        </div>
                    </div>
                </section>
                @include('components.footer-top-section') 
                @include('components.footer', [])  
                      
        @php wp_footer() @endphp
        
         @if($Data->Get('global.wapper') == true)
        </div>
        @endif
    </body>
</html>