<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Collection;

use App\Post;

use App\Book;

use App\Activity;

use App\Video;

use App\User;

class CollectionsController extends Controller
{
   public function __construct(){

    $this->middleware('auth')->except('show','showUserPost');

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        auth()->user()->authorizeRoles('superadmin');
        $posts=Collection::CollectionPending();
        return view('admin.collection.index',compact('posts'));
    }

    public function likes(User $user){

        $posts=Collection::user_likes($user);
        return view('user.collection.collection',compact('posts'));
    }

    public function index_user(User $user)
    {
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $posts=Collection::CollectionPendingUser($user);
        return view('admin.collection.index',compact('posts'));
    }

    public function index_user_revise(User $user)
    {
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $posts=Collection::CollectionReviseUser($user);
        return view('admin.collection.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$type)
    {
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);
        if($type=='post'){
            $post=Post::find($id);
            return view('admin.collection.show_post',compact('post'));
        }

        elseif($type=='book')
        {
            $book=Book::find($id);

            return view('admin.collection.show_book',compact('book'));
        }
        elseif($type=='video'){
            $video=Video::find($id);
            return view('admin.collection.show_video',compact('video'));
        }
        else
        {
            $activity=Activity::find($id);
            return view('admin.collection.show_activity',compact('activity'));
        }

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
