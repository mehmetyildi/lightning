@extends('layouts.user.master')


@section('content')

<div class="post-detail  padd-right-30">
	<div class="postdetail-img">
		<a href="#"><img src="{{$post->image_url}}" alt="post"></a>
	</div>
<!-- 	<div class="post-share">
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
	<div class="postdtl-info">
		<p class="post-category"><a href="/posts/categories/{{$post->category->id}}">{{$post->category->title}}</a></p>
		<h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
		<div class="post-meta">
			<span><a href="/posts/user/{{$post->user->id}}"><i class="fa fa-user"></i> {{$post->user->name}}</a></span>
			<span><a href="#"><i class="fa fa-clock-o"></i> {{$post->created_at->diffForHumans()}}</a></span>
		</div>
		
		<p>{!!$post->body!!}</p>

	</div>
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
	
	

	<form method="POST" action="/post/confirm/{{$post->id}}" accept-charset="UTF-8" style="display:inline">
		{{csrf_field()}}
		<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirm_post" data-title="Makaleyi Yayımla" data-message="{{$post->title}} adlı makaleyi yayımlamak istediğinize emin misiniz?">
			Onayla&nbsp<i class="fa fa-thumbs-up"></i>
		</button>
	</form>

	<form method="POST" action="/post/revise/{{$post->id}}" accept-charset="UTF-8" style="display:inline">
		{{csrf_field()}}
		<div hidden="true">
			<input class="form-control" id="reason_for_revise"  required="required" name="reason_for_revise"></input>
		</div>
		<button class="btn btn-info" type="button" data-toggle="modal" data-target="#revise_post" data-title="Makaleyi Revizeye Gönder" data-message=" ">
			Revize&nbsp<i class="fa fa-hand-point-left"></i>
		</button>
	</form>

	<form method="POST" action="/post/destroy/{{$post->id}}" accept-charset="UTF-8" style="display:inline">
		{{csrf_field()}}
		<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Makaleyi Sil" data-message="{{$post->title}} adlı makaleyi kalıcı olarak silmek istediğinize emin misiniz?">
			Sil&nbsp<i class="fa fa-trash"></i>
		</button>
	</form>

	

</div>
@include('layouts.confirm_post')
@include('layouts.revise_post')
@include('layouts.confirm')

@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#confirm_post').on('show.bs.modal', function (e) {
			$message = $(e.relatedTarget).attr('data-message');
			$(this).find('.modal-body p').text($message);
			$title = $(e.relatedTarget).attr('data-title');
			$(this).find('.modal-title').text($title);

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});
		<!-- Form confirm (yes/ok) handler, submits form -->
		$('#confirm_post').find('.modal-footer #confirm').on('click', function(){
			$(this).data('form').submit();
		});

		$('#confirmDelete').on('show.bs.modal', function (e) {
			$message = $(e.relatedTarget).attr('data-message');
			$(this).find('.modal-body p').text($message);
			$title = $(e.relatedTarget).attr('data-title');
			$(this).find('.modal-title').text($title);

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});
		<!-- Form confirm (yes/ok) handler, submits form -->
		$('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
			$(this).data('form').submit();
		});

		$('#revise_post').on('show.bs.modal', function (e) {
			$message = $(e.relatedTarget).attr('data-message');
			$(this).find('.modal-body p').text($message);
			$title = $(e.relatedTarget).attr('data-title');
			$(this).find('.modal-title').text($title);
			$(this).find('.form-control').focus();

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});
		$('#revise_post').find('.form-control').change(function(){
			$('#reason_for_revise').val($(this).val());
		})

		<!-- Form confirm (yes/ok) handler, submits form -->
		$('#revise_post').find('.modal-footer #confirm').on('click', function(){
			$(this).data('form').submit();
		});

		
	});
</script>
@endsection