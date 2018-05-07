<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activitytype;

class ActivitytypeController extends Controller
{
    //
    public function index($url){
    	$activitytype=Activitytype::where('url',$url)->firstOrFail();
    	$activities=$activitytype->activities()->paginate(5);
    	return view('user.activities.index',compact('activities'));
    }
}
