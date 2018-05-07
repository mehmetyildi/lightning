<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

use App\Video;

use App\Book;

use App\Activity;

use App\Collection;

class Category extends Model
{
    //
    public function collection(){

        $collection=collect();
        $collection_all=Collection::collection();
        foreach ($collection_all as $all) {
            if($all->category_id==$this->id)
                $collection->push($all);
        }
        return $collection->sortByDesc('created_at');

    }

    public function posts(){

    	return $this->hasMany(Post::class);
    }

    public function postsPublished(){

        return $this->posts()->where('publish','1');
    }

    public function videosPublished(){

        return $this->videos()->where('publish','1');
    }

    public function books(){

    	return $this->hasMany(Book::class);
    }

    public function videos(){

    	return $this->hasMany(Video::class);
    }

    public function activities(){

        return $this->hasMany(Activity::class);
    }
}
