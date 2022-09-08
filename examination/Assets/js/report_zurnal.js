var report_zurnal = {
	ajaxMethod: 'POST',
		
	zurnalMain_e: function($id_record){
					event.preventDefault();
					var formData = new FormData();
					
					
					formData.append('zurnal_record', $id_record);
					

					$.ajax({
						url: '/ARM/examination/report/zurnalfilter_main_e/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/examination/PrintDoc/'+result);				
						docUrl.click();
						}
					});
	},
	
	zurnalMain_t: function($id_record){
					event.preventDefault();
					var formData = new FormData();
					
					
					formData.append('zurnal_record', $id_record);
					

					$.ajax({
						url: '/ARM/examination/report/zurnalfilter_main_t/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/examination/PrintDoc/'+result);				
						docUrl.click(); 
						}
					});
	},


	zurnalMain_g: function($id_record){
					event.preventDefault();
					var formData = new FormData();
					
					
					formData.append('zurnal_record', $id_record);
					

					$.ajax({
						url: '/ARM/examination/report/zurnalfilter_main_g/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/examination/PrintDoc/'+result);				
						docUrl.click();
						}
					});
	}
	


	
	





	
}