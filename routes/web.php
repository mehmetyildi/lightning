<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//Admin routes

Route::get('/user/index','UsersController@index');

Route::post('/user/delete/{user}','UsersController@destroy');

Route::post('/user/upgrade/{user}','UsersController@upgrade');

Route::post('/user/downgrade/{user}','UsersController@downgrade');



Route::get('/admin','HomeController@index');



Route::get('/post/index', 'PostsController@index');

Route::get('/posts/create','PostsController@create');

Route::post('/posts/store','PostsController@store');

Route::get('/post/edit/{post}','PostsController@edit');

Route::post('/posts/update/{post}','PostsController@update');

Route::post('/posts/delete/{id}','PostsController@destroy');

Route::post('/post/destroy/{post}','PostsController@delete');

Route::post('/post/confirm/{post}','PostsController@confirm');

Route::post('/post/revise/{post}','PostsController@revise');



Route::get('/tags/create','TagsController@create');

Route::post('/tags/store','TagsController@store');



Route::get('/category/create','CategoriesController@create');

Route::post('/category/store','CategoriesController@store');



Route::post('/create/categories','CategoriesController@storeFromAjax');



Route::get('/homepage/edit/{homepage}','HomepagesController@edit');

Route::post('/homepage/update/{homepage}','HomepagesController@update');



Route::get('/about/edit/{about}','HakkimizdaController@edit');

Route::post('/about/update/{homepage}','HakkimizdaController@update');



Route::get('/video/index', 'VideoController@index');

Route::get('/video/create','VideoController@create');

Route::get('/video/delete/{id}','VideoController@destroy');

Route::post('/video/store','VideoController@store');

Route::get('/video/edit/{video}','VideoController@edit');

Route::post('/video/update/{video}','VideoController@update');

Route::post('/video/confirm/{video}','VideoController@confirm');

Route::post('/video/revise/{video}','VideoController@revise');

Route::post('/video/destroy/{video}','VideoController@delete');



Route::get('/book/index','BookController@index');

Route::get('/book/create','BookController@create');

Route::post('/book/delete/{id}','BookController@destroy');

Route::get('/book/edit/{book}','BookController@edit');

Route::post('/book/store','BookController@store');

Route::post('/book/update/{book}','BookController@update');

Route::post('/book/confirm/{book}','BookController@confirm');

Route::post('/book/revise/{book}','BookController@revise');

Route::post('/book/destroy/{book}','BookController@delete');



Route::get('/activity/index','ActivityController@index');

Route::get('/activity/create','ActivityController@create');

Route::post('/activity/delete/{id}','ActivityController@destroy');

Route::get('/activity/edit/{activity}','ActivityController@edit');

Route::post('/activity/store','ActivityController@store');

Route::post('/activity/update/{activity}','ActivityController@update');

Route::post('/activity/confirm/{activity}','ActivityController@confirm');

Route::post('/activity/revise/{activity}','ActivityController@revise');

Route::post('/activity/destroy/{activity}','ActivityController@delete');



Route::get('/collection/index','CollectionsController@index');

Route::get('/collection/likes/{user}','CollectionsController@likes');

Route::get('/collection/pending/{user}/index','CollectionsController@index_user');

Route::get('/collection/revise/{user}/index','CollectionsController@index_user_revise');

Route::get('/collection/show/{id}/{type}','CollectionsController@show');



Route::get('/comments/inapropriate/index','CommentsController@index');

Route::get('/comment/confirm/{comment}','CommentsController@confirm');

Route::post('/comment/delete/{comment}','CommentsController@delete');

Route::get('/related_comment/confirm/{related_comment}','RelatedCommentController@confirm');

Route::post('/related_comment/delete/{related_comment}','RelatedCommentController@delete');




//user routes

Route::get('/','HomepagesController@show')->name('home');

// Route::get('/crop','ImageController@create');

// Route::post('/crop/store','ImageController@store');

Route::get('/post/show/{post}','PostsController@show');

Route::post('/post/{post}/comments','CommentsController@store_to_post');


Route::get('/video/show/{video}','VideoController@show');

Route::post('/video/{video}/comments','CommentsController@store_to_video');


Route::get('/activity/show/{activity}','ActivityController@show');

Route::get('/activity/{activitytype}/index','ActivitytypeController@index');

Route::post('/activity/{activity}/comments','CommentsController@store_to_activity');


Route::get('/book/show/{book}','BookController@show');

Route::get('/book/{booktype}/index','BooktypeController@index');

Route::post('/book/{book}/comments','CommentsController@store_to_book');



Route::post('/comment/{comment}/related_comments','RelatedCommentController@store');

Route::post('/comment/report/{comment}','CommentsController@report');

Route::post('/related_comment/report/{comment}','RelatedCommentController@report');



Route::get('/posts/tags/{tag}','TagsController@index');

Route::get('/posts/user/{user}','PostsController@showUserPost');


Route::get('/collection/categories/{category}','CategoriesController@index');

Route::get('/collection/tags/{tag}','TagsController@index');

Route::get('/collection/user/{user}','UsersController@show');


Route::get('/about','HakkimizdaController@show');

Route::get('category/{category}/posts/index','CategoriesController@index_post');

Route::get('category/{category}/videos/index','CategoriesController@index_video');




//Ajax
Route::get('get/video/like/{video}','AjaxController@video_like');

Route::get('get/video/dislike/{video}','AjaxController@video_dislike');


Route::get('get/book/like/{book}','AjaxController@book_like');

Route::get('get/book/dislike/{book}','AjaxController@book_dislike');


Route::get('get/activity/like/{activity}','AjaxController@activity_like');

Route::get('get/activity/dislike/{activity}','AjaxController@activity_dislike');


Route::get('get/post/like/{post}','AjaxController@post_like');

Route::get('get/post/dislike/{post}','AjaxController@post_dislike');


Route::get('/user_post/index','UserPostController@index');

Route::post('/user_post/create','UserPostController@store');

Route::get('/user_post/unapproved','UserPostController@unapproved');

Route::get('/user_post/show/{user_post}','UserPostController@show');

Route::post('/user_post/confirm/{user_post}','UserPostController@confirm');

Route::post('/user_post/destroy/{user_post}','UserPostController@destroy');