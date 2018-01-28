@extends('admin/mainAdmin')
@section('title', 'admin.editAdvert')

@section('content')
    <h1>Редагування оголошення</h1>

    <form role="form" method="POST" action="{{ route('admin::adverts.update',[$advert->id])}}">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT"/>

        <div class="form-group">
            <b class="ng-binding">Виберіть категорію</b>

            <select name="category_id" id="">
                @foreach($categories as $category)

                  {{-- <option {{ ($category->id=$advert->category_id) ? 'selected' : '' }}>{{$category->title}}</option>--}}
                   {{-- <option value="{{$category->id}}">
                    {{$category->title}}</option>--}}
                  <option value="{{$category->id}}"
          {{
                    ($category->id==$advert->category_id) ? 'selected' : ' '}}>
                    {{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="text" name="title" value="{{$advert->title}}">
        </div>
        <div class="form-group">

            <textarea name="text" id="" cols="30" rows="10" >{{$advert->text}}</textarea>

        </div>
        <button type="submit" class="btn btn-default">Відправити</button>
    </form>


@endsection