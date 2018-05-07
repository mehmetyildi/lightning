@extends('layouts.user.master')
@section('seo')
<title>{{$post->title}}</title>
<meta property="og:title" content="{{$post->title}}" />
<meta property="og:type" content="image.post" />
<meta property="og:url" content="http://localhost:8000/{{$post->type()}}/show/{{$post->url}}" />
<meta property="og:image" content="{{$post->image_url}}" />



<link rel="stylesheet" type="text/css" href="/jssocials-1.4.0/dist/jssocials.css" />
<link rel="stylesheet" type="text/css" href="/jssocials-1.4.0/dist/jssocials-theme-flat.css" />
@endsection


@section('content')

<div class="post-detail  padd-right-30">
	<div class="postdetail-img">
		<a href="#"><img src="{{$post->image_url}}" alt="Post"></a>
	</div>
	<div class="post-share">
		<div class="social-share col-md-12">
			<div class="col-md-2 col-xs-4 ">
				<a class="post-like like"><i class="fa fa-2x fa-thumbs-up "></i></a><p>{{$post->like}}</p>
			</div>
			<div class="col-md-2 col-xs-4">
				<a class="post-dislike dislike" ><i class="fa fa-2x fa-thumbs-down "></i></a><p>{{$post->dislike}}</p>
			</div>
			<div class="col-md-2 col-xs-4">
				<i class="fa fa-2x fa-desktop "></i><p>{{$post->hit}}</p>
			</div>
		</div>
		
	</div>
	<div class="postdtl-info">
		<p class="post-category"><a href="/collection/categories/{{$post->category->url}}">{{$post->category->title}}</a></p>
		<h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
		<div class="post-meta">
			<span><a href="/collection/user/{{$post->user->id}}"><i class="fa fa-user"></i> {{$post->user->name}}</a></span>
			<span><a href="#"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</a></span>
		</div>
		{!!$post->body!!}
		<div>
			<i class="fa fa-thumbs-up"></i>
		</div>

	</div>
	<div id="share"></div>
<!-- 	<div class="comment-box">
		<div class="title">
			<h2>About Author</h2>
		</div>
		<div class="single-comment-box">
			<div class="img-box">
				<div class="inner-box">
					<img src="images/post/author1.png" alt="">
				</div>
			</div>
			<div class="content-box">
				<h3>Mr. Cole Martin </h3>
				<div class="meta-box clearfix">
					<span class="pull-left">24 Feb, 2017 at 2:40pm</span>
					<a href="#" class="reply pull-right">Reply</a>
				</div>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lore Ipsum has been the eloi industry's standard dummy text ever since the 1500s,</p>
			</div>
		</div>
	</div> -->
	@if(sizeof($post->images))
	<div class="title">
		<h2>Bu makaleye ait diğer resimler</h2>
	</div>

	<div class="related_blogs rlpost-sidebar">
		
		@foreach($post->images as $image)
		<!-- blog-item Post -->
		
		<div class="blog-item">
			<div class="blog-post">
				<div class="blogpost-img">
					<img src="{{$image->image_url}}" style="width: 400px;height: 239px;" alt="Post">
				</div>
				

				<!-- <div class="blogpost-info">
					<p class="post-category"><a href="#" title="Posts by category Travel">Lifestyle</a></p>
					<h3 class="post-title"><a href="#">Life is a one time offer</a></h3>
					<div class="post-meta">
						<span><a href="#"><i class="fa fa-user"></i> By Sojib Rahman</a></span>
						<span><a href="#"><i class="fa fa-clock-o"></i> March 20, 2017</a></span>
					</div>
				</div> -->
			</div>
		</div>
		<!-- blog-item Post end -->
		
		@endforeach
		

	</div>
	@endif

	<div class="comment-box">
		<div class="title">
			@if(count($post->comments))
			<h2>Bu makale hakkında {{count($post->comments) }} yorum yapılmış.</h2>
			@else
			<h2>Bu makale hakkında henüz yorum yapılmamış. İlk yorumu yapan siz olun</h2>
			@endif
		</div>

		@if(is_array($post->comments)||is_object($post->comments))
		@foreach($post->comments as $comment)
		<div class="single-comment-box">
			<!-- <div class="img-box">
				<div class="inner-box">
					<img src="images/post/author1.png" alt="">
				</div>
			</div> -->
			<div class="content-box">
				<h3>{{$comment->user->name}}</h3>
				<div class="meta-box clearfix">
					<span class="pull-left">{{$comment->created_at->diffForHumans()}}</span>
					<a class="reply pull-right">Cevapla</a>
				</div>
				<p>
					@if($comment->reason_for_inactivation)
					<p style="font-style: italic;">{{$comment->reason_for_inactivation}}</p>
					@else
					{{$comment->body}}
					@if($comment->inapropriate_flag==1)
					<p>Bu içerik uygunsuz olarak işeretlenmiş.</p>
					@else
					<form method="POST" action="/comment/report/{{$comment->id}}" accept-charset="UTF-8" style="display:inline">
						{{csrf_field()}}
						<div hidden="true">
							<input class="form-control" id="reason_for_inapropriate_flag"  required="required" name="reason_for_inapropriate_flag"/>


						</div>
						<a data-toggle="modal" data-target="#revise_post" data-title="Uygunsuz İçerik" data-message=" ">
							Uygunsuz İçerik&nbsp<i class="fa fa-flag"></i>
						</a>

					</form>
					@endif
					@endif
				</p>
			</div>
			@guest
			<div hidden="true" class="related_comment">
				Yorum yapmak için <a href="/login">giriş</a> yapınız
			</div>
			@else
			<form hidden="true" action="/comment/{{$comment->id}}/related_comments" method="POST" class=" contact-form row related_comment" id="contact-page-contact-form" novalidate="novalidate">
				{{csrf_field()}}
				<input hidden="true" type="text" name="user_id" value="{{auth()->user()->id}}">

				<input hidden="true" type="text" name="post_id" value="{{$post->id}}">
				<div class="col-md-12">
					<textarea name="body" class="col-md-12" placeholder="Message" cols="30" rows="10"></textarea>
				</div>
				<div class="col-md-12 text-center">
					<button class="btn-two" type="submit">Cevap yaz</button>
				</div>
			</form>
			@endguest
		</div>

		@if(is_array($comment->related_comments)||is_object($comment->related_comments))
		@foreach($comment->related_comments as $related)
		
		<div class="single-comment-box reply-comment">
			<!-- <div class="img-box">
				<div class="inner-box">
					<img src="images/post/author1.png" alt="">
				</div>
			</div> -->
			<div class="content-box">
				<h3>{{$related->user->name}}</h3>
				<div class="meta-box clearfix">
					<span class="pull-left">{{$related->created_at->diffForHumans()}}</span>

				</div>
				<p>
					@if($related->reason_for_inactivation)
					<p style="font-style: italic;">{{$related->reason_for_inactivation}}</p>
					@else
					{{$related->body}}
					@if($related->inapropriate_flag==1)
					<p>Bu içerik uygunsuz olarak işeretlenmiş.</p>
					@else
					<form method="POST" action="/related_comment/report/{{$related->id}}" accept-charset="UTF-8" style="display:inline">
						{{csrf_field()}}
						<div hidden="true">
							<input class="form-control" id="reason_for_inapropriate_flag_related"  required="required" name="reason_for_inapropriate_flag"/>


						</div>
						<a data-toggle="modal" data-target="#revise_post" data-title="Uygunsuz İçerik" data-message=" ">
							Uygunsuz İçerik&nbsp<i class="fa fa-flag"></i>
						</a>

					</form>
					
					@endif
					@endif
				</p>
			</div>
		</div> 
		@endforeach	 
		@endif
		@endforeach
		@endif
	</div>

	@guest
	Yorum yapmak için <a href="/login">giriş</a> yapınız
	@else

	<div class="comment-form contact-content">
		<div class="title">
			<h2>Yorum Bırakın</h2>
		</div>
		<form action="/post/{{$post->id}}/comments" method="POST" class="contact-form row" id="contact-page-contact-form" novalidate="novalidate">
			{{csrf_field()}}
			<input hidden="true" type="text" name="user_id" value="{{auth()->user()->id}}">
			<div class="col-md-12">
				<textarea name="body" placeholder="Message" cols="30" rows="10"></textarea>
			</div>
			<div class="col-md-12 text-center">
				<button class="btn-two" type="submit">Yorum yaz</button>
			</div>
		</form>
	</div>
	@endguest
</div>

@include('layouts.revise_post')

@endsection

@section('script')
<script src="/js/like-dislike.js"></script>

<script src="/jssocials-1.4.0/dist/jssocials.min.js"></script>
<script>
	$("#share").jsSocials({
		shares: [ "twitter", "facebook", "googleplus", "linkedin", "pinterest"]
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.post-like').one('click',function(){
			
			$.getJSON("/get/post/like/{{$post->id}}",function(data){
				
				var $like=$('.like').next();
				$like.text(data);

			});
			$(this).attr('disabled','disabled')
			
		})


		$('.post-dislike').one('click',function(){
			
			$.getJSON("/get/post/dislike/{{$post->id}}",function(data){
				
				var $dislike=$('.dislike').next();
				$dislike.text(data);

			});
			$(this).attr('disabled','disabled')
			
		})

		$('#revise_post').on('show.bs.modal', function (e) {
			$message = $(e.relatedTarget).attr('data-message');
			$(this).find('.modal-body p').text($message);
			$title = $(e.relatedTarget).attr('data-title');
			$(this).find('.modal-title').text($title);
			$(this).find('.btn-danger').text("İşaretle");
			$(this).find('.form-control').focus();

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});
		$('#revise_post').find('.form-control').change(function(){
			$('#reason_for_inapropriate_flag').val($(this).val());
			$('#reason_for_inapropriate_flag_related').val($(this).val());
		})
		<!-- Form confirm (yes/ok) handler, submits form -->
		$('#revise_post').find('.modal-footer #confirm').on('click', function(){
			$(this).data('form').submit();
		});
	})
</script>

@endsection