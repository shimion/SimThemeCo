@extends('layouts.woo')

@section('archive')
       
         @include('components.bc')
       <h1>@php(the_archive_title())</h1>
       <p>@php(the_archive_description())</p>
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
    {!! get_search_form(false) !!}
      @endif
    <div class="row woo-row-wapper">   
     @while (have_posts()) @php(the_post())
            
           <article class="woo-col col-sm-4">   
           <div class="woo-image-price-atc-wapper">
            <div class="woo-price-atc-wapper">
             @php( Woo()->Price())
             
            </div>
             @php
                PostImage();
            @endphp
             </div>
           
           
            <h4>@php(the_title())</h4>
            
             @php( Woo()->AddToCart())
    
            @php( Woo()->RedMoreButton())
    
           </article>
          @endwhile  
    </div>
        {!! $Pagination !!}
            
   
     @include('components.ac')


@endsection


@section('single')
       
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