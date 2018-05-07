<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Tag;

use App\Video;

use Carbon\Carbon;

class VideoController extends Controller
{
    //

 public function __construct(){

    $this->middleware('auth')->except('show','showUserPost');

}
public function index(){
    $videos=auth()->user()->videos()->latest()->get();
    return view('admin.videos.index',compact('videos'));
}
public function create(){
    auth()->user()->authorizeRoles(['admin','superadmin']);
    $tags=Tag::all();
    $categories=Category::all();
    return view('admin.videos.create',compact('tags','categories'));
}

public function show($url){
    $video=Video::where('url',$url)->firstOrFail();
    $hit=$video->hit;
    $hit++;
    $video->hit=$hit;
    $video->save();

    return view('user.videos.video',compact('video'));
}
public function store(Request $request){


    auth()->user()->authorizeRoles(['admin','superadmin']);
    $this->validate(request(),[
        'title'=>'required',
        'body'=>'required'
            //'tags[]'=>'required'
    ]);
    $approved_at=Carbon::now();

    auth()->user()->publishVideo(
     $video=new Video(request(['title','body','body_small','body_medium','publish','video_link','category_id'])),$approved_at
 );
    $video->url=SeoFriendlyUrl($video->title);
    $video->save();

    $tags=$request->tags;
    foreach ($tags as $tag) {
        	# code...
     $video->tags()->attach($tag);
 }

 return redirect('/video/index');

}

public function edit(Video $video){

    auth()->user()->authorizeRoles(['admin','superadmin']);

    $tags=Tag::all();

    $categories=Category::all();



    return view('admin.videos.update', compact('video','tags','categories'));
}

public function update(Request $request,Video $video){

    auth()->user()->authorizeRoles(['admin','superadmin']);

    $this->validate(request(),[
        'title'=>'required',
        'body'=>'required'
            //'tags[]'=>'required'
    ]);
    if($video->state_id==3){
        $video->state_id=1;
    }
    $video->video_link=$request->video_link;
    $video->category_id=$request->category_id;
    $video->title=$request->title;
    $video->url=SeoFriendlyUrl($video->title);
    $video->body=$request->body;
    $video->body_small=$request->body_small;
    $video->body_medium=$request->body_medium;
    
    $video->tags()->detach();


    $tags=$request->tags;
    foreach ($tags as $tag) {
            # code...
        $video->tags()->attach($tag);
    }
    if(!$request->publish&&$video->publish==0){$video->publish=1;}
    else if(!$request->publish&&$video->publish==1) {$video->publish=0;}
    $video->save();
    return redirect('/video/index');

}

public function destroy($id)
{
    auth()->user()->authorizeRoles(['admin','superadmin']);
    
    $video=Video::find($id);

    $video->destroy($id);
    return redirect('/video/index');
}


public function delete($id)
{
    auth()->user()->authorizeRoles(['admin','superadmin']);
    $video=Video::find($id);



    $video->destroy($id);


    return redirect('/collection/index');


}

public function confirm(Video $video){

    auth()->user()->authorizeRoles('superadmin');
    $video->approved_at=Carbon::now();

    $video->publish=1;
    $video->state_id=4;
    $video->save();
    return redirect('/collection/index');
}

public function revise(Video $video, Request $request){
    auth()->user()->authorizeRoles('superadmin');

    $video->state_id=3;
    $video->reason_for_revise=$request->reason_for_revise;
    $video->save();
    return redirect('/collection/index');
}

}
