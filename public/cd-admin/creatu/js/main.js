function readURL(input) {
        if (input.files && input.files.length > 0) {
            for (var i = 0 ; i < input.files.length; i++) {
                var reader = new FileReader();
                $('#imgViewer').empty();
                reader.onload = function (e) {
                    $('#imgViewer').attr('src', e.target.result);
                    $('#imgViewer').append($('<img>', { src: e.target.result, width: '200px', height: '200' }));
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
    $("#imageUploader").change(function () {
        readURL(this);
    });
    
	 function readURL(input) {
	        if (input.files && input.files.length > 0) {
	            for (var i = 0 ; i < input.files.length; i++) {
	                var reader = new FileReader();
	                $('#imgViewers').empty();
	                reader.onload = function (e) {
	                    $('#imgViewers').attr('src', e.target.result);
	                    $('#imgViewers').append($('<img>', { src: e.target.result, width: '200px', height: '200' }));
	                }
	                reader.readAsDataURL(input.files[i]);
	            }
	        }
	    }
	    $("#otherImage").change(function () {
	        readURL(this);
	    });   



function readUrl(input,id){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			$('#'+id).attr('src',e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}

}

// function readUrl(input,id){
// 	if(input.files){
// 		var filesAmount = input.files.length;
// 		for (i = 0; i < filesAmount; i++) {
// 		var reader = new FileReader();
// 		reader.onload = function(e){
// 			 $('#'+id).attr('src', e.target.result);
//                     }
// 		}
// 		reader.readAsDataURL(input.files[i]);
// 	}
// }


 


$("#is_parent").change(function(){
	var checked =  $('#is_parent').prop('checked');
	if(!checked){
		$('#sub_cat').removeClass('d-none');
	}else{
		$('#sub_cat').addClass('d-none');
	}
});

$('#category').change(function(){

	var cat_id = $(this).val();
	$.ajax({
		url:'/admin/child/'+cat_id,
		type:'get',
		success:function(child_data){
			if(typeof(child_data) != 'object'){
				child_data = $.parseJSON(child_data);

			}
			if(child_data.status){
				if(child_data.data != ""){
					$('#parent_cat_div').removeClass('col-md-12').addClass('col-md-6');
					$('#child_cat_div').removeClass('d-none');
					var html = '<option value="" disabled selected>--Select Any One--</option>';
					$.each(child_data.data,function(index, value){
						html += "<option value='"+value.id+"'>"+value.title+"</option>";

					});
					$('#sub_cat').html(html);

				}else{

					$('#parent_cat_div').removeClass('col-md-6').addClass('col-md-12');
					$('#child_cat_div').addClass('d-none');
					var html = '<option value="" disabled selected>--Select Any One--</option>';
					$('#sub_cat').html(html);
				}
			}
		}
	});

	

	
});

setTimeout(function(){
	$('.alert').slideUp()
},4000);


