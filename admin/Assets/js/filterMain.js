$(window).ready(function() {
	$('#close_filter').click(function(){
		$('#main_block_filter').hide();
	});
	$('#filterForUnp').click(function(){
		if($('#main_block_filter').is(':visible')){
			//console.log('visible');
			$('#main_block_filter').hide();
			$('#block_for_unp').hide();
			$('#block_for_unp select option[value="0"]').prop('selected', true);
			$('#block_for_unp input').val('');
			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			$('#block_for_unp').show();
			
		}
	});
	
	$('#filterForSubject').click(function(){
		if($('#main_block_filter').is(':visible')){
			//console.log('visible');
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});
	
	$('#apply_filter').click(function(){
		event.preventDefault();
		
		//$('#pagination li.active_page').removeClass('active_page');
		//$('#pagination li:first-child').addClass('active_page'); // в пагинации делаем активной первую страницу, поскольку активный класс передается в параметры запроса
		
		unp_query('main'); // делаем запрос для формирования нумерации страниц
		unp_query('page'); // делаем запрос для формирования страницы
		$('#main_block_filter').hide();
	});
	
	
	
	$('#apply_filter_object').click(function(){
		event.preventDefault();
		obj_query('main');
		obj_query('page');
		/// строка списка параметров фильтрации
		var block_text_filter_fact_address;
		var block_text_filter_post_address;
		
		block_text_filter_fact_address = ($('#formRegionFact').val() > 0 ? $('#formRegionFact option:selected').text()+', ' : '') + ($('#formDistrictFact').val() > 0 ? $('#formDistrictFact option:selected').text()+' р-н, ' : '') + ($('#formCityFact').val() > 0 ? $('#formCityFact option:selected').text() : '') + ($('#formCityZoneFact').val() > 0 ? $('#formCityZoneFact option:selected').text()+', ' : '') + ($('#formStreetFact').val() > 0 ? $('#formStreetFact option:selected').text()+', ' : '');
		
		if(block_text_filter_fact_address.length > 0){
				block_text_filter_fact_address ='<div>Фактический адрес потребителя: '+block_text_filter_fact_address+'</div>';
		}
		
		block_text_filter_post_address = ($('#formRegionPost').val() > 0 ? $('#formRegionPost option:selected').text()+', ' : '') + ($('#formDistrictPost').val() > 0 ? $('#formDistrictPost option:selected').text()+' р-н, ' : '') + ($('#formCityPost').val() > 0 ? $('#formCityPost option:selected').text() : '') + ($('#formCityZonePost').val() > 0 ? $('#formCityZonePost option:selected').text()+', ' : '') + ($('#formStreetPost').val() > 0 ? $('#formStreetPost option:selected').text()+', ' : '');
		
		if(block_text_filter_post_address.length > 0){
				block_text_filter_post_address ='<div>Почтовый адрес потребителя: '+block_text_filter_post_address+'</div>';
		}
		
		block_text_filter_sbj_podr = ($('#formBranchObject').val() > 0 ? $('#formBranchObject option:selected').text()+', ' : '') + ($('#formPodrazdelenieObject').val() > 0 ? $('#formPodrazdelenieObject option:selected').text()+' ' : '') + ($('#formOtdelObject').val() > 0 ? $('#formOtdelObject option:selected').text() : '');
		
		if(block_text_filter_sbj_podr.length > 0){
				block_text_filter_sbj_podr ='<div>Структурное подразделение: '+block_text_filter_sbj_podr+'</div>';
		}
		
		block_text_filter_obj_address = ($('#formRegionObject').val() > 0 ? $('#formRegionObject option:selected').text()+', ' : '') + ($('#formDistrictObject').val() > 0 ? $('#formDistrictObject option:selected').text()+' ' : '') + ($('#formCityObject').val() > 0 ? $('#formCityObject option:selected').text() : '');
		
		if(block_text_filter_obj_address.length > 0){
				block_text_filter_obj_address ='<div>Адрес объекта: '+block_text_filter_obj_address+'</div>';
		}
		
		str_text_filter = block_text_filter_fact_address+block_text_filter_post_address+block_text_filter_sbj_podr+block_text_filter_obj_address;
		$('#filter_parametrs_text').html(str_text_filter);
		///////////////////////////////////////
		$('#main_block_filter').hide();
	});
	
	
})

function unp_query(param){
	 var formData = new FormData();
		 formData.append('mf_region_unp', $('#formRegion').val());
		 formData.append('mf_district_unp', $('#formDistrict').val());
		 formData.append('mf_city_unp', $('#formCity').val());
		 formData.append('mf_cityzone_unp', $('#formCityZone').val());
		 formData.append('mf_street_unp', $('#street_unp').val());
		 
		 
		 
		 if(param == 'main'){
			$.ajax({
				url: '/ARM/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_unp').html(result);
				$('#pagination').html(str_pgs);
				}
			});
		 }else{
		 
		 formData.append('mf_num_page', $('#pagination li.active_page').text());
		 formData.append('mf_num_items', $('#num_items_on_page').val());
		 
				 $.ajax({
					url: '/ARM/filter/mf_unp/',
					type: 'POST',
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
					  //console.log(result);
					$('.main_table tbody').html(result);
					 
					 
					 
					 
					}
				});
		 }
}

function obj_query(param){
	
	
	var formData = new FormData();
		 formData.append('mf_region_sbj', $('#formRegionFact').val());
		 formData.append('mf_district_sbj', $('#formDistrictFact').val());
		 formData.append('mf_city_sbj', $('#formCityFact').val());
		 formData.append('mf_cityzone_sbj', $('#formCityZoneFact').val());
		 formData.append('mf_street_sbj', $('#formStreetFact').val());
		 
		 formData.append('mf_region_sbj_post', $('#formRegionPost').val());
		 formData.append('mf_district_sbj_post', $('#formDistrictPost').val());
		 formData.append('mf_city_sbj_post', $('#formCityPost').val());
		 formData.append('mf_street_sbj_post', $('#formStreetPost').val());
		 
		 formData.append('mf_branch_sbj', $('#formBranchObject').val());
		 formData.append('mf_podrazdelenie_sbj', $('#formPodrazdelenieObject').val());
		 formData.append('mf_otdel_sbj', $('#formOtdelObject').val());
		 
		 formData.append('mf_region_obj', $('#formRegionObject').val());
		 formData.append('mf_district_obj', $('#formDistrictObject').val());
		 formData.append('mf_city_obj', $('#formCityObject').val());
		 formData.append('mf_street_obj', $('#formStreetObject').val());
		 
		if(param == 'main'){
			
			
			
			$.ajax({
				url: '/ARM/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_sbj').html(result);
				$('#pagination').html(str_pgs);
				}
			});
		}else{
			
			formData.append('mf_num_page', $('#pagination li.active_page').text());
			formData.append('mf_num_items', $('#num_items_on_page').val());
			
			 $.ajax({
				url: '/ARM/filter/mf_subject/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				   console.log(result);
				$('.main_table tbody').html(result);
			//	$('#count_sbj').html($('.main_table tbody tr').length); 
				//$('#count_obj').html($('.main_table tbody tr .block_obj p').length); 
				}
			});
		}
}

var filterMain = {
	open_block_obj: function(id_obj){

		if($('.block_obj[block_obj='+id_obj+']').is(':visible')){
			console.log(':visible');
			$('.block_obj[block_obj='+id_obj+']').hide();
			$('.open_block_obj[for_block_obj='+id_obj+'] i').removeClass('icon-eyeoff');
			$('.open_block_obj[for_block_obj='+id_obj+'] i').addClass('icon-eye');
			$('.open_block_obj[for_block_obj='+id_obj+'] span').html('развернуть');
		}else{
			console.log('not visible');
			$('.block_obj[block_obj='+id_obj+']').show();
			$('.open_block_obj[for_block_obj='+id_obj+'] i').addClass('icon-eyeoff');
			$('.open_block_obj[for_block_obj='+id_obj+'] i').removeClass('icon-eye');
			$('.open_block_obj[for_block_obj='+id_obj+'] span').html('скрыть');
		}

	},
	
	clearFilter: function(){
	
		$('#main_block_filter select option[value="0"]').prop('selected', true);
		$('#main_block_filter input').val('');
	}
}