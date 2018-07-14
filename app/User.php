<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Post;

use App\PostTag;

use App\Video;

use App\Book;

use App\Activity;

use App\UserPost;

class User extends Authenticatable
{
  use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'password', 'remember_token',
    ];

    public function posts(){

      return $this->hasMany(Post::class);
    }

    public function videos(){

      return $this->hasMany(Video::class);
    }

    public function books(){

      return $this->hasMany(Book::class);
    }

    public function activities(){

      return $this->hasMany(Activity::class);
    }

    public function Publish(Post $post, $image_url,$approved_at){

      $post->image_url=$image_url;
      $post->approved_at=$approved_at;

      if(auth()->user()->hasRole('superadmin')){
        $post->state_id=4;
      }

      $this->posts()->save($post);  
    }

    public function PublishActivity(Activity $activity, $image_url,$approved_at){

      $activity->image_url=$image_url;
      $activity->approved_at=$approved_at;

      $this->posts()->save($activity);  
    }

    public function publishVideo(Video $video,$approved_at){
      $video->approved_at=$approved_at;
      $this->videos()->save($video);
    }

    public function publishBook(Book $book,$image_url,$approved_at){

      $book->image_url=$image_url;
      $book->approved_at=$approved_at;

      $this->videos()->save($book);
    }

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles)
    {
      if (is_array($roles)) {
        return $this->hasAnyRole($roles) || 
        abort(401, 'This action is unauthorized.');
      }
      return $this->hasRole($roles) || 
      abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles)
    {
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role)  
    {
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function collection(){

     $collection = collect();
     $posts = $this->posts()->get();
     $activities = $this->activities()->get();
     $books=$this->books()->get();
     $videos=$this->videos()->get();

     foreach ($posts as $post)
      $collection->push($post);

    foreach ($activities as $activity)
      $collection->push($activity);

    foreach ($books as $book)
      $collection->push($book);

    foreach ($videos as $video)
      $collection->push($video);

    $last=$collection->sortByDesc('created_at');
    return($last);

  }

  public function like(){

    $post_like=$this->posts()->sum('like');
    $video_like=$this->videos()->sum('like');
    $book_like=$this->books()->sum('like');
    $activity_like=$this->activities()->sum('like');
    return $post_like+$book_like+$activity_like+$video_like;
  }

  public static function total_like(){
    $activity=Activity::sum('like');
    $post=Post::sum('like');
    $book=Book::sum('like');
    $video=Video::sum('like');
    return $activity+$post+$book+$video;
  }

    public function like_percentage(){

    return number_format((float)($this->like()/User::total_like())*100, 2, '.', '');
  }

    public function dislike(){

    $post_dislike=$this->posts()->sum('dislike');
    $video_dislike=$this->videos()->sum('dislike');
    $book_dislike=$this->books()->sum('dislike');
    $activity_dislike=$this->activities()->sum('dislike');
    return $post_dislike+$book_dislike+$activity_dislike+$video_dislike;
  }

    public static function total_dislike(){
    $activity=Activity::sum('dislike');
    $post=Post::sum('dislike');
    $book=Book::sum('dislike');
    $video=Video::sum('dislike');
    return $activity+$post+$book+$video;
  }

    public function dislike_percentage(){

    return number_format((float)($this->dislike()/User::total_dislike())*100, 2, '.', '');
  }

      public function hit(){

    $post_hit=$this->posts()->sum('hit');
    $video_hit=$this->videos()->sum('hit');
    $book_hit=$this->books()->sum('hit');
    $activity_hit=$this->activities()->sum('hit');
    return $post_hit+$book_hit+$activity_hit+$video_hit;
  }

      public static function total_hit(){
    $activity=Activity::sum('hit');
    $post=Post::sum('hit');
    $book=Book::sum('hit');
    $video=Video::sum('hit');
    return $activity+$post+$book+$video;
  }

    public function hit_percentage(){

    return number_format((float)($this->hit()/User::total_hit())*100, 2, '.', '');
  }

  public function like_post(){

    return $this->belongsToMany('App\Post','post_like');
  }

  public function like_video(){

    return $this->belongsToMany('App\Video','video_like');
  }

  public function like_book(){

    return $this->belongsToMany('App\Book','book_like');
  }

  public function like_activity(){

    return $this->belongsToMany('App\Activity','activity_like');
  }

  public function dislike_post(){

    return $this->belongsToMany('App\Post','post_like');
  }

  public function dislike_video(){

    return $this->belongsToMany('App\Video','video_like');
  }

  public function dislike_book(){

    return $this->belongsToMany('App\Book','book_like');
  }

  public function dislike_activity(){

    return $this->belongsToMany('App\Activity','activity_like');
  }

  public function user_posts(){
    return $this->hasMany(UserPost::class);
  }

  public function create_post($user_post){
     
      $this->user_posts()->save($user_post); 
      
    }

}
