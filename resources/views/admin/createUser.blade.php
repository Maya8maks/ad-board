@extends('admin/mainAdmin')
@section('title', 'admin.users')

@section('content')
    <h1>Створення нового користувача</h1>
    <form role="form" method="POST" action="{{ route('admin::user.store')}}">
        {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="form-group">
            <b class="ng-binding">Вкажіть імя</b>
            <input type="text" name="name" placeholder="ім я">
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть email</b>
            <input type="email" name="email" placeholder="email">
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть пароль</b>
            <input type="password" name="password" placeholder="password">
        </div>

        <div class="form-group">
            <b class="ng-binding">Вкажіть роль</b>
            <input type="text" name="will_admin" >
        </div>
        <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection