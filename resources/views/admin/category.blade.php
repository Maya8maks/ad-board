<@extends('admin/mainAdmin')
@section('title', 'admin.categories')

@section('content')
    <div class="create">

        <p><a href="{{ route('admin::category.create')}}">Створити категорію</a></p>
    </div>

    <table style="border-collapse: collapse;">
        <tr style="border-collapse: collapse;">
            {{-- <td style="border: solid 1px black; padding: 10px">номер</td>--}}
            <td style="border: solid 1px black; padding: 10px">назва</td>
            <td style="border: solid 1px black; padding: 10px">дата створення</td>
            <td style="border: solid 1px black; padding: 10px">редагування</td>
            <td style="border: solid 1px black; padding: 10px">видалення</td>
        </tr>


        {{--   {{ $i=0;}};--}}


        @foreach ($categories as $key => $category)
            {{--  $i++;--}}
            <tr style="border-collapse: collapse;">

                <td style="border: solid 1px black; padding: 10px">
                    {{$category->title}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$category->created_at}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    <a href="{{route('admin::category.edit', [$category->id])}}">Редагувати</a></td>
                <td style="border: solid 1px black; padding: 10px">
                    <form role="form" method="POST" action="{{ route('admin::category.destroy',[$category->id])}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE"/>

                        <button type="submit" class="btn btn-default">Видалити</button>
                    </form>
                @if(file_exists('files/pictures/picture_'.$category->id.'.jpg'))

                    <td style="border: solid 1px black; padding: 10px">
                        <img src="/files/pictures/picture_{{$category->id}}.jpg" style="max-width:100px;" alt=""></td>
                @endif
            </tr>
        @endforeach

    </table>

@endsection