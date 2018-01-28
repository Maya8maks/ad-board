@extends('admin/mainAdmin')
@section('title', 'admin.categories')

@section('content')
    <h1>Створення нової категорії</h1>
    <form role="form" method="POST" action="{{ route('admin::category.store')}}">
        {{ csrf_field() }}

        <div class="form-group">

            <input type="text" name="title" placeholder="назва категорії">
        </div>

        <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection