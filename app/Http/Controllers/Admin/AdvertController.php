<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Advert;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::all();
            /*$category = $adverts->category;
            $user = $adverts->user;*/
           /* $advert->category_title = $category->title;
            $advert->name = $user->name;*/


        return view('admin.adverts',['adverts'=>$adverts]);
    }

    /**

     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.createAdvert',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required'

        ]);

//        dd($request->get('will_admin'));

        $advert = new Advert();
        $advert->category_id = $request->get('category_id');
        $advert->text = $request->get('text');
        $advert->title = $request->get('title');
        $advert->user_id = Auth::user()->id;
        $advert->save();

        return redirect('/admin/adverts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert=Advert::findOrFail($id);
$categories=Category::all();

        return view('admin.editAdvert',['advert'=>$advert, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $advert=Advert::findorFail($id);
        $advert->title=$request->get('title');
        $advert->text=$request->get('text');
        $advert->category_id=$request->get('category_id');
        $advert->user_id=Auth::user()->id;
        $advert->save();
        return redirect('/admin/adverts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert=Advert::find($id);

        $advert->delete();
        return redirect('/admin/adverts');
    }
}
