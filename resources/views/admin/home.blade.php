@extends('layouts.admin.master')
@section('style')
<link href="/gentelella-master/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<!-- <link href="/gentelella-master/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet"> -->
<!-- <link href="/gentelella-master/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet"> -->
<link href="/gentelella-master/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="/gentelella-master/vendors/dataTables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- <link href="/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<link href="/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet"> -->
	<link href="/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	<meta name="csrf-token" content="{{csrf_token()}}">
	@endsection
	@section('content')
	<div class="row tile_count">
		<?php 	$normaluser=0;
		$admin=0;
		?>
		@foreach($users as $user)
		@if($user->hasRole('admin')||$user->hasRole('superadmin'))

		<?php 	$admin++; ?>
		@else
		<?php 	$normaluser++; ?>
		@endif
		@endforeach


		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Admin Sayısı </span>
			<div class="count " >{{$admin}}</div>
			
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-user"></i> Kullanıcı Sayısı </span>
			<div class="count">{{$normaluser}}</div>
			
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-pencil"></i> Makale Sayısı </span>
			<div class="count">{{$posts->count()}}</div>
			<span class="count_bottom">Bu ay artış: %<i class="green"><i class="fa fa-sort-asc"></i>{{App\Post::percent_diff_from_last_month()}} </i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-youtube"></i> Video Sayısı </span>
			<div class="count ">{{$videos->count()}}</div>
			<span class="count_bottom">Bu ay artış: %<i class="green"><i class="fa fa-sort-asc"></i>{{App\Video::percent_diff_from_last_month()}} </i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-star"></i> Etkinlik Sayısı</span>
			<div class="count">{{$activities->count()}}</div>
			<span class="count_bottom">Bu ay artış: %<i class="green"><i class="fa fa-sort-asc"></i>{{App\Activity::percent_diff_from_last_month()}} </i></span>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
			<span class="count_top"><i class="fa fa-book"></i> Kitap Tanıtımı Sayısı</span>
			<div class="count">{{$books->count()}}</div>
			<span class="count_bottom">Bu ay artış: %<i class="green"><i class="fa fa-sort-asc"></i>{{App\Book::percent_diff_from_last_month()}} </i></span>
		</div>

	</div>

	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Yazar Tıklanma</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								<p>İlk 5</p>
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Yazar</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Tıklanma</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									@foreach($users as $user)
									@if($user->hasRole('admin'))
									<tr>
										<td>
											<p class="name1"><i class="fa fa-square blue"></i>{{$user->name}} </p>
										</td>
										<td class="percentage1" val="{{$user->hit_percentage()}}">{{$user->hit()}}</td>
									</tr>
									@endif
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Yazar Beğenme</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								<p>İlk 5</p>
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Yazar</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Beğeni</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									@foreach($users as $user)
									@if($user->hasRole('admin'))
									<tr>
										<td>
											<p class="name2"><i class="fa fa-square blue"></i>{{$user->name}} </p>
										</td>
										<td class="percentage2" val="{{$user->like_percentage()}}">{{$user->like()}}</td>
									</tr>
									@endif
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Yazar Dislike</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								<p>İlk 5</p>
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Yazar</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Dislike</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas3" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									@foreach($users as $user)
									@if($user->hasRole('admin'))
									<tr>
										<td>
											<p class="name3"><i class="fa fa-square blue"></i>{{$user->name}} </p>
										</td>
										<td class="percentage3" val="{{$user->dislike_percentage()}}">{{$user->dislike()}}</td>
									</tr>
									@endif
									@endforeach
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>



	</div>

		<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Makale Tıklanma</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Makale</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Tıklanma</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas4" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									
									<tr>
										<td>
											<p class="name4"><i class="fa fa-square blue"></i> Blog Makale </p>
										</td>
										<td class="percentage4" val="{{App\Post::hit_percentage()}}">{{App\Post::sum('hit')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name4"><i class="fa fa-square blue"></i>Video </p>
										</td>
										<td class="percentage4" val="{{App\Video::hit_percentage()}}">{{App\Video::sum('hit')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name4"><i class="fa fa-square blue"></i>Etkinlik </p>
										</td>
										<td class="percentage4" val="{{App\Activity::hit_percentage()}}">{{App\Activity::sum('hit')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name4"><i class="fa fa-square blue"></i>Kitap </p>
										</td>
										<td class="percentage4" val="{{App\Book::hit_percentage()}}">{{App\Book::sum('hit')}}</td>
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>


		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Makale Beğenme</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Makale</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Beğeni</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas5" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									
									<tr>
										<td>
											<p class="name5"><i class="fa fa-square blue"></i> Blog Makale </p>
										</td>
										<td class="percentage5" val="{{App\Post::like_percentage()}}">{{App\Post::sum('like')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name5"><i class="fa fa-square blue"></i>Video </p>
										</td>
										<td class="percentage5" val="{{App\Video::like_percentage()}}">{{App\Video::sum('like')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name5"><i class="fa fa-square blue"></i>Etkinlik </p>
										</td>
										<td class="percentage5" val="{{App\Activity::like_percentage()}}">{{App\Activity::sum('like')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name5"><i class="fa fa-square blue"></i>Kitap </p>
										</td>
										<td class="percentage5" val="{{App\Book::like_percentage()}}">{{App\Book::sum('like')}}</td>
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>




		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel tile fixed_height_320 overflow_hidden">
				<div class="x_title">
					<h2>Makale Dislike</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
						</li>

					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="" style="width:100%">
						<tr>
							<th align="center" style="width:50%;">
								
							</th>
							<th>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
									<p class="">Makale</p>
								</div>
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
									<p class="">Dislike</p>
								</div>
							</th>
						</tr>
						<tr>
							<td align="center">
								<canvas id="canvas6" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
							</td>
							<td>
								<table class="tile_info">
									
									<tr>
										<td>
											<p class="name6"><i class="fa fa-square blue"></i> Blog Makale </p>
										</td>
										<td class="percentage6" val="{{App\Post::dislike_percentage()}}">{{App\Post::sum('dislike')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name6"><i class="fa fa-square blue"></i>Video </p>
										</td>
										<td class="percentage6" val="{{App\Video::dislike_percentage()}}">{{App\Video::sum('dislike')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name6"><i class="fa fa-square blue"></i>Etkinlik </p>
										</td>
										<td class="percentage6" val="{{App\Activity::dislike_percentage()}}">{{App\Activity::sum('dislike')}}</td>
									</tr>
									<tr>
										<td>
											<p class="name6"><i class="fa fa-square blue"></i>Kitap </p>
										</td>
										<td class="percentage6" val="{{App\Book::dislike_percentage()}}">{{App\Book::sum('dislike')}}</td>
									</tr>
									
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>





	</div>




	@endsection

	@section('script')
	<script src="/gentelella-master/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="/gentelella-master/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<!-- <script src="/gentelella-master/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script> -->
	<!-- <script src="/gentelella-master/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script> -->
		<!-- <script src="/gentelella-master/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
		<script src="/gentelella-master/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
		<script src="/gentelella-master/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
		<script src="/gentelella-master/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> -->
		<!-- <script src="/gentelella-master/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> -->
		<!-- <script src="/gentelella-master/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script> -->
		<!-- <script src="/gentelella-master/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script> -->
		<script src="/gentelella-master/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
		<!-- <script src="/gentelella-master/vendors/jszip/dist/jszip.min.js"></script>
		<script src="/gentelella-master/vendors/pdfmake/build/pdfmake.min.js"></script>
		<script src="/gentelella-master/vendors/pdfmake/build/vfs_fonts.js"></script> -->
		<script src="/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>


		<script>
			

			$(document).ready(function(){
				var options = {
					legend: false,
					responsive: false
				};

				var label_array1=$('.name1').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string1=$('.percentage1').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array1=new Array;
				for(var i in per_array_string1){
					per_array1.push(+per_array_string1[i])
				}
				console.log(label_array1)
				console.log(per_array1)


				new Chart(document.getElementById("canvas1"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array1,
						datasets: [{
							data: per_array1,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});
				


				var label_array2=$('.name2').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string2=$('.percentage2').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array2=new Array;
				for(var i in per_array_string2){
					per_array2.push(+per_array_string2[i])
				}



				new Chart(document.getElementById("canvas2"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array2,
						datasets: [{
							data: per_array2,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});
				


				var label_array3=$('.name3').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string3=$('.percentage3').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array3=new Array;
				for(var i in per_array_string3){
					per_array3.push(+per_array_string3[i])
				}



				new Chart(document.getElementById("canvas3"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array3,
						datasets: [{
							data: per_array3,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});



				var label_array4=$('.name4').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string4=$('.percentage4').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array4=new Array;
				for(var i in per_array_string4){
					per_array4.push(+per_array_string4[i])
				}



				new Chart(document.getElementById("canvas4"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array4,
						datasets: [{
							data: per_array4,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});


				var label_array5=$('.name5').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string5=$('.percentage5').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array5=new Array;
				for(var i in per_array_string5){
					per_array5.push(+per_array_string5[i])
				}



				new Chart(document.getElementById("canvas5"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array5,
						datasets: [{
							data: per_array5,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});


				var label_array6=$('.name6').map(function(){
					return $.trim($(this).text());
				}).get();
				var per_array_string6=$('.percentage6').map(function(){
					return $.trim($(this).attr('val'));
				}).get();
				var per_array6=new Array;
				for(var i in per_array_string6){
					per_array6.push(+per_array_string6[i])
				}



				new Chart(document.getElementById("canvas6"), {
					type: 'doughnut',
					tooltipFillColor: "rgba(51, 51, 51, 0.55)",
					data: {
						labels: label_array6,
						datasets: [{
							data: per_array6,
							backgroundColor: [
							"#BDC3C7",
							"#9B59B6",
							"#E74C3C",
							"#26B99A",
							"#3498DB"
							],
							hoverBackgroundColor: [
							"#CFD4D8",
							"#B370CF",
							"#E95E4F",
							"#36CAAB",
							"#49A9EA"
							]
						}]
					},
					options: options
				});
				



				var handleDataTableButtons = function() {
					if ($("#datatable-buttons").length) {
						$("#datatable-buttons").DataTable({
							dom: "Bfrtip",
							buttons: [
							{
								extend: "copy",
								className: "btn-sm"
							},
							{
								extend: "csv",
								className: "btn-sm"
							},
							{
								extend: "excel",
								className: "btn-sm"
							},
							{
								extend: "pdfHtml5",
								className: "btn-sm"
							},
							{
								extend: "print",
								className: "btn-sm"
							},
							],
							responsive: true
						});
					}
				};

				TableManageButtons = function() {
					"use strict";
					return {
						init: function() {
							handleDataTableButtons();
						}
					};
				}();

				$('#datatable').dataTable();

				$('#datatable-keytable').DataTable({
					keys: true
				});

				$('#datatable-responsive').DataTable();

				$('#datatable-scroller').DataTable({
					ajax: "js/datatables/json/scroller-demo.json",
					deferRender: true,
					scrollY: 380,
					scrollCollapse: true,
					scroller: true
				});

				$('#datatable-fixed-header').DataTable({
					fixedHeader: true
				});

				var $datatable = $('#datatable-checkbox');

				$datatable.dataTable({
					'order': [[ 1, 'asc' ]],
					'columnDefs': [
					{ orderable: false, targets: [0] }
					]
				});
				$datatable.on('draw.dt', function() {
					$('input').iCheck({
						checkboxClass: 'icheckbox_flat-green'
					});
				});

				TableManageButtons.init();



			});
		</script>

		@endsection