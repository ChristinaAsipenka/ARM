var address = {

	ajaxMethod: 'POST',
	
	selectDistrict: function(addressType, val){
		if (val == undefined){
		if($('#formRegion').val() > 0){
			console.log('fff');
			$("#formPage #formDistrict").prop('disabled', false);
		}else{	
			$("#formPage #formDistrict").prop('disabled', true);
		}
		}
	}	
}