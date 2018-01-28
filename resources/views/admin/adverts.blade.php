@extends('admin/mainAdmin')
@section('title', 'admin.adverts')

@section('content')
    <div class="create">

        <p><a href="{{ route('admin::adverts.create')}}">Створити оголошення</a></p>
    </div>

    <table style="border-collapse: collapse;">
        <tr style="border-collapse: collapse;">
            {{-- <td style="border: solid 1px black; padding: 10px">номер</td>--}}
            <td style="border: solid 1px black; padding: 10px">ім'я користувача</td>
            <td style="border: solid 1px black; padding: 10px">user_id</td>
            <td style="border: solid 1px black; padding: 10px">category_id</td>
            <td style="border: solid 1px black; padding: 10px">категорія</td>
            <td style="border: solid 1px black; padding: 10px">назва оголошення</td>
            <td style="border: solid 1px black; padding: 10px">текст оголошення</td>
            <td style="border: solid 1px black; padding: 10px">created at</td>
            <td style="border: solid 1px black; padding: 10px">updated at</td>
                        <td style="border: solid 1px black; padding: 10px">редагування</td>
            <td style="border: solid 1px black; padding: 10px">видалення</td>
        </tr>


        {{--   {{ $i=0;}};--}}


        @foreach ($adverts as $key => $advert)
            {{--  $i++;--}}
            <tr style="border-collapse: collapse;">
                {{--<tr style="border-collapse: collapse;">
                    <td style="border: solid 1px black; padding: 10px">
                        <{{$i}}></td>--}}
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->user->name}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->user_id}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->category_id}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->category->title}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->title}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->text}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->created_at}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    {{$advert->updated_at}}</td>
                <td style="border: solid 1px black; padding: 10px">
                    <a href="{{route('admin::adverts.edit', [$advert->id])}}">Редагувати</a></td>
                <td style="border: solid 1px black; padding: 10px">
                    <form role="form" method="POST" action="{{ route('admin::adverts.destroy',[$advert->id])}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE"/>
                        <button type="submit" class="btn btn-default">Видалити</button>
                    </form>
            </tr>
        @endforeach

    </table>

@endsection