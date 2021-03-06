@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

 @while (have_posts()) @php(the_post())
           <article class="col">        
            <h1>@php(the_title())</h1>
            <div class="">{!! $PostMeta !!}</div>
             <div class="lead"> @php(the_content())</div>
               {!! $ActionAfterContent !!}
               @php(comments_template( '', true ))
           </article>
          @endwhile  

        {!! $Pagination !!}
            
   



@endsection