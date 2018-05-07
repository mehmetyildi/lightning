<?php

namespace App;

use App\Comment;

use App\User;

use App\Tag;

use App\Category;

use App\Collection;

use App\Image;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //
  protected $fillable=['image_id','title','body','body_small','body_medium','publish','category_id','age_begin','age_end','tags[]','material','activitytype_id'];
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

 public function images(){

  return $this->morphMany('App\Image','imagable');
}

public function updateImage($id,$image){

 $this->images()->where('id',$id)->update(['image_url'=>$image]);

}

public function addImage($image){

 $newImage=new Image();
 $newImage->image_url=$image;
 $this->images()->save($newImage);
}


public function addComment($body,$user_id){

  $comment=new Comment;
  $comment->user_id=$user_id;
  $comment->body=$body;
  $this->comments()->save($comment);
}

public function Type(){
  return 'activity';
}

public static function created_this_month(){

  return Activity::where('created_at','>=',Carbon::now()->startOfMonth())->count();
}

public static function created_last_month(){

  return Activity::all()->count()-Activity::created_this_month();
}

public static function percent_diff_from_last_month(){
  $last=Activity::created_last_month();
  $now=Activity::created_this_month();
  return number_format((float)($now/$last)*100, 2, '.', '');
}

public static function hit_percentage(){
  return number_format((float)(Activity::sum('hit')/Collection::total_hit())*100, 2, '.', '');
}

public static function like_percentage(){
  return number_format((float)(Activity::sum('like')/Collection::total_like())*100, 2, '.', '');
}

public static function dislike_percentage(){
  return number_format((float)(Activity::sum('dislike')/Collection::total_dislike())*100, 2, '.', '');
}

public function like_user(){

    return $this->belongsToMany('App\User','activity_like');
  }

  public function dislike_user(){

    return $this->belongsToMany('App\User','activity_dislike');
  }

}
