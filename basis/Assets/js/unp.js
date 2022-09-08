 var unp = {
    ajaxMethod: 'POST',

    add: function(param) {
		
        var formData = new FormData();

        formData.append('name', $('#formName').val());
		formData.append('unp', $('#formUNP').val());
		formData.append('name_short', $('#formShortName').val());
		formData.append('address_index', $('#formIndex').val());
		formData.append('address_region', $('#formRegion').val());
		formData.append('address_district', $('#formDistrict').val());
		formData.append('address_city', $('#formCity').val());
		formData.append('address_city_zone', $('#formCityZone').val());
		formData.append('address_street', $('#formStreet').val());
		formData.append('address_street_type', $('#spr_type_street').val());
		formData.append('address_city_type', $('#spr_type_city').val());
		formData.append('address_building', $('#formBuilding').val());
		formData.append('address_flat', $('#formFlat').val());
		formData.append('address_portal', $('#portal_address').val());
		formData.append('liquidated', $('#formLiquidated ').val());
   

		
		error = unp.checkFields();

	if(error == 0){	
        $.ajax({
            url: '/ARM/basis/unp/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
           
				if(param == 'cancel'){
					window.location = '/ARM/basis/unp/';
				}else if(param == 'continue'){
				 //  console.log(result);
					alert('Данные сохранены');
				   window.location = '/ARM/basis/unp/edit/'+result;
				}else if(param == 'new_subject'){
				    window.location = '/ARM/basis/subject/create/'+result;
				}else if(param == 'new_person'){
					window.location = '/ARM/basis/responsible_persons/create/'+result;
				}
            }
        });
	}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
	};	
    },

    update: function(param) {
        var formData = new FormData();

        formData.append('unp_id', $('#formUnpId').val());
        formData.append('name', $('#formName').val());
		formData.append('unp', $('#formUNP').val());
		formData.append('name_short', $('#formShortName').val());
		formData.append('address_index', $('#formIndex').val());
		formData.append('address_region', $('#formRegion').val());
		formData.append('address_district', $('#formDistrict').val());
		formData.append('address_city', $('#formCity').val());
		formData.append('address_city_zone', $('#formCityZone').val());
		formData.append('address_street', $('#formStreet').val());
		formData.append('address_street_type', $('#spr_type_street').val());
		formData.append('address_city_type', $('#spr_type_city').val());
		formData.append('address_building', $('#formBuilding').val());
		formData.append('address_flat', $('#formFlat').val());
		formData.append('liquidated', $('#formLiquidated ').val());
		
		
		error = unp.checkFields();

		if(error == 0){	
			$.ajax({
				url: '/ARM/basis/unp/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					console.log(result);
				
					if(param == 'cancel'){
						window.location = '/ARM/basis/unp/';
					}else if(param == 'continue'){
					 //  console.log(result);
					   alert('Данные сохранены');
					   window.location = '/ARM/basis/unp/edit/'+$('#formUnpId').val();
					}else if(param == 'new_subject'){
						window.location = '/ARM/basis/subject/create/'+$('#formUnpId').val();
					}else if(param == 'new_person'){
					   window.location = '/ARM/basis/responsible_persons/create/'+$('#formUnpId').val();
					}
				 
				 
				 
				 
				}
			});
		}else{
					var err_text = "";
					if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false;
		};		
    },
	
	setNewNameUnp: function(){
		//event.preventDefault();
		
		//var ansv = confirm('Внимание!!\n Переименование юридического лица приведет к переименованию связанных потребителей по всей республике');
		console.log('hello');
		//return false;
	},
	
	
	checkFields: function(){
		if($("#formPage").attr("mode") == "new_unp" || $("#formPage").attr("mode") == "edit_unp"){
			var fields = ["unp", "unpName", "shortName", "index", "regionName", "districtName"];
		}
	
		var error = 0; // флаг заполнения обязательных полей

		 $(".form").find(":input").each(function(){ // проверяем каждое поле формы
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
				
					if(!$.trim( $(this).val() ) ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
				
			 }
		});
		$(".form").find("select").each(function(){ // проверяем каждое поле формы
	
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
					if( $(this).val() == 0 ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
			 }
			 
		});
		return error ;
	},
	
	
	remove: function(itemId) {
       
	    if(!confirm('Вы действительно хотите удалить данное юридическое лицо?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        }
		
		$.ajax({
				url: '/ARM/basis/unp/checkSbjAndRsp/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
					
						if(result == 0){
							$.ajax({
							url: '/ARM/basis/unp/removeItem/',
							type: 'POST',
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
								//console.log(result);
								$('.item-' + itemId).remove();
								if(	window.location.href.indexOf('/unp/list/') == -1 ){
									$('div[id_unp=' + itemId+']').remove();
									$('#search').val('');
								}
							}
						});
					}
					
				}
			});
	  

	},
	
		
	unpInfo: function(unpId){
		
		var formData = new FormData();
		formData.append('unp_id', unpId);
		
		$.ajax({
				url: '/ARM/basis/unp/info/'+unpId,
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
//console.log(result);					
					data = $.parseJSON(result);
					
					$('#name_short_unp_legend').html(data['unp']['name_short']);
					$('#name_unp').html(data['unp']['name']);
					$('#name_short_unp').html(data['unp']['name_short']);
					$('#status_unp').html(data['unp']['liquidated'] == 0 ? "действующий" : "ликвидирован" );
					
					$('#unp').html(data['unp']['unp']);
					$('#adress').html(((data['unp']['address_index']).length > 0 ? data['unp']['address_index']+", " : "")+(data['regions'] != null ? data['regions']['name']+", " : "")+(data['districts'] != null ? data['districts']['name']+" р-н, " : "")+((data['spr_type_city'])!= null ? data['spr_type_city']['sokr_name'] : "")+(data['cities'] != null ? data['cities']['name']+", " : "")+(data['citiesZone'] != null ? data['citiesZone']['name']+", " : "")+((data['spr_type_street'])!= null ? data['spr_type_street']['sokr_name'] : "")+((data['unp']['address_street']).length > 0 ? data['unp']['address_street'] : "")+((data['unp']['address_building']).length > 0 ? "-"+data['unp']['address_building'] : "")+((data['unp']['address_flat']).length > 0 ? "-"+data['unp']['address_flat'] : ""));
				}
			});
		
	}
	
};

$(window).ready(function(){
	$('#new_name_unp').click(function(){
		event.preventDefault();
	
		//var ansv = confirm('Внимание!!\n Переименование юридического лица приведет к переименованию связанных потребителей по всей республике');
		//if($('#nm_unp').text().length > 0){
			$('#renameUnp').css({'display':'block'});
		//}
		return false;
	});
	
	$('#renameClose').click(function(){
		event.preventDefault();
		$('#renameUnp').css({'display':'none'});
	});
	
	$('#setUnpNewName').click(function(){
		event.preventDefault();
		if($('#formUnpId').val() > 0){
			if( !confirm('Внимание!!\n Переименование юридического лица приведет к переименованию связанных потребителей по всей республике')){
				return false;	
			}
			
			var formData = new FormData();
			formData.append('unp_id', $('#formUnpId').val());
			formData.append('name', $('#nm_full_name').val());
			formData.append('name_short', $('#nm_short_name').val());
			
			
			$.ajax({
					url: '/ARM/basis/unp/rename/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
						//console.log(result);
						$('#new_name_unp').prop('disabled', true);
						location.reload();

					}
				});
				
				
		}
	});
});
	
$(window).ready(function(){
	
	if(window.location.href.indexOf("unp/create") != -1){
		//console.log($.cookie('access_level'));
		
		if($.cookie('access_level') > 5){
			$("#formPage select").prop('disabled', true);
			$("#formPage input").prop('disabled', true);
			$("#formPage textarea").prop('disabled', true);
			$("#formPage button").css({'display': 'none'});
			$("#formPage a").css({'pointer-events': 'none'});
			$(".w4").css({'width': '0'});
			//$(".nav_buttons").css({'display': 'none'});
		}
	}
});