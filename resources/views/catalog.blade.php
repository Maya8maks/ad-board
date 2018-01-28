@extends('layout')
@section('title', 'Каталог')

@section('content')
    {{--{{ dump( locale_link($_SERVER['REQUEST_URI'], 'en') ) }}
    {{ dump( locale_link($_SERVER['REQUEST_URI'], 'ua') ) }}
--}}
    <a href="{{ locale_link($_SERVER['REQUEST_URI'], 'en') }}">EN</a>
    <a href="{{ locale_link($_SERVER['REQUEST_URI'], 'ua') }}">UA</a>
<div class="clearfix">
<div style="float:left; width: 50%;">

       <h1 style="color:palevioletred;">{{ trans('menu_info.category_main') }}</h1>

              @foreach( $categories as $key => $category )
        <p> <a style="font-size: 25px; color:black;" href="{{ route('catalog',['id' => $category->id]) }}">
                 {{ $category->title }}
            </a></p>
                      {{--<p style="font-size: 30px; color:black;">
                          {{ $category->title }}
                      </p>--}}
                                  @endforeach

     </div>
         <div style="float:right;width: 50%;" >
             <h1 style="color:palevioletred;">Оголошення</h1>


                         @foreach( $ads as $key => $ad )
<div>
                             <a href="{{route('advert',['id' => $ad->id])}}" style="font-size: 25px; color:black;">
                                 {{ $ad->title }}
                             </a>
</div>

                         @endforeach
             {{ $ads->links()}}
                 </div>
</div>

@endsection
