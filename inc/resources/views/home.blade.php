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
               @if(! $Data->Get('global.disable_title'))       
                <h1>@php(the_title())</h1>
                @endif
                 @if(! $Data->Get('global.disable_content'))      
                <div class="">{!! $PostMeta !!}</div>
                 <div class="lead"> @php(the_content())</div>
                   {!! $ActionAfterContent !!}
                   @endif
               </article>
              @endwhile  

        {!! $Pagination !!}
         @endif  
            
               @include('components.ac')



@endsection