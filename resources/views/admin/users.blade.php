@extends('admin/mainAdmin')
@section('title', 'admin.users')

@section('content')
<div class="create">

    <p><a href="{{ route('admin::user.create')}}">Створити користувача</a></p>
</div>

<table style="border-collapse: collapse;">
    <tr style="border-collapse: collapse;">
       {{-- <td style="border: solid 1px black; padding: 10px">номер</td>--}}
        <td style="border: solid 1px black; padding: 10px">ім'я</td>
        <td style="border: solid 1px black; padding: 10px">email</td>
        <td style="border: solid 1px black; padding: 10px">password</td>
        <td style="border: solid 1px black; padding: 10px">is_admin</td>
        <td style="border: solid 1px black; padding: 10px">created at</td>
        <td style="border: solid 1px black; padding: 10px">редагування</td>
        <td style="border: solid 1px black; padding: 10px">видалення</td>
    </tr>


{{--   {{ $i=0;}};--}}


    @foreach ($users as $key => $user)
      {{--  $i++;--}}
<tr style="border-collapse: collapse;">
        {{--<tr style="border-collapse: collapse;">
            <td style="border: solid 1px black; padding: 10px">
                <{{$i}}></td>--}}
            <td style="border: solid 1px black; padding: 10px">
                {{$user->name}}</td>
    <td style="border: solid 1px black; padding: 10px">
        {{$user->email}}</td>
            <td style="border: solid 1px black; padding: 10px">
                {{$user->password}}</td>
            <td style="border: solid 1px black; padding: 10px">
                {{$user->is_admin}}</td>
    <td style="border: solid 1px black; padding: 10px">
        {{$user->created_at}}</td>
    <td style="border: solid 1px black; padding: 10px">
        <a href="{{route('admin::user.edit', [$user->id])}}">Редагувати</a></td>
    <td style="border: solid 1px black; padding: 10px">
        <form role="form" method="POST" action="{{ route('admin::user.destroy',[$user->id])}}">
           {{ csrf_field() }}
            <input type="hidden" name="_method" value="DELETE"/>

            <button type="submit" class="btn btn-default">Видалити</button>
        </form>

        </tr>
@endforeach

</table>

@endsection