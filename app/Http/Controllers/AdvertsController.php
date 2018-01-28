<?php

namespace App\Http\Controllers;
use App\Advert;
use App\User;
use App\Http\Controllers\Controller;


class AdvertsController extends Controller{
public function showAdverts($id){
    $user=null;
$advert=Advert::findOrFail($id);

    $user=$advert->user;

return view('advert', [
    'advert'=>$advert,
    'user'=>$user]
);
}
}