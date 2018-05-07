	
$(document).ready(function(){
	$('#categoryEkle').click(function(){

		$.ajax({
			url: "/create/categories",
			type: 'POST',
			data: {
				_token: $('meta[name="csrf-token"]').attr('content'),
				title: $('#category').val()
			},
			dataType: 'json',
			success: function(result){
				console.log("success");

			},
			error:function(error){
				console.log(error);
			}
		});
		$('#KategoriEklePlus').show();

		

		$(this).parent().fadeOut(500);


	});

	$('#category_id').click(function(){
		$.getJSON("/get/categories/",function(data){
			console.log("data");
			var $category=$('#category_id');
			$category.empty();
			$category.append('<option>Lütfen listeden seçiniz</option>');
			$.each(data,function(index,value){
				
				$category.append('<option value="'+index+'">'+value+'</option>');

			});
			$('#category').trigger("change");
		});
	})
});