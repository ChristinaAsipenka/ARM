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
            url: '/ARM/unp/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
           
				if(param == 'cancel'){
					window.location = '/ARM/unp/';
				}else if(param == 'continue'){
				 //  console.log(result);
					alert('Данные сохранены');
				   window.location = '/ARM/unp/edit/'+result;
				}else if(param == 'new_subject'){
				    window.location = '/ARM/subject/create/'+result;
				}else if(param == 'new_person'){
					window.location = '/ARM/responsible_persons/create/'+result;
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
            url: '/ARM/unp/update/',
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
					window.location = '/ARM/unp/';
				}else if(param == 'continue'){
				 //  console.log(result);
				   alert('Данные сохранены');
				   window.location = '/ARM/unp/edit/'+$('#formUnpId').val();
				}else if(param == 'new_subject'){
				    window.location = '/ARM/subject/create/'+$('#formUnpId').val();
				}else if(param == 'new_person'){
				   window.location = '/ARM/responsible_persons/create/'+$('#formUnpId').val();
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
	
	
	checkFields: function(){
		if($("#formPage").attr("mode") == "new_unp" || $("#formPage").attr("mode") == "edit_unp"){
			var fields = ["unp", "unpName", "shortName", "index", "regionName", "districtName", "cityName"];
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
       
	    if(!confirm('Вы действительно хотите удалить данного потребителя?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        }
	  
	  
	  
			$.ajax({
				url: '/ARM/unp/removeItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					console.log(result);
					$('.item-' + itemId).remove();
				}
			});
	


	},
	
		
	unpInfo: function(unpId){
		
		var formData = new FormData();
		formData.append('unp_id', unpId);
		
		$.ajax({
				url: '/ARM/unp/info/'+unpId,
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
	
});
	

	
