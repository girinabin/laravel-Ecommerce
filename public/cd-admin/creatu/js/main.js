function readUrl(input,id){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			$('#'+id).attr('src',e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}

}

$("#is_parent").change(function(){
	var checked =  $('#is_parent').prop('checked');
	if(!checked){
		$('#sub_cat').removeClass('d-none');
	}else{
		$('#sub_cat').addClass('d-none');
	}
});

setTimeout(function(){
	$('.alert').slideUp()
},4000);

