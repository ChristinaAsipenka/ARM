var guides = {
    ajaxMethod: 'POST',

	/************************ добавление в справочник адресных объектов***********************************************/
	add_type_street: function() {
		event.preventDefault();
        
		var formData = new FormData();
		var id_edit = $('input[name="id_type_street"]').val();
		
				var err_text = "";		
				if(($('#type_street_name').val()).length > 0 && ($('#type_street_sokr_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#type_street_name').val());			
					formData.append('sokr_name', $('#type_street_sokr_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#type_street_name').val()).length == 0){
						$('#type_street_name').addClass("formError");
					}
					if(($('#type_street_sokr_name').val()).length == 0){
						$('#type_street_sokr_name').addClass("formError");
					}
				}

		var street_name = $('input#type_street_name').val();
		var street_sokr_name = $('input#type_street_sokr_name').val();

		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_street_place = $("#spr_type_street_place").html();
		spr_select_street_post = $("#spr_type_street_post").html();	
		spr_select_street = $("#spr_type_street").html();	
		spr_select_street_object = $("#spr_type_street_object").html();

      $.ajax({
            url: '/ARM/basis/guides/add_type_street/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="type_street_name"]').html(street_name);
					$('tr.item-'+id_edit+' td[name="type_street_sokr_name"]').html(street_sokr_name);
					
			}else{			  
					
					  if((result).length > 0){
						  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select1 = spr_select_street_place + result;
								spr_select2 = spr_select_street_post + result;
								spr_select3 = spr_select_street + result;
								spr_select4 = spr_select_street_object + result;
								$("#spr_type_street_place").html(spr_select1);
								$("#spr_type_street_post").html(spr_select2);
								$("#spr_type_street").html(spr_select3);
								$("#spr_type_street_object").html(spr_select4);
							} 
					  }
			} 

				if(($('#type_street_name').val()).length > 0 && ($('#type_street_sokr_name').val()).length > 0){
					$("input[name='id_type_street']").val('');				
					$("input[name='type_street_name']").val('');
					$("input[name='type_street_sokr_name']").val('');
					$('#messenger_modal').html("");
					$('#type_street_name').removeClass("formError");
					$('#type_street_sokr_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
            }
        });
	
	},
/************************ добавление в справочник адресных объектов***********************************************/
	add_podrazdel: function() {
		event.preventDefault();
        
		var formData = new FormData();
		var id_edit = $('input[name="id_podrazdel"]').val();
		
				var err_text = "";		
				if(($('#podrazdel_name').val()).length > 0 && ($('#podrazdel_table').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#podrazdel_name').val());			
					formData.append('podrazdel_table', $('#podrazdel_table').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#podrazdel_name').val()).length == 0){
						$('#podrazdel_name').addClass("formError");
					}
					if(($('#podrazdel_table').val()).length == 0){
						$('#podrazdel_table').addClass("formError");
					}
				}

		var podrazdel_name = $('input#podrazdel_name').val();
		var podrazdel_table = $('input#podrazdel_table').val();

		str_tbody_first = $("#spr_guides tbody").html();
		/*spr_select_street_place = $("#spr_type_street_place").html();
		spr_select_street_post = $("#spr_type_street_post").html();	
		spr_select_street = $("#spr_type_street").html();	
		spr_select_street_object = $("#spr_type_street_object").html();*/

      $.ajax({
            url: '/ARM/basis/guides/add_podrazdel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
		
			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="podrazdel_name"]').html(podrazdel_name);
					$('tr.item-'+id_edit+' td[name="podrazdel_table"]').html(podrazdel_table);
					
			}else{			  
					
					  if((result).length > 0){
						  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}/*else{
								spr_select1 = spr_select_street_place + result;
								spr_select2 = spr_select_street_post + result;
								spr_select3 = spr_select_street + result;
								spr_select4 = spr_select_street_object + result;
								$("#spr_type_street_place").html(spr_select1);
								$("#spr_type_street_post").html(spr_select2);
								$("#spr_type_street").html(spr_select3);
								$("#spr_type_street_object").html(spr_select4);
							} */
					  }
			} 

				if(($('#podrazdel_name').val()).length > 0 && ($('#podrazdel_table').val()).length > 0){
					$("input[name='id_podrazdel']").val('');				
					$("input[name='podrazdel_name']").val('');
					$("input[name='podrazdel_table']").val('');
					$('#messenger_modal').html("");
					$('#podrazdel_name').removeClass("formError");
					$('#podrazdel_table').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
            }
        });
	
	},	
	
/************************ добавление в справочник конвертера мощности***********************************************/
	add_units_power: function() {
		event.preventDefault();
        
		var formData = new FormData();
		var id_edit = $('input[name="id_units_power"]').val();
		
				var err_text = "";		
				if(($('#units_power_name').val()).length > 0 && ($('#units_power_value').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#units_power_name').val());			
					formData.append('ratio', $('#units_power_value').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#units_power_name').val()).length == 0){
						$('#units_power_name').addClass("formError");
					}
					if(($('#units_power_value').val()).length == 0){
						$('#units_power_value').addClass("formError");
					}
				}

		var units_power_name = $('input#units_power_name').val();
		var units_power_value = $('input#units_power_value').val();

		str_tbody_first = $("#spr_guides tbody").html();


      $.ajax({
            url: '/ARM/basis/guides/add_units_power/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
		
			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="units_power_name"]').html(units_power_name);
					$('tr.item-'+id_edit+' td[name="units_power_value"]').html(units_power_value);
					
			}else{			  
					
					  if((result).length > 0){
						  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}
					  }
			} 

				if(($('#units_power_name').val()).length > 0 && ($('#units_power_value').val()).length > 0){
					$("input[name='id_units_power']").val('');				
					$("input[name='units_power_name']").val('');
					$("input[name='units_power_value']").val('');
					$('#messenger_modal').html("");
					$('#units_power_name').removeClass("formError");
					$('#units_power_value').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
            }
        });
	
	},


/************************ добавление в справочник типа ответственного***********************************************/
	add_type_otv: function() {
		event.preventDefault();
        
		var formData = new FormData();
		var id_edit = $('input[name="id_type_otv"]').val();
		
				var err_text = "";		
				if(($('#type_otv_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#type_otv_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#type_otv_name').val()).length == 0){
						$('#type_otv_name').addClass("formError");
					}

				}

		var type_otv_name = $('input#type_otv_name').val();


		str_tbody_first = $("#spr_guides tbody").html();


      $.ajax({
            url: '/ARM/basis/guides/add_type_otv/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="type_otv_name"]').html(type_otv_name);

					
			}else{			  
					
					  if((result).length > 0){
						  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}
					  }
			} 

				if(($('#type_otv_name').val()).length > 0){
					$("input[name='id_type_otv']").val('');				
					$("input[name='type_otv_name']").val('');
					$('#messenger_modal').html("");
					$('#type_otv_name').removeClass("formError");

					guides.closeModalWindow();
					
				}
					
            }
        });
	
	},			
	/************************ добавление в справочник форм собственности***********************************************/
	add_type_property: function() {
		event.preventDefault();
        
	
		var formData = new FormData();
		var id_edit = $('input[name="id_type_property"]').val();
				
				var err_text = "";		
				if(($('#type_property_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#type_property_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#type_property_name').addClass("formError");
				}
				
				var property_name = $('input#type_property_name').val();

		str_tbody_first = $("#spr_guides tbody").html(); 
		spr_select_first = $("#TypeProperty").html();

      $.ajax({
            url: '/ARM/basis/guides/add_type_property/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="type_property_name"]').html(property_name);
					
					
			}else{			  

					  if((result).length > 0){

							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#TypeProperty").html(spr_select); 
							}
					 }
			} 

				if((property_name).length > 0){
					$("input[name='id_type_property']").val('');				
					$("input[name='type_property_name']").val('');
					$('#messenger_modal').html("");
					$('#type_property_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
            }
        });
	
    },

	/************************ добавление в справочник типов населенных пунктов***********************************************/
	add_type_city: function() {
		event.preventDefault();
        
		
		var formData = new FormData();
		var id_edit = $('input[name="id_type_city"]').val();
				
				var err_text = "";		
				if(($('#type_city_name').val()).length > 0 && ($('#type_city_sokr_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#type_city_name').val());			
					formData.append('sokr_name', $('#type_city_sokr_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#type_city_name').val()).length == 0){
						$('#type_city_name').addClass("formError");
					}
					if(($('#type_city_sokr_name').val()).length == 0){
						$('#type_city_sokr_name').addClass("formError");
					}
				}				
				

				var city_name = $('input#type_city_name').val();
				var city_sokr_name = $('input#type_city_sokr_name').val();

		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_city_place = $("#spr_type_city_place").html();		
		spr_select_city_post = $("#spr_type_city_post").html();
		spr_select_city = $("#spr_type_city").html();
		spr_select_city_object = $("#spr_type_city_object").html();
		
      $.ajax({
            url: '/ARM/basis/guides/add_type_city/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="type_city_name"]').html(city_name);
					$('tr.item-'+id_edit+' td[name="type_city_sokr_name"]').html(city_sokr_name);
					
			}else{			  
					
					
					  if((result).length > 0){
						  	if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select1 = spr_select_city_place + result;
								spr_select2 = spr_select_city_post + result;
								spr_select3 = spr_select_city + result;
								spr_select4 = spr_select_city_object + result;
								$("#spr_type_city_place").html(spr_select1); 
								$("#spr_type_city_post").html(spr_select2);
								$("#spr_type_city").html(spr_select3);
								$("#spr_type_city_object").html(spr_select4);
							}
						
					  }
			} 

				if(($('#type_city_name').val()).length > 0 && ($('#type_city_sokr_name').val()).length > 0){
					$("input[name='id_type_city']").val('');				
					$("input[name='type_city_name']").val('');
					$("input[name='type_city_sokr_name']").val('');
					$('#messenger_modal').html("");
					$('#type_city_name').removeClass("formError");
					$('#type_city_sokr_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
	
				
            }
        });
	
    },

	/************************ добавление в справочник сменности работ***********************************************/
	add_shift_of_work: function() {
		event.preventDefault();
        
	
		var formData = new FormData();
		var id_edit = $('input[name="id_shift_of_work"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#shift_of_work_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#shift_of_work_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#shift_of_work_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#shift_of_work_name').addClass("formError");
				}
				
				
				
		var shift_of_work_name = $('input#shift_of_work_name').val();

		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/basis/guides/add_shift_of_work/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="shift_of_work_name"]').html(shift_of_work_name);
					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 
				/*$("input[name='id_shift_of_work']").val('');				
			    $("input[name='shift_of_work_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#shift_of_work_name').val()).length > 0){
					$("input[name='id_shift_of_work']").val('');				
					$("input[name='shift_of_work_name']").val('');
					$('#messenger_modal').html("");
					$('#shift_of_work_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
				
				
            }
        });
	
    },	
	
	/************************ добавление в справочник типов теплообменника***********************************************/
	add_ot_type_to: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_type_to"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_type_to_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/


				var err_text = "";		
				if(($('#ot_type_to_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_type_to_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_type_to_name').addClass("formError");
				}

				
		
		var ot_type_to_name = $('input#ot_type_to_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_type_to .table_spr tbody").html();			

      $.ajax({
            url: '/ARM/basis/guides/add_ot_type_to/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_type_to_name"]').html(ot_type_to_name);	
			}else{			  
	
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_type_to .table_spr tbody").html(spr_select);

							}
					  
					  
					  
			} 
				/*$("input[name='id_ot_type_to']").val('');				
			    $("input[name='ot_type_to_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#ot_type_to_name').val()).length > 0){
					$("input[name='id_ot_type_to']").val('');				
					$("input[name='ot_type_to_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_type_to_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
				
				
				
				
            }
        });
	
    },	

	/************************ добавление в справочник типов источников теплоснабжения***********************************************/
	add_ot_type_heat_source: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_type_heat_source"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_type_heat_source_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#ot_type_heat_source_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_type_heat_source_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_type_heat_source_name').addClass("formError");
				}				
				
		
		var ot_type_heat_source_name = $('input#ot_type_heat_source_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_heat_source = $("#t_heat_source_own").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_type_heat_source/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_type_heat_source_name"]').html(ot_type_heat_source_name);	
			}else{			  
					
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_heat_source + result;
								$("#t_heat_source_own").html(spr_select);

							}
					  
			} 
				/*$("input[name='id_ot_type_heat_source']").val('');				
			    $("input[name='ot_type_heat_source_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_type_heat_source_name').val()).length > 0){
					$("input[name='id_ot_type_heat_source']").val('');				
					$("input[name='ot_type_heat_source_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_type_heat_source_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },
	
	/************************ добавление в справочник видов систем отопления***********************************************/
	add_ot_systemheat_water: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_systemheat_water"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_systemheat_water_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#ot_systemheat_water_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_systemheat_water_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_systemheat_water_name').addClass("formError");
				}				
				
		
		var ot_systemheat_water_name = $('input#ot_systemheat_water_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_systemheat_water .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_systemheat_water/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_systemheat_water_name"]').html(ot_systemheat_water_name);	
			}else{			  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_systemheat_water .table_spr tbody").html(spr_select);

							} 
			} 
				/*$("input[name='id_ot_systemheat_water']").val('');				
			    $("input[name='ot_systemheat_water_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_systemheat_water_name').val()).length > 0){
					$("input[name='id_ot_systemheat_water']").val('');				
					$("input[name='ot_systemheat_water_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_systemheat_water_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник типов схем присоединения системы отопления***********************************************/
	add_ot_systemheat_dependent: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_systemheat_dependent"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_systemheat_dependent_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_systemheat_dependent_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_systemheat_dependent_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_systemheat_dependent_name').addClass("formError");
				}				
				
		
		var ot_systemheat_dependent_name = $('input#ot_systemheat_dependent_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_systemheat_dependent .table_spr tbody").html();			

      $.ajax({
            url: '/ARM/basis/guides/add_ot_systemheat_dependent/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_systemheat_dependent_name"]').html(ot_systemheat_dependent_name);	
			}else{			  
					 
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_systemheat_dependent .table_spr tbody").html(spr_select);

							}
			} 
				/*$("input[name='id_ot_systemheat_dependent']").val('');				
			    $("input[name='ot_systemheat_dependent_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_systemheat_dependent_name').val()).length > 0){
					$("input[name='id_ot_systemheat_dependent']").val('');				
					$("input[name='ot_systemheat_dependent_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_systemheat_dependent_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
				
            }
        });
	
    },

	
	/************************ добавление в справочник типов тепловой изоляции***********************************************/
	add_ot_heatnet_type_underground: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_heatnet_type_underground"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_heatnet_type_underground_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_heatnet_type_underground_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_heatnet_type_underground_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_heatnet_type_underground_name').addClass("formError");
				}				
				
		
		var ot_heatnet_type_underground_name = $('input#ot_heatnet_type_underground_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_t_underground_t = $("#t_underground").html();	
		spr_select_t_underground_ti = $("#heatnet_underground").html();
      $.ajax({
            url: '/ARM/basis/guides/add_ot_heatnet_type_underground/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_heatnet_type_underground_name"]').html(ot_heatnet_type_underground_name);	
			}else{			  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_t_underground_t + result;
								$("#t_underground").html(spr_select);
								spr_select2 = spr_select_t_underground_ti + result;
								$("#heatnet_underground").html(spr_select2);

							}

			
			} 
				/*$("input[name='id_ot_heatnet_type_underground']").val('');				
			    $("input[name='ot_heatnet_type_underground_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#ot_heatnet_type_underground_name').val()).length > 0){
					$("input[name='id_ot_heatnet_type_underground']").val('');				
					$("input[name='ot_heatnet_type_underground_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_heatnet_type_underground_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник типов схем присоединения  горячего водоснабжения***********************************************/
	add_ot_gvs_open: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_gvs_open"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_gvs_open_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_gvs_open_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_gvs_open_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_gvs_open_name').addClass("formError");
				}				
				
		
		var ot_gvs_open_name = $('input#ot_gvs_open_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_gvs_open .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_gvs_open/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_gvs_open_name"]').html(ot_gvs_open_name);	
			}else{			  
					
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_gvs_open .table_spr tbody").html(spr_select);

							}
					  
			} 
				/*$("input[name='id_ot_gvs_open']").val('');				
			    $("input[name='ot_gvs_open_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_gvs_open_name').val()).length > 0){
					$("input[name='id_ot_gvs_open']").val('');				
					$("input[name='ot_gvs_open_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_gvs_open_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник мест расположения теплообменника***********************************************/
	add_ot_gvs_in: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_gvs_in"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_gvs_in_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_gvs_in_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_gvs_in_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_gvs_in_name').addClass("formError");
				}				
				
		
		var ot_gvs_in_name = $('input#ot_gvs_in_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_gvs_in .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_gvs_in/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_gvs_in_name"]').html(ot_gvs_in_name);	
			}else{			  
					
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_gvs_in .table_spr tbody").html(spr_select);

							}
					  
					  
			} 
				/*$("input[name='id_ot_gvs_in']").val('');				
			    $("input[name='ot_gvs_in_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_gvs_in_name').val()).length > 0){
					$("input[name='id_ot_gvs_in']").val('');				
					$("input[name='ot_gvs_in_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_gvs_in_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник назначений котельной***********************************************/
	add_oti_boiler_type: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oti_boiler_type"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oti_boiler_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#oti_boiler_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#oti_boiler_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#oti_boiler_type_name').addClass("formError");
				}
				
				
		
		var oti_boiler_type_name = $('input#oti_boiler_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_oti_boiler_type .table_spr tbody").html();

      $.ajax({
            url: '/ARM/basis/guides/add_oti_boiler_type/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oti_boiler_type_name"]').html(oti_boiler_type_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_oti_boiler_type .table_spr tbody").html(spr_select);

							} 
					  
					  
			} 
				/*$("input[name='id_oti_boiler_type']").val('');				
			    $("input[name='oti_boiler_type_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#oti_boiler_type_name').val()).length > 0){
					$("input[name='id_oti_boiler_type']").val('');				
					$("input[name='oti_boiler_type_name']").val('');
					$('#messenger_modal').html("");
					$('#oti_boiler_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
				
            }
        });
	
    },






	/************************ добавление в справочник видов изоляций***********************************************/
	add_ot_type_izol: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_type_izol"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_izol_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#ot_izol_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_izol_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_izol_type_name').addClass("formError");
				}
				
				
		
		var ot_izol_type_name = $('input#ot_izol_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_type_izol .table_spr tbody").html();
		
		spr_izol = $("#t_type_isolation").html();
		spr_izol2 = $("#heatnet_type_isolation").html();
		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_type_izol/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_izol_type_name"]').html(ot_izol_type_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_type_izol .table_spr tbody").html(spr_select);
								spr_select2 = spr_izol + result;
								$("#t_type_isolation").html(spr_select2);
								console.log(spr_select2);
								spr_select3 = spr_izol2 + result;
								$("#heatnet_type_isolation").html(spr_select3);
								console.log(spr_select3);
							} 
					  
					  
			} 
				/*$("input[name='id_ot_type_izol']").val('');				
			    $("input[name='ot_izol_type_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#ot_izol_type_name').val()).length > 0){
					$("input[name='id_ot_type_izol']").val('');				
					$("input[name='ot_izol_type_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_izol_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },
	/************************ добавление в Справочник видов отопительных приборов***********************************************/
	add_ot_type_ot_pribor: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_type_ot_pribor"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_pribor_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_pribor_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_pribor_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_pribor_type_name').addClass("formError");
				}
				
		
		var ot_pribor_type_name = $('input#ot_pribor_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_t_systemheat_type_op .table_spr tbody").html();

      $.ajax({
            url: '/ARM/basis/guides/add_ot_type_ot_pribor/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_pribor_type_name"]').html(ot_pribor_type_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_t_systemheat_type_op .table_spr tbody").html(spr_select);

							} 
					  
					  
			} 
				/*$("input[name='id_ot_type_ot_pribor']").val('');				
			    $("input[name='ot_pribor_type_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_pribor_type_name').val()).length > 0){
					$("input[name='id_ot_type_ot_pribor']").val('');				
					$("input[name='ot_pribor_type_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_pribor_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в Справочник  видов разводки***********************************************/
	add_ot_type_razvodka: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_type_razvodka"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_razvodka_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#ot_razvodka_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_razvodka_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_razvodka_type_name').addClass("formError");
				}
		
		var ot_razvodka_type_name = $('input#ot_razvodka_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_systemheat_layout .table_spr tbody").html();

      $.ajax({
            url: '/ARM/basis/guides/add_ot_type_razvodka/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_razvodka_type_name"]').html(ot_razvodka_type_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_systemheat_layout .table_spr tbody").html(spr_select);

							} 
					  
					  
			} 
				/*$("input[name='id_ot_type_razvodka']").val('');				
			    $("input[name='ot_razvodka_type_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#ot_razvodka_type_name').val()).length > 0){
					$("input[name='id_ot_type_razvodka']").val('');				
					$("input[name='ot_razvodka_type_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_razvodka_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },






	/************************ добавление в Справочник  назначений САР***********************************************/
	add_ot_nazn_sar: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_nazn_sar"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_nazn_sar_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#ot_nazn_sar_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_nazn_sar_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_nazn_sar_name').addClass("formError");
				}
		
		var ot_nazn_sar_name = $('input#ot_nazn_sar_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#ModalObj_ot_personal_sar .table_spr tbody").html();
		
		spr_tp_sar_nazn = $("#tp_sar_nazn").html();
		
					 
		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_nazn_sar/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_nazn_sar_name"]').html(ot_nazn_sar_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#ModalObj_ot_personal_sar .table_spr tbody").html(spr_select);
								
								spr_select2 = spr_tp_sar_nazn + result;			
								$("#tp_sar_nazn").html(spr_select2);

							} 
					  
					  
			} 
				/*$("input[name='id_ot_nazn_sar']").val('');				
			    $("input[name='ot_nazn_sar_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#ot_nazn_sar_name').val()).length > 0){
					$("input[name='id_ot_nazn_sar']").val('');				
					$("input[name='ot_nazn_sar_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_nazn_sar_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },



	/************************ добавление в справочник типов зданий***********************************************/
	add_og_type_home: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_type_home"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#og_type_home_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#og_type_home_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_type_home_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_type_home_name').addClass("formError");
				}
		
		var og_type_home_name = $('input#og_type_home_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_type_home = $("#type_home").html();			

      $.ajax({
            url: '/ARM/basis/guides/add_og_type_home/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_type_home_name"]').html(og_type_home_name);	
			}else{			  
				
					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_type_home + result;
								$("#type_home").html(spr_select);

							}
					  
					  
					  
					  
			} 
				/*$("input[name='id_og_type_home']").val('');				
			    $("input[name='og_type_home_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#og_type_home_name').val()).length > 0){
					$("input[name='id_og_type_home']").val('');				
					$("input[name='og_type_home_name']").val('');
					$('#messenger_modal').html("");
					$('#og_type_home_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },

	/************************ добавление в справочник видов энергии***********************************************/
	add_oe_energy_type: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oe_energy_type"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oe_energy_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#oe_energy_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#oe_energy_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#oe_energy_type_name').addClass("formError");
				}
		
		var oe_energy_type_name = $('input#oe_energy_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_energy_type = $("#energy_type").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_oe_energy_type/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oe_energy_type_name"]').html(oe_energy_type_name);	
			}else{			  
					 
					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_energy_type + result;
								$("#energy_type").html(spr_select);


							}
					  
					  
			} 
				/*$("input[name='id_oe_energy_type']").val('');				
			    $("input[name='oe_energy_type_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#oe_energy_type_name').val()).length > 0){
					$("input[name='id_oe_energy_type']").val('');				
					$("input[name='oe_energy_type_name']").val('');
					$('#messenger_modal').html("");
					$('#oe_energy_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	
	/************************ добавление в справочник видов деятельности***********************************************/
	add_kind_of_activity: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_kind_of_activity"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#kind_of_activity_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#kind_of_activity_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#kind_of_activity_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#kind_of_activity_name').addClass("formError");
				}
		
		var kind_of_activity_name = $('input#kind_of_activity_name').val();
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#type_activity").html();
      $.ajax({
            url: '/ARM/basis/guides/add_kind_of_activity/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="kind_of_activity_name"]').html(kind_of_activity_name);	
			}else{			  
					  
					
					  if((result).length > 0){ 
				 
					 
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#type_activity").html(spr_select); 
							}
					 }
			} 
				/*$("input[name='id_kind_of_activity']").val('');				
			    $("input[name='kind_of_activity_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#kind_of_activity_name').val()).length > 0){
					$("input[name='id_kind_of_activity']").val('');				
					$("input[name='kind_of_activity_name']").val('');
					$('#messenger_modal').html("");
					$('#kind_of_activity_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },

/************************ добавление в справочник категории линий***********************************************/
	add_category_line: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_cat_line"]').val();
				

				
				var err_text = "";		
				if(($('#cat_line_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#cat_line_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#cat_line_name').addClass("formError");
				}
		
		var cat_line_name = $('input#cat_line_name').val();
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#type_activity").html();
      $.ajax({
            url: '/ARM/basis/guides/add_category_line/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="cat_line_name"]').html(cat_line_name);	
			}else{			  
					  
					
					  if((result).length > 0){ 
				 
					 
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#type_activity").html(spr_select); 
							}
					 }
			} 

				if(($('#cat_line_name').val()).length > 0){
					$("input[name='id_cat_line']").val('');				
					$("input[name='cat_line_name']").val('');
					$('#messenger_modal').html("");
					$('#cat_line_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },
/************************ добавление в справочник условный диаметр труб***********************************************/
	add_diametr_tube: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_diametr_tube"]').val();
				

				
				var err_text = "";		
				if(($('#diametr_tube_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#diametr_tube_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#diametr_tube_name').addClass("formError");
				}
		
		var diametr_tube_name = $('input#diametr_tube_name').val();
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#type_activity").html();
      $.ajax({
            url: '/ARM/basis/guides/add_diametr_tube/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="diametr_tube_name"]').html(diametr_tube_name);	
			}else{			  
					  
					
					  if((result).length > 0){ 
				 
					 
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#type_activity").html(spr_select); 
							}
					 }
			} 

				if(($('#diametr_tube_name').val()).length > 0){
					$("input[name='id_diametr_tube']").val('');				
					$("input[name='diametr_tube_name']").val('');
					$('#messenger_modal').html("");
					$('#diametr_tube_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },	
	
/************************ добавление в справочник тип объекта***********************************************/
	add_type_object: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_type_object"]').val();
				

				
				var err_text = "";		
				if(($('#type_object_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#type_object_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#type_object_name').addClass("formError");
				}
		
		var type_object_name = $('input#type_object_name').val();
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#type_activity").html();
      $.ajax({
            url: '/ARM/basis/guides/add_type_object/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="type_object_name"]').html(type_object_name);	
			}else{			  
					  
					
					  if((result).length > 0){ 
				 
					 
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#type_activity").html(spr_select); 
							}
					 }
			} 

				if(($('#type_object_name').val()).length > 0){
					$("input[name='id_type_object']").val('');				
					$("input[name='type_object_name']").val('');
					$('#messenger_modal').html("");
					$('#type_object_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },		
	/************************ добавление в справочник видов тепловой изоляции***********************************************/
	add_ot_heatnet_type_iso: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_heatnet_type_iso"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_heatnet_type_iso_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_heatnet_type_iso_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_heatnet_type_iso_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_heatnet_type_iso_name').addClass("formError");
				}
		
		var ot_heatnet_type_iso_name = $('input#ot_heatnet_type_iso_name').val();
		str_tbody_first = $("#spr_guides tbody").html(); 
		spr_select_isolation_iso_t = $("#type_isolation_iso").html();
		spr_select_isolation_iso_ti = $("#type_isolation").html();
      $.ajax({
            url: '/ARM/basis/guides/add_ot_heatnet_type_iso/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_heatnet_type_iso_name"]').html(ot_heatnet_type_iso_name);	
			}else{			  
					
							
							
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								
								
								spr_select = spr_select_isolation_iso_t + result;
								$("#type_isolation_iso").html(spr_select);
								spr_select2 = spr_select_isolation_iso_ti + result;
								$("#type_isolation").html(spr_select2);
								
								
								

							}
					  
					  
					  
					  
					  
			} 
				/*$("input[name='id_ot_heatnet_type_iso']").val('');				
			    $("input[name='ot_heatnet_type_iso_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_heatnet_type_iso_name').val()).length > 0){
					$("input[name='id_ot_heatnet_type_iso']").val('');				
					$("input[name='ot_heatnet_type_iso_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_heatnet_type_iso_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник функциональных назначений объекта***********************************************/
	add_ot_functions: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_functions"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_functions_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_functions_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_functions_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_functions_name').addClass("formError");
				}
		
		var ot_functions_name = $('input#ot_functions_name').val();
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_tr = $("#openModalSpr_ot_functions .table_spr tbody").html();	
		
      $.ajax({
            url: '/ARM/basis/guides/add_ot_functions/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_functions_name"]').html(ot_functions_name);	
			}else{			  
					
			
					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_functions .table_spr tbody").html(spr_select);

							}			
			
			
			
			
			
			
			
			} 
				/*$("input[name='id_ot_functions']").val('');				
			    $("input[name='ot_functions_name']").val('');

				guides.closeModalWindow();*/
				
				
				
				if(($('#ot_functions_name').val()).length > 0){
					$("input[name='id_ot_functions']").val('');				
					$("input[name='ot_functions_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_functions_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник категорий  надежности теплоснабжения***********************************************/
	add_ot_cat: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_ot_functions"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#ot_cat_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#ot_cat_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#ot_cat_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#ot_cat_name').addClass("formError");
				}
		
		var ot_cat_name = $('input#ot_cat_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_ot_cat .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_ot_cat/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="ot_cat_name"]').html(ot_cat_name);	
			}else{			  
					
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_ot_cat .table_spr tbody").html(spr_select);

							}
			} 
				/*$("input[name='id_ot_functions']").val('');				
			    $("input[name='ot_cat_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#ot_cat_name').val()).length > 0){
					$("input[name='id_ot_functions']").val('');				
					$("input[name='ot_cat_name']").val('');
					$('#messenger_modal').html("");
					$('#ot_cat_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник видов топлива котельной***********************************************/
	add_oti_type_fuel: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oti_type_fuel"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oti_type_fuel_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#oti_type_fuel_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#oti_type_fuel_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#oti_type_fuel_name').addClass("formError");
				}
		
		var oti_type_fuel_name = $('input#oti_type_fuel_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_oti_type_fuel .table_spr tbody").html();
		spr_select_tri = $("#openModalSpr_oti_type_fuel_rezerv .table_spr tbody").html();

      $.ajax({
            url: '/ARM/basis/guides/add_oti_type_fuel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oti_type_fuel_name"]').html(oti_type_fuel_name);	
			}else{			  

							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_oti_type_fuel .table_spr tbody").html(spr_select);
								spr_select2 = spr_select_tri + result;
								$("#openModalSpr_oti_type_fuel_rezerv .table_spr tbody").html(spr_select2);

							}
					  
					  
			} 
				/*$("input[name='id_oti_type_fuel']").val('');				
			    $("input[name='oti_type_fuel_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#oti_type_fuel_name').val()).length > 0){
					$("input[name='id_oti_type_fuel']").val('');				
					$("input[name='oti_type_fuel_name']").val('');
					$('#messenger_modal').html("");
					$('#oti_type_fuel_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },
	/************************ добавление в справочник видов топлива котельной***********************************************/
	add_oti_type_fuel_rezerv: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oti_type_fuel_rezerv"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oti_type_fuel_name_rezerv').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#oti_type_fuel_name_rezerv').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#oti_type_fuel_name_rezerv').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#oti_type_fuel_name_rezerv').addClass("formError");
				}
		
		var oti_type_fuel_name = $('input#oti_type_fuel_name_rezerv').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_oti_type_fuel_rezerv .table_spr tbody").html();
		spr_select_trt = $("#openModalSpr_oti_type_fuel .table_spr tbody").html();

      $.ajax({
            url: '/ARM/basis/guides/add_oti_type_fuel_rezerv/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oti_type_fuel_name_rezerv"]').html(oti_type_fuel_name_rezerv);	
			}else{			  
					
					  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_oti_type_fuel_rezerv .table_spr tbody").html(spr_select);
								spr_select2 = spr_select_trt + result;
								$("#openModalSpr_oti_type_fuel .table_spr tbody").html(spr_select2);
							}
					  
					  
			} 
				/*$("input[name='id_oti_type_fuel_rezerv']").val('');				
			    $("input[name='oti_type_fuel_name_rezerv']").val('');

				guides.closeModalWindow();*/
				
				if(($('#oti_type_fuel_name_rezerv').val()).length > 0){
					$("input[name='id_oti_type_fuel_rezerv']").val('');				
					$("input[name='oti_type_fuel_name_rezerv']").val('');
					$('#messenger_modal').html("");
					$('#oti_type_fuel_name_rezerv').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },
	/************************ добавление в справочник видов газа ***********************************************/
	add_og_type_gaz: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_type_gaz"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#og_type_gaz_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#og_type_gaz_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_type_gaz_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_type_gaz_name').addClass("formError");
				}
		
		var og_type_gaz_name = $('input#og_type_gaz_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_type_gaz .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_type_gaz/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			//console.log(id_edit);
			//console.log(result);
			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_type_gaz_name"]').html(og_type_gaz_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_type_gaz .table_spr tbody").html(spr_select);

							} 
					  
					  
					  
					  
			} 
				/*$("input[name='id_og_type_gaz']").val('');				
			    $("input[name='og_type_gaz_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#og_type_gaz_name').val()).length > 0){
					$("input[name='id_og_type_gaz']").val('');				
					$("input[name='og_type_gaz_name']").val('');
					$('#messenger_modal').html("");
					$('#og_type_gaz_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	
	
	
	
	
	/************************ добавление в справочник видов ТО газопроводов ***********************************************/
	add_og_to_gaz: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_to_gaz"]').val();
				

				var err_text = "";		
				if(($('#og_to_gaz_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_to_gaz_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_to_gaz_name').addClass("formError");
				}
		
		var og_to_gaz_name = $('input#og_to_gaz_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_to_gaz .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_to_gaz/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_to_gaz_name"]').html(og_to_gaz_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_to_gaz .table_spr tbody").html(spr_select);

							} 		  
			} 

				
				if(($('#og_to_gaz_name').val()).length > 0){
					$("input[name='id_og_to_gaz']").val('');				
					$("input[name='og_to_gaz_name']").val('');
					$('#messenger_modal').html("");
					$('#og_to_gaz_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },	
	
	
	/************************ добавление в справочник видов обследования газового объекта ***********************************************/
	add_og_obsl_go: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_obsl_go"]').val();
				

				var err_text = "";		
				if(($('#og_obsl_go_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_obsl_go_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_obsl_go_name').addClass("formError");
				}
		
		var og_obsl_go_name = $('input#og_obsl_go_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_obsl_go .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_obsl_go/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_obsl_go_name"]').html(og_obsl_go_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_obsl_go .table_spr tbody").html(spr_select);

							} 		  
			} 

				
				if(($('#og_obsl_go_name').val()).length > 0){
					$("input[name='id_og_obsl_go']").val('');				
					$("input[name='og_obsl_go_name']").val('');
					$('#messenger_modal').html("");
					$('#og_obsl_go_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },		
	
	
	/************************ добавление в справочник видов аварий или НС ***********************************************/
	add_og_accidents: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_accidents"]').val();
				

				var err_text = "";		
				if(($('#og_accidents_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_accidents_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_accidents_name').addClass("formError");
				}
		
		var og_accidents_name = $('input#og_accidents_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_og_accidents .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_accidents/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_accidents_name"]').html(og_accidents_name);	
			}else{			  
					 		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_og_accidents .table_spr tbody").html(spr_select);

							} 		  
			} 

				
				if(($('#og_accidents_name').val()).length > 0){
					$("input[name='id_og_accidents']").val('');				
					$("input[name='og_accidents_name']").val('');
					$('#messenger_modal').html("");
					$('#og_accidents_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },			
	
	
	
	/************************ добавление в справочник материалов дымоходов ***********************************************/
	add_og_flue_mater: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_flue_mater"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#og_flue_mater_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#og_flue_mater_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_flue_mater_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_flue_mater_name').addClass("formError");
				}
		
		var og_flue_mater_name = $('input#og_flue_mater_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_flue_mater .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_flue_mater/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_flue_mater_name"]').html(og_flue_mater_name);	
			}else{			  
					
					  
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_flue_mater .table_spr tbody").html(spr_select);

							} 
					  
					  
					  
					  
					  
					  
			} 
				/*$("input[name='id_og_flue_mater']").val('');				
			    $("input[name='og_flue_mater_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#og_flue_mater_name').val()).length > 0){
					$("input[name='id_og_flue_mater']").val('');				
					$("input[name='og_flue_mater_name']").val('');
					$('#messenger_modal').html("");
					$('#og_flue_mater_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник видов дымоходов ***********************************************/
	add_og_flue: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_flue"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#og_flue_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#og_flue_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_flue_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_flue_name').addClass("formError");
				}
				
		
		var og_flue_name = $('input#og_flue_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_tr = $("#openModalSpr_og_flue .table_spr tbody").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_flue/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_flue_name"]').html(og_flue_name);	
			}else{			  
					
					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_tr + result;
								$("#openModalSpr_og_flue .table_spr tbody").html(spr_select);

							}
					  
					  
					  
					  
					  
			} 
				/*$("input[name='id_og_flue']").val('');				
			    $("input[name='og_flue_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#og_flue_name').val()).length > 0){
					$("input[name='id_og_flue']").val('');				
					$("input[name='og_flue_name']").val('');
					$('#messenger_modal').html("");
					$('#og_flue_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник типов газового оборудования ***********************************************/
	add_og_device_type: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_og_device_type"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#og_device_type_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#og_device_type_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#og_device_type_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#og_device_type_name').addClass("formError");
				}
		
		var og_device_type_name = $('input#og_device_type_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_device_type = $("#device_type").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_og_device_type/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="og_device_type_name"]').html(og_device_type_name);	
			}else{			  
					
							if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_device_type + result;
								$("#device_type").html(spr_select);

							}
					  
					  
					  
			} 
				/*$("input[name='id_og_device_type']").val('');				
			    $("input[name='og_device_type_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#og_device_type_name').val()).length > 0){
					$("input[name='id_og_device_type']").val('');				
					$("input[name='og_device_type_name']").val('');
					$('#messenger_modal').html("");
					$('#og_device_type_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник напряжения линий ***********************************************/
	add_oe_klvl_volt: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oe_klvl_volt"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oe_klvl_volt_name').val());			
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#oe_klvl_volt_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#oe_klvl_volt_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#oe_klvl_volt_name').addClass("formError");
				}
		
		var oe_klvl_volt_name = $('input#oe_klvl_volt_name').val();
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_klvl_volt = $("#klvl_volt").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_oe_klvl_volt/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oe_klvl_volt_name"]').html(oe_klvl_volt_name);	
			}else{			  
				
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_klvl_volt + result;
								$("#klvl_volt").html(spr_select);


							}
					  
					  
					  
			} 
				/*$("input[name='id_oe_klvl_volt']").val('');				
			    $("input[name='oe_klvl_volt_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#oe_klvl_volt_name').val()).length > 0){
					$("input[name='id_oe_klvl_volt']").val('');				
					$("input[name='oe_klvl_volt_name']").val('');
					$('#messenger_modal').html("");
					$('#oe_klvl_volt_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник линий снабжения ***********************************************/
	add_oe_klvl_type: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_oe_klvl_type"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#oe_klvl_type_name').val());
				formData.append('sokr_name', $('#oe_klvl_type_sokr_name').val());
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#oe_klvl_type_name').val()).length > 0 && ($('#oe_klvl_type_sokr_name').val()).length > 0 ){
					formData.append('id', id_edit);				
					formData.append('name', $('#oe_klvl_type_name').val());
					formData.append('sokr_name', $('#oe_klvl_type_sokr_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#oe_klvl_type_name').val()).length == 0){
						$('#oe_klvl_type_name').addClass("formError");
					}
					if(($('#oe_klvl_type_sokr_name').val()).length == 0){
						$('#oe_klvl_type_sokr_name').addClass("formError");
					}	
				}
				
		
		var oe_klvl_type_name = $('input#oe_klvl_type_name').val();
		var oe_klvl_type_sokr_name = $('input#oe_klvl_type_sokr_name').val();
		
		str_tbody_first = $("#spr_guides tbody").html(); 
		spr_select_klvl_type = $("#klvl_type").html();

      $.ajax({
            url: '/ARM/basis/guides/add_oe_klvl_type/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="oe_klvl_type_name"]').html(oe_klvl_type_name);
					$('tr.item-'+id_edit+' td[name="oe_klvl_type_sokr_name"]').html(oe_klvl_type_sokr_name);
			}else{			  
					
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_klvl_type + result;
								$("#klvl_type").html(spr_select);


							}
					  
					  
			} 
				/*$("input[name='id_oe_klvl_type']").val('');				
			    $("input[name='oe_klvl_type_name']").val('');
				$("input[name='oe_klvl_type_sokr_name']").val('');

				guides.closeModalWindow();*/
				
				
				if(($('#oe_klvl_type_name').val()).length > 0 && ($('#oe_klvl_type_sokr_name').val()).length > 0){
					$("input[name='id_oe_klvl_type']").val('');				
					$("input[name='oe_klvl_type_name']").val('');
					$("input[name='oe_klvl_type_sokr_name']").val('');
					$('#messenger_modal').html("");
					$('#oe_klvl_type_name').removeClass("formError");
					$('#oe_klvl_type_sokr_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник областей ***********************************************/
	add_region: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_region"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#region_name').val());
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#region_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#region_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#region_name').addClass("formError");
				}
		
		var region_name = $('input#region_name').val();

		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_RegionFact = $("#formRegionFact").html();		
		spr_select_RegionPost = $("#formRegionPost").html();
		spr_select_Region = $("#formRegion").html();
		spr_select_RegionObject = $("#formRegionObject").html();
		
      $.ajax({
            url: '/ARM/basis/guides/add_region/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="region_name"]').html(region_name);

			}else{			  
					
					  if((result).length > 0){ 

					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select1 = spr_select_RegionFact + result;
								spr_select2 = spr_select_RegionPost + result;
								spr_select3 = spr_select_Region + result;
								spr_select4 = spr_select_RegionObject + result;
								$("#formRegionFact").html(spr_select1);
								$("#formRegionPost").html(spr_select2);
								$("#formRegion").html(spr_select3);
								$("#formRegionObject").html(spr_select4);
							}
					  }
			} 
				/*$("input[name='id_region']").val('');				
			    $("input[name='region_name']").val('');

				guides.closeModalWindow();*/
				
				if(($('#region_name').val()).length > 0){
					$("input[name='id_region']").val('');				
					$("input[name='region_name']").val('');
					$('#messenger_modal').html("");
					$('#region_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
            }
        });
	
    },

	/************************ добавление в справочник районов областей ***********************************************/
	add_district: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_district"]').val();
				
			/*	formData.append('id', id_edit);				
				formData.append('name', $('#district_name').val());
				formData.append('idSprRegion', $('#region_by_district').val());
				formData.append('reg_name', $('#region_by_district option:selected').text());
				formData.append('guides_place', $('#guides_place').val());	*/


				var err_text = "";		
				if(($('#district_name').val()).length > 0 && ($('#region_by_district').val()) > 0 ){
					formData.append('id', id_edit);				
					formData.append('name', $('#district_name').val());
					formData.append('idSprRegion', $('#region_by_district').val());
					formData.append('reg_name', $('#region_by_district option:selected').text());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#district_name').val()).length == 0){
						$('#district_name').addClass("formError");
					}
					if(($('#region_by_district').val()) == 0){
						$('#region_by_district').addClass("formError");
					}	
				}
				
		
		var district_name = $('input#district_name').val();
		var region_by_districts = $('select#region_by_district').val();
		var reg_names = $('#region_by_district option:selected').text();
		
		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_DistrictFact = $("#formDistrictFact").html();			
		spr_select_DistrictPost = $("#formDistrictPost").html();
		spr_select_District = $("#formDistrict").html();
		spr_select_DistrictObject = $("#formDistrictObject").html();
		
      $.ajax({
            url: '/ARM/basis/guides/add_district/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

				if(id_edit>0){
					
						$('tr.item-'+id_edit+' td[name="district_name"]').html(district_name);
						$('tr.item-'+id_edit+' td[name="region_by_district_name"]').html(reg_names);
						$('tr.item-'+id_edit+' td[name="region_by_district_name"]').attr('type_reg_district',region_by_districts);

				}else{			  
						 
						
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select1 = spr_select_DistrictFact + result;
								spr_select2 = spr_select_DistrictPost + result;
								spr_select3 = spr_select_District + result;
								spr_select4 = spr_select_DistrictObject + result;
								$("#formDistrictFact").html(spr_select1);
								$("#formDistrictPost").html(spr_select2);
								$("#formDistrict").html(spr_select3);
								$("#formDistrictObject").html(spr_select4);
							}
				} 

			}
        });
		

			  $.ajax({
					url: '/ARM/basis/guides/add_adminBydistrict/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){

					}
				});		

		
					/*$("input[name='id_district']").val('');				
					$("input[name='district_name']").val('');
					$("select[name='region_by_district']").val('');
					
					guides.closeModalWindow();*/	


				if(($('#district_name').val()).length > 0 && ($('#region_by_district').val()) > 0){
					$("input[name='id_district']").val('');				
					$("input[name='district_name']").val('');
					$("select[name='region_by_district']").val('');
					$('#messenger_modal').html("");
					$('#district_name').removeClass("formError");
					$('#region_by_district').removeClass("formError");
					guides.closeModalWindow();
					
				}
					

    },

	/************************ добавление в справочник административных районов ***********************************************/
	add_admin: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_admin"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#admin_name').val());
				formData.append('idSprRegion', $('#region_by_admin').val());
				formData.append('reg_name', $('#region_by_admin option:selected').text());
				formData.append('guides_place', $('#guides_place').val());*/	


				var err_text = "";		
				if(($('#admin_name').val()).length > 0 && ($('#region_by_admin').val()).length > 0 ){
					formData.append('id', id_edit);				
					formData.append('name', $('#admin_name').val());
					formData.append('idSprRegion', $('#region_by_admin').val());
					formData.append('reg_name', $('#region_by_admin option:selected').text());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#admin_name').val()).length == 0){
						$('#admin_name').addClass("formError");
					}
					if($('#region_by_admin').val() == 0){
						$('#region_by_admin').addClass("formError");
					}	
				}

				
		
		var admin_name = $('input#admin_name').val();
		var region_by_admin = $('input#region_by_admin').val();
		var reg_name = $('#region_by_admin option:selected').text();
		
		
		str_tbody_first = $("#spr_guides tbody").html(); 
		spr_select_street = $("#spr_admin").html();
      $.ajax({
            url: '/ARM/basis/guides/add_admin/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="admin_name"]').html(admin_name);
					$('tr.item-'+id_edit+' td[name="region_by_admin_name"]').html(reg_name);
					$('tr.item-'+id_edit+' td[name="region_by_admin_name"]').attr('type_reg_admin',$('#region_by_admin').val());
					

			}else{			  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_street + result;
								$("#spr_admin").html(spr_select);

							}
					  
					  
			} 
				/*$("input[name='id_admin']").val('');				
			    $("input[name='admin_name']").val('');
				$("select[name='region_by_admin']").val('');
				
				guides.closeModalWindow();*/
				
				
				if(($('#admin_name').val()).length > 0 && ($('#region_by_admin').val()).length > 0){
					$("input[name='id_admin']").val('');				
					$("input[name='admin_name']").val('');
					$("select[name='region_by_admin']").val('');
					$('#messenger_modal').html("");
					$('#admin_name').removeClass("formError");
					$('#region_by_admin').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },

	/************************ добавление в справочник филиалов ***********************************************/
	add_branch: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_branch"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#branch_name').val());
				formData.append('branch_adress', $('#branch_adress').val());
				formData.append('branch_phone_cod', $('#branch_phone_cod').val());
				formData.append('branch_phone', $('#branch_phone').val());
				formData.append('branch_fax', $('#branch_fax').val());
				formData.append('branch_email', $('#branch_email').val());
				formData.append('branch_sokr_name', $('#branch_sokr_name').val());
				formData.append('guides_place', $('#guides_place').val());*/
				
				var err_text = "";		
				if(($('#branch_name').val()).length > 0 && ($('#branch_adress').val()).length > 0 && ($('#branch_phone_cod').val()).length > 0 && ($('#branch_phone').val()).length > 0 && ($('#branch_fax').val()).length > 0 && ($('#branch_email').val()).length > 0 && ($('#branch_sokr_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#branch_name').val());
					formData.append('branch_adress', $('#branch_adress').val());
					formData.append('branch_phone_cod', $('#branch_phone_cod').val());
					formData.append('branch_phone', $('#branch_phone').val());
					formData.append('branch_fax', $('#branch_fax').val());
					formData.append('branch_email', $('#branch_email').val());
					formData.append('branch_sokr_name', $('#branch_sokr_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#branch_name').val()).length == 0){
						$('#branch_name').addClass("formError");
					}
					if(($('#branch_adress').val()).length == 0){
						$('#branch_adress').addClass("formError");
					}
					if(($('#branch_phone_cod').val()).length == 0){
						$('#branch_phone_cod').addClass("formError");
					}
					if(($('#branch_phone').val()).length == 0){
						$('#branch_phone').addClass("formError");
					}
					if(($('#branch_fax').val()).length == 0){
						$('#branch_fax').addClass("formError");
					}
					if(($('#branch_email').val()).length == 0){
						$('#branch_email').addClass("formError");
					}
					if(($('#branch_sokr_name').val()).length == 0){
						$('#branch_sokr_name').addClass("formError");
					}					
				}
				
		
		var branch_name = $('input#branch_name').val();
		var branch_adress = $('input#branch_adress').val();
		var branch_phone_cod = $('input#branch_phone_cod').val();
		var branch_phone = $('input#branch_phone').val();
		var branch_fax = $('input#branch_fax').val();
		var branch_email = $('input#branch_email').val();
		var branch_sokr_name = $('input#branch_sokr_name').val();
		
		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_BranchObject = $("#formBranchObject").html();

      $.ajax({
            url: '/ARM/basis/guides/add_branch/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="branch_name"]').html(branch_name);
					$('tr.item-'+id_edit+' td[name="branch_adress"]').html(branch_adress);
					$('tr.item-'+id_edit+' td[name="branch_phone_cod"]').html(branch_phone_cod);
					$('tr.item-'+id_edit+' td[name="branch_phone"]').html(branch_phone);
					$('tr.item-'+id_edit+' td[name="branch_fax"]').html(branch_fax);
					$('tr.item-'+id_edit+' td[name="branch_email"]').html(branch_email);
					$('tr.item-'+id_edit+' td[name="branch_sokr_name"]').html(branch_sokr_name);

			}else{			  
					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_BranchObject + result;
								$("#formBranchObject").html(spr_select);

							}
					  
					  
					  
			} 
				/*$("input[name='id_branch']").val('');				
			    $("input[name='branch_name']").val('');
				$("input[name='branch_adress']").val('');
				$("input[name='branch_phone_cod']").val('');
				$("input[name='branch_phone']").val('');
				$("input[name='branch_fax']").val('');
				$("input[name='branch_email']").val('');
				$("input[name='branch_sokr_name']").val('');

				
				guides.closeModalWindow();*/
				
				if(($('#branch_name').val()).length > 0 && ($('#branch_adress').val()).length > 0 && ($('#branch_phone_cod').val()).length > 0 && ($('#branch_phone').val()).length > 0 && ($('#branch_fax').val()).length > 0 && ($('#branch_email').val()).length > 0 && ($('#branch_sokr_name').val()).length > 0){
					$("input[name='id_branch']").val('');				
					$("input[name='branch_name']").val('');
					$("input[name='branch_adress']").val('');
					$("input[name='branch_phone_cod']").val('');
					$("input[name='branch_phone']").val('');
					$("input[name='branch_fax']").val('');
					$("input[name='branch_email']").val('');
					$("input[name='branch_sokr_name']").val('');
					$('#messenger_modal').html("");
					$('#branch_name').removeClass("formError");
					$('#branch_adress').removeClass("formError");
					$('#branch_phone_cod').removeClass("formError");
					$('#branch_phone').removeClass("formError");
					$('#branch_fax').removeClass("formError");
					$('#branch_email').removeClass("formError");
					$('#branch_sokr_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },
	
	/************************ добавление в справочник ведомства ***********************************************/
	add_department: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_department"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#department_name').val());
				formData.append('idSprDepartment', $('#type_by_department').val());
				formData.append('type_prop_name', $('#type_by_department option:selected').text());
				formData.append('guides_place', $('#guides_place').val());*/

				var err_text = "";		
				if(($('#department_name').val()).length > 0 && ($('#type_by_department').val()) > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#department_name').val());
					formData.append('idSprDepartment', $('#type_by_department').val());
					formData.append('type_prop_name', $('#type_by_department option:selected').text());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#department_name').val()).length == 0){
						$('#department_name').addClass("formError");
					}
					if(($('#type_by_department').val()) == 0){
						$('#type_by_department').addClass("formError");
					}
								
				}				
		
		var department_name = $('input#department_name').val();
		var type_property_by_department = $('select#type_by_department').val();
		var name_property_by_department = $('#type_by_department option:selected').text();
		
		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_first = $("#nameDepartment").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_department/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					$('tr.item-'+id_edit+' td[name="department_name"]').html(department_name);
					$('tr.item-'+id_edit+' td[name="type_property_by_department_name"]').html(name_property_by_department);
					$('tr.item-'+id_edit+' td[name="type_property_by_department_name"]').attr('type_department',$('#type_by_department').val());
			}else{			  

					  if((result).length > 0){ 

					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#nameDepartment").html(spr_select); 
							}
					  
					  
					  
					  
					  
					  
					  }
			} 
				/*$("input[name='id_department']").val('');				
			    $("input[name='department_name']").val('');
				$("select[name='type_by_department']").val('');
				
				guides.closeModalWindow();*/
				
				
				if(($('#department_name').val()).length > 0 && ($('#type_by_department').val()) > 0){
					$("input[name='id_department']").val('');				
					$("input[name='department_name']").val('');
					$("select[name='type_by_department']").val(0);
					$('#messenger_modal').html("");
					$('#department_name').removeClass("formError");
					$('#type_by_department').removeClass("formError");
					guides.closeModalWindow();
					
				}
				
            }
        });
	
    },	
	

	/************************ добавление в справочник города ***********************************************/
	add_city: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_city"]').val();
				
				
		
		var city_name = $('input#city_name').val();
		var type_region_by_city = $('select#formRegionSpr').val();
		var name_region_by_city = $('#formRegionSpr option:selected').text();
		var type_district_by_city = $('select#formDistrictSpr').val();
		var name_district_by_city = $('#formDistrictSpr option:selected').text();		
		/*var is_region = $('input#is_region').val();
		var is_district = $('input#is_district').val();
		var is_admin = $('input#is_admin').val();*/



				var err_text = "";	
			
				
				if(($('#openModalGuides #city_name').val()).length > 0 && ($('#openModalGuides #formRegionSpr').val()) > 0 && ($('#openModalGuides #formDistrictSpr').val()) > 0){
	
					formData.append('id', id_edit);				
					formData.append('name', $('#openModalGuides #city_name').val());
					formData.append('id_spr_region', $('#openModalGuides #formRegionSpr').val());
					formData.append('region_by_city', $('#openModalGuides #formRegionSpr option:selected').text());	

					if($('#formDistrictSpr').val() > 0){
						formData.append('id_spr_district', $('#openModalGuides #formDistrictSpr').val());
					}else{
						formData.append('id_spr_district', $('#openModalGuides #formDistrictSpr').val());
					}
					formData.append('district_by_city', $('#openModalGuides #formDistrictSpr option:selected').text());					
					/*formData.append('key_region', $('#openModalGuides #is_region').val());
					formData.append('key_district', $('#openModalGuides #is_district').val());
					formData.append('key_admin', $('#openModalGuides #is_admin').val());*/
					formData.append('guides_place', $('#guides_place').val());
				}else{

					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#city_name').val()).length == 0){
						$('#city_name').addClass("formError");
					}
					if($('#openModalGuides #formRegionSpr').val() == 0){
						$('#openModalGuides #formRegionSpr').addClass("formError");
					}
					if($('#openModalGuides #formDistrictSpr').val() == 0){
						$('#openModalGuides #formDistrictSpr').addClass("formError");
					}					
				}



		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_CityFact = $("#formCityFact").html();
		spr_select_CityPost = $("#formCityPost").html();
		spr_select_City = $("#formCity").html();
		spr_select_CityObject = $("#formCityObject").html();
		guides_place = $('#guides_place').val(); //добавляем ответ либо в select либо в таблицу

      $.ajax({
            url: '/ARM/basis/guides/add_city/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
console.log(result);

				if(id_edit>0){
						
						
						$('tr.item-'+id_edit+' td[name="city_name"]').html(city_name);
						$('tr.item-'+id_edit+' td[name="region_by_city"]').html(name_region_by_city);
						$('tr.item-'+id_edit+' td[name="region_by_city"]').attr('regionNameFact',type_region_by_city);
						$('tr.item-'+id_edit+' td[name="district_by_city"]').html(name_district_by_city);
						$('tr.item-'+id_edit+' td[name="district_by_city"]').attr('districtNameFact',type_district_by_city);
						
					/*	$('tr.item-'+id_edit+' td[name="is_region"]').html(is_region == 1 ? 'да' : 'нет');
						$('tr.item-'+id_edit+' td[name="is_region"]').attr('key_region', (is_region == 1 ? 1 : 0));
						
						$('tr.item-'+id_edit+' td[name="is_district"]').html(is_district == 1 ? 'да' : 'нет');
						$('tr.item-'+id_edit+' td[name="is_district"]').attr('key_district',(is_district == 1 ? 1 : 0));
						
						$('tr.item-'+id_edit+' td[name="is_admin"]').html(is_admin == 1 ? 'да' : 'нет');
						$('tr.item-'+id_edit+' td[name="is_admin"]').attr('key_admin',(is_admin == 1 ? 1 : 0));*/
		
				}else{	
			
					  		if(guides_place == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								
								spr_select1 = spr_select_CityFact + result;
								spr_select2 = spr_select_CityPost + result;
								spr_select3 = spr_select_City + result;
								spr_select4 = spr_select_CityObject + result;
								$("#formCityFact").html(spr_select1);
								$("#formCityPost").html(spr_select2);
								$("#formCity").html(spr_select3);
								$("#formCityObject").html(spr_select4);
							}
				} 

            }
        });
		
		if($("input[name='is_admin']").prop('checked')){
			  
			  $.ajax({
					url: '/ARM/basis/guides/add_adminBycity/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){

					}
				});		
		}
		if($("input[name='is_region']").prop('checked')){
			  
			  $.ajax({
					url: '/ARM/basis/guides/add_regionBycity/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){

					}
				});		
		}
		if($("input[name='is_district']").prop('checked')){
			  
			  $.ajax({
					url: '/ARM/basis/guides/add_districtBycity/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
//console.log(result);
					}
				});		
		}		
		
				
				if(($('#openModalGuides #city_name').val()).length > 0 && ($('#openModalGuides #formRegionSpr').val()) > 0 && ($('#openModalGuides #formDistrictSpr').val()) > 0){
					$("#openModalGuides select[name='regionNameSpr']").val('');				
					$("#openModalGuides input[name='city_name']").val('');
					$("#openModalGuides select[name='districtNameSpr']").val('');
					$('#openModalGuides #messenger_modal').html("");
					$('#openModalGuides #formRegionSpr').removeClass("formError");
					$('#openModalGuides #formDistrictSpr').removeClass("formError");
					$('#openModalGuides #city_name').removeClass("formError");
					guides.closeModalWindow();
					
				}



		
	
    },
	

	/************************ добавление в справочник районов города ***********************************************/
	add_city_zone: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_city_zone"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('name', $('#city_zone_name').val());
				formData.append('id_spr_region', $('#formRegionFact').val());
				formData.append('region_by_city_zone', $('#formRegionFact option:selected').text());	
				formData.append('id_spr_district', $('#formDistrictFact').val());
				formData.append('district_by_city_zone', $('#formDistrictFact option:selected').text());*/					
	

				var err_text = "";		
				if(($('#city_zone_name').val()).length > 0 && ($('#formRegionFact').val()).length > 0 && ($('#formDistrictFact').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#city_zone_name').val());
					formData.append('id_spr_region', $('#formRegionFact').val());
					formData.append('region_by_city_zone', $('#formRegionFact option:selected').text());	
					formData.append('id_spr_district', $('#formDistrictFact').val());
					formData.append('district_by_city_zone', $('#formDistrictFact option:selected').text());
					if($('#formDistrictFact').val() > 0){
						formData.append('id_spr_city', $('#formCityFact').val());
					}else{
						formData.append('id_spr_city', $('#openModalGuides #formCityFact').val());
					}

					formData.append('city_by_city_zone', $('#formCityFact option:selected').text());				
					formData.append('guides_place', $('#guides_place').val());				
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#city_zone_name').val()).length == 0){
						$('#city_zone_name').addClass("formError");
					}
					if($('#formRegionFact').val() == 0){
						$('#formRegionFact').addClass("formError");
					}
					if($('#formDistrictFact').val() == 0){
						$('#formDistrictFact').addClass("formError");
					}
					if($('#formCityFact').val() == 0){
						$('#formCityFact').addClass("formError");
					}
								
				}	
				

				
		
		var city_zone_name = $('input#city_zone_name').val();
		var type_region_by_city_zone = $('input#formRegionFact').val();
		var name_region_by_city_zone = $('#formRegionFact option:selected').text();
		var type_district_by_city_zone = $('input#formDistrictFact').val();
		var name_district_by_city_zone = $('#formDistrictFact option:selected').text();		
		var type_city_by_city_zone = $('input#formCityFact').val();
		var name_city_by_city_zone = $('#formCityFact option:selected').text();
		
		
		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_CityZoneFact = $("#formCityZoneFact").html();
		spr_select_CityZonePost = $("#formCityZonePost").html();
		spr_select_CityZone = $("#formCityZone").html();
		spr_select_CityZoneObject = $("#formCityZoneObject").html();

	 $.ajax({
            url: '/ARM/basis/guides/add_city_zone/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

				if(id_edit>0){
						$('tr.item-'+id_edit+' td[name="city_zone_name"]').html(city_zone_name);
						$('tr.item-'+id_edit+' td[name="region_by_city_zone"]').html(name_region_by_city_zone);
						$('tr.item-'+id_edit+' td[name="region_by_city_zone"]').attr('region_city_zone',$('#formRegionFact').val());
						$('tr.item-'+id_edit+' td[name="district_by_city_zone"]').html(name_district_by_city_zone);
						$('tr.item-'+id_edit+' td[name="district_by_city_zone"]').attr('district_city_zone',$('#formDistrictFact').val());
						$('tr.item-'+id_edit+' td[name="city_by_city_zone"]').html(name_city_by_city_zone);
						$('tr.item-'+id_edit+' td[name="city_by_city_zone"]').attr('city_city_zone',$('#formCityFact').val());
				}else{			  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select1 = spr_select_CityZoneFact + result;
								spr_select2 = spr_select_CityZonePost + result;
								spr_select3 = spr_select_CityZone + result;
								spr_select4 = spr_select_CityZoneObject + result;
								$("#formCityZoneFact").html(spr_select1);
								$("#formCityZonePost").html(spr_select2);
								$("#formCityZone").html(spr_select3);
								$("#formCityZoneObject").html(spr_select4);
							}
				} 

					/*$("input[name='id_city_zone']").val('');				
					$("input[name='city_zone_name']").val('');
					$("select[name='regionNameFact']").val('');
					$("select[name='districtNameFact']").val('');
					$("select[name='cityNameFact']").val('');

					guides.closeModalWindow();*/
					
					
				if(($('#city_zone_name').val()).length > 0 && ($('#formRegionFact').val()).length > 0 && ($('#formDistrictFact').val()).length > 0 && ($('#formCityFact').val()).length > 0){
					$("input[name='id_city_zone']").val('');				
					$("input[name='city_zone_name']").val('');
					$("select[name='regionNameFact']").val('');
					$("select[name='districtNameFact']").val('');
					$("select[name='cityNameFact']").val('');
					$('#messenger_modal').html("");
					$('#city_zone_name').removeClass("formError");
					$('#formRegionFact').removeClass("formError");
					$('#formDistrictFact').removeClass("formError");
					$('#formCityFact').removeClass("formError");
				
					
					
					guides.closeModalWindow();
					
				}
			
			
			
			
			}
        });

	
		
		
	
    },

	/************************ добавление в справочник отделов/РЭГИ ***********************************************/
	add_otdel: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_otdel"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('otdel_name', $('#otdel_name').val());
				formData.append('otdel_adress', $('#otdel_adress').val());
				formData.append('otdel_phone_cod', $('#otdel_phone_cod').val());
				formData.append('otdel_phone', $('#otdel_phone').val());
				formData.append('otdel_fax', $('#otdel_fax').val());
				formData.append('otdel_email', $('#otdel_email').val());
				formData.append('otdel_sokr_name', $('#otdel_sokr_name').val());
				if($('#formBranchObject').val() > 0){
					formData.append('id_spr_branch', $('#formBranchObject').val());
				}else{
					formData.append('id_spr_branch', $('#openModalGuides #formBranchObject').val());
				}
				formData.append('branch_name', $('#formBranchObject option:selected').text());
				if($('#formPodrazdelenieObject').val() > 0){
					formData.append('id_spr_podrazd', $('#formPodrazdelenieObject').val());
				}else{
					formData.append('id_spr_podrazd', $('#openModalGuides #formPodrazdelenieObject').val());
				}

				formData.append('podrazd_name', $('#formPodrazdelenieObject option:selected').text());
				formData.append('guides_place', $('#guides_place').val());*/



				var err_text = "";		
				if(($('#otdel_name').val()).length > 0 && ($('#otdel_adress').val()).length > 0 && ($('#otdel_phone_cod').val()).length > 0 && ($('#otdel_phone').val()).length > 0 && ($('#otdel_fax').val()).length > 0 && ($('#otdel_email').val()).length > 0 && ($('#otdel_sokr_name').val()).length > 0 && ($('#formBranchObject').val()).length > 0 && ($('#formPodrazdelenieObject').val()).length > 0){
						formData.append('id', id_edit);				
						formData.append('otdel_name', $('#otdel_name').val());
						formData.append('otdel_adress', $('#otdel_adress').val());
						formData.append('otdel_phone_cod', $('#otdel_phone_cod').val());
						formData.append('otdel_phone', $('#otdel_phone').val());
						formData.append('otdel_fax', $('#otdel_fax').val());
						formData.append('otdel_email', $('#otdel_email').val());
						formData.append('otdel_sokr_name', $('#otdel_sokr_name').val());
						if($('#formBranchObject').val() > 0){
							formData.append('id_spr_branch', $('#formBranchObject').val());
						}else{
							formData.append('id_spr_branch', $('#openModalGuides #formBranchObject').val());
						}
						formData.append('branch_name', $('#formBranchObject option:selected').text());
						if($('#formPodrazdelenieObject').val() > 0){
							formData.append('id_spr_podrazd', $('#formPodrazdelenieObject').val());
						}else{
							formData.append('id_spr_podrazd', $('#openModalGuides #formPodrazdelenieObject').val());
						}

						formData.append('podrazd_name', $('#formPodrazdelenieObject option:selected').text());
						formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#otdel_name').val()).length == 0){
						$('#otdel_name').addClass("formError");
					}
					if(($('#otdel_adress').val()).length == 0){
						$('#otdel_adress').addClass("formError");
					}
					if(($('#otdel_phone_cod').val()).length == 0){
						$('#otdel_phone_cod').addClass("formError");
					}
					if(($('#otdel_phone').val()).length == 0){
						$('#otdel_phone').addClass("formError");
					}
					if(($('#otdel_fax').val()).length == 0){
						$('#otdel_fax').addClass("formError");
					}
					if(($('#otdel_email').val()).length == 0){
						$('#otdel_email').addClass("formError");
					}
					if(($('#otdel_sokr_name').val()).length == 0){
						$('#otdel_sokr_name').addClass("formError");
					}
					if(($('#formBranchObject').val()).length == 0){
						$('#formBranchObject').addClass("formError");
					}
					if(($('#formPodrazdelenieObject').val()).length == 0){
						$('#formPodrazdelenieObject').addClass("formError");
					}					
				}
				
		
		var otdel_name = $('input#otdel_name').val();
		var otdel_adress = $('input#otdel_adress').val();
		var otdel_phone_cod = $('input#otdel_phone_cod').val();
		var otdel_phone = $('input#otdel_phone').val();
		var otdel_fax = $('input#otdel_fax').val();
		var otdel_email = $('input#otdel_email').val();
		var otdel_sokr_name = $('input#otdel_sokr_name').val();
		var type_branch_by_otdel = $('input#formBranchObject').val();
		var name_branch_by_otdel = $('#formBranchObject option:selected').text();
		var type_podrazd_by_otdel = $('input#formPodrazdelenieObject').val();
		var name_podrazd_by_otdel = $('#formPodrazdelenieObject option:selected').text();		
		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_OtdelObject = $("#formOtdelObject").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_otdel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
					
					$('tr.item-'+id_edit+' td[name="branch_by_otdel"]').html(name_branch_by_otdel);
					$('tr.item-'+id_edit+' td[name="branch_by_otdel"]').attr('type_branch_otdel',$('#formBranchObject').val());
					$('tr.item-'+id_edit+' td[name="podrazd_by_otdel"]').html(name_podrazd_by_otdel);
					$('tr.item-'+id_edit+' td[name="podrazd_by_otdel"]').attr('type_podrazd_otdel',$('#formPodrazdelenieObject').val());
					$('tr.item-'+id_edit+' td[name="otdel_name"]').html(otdel_name);
					$('tr.item-'+id_edit+' td[name="otdel_adress"]').html(otdel_adress);
					$('tr.item-'+id_edit+' td[name="otdel_phone_cod"]').html(otdel_phone_cod);
					$('tr.item-'+id_edit+' td[name="otdel_phone"]').html(otdel_phone);
					$('tr.item-'+id_edit+' td[name="otdel_fax"]').html(otdel_fax);
					$('tr.item-'+id_edit+' td[name="otdel_email"]').html(otdel_email);
					$('tr.item-'+id_edit+' td[name="otdel_sokr_name"]').html(otdel_sokr_name);

			}else{			  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_OtdelObject + result;
								$("#formOtdelObject").html(spr_select);

							}
					  
					  
					  
					  
					  
			} 
				/*$("input[name='id_otdel']").val('');				
			    $("input[name='otdel_name']").val('');
				$("input[name='otdel_adress']").val('');
				$("input[name='otdel_phone_cod']").val('');
				$("input[name='otdel_phone']").val('');
				$("input[name='otdel_fax']").val('');
				$("input[name='otdel_email']").val('');
				$("input[name='otdel_sokr_name']").val('');
				$("select[name='branchNameObject']").val('');
				$("select[name='podrazdelenieNameObject']").val('');


				guides.closeModalWindow();*/
				
				
				if(($('#otdel_name').val()).length > 0 && ($('#otdel_adress').val()).length > 0 && ($('#otdel_phone_cod').val()).length > 0 && ($('#otdel_phone').val()).length > 0 && ($('#otdel_fax').val()).length > 0 && ($('#otdel_email').val()).length > 0 && ($('#otdel_sokr_name').val()).length > 0 && ($('#formBranchObject').val()).length > 0 && ($('#formPodrazdelenieObject').val()).length > 0){
					$("input[name='id_otdel']").val('');				
					$("input[name='otdel_name']").val('');
					$("input[name='otdel_adress']").val('');
					$("input[name='otdel_phone_cod']").val('');
					$("input[name='otdel_phone']").val('');
					$("input[name='otdel_fax']").val('');
					$("input[name='otdel_email']").val('');
					$("input[name='otdel_sokr_name']").val('');
					$("select[name='branchNameObject']").val('');
					$("select[name='podrazdelenieNameObject']").val('');
					$('#messenger_modal').html("");
					$('#otdel_name').removeClass("formError");
					$('#otdel_adress').removeClass("formError");
					$('#otdel_phone_cod').removeClass("formError");
					$('#otdel_phone').removeClass("formError");
					$('#otdel_fax').removeClass("formError");
					$('#otdel_email').removeClass("formError");
					$('#otdel_sokr_name').removeClass("formError");
					$('#formBranchObject').removeClass("formError");
					$('#formPodrazdelenieObject').removeClass("formError");
				
					
					
					guides.closeModalWindow();
					
				}
				
				
				
				
            }
        });
	
    },



	/************************ добавление в справочник МрО ***********************************************/
	add_podrazdelenie: function() {
		event.preventDefault();
		var formData = new FormData();
		var id_edit = $('input[name="id_podrazdelenie"]').val();
				
				/*formData.append('id', id_edit);				
				formData.append('podrazdelenie_name', $('#podrazdelenie_name').val());
				formData.append('podrazdelenie_adress', $('#podrazdelenie_adress').val());
				formData.append('podrazdelenie_phone_cod', $('#podrazdelenie_phone_cod').val());
				formData.append('podrazdelenie_phone', $('#podrazdelenie_phone').val());
				formData.append('podrazdelenie_fax', $('#podrazdelenie_fax').val());
				formData.append('podrazdelenie_email', $('#podrazdelenie_email').val());
				formData.append('podrazdelenie_sokr_name', $('#podrazdelenie_sokr_name').val());
				formData.append('id_spr_branch', $('#podrazdelenie_branch').val());
				formData.append('branch_name', $('#podrazdelenie_branch option:selected').text());
				formData.append('guides_place', $('#guides_place').val());*/
				
				
				var err_text = "";		
				if(($('#podrazdelenie_name').val()).length > 0 && ($('#podrazdelenie_adress').val()).length > 0 && ($('#podrazdelenie_phone_cod').val()).length > 0 && ($('#podrazdelenie_phone').val()).length > 0 && ($('#podrazdelenie_fax').val()).length > 0 && ($('#podrazdelenie_email').val()).length > 0 && ($('#podrazdelenie_sokr_name').val()).length > 0 && ($('#podrazdelenie_branch').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('podrazdelenie_name', $('#podrazdelenie_name').val());
					formData.append('podrazdelenie_adress', $('#podrazdelenie_adress').val());
					formData.append('podrazdelenie_phone_cod', $('#podrazdelenie_phone_cod').val());
					formData.append('podrazdelenie_phone', $('#podrazdelenie_phone').val());
					formData.append('podrazdelenie_fax', $('#podrazdelenie_fax').val());
					formData.append('podrazdelenie_email', $('#podrazdelenie_email').val());
					formData.append('podrazdelenie_sokr_name', $('#podrazdelenie_sokr_name').val());
					formData.append('id_spr_branch', $('#podrazdelenie_branch').val());
					formData.append('branch_name', $('#podrazdelenie_branch option:selected').text());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					if(($('#podrazdelenie_name').val()).length == 0){
						$('#podrazdelenie_name').addClass("formError");
					}
					if(($('#podrazdelenie_adress').val()).length == 0){
						$('#podrazdelenie_adress').addClass("formError");
					}
					if(($('#podrazdelenie_phone_cod').val()).length == 0){
						$('#podrazdelenie_phone_cod').addClass("formError");
					}
					if(($('#podrazdelenie_phone').val()).length == 0){
						$('#podrazdelenie_phone').addClass("formError");
					}
					if(($('#podrazdelenie_fax').val()).length == 0){
						$('#podrazdelenie_fax').addClass("formError");
					}
					if(($('#podrazdelenie_email').val()).length == 0){
						$('#podrazdelenie_email').addClass("formError");
					}
					if(($('#podrazdelenie_sokr_name').val()).length == 0){
						$('#podrazdelenie_sokr_name').addClass("formError");
					}
					if($('#podrazdelenie_branch').val() == 0){
						$('#podrazdelenie_branch').addClass("formError");
					}					
				}				
				
		
		var podrazdelenie_name = $('input#podrazdelenie_name').val();
		var podrazdelenie_adress = $('input#podrazdelenie_adress').val();
		var podrazdelenie_phone_cod = $('input#podrazdelenie_phone_cod').val();
		var podrazdelenie_phone = $('input#podrazdelenie_phone').val();
		var podrazdelenie_fax = $('input#podrazdelenie_fax').val();
		var podrazdelenie_email = $('input#podrazdelenie_email').val();
		var podrazdelenie_sokr_name = $('input#podrazdelenie_sokr_name').val();
		var type_branch_by_podrazdelenie = $('input#podrazdelenie_branch').val();
		var name_branch_by_podrazdelenie = $('#podrazdelenie_branch option:selected').text();
	
		
		str_tbody_first = $("#spr_guides tbody").html();
		spr_select_PodrazdelenieObject = $("#formPodrazdelenieObject").html();		

      $.ajax({
            url: '/ARM/basis/guides/add_podrazdelenie/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
					
					$('tr.item-'+id_edit+' td[name="branch_by_podrazdelenie"]').html(name_branch_by_podrazdelenie);
					$('tr.item-'+id_edit+' td[name="branch_by_podrazdelenie"]').attr('type_branch_podrazdelenie',$('#podrazdelenie_branch').val());
					$('tr.item-'+id_edit+' td[name="podrazdelenie_name"]').html(podrazdelenie_name);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_adress"]').html(podrazdelenie_adress);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_phone_cod"]').html(podrazdelenie_phone_cod);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_phone"]').html(podrazdelenie_phone);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_fax"]').html(podrazdelenie_fax);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_email"]').html(podrazdelenie_email);
					$('tr.item-'+id_edit+' td[name="podrazdelenie_sokr_name"]').html(podrazdelenie_sokr_name);

			}else{			  
					 					  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_PodrazdelenieObject + result;
								$("#formPodrazdelenieObject").html(spr_select);

							}
					  
					  
					  
			} 
				/*$("input[name='id_podrazdelenie']").val('');				
			    $("input[name='podrazdelenie_name']").val('');
				$("input[name='podrazdelenie_adress']").val('');
				$("input[name='podrazdelenie_phone_cod']").val('');
				$("input[name='podrazdelenie_phone']").val('');
				$("input[name='podrazdelenie_fax']").val('');
				$("input[name='podrazdelenie_email']").val('');
				$("input[name='podrazdelenie_sokr_name']").val('');
				$("select[name='podrazdelenie_branch']").val('');

				guides.closeModalWindow();*/
				
				
				
				if(($('#podrazdelenie_name').val()).length > 0 && ($('#podrazdelenie_adress').val()).length > 0 && ($('#podrazdelenie_phone_cod').val()).length > 0 && ($('#podrazdelenie_phone').val()).length > 0 && ($('#podrazdelenie_fax').val()).length > 0 && ($('#podrazdelenie_email').val()).length > 0 && ($('#podrazdelenie_sokr_name').val()).length > 0 && ($('#podrazdelenie_branch').val()).length > 0){
					$("input[name='id_podrazdelenie']").val('');				
					$("input[name='podrazdelenie_name']").val('');
					$("input[name='podrazdelenie_adress']").val('');
					$("input[name='podrazdelenie_phone_cod']").val('');
					$("input[name='podrazdelenie_phone']").val('');
					$("input[name='podrazdelenie_fax']").val('');
					$("input[name='podrazdelenie_email']").val('');
					$("input[name='podrazdelenie_sokr_name']").val('');
					$("select[name='podrazdelenie_branch']").val('');
					$('#messenger_modal').html("");
					$('#podrazdelenie_name').removeClass("formError");
					$('#podrazdelenie_adress').removeClass("formError");
					$('#podrazdelenie_phone_cod').removeClass("formError");
					$('#podrazdelenie_phone').removeClass("formError");
					$('#podrazdelenie_fax').removeClass("formError");
					$('#podrazdelenie_email').removeClass("formError");
					$('#podrazdelenie_sokr_name').removeClass("formError");
					$('#podrazdelenie_branch').removeClass("formError");

				
					
					
					guides.closeModalWindow();
					
				}
				
				
				
            }
        });
	
    },


	closeModalWindow: function(){
		$('#openModalGuidesFromSubject').fadeOut(300);
		$('#openModalGuides').fadeOut(300);
		$('#openModalGuides_overlay').fadeOut(300);
		$('#openModalGuides input').val('');
		$('#openModalGuides select option[value=0]').prop('selected', true);
		$('#openModalGuides .p_og_flue').text('Новая запись');
		$('#openModalGuides input').val('');
		$('#openModalGuides input[name="guides_place"]').val(2);
		$('#openModalGuides .add_btn').text('Добавить'); // просто меняем название кнопки
		$('#openModalGuidesFromSubject_overlay').fadeOut(300);
	},







/**************************** удаление записи из вправочника*************************************/
	remove: function(itemId) {
 

 
	    if(!confirm('Вы действительно хотите удалить данную запись?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
		formData.append('name_table', $('#spr_guides').attr('name_table'));
	  
	    if (itemId < 1) {
            return false;
        }
	  
	  
	  
			$.ajax({
				url: '/ARM/basis/guides/removeItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					$('.item-' + itemId).remove();
				}
			});
	


	},

/*********************************** обработка чекбоксов в справочнике городов ****************************/
	is_region: function() {
		if($("input[name='is_region']").prop('checked')){
			$("input[name='is_region']").prop('value', 1);
		}else{
			$("input[name='is_region']").prop('value', 0);
		}
		
	},
	is_district: function() {
		if($("input[name='is_district']").prop('checked')){
			$("input[name='is_district']").prop('value', 1);
		}else{
			$("input[name='is_district']").prop('value', 0);
		}
		
	},
	is_admin: function() {
		if($("input[name='is_admin']").prop('checked')){
			$("input[name='is_admin']").prop('value', 1);
		}else{
			$("input[name='is_admin']").prop('value', 0);
		}
		
	}	



	
	
};

