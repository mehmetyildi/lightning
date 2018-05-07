$(document).ready(function(){


  ClassicEditor
  .create( document.querySelector( '#editor' ) )

  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );

  ClassicEditor
  .create( document.querySelector( '#editor2' ) )
  
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );
  ClassicEditor
  .create( document.querySelector( '#editor3' ) )
  
  .then( editor => {
    console.log( editor );
  } )
  .catch( error => {
    console.error( error );
  } );



  $  ('#KategoriEklePlus').hover(function(){
    $(this).css('color','green')
  },function(){
    $(this).css('color','')
  })

  $  ('#KategoriEklePlus').click(function(){
    $(this).hide();

    $('#category_div').fadeIn(500);
    $('html, body').animate({
      scrollTop: $("#category_div").offset().top
    }, 2000);
    $('#category_title').focus();
  })



  $  ('#TagEklePlus').hover(function(){
    $(this).css('color','green')
  },function(){
    $(this).css('color','')
  })

  $  ('#TagEklePlus').click(function(){
    $(this).hide();
    $('#tag_div').fadeIn(500);
    $('html, body').animate({
      scrollTop: $("#tag_div").offset().top
    }, 2000);
    $('#tag_title').focus();
  })

  $('.resim-goster input').change(function(event){

    var tempurl=URL.createObjectURL(event.target.files[0]);

    $(this).parent().parent().prev().attr('src',tempurl)
  })

  $('.resim-ekle i').hover(function(){
    $(this).css('color','green')
  },function(){
    $(this).css('color','')
  })
  .click(function(){
    $(this).parent().next().fadeIn(500);
  })

  $('#title').change(function(){
    $('#temp_title').val()=$(this).val();
  })




})