var object = {
    ajaxMethod: 'POST',

/********************************************************************************************/
    add: function(param) {
		event.preventDefault();
		
		var e_is = $("#elektro_is").val();
		var t_is = $("#t_is").val();
		var ti_is = $("#ti_is").val();
		var g_is = $("#gaz_is").val();
		var error = 0;
		
		if(e_is ==1 || t_is == 1 || ti_is == 1 || g_is ==1){
		
			formData = object.formDataInfo();

			error = object.checkFields();

			if(error == 0){		
			  $.ajax({
					url: '/ARM/basis/objects/add/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
						//console.log(result);
						if(result != 0){
					
							if(param == 'cancel'){
								window.location = '/ARM/basis/objects/list/'+$('#subject_id').val().trim();
							}else{
								alert('Данные сохранены');
								//$('button.obj_bttn_add').attr('onclick','object.update("cancel")');
								//$('button.obj_bttn_upd').attr('onclick','object.update("continue")');
								window.location = '/ARM/basis/objects/edit/'+result;
								//$('input#formObjectId').val(result);
							}
						
						}else{
							alert('Данные не сохранены из-за внутренней ошибки. \n Обратитесь в сектор РИТ');
						}	

					}
				});
			}else{
						var err_text = "";
						if(error) err_text += "<p>!!! Заполните пожалуйста все обязательные поля помеченные звездочкой (на всех вкладках) !!!</p>"
						$('#messenger').hide().fadeIn(500).html(err_text);
						return false;
			};	
		
		
		}else{
			alert("Укажите тип создаваемого объекта:\n электро / тепло / ТИ / газ");
		}
		
		
		
    },
/********************************************************************************************/
    update: function(param) {
		event.preventDefault();
		
        formData = object.formDataInfo();
		
		error = object.checkFields();

		if(error == 0){		

			$.ajax({
				url: '/ARM/basis/objects/update/',
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
						window.location = '/ARM/basis/objects/list/'+$('#subject_id').val().trim();
					}else{
						alert('Данные сохранены');
					}
					$('#messenger').fadeOut(300);
				}
			});
		}else{
				var err_text = "";
				if(error) err_text += "<p>!!! Заполните пожалуйста все обязательные поля помеченные звездочкой (на всех вкладках) !!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
		};	
    },
	
	checkFields: function(){

		var inspect_type = '';
		var fields = [];
		inspect_type =$.cookie('podrazdelenie');

		if($("#formPage").attr("mode") == "new_object"){
			
					
						if(inspect_type == 2){ ///////////////////// обязательные поля для сохранения во вкладке у газовиков
							if($("#gaz_is").is(':checked')){
								var fields = ["Insp_gaz","name_object"];
							}else{
								var fields = ["name_object"];
							}
						}
						
						var t = $("#t_is").val();
						var ti = $("#ti_is").val();
												
						if(inspect_type == 1){  ///////////////////// обязательные поля для сохранения во вкладке у тепловиков
							if(t > 0 && ti == 0){
								
								var fields = ["Insp_t","name_object","t_spr_ot_cat"];
								
							}else if(t == 0 && ti > 0) {
								var fields = ["Insp_ti","name_object","ti_name"];
							}else if(t > 0 && ti > 0) {
								
								var fields = ["Insp_ti","name_object","Insp_t","t_spr_ot_cat","ti_name"];
								
							
							}else{
								var fields = ["name_object"];
							}				
						}
						
						
						if(inspect_type == 3){  ///////////////////// обязательные поля для сохранения во вкладке у электриков
						
							//var fields = ["name_object","e_insp"];
								if($("#elektro_is").is(':checked')){
									var fields = ["e_insp","name_object"];
								}else{
									var fields = ["name_object"];
								}

						}
			
			
		}else if($("#formPage").attr("mode") == "edit_object"){
			
						if(inspect_type == 2 && $('#del_g').val() == 0){ ///////////////////// обязательные поля для сохранения во вкладке у газовиков
							if($("#gaz_is").is(':checked')){
								var fields = ["Insp_gaz","name_object","type_home"];
							}else{
								var fields = ["name_object"];
							}
						}
						
						var t = $("#t_is").val();
						var ti = $("#ti_is").val();
					
						if(inspect_type == 1 ){  ///////////////////// обязательные поля для сохранения во вкладке у тепловиков
							if(t > 0 && ti == 0 && $('#del_t').val() == 0){
								var fields = ["Insp_t","name_object","t_spr_ot_cat"];
							}else if(t == 0 && ti > 0  && $('#del_ti').val() == 0) {
								var fields = ["Insp_ti","name_object","ti_name"];
							}else if(t > 0 && ti > 0  && $('#del_t').val() == 0  && $('#del_ti').val() == 0) {
							
								var fields = ["Insp_ti","name_object","Insp_t","t_spr_ot_cat","ti_name"];
							}else{
								var fields = ["name_object"];
							}				
						}
						
						
						if(inspect_type == 3 && $('#del_e').val() == 0){  ///////////////////// обязательные поля для сохранения во вкладке у электриков
						
							//var fields = ["name_object","e_insp"];
								if($("#elektro_is").is(':checked')){
									var fields = ["e_insp","name_object"];
								}else{
									var fields = ["name_object"];
								}

						}			
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
				url: '/ARM/basis/objects/removeItem/',
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
	
	removeTableItem: function(tableName,itemId, tableNameId) {
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
	//	tableNameId - ID таблиц на вкладках теплообъекта
		if (tableNameId == undefined){
			tableNameId = false;
		}else{
			work_id = tableNameId.split('-').pop();
		}
	  
			$.ajax({
				url: '/ARM/basis/objects/removeTableItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				//console.log(tableName);
					//console.log($('table#'+tableName+' td[id_'+tableName+'='+itemId+']'));
					$('table#'+tableName+' tr[id_'+tableName+'="'+itemId+'"]').remove();
					
					if(tableNameId != false){
					
						$('table#'+tableNameId+' tr[id_'+tableName+'="'+itemId+'"]').remove();
					
					}

						if(tableName == 'obj_oe_klvl'){
								var rowCount = $("#obj_oe_klvl tbody tr").length;	
								var text = 'Кабельные и воздушные линии (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_klvl").html(text);
						}
						if(tableName == 'obj_oe_trp'){
								var rowCount = $("#obj_oe_trp tbody tr").length;	
								var text = 'Трансформаторные и распределительные подстанции (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_trps").html(text);
						}				
						if(tableName == 'obj_oe_avr'){
									var rowCount = $("#obj_oe_avr tbody tr").length;	
									var text = 'АВР (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_avr").html(text);
						}
						if(tableName == 'obj_oe_aie'){
								var rowCount = $("#obj_oe_aie tbody tr").length;	
								var text = 'Автономные источники электроснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_aie").html(text);
						}	
						if(tableName == 'obj_oe_block'){
									var rowCount = $("#obj_oe_block tbody tr").length;	
									var text = 'Блок-станции/собственной генерации (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_block").html(text);
						}
						if(tableName == 'obj_oe_vvd'){
									var rowCount = $("#obj_oe_vvd tbody tr").length;	
									var text = 'Высоковольтные двигатели, в т.ч. синхронные (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_vvd").html(text);						
						}
						if(tableName == 'obj_oe_ek'){
									var rowCount = $("#obj_oe_ek tbody tr").length;	
									var text = 'Электрокотельные, другое электронагревательное оборудование (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ek").html(text);						
						}
						if(tableName == 'obj_oe_ku'){
									var rowCount = $("#obj_oe_ku tbody tr").length;	
									var text = 'Компенсирующие устройства (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ku").html(text);					
						}
						if(tableName == 'boiler_vapor'){
									
									/*var rowCount = $("#boiler_vapor tbody tr").length;	
									var text = 'Паровые котлы (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_vapor").html(text);*/	

										var sum_power2 = 0;	
										var sum_kot_vapor = 0;
											
										if($("#boiler_vapor tbody tr").length > 0){	
											
											$('#boiler_vapor tbody tr').each(function() {

												//var sum2 = $(this).html();
												
													 var sum2 = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();												

												if (!isNaN(sum2) && sum2.length !== 0) {
													sum_power2 = sum_power2 + (parseFloat(sum2)*count);
													sum_kot_vapor = sum_kot_vapor + (parseInt(count));
												}
												
												$("#sum_power_kot_vapor").val(sum_power2);
												var text = 'Паровые котлы (' + (sum_kot_vapor > 0 ? sum_kot_vapor : '0') + ' шт.)';
												$("#numrow_vapor").html(text);
											
											});
										
										}else{
												$("#sum_power_kot_vapor").val(0);
										}	
											
												
											var sum_water = parseFloat($('#sum_power_kot_water').val());
											var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
											var sum_dop = parseFloat($('#ti_dop_power').val());
											
											if (isNaN(sum_water)) { sum_water = 0;}
											if (isNaN(sum_vapor)) { sum_vapor = 0;}
											if (isNaN(sum_dop)) { sum_dop = 0;}
											
											sum_power_kot =sum_water+sum_vapor+sum_dop;
											$("#ti_power").html(sum_power_kot);
													
													
			
						}
						
						if(tableName == 'boiler_water'){
									/*var rowCount = $("#boiler_water tbody tr").length;	
									var text = 'Водогрейные котлы (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_water").html(text);*/


											var sum_power = 0;
											var sum_kot_water = 0;
											
										if($("#boiler_water tbody tr").length > 0){				
											$('#boiler_water tbody tr').each(function() {
													
												//var sum = $(this).html();
												
													 var sum = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();
												
												if (!isNaN(sum) && sum.length !== 0) {
													sum_power = sum_power + (parseFloat(sum)*count);
													sum_kot_water = sum_kot_water + (parseFloat(count));
												}
												
												$("#sum_power_kot_water").val(sum_power);
												var text = 'Водогрейные котлы (' + (sum_kot_water > 0 ? sum_kot_water : '0') + ' шт.)';
												$("#numrow_water").html(text);
											
											});
										}else{
												$("#sum_power_kot_water").val(0);
										}		
												
											var sum_water = parseFloat($('#sum_power_kot_water').val());
											var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
											var sum_dop = parseFloat($('#ti_dop_power').val());
											
											if (isNaN(sum_water)) { sum_water = 0;}
											if (isNaN(sum_vapor)) { sum_vapor = 0;}
											if (isNaN(sum_dop)) { sum_dop = 0;}
											
											sum_power_kot =sum_water+sum_vapor+sum_dop;
											$("#ti_power").html(sum_power_kot);

									
						}	
						if(tableName == 'obj_ot_heatnet'){
									var rowCount = $("#obj_ot_heatnet tbody tr").length;	
									var text = 'Тепловые сети на балансе теплоисточника (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_heatnet").html(text);					
						}
						if(tableName == 'obj_ot_heatnet_t'){
									var rowCount = $("#obj_ot_heatnet_t tbody tr").length;	
									var text = 'Тепловые сети на балансе теплобъекта (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_heatnet_ts").html(text);					
						}						
						if(tableName == 'obj_ot_personal_tp'){
									var rowCount = $("#"+tableNameId+" tbody tr").length;	
									$("#numrow_pu-"+work_id+" .count_pu").html(rowCount);
						}	
						if(tableName == 'obj_ot_personal_sar'){
									var rowCount = $("#"+tableNameId+" tbody tr").length;	
									$("#numrow_sar-"+work_id+" .count_sar").html(rowCount);
						}
						if(tableName == 'obj_ot_teploobmennik_so'){
									var rowCount = $("#"+tableNameId+" tbody tr").length;	
									$("#numrow_t_so-"+work_id+" .count_so").html(rowCount);
						}
						if(tableName == 'obj_ot_teploobmennik_gvs'){
									var rowCount = $("#"+tableNameId+" tbody tr").length;	
									$("#numrow_t_gvs-"+work_id+" .count_gvs").html(rowCount);
						}
						if(tableName == 'obj_ot_tepl_kot'){
									var rowCount = $("#obj_ot_tepl_kot tbody tr").length;	
									var text = 'Теплообменники котельной (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_tepl_kot").html(text);
						}						
						if(tableName == 'obj_ot_prit_vent'){
									var rowCount = $("#"+tableNameId+" tbody tr").length;	
									$("#numrow_t_system-"+work_id+" .count_system").html(rowCount);
						}
						if(tableName == 'obj_og_device'){
									var rowCount = $("#obj_og_device tbody tr").length;	
									var text = 'Установленное газоиспользующее оборудование (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ust_go").html(text);					
						}	
						if(tableName == 'obj_og_obsl'){
									var rowCount = $("#obj_og_obsl tbody tr").length;	
									var text = 'Сведения об обследовании объекта (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_sv_oo").html(text);					
						}	
						if(tableName == 'obj_og_accidents'){
									var rowCount = $("#obj_og_accidents tbody tr").length;	
									var text = 'Сведения об авариях и НС (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_sv_ans").html(text);					
						}	
						if(tableName == 'mkm_object_t_ti'){
									var rowCount = $("#mkm_object_t_ti tbody tr").length;	
									var text = 'Источники теплоснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ist_teplo").html(text);					
						}						
				}
			});
	


	},
	
	/*subjectInfo: function(subjectId){
		
		var formData = new FormData();
		formData.append('subject_id', subjectId);
		
		$.ajax({
				url: '/ARM/basis/subject/info/'+subjectId,
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
		
	},*/
	
	objectInfo: function(objectsId){
		event.preventDefault();
		var formData = new FormData();
		formData.append('objects_id', objectsId);
		$.ajax({
				url: '/ARM/basis/objects/info/'+objectsId,
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
					
					$('#name').html(data['objects']['name']);
					$('#num_case_o').html(data['objects']['num_case_o']);
					$('#names').html(data['objects']['name']);
					$('#admin_spr').html(data['adm_r'] != null ? data['adm_r']['name'] : "");
					$('#mesto_object').html((data['br']!= null ? data['br']['name'] : "")+(data['podr'] != null ? ", "+data['podr']['name_podrazd'] : "")+(data['otd'] != null ? ", "+data['otd']['name_otdel'] : ""));
					$('#adress_object').html((data['objects']['address_index']!= null ? data['objects']['address_index'] : "")+(data['regions'] != null ? ", "+data['regions']['name'] : "")+(data['districts'] != null ? ", "+data['districts']['name']+" р-н" : "")+(data['cities'] != null ? ", "+data['cities']['name'] : "")+(data['citiesZone'] != null ? ", "+data['citiesZone']['name'] : "")+(data['objects']['address_street']!= null ? ", "+data['objects']['address_street'] : "")+(data['objects']['address_building']!= null  ? "-"+data['objects']['address_building'] : "")+(data['objects']['address_flat']!= null ? "-"+data['objects']['address_flat'] : ""));
					$('#type_home').html(data['spr_type_home'] != null ? data['spr_type_home']['name'] : "");
					$('#t_id_spr_ot_functions').html(data['spr_ot_functions'] != null ? data['spr_ot_functions']['name'] : "-");
					$('#type_objects').html(data['spr_type_objects'] != null ? data['spr_type_objects']['name'] : "-");
			/**********Электро*********************/
			if(data['objects']['elektro_is'] == 1){
					$('#is_e_info').html("Информация по объекту электрической энергии");
					$('#insp_e').html(data['usersElectro'] != null ? data['usersElectro']['fio'] : "");

						/****** надежность электроснабжения **/
						var sum1 = parseFloat(data['objects']['e_cat_1']);
						var sum2 = parseFloat(data['objects']['e_cat_2']);
						var sum3 = parseFloat(data['objects']['e_cat_3']);
							if (isNaN(sum1)) { sum1 = 0;}
							if (isNaN(sum2)) { sum2 = 0;}
							if (isNaN(sum3)) { sum3 = 0;}
							sum =sum1+sum2+sum3;
						$('#sum_power').html(sum > 0 ? sum : "-");
						$('#e_cat_1').html(data['objects']['e_cat_1'] != null ? data['objects']['e_cat_1'] : "-");
						$('#e_cat_1plus').html(data['objects']['e_cat_1plus'] != null ? data['objects']['e_cat_1plus'] : "-");
						$('#e_cat_2').html(data['objects']['e_cat_2'] != null ? data['objects']['e_cat_2'] : "-");
						$('#e_cat_3').html(data['objects']['e_cat_3'] != null ? data['objects']['e_cat_3'] : "-");	
						
						/****** режиме электропотребления **/
						$('#e_armor').html(data['objects']['e_armor'] == 1 ? "есть" : "нет");
						$('#e_armor_crach').html(data['objects']['e_armor_crach'] != null ? data['objects']['e_armor_crach'] : "-");
						$('#e_armor_tech').html(data['objects']['e_armor_tech'] != null ? data['objects']['e_armor_tech'] : "-");
						$('#e_armor_time').html(data['objects']['e_armor_time'] != null ? data['objects']['e_armor_time'] : "-");
								var now = data['objects']['e_armor_date'];
								if (now != null){
									d1 = now.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
									$('#e_armor_date').html(d1);
								}else{
									$('#e_armor_date').html("-");
								}
						/****** субабоненты **/
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

						/*******таблица кабельные воздушные линии*****/
						$('#numrow_klvl').html('Всего: '+data['obj_oe_klvls'].length+' шт.');
						str_table_klvl = '';
						$.each(data['obj_oe_klvls'], function(i,val){
							next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
							str_table_klvl =str_table_klvl+"<tr><td>"+val['spr_oe_klvl_type_name']+
															"</td><td>"+val['spr_oe_klvl_volt_name']+
															"</td><td>"+val['name']+
															"</td><td>"+val['mark']+
															"</td><td>"+val['length']+
															"</td><td>"+val['name_center']+
															"</td><td>"+val['spr_oe_category_line_name']+
															"</td><td>"+val['year']+
															"</td><td>"+val['srok']+
															"</td><td>"+next_srok+"</td></tr>";
						})
						$("#obj_oe_klvl tbody").html(str_table_klvl);
						
						/*******Трансформаторные и распределительные подстанции*****/
						$('#numrow_trps').html('Всего: '+data['obj_oe_trps'].length+' шт.');
							str_table_trps = '';
							$.each(data['obj_oe_trps'], function(i,val){
								next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								str_table_trps =str_table_trps+"<tr><td>"+val['name']+
																"</td><td>"+val['id_type']+
																"</td><td>"+val['power']+
																"</td><td>"+val['volt']+
																"</td><td>"+val['spr_trp_category_line_name']+
																"</td><td>"+val['year_begin']+
																"</td><td>"+val['srok']+
																"</td><td>"+next_srok+"</td></tr>";
							})
						$("#obj_oe_tp tbody").html(str_table_trps);

						/******* АВР *****/
						$('#numrow_avrs').html('Всего: '+data['obj_oe_avrs'].length+' шт.');
							str_table_avr = '';
							$.each(data['obj_oe_avrs'], function(i,val){
								date_avr = val['date'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								str_table_avr =str_table_avr+"<tr><td>"+val['place']+"</td><td>"+val['power']+"</td><td>"+val['time']+"</td><td>"+date_avr+"</td></tr>";
							})
						$("#obj_oe_avr_info tbody").html(str_table_avr);

						/******* Автономные источники электроснабжения *****/
						$('#numrow_aie').html('Всего: '+data['obj_oe_aies'].length+' шт.');
						str_table_aie = '';
						$.each(data['obj_oe_aies'], function(i,val){
							next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
							date_aie = val['date_last'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
							str_table_aie =str_table_aie+"<tr><td>"+val['name']+
														"</td><td>"+val['place']+
														"</td><td>"+val['type']+
														"</td><td>"+val['power']+
														"</td><td>"+val['mosch']+
														"</td><td>"+val['pitanie']+
														"</td><td>"+date_aie+
														"</td><td>"+val['factory']+
														"</td><td>"+val['year_begin']+
														"</td><td>"+val['srok']+
														"</td><td>"+next_srok+"</td></tr>";
						})
						$("#obj_oe_aie tbody").html(str_table_aie);
						
						
						/******* блок станции  *****/
						$('#numrow_block').html('Всего: '+data['obj_oe_blocks'].length+' шт.');
						str_table_block = '';
							$.each(data['obj_oe_blocks'], function(i,val){
								str_table_block =str_table_block+"<tr><td>"+val['name']+
																"</td><td>"+val['power']+
																"</td><td>"+val['spr_oe_energy_type_name']+
																"</td><td>"+(val['add_load'] == 1 ? "да" : "нет")+"</td></tr>";
							})
							$("#obj_oe_block tbody").html(str_table_block);	
							
						
						/******* Высоковольтные двигатели, в т.ч. синхронные  *****/
						$('#numrow_vvd').html('Всего: '+data['obj_oe_vvds'].length+' шт.');
						str_table_vvd = '';
							$.each(data['obj_oe_vvds'], function(i,val){
								next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								str_table_vvd =str_table_vvd+"<tr><td>"+val['name']+
																"</td><td>"+val['vvd_count']+
																"</td><td>"+val['power']+
																"</td><td>"+val['voltage']+
																"</td><td>"+val['year_begin']+
																"</td><td>"+val['srok']+
																"</td><td>"+next_srok+"</td></tr>";
							})
							$("#obj_oe_vvd tbody").html(str_table_vvd);							
						
						/******* Электрокотельные, другое электронагревательное оборудование  *****/
						$('#numrow_ek').html('Всего: '+data['obj_oe_eks'].length+' шт.');
						str_table_ek = '';
							$.each(data['obj_oe_eks'], function(i,val){
								next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								date_vid = val['date_vid'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								str_table_ek =str_table_ek+"<tr><td>"+val['place']+
																"</td><td>"+val['name']+
																"</td><td>"+val['ek_count']+
																"</td><td>"+val['nazn']+ 
																"</td><td>"+val['power']+ 
																"</td><td>"+date_vid+
																"</td><td>"+val['rezim_name']+
																"</td><td>"+(val['is_avt'] == 1 ? "да" : "нет")+
																"</td><td>"+(val['is_pu'] == 1 ? "да" : "нет")+
																"</td><td>"+(val['is_ak'] == 1 ? "да" : "нет")+
																"</td><td>"+val['year_begin']+
																"</td><td>"+val['srok']+
																"</td><td>"+next_srok+"</td></tr>";
							})
							$("#obj_oe_ek tbody").html(str_table_ek);							
						
						/******* Компенсирующие устройства  *****/
						$('#numrow_ku').html('Всего: '+data['obj_oe_kus'].length+' шт.');
						str_table_ku = '';
							$.each(data['obj_oe_kus'], function(i,val){
								next_srok = val['next_srok'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
								str_table_ku =str_table_ku+"<tr><td>"+val['place']+
																"</td><td>"+val['name']+
																"</td><td>"+val['voltage']+
																"</td><td>"+val['ku_count']+
																"</td><td>"+val['power']+ 
																"</td><td>"+val['count_ar']+
																"</td><td>"+val['max_ar']+
																"</td><td>"+val['year_begin']+
																"</td><td>"+val['srok']+
																"</td><td>"+next_srok+"</td></tr>";
							})
							$("#obj_oe_ku tbody").html(str_table_ku);						
						
	
					$('#e_district').html(data['objects']['e_district'] != null ? data['objects']['e_district'] : "-");	
					$('#e_flood').html(data['objects']['e_flooding'] == 1 ? "да" : "нет");						
					$('#e_inactive').html(data['objects']['inactive_e'] == 1 ? "да" : "нет");	
					$('#e_del').html(data['objects']['del_e'] == 1 ? "да" : "нет");		
				}else{
					$('#is_e_info').html("Объект не является потребителем тепловой энергии");
					$('section[id=content-tab2] div[class="div_info"]').css({'display': 'none'});
					$('section[id=content-tab2] div[class="hr"]').css({'display': 'none'});
					$('section[id=content-tab2] p[class="p_gaz"]').css({'display': 'none'});
					$('section[id=content-tab2] div[class="mobileTable"]').css({'display': 'none'});
					
				}		
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

					
					$('#t_id_spr_ot_cat').html(data['spr_ot_cat'] != null ? data['spr_ot_cat']['name'] : "-");
					/*$('#t_year').html(data['objects']['t_year']);*/
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
					
					$('#t_count_itp').html(data['objects']['t_count_itp'] != null ? data['objects']['t_count_itp'] : "-");
					
					str_table_itp = '';
					$.each(data['obj_ot_personal_tps'], function(i,val){
						str_table_itp =str_table_itp+"<tr><td>"+val['device_place']+"</td><td>"+val['device']+"</td><td>"+(val['nazn_tp_ot'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_tp_gvs'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_tp_tn'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_tp_vent'] == 1 ? "да" : "нет")+"</td></tr>";
					})
					$("#obj_ot_personal_tp tbody").html(str_table_itp);					
					
					str_table_sar = '';
					//console.log(data['obj_ot_personal_sars']);
					$.each(data['obj_ot_personal_sars'], function(i,val){
						str_table_sar =str_table_sar+"<tr><td>"+val['sar']+"</td><td>"+val['count_sar']+"</td><td>"+(val['nazn_sar_ot'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_sar_gvs'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_sar_tn'] == 1 ? "да" : "нет")+"</td><td>"+(val['nazn_sar_vent'] == 1 ? "да" : "нет")+"</td></tr>";
					})
					$("#obj_ot_personal_sar tbody").html(str_table_sar);						
					
					$('#t_gvs_open').html(data['spr_ot_gvs_open'] != null ? data['spr_ot_gvs_open']['name'] : "-");
					$('#t_gvs_in').html(data['spr_ot_gvs_in'] != null ? data['spr_ot_gvs_in']['name'] : "-");
					$('#t_gvs_place').html(data['objects']['t_gvs_place'] != null ? data['objects']['t_gvs_place'] : "-");
					$('#t_gvs_connect').html(data['objects']['t_gvs_connect'] != null ? data['objects']['t_gvs_connect'] : "-");
					$('#t_gvs_type').html(data['objects']['t_gvs_type'] != null ? data['objects']['t_gvs_type'] : "-");
					$('#t_gvs_mark').html(data['objects']['t_gvs_mark'] != null ? data['objects']['t_gvs_mark'] : "-");
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
					/*$('#ti_year').html(data['objects']['ti_year'] != null ? data['objects']['ti_year'] : "-");*/
					$('#ti_power').html(data['objects']['ti_power'] != null ? data['objects']['ti_power'] : "-");
					/*$('#ti_id_spr_ot_type_fuel_1').html(data['spr_oti_type_fuel'] != null ? data['spr_oti_type_fuel']['name'] : "-");
					$('#ti_id_spr_ot_type_fuel_2').html(data['spr_oti_type_fuel_rezerv'] != null ? data['spr_oti_type_fuel_rezerv']['name'] : "-");*/

					
					$('#ti_out_power_ot_is').html(data['objects']['ti_out_power_ot'] == 1 ? "да" : "нет");
					$('#ti_out_power_gvs_is').html(data['objects']['ti_out_power_gvs'] == 1 ? "да" : "нет");
					$('#ti_out_power_tech_is').html(data['objects']['ti_out_power_tech'] == 1 ? "да" : "нет");
					$('#ti_out_power_vent_is').html(data['objects']['ti_out_power_vent'] == 1 ? "да" : "нет");
					
					
					
					str_table_boiler_water = '';
					$.each(data['obj_oti_boiler_waters'], function(i,val){
						str_table_boiler_water =str_table_boiler_water+"<tr><td>"+val['type']+"</td><td>"+val['year']+"</td><td>"+val['counts']+"</td><td>"+val['name_osn_fuel']+"</td><td>"+val['name_rezerv_fuel']+"</td><td>"+val['power']+"</td></tr>";
					})
					$("#boiler_water tbody").html(str_table_boiler_water);					


					str_table_boiler_vapor = '';
					$.each(data['obj_oti_boiler_vapors'], function(i,val){
						str_table_boiler_vapor =str_table_boiler_vapor+"<tr><td>"+val['type']+"</td><td>"+val['year']+"</td><td>"+val['counts']+"</td><td>"+val['name_osn_fuel']+"</td><td>"+val['name_rezerv_fuel']+"</td><td>"+val['perfomance']+"</td><td>"+val['power']+"</td></tr>";
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
				if(data['objects']['gaz_is'] > 0){				
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
					
					$('#g_flue_naim_org_insp').html(data['objects']['g_flue_naim_org_insp'] != null ? data['objects']['g_flue_naim_org_insp'] : "-");
					$('#g_flue_date_insp').html(data['objects']['g_flue_date_insp'] != null ? data['objects']['g_flue_date_insp'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_flue_date_insp_next').html(data['objects']['g_flue_date_insp_next'] != null ? data['objects']['g_flue_date_insp_next'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_date_initial_start').html(data['objects']['g_date_initial_start'] != null ? data['objects']['g_date_initial_start'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					
					$('#g_flue_date_dog').html(data['objects']['g_flue_date_dog'] != null ? data['objects']['g_flue_date_dog'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_flue_date_to').html(data['objects']['g_flue_date_to'] != null ? data['objects']['g_flue_date_to'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_flue_date_gto').html(data['objects']['g_flue_date_gto'] != null ? data['objects']['g_flue_date_gto'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_flue_date_prto').html(data['objects']['g_flue_date_prto'] != null ? data['objects']['g_flue_date_prto'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : "-");
					$('#g_flue_naim_org_dog').html(data['objects']['g_flue_naim_org_dog'] != null ? data['objects']['g_flue_naim_org_dog'] : "-");
					$('#g_flue_num_dog').html(data['objects']['g_flue_num_dog'] != null ? data['objects']['g_flue_num_dog'] : "-");
					/*$('#g_flue_vid_to').html(data['spr_og_to_gaz'] != null ? data['spr_og_to_gaz']['name'] : "-");*/
					
					str_table_obj_og_obsled = '';
					$.each(data['obj_og_obsls'], function(i,val){
						str_table_obj_og_obsled =str_table_obj_og_obsled+"<tr><td>"+val['date_obsl'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+"</td><td>"+val['name']+"</td>></tr>";
					})
					$("#obj_og_obsled tbody").html(str_table_obj_og_obsled);	

					str_table_obj_og_accidents = '';
					$.each(data['obj_og_accident_ns'], function(i,val){
						str_table_obj_og_accidents =str_table_obj_og_accidents+"<tr><td>"+val['date_accidents'].replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+"</td><td>"+val['name']+"</td><td>"+val['character_accidents']+"</td>></tr>";
					})
					$("#obj_og_accident_ns tbody").html(str_table_obj_og_accidents);					
					
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
		var err_text = "";
		var id_edit = $('input[name="id_boiler_water"]').val();
				

		var type = $('#water_type').val();
		var year = $('#water_year').val();
		var power = $('#water_power').val();
		var counts = $('#water_counts').val();
		var type_osn_fuel = $('#type_osn_fuel').val();
		var name_osn_fuel = $('#type_osn_fuel option:selected').text();
		var type_rezerv_fuel = $('#type_rezerv_fuel').val();
		var name_rezerv_fuel = $('#type_rezerv_fuel option:selected').text();
				
				
				
				if(($('#water_type').val()).length > 0 && ($('#water_year').val()).length > 0 && ($('#water_power').val()).length > 0 && ($('#water_counts').val()).length > 0 && ($('#type_osn_fuel').val()) > 0 && ($('#type_rezerv_fuel').val())> 0){
					formData.append('id', id_edit);	
					formData.append('objects_id', $('#formObjectId').val());				
					formData.append('type', $('#water_type').val());			
					formData.append('year', $('#water_year').val());
					formData.append('power', $('#water_power').val());
					formData.append('counts', $('#water_counts').val());
					formData.append('type_osn_fuel', $('#type_osn_fuel').val());
					formData.append('name_osn_fuel', $('#type_osn_fuel option:selected').text());
					formData.append('type_rezerv_fuel', $('#type_rezerv_fuel').val());
					formData.append('name_rezerv_fuel', $('#type_rezerv_fuel option:selected').text());					
					
		
						str_tbody_first = $("#boiler_water tbody").html() 

					  $.ajax({
							url: '/ARM/basis/objects/add_boiler_water/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
							
							if(id_edit>0){
									$("tr[id_boiler_water="+id_edit+"] td[name='type']").html(type);
									$("tr[id_boiler_water="+id_edit+"] td[name='year']").html(year);
									$("tr[id_boiler_water="+id_edit+"] td[name='counts']").html(counts);
									
									$("tr[id_boiler_water="+id_edit+"] td[type_osn_fuel]").attr('type_osn_fuel',type_osn_fuel);
									$("tr[id_boiler_water="+id_edit+"] td[type_osn_fuel="+type_osn_fuel+"]").html(name_osn_fuel);
									
									$("tr[id_boiler_water="+id_edit+"] td[type_rezerv_fuel]").attr('type_rezerv_fuel',type_rezerv_fuel);
									$("tr[id_boiler_water="+id_edit+"] td[type_rezerv_fuel="+type_rezerv_fuel+"]").html(name_rezerv_fuel);					
									
									$("tr[id_boiler_water="+id_edit+"] td[name='power']").html(power);
									
											var sum_power_edit = 0;
											var sum_kotl = 0;
											$('#boiler_water tbody tr').each(function() {
												
													
													 //var sum_edit = $(this).html();
													 var sum_edit = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();
													  														
														
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_power_edit = sum_power_edit + (parseFloat(sum_edit)*count);
															sum_kotl = sum_kotl + parseInt(count);
															
														};
													$("#sum_power_kot_water").val(sum_power_edit);
													var text = 'Водогрейные котлы (' + (sum_kotl > 0 ? sum_kotl : '0') + ' шт.)';
													$("#numrow_water").html(text);
											});
												var sum_water = parseFloat($('#sum_power_kot_water').val());
												var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
												var sum_dop = parseFloat($('#ti_dop_power').val());
												
												if (isNaN(sum_water)) { sum_water = 0;}
												if (isNaN(sum_vapor)) { sum_vapor = 0;}
												if (isNaN(sum_dop)) { sum_dop = 0;}
												
												
												sum_power_kot =sum_water+sum_vapor+sum_dop;
												 //console.log(sum_power_kot);
												$("#ti_power").html(sum_power_kot);
									
									
							}else{			  
									  str_tbody =  str_tbody_first + result;
									  if((result).length > 0){  
									  
										$("#boiler_water tbody").html(str_tbody); 
											
										/*var rowCount = $("#boiler_water tbody tr").length;	
										var text = 'Водогрейные котлы (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
										$("#numrow_water").html(text);*/
											
										var sum_power = 0;
										var sum_kotl = 0;											
										
											$('#boiler_water tbody tr').each(function() {
													
												//var sum = $(this).html();
													 var pow = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();												
												
													if (!isNaN(sum) && sum.length !== 0) {
														sum_power = sum_power + (parseFloat(pow)*count);
														sum_kotl = sum_kotl + parseInt(count);
													}
												
												$("#sum_power_kot_water").val(sum_power);
												var text = 'Водогрейные котлы (' + (sum_kotl > 0 ? sum_kotl : '0') + ' шт.)';
												$("#numrow_water").html(text);
											
											});
											
												
											var sum_water = parseFloat($('#sum_power_kot_water').val());
											var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
											var sum_dop = parseFloat($('#ti_dop_power').val());
											
											if (isNaN(sum_water)) { sum_water = 0;}
											if (isNaN(sum_vapor)) { sum_vapor = 0;}
											if (isNaN(sum_dop)) { sum_dop = 0;}
											
											sum_power_kot =sum_water+sum_vapor+sum_dop;
											$("#ti_power").html(sum_power_kot);
										
									  }
								} 
							}
						});
				}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_water').hide().fadeIn(500).html(err_text);
					if(($('#water_type').val()).length == 0){
						$('#water_type').addClass("formError");
					}else{
						$('#water_type').removeClass("formError");
					}
					if(($('#water_year').val()).length == 0){
						$('#water_year').addClass("formError");
					}else{
						$('#water_year').removeClass("formError");
					}
					if(($('#water_power').val()).length == 0){
						$('#water_power').addClass("formError");
					}else{
						$('#water_power').removeClass("formError");
					}					
					if(($('#water_counts').val()).length == 0){
						$('#water_counts').addClass("formError");
					}else{
						$('#water_counts').removeClass("formError");
					}
					if(($('#type_osn_fuel').val()) == 0){
						$('#type_osn_fuel').addClass("formError");
					}else{
						$('#type_osn_fuel').removeClass("formError");
					}					
					if(($('#type_rezerv_fuel').val()) == 0){
						$('#type_rezerv_fuel').addClass("formError");
					}else{
						$('#type_rezerv_fuel').removeClass("formError");
					}
				}
				
				if(($('#water_type').val()).length > 0 && ($('#water_year').val()).length > 0 && ($('#water_power').val()).length > 0 && ($('#water_counts').val()).length > 0 && ($('#type_osn_fuel').val()) > 0 && ($('#type_rezerv_fuel').val()) > 0){
					$('#messenger_modal_water').html("");
					$('input[name="id_boiler_water"]').val('');
					$("input[name='water_type']").val('');				
					$("input[name='water_year']").val('');
					$("input[name='water_power']").val('');
					$("input[name='water_counts']").val('');
					$("select[name='type_osn_fuel']").val('');
					$("select[name='type_rezerv_fuel']").val('');
					
					$('#water_type').removeClass("formError");
					$('#water_year').removeClass("formError");
					$('#water_power').removeClass("formError");
					$('#water_counts').removeClass("formError");
					$('#type_osn_fuel').removeClass("formError");
					$('#type_rezerv_fuel').removeClass("formError");
					
					$('#ModalBoiler_water').fadeOut(300);
					$('#ModalBoiler_water_overlay').fadeOut(300);

				}
    },
	

	add_boiler_vapor: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_boiler_vapor"]').val();
			

		var type = $('#vapor_type').val();
		var year = $('#vapor_year').val();
		var power = $('#vapor_power').val();
		var counts = $('#vapor_counts').val();
		var perfomance = $('#vapor_perfomance').val();
		var vapor_type_osn_fuel = $('#vapor_type_osn_fuel').val();
		var vapor_name_osn_fuel = $('#vapor_type_osn_fuel option:selected').text();
		var vapor_type_rezerv_fuel = $('#vapor_type_rezerv_fuel').val();
		var vapor_name_rezerv_fuel = $('#vapor_type_rezerv_fuel option:selected').text();
			
				
			if(($('#vapor_type').val()).length > 0 && ($('#vapor_year').val()).length > 0 && ($('#vapor_counts').val()).length > 0 && ($('#vapor_perfomance').val()) > 0 && ($('#vapor_type_osn_fuel').val())> 0 && ($('#vapor_type_rezerv_fuel').val())> 0){	
				
				formData.append('id', id_edit);	
				formData.append('objects_id', $('#formObjectId').val());				
				formData.append('type', $('#vapor_type').val());		
				formData.append('year', $('#vapor_year').val());
				formData.append('power', $('#vapor_power').val());
				formData.append('counts', $('#vapor_counts').val());
				formData.append('perfomance', $('#vapor_perfomance').val());
				formData.append('vapor_type_osn_fuel', $('#vapor_type_osn_fuel').val());
				formData.append('vapor_name_osn_fuel', $('#vapor_type_osn_fuel option:selected').text());
				formData.append('vapor_type_rezerv_fuel', $('#vapor_type_rezerv_fuel').val());
				formData.append('vapor_name_rezerv_fuel', $('#vapor_type_rezerv_fuel option:selected').text());
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_vapor').hide().fadeIn(500).html(err_text);
					if(($('#vapor_type').val()).length == 0){
						$('#vapor_type').addClass("formError");
					}else{
						$('#vapor_type').removeClass("formError");
					}
					if(($('#vapor_year').val()).length == 0){
						$('#vapor_year').addClass("formError");
					}else{
						$('#vapor_year').removeClass("formError");
					}
					/*if(($('#vapor_power').val()).length == 0){
						$('#vapor_power').addClass("formError");
					}else{
						$('#vapor_power').removeClass("formError");
					}*/					
					if(($('#vapor_counts').val()).length == 0){
						$('#vapor_counts').addClass("formError");
					}else{
						$('#vapor_counts').removeClass("formError");
					}
					if(($('#vapor_perfomance').val()).length == 0){
						$('#vapor_perfomance').addClass("formError");
					}else{
						$('#vapor_perfomance').removeClass("formError");
					}
					if(($('#vapor_type_osn_fuel').val()) == 0){
						$('#vapor_type_osn_fuel').addClass("formError");
					}else{
						$('#vapor_type_osn_fuel').removeClass("formError");
					}					
					if(($('#vapor_type_rezerv_fuel').val()) == 0){
						$('#vapor_type_rezerv_fuel').addClass("formError");
					}else{
						$('#vapor_type_rezerv_fuel').removeClass("formError");
					}					
					
					
			}						
		str_tbody_first = $("#boiler_vapor tbody").html() 

      $.ajax({
            url: '/ARM/basis/objects/add_boiler_vapor/',
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

					$("tr[id_boiler_vapor="+id_edit+"] td[name='type']").html(type);
					$("tr[id_boiler_vapor="+id_edit+"] td[name='year']").html(year);
					$("tr[id_boiler_vapor="+id_edit+"] td[name='counts']").html(counts);
					
					
					$("tr[id_boiler_vapor="+id_edit+"] td[vapor_type_osn_fuel]").attr('vapor_type_osn_fuel',vapor_type_osn_fuel);
					$("tr[id_boiler_vapor="+id_edit+"] td[vapor_type_osn_fuel="+vapor_type_osn_fuel+"]").html(vapor_name_osn_fuel);
					
					$("tr[id_boiler_vapor="+id_edit+"] td[vapor_type_rezerv_fuel]").attr('vapor_type_rezerv_fuel',vapor_type_rezerv_fuel);
					$("tr[id_boiler_vapor="+id_edit+"] td[vapor_type_rezerv_fuel="+vapor_type_rezerv_fuel+"]").html(vapor_name_rezerv_fuel);						
					
					
					$("tr[id_boiler_vapor="+id_edit+"] td[name='perfomance']").html(perfomance);
					$("tr[id_boiler_vapor="+id_edit+"] td[name='power']").html(power);
					
								/*var rowCount = $("#boiler_vapor tbody tr").length;	
								var text = 'Паровые котлы (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_vapor").html(text);*/

											var sum_power2_edit = 0;
											var sum_kotl_vapor = 0;
											$('#boiler_vapor tbody tr').each(function() {
												
													
													 //var sum_edit2 = $(this).html();
													 
													 
													 var sum_edit2 = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();													 
													 
													 
														if (!isNaN(sum_edit2) && sum_edit2.length !== 0) {
															sum_power2_edit = sum_power2_edit + (parseFloat(sum_edit2)*count);
															sum_kotl_vapor = sum_kotl_vapor + (parseInt(count));
															
														};
													$("#sum_power_kot_vapor").val(sum_power2_edit);
													var text = 'Паровые котлы (' + (sum_kotl_vapor > 0 ? sum_kotl_vapor : '0') + ' шт.)';
													$("#numrow_vapor").html(text);
													
											});
												var sum_water = parseFloat($('#sum_power_kot_water').val());
												var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
												var sum_dop = parseFloat($('#ti_dop_power').val());
												
												if (isNaN(sum_water)) { sum_water = 0;}
												if (isNaN(sum_vapor)) { sum_vapor = 0;}
												if (isNaN(sum_dop)) { sum_dop = 0;}
												
												
												sum_power_kot =sum_water+sum_vapor+sum_dop;
												$("#ti_power").html(sum_power_kot);								
		
			}else{	

					  str_tbody =  str_tbody_first + result;

					  if((result).length > 0){ 
						$("#boiler_vapor tbody").html(str_tbody); 
					 
								var rowCount = $("#boiler_vapor tbody tr").length;	
								var text = 'Паровые котлы (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_vapor").html(text);
	
										var sum_power2 = 0;	
										var sum_kotl_vapor = 0;
											$('#boiler_vapor tbody tr').each(function() {
													
												//var sum2 = $(this).html();
													 var sum2 = $(this).children('td[name=power]').html();
													 var count = $(this).children('td[name=counts]').html();												
												
												if (!isNaN(sum2) && sum2.length !== 0) {
													sum_power2 = sum_power2 + (parseFloat(sum2)*count);
													sum_kotl_vapor = sum_kotl_vapor + (parseInt(count));
												}
												
												$("#sum_power_kot_vapor").val(sum_power2);
												var text = 'Паровые котлы (' + (sum_kotl_vapor > 0 ? sum_kotl_vapor : '0') + ' шт.)';
												$("#numrow_vapor").html(text);											
											});
											
												
											var sum_water = parseFloat($('#sum_power_kot_water').val());
											var sum_vapor = parseFloat($('#sum_power_kot_vapor').val());
											var sum_dop = parseFloat($('#ti_dop_power').val());
											
											if (isNaN(sum_water)) { sum_water = 0;}
											if (isNaN(sum_vapor)) { sum_vapor = 0;}
											if (isNaN(sum_dop)) { sum_dop = 0;}
											
											sum_power_kot =sum_water+sum_vapor+sum_dop;
											$("#ti_power").html(sum_power_kot);					 

					 }
			  
			}  
            }
        });
	
			if(($('#vapor_type').val()).length > 0 && ($('#vapor_year').val()).length > 0 && ($('#vapor_counts').val()).length > 0 && ($('#vapor_perfomance').val()) > 0 && ($('#vapor_type_osn_fuel').val())> 0 && ($('#vapor_type_rezerv_fuel').val())> 0){	    
					$('#messenger_modal_vapor').html("");
					$('input[name="id_boiler_vapor"]').val('');
					$("input[name='vapor_type']").val('');				
					$("input[name='vapor_year']").val('');
					$("input[name='vapor_power']").val('');
					$("input[name='vapor_counts']").val('');
					$("input[name='vapor_perfomance']").val('');
					$("select[name='vapor_type_osn_fuel']").val('');
					$("select[name='vapor_type_rezerv_fuel']").val('');

			  		$('#vapor_type').removeClass("formError");
					$('#vapor_year').removeClass("formError");
					$('#vapor_power').removeClass("formError");
					$('#vapor_counts').removeClass("formError");
					$('#vapor_perfomance').removeClass("formError");
					$('#vapor_type_osn_fuel').removeClass("formError");
					$('#vapor_type_rezerv_fuel').removeClass("formError");
				
				
				$('#ModalBoiler_vapor').fadeOut(300);
				$('#ModalBoiler_vapor_overlay').fadeOut(300);	
	
			}
	
	
	
	},
	clear_fields: function(inputId) {
		event.preventDefault();
		inputNameID = inputId+'_id';
		inputName = inputId;
		$("input[name='"+inputNameID+"']").val('');
		$("input[name='"+inputName+"']").val('');
		$("textarea[name='"+inputName+"']").val('');
		$("select[name='"+inputName+"']").val('');
		
		if(inputId = 'e_subobj_subject'){
			$("input[name='e_subobj_subject_id']").val(0);
			$("input[name='e_subobj_obj_id']").val(0);
			$('#razr_subobj_power').html("");
		}
		
		
		
	},	
	og_hide_show: function(value) {
		if(value == 1){
			$('div[gaz_block="m"]').css({'display': 'block'});
			$('div[gaz_block="mo"]').css({'display': 'block'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'none'});
		}else if(value == 2){
			$('div[gaz_block="m"]').css({'display': 'none'});
			$('div[gaz_block="mo"]').css({'display': 'block'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'none'});
		}else if(value == 3){
			$('div[gaz_block="m"]').css({'display': 'none'});
			$('div[gaz_block="mo"]').css({'display': 'none'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'block'});
		}else{
			$('div[gaz_block="m"]').css({'display': 'none'});
			$('div[gaz_block="mo"]').css({'display': 'none'});
			$('div[gaz_block="mod"]').css({'display': 'none'});
			$('div[gaz_block="d"]').css({'display': 'none'});
		}
		
	},
	uzel_hide_show: function(value, work_id) {
		//console.log($(this));
		if(value == 1 || value == 2 || value == 3 || value == 4 || value == 5){
			$('#content-'+work_id+' div[class="uzel_name"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_pu"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_sar"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_so"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_gvs"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_system"]').css({'display': 'block'});
		/*}else if(value == 5){
			$('#content-'+work_id+' div[class="uzel_name"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_pu"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_sar"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_so"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_gvs"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_system"]').css({'display': 'none'});*/
		}else if(value == 6){
			$('#content-'+work_id+' div[class="uzel_name"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_pu"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_sar"]').css({'display': 'block'});
			$('#content-'+work_id+' div[class="uzel_so"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_gvs"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_system"]').css({'display': 'block'});
		}else{
			$('#content-'+work_id+' div[class="uzel_name"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_pu"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_sar"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_so"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_gvs"]').css({'display': 'none'});
			$('#content-'+work_id+' div[class="uzel_system"]').css({'display': 'none'});
		}
		

	},
	teploobmennik_gvs_hide_show: function(value, id_uzel) {
		if(value == 3){
			$('#'+id_uzel+' div[class="teploobmennik_gvs"]').css({'display': 'block'});
		}else{
			$('#'+id_uzel+' div[class="teploobmennik_gvs"]').css({'display': 'none'});
		}
		
	},
	teploobmennik_os_hide_show: function(value, id_uzel) {
		if(value == 2){
			$('#'+id_uzel+' div[class="teploobmennik_so"]').css({'display': 'block'});
		}else{
			$('#'+id_uzel+' div[class="teploobmennik_so"]').css({'display': 'none'});
		}
		
	},
	ts_hide_show: function(value) {
		if(value == 4){
			$('div[id="ts_type_tube"]').css({'display': 'block'});
		}else{
			$('div[id="ts_type_tube"]').css({'display': 'none'});
			$("select[name='heatnet_type_isolation']").val('0');
		}
		
	},
	tst_hide_show: function(value) {
		if(value == 4){
			$('div[id="tst_type_tube"]').css({'display': 'block'});
		}else{
			$('div[id="tst_type_tube"]').css({'display': 'none'});
			$("select[name='t_heatnet_type_isolation']").val('0');
		}
		
	},	
	add_type_device: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";		
				var id_edit = $('input[name="id_obj_og_device"]').val();
				
				
				if(($('#device_type').val()) > 0){	
					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('type', $('#device_type').val());
					formData.append('type_device', $('#device_type option:selected').text());			
					formData.append('counts', $('#device_counts').val());
				}else{
						err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
						$('#messenger_modal_device').hide().fadeIn(500).html(err_text);
						if(($('#device_type').val()) == 0){
							$('#device_type').addClass("formError");
						}else{
							$('#device_type').removeClass("formError");
						}					
				}				
				
				
				var dev_type = $('#device_type').val();
				var dev_type_opt = $('#device_type option:selected').text();
				var dev_counts = $('input#device_counts').val();
		
		str_tbody_first = $("#obj_og_device tbody").html() 

      $.ajax({
            url: '/ARM/basis/objects/add_og_device/',
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


									var rowCount = $("#obj_og_device tbody tr").length;	
									var text = 'Установленное газоиспользующее оборудование (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ust_go").html(text);

					
				  }
					
				}	
            }	
        });

				if(($('#device_type').val()) > 0){
					$('#messenger_modal_device').html("");
					$('#device_type').removeClass("formError");
					$('#ModalObj_og_device').fadeOut(300);
					$('#ModalObj_og_device_overlay').fadeOut(300);				
				
				
					$('input[name="id_obj_og_device"]').val('');
					$('#device_type option[value="0"]').prop('selected', true);
					$("select[name='device_type']").val('');
					$("input[name='device_type']").val('');								
					$("input#device_counts").val('');				
				}		
    },



	add_og_obsl: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";		
		var id_edit = $('input[name="id_obj_og_obsl"]').val();
				
			if(($('#obsl_date').val()).length > 0 && ($('#obsl_type').val()) > 0){	
				formData.append('id', id_edit);
				formData.append('objects_id', $('#formObjectId').val());
				formData.append('type_obsl', $('#obsl_type').val());
				formData.append('type_obsl_text', $('#obsl_type option:selected').text());			
				formData.append('date_obsl', $('#obsl_date').val());
			
			
			
			
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_obsl').hide().fadeIn(500).html(err_text);
					if(($('#obsl_date').val()).length == 0){
						$('#obsl_date').addClass("formError");
					}else{
						$('#obsl_date').removeClass("formError");
					}
					if(($('#obsl_type').val()) == 0){
						$('#obsl_type').addClass("formError");
					}else{
						$('#obsl_type').removeClass("formError");
					}					
			}	
				
				var type_obsl = $('#obsl_type').val();
				var type_obsl_text = $('#obsl_type option:selected').text();
				var date_obsl = $('input#obsl_date').val();
			
		str_tbody_first = $("#obj_og_obsl tbody").html(); 

      $.ajax({
            url: '/ARM/basis/objects/add_og_obsl/',
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
					$("tr[id_obj_og_obsl="+id_edit+"] td[obsl_type]").attr('obsl_type',type_obsl);
					$("tr[id_obj_og_obsl="+id_edit+"] td[obsl_type="+type_obsl+"]").html(type_obsl_text);
					$("tr[id_obj_og_obsl="+id_edit+"] td[name='date']").html(date_obsl.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
					
				}else{
			
				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_og_obsl tbody").html(str_tbody);


									var rowCount = $("#obj_og_obsl tbody tr").length;	
									var text = 'Сведения об обследовании объекта (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_sv_oo").html(text);

					
				  }
					
				}		
            }
			
			
        });
			
			
				if(($('#obsl_date').val()).length > 0 && ($('#obsl_type').val()) > 0){
					$('#messenger_modal_obsl').html("");
					$('#obsl_date').removeClass("formError");
					$('#obsl_type').removeClass("formError");
					
					$('#ModalObj_og_obsl').fadeOut(300);
					$('#ModalObj_og_obsl_overlay').fadeOut(300);				
				

					$('input[name="id_obj_og_obsl"]').val('');
					$('#obsl_type option[value="0"]').prop('selected', true);
					$("input[name='obsl_type']").val('');			
					$("input#obsl_date").val('');				
					$("input[name='obsl_date']").val('');
					$("select[name='obsl_type']").val('');				
				
				}
				
	
			
			
				
		
						  

	
    },


	add_og_accidents: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";		
		var id_edit = $('input[name="id_obj_og_accidents"]').val();
				
				
				if(($('#accidents_date').val()).length > 0 && ($('#accidents_type').val()) > 0 && ($('#accidents_character').val()).length > 0){
					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('type_accidents', $('#accidents_type').val());
					formData.append('type_accidents_text', $('#accidents_type option:selected').text());			
					formData.append('date_accidents', $('#accidents_date').val());
					formData.append('character_accidents', $('#accidents_character').val());
				}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_accidents').hide().fadeIn(500).html(err_text);
					if(($('#accidents_date').val()).length == 0){
						$('#accidents_date').addClass("formError");
					}else{
						$('#accidents_date').removeClass("formError");
					}
					if(($('#accidents_type').val()) == 0){
						$('#accidents_type').addClass("formError");
					}else{
						$('#accidents_type').removeClass("formError");
					}
					if(($('#accidents_character').val()).length == 0){
						$('#accidents_character').addClass("formError");
					}else{
						$('#accidents_character').removeClass("formError");
					}					
				}				


				
					var type_accidents = $('#accidents_type').val();
					var type_accidents_text = $('#accidents_type option:selected').text();
					var date_accidents = $('input#accidents_date').val();
					var character_accidents = $('input#accidents_character').val();
			
		str_tbody_first = $("#obj_og_accidents tbody").html() 

      $.ajax({
            url: '/ARM/basis/objects/add_og_accidents/',
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
					$("tr[id_obj_og_accidents="+id_edit+"] td[accidents_type]").attr('accidents_type',type_accidents);
					$("tr[id_obj_og_accidents="+id_edit+"] td[accidents_type="+type_accidents+"]").html(type_accidents_text);
					$("tr[id_obj_og_accidents="+id_edit+"] td[name='date']").html(date_accidents.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
					$("tr[id_obj_og_accidents="+id_edit+"] td[name='character']").html(character_accidents);
					
				}else{
			
				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_og_accidents tbody").html(str_tbody); 
					
									var rowCount = $("#obj_og_accidents tbody tr").length;	
									var text = 'Сведения об авариях и НС (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_sv_ans").html(text);
					
				  }
					
				}							
            }
			
			
        });
			
				if(($('#accidents_date').val()).length > 0 && ($('#accidents_type').val()) > 0 && ($('#accidents_character').val()).length > 0){
					$('#messenger_modal_accidents').html("");
					$('#accidents_date').removeClass("formError");
					$('#accidents_type').removeClass("formError");
					$('#accidents_character').removeClass("formError");
					$('#ModalObj_og_accidents').fadeOut(300);
					$('#ModalObj_og_accidents_overlay').fadeOut(300);				
				
					$("input#accidents_character").val('');	
					$("input[name='id_obj_og_accidents']").val('');				
					$("input[name='accidents_date']").val('');
					$("input[name='accidents_character']").val('');
					$("select[name='accidents_type']").val('');
					$("input[name='accidents_type']").val('');
					$('#accidents_type option[value="0"]').prop('selected', true);
					$("input#accidents_date").val('');
				
				
				}			
			
    },

	
	add_heat_source: function(id_obj, id_subj, power) {
		
	
		if($('#openModalHeatSource').is(':visible')){
			event.preventDefault();
			var formData = new FormData();
			

			var id_edit = id_obj;
			var name_obj_source = $('#name_obj_source').html();


				
			//formData.append('id', $('tr[object_source_ti = '+id_edit+'] td'));
			formData.append('id_reestr_object_ti', id_obj);
			formData.append('objects_id', $('#formObjectId').val());
			formData.append('id_reestr_object_t', $('#formObjectId').val());
			formData.append('id_reestr_subject', id_subj); // id потребителя теплоисточника
			formData.append('id_reestr_subject_own', $('#subject_id').val()); // id потребителя объекта
			formData.append('name_obj_source', $('p[object_source_ti = '+id_edit+'] span').html());
			
		
			str_tbody_first = $("#mkm_object_t_ti tbody").html(); 


		  $.ajax({
				url: '/ARM/basis/objects/add_ot_heat_source/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
//console.log(result);
					  str_tbody =  str_tbody_first + result;

								if((result).length > 0){  
									$("#mkm_object_t_ti tbody").html(str_tbody); 
									
										var rowCount = $("#mkm_object_t_ti tbody tr").length;	
										var text = 'Источники теплоснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
										$("#numrow_ist_teplo").html(text);									
									
								  }
							
				} 	
			});
			$('#openModalHeatSource').fadeOut(300);
			$('#openModalHeatSource_overlay').fadeOut(300);
			$('#search_resultSource').html('');
			$('#search').val('');
		}else{

				/*$('#openModalSubject .result_html p[object_source_ti] span').click(function(){*/
			
				$('#e_subobj_subject_id').val(id_subj);	
				$('#e_subobj_obj_id').val(id_obj);
				$('#razr_subobj_power').html(power);
				
				$('#e_subobj_subject').val($('p[object_source_ti="'+id_obj+'"] span').html());

				$('#openModalSubject').fadeOut(300);
				$('#openModalSubject_overlay').fadeOut(300);
				$('#search_resultSource').html('');
				$('#search').val('');
				$('#openModalSubject #search').attr('sbobj',0); // меняется на 1 в modalWindow.js для разделения поиска для субабонентов и теплоисточников
				return false;		
			/*})*/
		}
    },
	
	add_ot_personal_tp: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_personal_tp"]').val();
		
		/*var id_table = $("table").attr("id");	*/
		
		/*$("table#uzel_teplo>input").attr("id");*/
		
		var device = $('#tp_device').val();
		var nazn_tp_ot = $('input[name="block_nazn_tp_ot"]').val();
		var nazn_tp_gvs = $('input[name="block_nazn_tp_gvs"]').val();
		var nazn_tp_tn = $('input[name="block_nazn_tp_tn"]').val();
		var nazn_tp_vent = $('input[name="block_nazn_tp_vent"]').val();
		id_table = $('#obj_ot_personal_tps input[name="id_table"]').val();
		work_id = id_table.split('-').pop();

		//var name_table = $('input[name="name_table"]').val();
		
				if(($('#tp_device').val()).length > 0 && (($('#block_nazn_tp_ot').val()) == 1 || ($('#block_nazn_tp_gvs').val()) == 1 || ($('#block_nazn_tp_tn').val()) == 1 || ($('#block_nazn_tp_vent').val()) == 1)){
					formData.append('id', id_edit);		
					formData.append('objects_id', $('#formObjectId').val());			
					formData.append('device', $('#tp_device').val());
					formData.append('nazn_tp_ot', $('input[name="block_nazn_tp_ot"]').val());
					formData.append('nazn_tp_gvs', $('input[name="block_nazn_tp_gvs"]').val());
					formData.append('nazn_tp_tn', $('input[name="block_nazn_tp_tn"]').val());
					formData.append('nazn_tp_vent', $('input[name="block_nazn_tp_vent"]').val());
					formData.append('id_table', id_table);
				}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_tp').hide().fadeIn(500).html(err_text);
					if(($('#tp_device').val()).length == 0){
						$('#tp_device').addClass("formError");
					}else{
						$('#tp_device').removeClass("formError");
					}
					if(($('#block_nazn_tp_ot').val()) == 0 && ($('#block_nazn_tp_gvs').val()) == 0 && ($('#block_nazn_tp_tn').val()) == 0 && ($('#block_nazn_tp_vent').val()) == 0){
						//console.log("Hello");
						$('#label_block_nazn_tp_ot').addClass("formError2");
						$('#label_block_nazn_tp_gvs').addClass("formError2");
						$('#label_block_nazn_tp_tn').addClass("formError2");
						$('#label_block_nazn_tp_vent').addClass("formError2");
					}else{
						$('#label_block_nazn_tp_ot').removeClass("formError2");
						$('#label_block_nazn_tp_gvs').removeClass("formError2");
						$('#label_block_nazn_tp_tn').removeClass("formError2");
						$('#label_block_nazn_tp_vent').removeClass("formError2");
					}




					
				}		
		str_tbody_first = $("#"+id_table+" tbody").html() 

      $.ajax({
            url: '/ARM/basis/objects/add_ot_personal_tp/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

				if(id_edit>0){
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[name='device']").html(device);
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[nazn_tp_ot='nazn_tp_ot']").html(nazn_tp_ot == 1 ? 'да' : 'нет');					
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[nazn_tp_gvs='nazn_tp_gvs']").html(nazn_tp_gvs == 1 ? 'да' : 'нет');
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[nazn_tp_tn='nazn_tp_tn']").html(nazn_tp_tn == 1 ? 'да' : 'нет');
					$("tr[id_obj_ot_personal_tp="+id_edit+"] td[nazn_tp_vent='nazn_tp_vent']").html(nazn_tp_vent == 1 ? 'да' : 'нет');						
				}else{

				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#"+id_table+" tbody").html(str_tbody); 
				  }
				  
				  
				  	var rowCount = $("#"+id_table+" tbody tr").length;	
					console.log(rowCount);			
					$("#numrow_pu-"+work_id+" .count_pu").html(rowCount);
				  
			
				  
				  
				}
            } 	
        });
				if(($('#tp_device').val()).length > 0 && (($('#block_nazn_tp_ot').val()) == 1 || ($('#block_nazn_tp_gvs').val()) == 1 || ($('#block_nazn_tp_tn').val()) == 1 || ($('#block_nazn_tp_vent').val()) == 1)){
					$('#messenger_modal_tp').html("");
					$('#tp_device').removeClass("formError");
					$('#label_block_nazn_tp_ot').removeClass("formError2");
					$('#label_block_nazn_tp_gvs').removeClass("formError2");
					$('#label_block_nazn_tp_tn').removeClass("formError2");
					$('#label_block_nazn_tp_vent').removeClass("formError2");					
					$('#ModalObj_ot_personal_tp').fadeOut(300);
					$('#ModalObj_ot_personal_tp_overlay').fadeOut(300);				
				
					$("input[name='tp_device']").val('');
					$("input[name='id_table']").val('');
					$("input[name='id_obj_ot_personal_tp']").prop('value', '');
					/*$("input[name='tp_count_device']").val('');*/				
					/*$("input[name='tp_sar']").val('');				
					$("input[name='tp_count_sar']").val('');*/
					$("input[name='block_nazn_tp_ot']").prop('value', 0);
					$("input[name='block_nazn_tp_ot']").prop('checked', false);
					$("input[name='block_nazn_tp_gvs']").prop('value', 0);
					$("input[name='block_nazn_tp_gvs']").prop('checked', false);
					$("input[name='block_nazn_tp_tn']").prop('value', 0);
					$("input[name='block_nazn_tp_tn']").prop('checked', false);
					$("input[name='block_nazn_tp_vent']").prop('value', 0);
					$("input[name='block_nazn_tp_vent']").prop('checked', false);
					
					$('#ModalObj_ot_personal_tp input[name=id_table]').remove();
				}
	
    },
	
	
	add_ot_personal_sar: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_personal_sar"]').val();
		
		
		var sar = $('#sar_sar').val();
		var nazn_sar_ot = $('input[name="block_nazn_sar_ot"]').val();
		var nazn_sar_gvs = $('input[name="block_nazn_sar_gvs"]').val();
		var nazn_sar_tn = $('input[name="block_nazn_sar_tn"]').val();
		var nazn_sar_vent = $('input[name="block_nazn_sar_vent"]').val();			
		id_table = $('#obj_ot_personal_sars input[name="id_table"]').val();	
		work_id = id_table.split('-').pop();
			
			if(($('#sar_sar').val()).length > 0 && (($('#block_nazn_sar_ot').val()) == 1 || ($('#block_nazn_sar_gvs').val()) == 1 || ($('#block_nazn_sar_tn').val()) == 1 || ($('#block_nazn_sar_vent').val()) == 1)){
				formData.append('id', id_edit);		
				formData.append('objects_id', $('#formObjectId').val());			
				formData.append('sar', $('#sar_sar').val());				
				formData.append('nazn_sar_ot', $('input[name="block_nazn_sar_ot"]').val());
				formData.append('nazn_sar_gvs', $('input[name="block_nazn_sar_gvs"]').val());
				formData.append('nazn_sar_tn', $('input[name="block_nazn_sar_tn"]').val());
				formData.append('nazn_sar_vent', $('input[name="block_nazn_sar_vent"]').val());
				formData.append('id_table', id_table);
			}else{
				err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
				$('#messenger_modal_sar').hide().fadeIn(500).html(err_text);
					if(($('#sar_sar').val()).length == 0){
						$('#sar_sar').addClass("formError");
					}else{
						$('#sar_sar').removeClass("formError")
					}			
					if(($('#block_nazn_sar_ot').val()) == 0 && ($('#block_nazn_sar_gvs').val()) == 0 && ($('#block_nazn_sar_tn').val()) == 0 && ($('#block_nazn_sar_vent').val()) == 0){
						$('#label_block_nazn_sar_ot').addClass("formError2");
						$('#label_block_nazn_sar_gvs').addClass("formError2");
						$('#label_block_nazn_sar_tn').addClass("formError2");
						$('#label_block_nazn_sar_vent').addClass("formError2");
					}else{
						$('#label_block_nazn_sar_ot').removeClass("formError2");
						$('#label_block_nazn_sar_gvs').removeClass("formError2");
						$('#label_block_nazn_sar_tn').removeClass("formError2");
						$('#label_block_nazn_sar_vent').removeClass("formError2");
					}					
			}		
		
		str_tbody_first = $("#"+id_table+" tbody").html() 

      $.ajax({
            url: '/ARM/basis/objects/add_ot_personal_sar/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

				if(id_edit>0){
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[name='sar']").html(sar);
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar_ot='nazn_sar_ot']").html(nazn_sar_ot == 1 ? 'да' : 'нет');					
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar_gvs='nazn_sar_gvs']").html(nazn_sar_gvs == 1 ? 'да' : 'нет');
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar_tn='nazn_sar_tn']").html(nazn_sar_tn == 1 ? 'да' : 'нет');
					$("tr[id_obj_ot_personal_sar="+id_edit+"] td[nazn_sar_vent='nazn_sar_vent']").html(nazn_sar_vent == 1 ? 'да' : 'нет');
					
					
				}else{

				  str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#"+id_table+" tbody").html(str_tbody); 
					
					var rowCount = $("#"+id_table+" tbody tr").length;								
					$("#numrow_sar-"+work_id+" .count_sar").html(rowCount);
				  
				  }
				  
				
				}
			} 	
        });
					if(($('#sar_sar').val()).length > 0  && (($('#block_nazn_sar_ot').val()) == 1 || ($('#block_nazn_sar_gvs').val()) == 1 || ($('#block_nazn_sar_tn').val()) == 1 || ($('#block_nazn_sar_vent').val()) == 1)){
					$('#messenger_modal_sar').html("");
					$('#sar_sar').removeClass("formError");
					$('#label_block_nazn_sar_ot').removeClass("formError2");
					$('#label_block_nazn_sar_gvs').removeClass("formError2");
					$('#label_block_nazn_sar_tn').removeClass("formError2");
					$('#label_block_nazn_sar_vent').removeClass("formError2");					
					$('#ModalObj_ot_personal_sar').fadeOut(300);
					$('#ModalObj_ot_personal_sar_overlay').fadeOut(300);					
								
					$("input[name='sar_sar']").val('');
					$("input[name='id_table']").val('');
					$("input[name='id_obj_ot_personal_sar']").prop('value', '');
					$("input[name='block_nazn_sar_ot']").prop('value', 0);
					$("input[name='block_nazn_sar_ot']").prop('checked', false);
					$("input[name='block_nazn_sar_gvs']").prop('value', 0);
					$("input[name='block_nazn_sar_gvs']").prop('checked', false);
					$("input[name='block_nazn_sar_tn']").prop('value', 0);
					$("input[name='block_nazn_sar_tn']").prop('checked', false);
					$("input[name='block_nazn_sar_vent']").prop('value', 0);
					$("input[name='block_nazn_sar_vent']").prop('checked', false);

					$('#ModalObj_ot_personal_sar input[name=id_table]').remove();
					}
			
    },	
	
	
	add_ot_heatnet: function() {
		event.preventDefault();
        var formData = new FormData();
		
		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_heatnet"]').val();
		var conect_point = $('#heatnet_conect_point').val();
		var end_point = $('#heatnet_end_point').val();
		var length = $('#heatnet_length').val();
		var count_tube = $('#heatnet_count_tube').val();
		var year = $('#heatnet_year').val();
		var prim = $('#heatnet_prim').val();
		var diameter = $('#heatnet_diameter').val();
		var diameter_name = $('#heatnet_diameter option:selected').text();
		var underground = $('#heatnet_underground').val();
		var underground_name = $('#heatnet_underground option:selected').text();		
		var type_isolation = $('#type_isolation').val();
		var isolation_name = $('#type_isolation option:selected').text();	
		var heatnet_type_isolation = $('#heatnet_type_isolation').val();
		var heatnet_type_isolation_name = $('#heatnet_type_isolation option:selected').text();		

			if(($('#heatnet_conect_point').val()).length > 0){
		
						formData.append('id', id_edit);	
						formData.append('objects_id', $('#formObjectId').val());		
						formData.append('conect_point', $('#heatnet_conect_point').val());
						formData.append('end_point', $('#heatnet_end_point').val());
						formData.append('length', $('#heatnet_length').val());				
						formData.append('count_tube', $('#heatnet_count_tube').val());
						formData.append('year', $('#heatnet_year').val());
						formData.append('prim', $('#heatnet_prim').val());

						formData.append('diameter', $('#heatnet_diameter').val());
						formData.append('diameter_name', $('#heatnet_diameter option:selected').text());

						formData.append('underground', $('#heatnet_underground').val());
						formData.append('underground_name', $('#heatnet_underground option:selected').text());
						
						formData.append('isolation_name', $('#type_isolation option:selected').text());
						formData.append('type_isolation', $('#type_isolation').val());		
						
						formData.append('heatnet_type_isolation_name', $('#heatnet_type_isolation option:selected').text());
						formData.append('heatnet_type_isolation', $('#heatnet_type_isolation').val());
		
						str_tbody_first = $("#obj_ot_heatnet tbody").html() 

					  $.ajax({
							url: '/ARM/basis/objects/add_ot_heatnet/',
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
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='conect_point']").html(conect_point);	
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='end_point']").html(end_point);	
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='year']").html(year);
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='length']").html(length);												
								
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_diameter]").attr('heatnet_diameter',diameter);
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_diameter="+diameter+"]").html(diameter_name);				
								
								
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='count_tube']").html(count_tube);			  

								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_underground]").attr('heatnet_underground',underground);
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_underground="+underground+"]").html(underground_name);
								
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_isolation]").attr('type_isolation',type_isolation);
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[type_isolation="+type_isolation+"]").html(isolation_name);
					
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_type_isolation]").attr('heatnet_type_isolation',heatnet_type_isolation);
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[heatnet_type_isolation="+heatnet_type_isolation+"]").html(heatnet_type_isolation == 0 ? '' : heatnet_type_isolation_name);	

								
								$("tr[id_obj_ot_heatnet="+id_edit+"] td[name='prim']").html(prim);
							 
							 }else{
								  str_tbody =  str_tbody_first + result;

								  if((result).length > 0){  
									$("#obj_ot_heatnet tbody").html(str_tbody); 
									
									
									var rowCount = $("#obj_ot_heatnet tbody tr").length;	
									var text = 'Тепловые сети на балансе теплоисточника (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_heatnet").html(text);
									
								  }
							  }			
								

							}
						});
			}else{
								err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
								$('#messenger_modal_heatnet').hide().fadeIn(500).html(err_text);
								if(($('#heatnet_conect_point').val()).length == 0){
									$('#heatnet_conect_point').addClass("formError");
								}else{
									$('#heatnet_conect_point').removeClass("formError");
								}
			}
    
			if(($('#heatnet_conect_point').val()).length > 0){
								$('#messenger_modal_heatnet').html("");
								$('#heatnet_conect_point').removeClass("formError");
								
								$('div[id="ts_type_tube"]').css({'display': 'none'});
								
								$("input[name='id_obj_ot_heatnet']").val('');
								$("input[name='heatnet_conect_point']").val('');
								$("input[name='heatnet_end_point']").val('');
								$("input[name='heatnet_year']").val('');
								$("input[name='heatnet_prim']").val('');
								$("input[name='heatnet_length']").val('');				
								$("input[name='heatnet_diameter']").val('');				
								$("input[name='heatnet_count_tube']").val('');				
								$("select[name='heatnet_underground']").val('0');				
								$("select[name='type_isolation']").val('0');
								$("select[name='heatnet_type_isolation']").val('0');
								$("select[name='heatnet_diameter']").val('0');
							
								$('#ModalObj_ot_heatnet').fadeOut(300);
								$('#ModalObj_ot_heatnet_overlay').fadeOut(300);			
			
			}
	
	
	},
	
	
	
	
	add_ot_heatnet_t: function() {
		event.preventDefault();
        var formData = new FormData();
		
		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_heatnet_t"]').val();
		var conect_point = $('#t_conect_point').val();
		var end_point = $('#t_end_point').val();
		var length = $('#t_length').val();
		var count_tube = $('#t_count_tube').val();
		var year = $('#t_year').val();
		var prim = $('#t_prim').val();
		var diameter = $('#t_heatnet_diameter').val();
		var diameter_name = $('#t_heatnet_diameter option:selected').text();
		var underground = $('#t_heatnet_underground').val();
		var underground_name = $('#t_heatnet_underground option:selected').text();		
		var type_isolation = $('#teplo_type_isolation').val();
		var isolation_name = $('#teplo_type_isolation option:selected').text();	
		var heatnet_type_isolation = $('#t_heatnet_type_isolation').val();
		var heatnet_type_isolation_name = $('#t_heatnet_type_isolation option:selected').text();		

			if(($('#t_conect_point').val()).length > 0){
		
						formData.append('id', id_edit);	
						formData.append('objects_id', $('#formObjectId').val());		
						formData.append('conect_point', $('#t_conect_point').val());
						formData.append('end_point', $('#t_end_point').val());
						formData.append('length', $('#t_length').val());				
						formData.append('count_tube', $('#t_count_tube').val());
						formData.append('year', $('#t_year').val());
						formData.append('prim', $('#t_prim').val());

						formData.append('diameter', $('#t_heatnet_diameter').val());
						formData.append('diameter_name', $('#t_heatnet_diameter option:selected').text());

						formData.append('underground', $('#t_heatnet_underground').val());
						formData.append('underground_name', $('#t_heatnet_underground option:selected').text());
						
						formData.append('isolation_name', $('#teplo_type_isolation option:selected').text());
						formData.append('type_isolation', $('#teplo_type_isolation').val());		
						
						formData.append('heatnet_type_isolation_name', $('#t_heatnet_type_isolation option:selected').text());
						formData.append('heatnet_type_isolation', $('#t_heatnet_type_isolation').val());
		
						str_tbody_first = $("#obj_ot_heatnet_t tbody").html() 

					  $.ajax({
							url: '/ARM/basis/objects/add_ot_heatnet_t/',
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
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='conect_point']").html(conect_point);	
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='end_point']").html(end_point);	
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='year']").html(year);
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='length']").html(length);												
								
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_diameter]").attr('t_heatnet_diameter',diameter);
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_diameter="+diameter+"]").html(diameter_name);				
								
								
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='count_tube']").html(count_tube);			  

								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_underground]").attr('t_heatnet_underground',underground);
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_underground="+underground+"]").html(underground_name);
								
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[teplo_type_isolation]").attr('teplo_type_isolation',type_isolation);
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[teplo_type_isolation="+type_isolation+"]").html(isolation_name);
					
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_type_isolation]").attr('t_heatnet_type_isolation',heatnet_type_isolation);
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[t_heatnet_type_isolation="+heatnet_type_isolation+"]").html(heatnet_type_isolation == 0 ? '' : heatnet_type_isolation_name);	

								
								$("tr[id_obj_ot_heatnet_t="+id_edit+"] td[name='prim']").html(prim);
							 
							 }else{
								  str_tbody =  str_tbody_first + result;

								  if((result).length > 0){  
									$("#obj_ot_heatnet_t tbody").html(str_tbody); 
									
									
									var rowCount = $("#obj_ot_heatnet_t tbody tr").length;	
									var text = 'Тепловые сети на балансе теплообъекта (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_heatnet_ts").html(text);
									
								  }
							  }			
								

							}
						});
			}else{
								err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
								$('#messenger_modal_heatnet_t').hide().fadeIn(500).html(err_text);
								if(($('#t_conect_point').val()).length == 0){
									$('#t_conect_point').addClass("formError");
								}else{
									$('#t_conect_point').removeClass("formError");
								}
			}
    
			if(($('#t_conect_point').val()).length > 0){
								$('#messenger_modal_heatnet_t').html("");
								$('#t_conect_point').removeClass("formError");
								
								$('div[id="tst_type_tube"]').css({'display': 'none'});
								
								$("input[name='id_obj_ot_heatnet_t']").val('');
								$("input[name='t_conect_point']").val('');
								$("input[name='t_end_point']").val('');
								$("input[name='t_year']").val('');
								$("input[name='t_prim']").val('');
								$("input[name='t_length']").val('');				
								$("input[name='t_heatnet_diameter']").val('');				
								$("input[name='t_count_tube']").val('');				
								$("select[name='t_heatnet_underground']").val('0');				
								$("select[name='teplo_type_isolation']").val('0');
								$("select[name='t_heatnet_type_isolation']").val('0');
								$("select[name='t_heatnet_diameter']").val('0');
							
								$('#ModalObj_ot_heatnet_t').fadeOut(300);
								$('#ModalObj_ot_heatnet_t_overlay').fadeOut(300);			
			
			}
	
	
	},
	
	add_obj_oe_avr: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_avr"]').val();
		var place = $('#avr_place').val();
		var power = $('#avr_power').val();
		var time = $('#avr_time').val();
		var date = $('#avr_date').val();		
		
		
		if(($('#avr_place').val()).length > 0 && ($('#avr_power').val()).length > 0){
				formData.append('id', id_edit);
				formData.append('objects_id', $('#formObjectId').val());
				formData.append('place', $('#avr_place').val());
				formData.append('power', $('#avr_power').val());
				formData.append('time', $('#avr_time').val());
				formData.append('date', $('#avr_date').val());
				

		
					str_tbody_first = $("#obj_oe_avr tbody").html();

				  $.ajax({
						url: '/ARM/basis/objects/add_obj_oe_avr/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
	
						if(id_edit>0){
											
								$("tr[id_obj_oe_avr="+id_edit+"] td[name='place']").html(place);				
								$("tr[id_obj_oe_avr="+id_edit+"] td[name='power']").html(power);				
								$("tr[id_obj_oe_avr="+id_edit+"] td[name='time']").html(time);				
								$("tr[id_obj_oe_avr="+id_edit+"] td[name='date']").html(date.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));	

							}else{
							str_tbody =  str_tbody_first + result;
								
								  if((result).length > 0){ 
								
									$("#obj_oe_avr tbody").html(str_tbody); 
									
									var rowCount = $("#obj_oe_avr tbody tr").length;	
									var text = 'АВР (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_avr").html(text);						
								  }
								

						
							}
						}
					});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_avr').hide().fadeIn(500).html(err_text);
					if(($('#avr_place').val()).length == 0){
						$('#avr_place').addClass("formError");
					}else{
						$('#avr_place').removeClass("formError");
					}
					if(($('#avr_power').val()).length == 0){
						$('#avr_power').addClass("formError");
					}else{
						$('#avr_power').removeClass("formError");
					}
					
		}

			if(($('#avr_place').val()).length > 0 && ($('#avr_power').val()).length > 0){
							$("input[name='id_obj_oe_avr']").val('');
							$("input[name='avr_place']").val('');
							$("input[name='avr_power']").val('');
							$("input[name='avr_time']").val('');
							$("input[name='avr_date']").val('');				
							
							$('#messenger_modal_avr').html("");
							$('#avr_place').removeClass("formError");
							$('#avr_power').removeClass("formError");

									
							$('#ModalObj_oe_avr').fadeOut(300);
							$('#ModalObj_oe_avr_overlay').fadeOut(300);			
			
			}

		
	
    },
	
	add_obj_oe_aie: function() {
		event.preventDefault();
        var formData = new FormData();
		
		
		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_aie"]').val();
		var name = $('#aie_name').val();
		var type = $('#aie_type').val();
		var power = $('#aie_power').val();
		var mosch = $('#aie_mosch').val();
		var factory = $('#aie_factory').val();
		var year_begin = $('#aie_year_begin').val();
		var date_last = $('#aie_date_last').val();
		var place = $('#aie_place').val();
		var pitanie = $('#aie_pitanie').val();
		var srok = $('#aie_srok').val();
		var next_srok = $('#aie_next_srok').val();		
		
		
		if(($('#aie_name').val()).length > 0 && ($('#aie_type').val()).length > 0 && ($('#aie_place').val()).length > 0 && ($('#aie_power').val()).length > 0 && ($('#aie_pitanie').val()).length > 0 && ($('#aie_mosch').val()).length > 0){
		
		
				formData.append('id', id_edit);
				formData.append('objects_id', $('#formObjectId').val());
				formData.append('name', $('input[name="aie_name"]').val());
				formData.append('type', $('input[name="aie_type"]').val());
				formData.append('power', $('input[name="aie_power"]').val());
				formData.append('mosch', $('input[name="aie_mosch"]').val());
				formData.append('factory', $('input[name="aie_factory"]').val());
				formData.append('year_begin', $('input[name="aie_year_begin"]').val());
				formData.append('date_last', $('input[name="aie_date_last"]').val());
				formData.append('place', $('input[name="aie_place"]').val());
				formData.append('pitanie', $('input[name="aie_pitanie"]').val());
				formData.append('srok', $('input[name="aie_srok"]').val());
				formData.append('next_srok', $('input[name="aie_next_srok"]').val());
				
				str_tbody_first = $("#obj_oe_aie tbody").html();
				
				$.ajax({
					url: '/ARM/basis/objects/add_obj_oe_aie/',
					type: "POST",
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
					
					
					if(id_edit>0){
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='place']").html(place);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='type']").html(type);				
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='power']").html(power);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='mosch']").html(mosch);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='pitanie']").html(pitanie);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='date_last']").html(date_last.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='factory']").html(factory);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='year_begin']").html(year_begin);								
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_oe_aie="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
					}else{
						str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#obj_oe_aie tbody").html(str_tbody);

								var rowCount = $("#obj_oe_aie tbody tr").length;	
								var text = 'Автономные источники электроснабжения (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_aie").html(text);						
							  }
						
					}
					}
				});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_aie').hide().fadeIn(500).html(err_text);
					if(($('#aie_name').val()).length == 0){
						$('#aie_name').addClass("formError");
					}else{
						$('#aie_name').removeClass("formError");
					}
					if(($('#aie_type').val()).length == 0){
						$('#aie_type').addClass("formError");
					}else{
						$('#aie_type').removeClass("formError");
					}	
					if(($('#aie_power').val()).length == 0){
						$('#aie_power').addClass("formError");
					}else{
						$('#aie_power').removeClass("formError");
					}
					if(($('#aie_mosch').val()).length == 0){
						$('#aie_mosch').addClass("formError");
					}else{
						$('#aie_mosch').removeClass("formError");
					}					
					if(($('#aie_place').val()).length == 0){
						$('#aie_place').addClass("formError");
					}else{
						$('#aie_place').removeClass("formError");
					}
					if(($('#aie_pitanie').val()).length == 0){
						$('#aie_pitanie').addClass("formError");
					}else{
						$('#aie_pitanie').removeClass("formError");
					}					
		}

			if(($('#aie_name').val()).length > 0 && ($('#aie_type').val()).length > 0 && ($('#aie_place').val()).length > 0 && ($('#aie_power').val()).length > 0 && ($('#aie_pitanie').val()).length > 0 && ($('#aie_mosch').val()).length > 0){	
						$("input[name='id_obj_oe_aie']").val('');
						$("input[name='aie_name']").val('');
						$("input[name='aie_type']").val('');
						$("input[name='aie_power']").val('');
						$("input[name='aie_mosch']").val('');
						$("input[name='aie_factory']").val('');	
						$("input[name='aie_year_begin']").val('');
						$("input[name='aie_date_last']").val('');
						$("input[name='aie_place']").val('');
						$("input[name='aie_pitanie']").val('');
						$("input[name='aie_srok']").val('');
						$("input[name='aie_next_srok']").val('');
						
						$('#messenger_modal_aie').html("");
						$('#aie_name').removeClass("formError");
						$('#aie_type').removeClass("formError");
						$('#aie_power').removeClass("formError");
						$('#aie_mosch').removeClass("formError");
						$('#aie_place').removeClass("formError");
						$('#aie_pitanie').removeClass("formError");						
						
						$('#ModalObj_oe_aie').fadeOut(300);
						$('#ModalObj_oe_aie_overlay').fadeOut(300);			
			
			
			}		
	
    },
	
	add_obj_oe_trp: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_trp"]').val();
		var name = $('#trp_name').val();
		var id_type = $('#trp_id_type').val();
		var power = $('#trp_power').val();
		var volt = $('#trp_volt').val();
		var year_begin = $('#trp_year_begin').val();
		var category = $('#trp_cat').val();
		var category_name = $('#trp_cat option:selected').text();	
		var srok = $('#trp_srok').val();
		var next_srok = $('#trp_next_srok').val();		
		
		
		
		
		
		if(($('#trp_name').val()).length > 0 && ($('#trp_id_type').val()).length > 0 && ($('#trp_power').val()).length > 0 && ($('#trp_volt').val()).length > 0 && ($('#trp_cat').val()) > 0){		
			formData.append('id', id_edit);
			formData.append('objects_id', $('#formObjectId').val());
			formData.append('name', $('input[name="trp_name"]').val());
			formData.append('id_type', $('input[name="trp_id_type"]').val());
			formData.append('power', $('input[name="trp_power"]').val());
			formData.append('volt', $('input[name="trp_volt"]').val());
			formData.append('year_begin', $('input[name="trp_year_begin"]').val());
			
			formData.append('category', $('select[name="trp_cat"]').val());
			formData.append('category_name', $('#trp_cat option:selected').text());		
			formData.append('srok', $('input[name="trp_srok"]').val());
			formData.append('next_srok', $('input[name="trp_next_srok"]').val());		
		
		
		
		str_tbody_first = $("#obj_oe_trp tbody").html();


      $.ajax({
            url: '/ARM/basis/objects/add_obj_oe_trp/',
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
					
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='id_type']").html(id_type);				
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='power']").html(power);				
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='volt']").html(volt);
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='year_begin']").html(year_begin);	
							$("tr[id_obj_oe_trp="+id_edit+"] td[trp_cat]").attr('trp_cat',category);
							$("tr[id_obj_oe_trp="+id_edit+"] td[trp_cat="+category+"]").html(category_name);
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_oe_trp="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));					
						
					}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#obj_oe_trp tbody").html(str_tbody); 
							
								var rowCount = $("#obj_oe_trp tbody tr").length;	
								var text = 'Трансформаторные и распределительные подстанции (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
								$("#numrow_trps").html(text);
							
						  }
					}  	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_trp').hide().fadeIn(500).html(err_text);
					if(($('#trp_name').val()).length == 0){
						$('#trp_name').addClass("formError");
					}else{
						$('#trp_name').removeClass("formError");
					}
					if(($('#trp_id_type').val()).length == 0){
						$('#trp_id_type').addClass("formError");
					}else{
						$('#trp_id_type').removeClass("formError");
					}
					if(($('#trp_power').val()).length == 0){
						$('#trp_power').addClass("formError");
					}else{
						$('#trp_power').removeClass("formError");
					}					
					if(($('#trp_volt').val()).length == 0){
						$('#trp_volt').addClass("formError");
					}else{
						$('#trp_volt').removeClass("formError");
					}
					if(($('#trp_cat').val()) == 0){
						$('#trp_cat').addClass("formError");
					}else{
						$('#trp_cat').removeClass("formError");
					}										
		}
		
		if(($('#trp_name').val()).length > 0 && ($('#trp_id_type').val()).length > 0 && ($('#trp_power').val()).length > 0 && ($('#trp_volt').val()).length > 0 && ($('#trp_cat').val()) > 0){
				$("input[name='id_obj_oe_trp']").val('');
				$("input[name='trp_name']").val('');
				$("input[name='trp_id_type']").val('');
				$("input[name='trp_power']").val('');
				$("input[name='trp_volt']").val('');
				$("input[name='trp_year_begin']").val('');
				$("select[name='trp_cat']").val('0');
				$("input[name='trp_srok']").val('');
				$("input[name='trp_next_srok']").val('');
			  	
					$('#messenger_modal_trp').html("");
					$('#trp_name').removeClass("formError");
					$('#trp_id_type').removeClass("formError");
					$('#trp_power').removeClass("formError");
					$('#trp_volt').removeClass("formError");
					$('#trp_cat').removeClass("formError");

				
				$('#ModalObj_oe_trp').fadeOut(300);
				$('#ModalObj_oe_trp_overlay').fadeOut(300);
		
		}
		
		
    },
	
	add_obj_oe_klvl: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_klvl"]').val();
		var name = $('#klvl_name').val();
		var type = $('#klvl_type').val();
		var type_name = $('#klvl_type option:selected').text();
		var volt = $('#klvl_volt').val();
		var volt_name = $('#klvl_volt option:selected').text();
		var mark = $('#klvl_mark').val();
		var length = $('#klvl_length').val();
		var name_center = $('#klvl_name_center').val();
		var year = $('#klvl_year').val();
		var category = $('#klvl_cat').val();
		var category_name = $('#klvl_cat option:selected').text();
		var srok = $('#klvl_srok').val();
		var next_srok = $('#klvl_next_srok').val();
		
		
		
			if(($('#klvl_name').val()).length > 0 && ($('#klvl_type').val()) > 0 && ($('#klvl_volt').val()) > 0 && ($('#klvl_mark').val()).length > 0 && ($('#klvl_length').val()).length > 0 && ($('#klvl_name_center').val()).length> 0 && ($('#klvl_cat').val()) > 0){		
				formData.append('id', id_edit);
				formData.append('objects_id', $('#formObjectId').val());
				formData.append('name', $('input[name="klvl_name"]').val());
				formData.append('type', $('select[name="klvl_type"]').val());
				formData.append('type_name', $('#klvl_type option:selected').text());
				formData.append('volt', $('select[name="klvl_volt"]').val());
				formData.append('volt_name', $('#klvl_volt option:selected').text());
				formData.append('mark', $('input[name="klvl_mark"]').val());
				formData.append('length', $('input[name="klvl_length"]').val());
				formData.append('name_center', $('input[name="klvl_name_center"]').val());
				formData.append('year', $('input[name="klvl_year"]').val());
				formData.append('category', $('select[name="klvl_cat"]').val());
				formData.append('category_name', $('#klvl_cat option:selected').text());		
				formData.append('srok', $('input[name="klvl_srok"]').val());
				formData.append('next_srok', $('input[name="klvl_next_srok"]').val());
            
					str_tbody_first = $("#obj_oe_klvl tbody").html();

			$.ajax({
            url: '/ARM/basis/objects/add_obj_oe_klvl/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
console.log(result);
			if(id_edit>0){
				
				
					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_type]").attr('klvl_type',type);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_type="+type+"]").html(type_name);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_volt]").attr('klvl_volt',volt);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_volt="+volt+"]").html(volt_name);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='name']").html(name);								
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='mark']").html(mark);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='length']").html(length);	
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='name_center']").html(name_center);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='year']").html(year);	

					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_cat]").attr('klvl_cat',category);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[klvl_cat="+category+"]").html(category_name);					
					
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='srok']").html(srok);
					$("tr[id_obj_oe_klvl="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
					
			}else{

				 str_tbody =  str_tbody_first + result;

				  if((result).length > 0){  
					$("#obj_oe_klvl tbody").html(str_tbody); 
					
						var rowCount = $("#obj_oe_klvl tbody tr").length;	
						var text = 'Кабельные и воздушные линии (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
						$("#numrow_klvl").html(text);
					
				  }
			} 		
	
            }
        });
			
			
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_klvl').hide().fadeIn(500).html(err_text);
					if(($('#klvl_name').val()).length == 0){
						$('#klvl_name').addClass("formError");
					}else{
						$('#klvl_name').removeClass("formError");
					}
					if(($('#klvl_type').val()) == 0){
						$('#klvl_type').addClass("formError");
					}else{
						$('#klvl_type').removeClass("formError");
					}
					if(($('#klvl_volt').val()) == 0){
						$('#klvl_volt').addClass("formError");
					}else{
						$('#klvl_volt').removeClass("formError");
					}					
					if(($('#klvl_mark').val()).length == 0){
						$('#klvl_mark').addClass("formError");
					}else{
						$('#klvl_mark').removeClass("formError");
					}
					if(($('#klvl_length').val()).length == 0){
						$('#klvl_length').addClass("formError");
					}else{
						$('#klvl_length').removeClass("formError");
					}					
					if(($('#klvl_name_center').val()).length == 0){
						$('#klvl_name_center').addClass("formError");
					}else{
						$('#klvl_name_center').removeClass("formError");
					}
					if(($('#klvl_cat').val()) == 0){
						$('#klvl_cat').addClass("formError");
					}else{
						$('#klvl_cat').removeClass("formError");
					}		
			}
				
				
				if(($('#klvl_name').val()).length > 0 && ($('#klvl_type').val()) > 0 && ($('#klvl_volt').val()) > 0 && ($('#klvl_mark').val()).length > 0 && ($('#klvl_length').val()).length > 0 && ($('#klvl_name_center').val()).length> 0 && ($('#klvl_cat').val()) > 0){
					$("input[name='id_obj_oe_klvl']").val('');
					$("select[name='klvl_type']").val('0');
					$("select[name='klvl_volt']").val('0');
					$("input[name='klvl_name']").val('');
					$("input[name='klvl_mark']").val('');
					$("input[name='klvl_length']").val('');
					$("input[name='klvl_name_center']").val('');
					$("input[name='klvl_year']").val('');
					$("select[name='klvl_cat']").val('0');
					$("input[name='klvl_srok']").val('');
					$("input[name='klvl_next_srok']").val('');
					
					$('#messenger_modal_klvl').html("");
					$('#klvl_type').removeClass("formError");
					$('#klvl_volt').removeClass("formError");
					$('#klvl_name').removeClass("formError");
					$('#klvl_mark').removeClass("formError");
					$('#klvl_length').removeClass("formError");
					$('#klvl_name_center').removeClass("formError");
					$('#klvl_cat').removeClass("formError");


					
					$('#ModalObj_oe_klvl').fadeOut(300);
					$('#ModalObj_oe_klvl_overlay').fadeOut(300);
				}	
    },
	
	add_obj_oe_block: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_block"]').val();
		var name = $('#block_name').val();
		var type = $('#energy_type').val();
		var type_name = $('#energy_type option:selected').text();
		var power = $('#block_power').val();
		var add_load = $('#block_add_load').val();
		
		
		
		if(($('#block_name').val()).length > 0 && ($('#energy_type').val()) > 0 && ($('#block_power').val()).length > 0){

					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('name', $('input[name="block_name"]').val());
					formData.append('type', $('select[name="energy_type"]').val());
					formData.append('type_name', $('select[name="energy_type"] option:selected').text());
					formData.append('power', $('input[name="block_power"]').val());
					formData.append('add_load', $('input[name="block_add_load"]').val());
					
					str_tbody_first = $("#obj_oe_block tbody").html();

				  $.ajax({
						url: '/ARM/basis/objects/add_obj_oe_block/',
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
							
								$("tr[id_obj_oe_block="+id_edit+"] td[name='name']").html(name);				
								$("tr[id_obj_oe_block="+id_edit+"] td[energy_type]").attr('energy_type',type);
								$("tr[id_obj_oe_block="+id_edit+"] td[energy_type="+type+"]").html(type_name);
								$("tr[id_obj_oe_block="+id_edit+"] td[name='power']").html(power);
								$("tr[id_obj_oe_block="+id_edit+"] td[add_load='add_load']").html($('#block_add_load').val() == 1 ? 'да' : 'нет');	
								
							
						}else{

							 str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#obj_oe_block tbody").html(str_tbody); 
									
									var rowCount = $("#obj_oe_block tbody tr").length;	
									var text = 'Блок-станции/собственной генерации (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_block").html(text);
							  }
						}  		
						}
					});
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_block').hide().fadeIn(500).html(err_text);
					if(($('#block_name').val()).length == 0){
						$('#block_name').addClass("formError");
					}else{
						$('#block_name').removeClass("formError");
					}
					if(($('#block_power').val()).length == 0){
						$('#block_power').addClass("formError");
					}else{
						$('#block_power').removeClass("formError");
					}
					if(($('#energy_type').val()) == 0){
						$('#energy_type').addClass("formError");
					}else{
						$('#energy_type').removeClass("formError");
					}					
			}		
			
			if(($('#block_name').val()).length > 0 && ($('#energy_type').val()) > 0 && ($('#block_power').val()).length > 0){	
							$("input[name='id_obj_oe_block']").val('');
							$("input[name='block_name']").val('');
							$("select[name='energy_type']").val('0');
							$("input[name='block_power']").val('');
							$("input[name='block_add_load']").prop('value', 0);
							$("input[name='block_add_load']").prop('checked', false);

							$('#messenger_modal_block').html("");
							$('#block_name').removeClass("formError");
							$('#energy_type').removeClass("formError");
							$('#block_power').removeClass("formError");
							
							$('#ModalObj_oe_block').fadeOut(300);				
							$('#ModalObj_oe_block_overlay').fadeOut(300);			
			}		
					
	
    },
	add_obj_oe_vvd: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_vvd"]').val();
		var name = $('#vvd_name').val();
		var count = $('#vvd_count').val();
		var power = $('#vvd_power').val();
		var voltage = $('#vvd_voltage').val();
		var year_begin = $('#vvd_year_begin').val();
		var srok = $('#vvd_srok').val();
		var next_srok = $('#vvd_next_srok').val();
		
		
		
		if(($('#vvd_name').val()).length > 0 && ($('#vvd_count').val()).length > 0 && ($('#vvd_power').val()).length > 0 && ($('#vvd_voltage').val()).length > 0){


					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('name', $('input[name="vvd_name"]').val());
					formData.append('count', $('input[name="vvd_count"]').val());
					formData.append('power', $('input[name="vvd_power"]').val());
					formData.append('voltage', $('input[name="vvd_voltage"]').val());
					formData.append('year_begin', $('input[name="vvd_year_begin"]').val());		
					formData.append('srok', $('input[name="vvd_srok"]').val());
					formData.append('next_srok', $('input[name="vvd_next_srok"]').val());

					str_tbody_first = $("#obj_oe_vvd tbody").html();

				  $.ajax({
						url: '/ARM/basis/objects/add_obj_oe_vvd/',
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
							
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='name']").html(name);				
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='count']").html(count);
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='power']").html(power);
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='voltage']").html(voltage);
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='year_begin']").html(year_begin);
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='srok']").html(srok);
								$("tr[id_obj_oe_vvd="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
								
						}else{

							 str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#obj_oe_vvd tbody").html(str_tbody);

									var rowCount = $("#obj_oe_vvd tbody tr").length;	
									var text = 'Высоковольтные двигатели, в т.ч. синхронные (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_vvd").html(text);					
							  }
						} 		
			
						}
					});
					
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_vvd').hide().fadeIn(500).html(err_text);
					if(($('#vvd_name').val()).length == 0){
						$('#vvd_name').addClass("formError");
					}else{
						$('#vvd_name').removeClass("formError");
					}
					if(($('#vvd_count').val()).length == 0){
						$('#vvd_count').addClass("formError");
					}else{
						$('#vvd_count').removeClass("formError");
					}
					if(($('#vvd_power').val()).length == 0){
						$('#vvd_power').addClass("formError");
					}else{
						$('#vvd_power').removeClass("formError");
					}	
					if(($('#vvd_voltage').val()).length == 0){
						$('#vvd_voltage').addClass("formError");
					}else{
						$('#vvd_voltage').removeClass("formError");
					}					
			}		
					
			if(($('#vvd_name').val()).length > 0 && ($('#vvd_count').val()).length > 0 && ($('#vvd_power').val()).length > 0 && ($('#vvd_voltage').val()).length > 0){	
							$("input[name='id_obj_oe_klvl']").val('');
							$("input[name='vvd_name']").val('');
							$("input[name='vvd_count']").val('');
							$("input[name='vvd_power']").val('');
							$("input[name='vvd_voltage']").val('');
							$("input[name='vvd_year_begin']").val('');
							$("input[name='vvd_srok']").val('');
							$("input[name='vvd_next_srok']").val('');

							$('#messenger_modal_vvd').html("");
							$('#vvd_name').removeClass("formError");
							$('#vvd_count').removeClass("formError");
							$('#vvd_power').removeClass("formError");
							$('#vvd_voltage').removeClass("formError");							
							
							$('#ModalObj_oe_vvd').fadeOut(300);
							$('#ModalObj_oe_vvd_overlay').fadeOut(300);			
			}			
	
    },	
	add_obj_oe_ek: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_ek"]').val();
		var place = $('#ek_place').val();
		var name = $('#ek_name').val();
		var count = $('#ek_count').val();
		var nazn = $('#ek_nazn').val();
		var power = $('#ek_power').val();
		var date_vid = $('#ek_date_vid').val();
		var rezim = $('#ek_rezim').val();
		var rezim_name = $('#ek_rezim option:selected').text();
		var is_avt = $('#block_is_avt').val();
		var is_pu = $('#block_is_pu').val();
		var is_ak = $('#block_is_ak').val();
		var year_begin = $('#ek_year_begin').val();
		var srok = $('#ek_srok').val();
		var next_srok = $('#ek_next_srok').val();
		
		
		
		if(($('#ek_name').val()).length > 0 && ($('#ek_count').val()).length > 0 && ($('#ek_nazn').val()).length > 0 && ($('#ek_power').val()).length > 0 && ($('#ek_place').val()).length > 0){
		
					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('place', $('input[name="ek_place"]').val());
					formData.append('name', $('input[name="ek_name"]').val());
					formData.append('count', $('input[name="ek_count"]').val());
					formData.append('nazn', $('input[name="ek_nazn"]').val());
					formData.append('power', $('input[name="ek_power"]').val());
					formData.append('date_vid', $('input[name="ek_date_vid"]').val());
					formData.append('rezim', $('select[name="ek_rezim"]').val());
					formData.append('rezim_name', $('#ek_rezim option:selected').text());
					formData.append('is_avt', $('input[name="block_is_avt"]').val());
					formData.append('is_pu', $('input[name="block_is_pu"]').val());
					formData.append('is_ak', $('input[name="block_is_ak"]').val());
					formData.append('year_begin', $('input[name="ek_year_begin"]').val());		
					formData.append('srok', $('input[name="ek_srok"]').val());
					formData.append('next_srok', $('input[name="ek_next_srok"]').val());

					str_tbody_first = $("#obj_oe_ek tbody").html();

				  $.ajax({
						url: '/ARM/basis/objects/add_obj_oe_ek/',
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
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='place']").html(place);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='name']").html(name);				
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='count']").html(count);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='nazn']").html(nazn);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='power']").html(power);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='date_vid']").html(date_vid.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
								$("tr[id_obj_oe_ek="+id_edit+"] td[ek_rezim]").attr('ek_rezim',rezim);
								$("tr[id_obj_oe_ek="+id_edit+"] td[ek_rezim="+rezim+"]").html(rezim_name);
								$("tr[id_obj_oe_ek="+id_edit+"] td[is_avt='is_avt']").html(is_avt == 1 ? 'да' : 'нет');
								$("tr[id_obj_oe_ek="+id_edit+"] td[is_pu='is_pu']").html(is_pu == 1 ? 'да' : 'нет');
								$("tr[id_obj_oe_ek="+id_edit+"] td[is_ak='is_ak']").html(is_ak == 1 ? 'да' : 'нет');	
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='year_begin']").html(year_begin);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='srok']").html(srok);
								$("tr[id_obj_oe_ek="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
								
								
						}else{

							 str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#obj_oe_ek tbody").html(str_tbody); 
								
									var rowCount = $("#obj_oe_ek tbody tr").length;	
									var text = 'Электрокотельные, другое электронагревательное оборудование (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ek").html(text);
							  }
						} 		
						}
					});
	
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_ek').hide().fadeIn(500).html(err_text);
					if(($('#ek_place').val()).length == 0){
						$('#ek_place').addClass("formError");
					}else{
						$('#ek_place').removeClass("formError");
					}
					if(($('#ek_name').val()).length == 0){
						$('#ek_name').addClass("formError");
					}else{
						$('#ek_name').removeClass("formError");
					}
					if(($('#ek_count').val()).length == 0){
						$('#ek_count').addClass("formError");
					}else{
						$('#ek_count').removeClass("formError");
					}
					if(($('#ek_nazn').val()).length == 0){
						$('#ek_nazn').addClass("formError");
					}else{
						$('#ek_nazn').removeClass("formError");
					}	
					if(($('#ek_power').val()).length == 0){
						$('#ek_power').addClass("formError");
					}else{
						$('#ek_power').removeClass("formError");
					}				
			}
			if(($('#ek_name').val()).length > 0 && ($('#ek_count').val()).length > 0 && ($('#ek_nazn').val()).length > 0 && ($('#ek_power').val()).length > 0 && ($('#ek_place').val()).length > 0){	
							$("input[name='id_obj_oe_ek']").val('');
							$("input[name='ek_place']").val('');
							$("input[name='ek_name']").val('');
							$("input[name='ek_count']").val('');
							$("input[name='ek_nazn']").val('');
							$("input[name='ek_power']").val('');
							$("select[name='ek_rezim']").val('0');
							$("input[name='ek_date_vid']").val('');
							$("input[name='block_is_avt']").prop('value', 0);
							$("input[name='block_is_avt']").prop('checked', false);							
							$("input[name='block_is_pu']").prop('value', 0);
							$("input[name='block_is_pu']").prop('checked', false);							
							$("input[name='block_is_ak']").prop('value', 0);
							$("input[name='block_is_ak']").prop('checked', false);
							$("input[name='ek_year_begin']").val('');
							$("input[name='ek_srok']").val('');
							$("input[name='ek_next_srok']").val('');
							
							$('#messenger_modal_ek').html("");
							$('#ek_place').removeClass("formError");
							$('#ek_name').removeClass("formError");
							$('#ek_count').removeClass("formError");
							$('#ek_nazn').removeClass("formError");
							$('#ek_power').removeClass("formError");							
							
							
							$('#ModalObj_oe_ek').fadeOut(300);
							$('#ModalObj_oe_ek_overlay').fadeOut(300);			
			}
	
    },	
	add_obj_oe_ku: function() {
		event.preventDefault();
        var formData = new FormData();
		
		var err_text = "";
		var id_edit = $('input[name="id_obj_oe_ku"]').val();
		var place = $('#ku_place').val();
		var name = $('#ku_name').val();
		var count = $('#ku_count').val();
		var power = $('#ku_power').val();
		var voltage = $('#ku_voltage').val();
		var count_ar = $('#ku_count_ar').val();
		var max_ar = $('#ku_max_ar').val();
		var year_begin = $('#ku_year_begin').val();
		var srok = $('#ku_srok').val();
		var next_srok = $('#ku_next_srok').val();
		
		
		
		if(($('#ku_name').val()).length > 0 && ($('#ku_count').val()).length > 0 && ($('#ku_power').val()).length > 0 && ($('#ku_voltage').val()).length > 0 && ($('#ku_count_ar').val()).length > 0 && ($('#ku_max_ar').val()).length > 0 && ($('#ku_place').val()).length > 0){		
		
					formData.append('id', id_edit);
					formData.append('objects_id', $('#formObjectId').val());
					formData.append('place', $('input[name="ku_place"]').val());
					formData.append('name', $('input[name="ku_name"]').val());
					formData.append('count', $('input[name="ku_count"]').val());
					formData.append('power', $('input[name="ku_power"]').val());
					formData.append('voltage', $('input[name="ku_voltage"]').val());
					formData.append('count_ar', $('input[name="ku_count_ar"]').val());
					formData.append('max_ar', $('input[name="ku_max_ar"]').val());
					formData.append('year_begin', $('input[name="ku_year_begin"]').val());		
					formData.append('srok', $('input[name="ku_srok"]').val());
					formData.append('next_srok', $('input[name="ku_next_srok"]').val());

					str_tbody_first = $("#obj_oe_ku tbody").html();

				  $.ajax({
						url: '/ARM/basis/objects/add_obj_oe_ku/',
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
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='place']").html(place);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='name']").html(name);				
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='voltage']").html(voltage);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='count']").html(count);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='power']").html(power);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='count_ar']").html(count_ar);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='max_ar']").html(max_ar);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='year_begin']").html(year_begin);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='srok']").html(srok);
								$("tr[id_obj_oe_ku="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
								
						}else{

							 str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#obj_oe_ku tbody").html(str_tbody); 
								
									var rowCount = $("#obj_oe_ku tbody tr").length;	
									var text = 'Компенсирующие устройства (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_ku").html(text);
							  }
						} 		
						}
					});
	
			}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_ku').hide().fadeIn(500).html(err_text);
					if(($('#ku_place').val()).length == 0){
						$('#ku_place').addClass("formError");
					}else{
						$('#ku_place').removeClass("formError");
					}
					if(($('#ku_name').val()).length == 0){
						$('#ku_name').addClass("formError");
					}else{
						$('#ku_name').removeClass("formError");
					}
					if(($('#ku_count').val()).length == 0){
						$('#ku_count').addClass("formError");
					}else{
						$('#ku_count').removeClass("formError");
					}
					if(($('#ku_power').val()).length == 0){
						$('#ku_power').addClass("formError");
					}else{
						$('#ku_power').removeClass("formError");
					}	
					if(($('#ku_voltage').val()).length == 0){
						$('#ku_voltage').addClass("formError");
					}else{
						$('#ku_voltage').removeClass("formError");
					}
					if(($('#ku_count_ar').val()).length == 0){
						$('#ku_count_ar').addClass("formError");
					}else{
						$('#ku_count_ar').removeClass("formError");
					}
					if(($('#ku_max_ar').val()).length == 0){
						$('#ku_max_ar').addClass("formError");
					}else{
						$('#ku_max_ar').removeClass("formError");
					}					
			
			}
				if(($('#ku_name').val()).length > 0 && ($('#ku_count').val()).length > 0 && ($('#ku_power').val()).length > 0 && ($('#ku_voltage').val()).length > 0 && ($('#ku_count_ar').val()).length > 0 && ($('#ku_max_ar').val()).length > 0 && ($('#ku_place').val()).length > 0){
							$("input[name='id_obj_oe_ku']").val('');
							$("input[name='ku_place']").val('');
							$("input[name='ku_name']").val('');
							$("input[name='ku_count']").val('');
							$("input[name='ku_power']").val('');
							$("input[name='ku_voltage']").val('');
							$("input[name='ku_year_begin']").val('');
							$("input[name='ku_srok']").val('');
							$("input[name='ku_next_srok']").val('');
							$("input[name='ku_count_ar']").val('');
							$("input[name='ku_max_ar']").val('');
							
							$('#messenger_modal_ku').html("");
							$('#ku_place').removeClass("formError");
							$('#ku_name').removeClass("formError");
							$('#ku_count').removeClass("formError");
							$('#ku_power').removeClass("formError");
							$('#ku_voltage').removeClass("formError");							
							$('#ku_count_ar').removeClass("formError");	
							$('#ku_max_ar').removeClass("formError");	
							
							$('#ModalObj_oe_ku').fadeOut(300);
							$('#ModalObj_oe_ku_overlay').fadeOut(300);				
				
				}		
			
	
    },	

	add_obj_ot_prit_vent: function() {
		event.preventDefault();
        var formData = new FormData();
		
		
		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_prit_vent"]').val();
		var name = $('#vent_name').val();
		var year_begin = $('#vent_year_begin').val();
		var srok = $('#vent_srok').val();
		var next_srok = $('#vent_next_srok').val();		
		id_table = $('#ModalForm_Obj_ot_prit_vent input[name="id_table"]').val();
		work_id = id_table.split('-').pop();
		if(($('#vent_name').val()).length > 0){
		
		
				formData.append('id', id_edit);
				formData.append('objects_id', $('#formObjectId').val());
				formData.append('name', $('input[name="vent_name"]').val());
				formData.append('year_begin', $('input[name="vent_year_begin"]').val());
				formData.append('srok', $('input[name="vent_srok"]').val());
				formData.append('next_srok', $('input[name="vent_next_srok"]').val());
				formData.append('id_table', id_table);
				
				str_tbody_first = $("#"+id_table+" tbody").html();
				
				$.ajax({
					url: '/ARM/basis/objects/add_obj_ot_prit_vent/',
					type: "POST",
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
					
					
					if(id_edit>0){
							$("tr[id_obj_ot_prit_vent="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_ot_prit_vent="+id_edit+"] td[name='year_begin']").html(year_begin);								
							$("tr[id_obj_ot_prit_vent="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_ot_prit_vent="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
					}else{
						str_tbody =  str_tbody_first + result;

							  if((result).length > 0){  
								$("#"+id_table+" tbody").html(str_tbody);
								var rowCount = $("#"+id_table+" tbody tr").length;								
								$("#numrow_t_system-"+work_id+" .count_system").html(rowCount);					
							  }
						
					}
					}
				});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_prit_vent').hide().fadeIn(500).html(err_text);
					if(($('#vent_name').val()).length == 0){
						$('#vent_name').addClass("formError");
					}else{
						$('#vent_name').removeClass("formError");
					}
							
		}

			if(($('#vent_name').val()).length > 0){	
						$("input[name='id_obj_ot_prit_vent']").val('');
						$("input[name='vent_name']").val('');
						$("input[name='id_table']").val('');
						$("input[name='vent_year_begin']").val('');
						$("input[name='vent_srok']").val('');
						$("input[name='vent_next_srok']").val('');
						$('#messenger_modal_prit_vent').html("");
						$('#vent_name').removeClass("formError");
						
						$('#ModalObj_ot_prit_vent').fadeOut(300);
						$('#ModalObj_ot_prit_vent_overlay').fadeOut(300);	

						$('#ModalObj_ot_prit_vent input[name=id_table]').remove();						
			
			
			}		
	
    },
	
	add_obj_ot_teploobmennik_gvs: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_teploobmennik_gvs"]').val();
		var teploobm = $('#gvs').val();
		var teploobm_name = $('#gvs option:selected').text()		
		var name = $('#gvs_name').val();
		var year_begin = $('#gvs_year_begin').val();	
		var srok = $('#gvs_srok').val();
		var next_srok = $('#gvs_next_srok').val();		
		id_table = $('#ModalForm_Obj_ot_teploobmennik_gvs input[name="id_table"]').val();
		work_id = id_table.split('-').pop();
		
		
		
		if(($('#gvs_name').val()).length > 0 && ($('#gvs').val()) > 0){		
			formData.append('id', id_edit);
			formData.append('objects_id', $('#formObjectId').val());
			formData.append('teploobm', $('select[name="gvs"]').val());
			formData.append('teploobm_name', $('#gvs option:selected').text());				
			formData.append('name', $('input[name="gvs_name"]').val());
			formData.append('year_begin', $('input[name="gvs_year_begin"]').val());
			formData.append('srok', $('input[name="gvs_srok"]').val());
			formData.append('next_srok', $('input[name="gvs_next_srok"]').val());		
			formData.append('id_table', id_table);
		
		
		str_tbody_first = $("#"+id_table+" tbody").html();


      $.ajax({
            url: '/ARM/basis/objects/add_obj_ot_teploobmennik_gvs/',
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
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[gvs]").attr('gvs',teploobm);
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[gvs="+teploobm+"]").html(teploobm_name);					
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[name='year_begin']").html(year_begin);	
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_ot_teploobmennik_gvs="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));					
						
					}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#"+id_table+" tbody").html(str_tbody); 
							
							var rowCount = $("#"+id_table+" tbody tr").length;								
							$("#numrow_t_gvs-"+work_id+" .count_gvs").html(rowCount);
							
						  }
					}  	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_teploobmennik_gvs').hide().fadeIn(500).html(err_text);
					if(($('#gvs_name').val()).length == 0){
						$('#gvs_name').addClass("formError");
					}else{
						$('#gvs_name').removeClass("formError");
					}
					if(($('#gvs').val()) == 0){
						$('#gvs').addClass("formError");
					}else{
						$('#gvs').removeClass("formError");
					}										
		}
		
		if(($('#gvs_name').val()).length > 0 && ($('#gvs').val()) > 0){
				$("input[name='id_obj_ot_teploobmennik_gvs']").val('');
				$("input[name='gvs_name']").val('');
				$("input[name='id_table']").val('');
				$("input[name='gvs_year_begin']").val('');
				$("select[name='gvs']").val('0');
				$("input[name='gvs_srok']").val('');
				$("input[name='gvs_next_srok']").val('');
			  	
					$('#messenger_modal_teploobmennik_gvs').html("");
					$('#gvs_name').removeClass("formError");
					$('#gvs').removeClass("formError");

				
				$('#ModalObj_ot_teploobmennik_gvs').fadeOut(300);
				$('#ModalObj_ot_teploobmennik_gvs_overlay').fadeOut(300);
				
				$('#ModalObj_ot_teploobmennik_gvs input[name=id_table]').remove();
		
		}
		
		
    },	
	add_obj_ot_teploobmennik_so: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_teploobmennik_so"]').val();
		var teploobm = $('#so').val();
		var teploobm_name = $('#so option:selected').text()		
		var name = $('#so_name').val();
		var year_begin = $('#so_year_begin').val();	
		var srok = $('#so_srok').val();
		var next_srok = $('#so_next_srok').val();		
		id_table = $('#ModalForm_Obj_ot_teploobmennik_so input[name="id_table"]').val();
		work_id = id_table.split('-').pop();
		
		
		
		if(($('#so_name').val()).length > 0 && ($('#so').val()) > 0){		
			formData.append('id', id_edit);
			formData.append('objects_id', $('#formObjectId').val());
			formData.append('teploobm', $('select[name="so"]').val());
			formData.append('teploobm_name', $('#so option:selected').text());				
			formData.append('name', $('input[name="so_name"]').val());
			formData.append('year_begin', $('input[name="so_year_begin"]').val());
			formData.append('srok', $('input[name="so_srok"]').val());
			formData.append('next_srok', $('input[name="so_next_srok"]').val());		
			formData.append('id_table', id_table);
		
		
		str_tbody_first = $("#"+id_table+" tbody").html();


      $.ajax({
            url: '/ARM/basis/objects/add_obj_ot_teploobmennik_so/',
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
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[so]").attr('so',teploobm);
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[so="+teploobm+"]").html(teploobm_name);					
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[name='year_begin']").html(year_begin);	
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_ot_teploobmennik_so="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));					
						
					}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#"+id_table+" tbody").html(str_tbody); 
							
							var rowCount = $("#"+id_table+" tbody tr").length;								
							$("#numrow_t_so-"+work_id+" .count_so").html(rowCount);
							
						  }
					}  	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_teploobmennik_so').hide().fadeIn(500).html(err_text);
					if(($('#so_name').val()).length == 0){
						$('#so_name').addClass("formError");
					}else{
						$('#so_name').removeClass("formError");
					}
					if(($('#so').val()) == 0){
						$('#so').addClass("formError");
					}else{
						$('#so').removeClass("formError");
					}										
		}
		
		if(($('#so_name').val()).length > 0 && ($('#so').val()) > 0){
				$("input[name='id_obj_ot_teploobmennik_so']").val('');
				$("input[name='so_name']").val('');
				$("input[name='id_table']").val('');
				$("input[name='so_year_begin']").val('');
				$("select[name='so']").val('0');
				$("input[name='so_srok']").val('');
				$("input[name='so_next_srok']").val('');
			  	
					$('#messenger_modal_teploobmennik_so').html("");
					$('#so_name').removeClass("formError");
					$('#so').removeClass("formError");

				
				$('#ModalObj_ot_teploobmennik_so').fadeOut(300);
				$('#ModalObj_ot_teploobmennik_so_overlay').fadeOut(300);
				
				$('#ModalObj_ot_teploobmennik_so input[name=id_table]').remove();
		
		}
		
		
    },

	add_obj_ot_tepl_kot: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_obj_ot_tepl_kot"]').val();
		var teploobm = $('#tepl_kot').val();
		var teploobm_name = $('#tepl_kot option:selected').text()		
		var name = $('#kot_name').val();
		var year_begin = $('#kot_year_begin').val();	
		var srok = $('#kot_srok').val();
		var next_srok = $('#kot_next_srok').val();		

				
		
		if(($('#kot_name').val()).length > 0 && ($('#tepl_kot').val()) > 0){		
			formData.append('id', id_edit);
			formData.append('objects_id', $('#formObjectId').val());
			formData.append('teploobm', $('select[name="tepl_kot"]').val());
			formData.append('teploobm_name', $('#tepl_kot option:selected').text());				
			formData.append('name', $('input[name="kot_name"]').val());
			formData.append('year_begin', $('input[name="kot_year_begin"]').val());
			formData.append('srok', $('input[name="kot_srok"]').val());
			formData.append('next_srok', $('input[name="kot_next_srok"]').val());		
	

			str_tbody_first = $("#obj_ot_tepl_kot tbody").html()


      $.ajax({
            url: '/ARM/basis/objects/add_obj_ot_tepl_kot/',
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
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[tepl_kot]").attr('tepl_kot',teploobm);
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[tepl_kot="+teploobm+"]").html(teploobm_name);					
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[name='name']").html(name);				
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[name='year_begin']").html(year_begin);	
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[name='srok']").html(srok);
							$("tr[id_obj_ot_tepl_kot="+id_edit+"] td[name='next_srok']").html(next_srok.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));					
						
					}else{

						str_tbody =  str_tbody_first + result;

						  if((result).length > 0){  
							$("#obj_ot_tepl_kot tbody").html(str_tbody); 
							
								
							$("#numrow_tepl_kot").html(rowCount);
							
							
									var rowCount = $("#obj_ot_tepl_kot tbody tr").length;	
									var text = 'Теплообменники котельной (' + (rowCount > 0 ? rowCount : '0') + ' шт.)';
									$("#numrow_tepl_kot").html(text);							
							
							
							
							
							
						  }
					}  	
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_teploobmennik_kot').hide().fadeIn(500).html(err_text);
					if(($('#kot_name').val()).length == 0){
						$('#kot_name').addClass("formError");
					}else{
						$('#kot_name').removeClass("formError");
					}
					if(($('#tepl_kot').val()) == 0){
						$('#tepl_kot').addClass("formError");
					}else{
						$('#tepl_kot').removeClass("formError");
					}										
		}
		
		if(($('#kot_name').val()).length > 0 && ($('#tepl_kot').val()) > 0){
				$("input[name='id_obj_ot_tepl_kot']").val('');
				$("input[name='kot_name']").val('');
				$("input[name='kot_year_begin']").val('');
				$("select[name='tepl_kot']").val('0');
				$("input[name='kot_srok']").val('');
				$("input[name='kot_next_srok']").val('');
			  	
				$('#messenger_modal_teploobmennik_kot').html("");
				$('#tepl_kot_name').removeClass("formError");
				$('#tepl_kot').removeClass("formError");

				
				$('#ModalObj_ot_tepl_kot').fadeOut(300);
				$('#ModalObj_ot_tepl_kot_overlay').fadeOut(300);				
		
		}
		
		
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
			$("select[name='Insp_t']").val('');
		}
		
	},
	is_teplo_source: function() {
		if($("input[name='ti_is']").prop('checked')){
			$("input[name='ti_is']").prop('value', 1);
			$('div[id="ti_section"]').css({'display': 'block'});

			id_user =$.cookie('id_user');
			//$("select[name='Insp_t']").val(id_user);
			//$("select[name='Insp_ti']").val(id_user);
			
			if($("select[name='Insp_ti']").val() == 0){
				
				if(id_user !== $("select[name='Insp_t']").val()){
					$("select[name='Insp_ti']").val($("select[name='Insp_t']").val());
				}else{
					$("select[name='Insp_ti']").val(id_user);
				}
			}
		}else{
			$("input[name='ti_is']").prop('value', 0);
			$('div[id="ti_section"]').css({'display': 'none'});
			$("select[name='Insp_ti']").val('');
		}
		
	},
	is_gaz: function() {
		
		console.log('here');
		if($("input[name='gaz_is']").prop('checked')){
			$("input[name='gaz_is']").prop('value', 1);
			$('div[id="gaz_section"]').css({'display': 'block'});

			id_user =$.cookie('id_user');
			$("select[name='Insp_gaz']").val(id_user);
			/*$("select[name='Insp_']").val(id_user);	*/
		}else{
			$("input[name='gaz_is']").prop('value', 0);
			$('div[id="gaz_section"]').css({'display': 'none'});
		}
		
	},
	is_elektro: function() {
		if($("input[name='elektro_is']").prop('checked')){
			$("input[name='elektro_is']").prop('value', 1);
			$('div[id="elektro_section"]').css({'display': 'block'});

			id_user =$.cookie('id_user');
			$("select[name='e_insp']").val(id_user);
			/*$("select[name='Insp_']").val(id_user);	*/
		}else{
			$("input[name='elektro_is']").prop('value', 0);
			$('div[id="elektro_section"]').css({'display': 'none'});
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
	block_is_ak: function() {
		if($("input[name='block_is_ak']").prop('checked')){
			$("input[name='block_is_ak']").prop('value', 1);		
		}else{
			$("input[name='block_is_ak']").prop('value', 0);
		}	
	},
	block_is_avt: function() {
		if($("input[name='block_is_avt']").prop('checked')){
			$("input[name='block_is_avt']").prop('value', 1);		
		}else{
			$("input[name='block_is_avt']").prop('value', 0);
		}	
	},	
	block_is_pu: function() {
		if($("input[name='block_is_pu']").prop('checked')){
			$("input[name='block_is_pu']").prop('value', 1);		
		}else{
			$("input[name='block_is_pu']").prop('value', 0);
		}	
	},	
	block_nazn_sar_ot: function() {
		if($("input[name='block_nazn_sar_ot']").prop('checked')){
			$("input[name='block_nazn_sar_ot']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_sar_ot']").prop('value', 0);
		}	
	},
	block_nazn_sar_gvs: function() {
		if($("input[name='block_nazn_sar_gvs']").prop('checked')){
			$("input[name='block_nazn_sar_gvs']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_sar_gvs']").prop('value', 0);
		}	
	},	
	block_nazn_sar_tn: function() {
		if($("input[name='block_nazn_sar_tn']").prop('checked')){
			$("input[name='block_nazn_sar_tn']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_sar_tn']").prop('value', 0);
		}	
	},	
	block_nazn_sar_vent: function() {
		if($("input[name='block_nazn_sar_vent']").prop('checked')){
			$("input[name='block_nazn_sar_vent']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_sar_vent']").prop('value', 0);
		}	
	},	
	block_nazn_tp_ot: function() {
		if($("input[name='block_nazn_tp_ot']").prop('checked')){
			$("input[name='block_nazn_tp_ot']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_tp_ot']").prop('value', 0);
		}	
	},
	block_nazn_tp_gvs: function() {
		if($("input[name='block_nazn_tp_gvs']").prop('checked')){
			$("input[name='block_nazn_tp_gvs']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_tp_gvs']").prop('value', 0);
		}	
	},	
	block_nazn_tp_tn: function() {
		if($("input[name='block_nazn_tp_tn']").prop('checked')){
			$("input[name='block_nazn_tp_tn']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_tp_tn']").prop('value', 0);
		}	
	},	
	block_nazn_tp_vent: function() {
		if($("input[name='block_nazn_tp_vent']").prop('checked')){
			$("input[name='block_nazn_tp_vent']").prop('value', 1);		
		}else{
			$("input[name='block_nazn_tp_vent']").prop('value', 0);
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
		/*$('#obj_og_device tbody tr').each(function() {	
			formData.append('ids_obj_og_device[]', $(this).attr('id_device_obj_og'));
		});*/
		$('#obj_ot_heatnet tbody tr').each(function() {	
			formData.append('ids_ot_heatnet[]', $(this).attr('id_device_ot_heatnet'));
		});			
		$('#obj_ot_heatnet_t tbody tr').each(function() {	
			formData.append('ids_ot_heatnet_t[]', $(this).attr('id_device_ot_heatnet_t'));
		});
		$('#obj_og_device tbody tr').each(function() {	
			formData.append('ids_obj_og_device[]', $(this).attr('id_obj_og_device'));
		});	
		$('#obj_og_obsl tbody tr').each(function() {	
			formData.append('ids_obj_og_obsl[]', $(this).attr('id_obj_og_obsl'));
		});
		$('#obj_og_accidents tbody tr').each(function() {	
			formData.append('ids_obj_og_accidents[]', $(this).attr('id_obj_og_accidents'));
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
		$('#obj_oe_vvd tbody tr').each(function() {	
			formData.append('ids_obj_oe_vvd[]', $(this).attr('id_obj_oe_vvd'));
		});	
		$('#obj_oe_ek tbody tr').each(function() {	
			formData.append('ids_obj_oe_ek[]', $(this).attr('id_obj_oe_ek'));
		});	
		$('#obj_oe_ku tbody tr').each(function() {	
			formData.append('ids_obj_oe_ku[]', $(this).attr('id_obj_oe_ku'));
		});			
		 $.ajax({
            url: '/ARM/basis/objects/cancel/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			 window.location = '/ARM/basis/objects/list/'+$('#subject_id').val().trim();
			 // console.log(result);
            }
        });
		
	},
	date_insp_next: function(){
		event.preventDefault();
		var vodonagrevatel = 0; //признак наличия водонагревателя
		var otopitel = 0; 		//признак наличия отопителя.
		var combi = 0; 		//признак наличия комбинированного типа.
		var kirpich = 0; 		// признак материала дымохода 1-кирпич 0-иной
		var year = "";
		var month = "";
		var day = "";
		var new_date = "01-01-0001";
		var error = 0;
		var error_counts = 0;
		var str_error = "Рассчет невозможен: \n";
		
		// Проверяем заполнен ли материал дымохода
		/*if($('#flue_mater_id').val() == 0 || $('#flue_mater_id').val() == NaN){
			str_error +=" - не заполнено поле материал дымохода;\n";
			error = 1;
		}*/	
		// Проверяем есть ли информация по отопителям и нагревателям
		$('#obj_og_device tbody tr').each(function(){	
			if($(this).children('td').attr('device_type') == 2 && $(this).children('td[name=counts]').html() >0){
				vodonagrevatel = 1;									
			}; 
			if($(this).children('td').attr('device_type') == 3 && $(this).children('td[name=counts]').html() >0){
				otopitel = 1;
			};
			if($(this).children('td').attr('device_type') == 4 && $(this).children('td[name=counts]').html() >0){
				combi = 1;
			};
		})
		
		if(vodonagrevatel == 0 && otopitel == 0 && combi == 0){
			str_error +=" - в таблице установленного газоиспользующего оборудования нет соответстующих типов (водонагреватели, отопительные аппараты), либо не указано их количество;\n";
			error_counts = 1;
		}
		// Проверяем есть ли дата последней проверки для случая, если есть водонагреватель, но нет отопителя
		if($('#g_flue_date_insp').val().length == 0 && vodonagrevatel == 1 && otopitel == 0){
			str_error +=" - дата последней проверки не заполнена;\n";
			error = 1;
		}
		
		if(error == 0 && error_counts == 0){
				
				
				if($('#g_flue_date_insp').val().length == 0){
					var current_date = new Date();
					alert("Дата последней проверки не заполнена. \n Рассчет будет производиться от текущей даты");
				}else{
					var current_date = new Date($('#g_flue_date_insp').val());
				}
		
				if($('#g_mat_dym').val() == 1){
					kirpich = 1;
				};
/********************************** РАСЧЕТ даты следующей проверки****************************************/
									if(vodonagrevatel == 1 && otopitel == 0){
									
										if(kirpich == 1){
											/*if(current_date.getMonth() < 3 || current_date.getMonth() == 0){
												day = "30";	
												month = "06";
												year = current_date.getFullYear();
											}else if(current_date.getMonth() < 6 && current_date.getMonth() > 2){
												day = "30";	
												month = "09";
												year = current_date.getFullYear();											
											}else if(current_date.getMonth()< 9 && current_date.getMonth() > 5){
												day = "31";	
												month = "12";
												year = current_date.getFullYear();												
											}else if(current_date.getMonth() <= 12 && current_date.getMonth() > 8){
												day = "31";	
												month = "03";
												year = current_date.getFullYear()+1;											
											}*/
											
											if(current_date.getMonth() == 9){
												month = "01";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;
												
											}else if(current_date.getMonth() == 10){
												month = "02";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;													
											
											}else if(current_date.getMonth() == 11){
												month = "03";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;	
											
											}else{
												month = ("0"+(current_date.getMonth() + 4)).slice(-2);
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear();												
											}
											
											
											
											
											
										}else{
												year = current_date.getFullYear()+1;
												month = ("0"+(current_date.getMonth() + 1)).slice(-2);
												day = ("0"+(current_date.getDate())).slice(-2);	
												console.log(year);
												console.log(month);
												console.log(day);
										}	
									};

									if(vodonagrevatel == 1 && otopitel == 1){
										
										if(kirpich == 1){

											/*if(current_date.getMonth() < 3 || current_date.getMonth() == 0){
												day = "30";	
												month = "06";
												year = current_date.getFullYear();
											}else if(current_date.getMonth() < 6 && current_date.getMonth() > 2){
												day = "30";	
												month = "09";
												year = current_date.getFullYear();											
											}else if(current_date.getMonth()< 9 && current_date.getMonth() > 5){
												day = "31";	
												month = "12";
												year = current_date.getFullYear();												
											}else if(current_date.getMonth() <= 12 && current_date.getMonth() > 8){
												day = "31";	
												month = "03";
												year = current_date.getFullYear()+1;											
											}*/

											if(current_date.getMonth() == 9){
												month = "01";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;
												
											}else if(current_date.getMonth() == 10){
												month = "02";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;													
											
											}else if(current_date.getMonth() == 11){
												month = "03";
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear()+1;	
											
											}else{
												month = ("0"+(current_date.getMonth() + 4)).slice(-2);
												day = ("0"+(current_date.getDate())).slice(-2);
												year = current_date.getFullYear();												
											}
											
										}else{
											
											if(current_date.getMonth() < 10){
												year = current_date.getFullYear();
												month = "10";
												day = "01";	
											}else{
												year = current_date.getFullYear()+1;
												month = "10";
												day = "01";											
											}
										}
									};
									
									if(vodonagrevatel == 0 && (otopitel == 1 || combi == 1)){
										if(current_date.getMonth() > 3 && current_date.getMonth() < 11){
											year = current_date.getFullYear()+1;
											month = "10";
											day = "01";
											
										}else{
											year = current_date.getFullYear();
											month = "10";
											day = "01";
																						
										}								
									}		

				new_date = year+"-"+month+"-"+day;
				$('#g_flue_date_insp_next').val(new_date);
				
		}else{
			alert(str_error);
		}	
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
				formData.append('t_id_spr_ot_functions', $('#t_spr_ot_functions_id').val());
				formData.append('type_object', $('#o_spr_type_object').val());
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
					formData.append('elektro_is', $('#elektro_is').val());
					formData.append('e_insp', $('#e_insp').val());
					if(window.location.href.indexOf("objects/edit") != -1){
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
						formData.append('e_note', $('#e_note').val());
						formData.append('del_e', $('#del_e').val());
						formData.append('inactive_e', $('#inactive_e').val());
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
						$('#obj_oe_vvd tbody tr').each(function() {	
							formData.append('ids_obj_oe_vvd[]', $(this).attr('id_obj_oe_vvd'));
						});	
						$('#obj_oe_ek tbody tr').each(function() {	
							formData.append('ids_obj_oe_ek[]', $(this).attr('id_obj_oe_ek'));
						});	
						$('#obj_oe_ku tbody tr').each(function() {	
							formData.append('ids_obj_oe_ku[]', $(this).attr('id_obj_oe_ku'));
						});	
					}					
				}
		/***********************************ТЕПЛО***********************************/
				if(inspect_type == 1){
					if($('#t_is').val() > 0){
						formData.append('t_insp', $('#Insp_t').val());
						formData.append('t_id_spr_ot_cat', $('#t_spr_ot_cat').val());
					}
					formData.append('t_is', $('#t_is').val());
					formData.append('ti_insp', $('#t_is').val());
					if(window.location.href.indexOf("objects/edit") != -1){
						formData.append('t_armor', $('#is_bron').val());
						formData.append('t_armor_crach', $('#t_armor_crach').val());
						formData.append('t_armor_crach_vapor', $('#t_armor_crach_vapor').val());
						formData.append('t_armor_tech', $('#t_armor_tech').val());
						formData.append('t_armor_tech_vapor', $('#t_armor_tech_vapor').val());
						formData.append('t_armor_time', $('#t_armor_time').val());
						formData.append('t_armor_date', $('#t_armor_date').val());
						formData.append('t_id_spr_ot_cat', $('#t_spr_ot_cat').val());
						formData.append('t_id_gvs_open', $('#t_gvs_open').val());
						/*formData.append('t_year', $('#t_year').val());*/
						formData.append('t_workload_heating', $('#t_workload_heating').val());
						formData.append('t_workload_gvs', $('#t_workload_gvs').val());
						formData.append('t_workload_pov', $('#t_workload_pov').val());
						formData.append('t_workload_tech', $('#t_workload_tech').val());
						formData.append('t_workload_vapor', $('#t_workload_vapor').val());
						formData.append('t_workload_percent', $('#t_workload_percent').val());
						/*formData.append('t_systemheat_place', $('#t_systemheat_place').val());*/
						formData.append('t_systemheat_water', $('#t_systemheat_water').val());
						formData.append('t_systemheat_dependent', $('#t_systemheat_dependent').val());
						/*formData.append('t_systemheat_layout', $('#t_systemheat_layout_id').val());*/
						formData.append('t_systemheat_type_op', $('#t_systemheat_type_op').val());
						/*formData.append('t_systemheat_mark_op', $('#t_systemheat_mark_op').val());*/				
						/*formData.append('t_spr_id_ot_type_to', $('#t_spr_ot_type_to_id').val());
						formData.append('t_systemheat_mark_to', $('#t_systemheat_mark_to').val());*/
		
						formData.append('del_t', $('#del_t').val());
						/*formData.append('t_count_itp', $('#t_count_itp').val());*/
						formData.append('inactive_t', $('#inactive_t').val());				
					
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
						$('#obj_ot_teploobmennik_fvs tbody tr').each(function() {	
							formData.append('ids_obj_ot_teploobmennik_gvs[]', $(this).attr('id_obj_ot_teploobmennik_gvs'));
						});	
						$('#obj_ot_teploobmennik_so tbody tr').each(function() {	
							formData.append('ids_obj_ot_teploobmennik_so[]', $(this).attr('id_obj_ot_teploobmennik_so'));
						});
					}						
			/***********************************ТИ***********************************/
						
					if($('#ti_is').val() > 0){
						formData.append('ti_insp', $('#Insp_ti').val());
					}						
						
						formData.append('ti_is', $('#ti_is').val());
						formData.append('ti_name', $('#ti_name').val());
					if(window.location.href.indexOf("objects/edit") != -1){	
						formData.append('ti_reestr', $('#ti_reestr').val());
						//formData.append('ti_insp', $('#Insp_ti').val());
						formData.append('ti_id_spr_ot_boiler_type', $('#oti_boiler').val());
						formData.append('ti_year', $('#ti_year').val());
						formData.append('ti_power', $('#ti_power').text());
						formData.append('ti_dop_power', $('#ti_dop_power').val());
						/*formData.append('ti_id_spr_ot_type_fuel_1', $('#oti_type_fuel_id').val());
						formData.append('ti_id_spr_ot_type_fuel_2', $('#oti_type_fuel_rezerv_id').val());*/
						formData.append('ti_out_power_ot', $('#ti_out_power_ot').val());
						formData.append('ti_out_power_gvs', $('#ti_out_power_gvs').val());
						formData.append('ti_out_power_tech', $('#ti_out_power_tech').val());
						formData.append('ti_out_power_vent', $('#ti_out_power_vent').val());
						formData.append('del_ti', $('#del_ti').val());
						formData.append('inactive_ti', $('#inactive_ti').val());
						
						$('#boiler_water tbody tr').each(function() {
							formData.append('ids_boiler_water[]', $(this).attr('id_boiler_water'));
						});
						$('#boiler_vapor tbody tr').each(function() {
							formData.append('ids_boiler_vapor[]', $(this).attr('id_boiler_vapor'));
						});	
						$('#obj_ot_heatnet tbody tr').each(function() {	
							formData.append('ids_ot_heatnet[]', $(this).attr('id_obj_ot_heatnet'));
						});	
						$('#obj_ot_tepl_kot tbody tr').each(function() {	
							formData.append('ids_obj_ot_tepl_kot[]', $(this).attr('id_obj_ot_tepl_kot'));
						});
					}					
				}	
		/***********************************Газ***********************************/
				if(inspect_type == 2){
					formData.append('gaz_is', $('#gaz_is').val());
					formData.append('g_insp', $('#Insp_gaz').val());
					if(window.location.href.indexOf("objects/edit") != -1){
						formData.append('g_date_initial_start', $('#g_date_initial_start').val());
						formData.append('is_dom', $('#type_home').val());
						formData.append('g_count_flat', $('#count_flat').val());		
						formData.append('g_count_entrance', $('#count_pod').val());
						/*formData.append('g_id_spr_og_flue', $('#og_flue_id').val());*/
						formData.append('g_vid_dym_vstr', $('#g_vid_dym_vstr').val());
						formData.append('g_vid_dym_pr', $('#g_vid_dym_pr').val());
						formData.append('g_vid_dym_koak', $('#g_vid_dym_koak').val());
						formData.append('g_mat_dym', $('#g_mat_dym').val());
						/*formData.append('g_id_spr_og_flue_mater', $('#flue_mater_id').val());*/
						formData.append('g_flue_size', $('#flue_size').val());
						formData.append('g_flue_naim_org_insp', $('#g_flue_naim_org_insp').val());
						
						formData.append('g_flue_date_insp', $('#g_flue_date_insp').val());
						formData.append('g_flue_date_insp_next', $('#g_flue_date_insp_next').val());
						
						formData.append('g_id_spr_og_type_gaz', $('#type_gaz').val());
						formData.append('del_g', $('#del_g').val());
						formData.append('g_flue_date_dog', $('#g_flue_date_dog').val());
						formData.append('g_flue_num_dog', $('#g_flue_num_dog').val());
						formData.append('g_flue_naim_org_dog', $('#g_flue_naim_org_dog').val());
						formData.append('g_flue_date_to', $('#g_flue_date_to').val());
						formData.append('g_flue_date_gto', $('#g_flue_date_gto').val());
						formData.append('g_flue_date_prto', $('#g_flue_date_prto').val());
						formData.append('inactive_g', $('#inactive_g').val());
						
						formData.append('otv_type_g', $('#otv_type_g').val());								
														/*** по инструктажу**/								
						formData.append('ins_data_g', $('#data_instr_dir_g').val());								
														/*** собственный**/
														
						formData.append('otv_g1', $('#otv_g1_sob').val());
						formData.append('otv_g2', $('#otv_g2_sob').val());
						formData.append('order_num_g1', $('#otv_g1_sob_num_pr').val());
						formData.append('order_num_g2', $('#otv_g2_sob_num_pr').val());
						formData.append('order_data_g1', $('#otv_g1_sob_date_pr').val());
						formData.append('order_data_g2', $('#otv_g2_sob_date_pr').val());										
														
														/*** сторонний**/
						formData.append('otv_g3', $('#otv_g_st').val());								
						formData.append('order_num_g3', $('#otv_g_st_num_pr').val());								
						formData.append('order_data_g3', $('#otv_g_st_date_pr').val());
						formData.append('dog_num_g3', $('#otv_g_st_num_dog').val());
						formData.append('dog_data_g3', $('#otv_g_st_date_dog').val());
						formData.append('dog_data_cont_g3', $('#otv_g_st_date_dog_cont').val());						
						

						$('#obj_og_device tbody tr').each(function() {	
							formData.append('ids_obj_og_device[]', $(this).attr('id_obj_og_device'));
						});		
						
						$('#obj_og_obsl tbody tr').each(function() {	
							formData.append('ids_obj_og_obsl[]', $(this).attr('id_obj_og_obsl'));
						});
						
						$('#obj_og_accidents tbody tr').each(function() {	
							formData.append('ids_obj_og_accidents[]', $(this).attr('id_obj_og_accidents'));
						});
					}
					
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
            url: '/ARM/basis/objects/usersList/',
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
            url: '/ARM/basis/objects/usersList/',
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
            url: '/ARM/basis/objects/usersList/',
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
		
		
	},
	
	type_otv_hide_show_g: function(value) {

		if(value == 1){
			$('div[class="otv_l_gh_sob"]').css({'display': 'block'});
			$('div[class="otv_l_gh_st"]').css({'display': 'none'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'none'});
			
			event.preventDefault();
			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());			
					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
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
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_gh_osn_sob").html(fio_otv);
		

						}
					});			
				
			
		}else if(value == 2){
			$('div[class="otv_l_gh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_gh_st"]').css({'display': 'block'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'none'});
			
		}else if(value == 3){
			$('div[class="otv_l_gh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_gh_st"]').css({'display': 'none'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'block'});	
		}else{
			$('div[class="otv_l_gh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_gh_st"]').css({'display': 'none'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'none'});		
		}
		
	},
	insert_row_instr_g: function(value) {	
		
		var date_dir_instr = $('input[name="data_instr_dir_g"]').val();
		
		$('input[name="id_row_osn_instr_g"]').val(value);	
		$('input[name="otv_date_instr_g"]').val(date_dir_instr);
		
	
	},
	insert_row_st_g: function(value) {	
		$('input[name="id_row_osn_st_g"]').val(value);

		var num_pr_g3 = $('input[name="otv_g_st_num_pr"]').val();
		var data_pr_g3 = $('input[name="otv_g_st_date_pr"]').val();
		var num_dog_g3 = $('input[name="otv_g_st_num_dog"]').val();
		var data_dog_g3 = $('input[name="otv_g_st_date_dog"]').val();
		var data_dog_cont_g3 = $('input[name="otv_g_st_date_dog_cont"]').val();
		var fio_g3 = $("tr[id_otv_gh_osn_st='3'] td[name='otv_fio_gh_osn_st']").text();
		var attr_g3 = $("tr[id_otv_gh_osn_st='3'] td[name='otv_dolg_sub_gh_osn_st']").text();
	
		$("#otv_number_pr_st_g").val(num_pr_g3);
		$("#otv_date_pr_st_g").val(data_pr_g3);
		$("#otv_number_dog_st_g").val(num_dog_g3);
		$("#otv_date_dog_st_g").val(data_dog_g3);
		$("#otv_date_dog_continue_st_g").val(data_dog_cont_g3);

		$("#stor_otv_g").html(fio_g3+((attr_g3).length > 0 ? " ("+attr_g3+")" : ''));
	},
	
	insert_row_g: function(value) {	
		$('input[name="id_row_osn_sob_g"]').val(value);	

		var id_g1 = $('input[name="otv_g1_sob"]').val();
		var num_pr_g1 = $('input[name="otv_g1_sob_num_pr"]').val();
		var data_pr_g1 = $('input[name="otv_g1_sob_date_pr"]').val();

		var id_g2 = $('input[name="otv_g2_sob"]').val();
		var num_pr_g2 = $('input[name="otv_g2_sob_num_pr"]').val();
		var data_pr_g2 = $('input[name="otv_g2_sob_date_pr"]').val();
		
		var fio_g1 = $("tr[id_otv_gh_osn_sob='1'] td[name='otv_fio_gh_osn_sob']").text();
		var attr_g1 = $("tr[id_otv_gh_osn_sob='1'] td[name='otv_dolg_sub_gh_osn_sob']").text();

		var fio_g2 = $("tr[id_otv_gh_osn_sob='2'] td[name='otv_fio_gh_zam_sob']").text();
		var attr_g2 = $("tr[id_otv_gh_osn_sob='2'] td[name='otv_dolg_sub_zam_g_osn_sob']").text();
	
		if(value == 1){
			$("#otv_number_pr_sob_g").val(num_pr_g1);
			$("#otv_date_pr_sob_g").val(data_pr_g1);
			$('#otv_gh_osn_sob option[value='+id_g1+']').prop('selected', true);			
		}else if(value == 2){
			$("#otv_number_pr_sob_g").val(num_pr_g2);
			$("#otv_date_pr_sob_g").val(data_pr_g2);
			$('#otv_gh_osn_sob option[value='+id_g2+']').prop('selected', true);			
		}
	
	},	
	otv_insert_info_g: function(value) {
			event.preventDefault();
			var formData = new FormData();
			
		if($('#ModalOtv_gh_st').is(':visible') || $('#ModalOtv_gh_sob').is(':visible')){	
			var id_modal_sob = $('input[name="id_row_osn_sob_g"]').val();
			var id_modal_st = $('input[name="id_row_osn_st_g"]').val();
			
			
			formData.append('id_otv', value);
					$.ajax({
						url: '/ARM/basis/subject/insertInfoOtv/',
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
							if(id_modal_sob == 1 || id_modal_sob == 2){
								$("#id_otv_gh_osn_sob").val(data[0]['reestr_personal_id']);
								$("#otv_gh_osn_sob_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_gh_osn_sob_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_gh_osn_sob_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_gh_osn_sob_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_gh_osn_sob_unp_name").val(data[0]['reestr_unp_name_short']);
							}
							if(id_modal_st == 3){
								$("#id_otv_gh_osn_st").val(data[0]['reestr_personal_id']);
								$("#otv_gh_osn_st_secondname").val(data[0]['reestr_personal_secondname']);
								$("#otv_gh_osn_st_firstname").val(data[0]['reestr_personal_firstname']);
								$("#otv_gh_osn_st_lastname").val(data[0]['reestr_personal_lastname']);
								$("#otv_gh_osn_st_dolg").val(data[0]['reestr_personal_post']);
								$("#otv_gh_osn_st_unp_name").val(data[0]['reestr_unp_name_short']);
							}							
						}
					});
		}				
	}, 
	
	add_otv_gh_instr: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_row = $('#id_row_osn_instr_g').val();
		var date_instr = $('#otv_date_instr_g').val();



		if(($('#otv_date_instr_g').val()).length > 0){		

			str_tbody_first = $("#otv_l_gh_instr tbody").html()


      $.ajax({
            url: '/ARM/basis/objects/add_otv_gh_instr/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

							$("tr[id_otv_gh_instr='4'] td[name='otv_fio_gh_osn_instr']").html("Руководитель организации по инструктажу от "+date_instr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));				
							$("#data_instr_dir_g").val(date_instr);
							
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_instr_g').hide().fadeIn(500).html(err_text);
					if(($('#otv_date_instr_g').val()).length == 0){
						$('#otv_date_instr_g').addClass("formError");
					}else{
						$('#otv_date_instr_g').removeClass("formError");
					}
					
		}
		
		if(($('#otv_date_instr_g').val()).length > 0 ){
				
				$("input[name='id_row_osn_instr_g']").val('');
				$("input[name='otv_date_instr_g']").val('');

				$('#messenger_modal_otv_instr_g').html("");
				$('#otv_date_instr_g').removeClass("formError");

				
				$('#ModalOtv_gh_instr').fadeOut(300);
				$('#ModalOtv_gh_instr_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_gh_st: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_gh_osn_st"]').val();		
		var secondname = $('#otv_gh_osn_st_secondname').val();
		var firstname = $('#otv_gh_osn_st_firstname').val();	
		var lastname = $('#otv_gh_osn_st_lastname').val();		
		var dolgnost = $('#otv_gh_osn_st_dolg').val();
		var unp_name = $('#otv_gh_osn_st_unp_name').val();		
		var num_pr = $('#otv_number_pr_st_g').val();
		var date_pr = $('#otv_date_pr_st_g').val();
		var num_dog = $('#otv_number_dog_st_g').val();
		var date_dog = $('#otv_date_dog_st_g').val();		
		var date_cont_dog = $('#otv_date_dog_continue_st_g').val();
		var id_row = $('#id_row_osn_st_g').val();


		if(($('#id_stor_otv_g').val()).length > 0 && ($('#otv_number_pr_st_g').val()).length > 0 && ($('#otv_date_pr_st_g').val()).length > 0 && ($('#otv_number_dog_st_g').val()).length > 0 && ($('#otv_date_dog_st_g').val()).length > 0 && ($('#otv_date_dog_continue_st_g').val()).length > 0){		
			
			formData.append('otv_g1_st', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_gh_osn_st_secondname"]').val());
			formData.append('firstname', $('input[name="otv_gh_osn_st_firstname"]').val());
			formData.append('lastname', $('input[name="otv_gh_osn_st_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_gh_osn_st_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_gh_osn_st_unp_name"]').val());
			formData.append('order_num_g3', $('input[name="otv_number_pr_st_g"]').val());
			formData.append('order_data_g3', $('input[name="otv_date_pr_st_g"]').val());
			formData.append('dog_num_g3', $('input[name="otv_number_dog_st_g"]').val());
			formData.append('dog_data_g3', $('input[name="otv_date_dog_st_g"]').val());	
			formData.append('dog_cont_data_g3', $('input[name="otv_date_dog_continue_st_g"]').val());
	
			str_tbody_first = $("#otv_l_gh_st tbody").html()


      $.ajax({
            url: '/ARM/basis/subject/add_otv_gh_st/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
						
							
						if(id_row == 3){		
						
							$("tr[id_otv_gh_osn_st='3'] td[name='otv_fio_gh_osn_st']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_gh_osn_st='3'] td[name='otv_dolg_sub_gh_osn_st']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_gh_osn_st='3'] td[name='otv_pr_gh_osn_st']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							$("tr[id_otv_gh_osn_st='3'] td[name='otv_dog_gh_osn_st']").html("№ "+num_dog+" от "+date_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1")+" до "+date_cont_dog.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
							
							$("#otv_g_st").val(id_edit);
							$("#otv_g_st_num_pr").val(num_pr);
							$("#otv_g_st_date_pr").val(date_pr);
							$("#otv_g_st_num_dog").val(num_dog);
							$("#otv_g_st_date_dog").val(date_dog);
							$("#otv_g_st_date_dog_cont").val(date_cont_dog);
						}	
								
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_st_g').hide().fadeIn(500).html(err_text);
					if(($('#id_stor_otv_g').val()).length == 0){
						$('#id_stor_otv_g').addClass("formError");
					}else{
						$('#id_stor_otv_g').removeClass("formError");
					}
					if(($('#otv_number_pr_st_g').val()).length == 0){
						$('#otv_number_pr_st_g').addClass("formError");
					}else{
						$('#otv_number_pr_st_g').removeClass("formError");
					}	
					if(($('#otv_date_pr_st_g').val()).length == 0){
						$('#otv_date_pr_st_g').addClass("formError");
					}else{
						$('#otv_date_pr_st_g').removeClass("formError");
					}	
					if(($('#otv_number_dog_st_g').val()).length == 0){
						$('#otv_number_dog_st_g').addClass("formError");
					}else{
						$('#otv_number_dog_st_g').removeClass("formError");
					}	
					if(($('#otv_date_dog_st_g').val()).length == 0){
						$('#otv_date_dog_st_g').addClass("formError");
					}else{
						$('#otv_date_dog_st_g').removeClass("formError");
					}
					if(($('#otv_date_dog_continue_st_g').val()).length == 0){
						$('#otv_date_dog_continue_st_g').addClass("formError");
					}else{
						$('#otv_date_dog_continue_st_g').removeClass("formError");
					}					
		}
		
		if(($('#id_stor_otv_g').val()).length > 0 && ($('#otv_number_pr_st_g').val()).length > 0 && ($('#otv_date_pr_st_g').val()).length > 0 && ($('#otv_number_dog_st_g').val()).length > 0 && ($('#otv_date_dog_st_g').val()).length > 0 && ($('#otv_date_dog_continue_st_g').val()).length > 0){
				
				$("input[name='id_stor_otv_g']").val('');
				$("input[name='id_row_osn_st_g']").val('');
				$("input[name='otv_number_pr_st_g']").val('');
				$("input[name='otv_date_pr_st_g']").val('');
				$("input[name='otv_gh_osn_st_secondname']").val('');
				$("input[name='otv_gh_osn_st_firstname']").val('');
				$("input[name='otv_gh_osn_st_lastname']").val('');
				$("input[name='otv_gh_osn_st_dolg']").val('');
				$("input[name='otv_gh_osn_st_unp_name']").val('');
				$("input[name='otv_number_dog_st_g']").val('');
				$("input[name='otv_date_dog_st_g']").val('');
				$("input[name='otv_date_dog_continue_st_g']").val('');

			  	
				$('#messenger_modal_otv_st_g').html("");
				$('#otv_gh_osn_st').removeClass("formError");
				$('#otv_number_pr_st_g').removeClass("formError");
				$('#otv_date_pr_st_g').removeClass("formError");
				$('#otv_number_dog_st_g').removeClass("formError");
				$('#otv_date_dog_st_g').removeClass("formError");
				$('#otv_date_dog_continue_st_g').removeClass("formError");
				
				$('#ModalOtv_gh_st').fadeOut(300);
				$('#ModalOtv_gh_st_overlay').fadeOut(300);				
		
		}
		
		
    },

	add_otv_gh_sob: function() {
		event.preventDefault();
        var formData = new FormData();

		var err_text = "";
		var id_edit = $('input[name="id_otv_gh_osn_sob"]').val();		
		var secondname = $('#otv_gh_osn_sob_secondname').val();
		var firstname = $('#otv_gh_osn_sob_firstname').val();	
		var lastname = $('#otv_gh_osn_sob_lastname').val();		
		var dolgnost = $('#otv_gh_osn_sob_dolg').val();
		var unp_name = $('#otv_gh_osn_sob_unp_name').val();		
		var num_pr = $('#otv_number_pr_sob_g').val();
		var date_pr = $('#otv_date_pr_sob_g').val();
		var id_row = $('#id_row_osn_sob_g').val();

		if(($('#otv_gh_osn_sob').val()) > 0 && ($('#otv_number_pr_sob_g').val()).length > 0 && ($('#otv_date_pr_sob_g').val()).length > 0){		
			formData.append('otv_g1', id_edit);
			formData.append('id_unp', $('#formUnpId').val());				
			formData.append('secondname', $('input[name="otv_gh_osn_sob_secondname"]').val());
			formData.append('firstname', $('input[name="otv_gh_osn_sob_firstname"]').val());
			formData.append('lastname', $('input[name="otv_gh_osn_sob_lastname"]').val());		
			formData.append('dolgnost', $('input[name="otv_gh_osn_sob_dolg"]').val());
			formData.append('unp_name', $('input[name="otv_gh_osn_sob_unp_name"]').val());
			formData.append('order_num_g1', $('input[name="otv_number_pr_sob_g"]').val());
			formData.append('order_data_g1', $('input[name="otv_date_pr_sob_g"]').val());
	
	
			str_tbody_first = $("#otv_l_gh_sob tbody").html()


      $.ajax({
            url: '/ARM/basis/objects/add_otv_gh_sob/',
            type: "POST",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){

//console.log(result);
				
				
				/*if(id_edit>0){*/			
							
						if(id_row == 1){		
						
							$("tr[id_otv_gh_osn_sob='1'] td[name='otv_fio_gh_osn_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_gh_osn_sob='1'] td[name='otv_dolg_sub_gh_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_gh_osn_sob='1'] td[name='otv_pr_gh_osn_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));
							
							$("#otv_g1_sob").val(id_edit);
							$("#otv_g1_sob_num_pr").val(num_pr);
							$("#otv_g1_sob_date_pr").val(date_pr);

						
						}else if(id_row == 2){
							
							$("tr[id_otv_gh_osn_sob='2'] td[name='otv_fio_gh_zam_sob']").html(secondname+" "+firstname+" "+lastname);				
							$("tr[id_otv_gh_osn_sob='2'] td[name='otv_dolg_sub_zam_g_osn_sob']").html(dolgnost+" / "+unp_name);	
							$("tr[id_otv_gh_osn_sob='2'] td[name='otv_pr_gh_zam_sob']").html("№ "+num_pr+" / "+date_pr.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1"));							

							$("#otv_g2_sob").val(id_edit);
							$("#otv_g2_sob_num_pr").val(num_pr);
							$("#otv_g2_sob_date_pr").val(date_pr);
							
						}	
								
				}
			});
		}else{
					err_text += "<p>поля помеченные звездочкой должны быть заполнены!!!</p>"
					$('#messenger_modal_otv_sob_g').hide().fadeIn(500).html(err_text);
					if(($('#otv_gh_osn_sob').val()) == 0){
						$('#otv_gh_osn_sob').addClass("formError");
					}else{
						$('#otv_gh_osn_sob').removeClass("formError");
					}
					if(($('#otv_number_pr_sob_g').val()).length == 0){
						$('#otv_number_pr_sob_g').addClass("formError");
					}else{
						$('#otv_number_pr_sob_g').removeClass("formError");
					}	
					if(($('#otv_date_pr_sob_g').val()).length == 0){
						$('#otv_date_pr_sob_g').addClass("formError");
					}else{
						$('#otv_date_pr_sob_g').removeClass("formError");
					}					
		}
		
		if(($('#otv_gh_osn_sob').val()) > 0 && ($('#otv_number_pr_sob_g').val()).length > 0 && ($('#otv_date_pr_sob_g').val()).length > 0){
				$("input[name='id_otv_gh_sob']").val('');
				
				$("select[name='otv_gh_osn_sob']").val('');
				$("input[name='otv_number_pr_sob_g']").val('');
				$("input[name='otv_date_pr_sob_g']").val('');
				$("input[name='otv_gh_osn_sob_secondname']").val('');
				$("input[name='otv_gh_osn_sob_firstname']").val('');
				$("input[name='otv_gh_osn_sob_lastname']").val('');
				$("input[name='otv_gh_osn_sob_dolg']").val('');
				$("input[name='otv_gh_osn_sob_unp_name']").val('');
			  	
				$('#messenger_modal_otv_sob_g').html("");
				$('#otv_gh_osn_sob').removeClass("formError");
				$('#otv_number_pr_sob_g').removeClass("formError");
				$('#otv_date_pr_sob_g').removeClass("formError");
				
				$('#ModalOtv_gh_sob').fadeOut(300);
				$('#ModalOtv_gh_sob_overlay').fadeOut(300);				
		
		}
		
		
    }	
	

	
		
	
};

$(window).load(function() {
	
	
	if($("#otv_type_g").val() == 3){
			$('div[class="otv_l_gh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_gh_st"]').css({'display': 'none'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'block'});	
	}
	if($("#otv_type_g").val() == 2){
			$('div[class="otv_l_gh_sob"]').css({'display': 'none'});
			$('div[class="otv_l_gh_st"]').css({'display': 'block'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'none'});	
	}	
	if($("#otv_type_g").val() == 1){
			$('div[class="otv_l_gh_sob"]').css({'display': 'block'});
			$('div[class="otv_l_gh_st"]').css({'display': 'none'});
			$('div[class="otv_l_gh_instr"]').css({'display': 'none'});

			var formData = new FormData();
			formData.append('id_unp', $('#formUnpId').val());

					$.ajax({
						url: '/ARM/basis/subject/getUnpforOtv/',
						type: 'POST',
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){
							//console.log(result);		
							data = $.parseJSON(result);
							
							fio_otv ="<option value= '0'>Выберите ответственное лицо</option>";
						
								$.each(data, function(i,val){							
									fio_otv =fio_otv+"<option value= "+val['reestr_personal_id']+">"+val['reestr_personal_secondname']+" "+val['reestr_personal_firstname']+" "+val['reestr_personal_lastname']+"</option>";								
								})
								$("#otv_gh_osn_sob").html(fio_otv);
		

						}
					});			
						
	}		
	
	
	
	
	
	
	if(window.location.href.indexOf("object/create") != -1){
	if($.cookie('access_level') > 2){
			$("#formPage select").prop('disabled', true);
			$("#formPage input").prop('disabled', true);
			$("#formPage textarea").prop('disabled', true);
			$("#formPage button").css({'display': 'none'});
			$("#formPage a").css({'pointer-events': 'none'});
			$(".w4").css({'width': '0'});
			$(".nav_buttons").css({'display': 'none'});
		}
	
	}
	
	//var all_cookies = document.cookie;
	var inspect_type = '';
	var access_level = '';
	inspect_type =$.cookie('podrazdelenie');
	access_level =$.cookie('access_level');
	

	if($("#type_isolation").val() == 4){
			$('div[id="ts_type_tube"]').css({'display': 'block'});
	}else{
			$('div[id="ts_type_tube"]').css({'display': 'none'});
	}
	if($("#t_type_isolation").val() == 4){
			$('div[id="tst_type_tube"]').css({'display': 'block'});
	}else{
			$('div[id="tst_type_tube"]').css({'display': 'none'});
	}
	
	
	
	
	
	

	$('.uzel_content').each(function(){
	
		work_id = $(this).attr('id').split('-').pop();
		
		if($("#t_spr_uzel_block-"+work_id).val() == 1 || $("#t_spr_uzel_block-"+work_id).val() == 2 || $("#t_spr_uzel_block-"+work_id).val() == 3 || $("#t_spr_uzel_block-"+work_id).val() == 4 || $("#t_spr_uzel_block-"+work_id).val() == 5){
				$('div[id="uzel_name-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_pu-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_sar-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_so-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_gvs-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_system-'+work_id+'"]').css({'display': 'block'});
		/*}else if($("#t_spr_uzel_block-"+work_id).val() == 5){
				$('div[id="uzel_name-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_pu-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_sar-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_so-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_gvs-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_system-'+work_id+'"]').css({'display': 'none'});*/
		}else if($("#t_spr_uzel_block-"+work_id).val() == 6){
				$('div[id="uzel_name-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_pu-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_sar-'+work_id+'"]').css({'display': 'block'});
				$('div[id="uzel_so-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_gvs-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_system-'+work_id+'"]').css({'display': 'block'});
		}else{
				$('div[id="uzel_name-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_pu-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_sar-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_so-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_gvs-'+work_id+'"]').css({'display': 'none'});
				$('div[id="uzel_system-'+work_id+'"]').css({'display': 'none'});
		}

		
			if($("#t_gvs_open-"+work_id).val() == 3){
				$('#uzel_gvs-'+work_id+' div[class="teploobmennik_gvs"]').css({'display': 'block'});
			}else{
				$('#uzel_gvs-'+work_id+' div[class="teploobmennik_gvs"]').css({'display': 'none'});
			}
			
			if($("#t_systemheat_dependent-"+work_id).val() == 2){
				$('#uzel_so-'+work_id+' div[class="teploobmennik_so"]').css({'display': 'block'});
			}else{
				$('#uzel_so-'+work_id+' div[class="teploobmennik_so"]').css({'display': 'none'});
			}
			console.log($('#obj_ot_personal_tp-'+work_id+' tbody tr').length);
			$('#numrow_pu-'+work_id+' .count_pu').html($('#obj_ot_personal_tp-'+work_id+' tbody tr').length);
			$('#numrow_sar-'+work_id+' .count_sar').html($('#obj_ot_personal_sar-'+work_id+' tbody tr').length);
			$('#numrow_t_so-'+work_id+' .count_so').html($('#obj_ot_teploobmennik_so-'+work_id+' tbody tr').length);
			$('#numrow_t_gvs-'+work_id+' .count_gvs').html($('#obj_ot_teploobmennik_gvs-'+work_id+' tbody tr').length);
			$('#numrow_t_system-'+work_id+' .count_system').html($('#obj_ot_prit_vent-'+work_id+' tbody tr').length);
			
			
			if($('#t_systemheat_water-'+work_id).val() > 0 || $('#t_systemheat_type_op-'+work_id).val() > 0 || $('#t_systemheat_dependent-'+work_id).val() > 0){
				$('#numrow_t_so-'+work_id+' .so_form').html("1");
			}else{
				$('#numrow_t_so-'+work_id+' .so_form').html("0");
			}


			if($('#t_gvs_open-'+work_id).val() > 0){
				$('#numrow_t_gvs-'+work_id+' .gvs_form').html("1");
			}else{
				$('#numrow_t_gvs-'+work_id+' .gvs_form').html("0");
			}			
		
					
			
	})
	
	$('input[name=uzel]').first().attr('checked','checked');
	$('input[name=uzel]').last().attr('checked',false);
	$('input[name=uzel]+label').first().addClass('active');
	
	$('.uzel_content').first().css({'display': 'block'});
	$('.uzel_razdel').first().css({'display': 'block'});
	$('.uzel_name').first().css({'display': 'block'});
	$('#content-1.uzel_content').first().css({'display': 'none'});
	
	if($("#type_home").val() == 1){
			$('div[gaz_block="m"]').css({'display': 'block'});
			$('div[gaz_block="mo"]').css({'display': 'block'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'none'});
	}
	
	if($("#type_home").val() == 2){
			$('div[gaz_block="m"]').css({'display': 'none'});
			$('div[gaz_block="mo"]').css({'display': 'block'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'none'});		
	}
	if($("#type_home").val() == 3){
			$('div[gaz_block="m"]').css({'display': 'none'});
			$('div[gaz_block="mo"]').css({'display': 'none'});
			$('div[gaz_block="mod"]').css({'display': 'block'});
			$('div[gaz_block="d"]').css({'display': 'block'});	
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
	if($("#gaz_is").val() == 0){
		$('div[id="gaz_section"]').css({'display': 'none'});
	}
	if($("#gaz_is").val() == 1){
		$('div[id="gaz_section"]').css({'display': 'block'});
	}
	if($("#elektro_is").val() == 0){
		$('div[id="elektro_section"]').css({'display': 'none'});
	}
	if($("#elektro_is").val() == 1){
		$('div[id="elektro_section"]').css({'display': 'block'});
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
	/*if($("#t_systemheat_dependent_id").val() == 2){
			$('div[id="sp"]').css({'display': 'block'});
	}*/	
	
	/* блокируем вкладки */
	//console.log(inspect_type);
	switch(inspect_type){
		case '1':
		$('section[id=content-tab2] input').prop('disabled', true);
		$('section[id=content-tab2] select').prop('disabled', true);
		$('section[id=content-tab2] button').prop('disabled', true);

		/*$('section[id=content-tab1] input').prop('disabled', true);
		$('section[id=content-tab1] select').prop('disabled', true);
		$('section[id=content-tab1] button').prop('disabled', true);
		$('section[id=content-tab1] textarea').prop('disabled', true);*/
		
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
			
			/*$('section[id=content-tab1] input').prop('disabled', true);
			$('section[id=content-tab1] select').prop('disabled', true);
			$('section[id=content-tab1] button').prop('disabled', true);
			$('section[id=content-tab1] textarea').prop('disabled', true);*/
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
	
		sum =(sum1+sum3+sum4).toFixed(3); ; 

		$('#sum_power').html(sum);
		if(sum >0){
			$('#sum_power').html(sum);
		}else{
			$('#sum_power').html("0");	
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
	sum1 =(sum1+sum2+sum3+sum4).toFixed(3); 
	
	if(sum1>0){
		$('#sum_workload').html(sum1);
	}else{
		$('#sum_workload').html(" - ");	
	}
/******************* Вывод общей установленной мощности котельной на вкладке "ТИ" ***********************************/	

	var sum_power_edit_water = 0;
	var sum_power_edit_vapor = 0;

						$('#boiler_water tbody tr').each(function() {	
							
							var power = $(this).children('td[name=power]').html();
							var count = $(this).children('td[name=counts]').html();
													  														
														
								if (!isNaN(power) && power.length !== 0) {
									sum_power_edit_water = sum_power_edit_water + (parseFloat(power)*count);
															
														};

							$("#sum_power_kot_water").val(sum_power_edit_water);

						});
						
						$('#boiler_vapor tbody tr').each(function() {	
							
							var power = $(this).children('td[name=power]').html();
							var count = $(this).children('td[name=counts]').html();
													  														
														
								if (!isNaN(power) && power.length !== 0) {
									sum_power_edit_vapor = sum_power_edit_vapor + (parseFloat(power)*count);
															
														};
								$("#sum_power_kot_vapor").val(sum_power_edit_vapor);

						});	

		var sum_power_water = parseFloat($("#sum_power_kot_water").val());
		var sum_power_vapor = parseFloat($("#sum_power_kot_vapor").val());
		var sum_power_dop = parseFloat($("#ti_dop_power").val());
		
		
		if (isNaN(sum_power_water)) { sum_power_water = 0;}
		if (isNaN(sum_power_vapor)) { sum_power_vapor = 0;}
		if (isNaN(sum_power_dop)) { sum_power_dop = 0;}
	
		sum_power_kot = (sum_power_water+sum_power_vapor+sum_power_dop).toFixed(3);

		if(sum_power_kot>0){
			$('#ti_power').html(sum_power_kot);
		}else{
			$('#ti_power').html("0");	
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
	$("#g_vid_dym_vstr, #g_vid_dym_pr, #g_vid_dym_koak, #g_mat_dym").bind("change", function(){
		if($(this).val() == 0){
			$(this).prop('value', 1);
		}else{
			$(this).prop('value', 0);
		}
	});
	$("#inactive_e, #inactive_t, #inactive_ti, #inactive_g").bind("change", function(){
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
			sum =(sum1+sum3+sum4).toFixed(3); ; 

			$('#sum_power').html(sum);

	});
	$( "#ti_dop_power" ).bind( "input", function() {
		
	
		var sum1 = parseFloat($("#ti_dop_power").val());
		var sum2 = parseFloat($("#sum_power_kot_water").val());
		var sum3 = parseFloat($("#sum_power_kot_vapor").val());

		if (isNaN(sum1)) { sum1 = 0;}
		if (isNaN(sum2)) { sum2 = 0;}
		if (isNaN(sum3)) { sum3 = 0;}


			//sum =sum1+sum2+sum3+sum4; 
			sum =(sum1+sum2+sum3).toFixed(3); 
//console.log(sum);
			$('#ti_power').html(sum);

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

		sum = (sum1+sum2+sum3+sum4).toFixed(3);  
		
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
	
		sum =(sum1+sum2+sum3+sum4).toFixed(3);  
		
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
		
		sum =(sum1+sum2+sum3+sum4).toFixed(3); 
		
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
		
		sum =(sum1+sum2+sum3+sum4).toFixed(3); 
		
		$('#sum_workload').html(sum);

	});
	
	
///	********************* Перенести в общую js ***************	
	
	
	$( "input[type=number]" ).bind( "change", function() {
		$(this).val($(this).val().replace(",", "."));
	});
	
	$( "input[type=text]" ).bind( "change", function() {
		
		//console.log($(this).val().length);
		if($(this).val().length == 0){
		
			$(this).val('');
		}
	});
	$( "input[type=text]" ).bind( "input", function() {
		
		//console.log($(this).val().length);
		if($(this).val().length == 0){
		
			$(this).val('');
		}
	});
	$( "input[type=number]" ).bind( "change", function() {
		
		//console.log($(this).val().length);
		if($(this).val().length == 0){
		
			$(this).val(0);
		}
	});

	
	
	$( "input[type=number]" ).keydown(function(e) {
			if (e.keyCode != 190 && e.keyCode != 191 && e.keyCode != 16 && e.keyCode != 188 && e.keyCode != 110 && e.keyCode != 8 && e.keyCode != 0 && e.keyCode != 46 && e.keyCode != 96 && e.keyCode != 97 && e.keyCode != 98 && e.keyCode != 99 && e.keyCode != 100 && e.keyCode != 101 && e.keyCode != 102 && e.keyCode != 103 && e.keyCode != 104 && e.keyCode != 105 && (e.keyCode < 48 || e.keyCode > 57)) {
			return false;
		}
	});

///***************************** end of Перенести в общую js *****************************
	
	$('.btn_add_fields').blur();

	
	/*teploobmennik_os_hide_show: function(value, id_uzel) {
		if(value == 2){
			$('#'+id_uzel+' div[class="teploobmennik_so"]').css({'display': 'block'});
		}else{
			$('#'+id_uzel+' div[class="teploobmennik_so"]').css({'display': 'none'});
		}
		
	},*/	


	  
	/**************************** Добавление вкладки в узлах теплового объекта********************************/	



    $('#add_uzel').click(function(e) {
        event.preventDefault();
		
		if($('#tabLabel').val().length == 0){
			alert('Введите имя новой вкладки');
			return false
		}
			
			var new_name = "uzel-1";
			var new_name_content = "content-1";
			var last_name = "";
			var n = 1;	
			last_name = $("div#uzel_teplo>input").last().attr("id");
				
			var name_vkladka = 	$('#tabLabel').val();
				
//console.log(name_vkladka);

			

		var formData = new FormData();
		formData.append('id_reestr_object',  $('#formObjectId').val());		
		formData.append('name_vkladka', name_vkladka);
			 
			 $.ajax({
					url: '/ARM/basis/tabs/create/',
					type: "POST",
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
						//console.log(result);
					
					
					
					new_name = "uzel-"+result;
					new_name_content = "content-"+result;					
					

					$("div#uzel_teplo").append("<input type='radio' name='uzel' id='"+new_name+"' checked onclick ='myTabs.showContent("+result+")' ><label for='"+new_name+"'>" + name_vkladka +"</label>");
					
					$("div#main_content").append("<div id='"+new_name_content+"' class='uzel_content'>"+$('div[id="content-1"]').html()+"</div>");
			 
					  $('.uzel_content').css({'display': 'none'});
					  $('.uzel_razdel').css({'display': 'none'});					
					
					 $('#'+new_name_content+'.uzel_content').css({'display': 'block'});
					 $('#'+new_name_content+' .uzel_razdel').css({'display': 'block'});
						
					$('#'+new_name_content+' #numrow_pu').attr('id',$('#'+new_name_content+' #numrow_pu').attr('id')+'-'+result);
					$('#'+new_name_content+' #numrow_sar').attr('id',$('#'+new_name_content+' #numrow_sar').attr('id')+'-'+result);
					$('#'+new_name_content+' #numrow_t_so').attr('id',$('#'+new_name_content+' #numrow_t_so').attr('id')+'-'+result);
					$('#'+new_name_content+' #numrow_t_gvs').attr('id',$('#'+new_name_content+' #numrow_t_gvs').attr('id')+'-'+result);
					$('#'+new_name_content+' #numrow_t_system').attr('id',$('#'+new_name_content+' #numrow_t_system').attr('id')+'-'+result);
					
					$('#'+new_name_content+' .uzel_pu').attr('id',$('#'+new_name_content+' .uzel_pu').attr('class')+'-'+result);
					$('#'+new_name_content+' .uzel_sar').attr('id',$('#'+new_name_content+' .uzel_sar').attr('class')+'-'+result);
					$('#'+new_name_content+' .uzel_so').attr('id',$('#'+new_name_content+' .uzel_so').attr('class')+'-'+result);
					$('#'+new_name_content+' .uzel_gvs').attr('id',$('#'+new_name_content+' .uzel_gvs').attr('class')+'-'+result);
					$('#'+new_name_content+' .uzel_system').attr('id',$('#'+new_name_content+' .uzel_system').attr('class')+'-'+result);
					
					$('#'+new_name_content+' #numrow_pu'+'-'+result).attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_pu'+'-'+result).attr('id')+'")');
					$('#'+new_name_content+' #numrow_sar'+'-'+result).attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_sar'+'-'+result).attr('id')+'")');
					$('#'+new_name_content+' #numrow_t_so'+'-'+result).attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_so'+'-'+result).attr('id')+'")');
					$('#'+new_name_content+' #numrow_t_gvs'+'-'+result).attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_gvs'+'-'+result).attr('id')+'")');
					$('#'+new_name_content+' #numrow_t_system'+'-'+result).attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_system'+'-'+result).attr('id')+'")');
					
					$('#'+new_name_content+' button.shine-button-del').attr('onclick','myTabs.delTab('+result+')');
					
					$('#'+new_name_content+' table').each(function(){
						var old_id = $(this).attr('id');
						var new_id = old_id+'-'+result;
						$(this).attr('id',new_id);
						
						//$('#'+new_name_content+'#btn_pu').attr('onclick','myTabs.showContentTable("'+ $('#'+new_name_content+' #uzel_pu'+'-'+result).attr('id')+'")');
						switch(old_id){
						case 'obj_ot_personal_tp':
							$('#'+new_name_content+' .btn_pu').attr('onclick','modalWindow.openModal(\"ModalObj_ot_personal_tp\","'+new_id+'")');
						break;
						case 'obj_ot_personal_sar':
							$('#'+new_name_content+' .btn_sar').attr('onclick','modalWindow.openModal(\"ModalObj_ot_personal_sar\","'+new_id+'")');
						break;
						case 'obj_ot_teploobmennik_so':
							$('#'+new_name_content+' .btn_so').attr('onclick','modalWindow.openModal(\"ModalObj_ot_teploobmennik_so\","'+new_id+'")');
						break;
						case 'obj_ot_teploobmennik_gvs':
							$('#'+new_name_content+' .btn_gvs').attr('onclick','modalWindow.openModal(\"ModalObj_ot_teploobmennik_gvs\","'+new_id+'")');
						break;
						case 'obj_ot_prit_vent':
							$('#'+new_name_content+' .btn_system').attr('onclick','modalWindow.openModal(\"ModalObj_ot_prit_vent\","'+new_id+'")');
						break;
						default:
						break;
						}
						
					});
					
					$('#'+new_name_content+' select').each(function(){
						var old_id = $(this).attr('id');
						var new_id = old_id+'-'+result;
						$(this).attr('id',new_id);
						
						if(old_id == 't_spr_uzel_block'){
							$(this).attr('onchange','object.uzel_hide_show(this.value,'+result+'); myTabs.updStr('+result+')');
						}
						if(old_id == 't_systemheat_water'){
							$(this).attr('onchange','object.uzel_hide_show(this.value,'+result+'); myTabs.updStr('+result+')');
						}
						if(old_id == 't_systemheat_type_op'){
							$(this).attr('onchange','object.uzel_hide_show(this.value, '+result+'); myTabs.updStr('+result+')');
						}
						if(old_id == 't_systemheat_dependent'){
							$(this).attr('onchange','object.teploobmennik_os_hide_show(this.value, "uzel_so-'+result+'"); myTabs.updStr('+result+')');
						}
						if(old_id == 't_gvs_open'){
							$(this).attr('onchange','object.teploobmennik_gvs_hide_show(this.value, "uzel_gvs-'+result+'"); myTabs.updStr('+result+')');
						}
	
					});
					
					$('#'+new_name_content+' #name_uzel').attr('id',$('#'+new_name_content+' #name_uzel').attr('id')+'-'+result);
					$('#'+new_name_content+' #name_uzel'+'-'+result).attr('onchange','myTabs.updStr('+result+')');
					} 	
	
				//$('#'+new_name_content+' #numrow_t_so'+'-'+result '.so_form').html("0");
				
				});		


			 

			 $('div[id="empty_content"]').css({'display': 'none'});
			 $('input[name="tabLabel"]').val('');
			
			
			 

    });  

	  

	  
	  
	  
	  
});

var scrolled;
window.onscroll = function() {
    scrolled = window.pageYOffset || document.documentElement.scrollTop;
	const pageWidth = document.documentElement.scrollWidth;
	if(pageWidth > 1480){
		kol = 155
	} else {
		kol = 172
	}		
    if(scrolled > kol){
        $(".sticky_body").css({"border-bottom": "2px solid var(--color-1)"})
    }
    if(kol > scrolled){
        $(".sticky_body").css({"border-bottom": "2px solid var(--color-255)"})         
    }
}