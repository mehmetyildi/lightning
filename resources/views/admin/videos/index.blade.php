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
			<h2>Blog videolar </h2>
			<ul class="nav navbar-right panel_toolbox">
				<a type="button" class="btn btn-primary" href="/video/create">Yeni Ekle</a>
				<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				</li>
				
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<p class="text-muted font-13 m-b-30">
				Tüm blog videolar bu listede en yeniden en eskiye doğru sıralı olarak gösterilmiştir. videolar arasında arama yapabilir, değişiklik ya da silme işlemi uygulayabilirsiniz.
			</p>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Resim</th>
						<th>video Adı</th>
						<th>Yazar</th>
						<th>Yayında mı</th>
						<th>Yayın tarihi</th>
						<th>Etiketler</th>
						<th></th>
					</tr>
				</thead>

				<?php $i=1; ?>
				

				<tbody>
					@foreach($videos as $video)
					<tr>

						<td>{{$i}}</td>
						<td><img style="max-height: 100px; max-width: 150px" src="{{$video->image_url}}"></td>
								
						<td>{{$video->title}}</td>
						<td>{{$video->user->name}}</td>
						
							<td>@if($video->publish==1)
							

								<div class="">
									<div class="">
										<label>
											<input type="checkbox" id="publish" disabled="disabled" name="publish" class="js-switch"  checked /> 
										</label>
									</div>

								</div>
								@else
								
									<div class="">
										<div class="">
											<label>
												<input type="checkbox" id="publish" disabled="disabled" name="publish" class="js-switch" value="0"  /> 
											</label>
										</div>

									</div>
									@endif
									
								</td>
								
								<td>{{$video->created_at}}</td>
								<td>@if(count($video->tags))
										@foreach($video->tags as $tag)
											{{$tag->name}}
										@endforeach
									@endif
								</td>
								

								<td>
									<a href="/video/edit/{{$video->id}}"><button class="btn btn-xs btn-info"> <i class="glyphicon glyphicon-book"></i>Düzenle</button></a>
								<form method="video" action="/video/delete/{{$video->id}}" accept-charset="UTF-8" style="display:inline">
									{{csrf_field()}}
									<button class="btn btn-xs btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" data-title="Makaleyi Sil" data-message="{{$video->title}} adlı makaleyi kalıcı olarak silmek istediğinize emin misiniz?">
										<i class="glyphicon glyphicon-trash"></i> Sil
									</button>
								</form>
								</td>
								<?php $i++ ?>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
@include('layouts.confirm')

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