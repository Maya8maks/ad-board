
@extends('layout')

@section('title', 'Create')


@section('content')

    <h1>Створення нового оголошення</h1>
    <form role="form" method="POST" action="{{ route('create.ad') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <b class="ng-binding">Визначте категорію</b>
            <select name="category_id" id="">
            @foreach( $categories as $key => $category )
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <b class="ng-binding">Вкажіть назву</b>
            <input type="text" name="title">
        </div>
        <div class="form-group">
            <textarea name="text" id="" cols="30" rows="10"></textarea>

        </div>

        <button type="submit" class="btn btn-default">Отправить</button>
    </form>


@endsection