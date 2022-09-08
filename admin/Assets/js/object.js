var object = {
    ajaxMethod: 'POST',

/********************************************************************************************/
    add: function(param) {
		event.preventDefault();
		
		formData = object.formDataInfo();

		error = object.checkFields();

	if(error == 0){		
      $.ajax({
            url: '/ARM/objects/add/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
				
				if(param == 'cancel'){
					window.location = '/ARM/objects/list/'+$('#subject_id').val().trim();
				}else{
					alert('Данные сохранены');
					$('button.obj_bttn_add').attr('onclick','object.update("cancel")');
					$('button.obj_bttn_upd').attr('onclick','object.update("continue")');
					$('input#formObjectId').val(result);
				}
			 //console.log(result);
            }
        });
	}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
	};	
    },
/********************************************************************************************/
    update: function(param) {
		event.preventDefault();
		
        formData = object.formDataInfo();
		
		/*for (var value of formData.values()) {
				console.log(value);
				}*/
		
		error = object.checkFields();

		if(error == 0){		

			$.ajax({
				url: '/ARM/objects/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				//console.log(result);
				if(param == 'cancel'){
					window.location = '/ARM/objects/list/'+$('#subject_id').val().trim();
				}else{
					alert('Данные сохранены');
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
		if($("#formPage").attr("mode") == "new_object" || $("#formPage").attr("mode") == "edit_object"){
			var fields = ["name_object"];
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
       
	    if(!confirm('Вы действительно хотите удалить данный объект?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        }
	  
	  
	  
			$.ajax({
				url: '/ARM/objects/removeItem/',
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
	
	removeTableItem: function(tableName,itemId) {
		event.preventDefault();
       
	    if(!confirm('Вы действительно хотите удалить данный объект?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('table_name', tableName);
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        };
	  
			$.ajax({
				url: '/ARM/objects/removeTableItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log($('table#'+tableName+' td[id_'+tableName+'='+itemId+']'));
					$('table#'+tableName+' tr[id_'+tableName+'="'+itemId+'"]').remove();
				}
			});
	


	},
	
	subjectInfo: function(subjectId){
		
		var formData = new FormData();
		formData.append('subject_id', subjectId);
		
		$.ajax({
				url: '/ARM/subject/info/'+subjectId,
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					
					data = $.parseJSON(result);
					//console.log(data);
					
					$('#delo').html(data['subject']['num_case_s']);
					$('#name_subj').html(data['subject']['name']);
					$('#property').html(data['properties']['name']);
					$('#department').html(data['departments']['name_ved']);
					
					

					$('#place_adress').html(((data['subject']['place_address_index']).length > 0 ? data['subject']['place_address_index']+", " : "")+(data['regions'] != null ? data['regions']['name']+", " : "")+(data['districts'] != null ? data['districts']['name']+" р-н, " : "")+(data['cities'] != null ? data['cities']['name']+", " : "")+(data['citiesZone'] != null ? data['citiesZone']['name']+", " : "")+((data['subject']['place_address_street']).length > 0 ? data['subject']['place_address_street']+"-" : "")+((data['subject']['place_address_building']).length > 0 ? data['subject']['place_address_building']+"-" : "")+((data['subject']['place_address_flat']).length > 0 ? data['subject']['place_address_flat'] : ""));					
					
			
					$('#post_adress').html(((data['subject']['post_address_index']).length > 0 ? data['subject']['post_address_index']+", " : "")+(data['regionsPost'] != null ? data['regionsPost']['name']+", " : "")+(data['districtsPost'] != null ? data['districtsPost']['name']+" р-н, " : "")+(data['citiesPost'] != null ? data['citiesPost']['name']+", " : "")+(data['citiesZonePost'] != null ? data['citiesZonePost']['name']+", " : "")+((data['subject']['post_address_street']).length > 0 ? data['subject']['post_address_street']+"-" : "")+((data['subject']['post_address_building']).length > 0 ? data['subject']['post_address_building']+"-" : "")+((data['subject']['post_address_flat']).length > 0 ? data['subject']['post_address_flat'] : ""));
					
					
			
					
					$('#insp_t').html(data['usersTeplo'] != null ? data['usersTeplo']['fio'] : "");
					$('#insp_e').html(data['usersElectro'] != null ? data['usersElectro']['fio'] : "");
					$('#insp_g').html(data['usersGaz'] != null ? data['usersGaz']['fio'] : "");
					
					
					
				}
			});
		
	},
	
	objectInfo: function(objectsId){
		event.preventDefault();
		var formData = new FormData();
		formData.append('objects_id', objectsId);
		$.ajax({
				url: '/ARM/objects/info/'+objectsId,
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
					//console.log(data['objects']['id_reestr_subject']);
					//console.log(data);
			/**********Основная информация************/
					$('#delo_news').html(data['objects']['id_reestr_subject']);
					$('#num_case_o').html(data['objects']['num_case_o']);
					$('#name').html(data['objects']['name']);
					$('#names').html(data['objects']['name']);
					$('#admin_spr').html(data['adm_r'] != null ? data['adm_r']['name'] : "");
					$('#mesto_object').html((data['br']!= null ? data['br']['name'] : "")+(data['podr'] != null ? ", "+data['podr']['name_podrazd'] : "")+(data['otd'] != null ? ", "+data['otd']['name_otdel'] : ""));
					$('#adress_object').html((data['objects']['address_index']!= null ? data['objects']['address_index'] : "")+(data['regions'] != null ? ", "+data['regions']['name'] : "")+(data['districts'] != null ? ", "+data['districts']['name']+" р-н" : "")+(data['cities'] != null ? ", "+data['cities']['name'] : "")+(data['citiesZone'] != null ? ", "+data['citiesZone']['name'] : "")+(data['objects']['address_street']!= null ? ", "+data['objects']['address_street'] : "")+(data['objects']['address_building']!= null  ? "-"+data['objects']['address_building'] : "")+(data['objects']['address_flat']!= null ? "-"+data['objects']['address_flat'] : ""));
					
			/**********Электро*********************/
					$('#insp_e').html(data['usersElectro'] != null ? data['usersElectro']['fio'] : "");
					$('#e_subob').html(data['objects']['e_subobj'] == 1 ? "да" : "нет");		
					$('#e_subobj_subject').html((data['e_subobj_obj'] != null ? data['e_subobj_obj']['name']+" " : "")+(data['e_subobj_subject'] != null ? "("+data['e_subobj_subject']['name']+")" : ""));		
		
						var cat_1 = parseFloat((data['objects']['e_cat_1']));
						var cat_2 = parseFloat((data['objects']['e_cat_2']));
						var cat_3 = parseFloat((data['objects']['e_cat_3']));

							if (isNaN(cat_1)) { cat_1 = 0;}
							if (isNaN(cat_2)) { cat_2 = 0;}
							if (isNaN(cat_3)) { cat_3 = 0;}

							sum =cat_1+cat_2+cat_3; 				
							$('#e_power').html(sum);

					$('#e_district').html(data['objects']['e_district']);
					$('#e_armor').html(data['objects']['e_armor'] == 1 ? "есть" : "нет");
					$('#e_armor_crach').html(data['objects']['e_armor_crach']);
					$('#e_armor_tech').html(data['objects']['e_armor_tech']);
					$('#e_armor_time').html(data['objects']['e_armor_time']);

					var now = data['objects']['e_armor_date'];
					if (now != null){
						d1 = now.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
						$('#e_armor_date').html(d1);
					}else{
						$('#e_armor_date').html("");
					}					
					
					var sum1 = parseFloat(data['objects']['e_cat_1']);
					var sum2 = parseFloat(data['objects']['e_cat_2']);
					var sum3 = parseFloat(data['objects']['e_cat_3']);
					
						
					if (isNaN(sum1)) { sum1 = 0;}
					if (isNaN(sum2)) { sum2 = 0;}
					if (isNaN(sum3)) { sum3 = 0;}
					
				
					sum =sum1+sum2+sum3;
					$('#sum_power').html(sum);
					$('#e_cat_1').html(data['objects']['e_cat_1']);
					$('#e_cat_1plus').html(data['objects']['e_cat_1plus']);
					$('#e_cat_2').html(data['objects']['e_cat_2']);
					$('#e_cat_3').html(data['objects']['e_cat_3']);
					
					
					$('#numrow_avrs').html('Всего: '+data['obj_oe_avrs'].length+' шт.');
					
					str_table_avr = '';
					$.each(data['obj_oe_avrs'], function(i,val){
						date_avr = val['date'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
						str_table_avr =str_table_avr+"<tr><td>"+val['place']+"</td><td>"+val['power']+"</td><td>"+val['time']+"</td><td>"+date_avr+"</td></tr>";
					})
					$("#obj_oe_avr_info tbody").html(str_table_avr);
				/** Таблица субабоненты **/
				if(data['subobj_data'].length > 0){
				str_table_subobj = "<table class='cwdtable' cellspacing='0' cellpadding='1' border='1'>";
				str_table_subobj = 	str_table_subobj + "<thead><tr>";
				str_table_subobj = 	str_table_subobj + "<th>Место</th>";
				str_table_subobj = 	str_table_subobj + "<th>Мощность установленная(разрешенная)</th>";
				str_table_subobj = 	str_table_subobj + "<th>Категорийность надежности</th>";
				str_table_subobj = 	str_table_subobj + "<th>Профиль работ</th></tr></thead><tbody>";
													
					$.each(data['subobj_data'], function(i,val){
						str_table_subobj =str_table_subobj+"<tr><td>"+val['reestr_object_name']+" ("+val['reestr_subject_name']+") <br/>";
						
						if(val['spr_region_name'] != null){
							str_table_subobj =str_table_subobj+"<span class='font-size-11'>"+val['address_index']+", "+val['spr_region_name']+", "+val['spr_district_name']+" р-н, "+val['spr_city_name']+", "+val['address_street']+", "+val['address_building']+", "+val['address_flat']+"</span>";
						}
						str_table_subobj =str_table_subobj+"</td><td></td><td>";
						if(val['reestr_object_e_cat_1plus']>0){
							str_table_subobj_ecat = '1 особая';
						}else if(val['reestr_object_e_cat_1']>0){
							str_table_subobj_ecat = '1 категория';
						}else if(val['reestr_object_e_cat_2']>0){
							str_table_subobj_ecat = '2 категория';
						}else if(val['reestr_object_e_cat_3']>0){
							str_table_subobj_ecat = '3 категория';
						}else{
							str_table_subobj_ecat = '-';
						}
						str_table_subobj =str_table_subobj+str_table_subobj_ecat;
						
						str_table_subobj =str_table_subobj+"</td><td>"+val['spr_kind_of_activity_name']+"</td></tr>";
					})
					str_table_subobj =str_table_subobj+ "</tbody></table>";
					$("#table_subobj").html(str_table_subobj);	
				
				}
				
					str_table_aie = '';
					$.each(data['obj_oe_aies'], function(i,val){
						date_aie = val['date_last'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
						str_table_aie =str_table_aie+"<tr><td>"+val['name']+"</td><td>"+val['type']+"</td><td>"+val['power']+"</td><td>"+val['factory']+"</td><td>"+val['year']+"</td><td>"+date_aie+"</td><td>"+val['place']+"</td></tr>";
					})
					$("#obj_oe_aie tbody").html(str_table_aie);


					$('#numrow_trps').html('Всего: '+data['obj_oe_trps'].length+' шт.');
					str_table_trps = '';
					$.each(data['obj_oe_trps'], function(i,val){
						str_table_trps =str_table_trps+"<tr><td>"+val['name']+"</td><td>"+val['id_type']+"</td><td>"+val['power']+"</td><td>"+val['volt']+"</td><td>"+val['year_begin']+"</td></tr>";
					})
					$("#obj_oe_tp tbody").html(str_table_trps);

					str_table_klvl = '';
					$.each(data['obj_oe_klvls'], function(i,val){
						str_table_klvl =str_table_klvl+"<tr><td>"+val['spr_oe_klvl_type_name']+"</td><td>"+val['spr_oe_klvl_volt_name']+"</td><td>"+val['name']+"</td><td>"+val['mark']+"</td><td>"+val['length']+"</td><td>"+val['name_center']+"</td><td>"+val['year']+"</td></tr>";
					})
					$("#obj_oe_klvl tbody").html(str_table_klvl);
					
					
					str_table_block = '';
					$.each(data['obj_oe_blocks'], function(i,val){
						str_table_block =str_table_block+"<tr><td>"+val['name']+"</td><td>"+val['power']+"</td><td>"+val['spr_oe_energy_type_name']+"</td><td>"+(val['add_load'] == 1 ? "да" : "нет")+"</td></tr>";
					})
					$("#obj_oe_block tbody").html(str_table_block);	
					
					$('#e_flood').html(data['objects']['e_flooding'] == 1 ? "да" : "нет");			
					
			/**********Тепло*********************/				
				if(data['objects']['t_is'] == 1){					
					$('#is_t_info').html("Информация по объекту теплотехнической энергии");
					$('#insp_t').html(data['usersTeplo'] != null ? data['usersTeplo']['fio'] : "-");
					$('#t_armor').html(data['objects']['t_armor'] == 1 ? "есть" : "нет");
					$('#t_armor_crach').html(data['objects']['t_armor_crach'] != null ? data['objects']['t_armor_crach'] : "-");
					$('#t_armor_crach_vapor').html(data['objects']['t_armor_crach_vapor'] != null ? data['objects']['t_armor_crach_vapor'] : "-");
					$('#t_armor_tech').html(data['objects']['t_armor_tech'] != null ? data['objects']['t_armor_tech'] : "-");
					$('#t_armor_tech_vapor').html(data['objects']['t_armor_tech_vapor'] != null ? data['objects']['t_armor_tech_vapor'] : "-");
					$('#t_armor_time').html(data['objects']['t_armor_time'] != null ? data['objects']['t_armor_time'] : "-");
				//	$('#t_heat_source_own').html(data['spr_ot_type_heat_source'] != null ? data['spr_ot_type_heat_source']['name'] : "");
					
					
					
					t_heat_source_owns = '';
					//console.log(data['mkm_object_t_tis']);
					$.each(data['mkm_object_t_tis'], function(i,val){
						
						t_heat_source_owns =t_heat_source_owns+"<p>"+ (val['id_unp_sbj_own'] == val['id_unp_sbj_ti'] ? "Собственный ТИ " : "Сторонний ТИ ")+(val['ti_name'] != null ? val['ti_name']+": " : ': ')+ (val['name'] != null ? val['name'] : '-')+(val['reestr_subject_name'] != null ? " ("+val['reestr_subject_name']+") " : '-')+"</p>"
					})
					$("#t_heat_source_ti_own_table").html(t_heat_source_owns);						
					

					
					
					var now_t = data['objects']['t_armor_date'];
					if (now_t != null){
						d = now_t.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
						$('#t_armor_date').html(d);
					}else{
						$('#t_armor_date').html("-");
					}

					$('#t_id_spr_ot_functions').html(data['spr_ot_functions'] != null ? data['spr_ot_functions']['name'] : "-");
					$('#t_id_spr_ot_cat').html(data['spr_ot_cat'] != null ? data['spr_ot_cat']['name'] : "-");
					$('#t_year').html(data['objects']['t_year']);
					$('#t_workload_heating').html(data['objects']['t_workload_heating'] != null ? data['objects']['t_workload_heating'] : "-");
					$('#t_workload_gvs').html(data['objects']['t_workload_gvs'] != null ? data['objects']['t_workload_gvs'] : "-");
					$('#t_workload_pov').html(data['objects']['t_workload_pov'] != null ? data['objects']['t_workload_pov'] : "-");
					$('#t_workload_tech').html(data['objects']['t_workload_tech'] != null ? data['objects']['t_workload_tech'] : "-");
					$('#t_workload_vapor').html(data['objects']['t_workload_vapor'] != null ? data['objects']['t_workload_vapor'] : "-");
					$('#t_workload_percent').html(data['objects']['t_workload_percent'] != null ? data['objects']['t_workload_percent'] : "-");
					
					$('#t_systemheat_place').html(data['objects']['t_systemheat_place'] != null ? data['objects']['t_systemheat_place'] : "-");
					$('#t_systemheat_water').html(data['spr_ot_systemheat_water'] != null ? data['spr_ot_systemheat_water']['name'] : "-");
					
					$('#t_systemheat_layout').html(data['spr_ot_type_razvodka'] != null ? data['spr_ot_type_razvodka']['name'] : "-");
					$('#t_systemheat_type_op').html(data['spr_ot_type_ot_pribor'] != null ? data['spr_ot_type_ot_pribor']['name'] : "-");
					$('#t_systemheat_mark_op').html(data['objects']['t_systemheat_mark_op'] != null ? data['objects']['t_systemheat_mark_op'] : "-");
					$('#t_systemheat_dependent').html(data['spr_ot_systemheat_dependent'] != null ? data['spr_ot_systemheat_dependent']['name'] : "-");
					$('#t_spr_id_ot_type_to').html(data['spr_ot_type_to'] != null ? data['spr_ot_type_to']['name'] : "-");
					$('#t_systemheat_mark_to').html(data['objects']['t_systemheat_mark_to'] != null ? data['objects']['t_systemheat_mark_to'] : "-");
					
					$('#sum_workload').html(parseFloat(data['objects']['t_workload_heating'])+parseFloat(data['objects']['t_workload_gvs'])+parseFloat(data['objects']['t_workload_pov'])+parseFloat(data['objects']['t_workload_tech']));
					
					
					str_table_obj_ot_heatnet_t = '';					
					$.each(data['obj_ot_heatnet_ts'], function(i,val){
						str_table_obj_ot_heatnet_t =str_table_obj_ot_heatnet_t+"<tr><td>"+val['conect_point']+"</td><td>"+val['length']+"</td><td>"+val['diameter']+"</td><td>"+val['count_tube']+"</td><td>"+val['name_underground']+"</td><td>"+val['name_iso']+"</td><td>"+val['name_izol']+"</td></tr>";
					})
					$("#obj_ot_heatnet_t tbody").html(str_table_obj_ot_heatnet_t);	
					
					
					
					str_table_itp = '';
					$.each(data['obj_ot_personal_tps'], function(i,val){
						str_table_itp =str_table_itp+"<tr><td>"+val['device']+"</td><td>"+val['count_device']+"</td></tr>";
					})
					$("#obj_ot_personal_tp tbody").html(str_table_itp);					
					
					str_table_sar = '';
					//console.log(data['obj_ot_personal_sars']);
					$.each(data['obj_ot_personal_sars'], function(i,val){
						str_table_sar =str_table_sar+"<tr><td>"+val['sar']+"</td><td>"+val['spr_ot_nazn_sar_name']+"</td><td>"+val['count_sar']+"</td></tr>";
					})
					$("#obj_ot_personal_sar tbody").html(str_table_sar);						
					
					
					$('#t_gvs_open').html(data['spr_ot_gvs_open'] != null ? data['spr_ot_gvs_open']['name'] : "-");
					$('#t_gvs_in').html(data['spr_ot_gvs_in'] != null ? data['spr_ot_gvs_in']['name'] : "-");
					$('#t_gvs_place').html(data['objects']['t_gvs_place'] != null ? data['objects']['t_gvs_place'] : "-");
					$('#t_gvs_connect').html(data['objects']['t_gvs_connect'] != null ? data['objects']['t_gvs_connect'] : "-");
					$('#t_gvs_type').html(data['objects']['t_gvs_type'] != null ? data['objects']['t_gvs_type'] : "-");
					$('#t_gvs_mark').html(data['objects']['t_gvs_mark'] != null ? data['objects']['t_gvs_mark'] : "-");
					$('#t_forced_vent_place').html(data['objects']['t_forced_vent_place'] != null ? data['objects']['t_forced_vent_place'] : "-");
					$('#t_forced_vent_count').html(data['objects']['t_forced_vent_count'] != null ? data['objects']['t_forced_vent_count'] : "-");
				}else{
					$('#is_t_info').html("Объект не является потребителем тепловой энергии");
					$('section[id=content-tab3] div[class="div_info"]').css({'display': 'none'});
					$('section[id=content-tab3] div[class="hr"]').css({'display': 'none'});
					$('section[id=content-tab3] p[class="p_gaz"]').css({'display': 'none'});
					$('section[id=content-tab3] div[class="mobileTable"]').css({'display': 'none'});
					
				}
			/********** ТИ *********************/			
				if(data['objects']['ti_is'] == 1){					
					$('#is_ti_info').html("Информация по теплоисточнику");					
					$('#ti_insp').html(data['usersTi'] != null ? data['usersTi']['fio'] : "");
					
					$('#ti_name').html(data['objects']['ti_name'] != null ? data['objects']['ti_name'] : "-");
					$('#is_reestr_ti').html(data['objects']['ti_reestr'] == 1 ? "да" : "нет");
					$('#ti_id_spr_ot_boiler_type').html(data['spr_oti_boiler_type'] != null ? data['spr_oti_boiler_type']['name'] : "-");
					$('#ti_year').html(data['objects']['ti_year'] != null ? data['objects']['ti_year'] : "-");
					$('#ti_power').html(data['objects']['ti_power'] != null ? data['objects']['ti_power'] : "-");
					$('#ti_id_spr_ot_type_fuel_1').html(data['spr_oti_type_fuel'] != null ? data['spr_oti_type_fuel']['name'] : "-");
					$('#ti_id_spr_ot_type_fuel_2').html(data['spr_oti_type_fuel_rezerv'] != null ? data['spr_oti_type_fuel_rezerv']['name'] : "-");

					
					$('#ti_out_power_ot_is').html(data['objects']['ti_out_power_ot'] == 1 ? "да" : "нет");
					$('#ti_out_power_gvs_is').html(data['objects']['ti_out_power_gvs'] == 1 ? "да" : "нет");
					$('#ti_out_power_tech_is').html(data['objects']['ti_out_power_tech'] == 1 ? "да" : "нет");
					$('#ti_out_power_vent_is').html(data['objects']['ti_out_power_vent'] == 1 ? "да" : "нет");
					
					
					
					str_table_boiler_water = '';
					$.each(data['obj_oti_boiler_waters'], function(i,val){
						str_table_boiler_water =str_table_boiler_water+"<tr><td>"+val['type']+"</td><td>"+val['year']+"</td><td>"+val['power']+"</td></tr>";
					})
					$("#boiler_water tbody").html(str_table_boiler_water);					


					str_table_boiler_vapor = '';
					$.each(data['obj_oti_boiler_vapors'], function(i,val){
						str_table_boiler_vapor =str_table_boiler_vapor+"<tr><td>"+val['type']+"</td><td>"+val['year']+"</td><td>"+val['power']+"</td></tr>";
					})
					$("#boiler_vapor tbody").html(str_table_boiler_vapor);	
	
						
					$('#ti_out_power').html((data['objects']['ti_out_power_gvs'] == 1 ? " на ГВС" : "")+(data['objects']['ti_out_power_ot'] == 1 ? " на отопление" : "")+(data['objects']['ti_out_power_tech'] == 1 ? " на технологические нужды" : "")+(data['objects']['ti_out_power_vent'] == 1 ? " на вентиляцию" : ""));	
						
						
					str_table_obj_ot_heatnet = '';
					//console.log(data['obj_ot_heatnets']);
					$.each(data['obj_ot_heatnets'], function(i,val){
						str_table_obj_ot_heatnet =str_table_obj_ot_heatnet+"<tr><td>"+val['conect_point']+"</td><td>"+val['length']+"</td><td>"+val['diameter']+"</td><td>"+val['count_tube']+"</td><td>"+val['name_underground']+"</td><td>"+val['name_iso']+"</td><td>"+val['name_izol']+"</td></tr>";
					})
					$("#obj_ot_heatnet tbody").html(str_table_obj_ot_heatnet);

					ti_heat_object = '';
					//console.log(data['mkm_object_t_ti_tis']);
					$.each(data['mkm_object_t_ti_tis'], function(i,val){
						
						ti_heat_object =ti_heat_object+"<p>"+ (val['id_unp_sbj_own'] == val['id_unp_sbj_ti'] ? "Собственный объект " : "Сторонний объект: ")+ (val['name'] != null ? val['name'] : '-')+(val['reestr_subject_name'] != null ? " ("+val['reestr_subject_name']+") " : '-')+"</p>"
					})
					$("#ti_heat_object").html(ti_heat_object);
				}else{
					$('#is_ti_info').html("У объекта нет собственных теплоисточников");
					$('section[id=content-tab4] div[class="div_info"]').css({'display': 'none'});
					$('section[id=content-tab4] div[class="hr"]').css({'display': 'none'});
					$('section[id=content-tab4] p[class="p_gaz"]').css({'display': 'none'});
					$('section[id=content-tab4] div[class="mobileTable"]').css({'display': 'none'});
					
				}
			/********** ГАЗ *********************/
				if(data['objects']['is_dom'] > 0){				
					$('#is_g_info').html("Информация по газовому надзору");

					$('#g_insp').html(data['usersGaz'] != null ? data['usersGaz']['fio'] : "");
					$('#type_home').html(data['spr_type_home'] != null ? data['spr_type_home']['name'] : "");
					
					
					$('#count_flat').html(data['objects']['g_count_flat'] != null ? data['objects']['g_count_flat'] : "нет");
					$('#count_pod').html(data['objects']['g_count_entrance'] != null ? data['objects']['g_count_entrance'] : "нет");
					
					str_table_obj_og_device = '';
					$.each(data['obj_og_devices'], function(i,val){
						str_table_obj_og_device =str_table_obj_og_device+"<tr><td>"+val['name']+"</td><td>"+val['counts']+"</td>></tr>";
					})
					$("#obj_og_device tbody").html(str_table_obj_og_device);	
					
					$('#g_id_spr_og_flue').html(data['spr_vidDym'] != null ? data['spr_vidDym']['name'] : "-");
					$('#g_id_spr_og_flue_mater').html(data['spr_flue_mater'] != null ? data['spr_flue_mater']['name'] : "-");
					$('#g_flue_size').html(data['objects']['g_flue_size'] != null ? data['objects']['g_flue_size'] : "-");
					$('#g_id_spr_og_type_gaz').html(data['spr_type_gaz'] != null ? data['spr_type_gaz']['name'] : "-");
				
				}else{
					$('#is_g_info').html("Объект не является потребителем газового надзора");
					$('section[id=content-tab5] div[class="div_info"]').css({'display': 'none'});
					$('section[id=content-tab5] div[class="hr"]').css({'display': 'none'});
					$('section[id=content-tab5] p[class="p_gaz"]').css({'display': 'none'});
					$('section[id=content-tab5] div[class="mobileTable"]').css({'display': 'none'});					
				}
				
			}
			});
		
	},
	add_boiler_water: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_boiler_water"]').val();
				
				formData.append('id', id_edit);				
				formData.append('type', $('#water_type').val());			
				formData.append('year', $('#water_year').val());
				formData.append('power', $('#water_power').val());
				
				var water_t = $('input#water_type').val();
				var water_y = $('input#water_year').val();
				var water_p = $('input#water_power').val();
		
		str_tbody_first = $("#boiler_water tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_boiler_water/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
//console.log('edit');
					$("tr[id_boiler_water="+id_edit+"] td[name='type']").html(water_t);
					$("tr[id_boiler_water="+id_edit+"] td[name='year']").html(water_y);
					$("tr[id_boiler_water="+id_edit+"] td[name='power']").html(water_p);
					
			}else{			  
					  str_tbody =  str_tbody_first + result;
//console.log('add');
					  if((result).length > 0){
						  
						$("#boiler_water tbody").html(str_tbody); 
					  }
			} 
				$("input[name='water_type']").val('');				
			    $("input[name='water_year']").val('');
			    $("input[name='water_power']").val('');

			  	$('#ModalBoiler_water').fadeOut(300);
				$('#ModalBoiler_water_overlay').fadeOut(300);
            }
        });
	
    },
	

	add_boiler_vapor: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_boiler_vapor"]').val();
				
				formData.append('id', id_edit);				
				formData.append('type', $('#vapor_type').val());		
				formData.append('year', $('#vapor_year').val());
				formData.append('power', $('#vapor_power').val());
				
		/*	for (var value of formData.values()) {
				console.log(value);
				}*/
				
		str_tbody_first = $("#boiler_vapor tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_boiler_vapor/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){

					$("tr[id_boiler_vapor="+id_edit+"] td[name='type']").html($('input#vapor_type').val());
					$("tr[id_boiler_vapor="+id_edit+"] td[name='year']").html($('input#vapor_year').val());
					$("tr[id_boiler_vapor="+id_edit+"] td[name='power']").html($('input#vapor_power').val());
					
			}else{	

					  str_tbody =  str_tbody_first + result;

					  if((result).length > 0){
						  
						$("#boiler_vapor tbody").html(str_tbody); 
					  }
			  
			}  
			  	$("input[name='vapor_type']").val('');				
			    $("input[name='vapor_year']").val('');
			    $("input[name='vapor_power']").val('');

			  	$('#ModalBoiler_vapor').fadeOut(300);
				$('#ModalBoiler_vapor_overlay').fadeOut(300);
            }
        });
	
    },
	clear_fields: function(inputId) {
		event.preventDefault();
		inputNameID = inputId+'_id';
		inputName = inputId;
		$("input[name='"+inputNameID+"']").val('');
		$("input[name='"+inputName+"']").val('');
		$("textarea[name='"+inputName+"']").val('');
		$("select[name='"+inputName+"']").val('');
	},	
	og_hide_show: function(value) {
		if(value == 1){
			$('div[id="m"] label').css({'display': 'block'});
			$('div[id="m"] input').attr('type', 'text');
			$('div[id="o"] input').attr('type', 'hidden');
			$('div[id="o"] label').css({'display': 'none'});
			$('div[id="o"] button').css({'display': 'none'});
			$('div[id="mo"]').css({'display': 'flex'});
			$('div[id="mot"]').css({'display': 'block'});
			$('div[id="mop"]').css({'display': 'block'});
			$("input[name='type_gaz_id']").val('');
			$("input[name='type_gaz']").val('');
			$("input[name='flue_size']").val('');
$("input[name='flue_mater']").val('');
$("input[name='flue_mater_id']").val('');
$("input[name='og_flue']").val('');
$("input[name='og_flue_id']").val('');
		}else if(value == 2){
			$('div[id="o"]').css({'display': 'flex'});
			$('div[id="o"] label').css({'display': 'block'});
			$('div[id="o"] button').css({'display': 'block'});
			$('div[id="m"] label').css({'display': 'none'});
			$('div[id="m"] input').attr('type', 'hidden');
			$("input[name='type_gaz']").attr('type', 'text');
			$('div[id="mo"]').css({'display': 'flex'});
			$('div[id="mot"]').css({'display': 'block'});
			$('div[id="mop"]').css({'display': 'block'});
			$("input[name='count_flat']").val(0);
			$("input[name='count_pod']").val(0);
			$("input[name='flue_size']").val('');
			$("input[name='flue_mater']").val('');
			$("input[name='flue_mater_id']").val('');
			$("input[name='og_flue']").val('');
			$("input[name='og_flue_id']").val('');
		}else{
			$('div[id="o"] label').css({'display': 'none'});
			$('div[id="o"] button').css({'display': 'none'});			
			$('div[id="m"] input').attr('type', 'hidden');
			$('div[id="mo"]').css({'display': 'none'});
			$('div[id="o"] input').attr('type', 'hidden');
			$('div[id="mot"]').css({'display': 'none'});
			$('div[id="mop"]').css({'display': 'none'});
			$("input[name='count_flat']").val('');
			$("input[name='count_pod']").val('');
			$("input[name='type_gaz_id']").val('');
			$("input[name='type_gaz']").val('');	
			$("input[name='flue_size']").val('');
			$("input[name='flue_mater']").val('');
			$("input[name='flue_mater_id']").val('');
			$("input[name='og_flue']").val('');
			$("input[name='og_flue_id']").val('');
			
		}
		
	},

	/*heat_source_show: function(value) {
		if(value == 1){
			$('section[id=content-tab4] input').prop('disabled', false);
			$('section[id=content-tab4] select').prop('disabled', false);
			$('section[id=content-tab4] button').prop('disabled', false);
			$('div[id="heat_source_hide"]').css({'display': 'none'});
		}else if(value == 2){
			$('section[id=content-tab4] input').prop('disabled', true);
			$('section[id=content-tab4] select').prop('disabled', true);
			$('section[id=content-tab4] button').prop('disabled', true);
			$('div[id="heat_source_hide"]').css({'display': 'block'});
		}else if(value == 3){
			$('section[id=content-tab4] input').prop('disabled', false);
			$('section[id=content-tab4] select').prop('disabled', false);
			$('section[id=content-tab4] button').prop('disabled', false);
			$('div[id="heat_source_hide"]').css({'display': 'block'});
		}
		
	},*/
	
	add_type_device: function() {
		event.preventDefault();
        var formData = new FormData();
				
				var id_edit = $('input[name="id_obj_og_device"]').val();
				
				formData.append('id', id_edit);
				formData.append('type', $('#device_type').val());
				formData.append('type_device', $('#device_type option:selected').text());			
				formData.append('counts', $('#device_counts').val());
				
				var dev_type = $('#device_type').val();
				var dev_type_opt = $('#device_type option:selected').text();
				var dev_counts = $('input#device_counts').val();
		
		str_tbody_first = $("#obj_og_device tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_og_device/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
				
				if(id_edit>0){
					$("tr[id_obj_og_device="+id_edit+"] td[device_type]").attr('device_type',dev_type);
					$("tr[id_obj_og_device="+id_edit+"] td[device_type="+dev_type+"]").html(dev_type_opt);
					$("tr[id_obj_og_device="+id_edit+"] td[name='counts']").html(dev_counts);
					
				}else{
			
				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_og_device tbody").html(str_tbody); 
				  }
					
				}
				
				$('input[name="id_obj_og_device"]').val('');
				$('#device_type option[value="0"]').prop('selected', true);
				
				$("input[name='device_type']").val('');	
							
				$("input#device_counts").val('');		
				
            }
			
			
        });
			
		$("input[name='id_obj_og_device']").val('');				
		$("input[name='device_counts']").val('');
		$("select[name='device_type']").val('');				  
		$('#ModalObj_og_device').fadeOut(300);
		$('#ModalObj_og_device_overlay').fadeOut(300);
	
    },
	
	add_heat_source: function(id_obj, id_subj) {
		
	
		if($('#openModalHeatSource').is(':visible')){
			event.preventDefault();
			var formData = new FormData();
			

			var id_edit = id_obj;
			var name_obj_source = $('#name_obj_source').html();
		
				
			//formData.append('id', $('tr[object_source_ti = '+id_edit+'] td'));
			formData.append('id_reestr_object_ti', id_obj);
			formData.append('id_reestr_object_t', $('#formObjectId').val());
			formData.append('id_reestr_subject', id_subj); // id потребителя теплоисточника
			formData.append('id_reestr_subject_own', $('#subject_id').val()); // id потребителя объекта
			formData.append('name_obj_source', $('p[object_source_ti = '+id_edit+'] span').html());
			
		
			str_tbody_first = $("#mkm_object_t_ti tbody").html() 


		  $.ajax({
				url: '/ARM/objects/add_ot_heat_source/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){

					  str_tbody =  str_tbody_first + result;

	//console.log(result);
					  if((result).length > 0){  
						$("#mkm_object_t_ti tbody").html(str_tbody); 
					  }
							
				} 	
			});
			$('#openModalHeatSource').fadeOut(300);
			$('#openModalHeatSource_overlay').fadeOut(300);
			$('#search_resultSource').html('');
			$('#search').val('');
		}else{
				$('#openModalSubject .result_html p[object_source_ti]').click(function(){
			
				$('#e_subobj_subject_id').val(id_subj);	
				$('#e_subobj_obj_id').val(id_obj);	
				
				$('#e_subobj_subject').val($('p[object_source_ti="'+id_obj+'"] span').html());

				$('#openModalSubject').fadeOut(300);
				$('#openModalSubject_overlay').fadeOut(300);
				$('#search_resultSource').html('');
				$('#search').val('');
				$('#openModalSubject #search').attr('sbobj',0); // меняется на 1 в modalWindow.js для разделения поиска для субабонентов и теплоисточников
				return false;		
			})
		}
    },
	add_ot_personal_tp: function() {
		event.preventDefault();
        var formData = new FormData();
		
		var id_edit = $('input[name="id_obj_ot_personal_tp"]').val();
		
		formData.append('id', id_edit);		
					
		formData.append('device', $('#tp_device').val());
		formData.append('count_device', $('#tp_count_device').val());
		/*formData.append('sar', $('#tp_sar').val());				
		formData.append('count_sar', $('#tp_count_sar').val());*/
		
		str_tbody_first = $("#obj_ot_personal_tp tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_ot_personal_tp/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

				if(id_edit>0){
					/*$("tr[id_obj_ot_personal_tp="+id_edit+"] td[device]").attr('device',$('#tp_device').val());*/
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[name='device']").html($('input#tp_device').val());
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[name='count_device']").html($('input#tp_count_device').val());
					/*$("tr[id_obj_ot_personal_tp="+id_edit+"] td[name='sar']").html($('input#tp_sar').val());
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[name='count_sar']").html($('input#tp_count_sar').val());*/	
				}else{

				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_ot_personal_tp tbody").html(str_tbody); 
				  }
				}
				$("input[name='tp_device']").val('');
				$("input[name='tp_count_device']").val('');				
				/*$("input[name='tp_sar']").val('');				
				$("input[name='tp_count_sar']").val('');*/								
            } 	
        });
		$('#ModalObj_ot_personal_tp').fadeOut(300);
		$('#ModalObj_ot_personal_tp_overlay').fadeOut(300);
	
    },
	
	
	add_ot_personal_sar: function() {
		event.preventDefault();
        var formData = new FormData();
		
		var id_edit = $('input[name="id_obj_ot_personal_sar"]').val();
		
		formData.append('id', id_edit);		
					
		formData.append('nazn_sar_name', $('#nazn_sar option:selected').text());
		formData.append('nazn_sar', $('#nazn_sar').val());
		formData.append('sar', $('#sar_sar').val());				
		formData.append('count_sar', $('#sar_count_sar').val());
		
		str_tbody_first = $("#obj_ot_personal_sar tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_ot_personal_sar/',
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
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[name='sar']").html($('input#sar_sar').val());
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar]").attr('nazn_sar',$('#nazn_sar').val());
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar="+$('#nazn_sar').val()+"]").html($('#nazn_sar option:selected').text());					
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[name='count_sar']").html($('input#sar_count_sar').val());
					
				}else{

				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_ot_personal_sar tbody").html(str_tbody); 
				  }
				}
			
				$("input[name='sar_sar']").val('');				
				$("input[name='sar_count_sar']").val('');
				$("input[name='nazn_sar']").val('');
				$("select[name='nazn_sar']").val('');
            } 	
        });
		$('#ModalObj_ot_personal_sar').fadeOut(300);
		$('#ModalObj_ot_personal_sar_overlay').fadeOut(300);
	
    },	
	
	
	add_ot_heatnet: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_ot_heatnet"]').val();
		
		formData.append('id', id_edit);					
		/*formData.append('type_obj', $('#type_obj_heatnet').val());*/
		/*formData.append('type_name', $('#type_obj_heatnet option:selected').text());*/
		formData.append('conect_point', $('#heatnet_conect_point').val());
		formData.append('length', $('#heatnet_length').val());				
		formData.append('diameter', $('#heatnet_diameter').val());
		formData.append('count_tube', $('#heatnet_count_tube').val());
		formData.append('underground', $('#heatnet_underground').val());
		formData.append('underground_name', $('#heatnet_underground option:selected').text());
		
		formData.append('isolation_name', $('#type_isolation option:selected').text());
		formData.append('type_isolation', $('#type_isolation').val());		
		
		formData.append('heatnet_type_isolation_name', $('#heatnet_type_isolation option:selected').text());
		formData.append('heatnet_type_isolation', $('#heatnet_type_isolation').val());
		
		formData.append('isolation_name', $('#type_isolation option:selected').text());
		formData.append('type_isolation', $('#type_isolation').val());
		
			
				
		str_tbody_first = $("#obj_ot_heatnet tbody").html() 

      $.ajax({
            url: '/ARM/objects/add_ot_heatnet/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			  if(id_edit>0){
				/*$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_obj_heatnet]").attr('type_obj_heatnet',$('#type_obj_heatnet').val());*/
				/*$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_obj_heatnet="+$('#type_obj_heatnet').val()+"]").html($('#type_obj_heatnet option:selected').text());*/
				
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='length']").html($('#heatnet_length').val());				
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='diameter']").html($('#heatnet_diameter').val());				
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='conect_point']").html($('#heatnet_conect_point').val());				
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='count_tube']").html($('#heatnet_count_tube').val());	

				$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_underground]").attr('heatnet_underground',$('#heatnet_underground').val());
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_underground="+$('#heatnet_underground').val()+"]").html($('#heatnet_underground option:selected').text());
				
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_isolation]").attr('type_isolation',$('#type_isolation').val());
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_isolation="+$('#type_isolation').val()+"]").html($('#type_isolation option:selected').text());
				
				//$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='type_isolation']").html($('#heatnet_type_isolation').val());	
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_type_isolation]").attr('heatnet_type_isolation',$('#heatnet_type_isolation').val());
				$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_type_isolation="+$('#heatnet_type_isolation').val()+"]").html($('#heatnet_type_isolation option:selected').text());				  
			 
			 }else{
				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_ot_heatnet tbody").html(str_tbody); 
				  }
			  }
				/*$("select[name='type_obj_heatnet']").val('');*/				
				
				$("input[name='id_obj_ot_heatnet']").val('');
				$("input[name='heatnet_conect_point']").val('');
				$("input[name='heatnet_length']").val('');				
				$("input[name='heatnet_diameter']").val('');				
				$("input[name='heatnet_count_tube']").val('');				
				$("select[name='heatnet_underground']").val('');				
				$("select[name='type_isolation']").val('');
				$("input[name='heatnet_type_isolation']").val('');
			
			  	$('#ModalObj_ot_heatnet').fadeOut(300);
				$('#ModalObj_ot_heatnet_overlay').fadeOut(300);
            }
        });
	
    },
	add_ot_heatnet_t: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_ot_heatnet_t"]').val();
		
		formData.append('id', id_edit);			
		formData.append('length', $('#t_length').val());				
		formData.append('diameter', $('#t_diameter').val());
		formData.append('conect_point', $('#t_conect_point').val());
		formData.append('underground', $('#t_underground').val());
		formData.append('underground_name', $('#t_underground option:selected').text());
		formData.append('isolation', $('#t_type_isolation').val());
				
		formData.append('t_isolation', $('#t_type_isolation').val());
		formData.append('isolation_t_name', $('#t_type_isolation option:selected').text());
		
		
		formData.append('type_isolation', $('#type_isolation_iso').val());
		formData.append('isolation_name', $('#type_isolation_iso option:selected').text());
		formData.append('count_tube', $('#t_count_tube').val());
			
		
		str_tbody_first = $("#obj_ot_heatnet_t tbody").html();

      $.ajax({
            url: '/ARM/objects/add_ot_heatnet_t/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
				if(id_edit>0){
				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='length']").html($('#t_length').val());				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='diameter']").html($('#t_diameter').val());				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='conect_point']").html($('#t_conect_point').val());				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='count_tube']").html($('#t_count_tube').val());	

					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_underground]").attr('t_underground',$('#t_underground').val());
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_underground="+$('#t_underground').val()+"]").html($('#t_underground option:selected').text());
				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[type_isolation_iso]").attr('type_isolation_iso',$('#type_isolation_iso').val());
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[type_isolation_iso="+$('#type_isolation_iso').val()+"]").html($('#type_isolation_iso option:selected').text());
				
					$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='type_isolation']").html($('#t_type_isolation').val());
					 
				}else{
					str_tbody =  str_tbody_first + result;

					if((result).length > 0){  
						$("#obj_ot_heatnet_t tbody").html(str_tbody); 
					}
				}	

				$("input[name='id_obj_ot_heatnet_t']").val('');
				$("input[name='t_conect_point']").val('');
				$("input[name='t_length']").val('');				
				$("input[name='t_diameter']").val('');				
				$("input[name='t_count_tube']").val('');				
				$("select[name='t_underground']").val('');				
				$("select[name='type_isolation_iso']").val('');
				$("input[name='t_type_isolation']").val('');
				$("select[name='t_type_isolation']").val('');
			  	$('#ModalObj_ot_heatnet_t').fadeOut(300);
				$('#ModalObj_ot_heatnet_t_overlay').fadeOut(300);
            }
        });
	
    },
	
	add_obj_oe_avr: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_oe_avr"]').val();
		
		formData.append('id', id_edit);
		formData.append('place', $('#avr_place').val());
		formData.append('power', $('#avr_power').val());
		formData.append('time', $('#avr_time').val());
		formData.append('date', $('#avr_date').val());
				

		
		str_tbody_first = $("#obj_oe_avr tbody").html();

      $.ajax({
            url: '/ARM/objects/add_obj_oe_avr/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
			if(id_edit>0){
								
					$("tr[id_obj_oe_avr="+id_edit+"] td[name='place']").html($('#avr_place').val());				
					$("tr[id_obj_oe_avr="+id_edit+"] td[name='power']").html($('#avr_power').val());				
					$("tr[id_obj_oe_avr="+id_edit+"] td[name='time']").html($('#avr_time').val());				
					$("tr[id_obj_oe_avr="+id_edit+"] td[name='date']").html($('#avr_date').val());	

				}else{
				str_tbody =  str_tbody_first + result;
					
					  if((result).length > 0){ 
					
						$("#obj_oe_avr tbody").html(str_tbody); 
						
						var rowCount = $("#obj_oe_avr tbody tr").length;	
						var text = 'Всего: ' + (rowCount > 0 ? rowCount : '0') + ' шт.';
						$("#numrow_avrs").html(text);						
					  }
			  		

			
				}
				$("input[name='id_obj_oe_avr']").val('');
				$("input[name='avr_place']").val('');
				$("input[name='avr_power']").val('');
				$("input[name='avr_time']").val('');
				$("input[name='avr_date']").val('');				
			  	$('#ModalObj_oe_avr').fadeOut(300);
				$('#ModalObj_oe_avr_overlay').fadeOut(300);
            }
        });
	
    },
	
	add_obj_oe_aie: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_oe_aie"]').val();
		
		formData.append('id', id_edit);
		formData.append('name', $('input[name="aie_name"]').val());
		formData.append('type', $('input[name="aie_type"]').val());
		formData.append('power', $('input[name="aie_power"]').val());
		formData.append('factory', $('input[name="aie_factory"]').val());
		formData.append('year', $('input[name="aie_year"]').val());
		formData.append('date_last', $('input[name="aie_date_last"]').val());
		formData.append('place', $('input[name="aie_place"]').val());
		
		str_tbody_first = $("#obj_oe_aie tbody").html();
		
		
		

      $.ajax({
            url: '/ARM/objects/add_obj_oe_aie/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
			
			if(id_edit>0){
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='name']").html($('#aie_name').val());				
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='type']").html($('#aie_type').val());				
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='power']").html($('#aie_power').val());				
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='factory']").html($('#aie_factory').val());
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='year']").html($('#aie_year').val());				
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='date_last']").html($('#aie_date_last').val());				
					$("tr[id_obj_oe_aie="+id_edit+"] td[name='place']").html($('#aie_place').val());				
			}else{
				str_tbody =  str_tbody_first + result;

					  if((result).length > 0){  
						$("#obj_oe_aie tbody").html(str_tbody); 
					  }
				
			}
				$("input[name='id_obj_oe_aie']").val('');
				$("input[name='aie_name']").val('');
				$("input[name='aie_type']").val('');
				$("input[name='aie_power']").val('');
				$("input[name='aie_factory']").val('');	
				$("input[name='aie_year']").val('');
				$("input[name='aie_date_last']").val('');
				$("input[name='aie_place']").val('');				
			  	$('#ModalObj_oe_aie').fadeOut(300);
				$('#ModalObj_oe_aie_overlay').fadeOut(300);
            }
        });
	
    },
	
	add_obj_oe_trp: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_oe_trp"]').val();
		
		formData.append('id', id_edit);
		formData.append('name', $('input[name="trp_name"]').val());
		formData.append('id_type', $('input[name="trp_id_type"]').val());
		formData.append('power', $('input[name="trp_power"]').val());
		formData.append('volt', $('input[name="trp_volt"]').val());
		formData.append('year_begin', $('input[name="trp_year_begin"]').val());
		
		str_tbody_first = $("#obj_oe_trp tbody").html();


      $.ajax({
            url: '/ARM/objects/add_obj_oe_trp/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
				
					$("tr[id_obj_oe_trp="+id_edit+"] td[name='name']").html($('#trp_name').val());				
					$("tr[id_obj_oe_trp="+id_edit+"] td[name='id_type']").html($('#trp_id_type').val());				
					$("tr[id_obj_oe_trp="+id_edit+"] td[name='power']").html($('#trp_power').val());				
					$("tr[id_obj_oe_trp="+id_edit+"] td[name='volt']").html($('#trp_volt').val());
					$("tr[id_obj_oe_trp="+id_edit+"] td[name='year_begin']").html($('#trp_year_begin').val());				
				
			}else{

				str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_oe_trp tbody").html(str_tbody); 
					
						var rowCount = $("#obj_oe_trp tbody tr").length;	
						var text = 'Всего: ' + (rowCount > 0 ? rowCount : '0') + ' шт.';
						$("#numrow_trps").html(text);
					
				  }
			}  	

				$("input[name='id_obj_oe_trp']").val('');
				$("input[name='trp_name']").val('');
				$("input[name='trp_id_type']").val('');
				$("input[name='trp_power']").val('');
				$("input[name='trp_volt']").val('');
				$("input[name='trp_year_begin']").val('');
			  	$('#ModalObj_oe_trp').fadeOut(300);
				$('#ModalObj_oe_trp_overlay').fadeOut(300);
            }
        });
	
    },
	
	add_obj_oe_klvl: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_oe_klvl"]').val();
		
		formData.append('id', id_edit);
		formData.append('name', $('input[name="klvl_name"]').val());
		formData.append('underground_name', $('#t_underground option:selected').text());
		formData.append('type', $('select[name="klvl_type"]').val());
		formData.append('type_name', $('#klvl_type option:selected').text());
		formData.append('volt', $('select[name="klvl_volt"]').val());
		formData.append('volt_name', $('#klvl_volt option:selected').text());
		formData.append('mark', $('input[name="klvl_mark"]').val());
		formData.append('length', $('input[name="klvl_length"]').val());
		formData.append('name_center', $('input[name="klvl_name_center"]').val());
		formData.append('year', $('input[name="klvl_year"]').val());

		str_tbody_first = $("#obj_oe_klvl tbody").html();

      $.ajax({
            url: '/ARM/objects/add_obj_oe_klvl/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
//console.log(result);
			if(id_edit>0){
				
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='name']").html($('#klvl_name').val());				
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='type']").html($('#klvl_type option:selected').text());



					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='volt']").html($('#klvl_volt option:selected').text());				
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='mark']").html($('#klvl_mark').val());
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='length']").html($('#klvl_length').val());	
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='name_center']").html($('#klvl_name_center').val());
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='year']").html($('#klvl_year').val());						
			}else{

				 str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_oe_klvl tbody").html(str_tbody); 
				  }
			} 		
	
				$("input[name='id_obj_oe_klvl']").val('');
				$("select[name='klvl_type']").val('0');
				$("select[name='klvl_volt']").val('0');
				$("input[name='klvl_name']").val('');
				$("input[name='klvl_mark']").val('');
				$("input[name='klvl_length']").val('');
				$("input[name='klvl_name_center']").val('');
				$("input[name='klvl_year']").val('');
			  	$('#ModalObj_oe_klvl').fadeOut(300);
				$('#ModalObj_oe_klvl_overlay').fadeOut(300);
            }
        });
	
    },
	
	add_obj_oe_block: function() {
		event.preventDefault();
        var formData = new FormData();
		var id_edit = $('input[name="id_obj_oe_block"]').val();
		
		formData.append('id', id_edit);
		formData.append('name', $('input[name="block_name"]').val());
		formData.append('type', $('select[name="energy_type"]').val());
		formData.append('type_name', $('select[name="energy_type"] option:selected').text());
		formData.append('power', $('input[name="block_power"]').val());
		formData.append('add_load', $('input[name="block_add_load"]').val());
		
		str_tbody_first = $("#obj_oe_block tbody").html();

      $.ajax({
            url: '/ARM/objects/add_obj_oe_block/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

			if(id_edit>0){
				
					$("tr[id_obj_oe_block="+id_edit+"] td[name='name']").html($('#block_name').val());				
					$("tr[id_obj_oe_block="+id_edit+"] td[energy_type]").attr('energy_type',$('#energy_type').val());
					$("tr[id_obj_oe_block="+id_edit+"] td[energy_type="+$('#energy_type').val()+"]").html($('#energy_type option:selected').text());					
					$("tr[id_obj_oe_block="+id_edit+"] td[name='power']").html($('#block_power').val());
					$("tr[id_obj_oe_block="+id_edit+"] td[add_load='add_load']").html($('#block_add_load').val() == 1 ? 'да' : 'нет');	
					
				
			}else{

				 str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_oe_block tbody").html(str_tbody); 
				  }
			}  		

				$("input[name='id_obj_oe_block']").val('');
				$("input[name='block_name']").val('');
				$("select[name='energy_type']").val('0');
				$("input[name='block_power']").val('');
				$("input[name='block_add_load']").prop('value', 0);
				$("input[name='block_add_load']").prop('checked', false);


				
			  	$('#ModalObj_oe_block').fadeOut(300);				
				$('#ModalObj_oe_block_overlay').fadeOut(300);
            }
        });
	
    },
	
	power_ot: function() {
		if($("input[name='ti_out_power_ot']").prop('checked')){
			$("input[name='ti_out_power_ot']").prop('value', 1);
		}else{
			$("input[name='ti_out_power_ot']").prop('value', 0);
		}
		
	},
	power_gvs: function() {
		if($("input[name='ti_out_power_gvs']").prop('checked')){
			$("input[name='ti_out_power_gvs']").prop('value', 1);
		}else{
			$("input[name='ti_out_power_gvs']").prop('value', 0);
		}
		
	},	
	power_tech: function() {
		if($("input[name='ti_out_power_tech']").prop('checked')){
			$("input[name='ti_out_power_tech']").prop('value', 1);
		}else{
			$("input[name='ti_out_power_tech']").prop('value', 0);
		}
		
	},	
	power_vent: function() {
		if($("input[name='ti_out_power_vent']").prop('checked')){
			$("input[name='ti_out_power_vent']").prop('value', 1);
		}else{
			$("input[name='ti_out_power_vent']").prop('value', 0);
		}
		
	},
	is_teplo: function() {
		if($("input[name='t_is']").prop('checked')){
			$("input[name='t_is']").prop('value', 1);
			$('div[id="t_is"]').css({'display': 'block'});

			id_user =$.cookie('id_user');
			$("select[name='Insp_t']").val(id_user);
			$("select[name='Insp_ti']").val(id_user);	
		}else{
			$("input[name='t_is']").prop('value', 0);
			$('div[id="t_is"]').css({'display': 'none'});
		}
		
	},
	is_teplo_source: function() {
		if($("input[name='ti_is']").prop('checked')){
			$("input[name='ti_is']").prop('value', 1);
			$('div[id="ti_section"]').css({'display': 'block'});

			id_user =$.cookie('id_user');
			//$("select[name='Insp_t']").val(id_user);
			//$("select[name='Insp_ti']").val(id_user);	
		}else{
			$("input[name='ti_is']").prop('value', 0);
			$('div[id="ti_section"]').css({'display': 'none'});
		}
		
	},
	ti_reestr: function() {
		if($("input[name='ti_reestr']").prop('checked')){
			$("input[name='ti_reestr']").prop('value', 1);
		}else{
			$("input[name='ti_reestr']").prop('value', 0);
			
		}
		
	},
	is_bron: function() {
		if($("input[name='is_bron']").prop('checked')){
			$("input[name='is_bron']").prop('value', 1);
			$('div[id="is_armor"]').css({'display': 'block'});			
		}else{
			$("input[name='is_bron']").prop('value', 0);
			$('div[id="is_armor"]').css({'display': 'none'});
			$("input[name='t_armor_crach']").val('');
			$("input[name='t_armor_crach_vapor']").val('');
			$("input[name='t_armor_tech']").val('');
			$("input[name='t_armor_tech_vapor']").val('');
			$("input[name='t_armor_time']").val('');
			$("input[name='t_armor_date']").val('');
			
			
		}
		
	},
	e_armor: function() {
		if($("input[name='e_armor']").prop('checked')){
			$("input[name='e_armor']").prop('value', 1);
			$('div[id="bron_hidden"]').css({'display': 'block'});			
		}else{
			$("input[name='e_armor']").prop('value', 0);
			$('div[id="bron_hidden"]').css({'display': 'none'});
			
			$("input[name='e_armor_crach']").val('');
			$("input[name='e_armor_tech']").val('');
			$("input[name='e_armor_time']").val('');
			$("input[name='e_armor_date']").val('');
		}
		
	},
	e_subobj: function() {
		if($("input[name='e_subobj']").prop('checked')){
			$("input[name='e_subobj']").prop('value', 1);
			$('div[id="subobj_subject_hidden"]').css({'display': 'block'});			
		}else{
			$("input[name='e_subobj']").prop('value', 0);
			$('div[id="subobj_subject_hidden"]').css({'display': 'none'});
			$("input[name='e_subobj_subject_id']").val('');
			$("input[name='e_subobj_obj_id']").val('');
			$("input[name='e_subobj_subject']").val('');
			//$("input[name='e_subobj_power']").val('');
		}
		
	},
	e_flooding: function() {
		if($("input[name='e_flooding']").prop('checked')){
			$("input[name='e_flooding']").prop('value', 1);		
		}else{
			$("input[name='e_flooding']").prop('value', 0);
		}
		
	},
	block_add_load: function() {
		if($("input[name='block_add_load']").prop('checked')){
			$("input[name='block_add_load']").prop('value', 1);		
		}else{
			$("input[name='block_add_load']").prop('value', 0);
		}
		
	},


	changeInsp: function() {

		cod_insp = $("select[name='Insp_t']").val();
		$("select[name='Insp_ti']").val(cod_insp);
	},

	
/// при отмене ввода информации на в карточку объекта удаляем из подчиненных таблиц временно записанные данные
	cancel: function(){
		
		event.preventDefault();
        var formData = new FormData();
		
		$('#boiler_water tbody tr').each(function() {
			formData.append('ids_boiler_water[]', $(this).attr('id_boiler_water'));
		});
		$('#boiler_vapor tbody tr').each(function() {
			formData.append('ids_boiler_vapor[]', $(this).attr('id_boiler_vapor'));
		});				
		$('#obj_og_device tbody tr').each(function() {	
			formData.append('ids_obj_og_device[]', $(this).attr('id_device_obj_og'));
		});
		$('#obj_ot_heatnet tbody tr').each(function() {	
			formData.append('ids_ot_heatnet[]', $(this).attr('id_device_ot_heatnet'));
		});	
		$('#obj_ot_heatnet_t tbody tr').each(function() {	
			formData.append('ids_ot_heatnet_t[]', $(this).attr('id_device_ot_heatnet_t'));
		});
		$('#obj_oe_avr tbody tr').each(function() {	
			formData.append('ids_obj_oe_avr[]', $(this).attr('id_obj_oe_avr'));
		});
		$('#obj_oe_aie tbody tr').each(function() {	
			formData.append('ids_obj_oe_aie[]', $(this).attr('id_obj_oe_aie'));
		});
		$('#obj_oe_tp tbody tr').each(function() {	
			formData.append('ids_obj_oe_tp[]', $(this).attr('id_obj_oe_tp'));
		});
		$('#obj_oe_klvl tbody tr').each(function() {	
			formData.append('ids_obj_oe_klvl[]', $(this).attr('id_obj_oe_klvl'));
		});
		$('#obj_oe_block tbody tr').each(function() {	
			formData.append('ids_obj_oe_block[]', $(this).attr('id_obj_oe_block'));
		});
		 $.ajax({
            url: '/ARM/objects/cancel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			 window.location = '/ARM/objects/list/'+$('#subject_id').val().trim();
			 // console.log(result);
            }
        });
		
	},
	
	formDataInfo: function(){
		
			var inspect_type = '';
			inspect_type =$.cookie('podrazdelenie');		
		
			var formData = new FormData();
				formData.append('objects_id', $('#formObjectId').val());
		/***********************************Основная*******************************/
				formData.append('id_reestr_subject', $('#subject_id').val());
				formData.append('name', $('#name_object').val());
				formData.append('num_case_o', $('#num_case_o').val());
				formData.append('address_index', $('#formIndexObject').val());
				formData.append('address_region', $('#formRegionObject').val());
				formData.append('address_district', $('#formDistrictObject').val());
				formData.append('address_city', $('#formCityObject').val());
				formData.append('address_city_zone', $('#formCityZoneObject').val());
				formData.append('address_street', $('#formStreetObject').val());
				formData.append('address_street_type', $('#spr_type_street_object').val());
				formData.append('address_city_type', $('#spr_type_city_object').val());
				formData.append('address_building', $('#formBuildingObject').val());
				formData.append('address_flat', $('#formFlatObject').val());
		/***********************************ЭЛЕКТРО*********************************/
				if(inspect_type == 3){
					formData.append('e_insp', $('#e_insp').val());
					formData.append('e_district', $('#e_district').val());
					formData.append('e_subobj', $('#e_subobj').val());
					formData.append('e_subobj_subject_id', $('#e_subobj_subject_id').val());
					formData.append('e_subobj_obj_id', $('#e_subobj_obj_id').val());
					formData.append('e_subobj_subject', $('#e_subobj_subject').val());
					formData.append('e_subobj_power', $('#sum_power').text());
					formData.append('e_armor', $('#e_armor').val());
					formData.append('e_armor_crach', $('#e_armor_crach').val());
					formData.append('e_armor_tech', $('#e_armor_tech').val());
					formData.append('e_armor_time', $('#e_armor_time').val());
					formData.append('e_armor_date', $('#e_armor_date').val());
					formData.append('e_cat_1', $('#e_cat_1').val());
					formData.append('e_cat_1plus', $('#e_cat_1plus').val());
					formData.append('e_cat_2', $('#e_cat_2').val());
					formData.append('e_cat_3', $('#e_cat_3').val());
					formData.append('e_flooding', $('#e_flooding').val());
					formData.append('del_e', $('#del_e').val());
					
					/*console.log($('#sum_power').text());*/
					
					$('#obj_oe_klvl tbody tr').each(function() {	
						formData.append('ids_obj_oe_klvl[]', $(this).attr('id_obj_oe_klvl'));
					});
					$('#obj_oe_trp tbody tr').each(function() {	
						formData.append('ids_obj_oe_trp[]', $(this).attr('id_obj_oe_trp'));
					});
					$('#obj_oe_avr tbody tr').each(function() {	
						formData.append('ids_obj_oe_avr[]', $(this).attr('id_obj_oe_avr'));
					});
					$('#obj_oe_aie tbody tr').each(function() {	
						formData.append('ids_obj_oe_aie[]', $(this).attr('id_obj_oe_aie'));
					});
					$('#obj_oe_block tbody tr').each(function() {	
						formData.append('ids_obj_oe_block[]', $(this).attr('id_obj_oe_block'));
					});					
				}
		/***********************************ТЕПЛО***********************************/
				if(inspect_type == 1){
					formData.append('t_insp', $('#Insp_t').val());
					formData.append('t_is', $('#t_is').val());
					formData.append('t_armor', $('#is_bron').val());
					formData.append('t_armor_crach', $('#t_armor_crach').val());
					formData.append('t_armor_crach_vapor', $('#t_armor_crach_vapor').val());
					formData.append('t_armor_tech', $('#t_armor_tech').val());
					formData.append('t_armor_tech_vapor', $('#t_armor_tech_vapor').val());
					formData.append('t_armor_time', $('#t_armor_time').val());
					formData.append('t_armor_date', $('#t_armor_date').val());
					formData.append('t_id_spr_ot_functions', $('#t_spr_ot_functions_id').val());
					formData.append('t_id_spr_ot_cat', $('#t_spr_ot_cat_id').val());
					formData.append('t_year', $('#t_year').val());
					formData.append('t_workload_heating', $('#t_workload_heating').val());
					formData.append('t_workload_gvs', $('#t_workload_gvs').val());
					formData.append('t_workload_pov', $('#t_workload_pov').val());
					formData.append('t_workload_tech', $('#t_workload_tech').val());
					formData.append('t_workload_vapor', $('#t_workload_vapor').val());
					formData.append('t_workload_percent', $('#t_workload_percent').val());
					formData.append('t_systemheat_place', $('#t_systemheat_place').val());
					formData.append('t_systemheat_water', $('#t_systemheat_water_id').val());
					formData.append('t_systemheat_dependent', $('#t_systemheat_dependent_id').val());
					formData.append('t_systemheat_layout', $('#t_systemheat_layout_id').val());
					formData.append('t_systemheat_type_op', $('#t_systemheat_type_op_id').val());
					formData.append('t_systemheat_mark_op', $('#t_systemheat_mark_op').val());				
					formData.append('t_spr_id_ot_type_to', $('#t_spr_ot_type_to_id').val());
					formData.append('t_systemheat_mark_to', $('#t_systemheat_mark_to').val());
					formData.append('t_gvs_open', $('#t_gvs_open_id').val());	
					formData.append('t_gvs_place', $('#t_gvs_place').val());
					formData.append('t_gvs_connect', $('#t_gvs_connect').val());
					formData.append('t_gvs_type', $('#t_gvs_type').val());
					formData.append('t_gvs_mark', $('#t_gvs_mark').val());
					formData.append('t_forced_vent_place', $('#t_forced_vent_place').val());
					formData.append('t_forced_vent_count', $('#t_forced_vent_count').val());
					formData.append('t_gvs_in', $('#t_gvs_in_id').val());
					formData.append('del_t', $('#del_t').val());
				
					$('#obj_ot_heatnet_t tbody tr').each(function() {	
						formData.append('ids_ot_heatnet_t[]', $(this).attr('id_obj_ot_heatnet_t'));
					});	
					$('#obj_ot_personal_tp tbody tr').each(function() {	
						formData.append('ids_obj_ot_personal_tp[]', $(this).attr('id_obj_ot_personal_tp'));
					});
					$('#obj_ot_personal_sar tbody tr').each(function() {	
						formData.append('ids_obj_ot_personal_sar[]', $(this).attr('id_obj_ot_personal_sar'));
					});	
					$('#mkm_object_t_ti tbody tr').each(function() {	
						formData.append('ids_obj_ot_heat_source[]', $(this).attr('id_mkm_object_t_ti'));
					});						
		/***********************************ТИ***********************************/
					formData.append('ti_is', $('#ti_is').val());
					formData.append('ti_reestr', $('#ti_reestr').val());
					formData.append('ti_name', $('#ti_name').val());
					formData.append('ti_insp', $('#Insp_ti').val());
					formData.append('ti_id_spr_ot_boiler_type', $('#oti_boiler_id').val());
					formData.append('ti_year', $('#ti_year').val());
					formData.append('ti_power', $('#ti_power').val());
					formData.append('ti_id_spr_ot_type_fuel_1', $('#oti_type_fuel_id').val());
					formData.append('ti_id_spr_ot_type_fuel_2', $('#oti_type_fuel_rezerv_id').val());
					formData.append('ti_out_power_ot', $('#ti_out_power_ot').val());
					formData.append('ti_out_power_gvs', $('#ti_out_power_gvs').val());
					formData.append('ti_out_power_tech', $('#ti_out_power_tech').val());
					formData.append('ti_out_power_vent', $('#ti_out_power_vent').val());
					formData.append('del_ti', $('#del_ti').val());
					
					$('#boiler_water tbody tr').each(function() {
						formData.append('ids_boiler_water[]', $(this).attr('id_boiler_water'));
					});
					$('#boiler_vapor tbody tr').each(function() {
						formData.append('ids_boiler_vapor[]', $(this).attr('id_boiler_vapor'));
					});	
					$('#obj_ot_heatnet tbody tr').each(function() {	
						formData.append('ids_ot_heatnet[]', $(this).attr('id_obj_ot_heatnet'));
					});					
				}	
		/***********************************Газ***********************************/
				if(inspect_type == 2){
					formData.append('g_insp', $('#Insp_gaz').val());
					formData.append('is_dom', $('#type_home').val());
					formData.append('g_count_flat', $('#count_flat').val());		
					formData.append('g_count_entrance', $('#count_pod').val());
					formData.append('g_id_spr_og_flue', $('#og_flue_id').val());
					formData.append('g_id_spr_og_flue_mater', $('#flue_mater_id').val());
					formData.append('g_flue_size', $('#flue_size').val());
					formData.append('g_id_spr_og_type_gaz', $('#type_gaz_id').val());
					formData.append('del_g', $('#del_g').val());
					
					$('#obj_og_device tbody tr').each(function() {	
						formData.append('ids_obj_og_device[]', $(this).attr('id_obj_og_device'));
					});					
				}
		/*************************************************************************/
				
				return formData;
		
	},
	
	usersList: function(){
		
		var id_spr_cod_podrazd = $('#formPodrazdelenieObject').val();
		
		var formData = new FormData();
		formData.append('spr_cod_podrazd', id_spr_cod_podrazd);
		formData.append('podrazdelenie', 1); // тепловики

		
		 $.ajax({
            url: '/ARM/objects/usersList/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
		
				$('#Insp_t').html(result);
				$('#Insp_ti').html(result);
            }
        });
		
		formData.append('podrazdelenie', 3); // электрики
		
		
		 $.ajax({
            url: '/ARM/objects/usersList/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
				$('#e_insp').html(result);
            }
        });
		
		formData.append('podrazdelenie', 2); // газовики
		
		
		 $.ajax({
            url: '/ARM/objects/usersList/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			
				$('#Insp_gaz').html(result);
            }
        });
		
		
	}
	
	
	
	
};

$(window).load(function() {
	
	//var all_cookies = document.cookie;
	var inspect_type = '';
	var access_level = '';
	inspect_type =$.cookie('podrazdelenie');
	access_level =$.cookie('access_level');
	
	//console.log($.cookie());
	
	if($("#type_home").val() == 1){
		
			/*$('div[id="m"]').css({'display': 'flex'});*/
			$('div[id="mo"]').css({'display': 'flex'});
			$('div[id="o"]').css({'display': 'none'});
			$('div[id="mot"]').css({'display': 'block'});
			$('div[id="mop"]').css({'display': 'block'});
			$('div[id="m"] input').attr('type', 'text');
			$('div[id="m"] label').css({'display': 'flex'});
	}
	
	if($("#type_home").val() == 2){
		
			/*$('div[id="o"]').css({'display': 'flex'});*/
			$('div[id="mo"]').css({'display': 'flex'});
			$('div[id="m"] label').css({'display': 'none'});
			$('div[id="mot"]').css({'display': 'block'});
			$('div[id="mop"]').css({'display': 'block'});
			$('div[id="o"] label').css({'display': 'block'});
			$("input[name='type_gaz']").attr('type', 'text');
			$('div[id="o"] button').css({'display': 'block'});
			
			
	}
	
	if($("#t_is").val() == 1){
		$('div[id="t_is"]').css({'display': 'block'});
	}
	if($("#t_is").val() == 0){
		$('div[id="t_is"]').css({'display': 'none'});
	}
	if($("#ti_is").val() == 1){
		$('div[id="ti_section"]').css({'display': 'block'});
	}
	if($("#ti_is").val() == 0){
		$('div[id="ti_section"]').css({'display': 'none'});
	}	
	if($("#is_bron").val() == 1){
		$('div[id="is_armor"]').css({'display': 'block'});
	}
	if($("#is_bron").val() == 0){
		$('div[id="is_armor"]').css({'display': 'none'});
	}	
	if($("#e_armor").val() == 1){
		$('div[id="bron_hidden"]').css({'display': 'block'});
	}
	if($("#e_armor").val() == 0){
		$('div[id="bron_hidden"]').css({'display': 'none'});
	}

	if($("#e_subobj").val() == 1){
		$('div[id="subobj_subject_hidden"]').css({'display': 'block'});
	}
	if($("#e_subobj").val() == 0){
		$('div[id="subobj_subject_hidden"]').css({'display': 'none'});
	}
	
	if($("#t_gvs_open_id").val() == 2){
			$('div[id="ot"]').css({'display': 'block'});
	}	
	if($("#t_systemheat_dependent_id").val() == 2){
			$('div[id="sp"]').css({'display': 'block'});
	}	
	
	/* блокируем вкладки */
	//console.log(inspect_type);
	switch(inspect_type){
		case '1':
		$('section[id=content-tab2] input').prop('disabled', true);
		$('section[id=content-tab2] select').prop('disabled', true);
		$('section[id=content-tab2] button').prop('disabled', true);

		$('section[id=content-tab1] input').prop('disabled', true);
		$('section[id=content-tab1] select').prop('disabled', true);
		$('section[id=content-tab1] button').prop('disabled', true);
		$('section[id=content-tab1] textarea').prop('disabled', true);
		
		$('section[id=content-tab5] input').prop('disabled', true);
		$('section[id=content-tab5] select').prop('disabled', true);
		$('section[id=content-tab5] button').prop('disabled', true);
		break;
		case '2':
			$('section[id=content-tab2] input').prop('disabled', true);
			$('section[id=content-tab2] select').prop('disabled', true);
			$('section[id=content-tab2] button').prop('disabled', true);
			
			$('section[id=content-tab3] input').prop('disabled', true);
			$('section[id=content-tab3] select').prop('disabled', true);
			$('section[id=content-tab3] button').prop('disabled', true);
			
			$('section[id=content-tab4] input').prop('disabled', true);
			$('section[id=content-tab4] select').prop('disabled', true);
			$('section[id=content-tab4] button').prop('disabled', true);
			
			$('section[id=content-tab1] input').prop('disabled', true);
			$('section[id=content-tab1] select').prop('disabled', true);
			$('section[id=content-tab1] button').prop('disabled', true);
			$('section[id=content-tab1] textarea').prop('disabled', true);
		break;
		case '3':
			$('section[id=content-tab3] input').prop('disabled', true);
			$('section[id=content-tab3] select').prop('disabled', true);
			$('section[id=content-tab3] button').prop('disabled', true);
			
			$('section[id=content-tab4] input').prop('disabled', true);
			$('section[id=content-tab4] select').prop('disabled', true);
			$('section[id=content-tab4] button').prop('disabled', true);
			
			$('section[id=content-tab5] input').prop('disabled', true);
			$('section[id=content-tab5] select').prop('disabled', true);
			$('section[id=content-tab5] button').prop('disabled', true);
		break;
		default:
			$('section[id=content-tab2] input').prop('disabled', true);
			$('section[id=content-tab2] select').prop('disabled', true);
			$('section[id=content-tab2] button').prop('disabled', true);
		
			$('section[id=content-tab3] input').prop('disabled', true);
			$('section[id=content-tab3] select').prop('disabled', true);
			$('section[id=content-tab3] button').prop('disabled', true);
			
			$('section[id=content-tab4] input').prop('disabled', true);
			$('section[id=content-tab4] select').prop('disabled', true);
			$('section[id=content-tab4] button').prop('disabled', true);
			
			$('section[id=content-tab5] input').prop('disabled', true);
			$('section[id=content-tab5] select').prop('disabled', true);
			$('section[id=content-tab5] button').prop('disabled', true);
		break;
		
	};
	
	
	/*if($("#t_heat_source_own").val() == 1 || $("#t_heat_source_own").val() == 3){
		$('section[id=content-tab4] input').prop('disabled', false);
		$('section[id=content-tab4] select').prop('disabled', false);
		$('section[id=content-tab4] button').prop('disabled', false);
		$('div[id="heat_source_hide"]').css({'display': 'block'});
	}
	
	if($("#t_heat_source_own").val() == 2 || $("#t_heat_source_own").val() == 3){	
		$('div[id="heat_source_hide"]').css({'display': 'block'});	
	}*/
/**************Установелнная мощность на вкладке Электро *******************/	
		var sum1 = parseFloat($("#e_cat_1").val());
		var sum2 = parseFloat($("#e_cat_1plus").val());
		var sum3 = parseFloat($("#e_cat_2").val());
		var sum4 = parseFloat($("#e_cat_3").val());
			
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}	
	
		sum =sum1+sum3+sum4; 

		$('#sum_power').html(sum);
		if(sum >0){
			$('#sum_power').html(sum);
		}else{
			$('#sum_power').html(" - ");	
		}
			
/******************* Вывод общая нагрузки (Гкал/ч) в объектах на вкладке "Тепло" ***********************************/	
	var sum1 = parseFloat($("#t_workload_heating").val());
	var sum2 = parseFloat($("#t_workload_gvs").val());
	var sum3 = parseFloat($("#t_workload_pov").val());
	var sum4 = parseFloat($("#t_workload_tech").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}	
	sum1 = sum1+sum2+sum3+sum4; 
	
	if(sum1>0){
		$('#sum_workload').html(sum1);
	}else{
		$('#sum_workload').html(" - ");	
	}
/********************************************************/	
});

$(window).ready(function(){
	
	$('#e_cat_1, #e_cat_1plus').bind("input", function(){
		var sum1 = parseFloat($("#e_cat_1").val());
		var sum2 = parseFloat($("#e_cat_1plus").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		
		if(sum2 > sum1){
			$("#e_cat_1plus").val(0)
		}
		
	});
	$("#del_e, #del_t, #del_ti, #del_g").bind("change", function(){
		if($(this).val() == 0){
			$(this).prop('value', 1);
		}else{
			$(this).prop('value', 0);
		}
	});
	$( "#e_cat_1, #e_cat_1plus, #e_cat_2, #e_cat_3" ).bind( "input", function() {
		
	
		var sum1 = parseFloat($("#e_cat_1").val());
		var sum2 = parseFloat($("#e_cat_1plus").val());
		var sum3 = parseFloat($("#e_cat_2").val());
		var sum4 = parseFloat($("#e_cat_3").val());
			
			
			
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}	
	
			//sum =sum1+sum2+sum3+sum4; 
			sum =sum1+sum3+sum4; 

			$('#sum_power').html(sum);

	});
	
	$( "#t_workload_heating" ).bind( "input", function() {
		
	
		var sum1 = parseFloat($("#t_workload_heating").val());
		var sum2 = parseFloat($("#t_workload_gvs").val());
		var sum3 = parseFloat($("#t_workload_pov").val());
		var sum4 = parseFloat($("#t_workload_tech").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}		

		sum = sum1+sum2+sum3+sum4;
		console.log("Hello");
		$('#sum_workload').html(sum);

	});
	$( "#t_workload_gvs" ).bind( "input", function() {
		
		var sum1 = parseFloat($("#t_workload_heating").val());
		var sum2 = parseFloat($("#t_workload_gvs").val());
		var sum3 = parseFloat($("#t_workload_pov").val());
		var sum4 = parseFloat($("#t_workload_tech").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}		
	
		sum = sum1+sum2+sum3+sum4; 
		console.log(sum);
		$('#sum_workload').html(sum);

	});
	$( "#t_workload_pov" ).bind( "input", function() {
		
		var sum1 = parseFloat($("#t_workload_heating").val());
		var sum2 = parseFloat($("#t_workload_gvs").val());
		var sum3 = parseFloat($("#t_workload_pov").val());
		var sum4 = parseFloat($("#t_workload_tech").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}
		
		sum = sum1+sum2+sum3+sum4; 
		console.log(sum);
		$('#sum_workload').html(sum);

	});
	$( "#t_workload_tech" ).bind( "input", function() {
		
		var sum1 = parseFloat($("#t_workload_heating").val());
		var sum2 = parseFloat($("#t_workload_gvs").val());
		var sum3 = parseFloat($("#t_workload_pov").val());
		var sum4 = parseFloat($("#t_workload_tech").val());
		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}
		if (isNaN(sum4)) { sum4 = 0;}
		
		sum = sum1+sum2+sum3+sum4;
		console.log(sum);
		$('#sum_workload').html(sum);

	});
$( "input[type=number]" ).bind( "change", function() {
	$(this).val($(this).val().replace(",", "."));
});

$('.btn_add_fields').blur();



});	