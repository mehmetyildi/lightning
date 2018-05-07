<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

use App\Video;

use App\Post;

use App\Book;

use App\Activity;

class AjaxController extends Controller
{
    //

    public function video_like(Video $video){
        $video->like_user()->attach(auth()->user());
    	$video->like++;
    	$video->save();
    	return Response::json($video->like);
    }

    public function video_dislike(Video $video){
        $video->dislike_user()->attach(auth()->user());
    	$video->dislike++;
    	$video->save();
    	return Response::json($video->dislike);
    }


    public function post_like(Post $post){

        $post->like_user()->attach(auth()->user());
        $post->like++;
        $post->save();
        return Response::json($post->like);
    }

    public function post_dislike(Post $post){
        $post->dislike_user()->attach(auth()->user());
        $post->dislike++;
        $post->save();
        return Response::json($post->dislike);
    }


    public function book_like(Book $book){
        $book->like_user()->attach(auth()->user());
        $book->like++;
        $book->save();
        return Response::json($book->like);
    }

    public function book_dislike(Book $book){
        $book->dislike_user()->attach(auth()->user());
        $book->dislike++;
        $book->save();
        return Response::json($book->dislike);
    }


    public function activity_like(Activity $activity){
        $activity->like_user()->attach(auth()->user());
        $activity->like++;
        $activity->save();
        return Response::json($activity->like);
    }

    public function activity_dislike(Activity $activity){
        $activity->dislike_user()->attach(auth()->user());
        $activity->dislike++;
        $activity->save();
        return Response::json($activity->dislike);
    }
}
