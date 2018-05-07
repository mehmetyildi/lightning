@extends('layouts.user.master')

@section('seo')
<title>Videolar</title>

@endsection
@section('slider')




@endsection
@section('content')
<div class="blog-list-single  padd-right-30">
    @foreach($videos as $video)
    <!-- blog-item Post -->
    <div class="blog-item">
        <div class="blog-post">
            @if($video->type()=='video')
            <div class="postdetail-img">
                {!!$video->video_link!!}
            </div>

            @else
            <div class="blogpost-img">
                <a href="#"><img src="{{$video->image_url}}" alt="video"></a>
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
                <p class="post-category"><a href="/collection/categories/{{$video->category->url}}" title="Posts by category Travel">{{$video->category->title}}</a></p>
                <h3 class="post-title"><a href="/{{$video->type()}}/show/{{$video->url}}">{{$video->title}}</a></h3>
                <div class="post-meta">
                    <span><a href="/collection/user/{{$video->user->url}}"><i class="fa fa-user"></i> {{$video->user->name}}</a></span>
                    <span><a href="#"><i class="fa fa-clock-o"></i> {{$video->approved_at->toFormattedDateString()}}</a></span>
                </div>
                <p>{!!$video->body_medium!!}</p>
                <div class="read-more">
                    <a href="/{{$video->type()}}/show/{{$video->url}}" title="Read More">Devamı</a>
                </div>
            </div>
        </div>
    </div>
    <!-- blog-item video end -->
    @endforeach


</div>
<!-- <ul class="pagination">
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
</ul> -->
{{$videos->links()}}

@endsection