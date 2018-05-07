$(document).ready(function(){
  $('.like').hover(function(){
    $(this).css('color','green');
  },function(){
    $(this).css('color','')
  })


  $('.dislike').hover(function(){
    $(this).css('color','red');
  },function(){
    $(this).css('color','')
  })
})