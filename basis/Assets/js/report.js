var report = {
	ajaxMethod: 'POST',
	
	subjectFilterMain: function(){
					event.preventDefault();
					
					var formData = new FormData();
					formData.append('id_user', $('#fs_fio').val());
					formData.append('id_user_name', $('#fs_fio option:selected').text());
					formData.append('spr_otdel', $('#fs_otdel').val());
					formData.append('spr_otdel_name', $('#fs_otdel option:selected').text());
					formData.append('spr_cod_podrazd', $('#fs_podrazdelenie').val());
					formData.append('spr_cod_podrazd_name', $('#fs_podrazdelenie option:selected').text());
					formData.append('spr_cod_branch', $('#fs_branch').val());
					formData.append('spr_cod_branch_name', $('#fs_branch option:selected').text());

					$.ajax({
						url: '/ARM/basis/report/subjectfilter/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						  
						  preloaderEnd();
						  
						}
					
					});
					
					
	},
	
	subjectFilter: function(){
					event.preventDefault();
					//Фактический адрес
					var formData = new FormData();
					formData.append('formRegionFact', $('#formRegionFact').val());
					formData.append('formRegionFact_name', $('#formRegionFact option:selected').text());
					formData.append('formDistrictFact', $('#formDistrictFact').val());
					formData.append('formDistrictFact_name', $('#formDistrictFact option:selected').text());
					formData.append('formCityFact', $('#formCityFact').val());
					formData.append('formCityFact_name', $('#formCityFact option:selected').text());
					formData.append('formCityZoneFact', $('#formCityZoneFact').val());
					formData.append('formCityZoneFact_name', $('#formCityZoneFact option:selected').text());
					formData.append('formStreetFact', $('#formStreetFact').val());
					//Почтовый адрес потребителя
					formData.append('formRegionPost', $('#formRegionPost').val());
					formData.append('formRegionPost_name', $('#formRegionPost option:selected').text());
					formData.append('formDistrictPost', $('#formDistrictPost').val());
					formData.append('formDistrictPost_name', $('#formDistrictPost option:selected').text());
					formData.append('formCityPost', $('#formCityPost').val());
					formData.append('formCityPost_name', $('#formCityPost option:selected').text());
					formData.append('formStreetPost', $('#formStreetPost').val());	
					//Закрепление потребителя за структурным подразделением
					formData.append('formBranchObject', $('#formBranchObject').val());
					formData.append('formBranchObject_name', $('#formBranchObject option:selected').text());
					formData.append('formPodrazdelenieObject', $('#formPodrazdelenieObject').val());
					formData.append('formPodrazdelenieObject_name', $('#formPodrazdelenieObject option:selected').text());
					formData.append('formOtdelObject', $('#formOtdelObject').val());
					formData.append('formOtdelObject_name', $('#formOtdelObject option:selected').text());
					//Адрес объекта
					formData.append('formRegionObject', $('#formRegionObject').val());
					formData.append('formRegionObject_name', $('#formRegionObject option:selected').text());
					formData.append('formDistrictObject', $('#formDistrictObject').val());
					formData.append('formDistrictObject_name', $('#formDistrictObject option:selected').text());
					formData.append('formCityObject', $('#formCityObject').val());
					formData.append('formCityObject_name', $('#formCityObject option:selected').text());
					formData.append('formStreetObject', $('#formStreetObject').val());						

					$.ajax({
						url: '/ARM/basis/report/subjectfilter/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						 preloaderEnd(); 
						}
					});
	},


	unpfilter: function(){
					event.preventDefault();
					//Фактический адрес
					var formData = new FormData();
					formData.append('formRegion', $('#formRegion').val());
					formData.append('formRegion_name', $('#formRegion option:selected').text());
					formData.append('formDistrict', $('#formDistrict').val());
					formData.append('formDistrict_name', $('#formDistrict option:selected').text());
					formData.append('formCity', $('#formCity').val());
					formData.append('formCity_name', $('#formCity option:selected').text());
					formData.append('formCityZone', $('#formCityZone').val());
					formData.append('formCityZone_name', $('#formCityZone option:selected').text());
					formData.append('street_unp', $('#street_unp').val());
					

					$.ajax({
						url: '/ARM/basis/report/unpfilter/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						 preloaderEnd(); 
						}
					});
	},
	
	
	indpersfilter: function(){
					event.preventDefault();
					//Фактический адрес
					var formData = new FormData();
					formData.append('mf_ip_firstname', $('#mf_ip_firstname').val());
					formData.append('mf_ip_secondname', $('#mf_ip_secondname').val());
					formData.append('mf_ip_lastname', $('#mf_ip_lastname').val());
					formData.append('mf_ip_identification_number', $('#mf_ip_identification_number').val());
					

					$.ajax({
						url: '/ARM/basis/report/indpersfilter/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						 preloaderEnd(); 
						}
					});
	},
	
	letter_srok: function($id_record,$id_napr){
					
					event.preventDefault();
					var formData = new FormData();
					
					
					formData.append('zurnal_record', $id_record);
					formData.append('zurnal_napr', $id_napr);

					$.ajax({
						url: '/ARM/basis/report/letter_srok/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){

						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						// preloaderEnd(); 
						}
					});
	},

	print_filter_srok: function(){
					event.preventDefault();
					//Фактический адрес
					var formData = new FormData();
					formData.append('mf_zurnal_personal', $('#zurnal_pers').val());
					formData.append('mf_zurnal_pers_dolg', $('#zurnal_pers_dolg').val());
					formData.append('mf_zurnal_srok_istek', $('#pz_prosrok').val());
					formData.append('mf_zurnal_date_doc_ot', $('#zurnal_date_doc_ot').val());
					formData.append('mf_zurnal_date_doc_do', $('#zurnal_date_doc_do').val());
					formData.append('mf_zurnal_date_srok_doc_ot', $('#zurnal_date_srok_doc_ot').val());
					formData.append('mf_zurnal_date_srok_doc_do', $('#zurnal_date_srok_doc_do').val());

						

					$.ajax({
						url: '/ARM/basis/report/letterfilter/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,

						success: function(result){
//console.log(result);
						docUrl = document.createElement('a');	
						docUrl.href = new URL('http://'+location.hostname+'/ARM/basis/PrintDoc/'+result);				
						docUrl.click();
						 preloaderEnd(); 
						}
					});
	}	




	
}