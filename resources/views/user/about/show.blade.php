@extends('layouts.user.master')

@section('seo')
<title>Hakkımızda</title>
<meta property="og:title" content="Hakkımızda" />

@endsection

@section('content')

<div class="aboutme-page">
	<div class="row">
		<div class="col-sm-5">
			<div class="left-side">
				<img src="{{$about->image_url}}" alt="image">
			</div>
		</div>
		<div class="col-sm-7">
			<div class="right-side">
				<h1>{{$about->title}}</h1>
				{!!$about->body!!}
				<img class="signature" src="/creative_template/images/resource/signature.png" alt="image" />
			</div>
		</div>
	</div>

</div>


@endsection