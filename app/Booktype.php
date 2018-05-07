<?php

namespace App;

use App\Book;

use Illuminate\Database\Eloquent\Model;

class Booktype extends Model
{
    //

     public function books(){
    	return $this->hasMany(Book::class);
    }

    public function booksPublished(){
    	return $this->books()->where('publish','1');
    }
}
