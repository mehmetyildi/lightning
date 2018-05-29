<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

use App\Post;

use App\Tag;

use App\Category;

use App\Homepage;

use App\Hakkimizda;

use App\Collection;

use App\Activitytype;

use App\Booktype;

use App\Videotype;

use App\Http\Controllers\Controller;

use App\CommentCollection;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Pagination\Paginator;

use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Contracts\Support\Arrayable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function paginate($collection,$perPage,$pageName='page',$fragment=null){

        $currentPage=LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems=$collection->slice(($currentPage-1)*$perPage,$perPage);
        parse_str(request()->getQueryString(),$query);
        unset($query[$pageName]);
        $paginator=new LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'pageName'=>$pageName,
                'path'=>LengthAwarePaginator::resolveCurrentPath(),
                'query'=>$query,
                'fragment'=>$fragment
            ]
        );
        return $paginator;
    }


    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        
        
        view()->composer('layouts.user.master',function($view){
            $view->with('hp',Homepage::find(1));
            
        });

        view()->composer('layouts.user.slider',function($view){
            $view->with('posts',Collection::CollectionNoVideoPublished()->take(5));
            
        });

        view()->composer('user.posts.posts',function($view){
            $view->with('posts', $this->paginate(Collection::CollectionPublished(),5));
            
        });

        view()->composer('layouts.admin.sidebar',function($view){
            $view->with('collection',Collection::CountPending());
            $view->with('comments',CommentCollection::Count());
            $view->with('collection_user',Collection::CountPendingUser(auth()->user()));
            $view->with('collection_user_revise',Collection::CountReviseUser(auth()->user()));
        });

        view()->composer('layouts.user.sidebar',function($view){
            $view->with('posts',Collection::CollectionNoVideoPublished()->take(5));
            $view->with('tags',Tag::all());
            $view->with('categories',Category::all());
            $view->with('about',Hakkimizda::find(1));
            
        });

        view()->composer('layouts.user.footer',function($view){
            $view->with('about',Hakkimizda::find(1));
            $view->with('home',Homepage::find(1));
            
        });

        view()->composer('layouts.user.header',function($view){
            $view->with('activitytypes',Activitytype::has('activitiesPublished')->get());
            $view->with('booktypes',Booktype::has('booksPublished')->get());
            $view->with('categories',Category::has('postsPublished')->get());
            $view->with('categories_video',Category::has('videosPublished')->get());
        
            
        });

        view()->composer('user.collection.collection',function($view){
            $view->with('posts',$this->paginate(Collection::user_likes(auth()->user()),5));
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
