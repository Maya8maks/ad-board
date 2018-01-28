@extends('layout')
@section('header')
@parent
@endsection

@section('content')
    <h1 style="color:palevioletred;">Оголошення</h1>
<div style=font-size:20px;">
    <p>{{$advert->title}}</p>
    <p>{{$advert->text}}</p>
    <p>{{$advert->created_at}}</p>
    <p>{{$user->name}}</p>
</div>
@endsection