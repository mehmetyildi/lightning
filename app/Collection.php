<?php

namespace App;

use App\Activity;

use App\Book;

use App\Video;

use App\Post;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //

	public static function collection(){

		$collection = collect();
		$posts = Post::all();
		$activities = Activity::all();
		$books=Book::all();
		$videos=Video::all();

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);


		return $collection->sortByDesc('created_at');

	}

	public static function category_count($category_id){
		$collection=Collection::collection();
		$count=0;
		foreach ($collection as $post) {
			if($post->category_id==$category_id){
				$count++;
			}
		}
		return $count;

	}
	public static function take($number){

		$collection=collect();

		for($i=0;$i<$number;$i++){
			$collection->push($this[$i]);
		}

		return $collection;
	}

	public static function CollectionPublished(){

		$collection = collect();
		$posts = Post::where('publish','1')->get();
		$activities = Activity::where('publish','1')->get();
		$books=Book::where('publish','1')->get();
		$videos=Video::where('publish','1')->get();

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);


		return $collection->sortByDesc('approved_at');

	}

	public static function CollectionNoVideoPublished(){

		$collection = collect();
		$posts = Post::where('publish','1')->get();
		$activities = Activity::where('publish','1')->get();
		$books=Book::where('publish','1')->get();
		

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		


		return $collection->sortByDesc('approved_at');

	}

	public static function NoVideoCollection(){

		$collection = collect();
		$posts = Post::all();
		$activities = Activity::all();
		$books=Book::all();


		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		

		return $collection->sortByDesc('created_at');

	}

	public static function CountPending(){
		$collection=Collection::collection();
		$count=0;
		foreach ($collection as $post) {
			if($post->state_id==1){
				$count++;
			}
		}
		return $count;
	}

	public static function CollectionPending(){

		$collection = collect();
		$posts = Post::where('state_id','1')->get();
		$activities = Activity::where('state_id','1')->get();
		$books=Book::where('state_id','1')->get();
		$videos=Video::where('state_id','1')->get();

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);


		return $collection;

	}

	public static function CountPendingUser($user){
		$collection=Collection::collection();
		$count=0;
		foreach ($collection as $post) {
			if($post->state_id==1&&$post->user_id==$user->id){
				$count++;
			}
		}
		return $count;
	}

	public static function CollectionPendingUser($user){

		$collection = collect();
		$posts = $user->posts()->where('state_id','1')->get();
		$activities = $user->activities()->where('state_id','1')->get();
		$books=$user->books()->where('state_id','1')->get();
		$videos=$user->videos()->where('state_id','1')->get();

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);


		return $collection;

	}


	public static function CountReviseUser($user){
		$collection=Collection::collection();
		$count=0;
		foreach ($collection as $post) {
			if($post->state_id==3&&$post->user_id==$user->id){
				$count++;
			}
		}
		return $count;
	}

	public static function CollectionReviseUser($user){

		$collection = collect();
		$posts = $user->posts()->where('state_id','3')->get();
		$activities = $user->activities()->where('state_id','3')->get();
		$books=$user->books()->where('state_id','3')->get();
		$videos=$user->videos()->where('state_id','3')->get();

		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);


		return $collection;

	}

	public static function total_hit(){
		$posts = Post::all()->sum('hit');
		$activities = Activity::all()->sum('hit');
		$books=Book::all()->sum('hit');
		$videos=Video::all()->sum('hit');
		return $posts+$books+$activities+$videos;
	}

	public static function total_like(){
		$posts = Post::all()->sum('like');
		$activities = Activity::all()->sum('like');
		$books=Book::all()->sum('like');
		$videos=Video::all()->sum('like');
		return $posts+$books+$activities+$videos;
	}

	public static function total_dislike(){
		$posts = Post::all()->sum('like');
		$activities = Activity::all()->sum('like');
		$books=Book::all()->sum('like');
		$videos=Video::all()->sum('like');
		return $posts+$books+$activities+$videos;
	}

	public static function user_likes(User $user){

		$collection = collect();
		$posts=$user->like_post()->get();
		$books=$user->like_book()->get();
		$videos=$user->like_video()->get();
		$activities=$user->like_activity()->get();
		foreach ($posts as $post)
			$collection->push($post);

		foreach ($activities as $activity)
			$collection->push($activity);

		foreach ($books as $book)
			$collection->push($book);

		foreach ($videos as $video)
			$collection->push($video);
		return $collection;
	}



}
