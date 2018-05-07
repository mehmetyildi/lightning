@extends('layouts.admin.master')
@section('style')
<!-- Bootstrap -->

<!-- Select2 -->
<link href="/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<!-- Switchery -->
<link href="/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<!-- starrr -->
<style type="text/css">
.ck-editor__editable{
  min-height: 100px;
}
</style>


@endsection
@section('content')

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Etkinlik Güncelle</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" method="POST" action="/activity/update/{{$activity->id}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            {{csrf_field()}}

            <img id="shown_img" style="max-height: 100px; max-width: 150px" class="col-md-offset-5 col-sm-offset-5 col-xs-offset-0" style="padding:30px;" src="{{$activity->image_url}}">
            <div class="form-group resim-goster resim-ekle" > 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="ana_resim" placeholder="icerik resmini giriniz..." name="image_url" class="form-control col-md-7 col-xs-12">
              </div>
              @if(count($activity->images)==0)
              <i id="ResimEklePlus" data-toggle="tooltip" data-placement="right" title="Resim Ekle" class="fa fa-2x fa-plus-circle "></i>
              @endif
            </div>
            <?php $i=0; ?>
            @if(count($activity->images)>0)
            @foreach($activity->images as $image)

            <img id="shown_img" style="max-height: 100px; max-width: 150px" class="col-md-offset-5 col-sm-offset-5 col-xs-offset-0" style="padding:30px;" src="{{$image->image_url}}">
            
            <div class="form-group resim-goster resim-ekle"> 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="selected_img"  name="image_url{{$i}}" class="form-control col-md-7 col-xs-12">
              </div>
              @if($i==count($activity->images)-1)

              <i id="ResimEklePlus" data-toggle="tooltip" data-placement="right" title="Resim Ekle" class="fa fa-2x fa-plus-circle"></i>

              @endif
            </div>
            <?php $i++; ?>
            @endforeach
            @endif
            @for($j=count($activity->images);$j<10;$j++)
            <div hidden="true" class="form-group resim-ekle"> 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">{{$j}}.Resim Seç <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" name="image_url{{$j}}" class="form-control col-md-7 col-xs-12">
              </div>
              <i id="ResimEklePlus" data-toggle="tooltip" data-placement="right" title="Resim Ekle" class="fa fa-2x fa-plus-circle"></i>
            </div>
            @endfor


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori Adı</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select name="category_id" id="category_id" class="form-control">
                  @foreach($categories as $category)
                  <option @if($activity->id==$category->id) selected="selected" @endif value="{{$category->id}}">{{$category->title}}</option>
                  @endforeach
                </select>
              </div>
              <i id="KategoriEklePlus" data-toggle="tooltip" data-placement="right" title="Kategori Ekle" class="fa fa-2x fa-plus-circle"></i>
            </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Etkinlik adı:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="{{$activity->title}}" name= "title" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>





            <div  class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">İçerik metni:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea  name="body" id="editor">
                  <p>{{$activity->body}}</p>
                </textarea>

              </div>
            </div>

            <div  class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">İçerik Orta:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea  name="body_medium" id="editor2">
                  <p>{{$activity->body_medium}}</p>
                </textarea>

              </div>
            </div>

            <div  class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">İçerik Kısa:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea  name="body_small"  id="editor3">
                  <p>{{$activity->body_small}}</p>
                </textarea>

              </div>
            </div>


            <div  class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Gerekli malzemeler:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="text" id="first-name" name= "material" value="{{$activity->material}}" required="required" class="form-control col-md-7 col-xs-12">

             </div>
           </div>

           <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yaş grubu:<span class="required">*</span>
            </label>
            <div class="col-md-2 col-sm-3 col-xs-6">
              <input type="text" id="first-name" value="{{$activity->age_begin}}" name= "age_begin" required="required" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1">
              ile
            </div>

            <div class="col-md-2 col-sm-3 col-xs-6">
              <input type="text" id="first-name" value="{{$activity->age_end}}" name= "age_end" required="required" class="form-control col-md-7 col-xs-12">
            </div>

            <div class="col-md-1 col-sm-1 col-xs-1">
              arası
            </div>

          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Türü:</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="activitytype_id" id="category_id" class="form-control">
                @foreach($types as $type)
                <option @if($activity->activitytype_id==$type->id) selected="selected" @endif value="{{$type->id}}">{{$type->type_name}}</option>
                @endforeach
              </select>
            </div>
            <!-- <i id="KategoriEklePlus" data-toggle="tooltip" data-placement="right" title="Kategori Ekle" class="fa fa-2x fa-plus-circle"></i> -->
          </div>
          @if(auth()->user()->hasRole('superadmin'))
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Yayımla:</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              @if($activity->publish==1)


              <div class="">
                <div class="">
                  <label>
                    <input type="checkbox" id="publish" name="publish" value="1" class="js-switch"  checked  /> 
                  </label>
                </div>

              </div>
              @else

              <div class="">
                <div class="">
                  <label>
                    <input type="checkbox" id="publish" name="publish" class="js-switch" value="0"  /> 
                  </label>
                </div>

              </div>
              @endif

            </div>
          </div>
          @endif
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Etiketler</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="tags[]" class="select2_multiple form-control" multiple="multiple">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}" 
                  @foreach($activity->tags as $pt)
                  @if($pt->id==$tag->id)
                  selected="selected"
                  @endif
                  @endforeach
                  >{{$tag->name}}</option>
                  @endforeach
                </select>
              </div>
              <i id="TagEklePlus" data-toggle="tooltip" data-placement="right" title="Etiket Ekle" class="fa fa-2x fa-plus-circle"></i>
            </div>



            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Güncelle</button>
              </div>
            </div>
            @include('layouts.errors')
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div id="category_div" hidden="true" class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div  class="x_panel">
        <div class="x_title">
        </div>
        <div class="x_content">
          <br />
          <form   method="POST" action="/category/store" data-parsley-validate class="form-horizontal form-label-left">
            {{csrf_field()}}
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori adı:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="category_title" name= "title" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" class="btn btn-success">Ekle</button>
              </div>
            </div>
            @include('layouts.errors')
          </form>
        </div>
      </div>
    </div>
  </div>
  <div id="tag_div" hidden="true" class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div   class="x_panel">
        <div class="x_title">

          <div class="x_content">
            <br />
            <form id="demo-form2" method="POST" action="/tags/store" data-parsley-validate class="form-horizontal form-label-left">
              {{csrf_field()}}
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tag adı:<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="tag_title" name= "name" required="required" class="form-control col-md-7 col-xs-12">
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
</div>






@endsection

@section('script')



<!-- bootstrap-wysiwyg -->

<script src="/js/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="/js/app.js"></script>
<script src="/js/custom_ajax.js"></script>
<script src="/gentelella-master/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="/gentelella-master/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/gentelella-master/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<!-- <script src="/gentelella-master/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script> -->
<!-- Switchery -->
<script src="/gentelella-master/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="/gentelella-master/vendors/select2/dist/js/select2.full.min.js"></script>


<script>
  $(document).ready(function() {



    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
      'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
      'Times New Roman', 'Verdana'
      ],
      fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function(idx, fontName) {
        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
      });
      $('a[title]').tooltip({
        container: 'body'
      });
      $('.dropdown-menu input').click(function() {
        return false;
      })
      .change(function() {
        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
      })
      .keydown('esc', function() {
        this.value = '';
        $(this).change();
      });

      $('[data-role=magic-overlay]').each(function() {
        var overlay = $(this),
        target = $(overlay.data('target'));
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });

      if ("onwebkitspeechchange" in document.createElement("input")) {
        var editorOffset = $('#editor').offset();

        $('.voiceBtn').css('position', 'absolute').offset({
          top: editorOffset.top,
          left: editorOffset.left + $('#editor').innerWidth() - 35
        });
      } else {
        $('.voiceBtn').hide();
      }
    }

    function showErrorAlert(reason, detail) {
      var msg = '';
      if (reason === 'unsupported-file-type') {
        msg = "Unsupported format " + detail;
      } else {
        console.log("error uploading file", reason, detail);
      }
      $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
    }

    initToolbarBootstrapBindings();

    $('#editor').wysiwyg({
      fileUploadError: showErrorAlert
    });

    window.prettyPrint;
    prettyPrint();
  });
</script>
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "Select a state",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 10,
      placeholder: "10 etikete kadar seçebilirsiniz.",
      allowClear: true
    });
  });
</script>

@endsection  



