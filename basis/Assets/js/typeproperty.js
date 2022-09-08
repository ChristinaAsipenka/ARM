var department = {

	ajaxMethod: 'POST',
	
	selectDepartment: function(){
		
		var formData = new FormData();
		   
		formData.append('idTypeProperty', $('#TypeProperty').val());
		
		$('#nameDepartment').val(0);

		
		$.ajax({
            url: '/ARM/basis/type_property/selectdepartment/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
                //console.log(result);
               $('#nameDepartment').html(result);
            }
        });
	}
	


}