@extends('layout')

@section('title', 'Головна')


@section('content')
    {{--<h1></h1>--}}

    <h1 style="font-style: italic; margin:20px auto;">{{ trans('menu_info.main_phrase') }}</h1>
    <a href="{{ locale_link($_SERVER['REQUEST_URI'], 'en') }}">EN</a>
    <a href="{{ locale_link($_SERVER['REQUEST_URI'], 'ua') }}">UA</a>
    <div class="catalog">


        <div class="row">
            @foreach( $categories as $key => $category )
                <div class="col-md-6">

                    <a style="font-size: 30px; color:palevioletred;"
                       href="{{ route('catalog',['id' => $category->id]) }}">
                        {{ $category->title }}
                    </a>
                    @if(file_exists('files/pictures/picture_'.$category->id.'.jpg'))

                        <span>
                            <img src="/files/pictures/picture_{{$category->id}}.jpg" style="max-width:100px;"
                                 alt=""> </span>
                    @endif
                    @if( $category->ads()->count() > 0 )
                        @foreach($category->mainPageAds as $key2 => $ad)
                            <p><a style="font-size: 20px; color:black;" href="{{ route('advert',['id' => $ad->id]) }}">
                                    {{ ++$key2 }}. {{ $ad->title }}
                                </a></p>


                        @endforeach

                    @endif

                </div>
            @endforeach
        </div>


    </div>

@endsection