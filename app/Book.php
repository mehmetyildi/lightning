<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\User;

use App\Comment;

use App\Tag;

class Book extends Model
{
    //
 protected $fillable=['image_id','title','body','body_small','body_medium','publish','category_id','age_begin','age_end','tags[]','author','publisher','translated_by','year','type_id','booktype_id'];
 protected $dates = ['approved_at'];

 public function comments(){
   return $this->morphMany('App\Comment', 'commentable');
 }

 public function user(){

   return $this->belongsTo(User::class);
 }

 public function category(){

   return $this->belongsTo(Category::class);
 }

 public function tags(){

   return $this->belongsToMany(Tag::class);
 }

 public function addComment($body,$user_id){

  $comment=new Comment;
  $comment->user_id=$user_id;
  $comment->body=$body;
  $this->comments()->save($comment);
}

public function Type(){
  return 'book';
}

public static function created_this_month(){

  return Book::where('created_at','>=',Carbon::now()->startOfMonth())->count();
}

public static function created_last_month(){

  return Book::all()->count()-Book::created_this_month();
}

public static function percent_diff_from_last_month(){
  $last=Book::created_last_month();
  $now=Book::created_this_month();
  return number_format((float)($now/$last)*100, 2, '.', '');
}

public static function hit_percentage(){
  return number_format((float)(Book::sum('hit')/Collection::total_hit())*100, 2, '.', '');
}

public static function like_percentage(){
  return number_format((float)(Book::sum('like')/Collection::total_like())*100, 2, '.', '');
}

public static function dislike_percentage(){
  return number_format((float)(Book::sum('dislike')/Collection::total_dislike())*100, 2, '.', '');
}

public function like_user(){

    return $this->belongsToMany('App\User','book_like');
  }

  public function dislike_user(){

    return $this->belongsToMany('App\User','book_dislike');
  }
}
