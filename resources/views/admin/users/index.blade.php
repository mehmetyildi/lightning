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

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Tüm kullanıcılar </h2>
				<ul class="nav navbar-right panel_toolbox">
					
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<p class="text-muted font-13 m-b-30">
					Tüm kullanıcılar bu listede gösterilmiştir. Kullanıcıları silebilir ve ya admin yetkisi verebilirsiniz.
				</p>
				<table id="datatable" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Adı</th>
							<th>E-mail</th>
							<th>Makale Sayısı</th>
							<th>Beğeni sayısı</th>
							<th>Dislike Sayısı</th>
							
							<th></th>
						</tr>
					</thead>

					<?php $i=1; ?>
					

					<tbody>
						@foreach($users as $user)
						<tr>

							<td>{{$i}}</td>
							

							<td>{{$user->name}}</td>
							<td>{{$user->email}}</td>
							<td>
								Video:{{$user->videos()->count()}}<br>
								Makale:{{$user->posts()->count()}}<br>
								Kitap:{{$user->books()->count()}}<br>
								Etkinlik:{{$user->activities()->count()}}<br>


							</td>
							
							<td>
								Video:{{$user->videos()->sum('like')}}<br>
								Makale:{{$user->posts()->sum('like')}}<br>
								Kitap:{{$user->books()->sum('like')}}<br>
								Etkinlik:{{$user->activities()->sum('like')}}<br>


							</td>
							<td>
								Video:{{$user->videos()->sum('dislike')}}<br>
								Makale:{{$user->posts()->sum('dislike')}}<br>
								Kitap:{{$user->books()->sum('dislike')}}<br>
								Etkinlik:{{$user->activities()->sum('dislike')}}<br>

							</td>
							<td>
								<?php $j=0; ?>
								@foreach($user->roles as $role)
								@if($role->name=="admin"||$role->name=="superadmin")
								<?php $j++; ?>
								@endif
								@endforeach
								@if($j==0)
								<form method="POST" action="/user/upgrade/{{$user->id}}" accept-charset="UTF-8" style="display:inline">
									{{csrf_field()}}
									<button class="btn btn-xs btn-primary" type="button" data-toggle="modal" data-target="#confirm_upgrade" data-title="Kullanıcıyı Yükselt " data-message="{{$user->name}} adlı kullanıcıyı admin olarak görevlendirmeye emin misiniz? Bu görevlendirme sonrasında kullanıcı yeni makale girişi yapabilecektir.">
										<i class="glyphicon glyphicon-check"></i> Yükselt
									</button>
								</form>

								<form method="POST" action="/user/delete/{{$user->id}}" accept-charset="UTF-8" style="display:inline">
									{{csrf_field()}}
									<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Kullanıcıyı Sil" data-message="{{$user->name}} adlı kullanıcıyı kalıcı olarak silmek istediğinize emin misiniz?">
										<i class="glyphicon glyphicon-trash"></i> Sil
									</button>
								</form>
								@endif
								@if($j==1)
								<form method="POST" action="/user/downgrade/{{$user->id}}" accept-charset="UTF-8" style="display:inline">
									{{csrf_field()}}
									<button class="btn btn-xs btn-info" type="button" data-toggle="modal" data-target="#confirm_downgrade" data-title="Kullanıcıyı Düşür " data-message="{{$user->name}} adlı kullanıcıdan admin  yetkisini almaya emin misiniz? Bu işlem sonrasında kullanıcı yeni makale girişi yapamayacaktır.">
										<i class="glyphicon glyphicon-arrow-down"></i> Rütbe Düşür
									</button>
								</form>
								@endif
							</td>
							
						</tr>
						<?php $i++ ?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@include('layouts.confirm');
	@include('layouts.confirm_upgrade');
	@include('layouts.confirm_downgrade');


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
			$(document).ready(function() {

				
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

				$('#confirm_upgrade').on('show.bs.modal', function (e) {
					$message = $(e.relatedTarget).attr('data-message');
					$(this).find('.modal-body p').text($message);
					$title = $(e.relatedTarget).attr('data-title');
					$(this).find('.modal-title').text($title);

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});

				

				$('#confirm_upgrade').find('.modal-footer #confirm').on('click', function(){
					$(this).data('form').submit();
				});

				$('#confirm_downgrade').on('show.bs.modal', function (e) {
					$message = $(e.relatedTarget).attr('data-message');
					$(this).find('.modal-body p').text($message);
					$title = $(e.relatedTarget).attr('data-title');
					$(this).find('.modal-title').text($title);

      				// Pass form reference to modal for submission on yes/ok
      				var form = $(e.relatedTarget).closest('form');
      				$(this).find('.modal-footer #confirm').data('form', form);
      			});

				

				$('#confirm_downgrade').find('.modal-footer #confirm').on('click', function(){
					$(this).data('form').submit();
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