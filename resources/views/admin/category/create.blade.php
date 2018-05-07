@extends('layouts.admin.master')

@section('content')

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Kategori Yarat</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title"></div>

        <div class="x_content">
          <br />
          <form id="demo-form2" method="POST" action="/category/store" data-parsley-validate class="form-horizontal form-label-left">
            {{csrf_field()}}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori adı:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name= "title" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Ekle</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection


