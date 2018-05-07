<?php

namespace App;

use App\Comment;

use App\User;

use App\Tag;

use App\Category;

use App\Image;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //


  protected $fillable=['title','body','body_small','body_medium','publish','category_id','image_url','video_link','tags[]'];
  protected $dates = ['approved_at'];

  public function comments(){
   return $this->morphMany('App\Comment', 'commentable');
 }

 public function category(){

   return $this->belongsTo(Category::class);
 }

 public function user(){
   return $this->belongsTo(User::class);
 }

 public function tags(){

   return $this->belongsToMany(Tag::class);
 }

 public function images(){

  return $this->morphMany('App\Image','imagable');
}

public function addImage($image){

 $newImage=new Image();
 $newImage->image_url=$image;
 $this->images()->save($newImage);
}

public function updateImage($id,$image){

 $this->images()->where('id',$id)->update(['image_url'=>$image]);

}

public function addComment($body,$user_id){

  $comment=new Comment;
  $comment->user_id=$user_id;
  $comment->body=$body;
  $this->comments()->save($comment);

}

public function Type(){
  return 'post';
}

public static function created_this_month(){

  return Post::where('created_at','>=',Carbon::now()->startOfMonth())->count();
}

public static function created_last_month(){

  return Post::all()->count()-Post::created_this_month();
}

public static function percent_diff_from_last_month(){
  $last=Post::created_last_month();
  $now=Post::created_this_month();
  return number_format((float)($now/$last)*100, 2, '.', '');
}

public static function hit_percentage(){
  return number_format((float)(Post::sum('hit')/Collection::total_hit())*100, 2, '.', '');
}

public static function like_percentage(){
  return number_format((float)(Post::sum('like')/Collection::total_like())*100, 2, '.', '');
}

public static function dislike_percentage(){
  return number_format((float)(Post::sum('dislike')/Collection::total_dislike())*100, 2, '.', '');
}

public function like_user(){

    return $this->belongsToMany('App\User','post_like');
  }

  public function dislike_user(){

    return $this->belongsToMany('App\User','post_dislike');
  }

}
