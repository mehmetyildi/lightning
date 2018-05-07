<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Booktype;

class BooktypeController extends Controller
{
    //
	public function index($url){
		$booktype=Booktype::where('url',$url)->firstOrFail();
		$books=$booktype->books()->paginate(5);
		return view('user.books.index',compact('books'));
	}
}
