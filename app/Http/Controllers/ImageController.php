<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    //
    public function create(){

    	return view('imitation');
    }

    public function store(Request $request){

    	dd($request);
    }
}
