@extends('layouts.user.master')
@section('seo')
<title>Etkinlikler</title>

@endsection
@section('slider')



@endsection
@section('content')
<div class="blog-list-single  padd-right-30">
    @foreach($activities as $activity)
    <!-- blog-item Post -->
    <div class="blog-item">
        <div class="blog-post">
         
            <div class="blogpost-img">
                <a href="#"><img src="{{$activity->image_url}}" alt="activity"></a>
            </div>
            
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
                <p class="post-category"><a href="/collection/categories/{{$activity->category->url}}" title="Posts by category Travel">{{$activity->category->title}}</a></p>
                <h3 class="post-title"><a href="/{{$activity->type()}}/show/{{$activity->url}}">{{$activity->title}}</a></h3>
                <div class="post-meta">
                    <span><a href="/collection/user/{{$activity->user->url}}"><i class="fa fa-user"></i> {{$activity->user->name}}</a></span>

                    <span><a href="#"><i class="fa fa-clock-o"></i> {{$activity->approved_at->toFormattedDateString()}}</a></span>
                </div>
                <p>Malzemeler: {{$activity->material}}</p>
                <p>Yaş Grubu: {{$activity->age_begin}}-{{$activity->age_end}}</p>
                <p>Yapılışı:{!!$activity->body_medium!!}</p>
                <div class="read-more">
                    <a href="/{{$activity->type()}}/show/{{$activity->url}}" title="Read More">Devamı</a>
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
{{$activities->links()}}

@endsection