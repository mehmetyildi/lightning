@extends('layouts.user.master')
@section('seo')
<title>Makaleler</title>
@endsection

@section('slider')



@endsection
@section('content')
<div class="blog-list-single  padd-right-30">
    @foreach($posts as $post)
    <!-- blog-item Post -->
    <div class="blog-item">
        <div class="blog-post">
            @if($post->type()=='video')
            <div class="postdetail-img">
                {!!$post->video_link!!}
            </div>

            @else
            <div class="blogpost-img">
                <a href="#"><img src="{{$post->image_url}}" alt="Post"></a>
            </div>
            @endif
           <!--  <div class="post-share">
                <div class="social-share">
                    <span class="title-share">Share:</span>
                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                </div>
                <div class="coment-share">
                    <a href="#"><i class="fa fa-comment"></i> 3</a>
                </div>
            </div> -->
            <div class="blogpost-info">
                <p class="post-category"><a href="/collection/categories/{{$post->category->url}}" title="Posts by category Travel">{{$post->category->title}}</a></p>
                <h3 class="post-title"><a href="/{{$post->type()}}/show/{{$post->url}}">{{$post->title}}</a></h3>
                <div class="post-meta">
                    <span><a href="/collection/user/{{$post->user->url}}"><i class="fa fa-user"></i> {{$post->user->name}}</a></span>
                    <span><a href="#"><i class="fa fa-clock-o"></i> {{$post->created_at->toFormattedDateString()}}</a></span>
                </div>
                <p>{!!substr($post->body,0,250)!!}</p>
                <div class="read-more">
                    <a href="/{{$post->type()}}/show/{{$post->url}}" title="Read More">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-item Post end -->
    @endforeach


</div>
<!-- <ul class="pagination">
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
</ul> -->
{{$posts->links()}}

@endsection