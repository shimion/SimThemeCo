@extends('layouts.app')

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
                <h1>@php(the_title())</h1>     
                <div class="">{!! $PostMeta !!}</div>
                 <div class="lead"> @php(the_content())</div>
                   {!! $ActionAfterContent !!}  
               </article>
              @endwhile  

        {!! $Pagination !!}
         @endif  
            
     @include('components.ac')
@endsection