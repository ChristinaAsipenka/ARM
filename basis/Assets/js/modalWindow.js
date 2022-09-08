var modalWindow = {
	openModal: function(str, id_table) {
		event.preventDefault();	
		
		strIdModal = '#'+str; // получаем название модального окна
		
		if (id_table == undefined){
			id_table = false;
		}else{
			var table_id = id_table;
			
			$(strIdModal+' form').append('<input type="hidden" name="id_table" value="'+table_id+'">');
			
		}		
		
		/*$('#'+str+' .p_og_flue').text('Новая запись');*/
		$('#'+str+' .add_btn').text('Добавить'); // просто меняем название кнопки
		
		$(strIdModal).fadeIn(300);
	
		$('#'+str+'_overlay').fadeIn(300);

		return false;
		
	},
	
	
	// ф-ция корректировки данных связанных таблиц в карточке объекта
	openModalEdit: function(str, row_id, id_table) {
		event.preventDefault();
		
		if (id_table == undefined){
			id_table = false;
		}
		tableName = str.replace('Modal','');
		strIdModal = '#'+str;
		$(strIdModal+' form').append('<input type="hidden" name="id_table" value="'+id_table+'">');
		//console.log(id_table);
		/*if(tableName == 'Obj_ot_personal_tp'){
			tableName = tableName+'-'+()
		}*/
		
		idTableRow = 'id_'+str.replace('Modal','').toLowerCase(); //формируем название атрибута id строки таблицы
		
		nameInputPrefix = str.substring(str.lastIndexOf('_')+1);  //формируем префиксы для input в модальном окне
		

		
		$('tr['+idTableRow+'='+row_id+'] td').each(function(){
			
			field_name  = nameInputPrefix +"_"+ $(this).attr('name');
				
			// перебираем наиманование атрибутов тэга td
			$.each(this.attributes, function() {
		
				if(this.specified) {
				
					str_attr =this.name.trim();


//console.log(field_name);				
			// если атрибут name, то ОДНОТИПНО формируем наименование input в модальном окне
			// иначе заполняем значения 
			// имя селекта должно совпадать с параметром у td
					switch(str_attr){
						
						case 'name':
							if($('#'+str+' input[name='+field_name+']').attr('type')=='date'){
							
								var my_date = ($('tr['+idTableRow+'='+row_id+'] td['+this.name+'='+this.value+']').text()).replace(/(\d{2})\.(\d{2})\.(\d{4})/, "$3-$2-$1");
								//console.log(my_date);
								$('#'+str+' input[name='+field_name+']').val(my_date);
							}else{
								$('#'+str+' input[name='+field_name+']').val($('tr['+idTableRow+'='+row_id+'] td['+this.name+'='+this.value+']').text());
							}
								
						break
						case 'klvl_volt':
						case 'klvl_type':
						case 'energy_type':
						case 'type_obj_heatnet':
						case 'heatnet_underground':
						case 't_heatnet_underground':
						case 'device_type':
						case 'type_obj_heatnet_t':
						case 't_underground':
						case 'type_isolation_iso':
						case 'heatnet_type_isolation':
						case 't_heatnet_type_isolation':
						case 'type_osn_fuel':
						case 'type_rezerv_fuel':
						case 'vapor_type_osn_fuel':
						case 'vapor_type_rezerv_fuel':
						case 'obsl_type':
						case 'accidents_type':
						case 'klvl_cat':
						case 'trp_cat':
						case 'aie_cat':
						case 'ek_rezim':
						case 'gvs':
						case 'tepl_kot':
						case 'so':
						case 'heatnet_diameter':
						case 't_heatnet_diameter':
							$('select[name="'+str_attr+'"] option[value="'+this.value+'"]').prop('selected', true);
						break
						case 't_type_isolation':
							$('select[name="'+str_attr+'"] option[value="'+this.value+'"]').prop('selected', true);
							if($('#obj_ot_heatnet tr[id_obj_ot_heatnet='+row_id+'] td[type_isolation]').attr('type_isolation') == 4){
								$('div[id="ts_type_tube"]').css({'display': 'block'});
							}else{
								$('div[id="ts_type_tube"]').css({'display': 'none'});
							}						
						case 'teplo_type_isolation':
							$('select[name="'+str_attr+'"] option[value="'+this.value+'"]').prop('selected', true);
							if($('#obj_ot_heatnet_t tr[id_obj_ot_heatnet_t='+row_id+'] td[teplo_type_isolation]').attr('teplo_type_isolation') == 4){
								$('div[id="tst_type_tube"]').css({'display': 'block'});
							}else{
								$('div[id="tst_type_tube"]').css({'display': 'none'});
							}						
						case 'add_load':
							if($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text() == 'да'){
							//console.log($('#obj_oe_block td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', true);
								$('input[name="block_add_load"]').val(1);
							}else{
							//console.log($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', false);
								$('input[name="block_add_load"]').val(0);
							}
						case 'is_ak':
							if($('#obj_oe_ek tr[id_obj_oe_ek='+row_id+'] td[is_ak="is_ak"]').text() == 'да'){
								$('input[name="block_is_ak"]').prop('checked', true);
								$('input[name="block_is_ak"]').val(1);
							}else{
								$('input[name="block_is_ak"]').prop('checked', false);
								$('input[name="block_is_ak"]').val(0);
							}	
						case 'is_avt':
							if($('#obj_oe_ek tr[id_obj_oe_ek='+row_id+'] td[is_avt="is_avt"]').text() == 'да'){
								$('input[name="block_is_avt"]').prop('checked', true);
								$('input[name="block_is_avt"]').val(1);
							}else{
								$('input[name="block_is_avt"]').prop('checked', false);
								$('input[name="block_is_avt"]').val(0);
							}
						case 'is_pu':
							if($('#obj_oe_ek tr[id_obj_oe_ek='+row_id+'] td[is_pu="is_pu"]').text() == 'да'){
								$('input[name="block_is_pu"]').prop('checked', true);
								$('input[name="block_is_pu"]').val(1);
							}else{
								$('input[name="block_is_pu"]').prop('checked', false);
								$('input[name="block_is_pu"]').val(0);
							}							
						case 'nazn_sar_ot':
							if($('#'+id_table+' tr[id_obj_ot_personal_sar='+row_id+'] td[nazn_sar_ot="nazn_sar_ot"]').text() == 'да'){
								$('input[name="block_nazn_sar_ot"]').prop('checked', true);
								$('input[name="block_nazn_sar_ot"]').val(1);
							}else{
								$('input[name="block_nazn_sar_ot"]').prop('checked', false);
								$('input[name="block_nazn_sar_ot"]').val(0);
							}	
						case 'nazn_sar_gvs':
							if($('#'+id_table+' tr[id_obj_ot_personal_sar='+row_id+'] td[nazn_sar_gvs="nazn_sar_gvs"]').text() == 'да'){
								$('input[name="block_nazn_sar_gvs"]').prop('checked', true);
								$('input[name="block_nazn_sar_gvs"]').val(1);
							}else{
								$('input[name="block_nazn_sar_gvs"]').prop('checked', false);
								$('input[name="block_nazn_sar_gvs"]').val(0);
							}
						case 'nazn_sar_tn':
							if($('#'+id_table+' tr[id_obj_ot_personal_sar='+row_id+'] td[nazn_sar_tn="nazn_sar_tn"]').text() == 'да'){
								$('input[name="block_nazn_sar_tn"]').prop('checked', true);
								$('input[name="block_nazn_sar_tn"]').val(1);
							}else{
								$('input[name="block_nazn_sar_tn"]').prop('checked', false);
								$('input[name="block_nazn_sar_tn"]').val(0);
							}
						case 'nazn_sar_vent':
							if($('#'+id_table+' tr[id_obj_ot_personal_sar='+row_id+'] td[nazn_sar_vent="nazn_sar_vent"]').text() == 'да'){
								$('input[name="block_nazn_sar_vent"]').prop('checked', true);
								$('input[name="block_nazn_sar_vent"]').val(1);
							}else{
								$('input[name="block_nazn_sar_vent"]').prop('checked', false);
								$('input[name="block_nazn_sar_vent"]').val(0);
							}	
						case 'nazn_tp_ot':
							if($('#'+id_table+' tr[id_obj_ot_personal_tp='+row_id+'] td[nazn_tp_ot="nazn_tp_ot"]').text() == 'да'){
								$('input[name="block_nazn_tp_ot"]').prop('checked', true);
								$('input[name="block_nazn_tp_ot"]').val(1);
							}else{
								$('input[name="block_nazn_tp_ot"]').prop('checked', false);
								$('input[name="block_nazn_tp_ot"]').val(0);
							}	
						case 'nazn_tp_gvs':
							if($('#'+id_table+' tr[id_obj_ot_personal_tp='+row_id+'] td[nazn_tp_gvs="nazn_tp_gvs"]').text() == 'да'){
								$('input[name="block_nazn_tp_gvs"]').prop('checked', true);
								$('input[name="block_nazn_tp_gvs"]').val(1);
							}else{
								$('input[name="block_nazn_tp_gvs"]').prop('checked', false);
								$('input[name="block_nazn_tp_gvs"]').val(0);
							}
						case 'nazn_tp_tn':
							if($('#'+id_table+' tr[id_obj_ot_personal_tp='+row_id+'] td[nazn_tp_tn="nazn_tp_tn"]').text() == 'да'){
								$('input[name="block_nazn_tp_tn"]').prop('checked', true);
								$('input[name="block_nazn_tp_tn"]').val(1);
							}else{
								$('input[name="block_nazn_tp_tn"]').prop('checked', false);
								$('input[name="block_nazn_tp_tn"]').val(0);
							}
						case 'nazn_tp_vent':
							if($('#'+id_table+' tr[id_obj_ot_personal_tp='+row_id+'] td[nazn_tp_vent="nazn_tp_vent"]').text() == 'да'){
								$('input[name="block_nazn_tp_vent"]').prop('checked', true);
								$('input[name="block_nazn_tp_vent"]').val(1);
							}else{
								$('input[name="block_nazn_tp_vent"]').prop('checked', false);
								$('input[name="block_nazn_tp_vent"]').val(0);
							}	
						break	
						default:
							console.log(this.name, this.value);
						break
					};

				}
			});
			$('input[name='+idTableRow+']').val(row_id); //id корректируемой строки таблицы
			$('#'+str+' .add_btn').text('Сохранить'); // просто меняем название кнопки 
	
		});
	
		$('#'+str).fadeIn(300); 
		
		$('#'+str+'_overlay').fadeIn(300);
		
		return false;
		
	},
	closeModal: function(str) 
	{
		event.preventDefault();	
		strIdModal = '#'+str;
		
		/*$(strIdModal+' input').val('');*/
		if(strIdModal != '#openNewInspector'){
			$(strIdModal+' select option[value=0]').prop('selected', true);
		}
		$('#error_otv_instr').html('');
	
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="ts_type_tube"]').css({'display': 'none'});
			$('div[id="tst_type_tube"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_pr_stor"]').css({'display': 'none'});
			$('div[id="otv_num_dog_stor"]').css({'display': 'none'});
			$("input[name='block_add_load']").prop('value', 0);
			$("input[name='block_add_load']").prop('checked', false);
			$("input[name='block_is_avt']").prop('value', 0);
			$("input[name='block_is_avt']").prop('checked', false);	
			$("input[name='block_is_pu']").prop('value', 0);
			$("input[name='block_is_pu']").prop('checked', false);			
			$("input[name='block_is_ak']").prop('value', 0);
			$("input[name='block_is_ak']").prop('checked', false);
			
			$('#id_stor_otv').val('');
			$('#stor_otv').html('');
			$('#t_type_isolation').val('');
			$('#obsl_date').val('');
			$('#accidents_date').val('');
			$('#accidents_character').val('');
			$('#device_counts').val('');
			
			$('#sar_sar').val('');
			$('#sar_count_sar').val('');
			$('#block_nazn_sar_ot').val(0);$("input[name='block_nazn_sar_ot']").prop('checked', false);
			$('#block_nazn_sar_gvs').val(0);$("input[name='block_nazn_sar_gvs']").prop('checked', false);
			$('#block_nazn_sar_tn').val(0);$("input[name='block_nazn_sar_tn']").prop('checked', false);
			$('#block_nazn_sar_vent').val(0);$("input[name='block_nazn_sar_vent']").prop('checked', false);
			
			$('#tp_device_place').val('');
			$('#tp_device').val('');
			$('#block_nazn_tp_ot').val(0);$("input[name='block_nazn_tp_ot']").prop('checked', false);
			$('#block_nazn_tp_gvs').val(0);$("input[name='block_nazn_tp_gvs']").prop('checked', false);
			$('#block_nazn_tp_tn').val(0);$("input[name='block_nazn_tp_tn']").prop('checked', false);
			$('#block_nazn_tp_vent').val(0);$("input[name='block_nazn_tp_vent']").prop('checked', false);			
			
			$('#is_region').val(0);$("input[name='is_region']").prop('checked', false);
			$('#is_district').val(0);$("input[name='is_district']").prop('checked', false);
			$('#is_admin').val(0);$("input[name='is_admin']").prop('checked', false);
		
			
			
			$('#messenger_modal').html("");
			$('#messenger_modal_tp').html("");
			$('#messenger_modal_sar').html("");
			$('#messenger_modal_accidents').html("");
			$('#messenger_modal_obsl').html("");
			$('#messenger_modal_device').html("");
			$('#messenger_modal_water').html("");
			$('#messenger_modal_vapor').html("");
			$('#messenger_modal_klvl').html("");
			$('#messenger_modal_trp').html("");
			$('#messenger_modal_avr').html("");
			$('#messenger_modal_aie').html("");
			$('#messenger_modal_block').html("");
			$('#messenger_modal_vvd').html("");
			$('#messenger_modal_ek').html("");
			$('#messenger_modal_ku').html("");
			$('#messenger_modal_heatnet').html("");
			$('#messenger_modal_heatnet_t').html("");
			$('#messenger_modal_prit_vent').html("");
			$('#messenger_modal_teploobmennik_so').html("");
			$('#messenger_modal_teploobmennik_gvs').html("");
			$('#messenger_modal_heatnet').html("");
			$('#messenger_modal_heatnet_t').html("");
			$('#messenger_modal_teploobmennik_kot').html("");
			$('#messenger_modal_subj_dog').html("");
			$('#messenger_modal_otv_sob').html("");
			$('#messenger_modal_otv_st').html("");
			$('#messenger_modal_otv_instr').html("");
			$('#messenger_modal_otv_sob_t').html("");
			$('#messenger_modal_otv_st_t').html("");
			$('#messenger_modal_otv_instr_t').html("");			
			
			$('#ModalObj_ot_personal_tp input').removeClass("formError");
			$('#ModalObj_ot_personal_tp label').removeClass("formError2");
			$('#ModalObj_ot_personal_sar input').removeClass("formError");
			$('#ModalObj_ot_personal_sar label').removeClass("formError2");
			$('#ModalObj_og_device input').removeClass("formError");
			$('#ModalObj_og_obsl input').removeClass("formError");
			$('#ModalObj_og_accidents input').removeClass("formError");
			$('#ModalOtv_eh_sob input').removeClass("formError");
			$('#ModalOtv_eh_sob select').removeClass("formError");
			$('#ModalOtv_eh_st input').removeClass("formError");
			$('#ModalOtv_eh_st select').removeClass("formError");
			$('#ModalOtv_eh_instr input').removeClass("formError");
			
			$('#ModalOtv_th_sob input').removeClass("formError");
			$('#ModalOtv_th_sob select').removeClass("formError");
			$('#ModalOtv_th_st input').removeClass("formError");
			$('#ModalOtv_th_st select').removeClass("formError");
			$('#ModalOtv_th_instr input').removeClass("formError");			
			
			$('#openModalGuides input').removeClass("formError");
			$('#openModalGuides select').removeClass("formError");
			
			$('#ModalObj_og_accidents select').removeClass("formError");
			$('#ModalObj_og_obsl select').removeClass("formError");
			$('#ModalObj_og_device select').removeClass("formError");
			
			$('#ModalBoiler_water input').removeClass("formError");
			$('#ModalBoiler_water select').removeClass("formError");
			
			$('#ModalBoiler_vapor input').removeClass("formError");
			$('#ModalBoiler_vapor select').removeClass("formError");
			
			$('#ModalObj_oe_klvl input').removeClass("formError");
			$('#ModalObj_oe_klvl select').removeClass("formError");		

			$('#ModalObj_oe_trp input').removeClass("formError");
			$('#ModalObj_oe_trp select').removeClass("formError");

			$('#ModalObj_oe_avr input').removeClass("formError");
			$('#ModalObj_oe_avr select').removeClass("formError");

			$('#ModalObj_oe_aie input').removeClass("formError");
			$('#ModalObj_oe_aie select').removeClass("formError");	

			$('#ModalObj_oe_block input').removeClass("formError");
			$('#ModalObj_oe_block select').removeClass("formError");	

			$('#ModalObj_oe_vvd input').removeClass("formError");
			$('#ModalObj_oe_vvd select').removeClass("formError");	

			$('#ModalObj_oe_ek input').removeClass("formError");
			$('#ModalObj_oe_ek select').removeClass("formError");

			$('#ModalObj_oe_ku input').removeClass("formError");
			$('#ModalObj_oe_ku select').removeClass("formError");

			$('#ModalObj_ot_heatnet input').removeClass("formError");
			$('#ModalObj_ot_heatnet select').removeClass("formError");

			$('#ModalObj_ot_heatnet_t input').removeClass("formError");
			$('#ModalObj_ot_heatnet_t select').removeClass("formError");	

			$('#ModalObj_ot_prit_vent input').removeClass("formError");
			$('#ModalObj_ot_prit_vent select').removeClass("formError");			

			$('#ModalObj_ot_teploobmennik_so input').removeClass("formError");
			$('#ModalObj_ot_teploobmennik_so select').removeClass("formError");
			
			$('#ModalObj_ot_teploobmennik_gvs input').removeClass("formError");
			$('#ModalObj_ot_teploobmennik_gvs select').removeClass("formError");
			
			$('#ModalObj_ot_tepl_kot input').removeClass("formError");
			$('#ModalObj_ot_tepl_kot select').removeClass("formError");
			
			$('#ModalObj_ot_heatnet input').removeClass("formError");
			$('#ModalObj_ot_heatnet select').removeClass("formError");
			
			$('#ModalObj_ot_heatnet_t input').removeClass("formError");
			$('#ModalObj_ot_heatnet_t select').removeClass("formError");			
			
			$('#ModalSubj_dog input').removeClass("formError");
			$('#ModalSubj_dog input').val('');
			
			
			$('#openModalGuides input').val('');
			$('#openModalGuides select').val(0);
			
			$('#ModalBoiler_water input').val('');
			$('#ModalBoiler_vapor input').val('');
			$('#ModalObj_oe_klvl input').val('');
			$('#ModalObj_oe_trp input').val('');
			$('#ModalObj_oe_aie input').val('');
			$('#ModalObj_oe_vvd input').val('');
			$('#ModalObj_oe_block input').val('');
			$('#ModalObj_oe_avr input').val('');
			$('#ModalObj_oe_ek input').val('');
			$('#ModalObj_oe_ku input').val('');
			$('#ModalObj_ot_heatnet input').val('');
			$('#ModalObj_ot_heatnet_t input').val('');
			$('#ModalObj_ot_prit_vent input').val('');
			$('#ModalObj_ot_teploobmennik_gvs input').val('');
			$('#ModalObj_ot_tepl_kot input').val('');
			$('#ModalObj_ot_teploobmennik_so input').val('');
			$('#ModalObj_ot_personal_tp input').val('');
			$('#ModalObj_ot_personal_sar input').val('');
			$('#ModalObj_ot_personal_tp input[name=id_table]').remove();
			$('#ModalObj_ot_personal_sar input[name=id_table]').remove();
			$('#ModalObj_ot_teploobmennik_so input[name=id_table]').remove();
			$('#ModalObj_ot_teploobmennik_gvs input[name=id_table]').remove();
			$('#ModalObj_ot_prit_vent input[name=id_table]').remove();
		
		$(strIdModal).fadeOut(300);
		//$('.modalDialog').fadeOut(300);
		$('#openModalGuidesFromSubject').fadeOut(300);
		$('#openModalGuidesFromSubject_overlay').fadeOut(300);
		$('#openModalUNPHead').attr('id','openModalUNP');
		
		$('#openModalUNP button.close').attr('onclick','modalWindow.closeModal("openModalUNP")');
		
		$('#openModalUNP #search').attr('searchdata','unp');
		$('#'+str+'_overlay').fadeOut(300);
		$('#openModalUNPHead_overlay').attr('id','openModalUNP_overlay');
		
		//*** неверно... надо уточнить... очищает результат поиска за главных страницах
		/*$('#search_result').html('');
		$('#search_resultSource').html('');
		$('#search').val('');*/
		
		if(str == 'ModalObj_ot_personal_tp' || str == 'ModalObj_ot_personal_sar' || str == 'ModalObj_ot_teploobmennik_gvs' || str == 'ModalObj_ot_prit_vent' || str == 'ModalObj_ot_teploobmennik_so'){
			$(strIdModal).remove('input[name=id_table]');
		}
		
		
		return false;

		
	},
	checkSpr_og_flue: function(id) {
		
		$('#og_flue_id').val(id);	
		$('#og_flue').val($("tr[og_flue='og_flue-"+id+"']").find('td').html().trim());
		$('#openModalSpr_og_flue').fadeOut(300);
		$('#openModalSpr_og_flue_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_flue_mater: function(id) {
		
	
		$('#flue_mater_id').val(id);	
		$('#flue_mater').val($("tr[flue_mater='flue_mater-"+id+"']").find('td').html().trim());
		$('#openModalSpr_flue_mater').fadeOut(300);
		$('#openModalSpr_flue_mater_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_type_gaz: function(id) {
		
		$('#type_gaz_id').val(id);	
		$('#type_gaz').val($("tr[type_gaz='type_gaz-"+id+"']").find('td').html().trim());
		$('#openModalSpr_type_gaz').fadeOut(300);
		$('#openModalSpr_type_gaz_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_og_vid: function(id) {
		
		$('#go_id').val(id);	
		$('#go').val($("tr[og_vid='og_vid-"+id+"']").find('td').html().trim());
		$('#openModalSpr_go_vid').fadeOut(300);
		$('#openModalSpr_go_vid_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_oti_boiler_type: function(id) {
		
		$('#oti_boiler_id').val(id);	
		$('#oti_boiler').val($("tr[oti_boiler='oti_boiler-"+id+"']").find('td').html().trim());
		$('#openModalSpr_oti_boiler_type').fadeOut(300);
		$('#openModalSpr_oti_boiler_type_overlay').fadeOut(300);
		return false;		
	},



	checkSpr_ot_systemheat_layout: function(id) {
		
		$('#t_systemheat_layout_id').val(id);	
		$('#t_systemheat_layout').val($("tr[ot_type_razvodka='ot_type_razvodka-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_systemheat_layout').fadeOut(300);
		$('#openModalSpr_ot_systemheat_layout_overlay').fadeOut(300);
		return false;		
	},

	checkSpr_ot_type_ot_pribor: function(id) {
		
		$('#t_systemheat_type_op_id').val(id);	
		$('#t_systemheat_type_op').val($("tr[ot_type_ot_pribor='ot_type_ot_pribor-"+id+"']").find('td').html().trim());
		$('#openModalSpr_t_systemheat_type_op').fadeOut(300);
		$('#openModalSpr_t_systemheat_type_op_overlay').fadeOut(300);
		return false;		
	},

	
	checkSpr_oti_type_fuel: function(id) {	
		
		$('#oti_type_fuel_id').val(id);	
		$('#oti_type_fuel').val($("tr[oti_type_fuel='oti_type_fuel-"+id+"']").find('td').html().trim());
		$('#openModalSpr_oti_type_fuel').fadeOut(300);
		$('#openModalSpr_oti_type_fuel_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_oti_type_fuel_rezerv: function(id) {	
		
		$('#oti_type_fuel_rezerv_id').val(id);	
		$('#oti_type_fuel_rezerv').val($("tr[oti_type_fuel_rezerv='oti_type_fuel_rezerv-"+id+"']").find('td').html().trim());
		$('#openModalSpr_oti_type_fuel_rezerv').fadeOut(300);
		$('#openModalSpr_oti_type_fuel_rezerv_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_ot_systemheat_water: function(id) {	
		
		$('#t_systemheat_water_id').val(id);	
		$('#t_systemheat_water').val($("tr[systemheat_water='systemheat_water-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_systemheat_water').fadeOut(300);
		$('#openModalSpr_ot_systemheat_water_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_ot_systemheat_dependent: function(id) {	
		
		$('#t_systemheat_dependent_id').val(id);	
		$('#t_systemheat_dependent').val($("tr[systemheat_dependent='systemheat_dependent-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_systemheat_dependent').fadeOut(300);
		$('#openModalSpr_ot_systemheat_dependent_overlay').fadeOut(300);
		
		
		if($("#t_systemheat_dependent_id").val() == 2){
			$('div[id="sp"]').css({'display': 'block'});
		}else{
			$('div[id="sp"]').css({'display': 'none'});
			$("input[name='t_spr_ot_type_to_id']").val('');
			$("input[name='t_spr_ot_type_to']").val('');
			$("input[name='t_systemheat_mark_to']").val('');
		}
		return false;		
	},
	checkSpr_og_device_type: function(id) {	
		
		$('#type_device_id').val(id);	
		$('#type_device').val($("tr[device_type='device_type-"+id+"']").find('td').html().trim());
		$('#openModalSpr_og_device_type').fadeOut(300);
		/*$('#overlay').fadeOut(300);*/
		return false;		
	},
	checkSpr_ot_heatnet_type_iso: function(id) {	
		
		$('#type_isolation_id').val(id);	
		$('#type_isolation').val($("tr[ot_heatnet_type_iso='ot_heatnet_type_iso-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_heatnet_type_iso').fadeOut(300);
		/*$('#overlay').fadeOut(300);*/
		return false;		
	},
	checkSpr_ot_functions: function(id) {	
		
		$('#t_spr_ot_functions_id').val(id);	
		$('#t_spr_ot_functions').val($("tr[ot_functions='ot_functions-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_functions').fadeOut(300);
		$('#openModalSpr_ot_functions_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_ot_cat: function(id) {	
		
		$('#t_spr_ot_cat_id').val(id);	
		$('#t_spr_ot_cat').val($("tr[ot_cat='ot_cat-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_cat').fadeOut(300);
		$('#openModalSpr_ot_cat_overlay').fadeOut(300);
		return false;		
	},
	
	checkSpr_ot_type_to: function(id) {	
		
		$('#t_spr_ot_type_to_id').val(id);	
		$('#t_spr_ot_type_to').val($("tr[ot_type_to='ot_type_to-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_type_to').fadeOut(300);
		$('#openModalSpr_ot_type_to_overlay').fadeOut(300);
		return false;		
	},
	checkSpr_ot_gvs_open: function(id) {	
		
		$('#t_gvs_open_id').val(id);	
		$('#t_gvs_open').val($("tr[ot_gvs_open='ot_gvs_open-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_gvs_open').fadeOut(300);
		$('#openModalSpr_ot_gvs_open_overlay').fadeOut(300);
		
		
		if($("#t_gvs_open_id").val() == 2){
			$('div[id="ot"]').css({'display': 'block'});
		}else{
			$('div[id="ot"]').css({'display': 'none'});
			$("input[name='t_gvs_place']").val('');
			$("input[name='t_gvs_connect']").val('');
			$("input[name='t_gvs_type']").val('');
			$("input[name='t_gvs_mark']").val('');
			$("input[name='t_gvs_in_id']").val('');
			$("input[name='t_gvs_in']").val('');
		}
		
		
		return false;		
	},
	checkSpr_ot_gvs_in: function(id) {	
		
		$('#t_gvs_in_id').val(id);	
		$('#t_gvs_in').val($("tr[ot_gvs_in='ot_gvs_in-"+id+"']").find('td').html().trim());
		$('#openModalSpr_ot_gvs_in').fadeOut(300);
		$('#openModalSpr_ot_gvs_in_overlay').fadeOut(300);
		return false;		
	},
	// передаем id объекта для перемещения
	setId_obj: function(id){
		$('#openNewSubject').attr('id_obj',id);
	},
	
	setId_sbj: function(id){
		$('#openNewSubject').attr('id_sbj',id);
	},
	
	findObjs: function(id_sbj){
		//console.log(id_sbj);
			
		var id_insp = $("#fs_fio").val();
		if(id_insp > 0){
				//var insp = $("#fs_fio").val();
				var formData = new FormData();

				formData.append('id_reestr_subject', id_sbj);
				formData.append('id_insp', id_insp);
				
				$.ajax({
					url: '/ARM/basis/objects/getObjsForTransfer/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){		
				
					 // console.log(result);
					  $('#obj_list').html(result);
					 // $('input[name=arm_gruppa]').val($('#fs_fio option:selected').attr('arm_gruppa'));

					}
				
			});
		}else{
			$('#obj_list').html("не выбран инспектор");
			$('#fm_otdel').prop('disabled', true);
			$('#fm_fio').prop('disabled', true);
			$('#btn_transfer').prop('disabled', true);
			
			
		}
	
	}

};	
 $(document).ready(function(){
	 $('#unp1').click(function(){
		 $('#openModalUNP').attr('id','openModalUNPHead');
		 $('#openModalUNP_overlay').attr('id','openModalUNPHead_overlay');
		 $('#openModalUNPHead button.close').attr('onclick','modalWindow.closeModal("openModalUNPHead")');
		 
	 })
		$('#unp_resp').click(function(){
		 $('#search').attr('searchdata','ResrPersByUnp');
	 })
	 $('#unp_resp_t').click(function(){
		 $('#search').attr('searchdata','ResrPersByUnp');
	 })
	 $('#unp_resp_g').click(function(){
		 $('#openModalUNP #search').attr('searchdata','ResrPersByUnp');
	 })
	 $('#sbobj').click(function(){
		 // параметр для разделения поиска для субабонентов (1) и теплоисточников (0)
		 $('#openModalSubject #search').attr('sbobj',1);// меняется на 0 в object.js для разделения поиска для субабонентов и теплоисточников
	 })
	 $('#e').click(function(){
		 $('#otv_add').attr('onclick','resp_pers.insert_otv(1)');
		 $('#flag_insp').val(1);
	 })
	 $('#t').click(function(){
		 $('#otv_add').attr('onclick','resp_pers.insert_otv(2)');
		  $('#flag_insp').val(2);
		  $('#type_otv option[value=3]').hide();
	 })
	 $('#g').click(function(){ 
		 $('#otv_add').attr('onclick','resp_pers.insert_otv(3)');
		  $('#flag_insp').val(3);
		  $('#type_otv option[value=3]').hide();
	 })
	 
	 $('#openNewInspector .close').click(function(){
		 
		$('#fm_otdel').prop('disabled', false);
		$('#fm_fio').prop('disabled', false);
		$('#btn_transfer').prop('disabled', false);
		 
	 })
 })
 
 
 
 
 