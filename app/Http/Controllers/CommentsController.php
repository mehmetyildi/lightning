<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

use App\Book;

use App\Video;

use App\Activity;

use App\Comment;

use App\CommentCollection;

use App\RelatedComment;



class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments=CommentCollection::Collection();
        return view('admin.comments.index',compact('comments'));
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

     public function confirm($id){
        $comment=Comment::find($id);
        $comment->reason_for_inapropriate_flag=null;
        $comment->inapropriate_flag=0;
        $comment->save();
        return back();

     }

     public function delete(Comment $comment, Request $request){

        $comment->reason_for_inactivation=$request->reason_for_delete;
        $comment->reason_for_inapropriate_flag=null;
        $comment->inapropriate_flag=0;
        $comment->save();
        return back();

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_to_post(Post $post,Request $request){



        $this->validate(request(),['body'=>'required|min:2']);

        $post->addComment($request->body,$request->user_id);//addComment Post model de

        return back();


    }

    public function store_to_book(Book $book,Request $request){



        $this->validate(request(),['body'=>'required|min:2']);

        $book->addComment($request->body,$request->user_id);//addComment Post model de

        return back();


    }

    public function store_to_video(Video $video,Request $request){



        $this->validate(request(),['body'=>'required|min:2']);

        $video->addComment($request->body,$request->user_id);//addComment Post model de

        return back();


    }

    public function store_to_activity(Activity $activity,Request $request){



        $this->validate(request(),['body'=>'required|min:2']);

        $activity->addComment($request->body,$request->user_id);//addComment Post model de

        return back();


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

    public function report(Comment $comment, Request $request){
        $comment->inapropriate_flag=1;
        $comment->reason_for_inapropriate_flag=$request->reason_for_inapropriate_flag;
        $comment->save();
        return back();
    }
}
