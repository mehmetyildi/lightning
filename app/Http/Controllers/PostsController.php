<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Post;

use Carbon\Carbon;

use App\Tag;

use App\PostTag;

use App\Category;

use App\Activity;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Storage;

use App\Image;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Collection;

class PostsController extends Controller
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
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $posts=auth()->user()->posts()->latest()->get();
        return view('admin.posts.index',compact('posts'));
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
        $tags=Tag::all();
        $categories=Category::all();
        return view('admin.posts.create',compact('tags','categories'));
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

        $input=Input::all();
        
        $img=Input::file('image_url');
        
        $image_url=Image::nameImage($img);

        

        $request->image_url=$image_url;
        $this->validate(request(),[
            'title'=>'required',
            'body'=>'required'
            //'tags[]'=>'required'
        ]);
        $approved_at=Carbon::now();
        auth()->user()->Publish(

         $post= new Post(request(['title','body','body_small','body_medium','publish','category_id'])),$image_url,$approved_at
     );
        $post->url=SeoFriendlyUrl($post->title);
        $post->save();

        for($i=2 ;$i<= sizeof($request->file());$i++){
            $img=Input::file('image_url'.$i);
            $image=Image::nameImage($img);
            $post->addImage($image);
        }

        $key=0;
        $tags=$request->tags;

        if($tags){

            for ($i=0; $i <sizeof($tags) ; $i++) {


               $posttag=new PostTag;

               $posttag->post_id=$post->id;

               $posttag->tag_id=$tags[$i];

               $posttag->save();

               $key++;
           }
       }
       $posts=Post::latest()->get();

       return redirect('/post/index');

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        //
        $post=Post::where('url',$url)->firstOrFail();
        $hit=$post->hit;
        $hit++;
        $post->hit=$hit;
        $post->save();

        return view('user.posts.post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //

        auth()->user()->authorizeRoles(['admin','superadmin']);

        $tags=Tag::all();

        $categories=Category::all();

        return view('admin.posts.update',compact('post','tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //



        auth()->user()->authorizeRoles(['admin','superadmin']);

        if($request->image_url){

            File::delete(substr($post->image_url,1));

            for($i=0 ;$i< count($post->images);$i++){
                if(Input::file('image_url'.$i)){
                    File::delete(substr($post->images[$i]->image_url,1));
                    $img=Input::file('image_url'.$i);
                    $image=Image::nameImage($img);
                    $post->updateImage($post->images[$i]->id,$image);

                }



            }

            for($i=count($post->images);$i<=11;$i++){

                if(Input::file('image_url'.$i)){
                    $img=Input::file('image_url'.$i);
                    $image=Image::nameImage($img);

                    $post->addImage($image);
                }
            }


            $input=Input::all();

            $img=Input::file('image_url');

            $img=Input::file('image_url');

            $image_url=Image::nameImage($img);
            if($post->state_id==3){
                $post->state_id=1;
            }

            $post->title=$request->title;
            $post->url=SeoFriendlyUrl($post->title);
            $post->body=$request->body;
            $post->body_small=$request->body_small;
            $post->body_medium=$request->body_medium;
            $post->image_url=$image_url;
            $post->tags()->detach();
            $key=0;
            $tags=$request->tags;
            if($tags){

                for ($i=0; $i <sizeof($tags) ; $i++) {


                   $posttag=new PostTag;

                   $posttag->post_id=$post->id;

                   $posttag->tag_id=$tags[$i];

                   $posttag->save();

                   $key++;
               }
           }
           if(!$request->publish&&$post->publish==0){$post->publish=1;}
           else if(!$request->publish&&$post->publish==1) {$post->publish=0;}
       }
       else{

        for($i=0 ;$i< count($post->images);$i++){
            if(Input::file('image_url'.$i)){
                File::delete(substr($post->images[$i]->image_url,1));
                $img=Input::file('image_url'.$i);
                $image=Image::nameImage($img);
                $post->updateImage($post->images[$i]->id,$image);
            }
        }

        for($i=count($post->images);$i<=11;$i++){

            if(Input::file('image_url'.$i)){
                $img=Input::file('image_url'.$i);
                $image=Image::nameImage($img);

                $post->addImage($image);
            }
        }
        if($post->state_id==3){
            $post->state_id=1;
        }
        $post->title=$request->title;
        $post->url=SeoFriendlyUrl($post->title);
        $post->body=$request->body;
        $post->body_small=$request->body_small;
        $post->body_medium=$request->body_medium;
        $post->tags()->detach();
        $key=0;
        $tags=$request->tags;
        if($tags){ 

            for ($i=0; $i <sizeof($tags) ; $i++) {


               $posttag=new PostTag;

               $posttag->post_id=$post->id;

               $posttag->tag_id=$tags[$i];

               $posttag->save();

               $key++;
           }
       }

       if(!$request->publish&&$post->publish==0){$post->publish=1;}
       else if(!$request->publish&&$post->publish==1) {$post->publish=0;}
   }
   $post->save();

   return redirect('/post/index');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $post=Post::find($id);

        
        File::delete(substr($post->image_url,1));
        foreach ($post->Images as $image) {
            File::delete(substr($image->image_url,1));
        }
        $post->destroy($id);
        return redirect('/post/index');
    }

    public function showUserPost(User $user){

        $posts=$user->posts()->paginate(5);
        return view('user.posts.index',compact('posts'));
    }

    public function delete($id)
    {
        auth()->user()->authorizeRoles('superadmin');
        $post=Post::find($id);

        
        File::delete(substr($post->image_url,1));
        foreach ($post->images as $image) {
            File::delete(substr($image->image_url,1));
        }
        $post->destroy($id);

        
        return redirect('/collection/index');
        
        
    }

    public function confirm(Post $post){

        auth()->user()->authorizeRoles('superadmin');
        $post->approved_at=Carbon::now();
        $post->publish=1;
        $post->state_id=4;
        $post->save();
        return redirect('/collection/index');
    }

    public function revise(Post $post, Request $request){

        auth()->user()->authorizeRoles('superadmin');
        $post->state_id=3;
        $post->reason_for_revise=$request->reason_for_revise;
        $post->save();
        return redirect('/collection/index');
    }

}
