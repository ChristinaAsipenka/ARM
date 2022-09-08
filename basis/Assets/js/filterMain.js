$(window).load(function(){
	$('#main_block_filter select').each(function(){
		if($(location).attr('href').indexOf('unp') !== -1){
			if($(this).val() > 0){

				unp_query('main'); // main - полный запрос из которого рассчитываем количество страниц
				unp_query('page'); // page - элементы для определенной страницы
				info_str_unp();
				$('#main_block_filter').hide();

				return false;
			}
		
		}else{
			if($(this).val() > 0){

				obj_query('main'); // main - полный запрос из которого рассчитываем количество страниц
				obj_query('page'); // page - элементы для определенной страницы
			
				info_str_obj();
				$('#main_block_filter').hide();

				return false;
			}
		}

	});
	
	$('#main_block_filter input[type="text"]').each(function(){
	
			if($(location).attr('href').indexOf('unp') !== -1){
				if($(this).val().length > 0){

					unp_query('main'); // main - полный запрос из которого рассчитываем количество страниц
					unp_query('page'); // page - элементы для определенной страницы
					info_str_unp();
					$('#main_block_filter').hide();

					return false;
				}
			
			}else{
				if($(this).val().length > 0){

					obj_query('main'); // main - полный запрос из которого рассчитываем количество страниц
					obj_query('page'); // page - элементы для определенной страницы
				
					info_str_obj();
					$('#main_block_filter').hide();

					return false;
				}
			}
	
		

	});
	
	if($(location).attr('href').indexOf('individual_persons') !== -1){
		
		$('#main_block_filter input').each(function(){

				indpers_query('main'); // main - полный запрос из которого рассчитываем количество страниц
				indpers_query('page'); // page - элементы для определенной страницы
				info_str_indpers();
				$('#main_block_filter').hide();

				return false;			
			
			
		});
	
	}
	
	
	
	
	
});
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
			$('#main_block_filter input#num_items_on_page').val(100);
			
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
	
	$('#filterForIP').click(function(){
		if($('#main_block_filter').is(':visible')){
			//console.log('visible');
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});
	
	$('#apply_filter').click(function(){
		event.preventDefault();
		
		preloaderStart();
		
		
		filterMain.setFilterCookieUnp(); // записываем параметры фильтра в куки
		
		unp_query('main'); // делаем запрос для формирования нумерации страниц
		unp_query('page'); // делаем запрос для формирования страницы,
		info_str_unp();
		$('#main_block_filter').hide();
	});
	
	$('#apply_filter_indpers').click(function(){
		event.preventDefault();
		
		filterMain.setFilterCookieIndpers(); // записываем параметры фильтра в куки
		
		indpers_query('main'); // делаем запрос для формирования нумерации страниц
		indpers_query('page'); // делаем запрос для формирования страницы,
		info_str_indpers();
		$('#main_block_filter').hide();
	});
	
	$('#apply_filter_object').click(function(){
		event.preventDefault();
		
		preloaderStart();

		
		filterMain.setFilterCookieObj(); // записываем параметры фильтра в куки
		
		obj_query('main'); // main - полный запрос из которого рассчитываем количество страниц
		obj_query('page'); // page - элементы для определенной страницы
		info_str_obj();
		///////////////////////////////////////
		$('#main_block_filter').hide();

		
	});
	
	
})

function info_str_obj(){
	/// строка списка параметров фильтрации
		var block_text_filter_fact_address;
		var block_text_filter_post_address;
		var block_num_case = '';
		var block_name_sbj;
		var block_name_obj;
		

		
		block_text_filter_fact_address = ($('#formRegionFact').val() > 0 ? $('#formRegionFact option:selected').text()+', ' : '') + ($('#formDistrictFact').val() > 0 ? $('#formDistrictFact option:selected').text()+' р-н, ' : '') + ($('#formCityFact').val() > 0 ? $('#formCityFact option:selected').text() : '') + ($('#formCityZoneFact').val() > 0 ? $('#formCityZoneFact option:selected').text()+', ' : '') + ($('#formStreetFact').val() > 0 ? $('#formStreetFact option:selected').text()+', ' : '');
		
		if(block_text_filter_fact_address.length > 0){
				block_text_filter_fact_address ='<p class="font-size-15">Фактический адрес потребителя: '+block_text_filter_fact_address+'</p>';
		}
		
		block_name_sbj = ($('#formNameSbj').val().length > 0 ? $('#formNameSbj').val() : '');
		block_name_obj = ($('#formNameObject').val().length > 0 ? $('#formNameObject').val() : '');
		
		block_text_filter_post_address = ($('#formRegionPost').val() > 0 ? $('#formRegionPost option:selected').text()+', ' : '') + ($('#formDistrictPost').val() > 0 ? $('#formDistrictPost option:selected').text()+' р-н, ' : '') + ($('#formCityPost').val() > 0 ? $('#formCityPost option:selected').text() : '') + ($('#formCityZonePost').val() > 0 ? $('#formCityZonePost option:selected').text()+', ' : '') + ($('#formStreetPost').val() > 0 ? $('#formStreetPost option:selected').text()+', ' : '');
		
		if(block_text_filter_post_address.length > 0){
				block_text_filter_post_address ='<p class="font-size-15">Почтовый адрес потребителя: '+block_text_filter_post_address+'</p>';
		}
		
		block_text_filter_sbj_podr = ($('#formBranchObject').val() > 0 ? $('#formBranchObject option:selected').text()+', ' : '') + ($('#formPodrazdelenieObject').val() > 0 ? $('#formPodrazdelenieObject option:selected').text()+' ' : '') + ($('#formOtdelObject').val() > 0 ? $('#formOtdelObject option:selected').text() : '');
		
		if(block_text_filter_sbj_podr.length > 0){
				block_text_filter_sbj_podr ='<p class="font-size-15">Структурное подразделение: '+block_text_filter_sbj_podr+'</p>';
		}
		
		block_text_filter_obj_inspektor = ($('#formUser').val().length > 0 ? $('#formUser').val() : '');
		
		if(block_text_filter_obj_inspektor.length > 0){
				block_text_filter_obj_inspektor ='<p class="font-size-15">Инспектор: '+block_text_filter_obj_inspektor+'</p>';
		}
		
		
		block_text_filter_obj_address = ($('#formRegionObject').val() > 0 ? $('#formRegionObject option:selected').text()+', ' : '') + ($('#formDistrictObject').val() > 0 ? $('#formDistrictObject option:selected').text()+', ' : '') + ($('#formCityObject').val() > 0 ? $('#formCityObject option:selected').text()+', ' : '') + ($('#formStreetObject').val().length > 0 ? $('#formStreetObject').val() : '');
		
		if(block_text_filter_obj_address.length > 0){
				block_text_filter_obj_address ='<p  class="font-size-15">Адрес объекта: '+block_text_filter_obj_address+'</p>';
		}
		
		if(block_name_sbj.length > 0){
				block_name_sbj ='<p  class="font-size-15">Наименование потребителя: '+block_name_sbj+'</p>';
		}
		
		if(block_name_obj.length > 0){
				block_name_obj ='<p  class="font-size-15">Наименование объекта: '+block_name_obj+'</p>';
		}
		
		if($('#formNumCaseOld').val() > 0){
			block_num_case = '<p>Номер дела в филиале: '+$('#formNumCaseOld').val()+'</p>';
		}
		
		str_text_filter =block_num_case+ block_text_filter_fact_address+block_text_filter_post_address+block_text_filter_obj_inspektor+block_text_filter_sbj_podr+block_text_filter_obj_address+block_name_sbj+block_name_obj;
		$('#filter_parametrs_text').html("<p class='font-bold'>Параметры фильтра: </p>" +str_text_filter);
		
}

function info_str_unp(){
	var block_text_filter;
	
	block_text_filter = ($('#formRegion').val() > 0 ? $('#formRegion option:selected').text()+', ' : '') + ($('#formDistrict').val() > 0 ? $('#formDistrict option:selected').text()+' р-н, ' : '') + ($('#formCity').val() > 0 ? $('#formCity option:selected').text()+', ' : '') + ($('#formCityZone').val() > 0 ? $('#formCityZone option:selected').text()+', ' : '') + ($('#street_unp').val().length > 0 ? $('#street_unp').val() : '');
		
	if(block_text_filter.length > 0){
		block_text_filter ='<p class="font-size-15">Адрес юридического лица: '+block_text_filter+'</p>';
	}
		
	$('#filter_parametrs_text').html("<p class='font-bold'>Параметры фильтра: </p>" +block_text_filter);	
}


function info_str_indpers(){
	var block_text_filter;
	
	block_text_filter_firstname = ($('#mf_ip_firstname').val().length > 0 ? $('#mf_ip_firstname').val() : '');	
	if(block_text_filter_firstname.length > 0){
		block_text_filter_firstname ='<p class="font-size-15">Фамилия: '+block_text_filter_firstname+'</p>';
	}
	
	block_text_filter_secondname = ($('#mf_ip_secondname').val().length > 0 ? $('#mf_ip_secondname').val() : '');	
	if(block_text_filter_secondname.length > 0){
		block_text_filter_secondname ='<p class="font-size-15">Имя: '+block_text_filter_secondname+'</p>';
	}	

	block_text_filter_lastname = ($('#mf_ip_lastname').val().length > 0 ? $('#mf_ip_lastname').val() : '');	
	if(block_text_filter_lastname.length > 0){
		block_text_filter_lastname ='<p class="font-size-15">Отчество: '+block_text_filter_lastname+'</p>';
	}	
	
	block_text_filter_identification_number = ($('#mf_ip_identification_number').val().length > 0 ? $('#mf_ip_identification_number').val() : '');	
	if(block_text_filter_identification_number.length > 0){
		block_text_filter_identification_number ='<p class="font-size-15">Идентификационный номер: '+block_text_filter_identification_number+'</p>';
	}	
		
	str_text_filter = block_text_filter_firstname+block_text_filter_secondname+block_text_filter_lastname+block_text_filter_identification_number;
	$('#filter_parametrs_text').html("<p class='font-bold'>Параметры фильтра: </p>" +str_text_filter);	
}

function unp_query(param){

	 var formData = new FormData();
		 formData.append('mf_region_unp', $('#formRegion').val());
		 formData.append('mf_district_unp', $('#formDistrict').val());
		 formData.append('mf_city_unp', $('#formCity').val());
		 formData.append('mf_cityzone_unp', $('#formCityZone').val());
		 formData.append('mf_street_unp', $('#street_unp').val());
		 
		 
		 
		 if(param == 'main'){
			$.ajax({
				url: '/ARM/basis/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				$('#count_unp').html(result);	
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					//console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				
				$('#pagination').html(str_pgs);
				
					if($.cookie('mf_num_page') != 1){
						$('#pagination li.active_page').removeClass('active_page');
						$('#pagination').children('li').eq(parseInt($.cookie('mf_num_page'))-1).addClass('active_page');
					}
					
				preloaderEnd();
				}
			});
		 }else{
		 
		 formData.append('mf_num_page', $('#pagination li.active_page').text());
		 if(($.cookie('mf_num_page') > 0 && ($.cookie('mf_num_page')) != $('#pagination li.active_page').text()) ){
				formData.append('mf_num_page', $.cookie('mf_num_page'));
			}
		 
		 formData.append('mf_num_items', $('#num_items_on_page').val());
		 
				 $.ajax({
					url: '/ARM/basis/filter/mf_unp/',
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
					 
					 
					// preloaderEnd();
					 
					}
				});
		 }
}

function obj_query(param){
	 
	//console.log('here');
	
	var formData = new FormData();
		 formData.append('mf_form_num_case_old', $('#formNumCaseOld').val());
		 
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
		 formData.append('mf_user', $('#formUser').val());
		 
		 formData.append('mf_region_obj', $('#formRegionObject').val());
		 formData.append('mf_district_obj', $('#formDistrictObject').val());
		 formData.append('mf_city_obj', $('#formCityObject').val());
		 formData.append('mf_street_obj', $('#formStreetObject').val());
		 
		 formData.append('mf_NameSbj', $('#formNameSbj').val());
		 formData.append('mf_NameObject', $('#formNameObject').val());
		 
		if(param == 'main'){
		
			$.ajax({
				url: '/ARM/basis/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					//console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_sbj').html(result);
				$('#pagination').html(str_pgs);
				
				
					if($.cookie('mf_num_page') != 1){
						$('#pagination li.active_page').removeClass('active_page');
						$('#pagination').children('li').eq(parseInt($.cookie('mf_num_page'))-1).addClass('active_page');
					}
			//	preloaderEnd();
				}
			});
		}else{
			
			formData.append('mf_num_page', $('#pagination li.active_page').text());
			
			if(($.cookie('mf_num_page') > 0 && ($.cookie('mf_num_page')) != $('#pagination li.active_page').text()) ){
				formData.append('mf_num_page', $.cookie('mf_num_page'));
			}
			
			formData.append('mf_num_items', $('#num_items_on_page').val());
			
			 $.ajax({
				url: '/ARM/basis/filter/mf_subject/',
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
				preloaderEnd();

				}
			});
		}
}

function indpers_query(param){
	 var formData = new FormData();
		 formData.append('mf_ip_firstname', $('#mf_ip_firstname').val()); // фамилия (перепутано наименоваине переменной)
		 formData.append('mf_ip_secondname', $('#mf_ip_secondname').val());
		 formData.append('mf_ip_lastname', $('#mf_ip_lastname').val());
		 formData.append('mf_ip_identification_number', $('#mf_ip_identification_number').val());

		 
		// console.log(param);
		 
		 if(param == 'main'){
			$.ajax({
				url: '/ARM/basis/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					//console.log(result);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_unp').html(result);
				$('#pagination').html(str_pgs);
				
					if($.cookie('mf_num_page') != 1){
						$('#pagination li.active_page').removeClass('active_page');
						$('#pagination').children('li').eq(parseInt($.cookie('mf_num_page'))-1).addClass('active_page');
					}
				
				}
			});
		 }else{
		 
		 formData.append('mf_num_page', $('#pagination li.active_page').text());
		 
		 if(($.cookie('mf_num_page') > 0 && ($.cookie('mf_num_page')) != $('#pagination li.active_page').text()) ){
				formData.append('mf_num_page', $.cookie('mf_num_page'));
			}
		 
		 formData.append('mf_num_items', $('#num_items_on_page').val());
		 
				 $.ajax({
					url: '/ARM/basis/filter/mf_indpers/',
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

var filterMain = {
	open_block_obj: function(id_obj){

		if($('.block_obj[block_obj='+id_obj+']').is(':visible')){
			//console.log(':visible');
			$('.block_obj[block_obj='+id_obj+']').hide();
			$('.open_block_obj[for_block_obj='+id_obj+'] i').removeClass('icon-eyeoff');
			$('.open_block_obj[for_block_obj='+id_obj+'] i').addClass('icon-eye');
			$('.open_block_obj[for_block_obj='+id_obj+'] span').html('развернуть');
		}else{
			//console.log('not visible');
			$('.block_obj[block_obj='+id_obj+']').show();
			$('.open_block_obj[for_block_obj='+id_obj+'] i').addClass('icon-eyeoff');
			$('.open_block_obj[for_block_obj='+id_obj+'] i').removeClass('icon-eye');
			$('.open_block_obj[for_block_obj='+id_obj+'] span').html('скрыть');
		}

	},
	
	clearFilter: function(){
	
		$('#main_block_filter select option[value="0"]').prop('selected', true);
		$('#main_block_filter input').val('');
		$('#main_block_filter input#num_items_on_page').val(100);
		if($(location).attr('href').indexOf('unp') !== -1){
			$.removeCookie('formRegion');
			$.removeCookie('formDistrict');
			$.removeCookie('formCity');
			$.removeCookie('formCityZone');
			$.removeCookie('formStreet');
		}else{
			$.removeCookie('formNumCaseOld');
			
			$.removeCookie('formRegionFact');
			$.removeCookie('formDistrictFact');
			$.removeCookie('formCityFact');
			$.removeCookie('formCityZoneFact');
			$.removeCookie('formStreetFact');
			
			$.removeCookie('formRegionPost');
			$.removeCookie('formDistrictPost');
			$.removeCookie('formCityPost');
			$.removeCookie('formStreetPost');
			
			$.removeCookie('formBranchObject');
			$.removeCookie('formPodrazdelenieObject');
			$.removeCookie('formOtdelObject');
			$.removeCookie('formUser');
			
			$.removeCookie('formRegionObject');
			$.removeCookie('formDistrictObject');
			$.removeCookie('formCityObject');
			$.removeCookie('formStreetObject');
		}
		$.removeCookie('mf_num_page');
			$.removeCookie('mf_num_items');
	},
	// Устанавливает куки для фильтра потребитель-объект
	setFilterCookieObj: function(){
	
		$.cookie('formNumCaseOld', $('#formNumCaseOld').val());
		
		$.cookie('formRegionFact', $('#formRegionFact').val());
		$.cookie('formDistrictFact', $('#formDistrictFact').val());
		$.cookie('formCityFact', $('#formCityFact').val());
		$.cookie('formCityZoneFact', $('#formCityZoneFact').val());
		$.cookie('formStreetFact', $('#formStreetFact').val());
		//console.log($('#formCityZoneFact').text());
		$.cookie('formRegionPost', $('#formRegionPost').val());
		$.cookie('formDistrictPost', $('#formDistrictPost').val());
		$.cookie('formCityPost', $('#formCityPost').val());
		$.cookie('formStreetPost', $('#formStreetPost').val());
		
		$.cookie('formBranchObject', $('#formBranchObject').val());
		$.cookie('formPodrazdelenieObject', $('#formPodrazdelenieObject').val());
		$.cookie('formOtdelObject', $('#formOtdelObject').val());
		$.cookie('formUser', $('#formUser').val());
		
		$.cookie('formRegionObject', $('#formRegionObject').val());
		$.cookie('formDistrictObject', $('#formDistrictObject').val());
		$.cookie('formCityObject', $('#formCityObject').val());
		$.cookie('formStreetObject', $('#formStreetObject').val());
		
		$.cookie('mf_num_page', 1);
		$.cookie('mf_num_items', $('#num_items_on_page').val());
		
		$.cookie('mf_NameSbj', $('#formNameSbj').val());
		$.cookie('mf_NameObject', $('#formNameObject').val());
		
	},
	
	// Устанавливает куки для фильтра УНП
	setFilterCookieUnp: function(){
		$.cookie('formRegion', $('#formRegion').val());
		$.cookie('formDistrict', $('#formDistrict').val());
		$.cookie('formCity', $('#formCity').val());
		$.cookie('formCityZone', $('#formCityZone').val());
		$.cookie('formStreet', $('#street_unp').val());
	
		
		$.cookie('mf_num_page', 1);
		$.cookie('mf_num_items', $('#num_items_on_page').val());
	},
	
	setFilterCookieIndpers: function(){
		$.cookie('mf_ip_firstname', $('#mf_ip_firstname').val());
		$.cookie('mf_ip_secondname', $('#mf_ip_secondname').val());
		$.cookie('mf_ip_lastname', $('#mf_ip_lastname').val());
		$.cookie('mf_ip_identification_number', $('#mf_ip_identification_number').val());

	
		
		$.cookie('mf_num_page', 1);
		$.cookie('mf_num_items', $('#num_items_on_page').val());
	}
}

