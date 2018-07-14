<?php

namespace App\Http\Controllers;

use App\UserPost;

use App\User;

use Carbon\Carbon;

use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=UserPost::where('publish','1')->get();
      
        return view('user.user_post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function confirm(UserPost $userPost)
    {
        //

        $userPost->publish=1;
        $userPost->approved_at=Carbon::now();
        $userPost->save();
        return view('admin.user_post.index');

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
       
        User::find($request->user_id)->create_post($user_post=new UserPost(request(['title','body'])));
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function show(UserPost $userPost)
    {
        //

        return view('admin.user_post.show',compact('userPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPost $userPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPost $userPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPost $userPost)
    {
        //
        $userPost->destroy($userPost->id);
        return view('admin.user_post.index');
    }

    public function unapproved(){

        $user_posts=UserPost::where('publish',"0")->get();
        return view('admin.user_post.index',compact('user_posts'));
    }
}
