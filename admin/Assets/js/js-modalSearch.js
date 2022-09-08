$(document).ready(function(){
	$('#openModalSubject .result_html div[onclick]').attr('onclick','');

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

		/**** Получаем массив районов области и переносим данные****/
		var formData = new FormData();
		formData.append('idRegion', address_region);
		
		 $.ajax({
            url: '/ARM/address/selectdistrict/',
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
			  $('select#formDistrictFact option[value='+address_district+']').prop('selected', true);
			  $('select#formDistrictPost option[value='+address_district+']').prop('selected', true);
            }
        });
		
		/**** Получаем массив городов района и переносим данные****/
		var formData = new FormData();
		formData.append('idDistrict', address_district);
		
		 $.ajax({
            url: '/ARM/address/selectcity/',
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
			  $('select#formCityFact option[value='+address_city+']').prop('selected', true);
			  $('select#formCityPost option[value='+address_city+']').prop('selected', true);
            }
        });
		
		$('select#formRegionFact option[value='+address_region+']').prop('selected', true);
		$('select#formRegionPost option[value='+address_region+']').prop('selected', true);
		
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
		
		$('textarea#name_potr').text($(this).find('.className').html());
		
		
		/*********************/
		$('#openModalUNP').fadeOut(300);
		$('#openModalUNP_overlay').fadeOut(300);
		$('#search_result').html('');
		$('#search_resultSource').html('');
		$('#search').val('');
		return false;		
	})
	
	if($('#search').attr('searchdata') === 'ResrPersByUnp'){
		console.log('here');
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
	
})