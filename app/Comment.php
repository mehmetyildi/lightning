<?php

namespace App;

use App\Post;

use App\User;

use App\RelatedComment;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable=['body'];

	public function commentable(){

		return $this->morphTo();
	}

	public function user(){

		return $this->belongsTo(User::class);

	}
	public function related_comments(){

		return $this->hasMany(RelatedComment::class);
	}

	    public function addRelatedComment($body,$user_id){
        
        $related=new RelatedComment;
        $related->user_id=$user_id;
        $related->body=$body;
       
        $this->related_comments()->save($related);

    }

    public function type(){

    	return 'comment';
    }

}
