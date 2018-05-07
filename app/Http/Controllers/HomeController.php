<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\User;

use App\Activity;

use App\Book;

use App\Video;

use App\Collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        auth()->user()->authorizeRoles(['admin','superadmin']);
        $collection=Collection::collection();
        $users=User::all();
        $activities=Activity::all();
        $books=Book::all();
        $videos=Video::all();
        $posts=Post::latest()->get();
        return view('admin.home',compact('posts','users','videos','books','activities'));
    }
}
