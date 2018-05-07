<?php

namespace App;

use App\Comment;

use App\RelatedComment;

use Illuminate\Database\Eloquent\Model;

class CommentCollection extends Model
{
    //

    public static function Collection(){

		$collection = collect();
		$comments = Comment::where('inapropriate_flag',1)->get();
		$relateds = RelatedComment::where('inapropriate_flag',1)->get();
		

		foreach ($comments as $comment)
			$collection->push($comment);

		foreach ($relateds as $related)
			$collection->push($related);

		

		return $collection->sortByDesc('updated_at');

	}

	public static function Count(){
		return CommentCollection::Collection()->count();
	}
}
