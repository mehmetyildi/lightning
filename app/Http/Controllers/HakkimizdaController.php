<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hakkimizda;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\File;

use App\Image;

class HakkimizdaController extends Controller
{
    //

    public function edit($id)
    {
        //
        auth()->user()->authorizeRoles('superadmin');
    	$hakkimizda=Hakkimizda::find($id);

        
        return view('admin.about.update',compact('hakkimizda'));
    }

        public function update(Request $request, $id)
    {
        //
        auth()->user()->authorizeRoles('superadmin');
        $hakkimizda=Hakkimizda::find($id);

        if($request->image_url){
           
            $input=Input::all();
        
            $img=Input::file('image_url');
        
            $image_url=Image::nameImage($img);
            
            $hakkimizda->title=$request->title;
            $hakkimizda->image_url=$image_url;
            $hakkimizda->body=$request->body;


            
        }
        else{
            $hakkimizda->title=$request->title;
          
            $hakkimizda->body=$request->body;
            
        }
        
        $hakkimizda->save();
        return redirect('/home');
    }

    public function show(){

        $about=Hakkimizda::find(1);

        return view('user.about.show',compact('about'));
    }

}
