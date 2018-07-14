@extends('layouts.user.master')

@section('seo')
<title>Sizden Gelenler</title>

@endsection
@section('slider')




@endsection
@section('content')
<div class="comment-box">
    <div class="single-comment-box">
        <div class="content-box">
            @guest
            <div class="related_comment">
                Yazı yazmak için lütfen <a href="/login">giriş</a> yapınız
            </div>
            @else
            <div class="related_comment" id="openCommentBox">
                <a>Yazı yazmak için tıklayınız.</a>
            </div>
            <form id="commentBox" action="/user_post/create" method="POST" class=" contact-form row related_comment" hidden="hidden" id="contact-page-contact-form" novalidate="novalidate">
                {{csrf_field()}}
                <input hidden="true" type="text" name="user_id" value="{{auth()->user()->id}}">
                <div class="col-md-6">
                    <input type="text" name="title" class="col-md-12" placeholder="Başlık" cols="30" rows="10"></input>
                    <hr>
                </div>

                <div class="col-md-12">
                    <textarea name="body" class="col-md-12" placeholder="Yazınız.." cols="30" rows="3"></textarea>
                </div>
                <div class="col-md-12 text-center">
                    <button class="btn-two" type="submit">Gönder</button>
                </div>
            </form>
            @endguest
        </div>
    </div>
</div>
<div class="blog-list-view  padd-right-30">
    @if($posts)
    @foreach($posts as $post)
    <!-- blog-item Post -->
    <div class="blog-item">
        <div class="blog-post row">
           
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
                
                
                <div class="post-meta">
                    <span><i class="fa fa-user"></i> {{$post->user->name}}</span>
                    <span><a href="#"><i class="fa fa-clock-o"></i> {{$post->approved_at}}</a></span>
                </div>
                <h3 class="post-title">{{$post->title}}</h3>
                <p>{!!$post->body!!}</p>
                
            </div>
        </div>
    </div>
    <!-- blog-item video end -->
    @endforeach
    @endif


</div>
<!-- <ul class="pagination">
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
</ul> -->
<!--  -->

@endsection

@section('script')

<script>
    $(document).ready(function(){
        $('#openCommentBox').click(function(){
            $(this).hide();
            $('#commentBox').show();
        })
    })
</script>

@endsection