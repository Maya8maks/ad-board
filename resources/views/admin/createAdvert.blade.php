@extends('admin/mainAdmin')
@section('title', 'admin.createAdvert')

@section('content')
    <h1>Створення нового оголошення</h1>
    <form role="form" method="POST" action="{{ route('admin::adverts.store')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <b class="ng-binding">Виберіть категорію</b>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
@endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="title" placeholder="назва оголошення">
        </div>
        <div class="form-group">

            <textarea name="text" id="" cols="30" rows="10" placeholder="Текст оголошення"></textarea>

        </div>

        <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection