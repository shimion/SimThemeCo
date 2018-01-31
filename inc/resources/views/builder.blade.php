@extends('layouts.builder')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', NAME) }}
    </div>
    {!! get_search_form(false) !!}
      @endif
        
           
         @include('components.bc')
        
        
        
        @if(! $Data->Get('global.disable_content_section'))
         @while (have_posts()) @php(the_post())
               <article class="builder-col">                 
                 @if(! GetPageMeta('disable_content'))   
                      @php(the_content())
                  @endif                 


               </article>
              @endwhile  

        {!! $Pagination !!}
         @endif  
            
               @include('components.ac')



@endsection