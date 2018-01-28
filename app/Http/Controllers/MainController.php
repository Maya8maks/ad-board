<?php

namespace App\Http\Controllers;
use App\User;
use App\Category;
use App\Advert;
use App\Http\Controllers\Controller;


class MainController extends Controller{
public function index()
{
  /*  $user = new User;
       $user->name = 'Masha';
        $user->email = 'masha@gmail.com';
       $user->password = bcrypt(123);
       $user->is_admin=1;
        $user->save();*/

      /*$ad = new Adverts();
       $ad->title = 'Продам гараж';
        $ad->text = 'В хор. стані';
       $ad->user_id = 2;
        $ad->category_id = 3;*/
      /* $ad->category()->associate( 1 );
       $ad->user()->associate( $user );*/
     /*   $ad->save();*/
        /*$user = User::findOrFail(1);
        dump( $user->ads->first()->category->title );*/

        /*foreach ($user->ads as $ad) {
            dump( $ad->text );
        }*/
    $categories = Category::all();
    foreach ($categories as $category) {
        $category->mainPageAds = $category->ads()->orderBy('created_at', 'desc')->take(5)->get();
    }

    return view('main', ['categories' => $categories]);
}

}