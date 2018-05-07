<!DOCTYPE html>
<html lang="en">
@include('layouts.user.header')



<!--Main Slider-->
@yield('slider')
<!--Main Slider  end-->

<!--page contents-->
<section class="contents">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-9">
				@yield('content')
			</div>
			<div class="col-sm-12 col-md-3">
				@include('layouts.user.sidebar')
			</div>
		</div>
	</div>

</section>
<!--page contents end  -->

<!--insta-full-gallery  -->
@include('layouts.user.footer')