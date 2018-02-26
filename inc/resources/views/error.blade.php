@extends('layouts.app')

@section('content')

         @include('components.bc')


               <article class="col">

                        <div class="lead">

                   <div class="alert alert-warning d-inline-block px-4 pb-4">
                       <h1>We are unable to find this post</h1>
                        Sorry, no results were found.
                        {!! get_search_form(false) !!}
                    </div>


                   </div>





               </article>


     @include('components.ac')
@endsection