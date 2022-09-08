var modalWindow = {
	openModal: function(str) {
		event.preventDefault();	
	
		strIdModal = '#'+str; // получаем название модального окна
		
		$(strIdModal).fadeIn(300);
	
		$('#'+str+'_overlay').fadeIn(300);

		return false;
		
	},
	// ф-ция корректировки данных связанных таблиц в карточке объекта
	openModalEdit: function(str, row_id) {
		event.preventDefault();	
		
		idTableRow = 'id_'+str.replace('Modal','').toLowerCase(); //формируем название атрибута id строки таблицы
		
		nameInputPrefix = str.substring(str.lastIndexOf('_')+1);  //формируем префиксы для input в модальном окне
		
		//console.log(idTableRow);
		
		$('tr['+idTableRow+'='+row_id+'] td').each(function(){
			
			field_name  = nameInputPrefix +"_"+ $(this).attr('name');
				
			// перебираем наиманование атрибутов тэга td
			$.each(this.attributes, function() {
		
				if(this.specified) {
				
					str_attr =this.name.trim();
//console.log(str_attr);				
			// если атрибут name, то ОДНОТИПНО формируем наименование input в модальном окне
			// иначе заполняем значения 
					switch(str_attr){
						
						case 'name':
							$('#'+str+' input[name='+field_name+']').val($('tr['+idTableRow+'='+row_id+'] td['+this.name+'='+this.value+']').text());
						break
						case 'klvl_volt':
						case 'klvl_type':
						case 'energy_type':
						case 'type_obj_heatnet':
						case 'heatnet_underground':
						case 'type_isolation':
						case 'device_type':
						case 'type_obj_heatnet_t':
						case 't_underground':
						case 'type_isolation_iso':
						case 'heatnet_type_isolation':
						case 'nazn_sar':
						case 't_type_isolation':
							$('select[name="'+str_attr+'"] option[value="'+this.value+'"]').prop('selected', true);
						break
						case 'add_load':
							if($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text() == 'да'){
							console.log($('#obj_oe_block td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', true);
							}else{
							console.log($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', false);
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
		$(strIdModal+' select option[value=0]').prop('selected', true);
		$('#error_otv_instr').html('');
	
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_pr_stor"]').css({'display': 'none'});
			$('div[id="otv_num_dog_stor"]').css({'display': 'none'});
			$("input[name='block_add_load']").prop('value', 0);
			$("input[name='block_add_load']").prop('checked', false);
			
			$('#id_stor_otv').val('');
			$('#stor_otv').html('');
			$('#t_type_isolation').val('');
			$('#messenger_modal').html("");
			$('#openModalGuides input').removeClass("formError");
			$('#openModalGuides select').removeClass("formError");
		
		$(strIdModal).fadeOut(300);
		//$('.modalDialog').fadeOut(300);
		$('#openModalGuidesFromSubject').fadeOut(300);
		$('#openModalGuidesFromSubject_overlay').fadeOut(300);
		$('#openModalUNPHead').attr('id','openModalUNP');
		
		$('#openModalUNP button.close').attr('onclick','modalWindow.closeModal("openModalUNP")');
		
		$('#openModalUNP #search').attr('searchdata','unp');
		$('#'+str+'_overlay').fadeOut(300);
		$('#openModalUNPHead_overlay').attr('id','openModalUNP_overlay');
		$('#search_result').html('');
		$('#search_resultSource').html('');
		$('#search').val('');
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
	}	
	
}
 $(document).ready(function(){
	 $('#unp1').click(function(){
		 $('#openModalUNP').attr('id','openModalUNPHead');
		 $('#openModalUNP_overlay').attr('id','openModalUNPHead_overlay');
		 $('#openModalUNPHead button.close').attr('onclick','modalWindow.closeModal("openModalUNPHead")');
		 
	 })
		$('#unp_resp').click(function(){
		 $('#search').attr('searchdata','ResrPersByUnp');
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
 })
 
 
 
 
 