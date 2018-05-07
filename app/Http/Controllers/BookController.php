<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Tag;

use Carbon\Carbon;

use App\Book;

use App\Booktype;

use Illuminate\Support\Facades\Input;

use App\Image;

use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    //
	public function index(){
		$books=auth()->user()->books()->latest()->get();
		return view('admin.books.index',compact('books'));
	}

	public function __construct(){

		$this->middleware('auth')->except('show','showUserPost');

	}


	public function create(){
		auth()->user()->authorizeRoles(['admin','superadmin']);
		$tags=Tag::all();
		$categories=Category::all();
		$types=Booktype::all();
		return view('admin.books.create',compact('tags','categories','types'));
	}

	public function show($url){
		$book=Book::where('url',$url)->firstOrFail();
		$hit=$book->hit;
		$hit++;
		$book->hit=$hit;
		$book->save();

		return view('user.books.book',compact('book'));
	}

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
		auth()->user()->PublishBook(

			$book= new Book(request(['title','body','body_small','body_medium','publish','booktype_id','category_id','age_begin','age_end','tags[]','author','publisher','translated_by','year','type_id'])),$image_url,$approved_at)
		;

		$book->url=SeoFriendlyUrl($book->title);
		$book->save();
		$key=0;
		$tags=$request->tags;
		foreach ($tags as $tag) {
        	# code...
			$book->tags()->attach($tag);
		}
		

		return redirect('/book/index');

	}

	public function edit(Book $book){

		auth()->user()->authorizeRoles(['admin','superadmin']);

		$tags=Tag::all();

		$categories=Category::all();

		$types=Booktype::all();

		return view('admin.books.update', compact('book','tags','categories','types'));
	}

	public function update(Request $request, Book $book)
	{
		auth()->user()->authorizeRoles(['admin','superadmin']);

		$request->user()->authorizeRoles('admin','superadmin');
		if($request->image_url){


			File::delete(substr($book->image_url,1));

			// for($i=0 ;$i< count($book->images);$i++){
			// 	if(Input::file('image_url'.$i)){
			// 		File::delete(substr($book->images[$i]->image_url,1));
			// 		$img=Input::file('image_url'.$i);
			// 		$image=Image::nameImage($img);
			// 		$book->updateImage($book->activity[$i]->id,$image);

			// 	}
			// }

			$input=Input::all();

			$img=Input::file('image_url');

			$image_url=Image::nameImage($img);

			$this->validate(request(),[
				'title'=>'required',
				'body'=>'required'
            //'tags[]'=>'required'
			]);

			$book->image_url=$image_url;
			$book->title=$request->title;
			$book->url=SeoFriendlyUrl($book->title);
			if($book->state_id==3){
                $book->state_id=1;
            }
			$book->body=$request->body;
			$book->body_medium=$request->body_medium;
			$book->body_small=$request->body_small;
			$book->category_id=$request->category_id;
			$book->age_begin=$request->age_begin;
			$book->age_end=$request->age_end;
			$book->author=$request->author;
			$book->translated_by=$request->translated_by;
			$book->publisher=$request->publisher;
			$book->year=$request->year;
			$book->booktype_id=$request->booktype_id;
			$book->tags()->detach();
			
			$tags=$request->tags;
			foreach ($tags as $tag) {
        	# code...
				$book->tags()->attach($tag);
			}
			if(!$request->publish&&$book->publish==0){$book->publish=1;}
			else if(!$request->publish&&$book->publish==1) {$book->publish=0;}
		}
		else{

			


			$this->validate(request(),[
				'title'=>'required',
				'body'=>'required'
            //'tags[]'=>'required'
			]);


			$book->title=$request->title;
			$book->url=SeoFriendlyUrl($book->title);
			if($book->state_id==3){
                $book->state_id=1;
            }
			$book->body=$request->body;
			$book->body_medium=$request->body_medium;
			$book->body_small=$request->body_small;
			$book->category_id=$request->category_id;
			$book->age_begin=$request->age_begin;
			$book->age_end=$request->age_end;
			$book->author=$request->author;
			$book->translated_by=$request->translated_by;
			$book->publisher=$request->publisher;
			$book->year=$request->year;
			$book->booktype_id=$request->booktype_id;
			$book->tags()->detach();
			
			$tags=$request->tags;
			foreach ($tags as $tag) {
        	# code...
				$book->tags()->attach($tag);
			}
			if(!$request->publish&&$book->publish==0){$book->publish=1;}
			else if(!$request->publish&&$book->publish==1) {$book->publish=0;}


		}
		$book->save();

		return redirect('/book/index');

	}

	public function destroy($id)
	{
		auth()->user()->authorizeRoles(['admin','superadmin']);
		$book=Book::find($id);


		File::delete(substr($book->image_url,1));

		$book->destroy($id);
		return redirect('/book/index');
	}

	public function delete($id)
	{
		auth()->user()->authorizeRoles(['admin','superadmin']);
		$book=Book::find($id);

		
		File::delete(substr($book->image_url,1));
		
		$book->destroy($id);

		
		return redirect('/collection/index');
		
		
	}

	public function confirm(Book $book){
		

		auth()->user()->authorizeRoles('superadmin');
		$book->approved_at=Carbon::now();
		$book->publish=1;
		$book->state_id=4;
		$book->save();
		return redirect('/collection/index');
	}

	public function revise(Book $book, Request $request){

		auth()->user()->authorizeRoles('superadmin');
		$book->state_id=3;
		$book->reason_for_revise=$request->reason_for_revise;
		$book->save();
		return redirect('/collection/index');
	}
}
