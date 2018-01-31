@extends('layouts.home')

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
               <article class="col"> 
                @if(! GetPageMeta('disable_title'))      
                    <h1>@php(the_title())</h1>  
                @endif    
                @if(! GetPageMeta('disable_postmeta'))          
                    <div class="">{!! $PostMeta !!}</div>
                @endif
                
                 @if(! GetPageMeta('disable_content'))   
                      <div class="lead"> @php(the_content())</div>
                  @endif                 
                
                
                 
                   {!! $ActionAfterContent !!}  

               </article>
              @endwhile  

        {!! $Pagination !!}
         @endif  
            
               @include('components.ac')



@endsection