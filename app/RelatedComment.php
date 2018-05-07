<?php

namespace App;

use App\Post;

use App\User;

use App\Comment;

use Illuminate\Database\Eloquent\Model;

class RelatedComment extends Model
{
    //

    public function comment(){

    	return $this->belongsTo(Comment::class);
    }

    public function post(){

		return $this->belongsTo(Post::class);
	}

	public function user(){

		return $this->belongsTo(User::class);

	}

	public function type(){

    	return 'related_comment';
    }

	
}
