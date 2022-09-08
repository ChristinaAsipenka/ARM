var modalWindowGuides = {
	// ф-ция корректировки данных связанных таблиц в карточке объекта
	openModalEdit: function(str, row_id) {
		event.preventDefault();	
		
			
		$("#openModalGuides input").val('');
		$("#openModalGuides select").val('')


	
		idTableRow = 'item-'+row_id; //формируем название атрибута id строки таблицы
		
		//nameInputPrefix = str.substring(str.lastIndexOf('_')+1);  //формируем префиксы для input в модальном окне
	

		//console.log($('tr[class='+idTableRow+']').html());	
		
		$('tr[class='+idTableRow+'] td').each(function(){
			
			field_name  = $(this).attr('name');
			//console.log(field_name);
			// перебираем наиманование атрибутов тэга td
			$.each(this.attributes, function() {
		
				if(this.specified) {
				
					str_attr =this.name.trim();
			// если атрибут name, то ОДНОТИПНО формируем наименование input в модальном окне
			// иначе заполняем значения 
					console.log(str_attr);
					
					switch(str_attr){
						case 'name':
							$('input[name='+field_name+']').val($('tr[class='+idTableRow+'] td['+this.name+'='+this.value+']').text().trim());
						break
						case 'regionnamefact':
							$('select[name="regionNameSpr"] option[value="'+this.value+'"]').prop('selected', true);
							$('select[name="districtNameFact"] option').show();
							$('select[name="districtNameFact"] option').not("[cod_region="+this.value+"]").hide();						
						break
						case 'districtnamefact':
							$('select[name="districtNameSpr"] option[value="'+this.value+'"]').prop('selected', true);
						break						
						case 'type_department':
							$('select[name="type_by_department"] option[value="'+this.value+'"]').prop('selected', true);
						break						
						case 'type_reg_admin':
							$('select[name="region_by_admin"] option[value="'+this.value+'"]').prop('selected', true);
						break
						case 'type_branch_podrazdelenie':
							$('select[name="podrazdelenie_branch"] option[value="'+this.value+'"]').prop('selected', true);
						break
						
						
						case 'type_branch_otdel':
							$('select[name="branchNameObject"] option[value="'+this.value+'"]').prop('selected', true);
							$('select[name="podrazdelenieNameObject"] option').show();
							$('select[name="podrazdelenieNameObject"] option').not("[cod_branch="+this.value+"]").hide();
						break
						case 'type_podrazd_otdel':
							$('select[name="podrazdelenieNameObject"] option[value="'+this.value+'"]').prop('selected', true);
						break
						
						case 'region_city_zone':
							var region = this.value;
									var formData = new FormData();
									formData.append('idRegion', region);	

									$.ajax({
										url: '/ARM/basis/address/selectdistrict/',
										type: 'POST',
										data: formData,
										cache: false,
										processData: false,
										contentType: false,
										beforeSend: function(){

										},
										success: function(result){
										  $('select#formDistrictFact').html(result);
										}
									});								

										$('select[name="regionNameFact"] option[value="'+this.value+'"]').prop('selected', true);
						break
						case 'district_city_zone':
													
							var district = this.value;											
									
									var formData = new FormData();
									formData.append('idDistrict', district);	

									 $.ajax({
										url: '/ARM/basis/address/selectcity/',
										type: 'POST',
										data: formData,
										cache: false,
										processData: false,
										contentType: false,
										beforeSend: function(){
										},
										success: function(result){
										  $('select#formCityFact').html(result);
										  $('select#formDistrictFact option[value='+district+']').prop('selected', true);
										  var city = $('tr[class='+idTableRow+'] td[name=city_by_city_zone]').attr('city_city_zone');							

										$('select#formCityFact option[value='+city+']').prop('selected', true);
										}
									});								
						
						break
						case 'city_city_zone':

						break
						
						
						
						case 'type_reg_district':
							$('select[name="region_by_district"] option[value="'+this.value+'"]').prop('selected', true);
						break



						/*case 'key_region':
							if($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text() == 'да'){
							//console.log($('#obj_oe_block td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', true);
								$('input[name="block_add_load"]').val(1);
							}else{
							//console.log($('#obj_oe_block tr[id_obj_oe_block='+row_id+'] td[add_load="add_load"]').text());
								$('input[name="block_add_load"]').prop('checked', false);
								$('input[name="block_add_load"]').val(0);
							}*/
						
						
						
						case 'key_region':
						
							if($('tr[class='+idTableRow+'] td[name="is_region"]').attr('key_region') == 1){
								$('input[name="is_region"]').prop('checked', true);
								$('input[name="is_region"]').val(1);
							}else{
								$('input[name="is_region"]').prop('checked', false);
								$('input[name="is_region"]').val(0);
							}
						break
						case 'key_district':
							if($('tr[class='+idTableRow+'] td[name="is_district"]').attr('key_district') == 1){
								$('input[name="is_district"]').prop('checked', true);
								$('input[name="is_district"]').val(1);
							}else{
								$('input[name="is_district"]').prop('checked', false);
								$('input[name="is_district"]').val(0);
							}
						break
						case 'key_admin':
							if($('tr[class='+idTableRow+'] td[name="is_admin"]').attr('key_admin') == 1){
								$('input[name="is_admin"]').prop('checked', true);
								$('input[name="is_admin"]').val(1);
							}else{
								$('input[name="is_admin"]').prop('checked', false);
								$('input[name="is_admin"]').val(0);
							}
						break
						
						default:
							//console.log(this.name, this.value);
						break
					};

				}
			});
			
			
 
			$('input#hidElem').val(row_id); //id корректируемой строки таблицы
			/*$('#'+str+' .p_og_flue').text('Редактирование записи');*/
			$('#'+str+' .add_btn').text('Сохранить'); // просто меняем название кнопки 
	
		});
	
		$('#'+str).fadeIn(300); 
		
		$('#openModalGuides_overlay').fadeIn(300);
		var city = $('tr[class='+idTableRow+'] td[name=city_by_city_zone]').attr('city_city_zone');	
			
			$('select#formCityFact option[value='+city+']').prop('selected', true);
		return false;
		
	},
	closeModal: function(str) 
	{
		strIdModal = '#'+str;
		
		$(strIdModal).fadeOut(300);
		$('#openModalGuidesFromSubject').fadeOut(300);
		
		$('#'+str+'_overlay').fadeOut(300);
		$('#openModalGuidesFromSubject_overlay').fadeOut(300);
		
		$('#messenger_modal').html("");
		$('#openModalGuides input').removeClass("formError");
		$('#openModalGuides select').removeClass("formError");
		$('#openModalGuides input').val('');
		$('#openModalGuides input[name="guides_place"]').val(2);
		$('#openModalGuides select option[value=0]').prop('selected', true);
		/*$('#'+str+' .p_og_flue').text('Новая запись');*/
		$('#'+str+' .add_btn').text('Добавить'); // просто меняем название кнопки
		return false;

		
	}
	
}
 