@extends('layouts.admin.master')

@section('content')

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Anasayfa</h3>
    </div>

  </div>
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          Anasayfa öğelerini belirleyin
        </div>
        <div class="x_content">
          <br />
          <form id="demo-form2" method="POST" action="/homepage/update/{{$homepage->id}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
            <img id="shown_img" style="max-height: 100px; max-width: 150px" class="col-md-offset-5 col-sm-offset-5 col-xs-offset-0" style="padding:30px;" src="{{$homepage->logo}}">
            {{csrf_field()}}     

            <div class="form-group"> 
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" id="selected_img" name="logo"  class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anasayfa Başlık:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="{{$homepage->title}}" placeholder="sekme kısmında görülecek başlığı buraya yazınız." name= "title" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Facebook:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="{{$homepage->facebook}}" placeholder="Facebook linkini buraya yazınız." name= "facebook" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Twitter:<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" placeholder="Twitter linkini buraya yazınız." value="{{$homepage->twitter}}" name= "twitter" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Instagram<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" placeholder="Instagram linkini buraya yazınız." value="{{$homepage->instagram}}" name= "instagram" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Video Link<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" value="{{$homepage->video_link}}" placeholder="Youtube linkini buraya yazınız." name= "video_link" required="required" class="form-control col-md-7 col-xs-12">
              </div>
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



