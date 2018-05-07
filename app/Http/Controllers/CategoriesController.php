<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Collection;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url)
    {
        //
        $category=Category::where('url',$url)->firstOrFail();
        
        $posts=$category->collection();

        $posts=Controller::paginate($posts,5);

        return view('user.collection.collection',compact('posts'));

    }

    public function index_post($url){
        $category=Category::where('url',$url)->firstOrFail();
        $posts=$category->posts()->paginate(5);
        return view('user.posts.index',compact('posts'));
    }

    public function index_video($url){
        $category=Category::where('url',$url)->firstOrFail();
        $videos=$category->videos()->paginate(5);
        return view('user.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $category=new Category;
        $category->title=$request->title;
        $category->url=SeoFriendlyUrl($category->title);
        $category->save();
        return back();
    }

    public function storeFromAjax(Request $request){

        $title=$request->title;
        

        //$this->validate(request(),['title'=>'required|min:2']);

        $category=new Category;
        $category->title=$request->title;
        $category->save();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
