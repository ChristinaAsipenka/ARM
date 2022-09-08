var report = {
	ajaxMethod: 'POST',
	
	subjectFilter: function(){
		event.preventDefault();
		
		var formData = new FormData();
		formData.append('id_user', $('#fs_fio').val());
		formData.append('spr_otdel', $('#fs_otdel').val());
		formData.append('spr_cod_podrazd', $('#fs_podrazdelenie').val());
		
		$.ajax({
            url: '/ARM/report/subjectfilter/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,

            success: function(result){
			docUrl = document.createElement('a');	
			docUrl.href = new URL('/ARM/'+result);
			
			
			//  console.log(docUrl);
			docUrl.click();
			  
            }
        });
	}
}