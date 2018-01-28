@extends('admin/mainAdmin')
@section('title', 'admin.editUser')

@section('content')
    <h1>Редагування користувача</h1>

    <form role="form" method="POST" action="{{ route('admin::user.update',[$user->id])}}">
      {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-group">
            <b class="ng-binding">Вкажіть імя</b>
                  <input type="text" name="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть email</b>
                        <input type="email" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть пароль</b>
            <input type="password" name="password" value="">
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть роль</b>
            <input type="text" name="will_admin" value="{{$user->is_admin}}">
        </div>

        <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection