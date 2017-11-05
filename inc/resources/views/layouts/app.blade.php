<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     @php wp_head() 
     @endphp
    </head>
         <body>
                      
                @include('components.header')          
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
                @include('components.footer', [])  
                      
        @php wp_footer() @endphp
    </body>
</html>