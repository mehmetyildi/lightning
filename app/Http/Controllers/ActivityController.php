<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Tag;

use App\Activitytype;

use Illuminate\Support\Facades\Input;

use App\Image;

use Carbon\Carbon;

use App\Activity;

use Illuminate\Support\Facades\File;


class ActivityController extends Controller
{

	public function index(){
		$activities=auth()->user()->activities()->latest()->get();
		return view('admin.activities.index',compact('activities'));
	}
    //
	public function __construct(){

		$this->middleware('auth')->except('show','showUserPost');

	}

	public function show($url){
		$activity=Activity::where('url',$url)->firstOrFail();
		$hit=$activity->hit;
		$hit++;
		$activity->hit=$hit;
		$activity->save();

		return view('user.activities.activity',compact('activity'));
	}

	public function create(){
		auth()->user()->authorizeRoles(['admin','superadmin']);

		$tags=Tag::all();
		$categories=Category::all();
		$types=Activitytype::all();
		return view('admin.activities.create',compact('tags','categories','types'));
	}

	public function store(Request $request)
	{
        //
        auth()->user()->authorizeRoles(['admin','superadmin']);

		$request->user()->authorizeRoles('admin','superadmin');

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
		auth()->user()->PublishActivity(

			$activity= new Activity(request(['image_id','title','body','body_small','body_medium','publish','category_id','age_begin','age_end','tags[]','material','activitytype_id'])),$image_url,$approved_at
		);
		$activity->url=SeoFriendlyUrl($activity->title);
		$activity->save();

		for($i=2 ;$i<= sizeof($request->file());$i++){
			$img=Input::file('image_url'.$i);
			$image=Image::nameImage($img);
			$activity->addImage($image);
		}

		$key=0;
		$tags=$request->tags;
		foreach ($tags as $tag) {
        	# code...
			$activity->tags()->attach($tag);
		}
		

		return redirect('/activity/index');

	}

	public function edit(Activity $activity){

		auth()->user()->authorizeRoles(['admin','superadmin']);

		$tags=Tag::all();

		$categories=Category::all();

		$types=Activitytype::all();

		return view('admin.activities.update',compact('activity','categories','tags','types'));
	}


	public function update(Request $request, Activity $activity)
	{
        //

		auth()->user()->authorizeRoles(['admin','superadmin']);

		$request->user()->authorizeRoles('admin','superadmin');
		if($request->image_url){


			File::delete(substr($activity->image_url,1));

			for($i=0 ;$i< count($activity->images);$i++){
				if(Input::file('image_url'.$i)){
					File::delete(substr($activity->images[$i]->image_url,1));
					$img=Input::file('image_url'.$i);
					$image=Image::nameImage($img);
					$activity->updateImage($activity->activity[$i]->id,$image);

				}
			}

			for($i=count($activity->images);$i<=11;$i++){

				if(Input::file('image_url'.$i)){
					$img=Input::file('image_url'.$i);
					$image=Image::nameImage($img);
					$activity->addImage($image);
				}
			}

			$input=Input::all();

			$img=Input::file('image_url');

			$image_url=Image::nameImage($img);



			$request->image_url=$image_url;
			$this->validate(request(),[
				'title'=>'required',
				'body'=>'required'
            //'tags[]'=>'required'
			]);
			if($activity->state_id==3){
                $activity->state_id=1;
            }
			$activity->image_url=$image_url;
			$activity->title=$request->title;
			$activity->url=SeoFriendlyUrl($activity->title);
			$activity->body_medium=$request->body_medium;
			$activity->body_small=$request->body_small;
			$activity->body=$request->body;
			$activity->category_id=$request->category_id;
			$activity->age_begin=$request->age_begin;
			$activity->age_end=$request->age_end;
			$activity->material=$request->material;
			$activity->activitytype_id=$request->activitytype_id;
			$activity->tags()->detach();
			
			$key=0;
			$tags=$request->tags;
			foreach ($tags as $tag) {
        	# code...
				$activity->tags()->attach($tag);
			}
			if(!$request->publish&&$activity->publish==0){$activity->publish=1;}
			else if(!$request->publish&&$activity->publish==1) {$activity->publish=0;}
		}
		else{

			

			for($i=0 ;$i< count($activity->images);$i++){
				if(Input::file('image_url'.$i)){
					File::delete(substr($activity->images[$i]->image_url,1));
					$img=Input::file('image_url'.$i);
					$image=Image::nameImage($img);
					$activity->updateImage($activity->activity[$i]->id,$image);

				}
			}

			for($i=count($activity->images);$i<=11;$i++){

				if(Input::file('image_url'.$i)){
					$img=Input::file('image_url'.$i);
					$image=Image::nameImage($img);
					$activity->addImage($image);
				}
			}


			$this->validate(request(),[
				'title'=>'required',
				'body'=>'required'
            //'tags[]'=>'required'
			]);

			if($activity->state_id==3){
                $activity->state_id=1;
            }
			$activity->title=$request->title;
			$activity->url=SeoFriendlyUrl($activity->title);
			$activity->body_medium=$request->body_medium;
			$activity->body_small=$request->body_small;
			$activity->body=$request->body;
			$activity->category_id=$request->category_id;
			$activity->age_begin=$request->age_begin;
			$activity->age_end=$request->age_end;
			$activity->material=$request->material;
			$activity->activitytype_id=$request->activitytype_id;
			$activity->tags()->detach();
			
			$key=0;
			$tags=$request->tags;
			foreach ($tags as $tag) {
        	# code...
				$activity->tags()->attach($tag);
			}
			if(!$request->publish&&$activity->publish==0){$activity->publish=1;}
			else if(!$request->publish&&$activity->publish==1) {$activity->publish=0;}


		}
		$activity->save();

		return redirect('/activity/index');

	}

	public function destroy($id)
	{
		auth()->user()->authorizeRoles(['admin','superadmin']);
		$activity=Activity::find($id);

		
		File::delete(substr($activity->image_url,1));
		foreach ($activity->images as $image) {
			File::delete(substr($image->image_url,1));
		}
		$activity->destroy($id);

		
		return back();
		
		
	}

	public function delete($id)
	{
		auth()->user()->authorizeRoles(['admin','superadmin']);
		$activity=Activity::find($id);

		
		File::delete(substr($activity->image_url,1));
		foreach ($activity->images as $image) {
			File::delete(substr($image->image_url,1));
		}
		$activity->destroy($id);

		
		return redirect('/collection/index');
		
		
	}

	public function confirm(Activity $activity){
		auth()->user()->authorizeRoles('superadmin');
		$activity->approved_at=Carbon::now();
		$activity->publish=1;
		$activity->state_id=4;
		$activity->save();
		return redirect('/collection/index');
	}

	public function revise(Activity $activity, Request $request){

		auth()->user()->authorizeRoles('superadmin');
		$activity->state_id=3;
		$activity->reason_for_revise=$request->reason_for_revise;
		$activity->save();
		return redirect('/collection/index');
	}





}