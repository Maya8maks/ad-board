@extends('admin/mainAdmin')
@section('title', 'admin.editCategory')

@section('content')
    <h1>Редагування користувача</h1>

    <form role="form" method="POST" action="{{ route('admin::category.update',[$category->id])}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-group">
            <input type="text" name="title" value="{{$category->title}}">
        </div>
        Picture: <input type="file" name="picture" >
               <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection