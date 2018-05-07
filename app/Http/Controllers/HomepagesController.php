<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Homepage;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\File;

use App\Image;

use App\Collection;

class HomepagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        auth()->user()->authorizeRoles('superadmin');
        return view('admin.mainpage.create');
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
    public function show()
    {
        //
        

        return view('user.posts.posts');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Homepage $homepage)
    {
        //
        auth()->user()->authorizeRoles('superadmin');
        return view('admin.mainpage.update',compact('homepage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homepage $homepage)
    {
        //
        auth()->user()->authorizeRoles('superadmin');
        if($request->logo){
         
            $input=Input::all();
            
            $img=Input::file('logo');
            
            $image_url=Image::nameImage($img);
            
            $homepage->title=$request->title;
            $homepage->logo=$image_url;
            $homepage->facebook=$request->facebook;
            $homepage->twitter=$request->twitter;
            $homepage->instagram=$request->instagram;
            $homepage->video_link=$request->video_link;

            
        }
        else{
            $homepage->title=$request->title;
            $homepage->facebook=$request->facebook;
            $homepage->twitter=$request->twitter;
            $homepage->instagram=$request->instagram;
            $homepage->video_link=$request->video_link;
            
        }
        
        $homepage->save();
        return redirect('/home');
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
