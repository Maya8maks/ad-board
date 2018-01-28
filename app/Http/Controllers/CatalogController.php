<?php

namespace App\Http\Controllers;
use App\Events\AdWasCreated;
use Illuminate\Support\Facades\Event;
use App\User;
use App\Category;
use App\Advert;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function showCategory($id = null)
    {

        $ads = null;
        $category=null;
        if (!$id) {
            $ads = Advert::paginate(5);
            $categories=Category::all();

            } else {
           $category= Category::findOrFail($id);
           $categories[]= $category;
            /*$ads=$category->ads; */
            $ads = Advert::where('category_id', '=', $id)->paginate(5);
        }

        return view('catalog',
            [
                    'categories' =>$categories,
                'ads' => $ads,
                'catId' => $id
            ]
        );
    }
    public function createAdverts( )
    {
        $categories = Category::all();
        return view('create', ['categories' => $categories]);
    }
    public function addAdverts( Request $request )
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'category_id' => 'required'
        ]);
        $user = Auth::user();
        $ad = new Advert();
        $ad->title = $request->get('title');
        $ad->text = $request->get('text');
        $ad->category_id = $request->get('category_id');
        $ad->user()->associate($user);
        $ad->save();
        Event::fire(new AdWasCreated($ad));
       return redirect('/');
    }

}