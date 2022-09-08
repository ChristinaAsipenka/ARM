$(document).ready(function(){
	
	$('.clear_field').click(function(){
		
			$("#formUNP").val('');
			$('.clear_field').fadeOut();
			$('#pre-result').fadeOut();
		
	});
	
	$('#checkUNPinBASIS').click(function(){
		event.preventDefault();
		if($("#formUnpId").val() < 0){
			$("#formIndex, #formRegion, #formDistrict, #spr_type_city, #formCity, #formCityZone, #spr_type_street, #formStreet, #formBuilding, #formFlat, #formLiquidated").prop('disabled', true);
			$("#formPage textarea").prop('disabled', true);
			$("#formPage select").prop('disabled', true);
			
	

			
		}
		
		// получаем то, что написал пользователь
        var searchString    = $("#formUNP").val();
		
		if($("#formUNP").val().length == 9){
	
			mainSearch();
		}
		
	});
	
	$('#formUNP').bind('input',function(){
		console.log($("#formUNP").val().length);
		if($("#formUNP").val().length < 9){
			$("#formIndex, #formRegion, #formDistrict, #spr_type_city, #formCity, #formCityZone, #spr_type_street, #formStreet, #formBuilding, #formFlat, #formLiquidated, #portal").prop('disabled', true);
			$('#portal').removeClass('shine-button');
			$('.checkUnp_ok').html('');
			$("#formPage textarea").prop('disabled', true);
			$("#formPage select").prop('disabled', true);
			$('.unp_right_part p').css({'display':'none'});
			
			
		}
	});
	
	
	$("button#portal").click(function(){
		event.preventDefault();
		checkUnpPortal();
	});
	// Переносим данные полученные с портала в поля формы создания УНП
	$("button#fill_form").click(function(){
		event.preventDefault();
		if($("#portal_sost").text() === "Действующий" || $("#portal_sost").text() === "В состоянии ликвидации"){
			
			$("#formPage input").prop('disabled', false);
			$("#formPage textarea").prop('disabled', false);
			$("#formPage select").prop('disabled', false);
			$("#formPage button[class='btn_add_fields']").prop('disabled', false);
			
			$('#formName').val($('#portal_name').text());
			$('#formShortName').val($('#portal_short_name').text());
			
			$('select#formLiquidated option[value="'+$('#portal_sost').attr('cod_sost')+'"]').prop('selected', true);
			
			$('select#formRegion option[value="'+$('#portal_id_spr_region').text()+'"]').prop('selected', true);
			$('#formDistrict option[value="'+$('#portal_address_id_spr_district').text()+'"]').prop('selected', true);
			$('#formCity option[value="'+$('#portal_address_cod_city').text()+'"]').prop('selected', true);
			
			$('#formBuilding').val($('#portal_address_building').text());
			$('#formStreet').val($('#portal_address_street').text());
			$('#formFlat').val($('#portal_address_flat').text());
		}
	});
})

function mainSearch(){
	var searchString    = $("#formUNP").val().trim();
	var data = 'searchString='+ searchString;
	data =data + '&fullSearch=2'; // только для проверки уникальности УНП
    data = data + '&searchData=' + $("#formUNP").attr('searchdata'); 
    data = data + '&unp_id=' + $("#formUnpId").val(); 
		//$(".result_html").remove();
		//console.log('here');
        if(searchString.length == 9){
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/ARM/search/",
                data: data,
				success: function(html){ // запустится после получения результатов
					//$("#search").blur();
					//$("#search_result").empty();
                   // $("#search_result").append(html);
				//	console.log(html);
					
					$("#search_result_unp").empty();
						
					if(html.length > 0){
						//if()
						$("#search_result_unp").append(html);
						$("#formPage #portal").prop('disabled', true);
						
						
						$("#formPage input").prop('disabled', true);
						$("#formPage textarea").prop('disabled', true);
						$("#formPage select").prop('disabled', true);
						$("#formPage button[class='btn_add_fields']").prop('disabled', true);
						//$("#formUNP").val('');
					}else{
						$("#search_result_unp").append('<p class = "checkUnp_ok">Запись с введённым УНП в ПО "Базис" не найдена</p>');
						$("#formPage #portal").prop('disabled', false);
						$("#formPage input").prop('disabled', false);
						$("#formPage textarea").prop('disabled', false);
						$("#formPage select").prop('disabled', false);
						$("#formPage button[class='btn_add_fields']").prop('disabled', false);
						$("button#portal").addClass('shine-button');
					}
					
					
				}
            })
        }
		 $("#pre-result").fadeOut();
        return false;
}

function checkUnpPortal(){
		//$('#portal').click(function(){
		
		var formData = new FormData();
		formData.append('unp', $('#formUNP').val());
		if($('#formUNP').val().length == 9){
			
				$('#portal_unp').html('');
				$('#portal_name').html('');
				$('#portal_short_name').html('');
				$('#portal_address').html('');
				$('#portal_sost').html('');
				
			$.ajax({
				url: '/ARM/unp/portalinfo/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				success: function(result){
					console.log(result);
					if(result.length > 3){
						
						data = $.parseJSON(result);
						$('.unp_right_part p').css({'display':'block'});
						$('.unp_right_part button').css({'display':'block'});
						$('#portal_message').html('Информация с портала');
						
						$.each(data, function(ind, val){
							switch(ind){
								case 'unp':
									$('#portal_unp').html(val);
								break
								case 'name':
									$('#portal_name').html(val);
									
								break
								case 'name_short':
									$('#portal_short_name').html(val);
									
								break
								case 'address_portal':
									$('#portal_address').html(val);
								break
								case 'vmns':
									$('#portal_mns').html(val);
								break
								case 'liquidated':
									if(val == '1'){
										$('#portal_sost').html('Действующий');
										$('#portal_sost').attr('cod_sost','0');
									}else if(val == 'L'){
										$('#portal_sost').html('Ликвидирован');
										$('#portal_sost').attr('cod_sost','1');
									}else if(val == 'M'){
										$('#portal_sost').html('В состоянии ликвидации');
										$('#portal_sost').attr('cod_sost','2');
									}
								break
								case 'id_spr_region':
									$('#portal_id_spr_region').text(data['id_spr_region']);
								break
								case 'address_street':
									
									$('#portal_address_street').text(data['address_street']);
								break
								case 'address_building':
									
									$('#portal_address_building').text(data['address_building']);
								break
								case 'address_flat':
								
									$('#portal_address_flat').text(data['address_flat']);
								break
								
								case 'city_arr':
								if(typeof($('#formUnpId').val())=== "undefined"){
									console.log($('#formUnpId').val());
									var str='<option qq="2" value="0">Выберите город</option>';
								// формируем options для городов
									$.each(val, function(ind1, val1){
										str += '<option value="'+val1['id']+'">'+val1['name']+'</option>';
									});
									$("#formCity").html(str);
									$('#portal_address_cod_city').text(data['cod_city']);
								}

								break
								case 'cityzone_arr':
								if(typeof($('#formUnpId').val())=== "undefined"){
									var str='<option qq="3" value="0">Выберите район города</option>';
								// формируем options для городов
									$.each(val, function(ind1, val1){
										str += '<option value="'+val1['id']+'">'+val1['name']+'</option>';
									});
									$("#formCityZone").html(str);
									//$('#portal_address_cod_city').text(data['cod_city']);
								}
								break
								case 'district_arr':
								if(typeof($('#formUnpId').val())=== "undefined"){
									var str_d='<option qq="1" value="0">Выберите регион</option>';
							
									$.each(val, function(ind2, val2){
										str_d += '<option value="'+val2['id']+'">'+val2['name']+'</option>';
									});
									$("#formDistrict").html(str_d);
									
									$('#portal_address_id_spr_district').text(data['id_spr_district']);
								}
								break
							}
						})
						
					}else{
						$('.unp_right_part p').css({'display':'none'});
						$('.unp_right_part button').css({'display':'none'});
						$('#portal_message').css({'display':'block'});
						$('#portal_message').html('Информация на портале не найдена. Проверьте вручную');
					}
					
				},
				error: function(XHR, status, error) { console.log(status+' '+error); }
			});
		}
	
}