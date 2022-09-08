$(document).ready(function(){
	$('#openModalSubject .result_html div[onclick]').attr('onclick','');
	//$('#openNewSubject .result_html div[onclick]').attr('onclick','');

	$('#openNewSubject .result_html').click(function(){
		
		var NewSbjId = $(this).attr('id_subject');
		var NewSbjName = $(this).find('.className').text().trim();
		var id_obj = $('#openNewSubject').attr('id_obj');
		var id_sbj = $('#openNewSubject').attr('id_sbj');
		
		if(!confirm("Объект(ы) будет передан потребителю " + NewSbjName)){
			return false;
		}else{
			
			var formData = new FormData();
			formData.append('objects_id', id_obj);
			formData.append('NewSbjId', NewSbjId);
			formData.append('id_sbj', id_sbj);
		
			$.ajax({
				url: '/ARM/basis/objects/new_sbj/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
				location.reload();
				  
				}
			});
			
		}
		
		//console.log("Объект будет передан потребителю " + NewSbjName);
	});


	$('#openModalUNP .result_html').click(function(){

		$('#formUnpId').val($(this).attr('id_unp'));	
		$('#name_unp').html('(' + $(this).find('.classUnp').html()+') ' +$(this).find('.className').html());

		$('#e_subobj_subject_id').val($(this).attr('id_unp'));	
		$('#e_subobj_subject').val('(' + $(this).find('.classUnp').html()+') ' +$(this).find('.className').html());
		
		/*** перенос адреса **/
		var id_unp = $(this).attr('id_unp');
		var address_index = $('div[id_unp="'+id_unp +'"] span[address_index]').attr('address_index');
		var address_region = $('div[id_unp="'+id_unp +'"] span[address_region]').attr('address_region');
		var address_district = $('div[id_unp="'+id_unp +'"] span[address_district]').attr('address_district');
		var address_city_type = $('div[id_unp="'+id_unp +'"] span[address_city_type]').attr('address_city_type');
		
		var address_city = $('div[id_unp="'+id_unp +'"] span[address_city]').attr('address_city');
		var address_street_type = $('div[id_unp="'+id_unp +'"] span[address_street_type]').attr('address_street_type');
		var address_street = $('div[id_unp="'+id_unp +'"] span[address_street]').attr('address_street');
		var address_building = $('div[id_unp="'+id_unp +'"] span[address_building]').attr('address_building');
		var address_flat = $('div[id_unp="'+id_unp +'"] span[address_flat]').attr('address_flat');
console.log(address_region);
		/**** Получаем массив районов области и переносим данные****/
		var formData = new FormData();
		formData.append('idRegion', address_region);
		
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
			 // console.log(result);
			  $('select#formDistrictFact').html(result);
			  $('select#formDistrictPost').html(result);
			  $('select#formDistrictFname').html(result);
			  $('select#formDistrictFact option[value='+address_district+']').prop('selected', true);
			  $('select#formDistrictPost option[value='+address_district+']').prop('selected', true);
			  $('select#formDistrictFname option[value='+address_district+']').prop('selected', true);
            }
        });
		
		/**** Получаем массив городов района и переносим данные****/
		var formData = new FormData();
		formData.append('idDistrict', address_district);
		
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
			//  console.log(result);
			  $('select#formCityFact').html(result);
			  $('select#formCityPost').html(result);
			  $('select#formCityFname').html(result);
			  $('select#formCityFact option[value='+address_city+']').prop('selected', true);
			  $('select#formCityPost option[value='+address_city+']').prop('selected', true);
			  $('select#formCityFname option[value='+address_city+']').prop('selected', true);
            }
        });
		
		/**** Получаем массив городов района и переносим данные****/
		var formData = new FormData();
		formData.append('idCity', address_city);
		
		 $.ajax({
            url: '/ARM/basis/address/selectcityzone/',
            type: 'POST',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
			//  console.log(result);
			  $('select#formCityZoneFact').html(result);
			  $('select#formCityZonePost').html(result);
			//  $('select#formCityFname').html(result);
			 /* $('select#formCityZoneFact option[value='+address_city+']').prop('selected', true);
			  $('select#formCityZonePost option[value='+address_city+']').prop('selected', true);
			  $('select#formCityFname option[value='+address_city+']').prop('selected', true);*/
            }
        });
		
		$('select#formRegionFact option[value='+address_region+']').prop('selected', true);
		$('select#formRegionPost option[value='+address_region+']').prop('selected', true);
		$('select#formRegionFname option[value='+address_region+']').prop('selected', true);
		
		$('select#spr_type_city_place option[value='+address_city_type+']').prop('selected', true);
		$('select#spr_type_street_place option[value='+address_street_type+']').prop('selected', true);
		
		$('select#spr_type_city_post option[value='+address_city_type+']').prop('selected', true);
		$('select#spr_type_street_post option[value='+address_street_type+']').prop('selected', true);
		
		$('input#formIndexFact').val(address_index);
		$('input#formIndexPost').val(address_index);
		
		$('input#formStreetFact').val(address_street);
		$('input#formStreetPost').val(address_street);
		
		$('input#formBuildingFact').val(address_building);
		$('input#formBuildingPost').val(address_building);
		
		$('input#formFlatFact').val(address_flat);
		$('input#formFlatPost').val(address_flat);
		
		
		var unp = $(this).find('.className').html();
		
		$('textarea#name_potr').val(unp);
		//console.log($(this).find('.className').html());
		$('#formIndPersId').val(0);
		
		/*********************/
		$('#openModalUNP').fadeOut(300);
		$('#openModalUNP_overlay').fadeOut(300);
		$('#search_result').html('');
		$('#search_resultSource').html('');
		$('#search').val('');
		
		$('#cityToName').prop('disabled', false);
		$('#custom_name').prop('disabled', false);
		return false;		
	})
	
	if($('#search').attr('searchdata') === 'ResrPersByUnp'){
		//console.log('here');
		$('#openModalUNP .result_html').unbind('click');
	}
	
	$('#openModalUNPHead .result_html').click(function(){
		
		$('#formUnpHeadId').val($(this).attr('id_unp'));	
		$('#formUnpHead').html('(' + $(this).find('.classUnp').html()+') ' +$(this).find('.className').html());
		$('#search_result').html('');
		$('#search').val('');
	

		$('#openModalUNPHead').fadeOut(300);
		$('#openModalUNPHead').attr('id','openModalUNP');
		$('.overlay').fadeOut(300);
		$('#search_result').html('');
		$('#search').val('');
		return false;		
	})
	
		$('#openModalIndPers .result_html').click(function(){
			
		$('#formIndPersId').val($(this).attr('id_ind_pers'));	
		$('#name_unp').html($(this).find('.firstname').html()+' ' +$(this).find('.secondname').html()+' ' +$(this).find('.lastname').html());
		
		var fio = $(this).find('.firstname').html()+' ' +$(this).find('.secondname').html()+' ' +$(this).find('.lastname').html();
		
		$('textarea#name_potr').val(fio);
		$('#formUnpId').val(0);
		//console.log($(this).find('.firstname').html()+' ' +$(this).find('.secondname').html()+' ' +$(this).find('.lastname').html());
		$('#openModalIndPers').fadeOut(300);
		//$('#openModalIndPers').attr('id','openModalUNP');
		$('.overlay').fadeOut(300);
		$('#cityToName').prop('disabled', false);
		$('#custom_name').prop('disabled', true);
		$('#search_result_ind_pers').html('');
		$('#search').val('');
		return false;		
	})
	
	
})