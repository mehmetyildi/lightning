<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use App\RelatedComment;

class RelatedCommentController extends Controller
{
    //
    public function store(Comment $comment,Request $request){

    	$this->validate(request(),['body'=>'required|min:2']);

        $comment->addRelatedComment($request->body,$request->user_id);

        return back();

    }

    public function report(RelatedComment $comment, Request $request){
        $comment->inapropriate_flag=1;
        $comment->reason_for_inapropriate_flag=$request->reason_for_inapropriate_flag;
        $comment->save();
        return back();
    }

    public function confirm($id){
        $comment=RelatedComment::find($id);
        
        $comment->reason_for_inapropriate_flag=null;
        $comment->inapropriate_flag=0;
        $comment->save();
        return back();

     }

     public function delete($id, Request $request){
        $comment=RelatedComment::find($id);
        $comment->reason_for_inactivation=$request->reason_for_delete;
        $comment->reason_for_inapropriate_flag=null;
        $comment->inapropriate_flag=0;
        $comment->save();
        return back();

     }
}
