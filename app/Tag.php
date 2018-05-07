<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;

use App\Video;

use App\Activity;

class Tag extends Model
{
    //

    public function collection(){

        $collection=collect();
        
        foreach ($this->posts as $post) {
            
                $collection->push($post);
        }
        foreach ($this->books as $book) {
            
                $collection->push($book);
        }
        foreach ($this->activities as $activity) {
            
                $collection->push($activity);
        }
        foreach ($this->videos as $video) {
            
                $collection->push($video);
        }
        return $collection->sortByDesc('created_at');

    }

    protected $fillable=['name'];

    public function posts(){

    	return $this->belongsToMany(Post::class);
    }

    public function videos(){

    	return $this->belongsToMany(Video::class);
    }

    public function books(){

    	return $this->belongsToMany(Book::class);
    }

    public function activities(){

        return $this->belongsToMany(Activity::class);
    }
}
