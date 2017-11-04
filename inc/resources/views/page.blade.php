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
            <h1><a href="@php(the_permalink())"> {{ $Title }}</a></h1>
               <div clas="meta-data">{!! $PostMeta !!}</p>
             <div class="lead"> @php(the_content())</div>
           </article>
    @endwhile   
@endsection