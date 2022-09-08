$(window).load(function(){
	
	
	
	
});
$(window).ready(function() {
	$('#close_filter').click(function(){			////////////// закрывает форму для фильтра на крестик
		$('#main_block_filter').hide();
	});
	
	$('#filterForZurnal_e').click(function(){		////////////// открывает форму для фильтра на странице ОЛЭ
		if($('#main_block_filter').is(':visible')){
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});
	$('#filterForZurnal_t').click(function(){		////////////// открывает форму для фильтра на странице ОЛТ
		if($('#main_block_filter').is(':visible')){
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});
	$('#filterForZurnal_g').click(function(){		////////////// открывает форму для фильтра на странице ОЛГ
		if($('#main_block_filter').is(':visible')){
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});	
	$('#filterForZurnal').click(function(){		////////////// открывает форму для фильтра на странице ОЛГ
		if($('#main_block_filter').is(':visible')){
			$('#main_block_filter').hide();

			
		}else if($('#main_block_filter').is(':hidden')){
			$('#main_block_filter').show();
			
			
		}
	});			
	
	
	$('#apply_filter_e').click(function(){       ////////////// нажатие на кнопку применить фильтр на странице ОЛЭ
		event.preventDefault();
		preloaderStart();
		filterMain.setFilterCookieZurnal(); 
		
		zurnal_query('main'); 
		zurnal_query('page'); 
		info_str_e();
		$('#main_block_filter').hide();
	});
	
	$('#apply_filter_t').click(function(){       ////////////// нажатие на кнопку применить фильтр на странице ОЛТ
		event.preventDefault();
		preloaderStart();
		filterMain.setFilterCookieZurnal(); 
		
		zurnal_query_t('main'); 
		zurnal_query_t('page'); 
		info_str_e();
		$('#main_block_filter').hide();
	});

	$('#apply_filter_g').click(function(){       ////////////// нажатие на кнопку применить фильтр на странице ОЛГ
		event.preventDefault();
		preloaderStart();
		filterMain.setFilterCookieZurnal();
		
		zurnal_query_g('main'); 
		zurnal_query_g('page'); 
		info_str_e();
		$('#main_block_filter').hide();
	});	
	
	$('#apply_filter_personal').click(function(){       ////////////// нажатие на кнопку применить фильтр на странице ОЛГ
		event.preventDefault();
		preloaderStart();
		filterMain.setFilterCookieZurnal();
		
		zurnal_query_personal('main'); 
		zurnal_query_personal('page'); 
		info_str_personal();
		$('#main_block_filter').hide();
	});	
})

function info_str_e(){							 ////////////// формирование строки параметра фильтра на странице ОЛЭ

		block_text_filter_e_persona = ($('#zurnal_pers').val().length > 0 ? $('#zurnal_pers').val() : '');
		
		if(block_text_filter_e_persona.length > 0){
				block_text_filter_e_persona ='<p class="font-size-15">ФИО ответственного лица: '+block_text_filter_e_persona+'</p>';
		}

		block_text_filter_e_persona_dolg = ($('#zurnal_pers_dolg').val().length > 0 ? $('#zurnal_pers_dolg').val() : '');
		
		if(block_text_filter_e_persona_dolg.length > 0){
				block_text_filter_e_persona_dolg ='<p class="font-size-15">Должность ответственного лица: '+block_text_filter_e_persona_dolg+'</p>';
		}		
		
		block_text_filter_insp = ($('#zurnal_insp').val().length > 0 ? $('#zurnal_insp').val() : '');
		
		if(block_text_filter_insp.length > 0){
				block_text_filter_insp ='<p class="font-size-15">Инспектор: '+block_text_filter_insp+'</p>';
		}

		block_text_filter_zurnal_address_branch = ($('#formBranchObject').val().length > 0 ? $('#formBranchObject').val() : '');
		block_text_filter_podr = ($('#formPodrazdelenieObject').val().length > 0 ? $('#formPodrazdelenieObject').val() : '');
		block_text_filter_otdel = ($('#formOtdelObject').val().length > 0 ? $('#formOtdelObject').val() : '');
		
		
		if(block_text_filter_zurnal_address_branch > 0 || block_text_filter_podr > 0 || block_text_filter_otdel > 0){
			block_text_filter_zurnal_address = '<p class="font-size-15">Структурное подразделение: '+($('#formBranchObject').val() > 0 ? $('#formBranchObject option:selected').text() : '') + ($('#formPodrazdelenieObject').val() > 0 ? ', '+$('#formPodrazdelenieObject option:selected').text() : '') + ($('#formOtdelObject').val() > 0 ? ', '+$('#formOtdelObject option:selected').text() : '');
		}else{
			block_text_filter_zurnal_address = '';
		}


		block_text_filter_zurnal_num_doc = ($('#zurnal_num_doc').val().length > 0 ? $('#zurnal_num_doc').val() : '');
		block_text_filter_zurnal_date_doc = ($('#zurnal_date_doc').val().length > 0 ? $('#zurnal_date_doc').val() : '');

		if(block_text_filter_zurnal_num_doc.length > 0 || block_text_filter_zurnal_date_doc.length > 0){
			block_text_filter_zurnal_doc = '<p class="font-size-15">Подтверждающий документ: '+($('#zurnal_num_doc').val() > 0 ? '№ '+block_text_filter_zurnal_num_doc : '') + ($('#zurnal_date_doc').val().length > 0 ? ' от '+block_text_filter_zurnal_date_doc.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '');
			
		}else{
			block_text_filter_zurnal_doc = '';
		}


		block_text_filter_zurnal_date_doc_ot = ($('#zurnal_date_doc_ot').val().length > 0 ? $('#zurnal_date_doc_ot').val() : '');
		block_text_filter_zurnal_date_doc_do = ($('#zurnal_date_doc_do').val().length > 0 ? $('#zurnal_date_doc_do').val() : '');

		if(block_text_filter_zurnal_date_doc_ot.length > 0 || block_text_filter_zurnal_date_doc_do.length > 0){
			block_text_filter_zurnal_doc_period = '<p class="font-size-15">Проверка знаний за период: '+($('#zurnal_date_doc_ot').val().length > 0 ? 'от '+block_text_filter_zurnal_date_doc_ot.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '') + ($('#zurnal_date_doc_do').val().length > 0 ? ' до '+block_text_filter_zurnal_date_doc_do.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '');
			
		}else{
			block_text_filter_zurnal_doc_period = '';
		}		


		block_text_filter_fio_member = ($('#zurnal_fio_member').val().length > 0 ? $('#zurnal_fio_member').val() : '');
		
		if(block_text_filter_fio_member.length > 0){
				block_text_filter_fio_member ='<p class="font-size-15">Член комиссии: '+block_text_filter_fio_member+'</p>';
		}
		
		block_text_filter_srok_istek = ($('#pz_prosrok').val() == 1 ? $('#pz_prosrok').val() : '');
		
		if(block_text_filter_srok_istek == 1){
				block_text_filter_srok_istek ='<p class="font-size-15">Срок проверки знаний истек: да</p>';
		}		
		

		str_text_filter =block_text_filter_e_persona+block_text_filter_e_persona_dolg+block_text_filter_insp+block_text_filter_zurnal_address+block_text_filter_zurnal_doc+block_text_filter_zurnal_doc_period+block_text_filter_fio_member+block_text_filter_srok_istek;

		$('#filter_parametrs_text').html("<p class='font-bold'>Параметры фильтра: </p>" +str_text_filter);
		
}


	function info_str_personal(){							 ////////////// формирование строки параметра фильтра на странице ОЛЭ

		block_text_filter_e_persona = ($('#zurnal_pers').val().length > 0 ? $('#zurnal_pers').val() : '');
		
		if(block_text_filter_e_persona.length > 0){
				block_text_filter_e_persona ='<p class="font-size-15">ФИО ответственного лица: '+block_text_filter_e_persona+'</p>';
		}

		block_text_filter_e_persona_dolg = ($('#zurnal_pers_dolg').val().length > 0 ? $('#zurnal_pers_dolg').val() : '');
		
		if(block_text_filter_e_persona_dolg.length > 0){
				block_text_filter_e_persona_dolg ='<p class="font-size-15">Должность ответственного лица: '+block_text_filter_e_persona_dolg+'</p>';
		}		
		

		block_text_filter_zurnal_date_doc_ot = ($('#zurnal_date_doc_ot').val().length > 0 ? $('#zurnal_date_doc_ot').val() : '');
		block_text_filter_zurnal_date_doc_do = ($('#zurnal_date_doc_do').val().length > 0 ? $('#zurnal_date_doc_do').val() : '');

		if(block_text_filter_zurnal_date_doc_ot.length > 0 || block_text_filter_zurnal_date_doc_do.length > 0){
			block_text_filter_zurnal_doc_period = '<p class="font-size-15">Проверка знаний за период: '+($('#zurnal_date_doc_ot').val().length > 0 ? 'от '+block_text_filter_zurnal_date_doc_ot.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '') + ($('#zurnal_date_doc_do').val().length > 0 ? ' до '+block_text_filter_zurnal_date_doc_do.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '');
			
		}else{
			block_text_filter_zurnal_doc_period = '';
		}		





		block_text_filter_zurnal_date_srok_doc_ot = ($('#zurnal_date_srok_doc_ot').val().length > 0 ? $('#zurnal_date_srok_doc_ot').val() : '');
		block_text_filter_zurnal_date_srok_doc_do = ($('#zurnal_date_srok_doc_do').val().length > 0 ? $('#zurnal_date_srok_doc_do').val() : '');

		if(block_text_filter_zurnal_date_srok_doc_ot.length > 0 || block_text_filter_zurnal_date_srok_doc_do.length > 0){
			block_text_filter_zurnal_srok_doc_period = '<p class="font-size-15">Истекает срок проверки знаний за период: '+($('#zurnal_date_srok_doc_ot').val().length > 0 ? 'от '+block_text_filter_zurnal_date_srok_doc_ot.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '') + ($('#zurnal_date_srok_doc_do').val().length > 0 ? ' до '+block_text_filter_zurnal_date_srok_doc_do.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1") : '');
			
		}else{
			block_text_filter_zurnal_srok_doc_period = '';
		}






		block_text_filter_srok_istek = ($('#pz_prosrok').val() == 1 ? $('#pz_prosrok').val() : '');
		
		if(block_text_filter_srok_istek == 1){
				block_text_filter_srok_istek ='<p class="font-size-15">Срок проверки знаний истек: да</p>';
		}		
		

		str_text_filter =block_text_filter_e_persona+block_text_filter_e_persona_dolg+block_text_filter_zurnal_doc_period+block_text_filter_srok_istek+block_text_filter_zurnal_srok_doc_period;

		$('#filter_parametrs_text').html("<p class='font-bold'>Параметры фильтра: </p>" +str_text_filter);
		
}


function zurnal_query(param){
	 
	
	var formData = new FormData();

		 formData.append('mf_zurnal_pers', $('#zurnal_pers').val());
		 formData.append('mf_zurnal_pers_dolg', $('#zurnal_pers_dolg').val());
		 formData.append('mf_zurnal_insp', $('#zurnal_insp').val());
		 formData.append('mf_zurnal_branch', $('#formBranchObject').val());
		 formData.append('mf_zurnal_podrazdelenie', $('#formPodrazdelenieObject').val());
		 formData.append('mf_zurnal_otdel', $('#formOtdelObject').val());
		 formData.append('mf_zurnal_num_doc', $('#zurnal_num_doc').val());
		 formData.append('mf_zurnal_date_doc', $('#zurnal_date_doc').val());
		 formData.append('mf_zurnal_date_doc_ot', $('#zurnal_date_doc_ot').val());
		 formData.append('mf_zurnal_date_doc_do', $('#zurnal_date_doc_do').val());
		 formData.append('mf_zurnal_fio_member', $('#zurnal_fio_member').val());
		 formData.append('mf_zurnal_srok_istek', $('#pz_prosrok').val());
		 
		if(param == 'main'){
		
			$.ajax({
				url: '/ARM/examination/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
//console.log(result);				
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					//console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_record_e').html(result);
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
				url: '/ARM/examination/filter/mf_zurnal/',
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

function zurnal_query_t(param){
	 
	
	var formData = new FormData();

		 formData.append('mf_zurnal_pers_t', $('#zurnal_pers').val());
		 formData.append('mf_zurnal_pers_dolg_t', $('#zurnal_pers_dolg').val());
		 formData.append('mf_zurnal_insp_t', $('#zurnal_insp').val());
		 formData.append('mf_zurnal_branch_t', $('#formBranchObject').val());
		 formData.append('mf_zurnal_podrazdelenie_t', $('#formPodrazdelenieObject').val());
		 formData.append('mf_zurnal_otdel_t', $('#formOtdelObject').val());
		 formData.append('mf_zurnal_num_doc_t', $('#zurnal_num_doc').val());
		 formData.append('mf_zurnal_date_doc_t', $('#zurnal_date_doc').val());
		 formData.append('mf_zurnal_date_doc_ot_t', $('#zurnal_date_doc_ot').val());
		 formData.append('mf_zurnal_date_doc_do_t', $('#zurnal_date_doc_do').val());
		 formData.append('mf_zurnal_fio_member_t', $('#zurnal_fio_member').val());
		 formData.append('mf_zurnal_srok_istek', $('#pz_prosrok').val());
		 
		if(param == 'main'){
		
			$.ajax({
				url: '/ARM/examination/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 

				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_record_t').html(result);
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
				url: '/ARM/examination/filter/mf_zurnal_t/',
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


function zurnal_query_g(param){
	 
	
	var formData = new FormData();

		 formData.append('mf_zurnal_pers_g', $('#zurnal_pers').val());
		 formData.append('mf_zurnal_pers_dolg_g', $('#zurnal_pers_dolg').val());
		 formData.append('mf_zurnal_insp_g', $('#zurnal_insp').val());
		 formData.append('mf_zurnal_branch_g', $('#formBranchObject').val());
		 formData.append('mf_zurnal_podrazdelenie_g', $('#formPodrazdelenieObject').val());
		 formData.append('mf_zurnal_otdel_g', $('#formOtdelObject').val());
		 formData.append('mf_zurnal_num_doc_g', $('#zurnal_num_doc').val());
		 formData.append('mf_zurnal_date_doc_g', $('#zurnal_date_doc').val());
		 formData.append('mf_zurnal_date_doc_ot_g', $('#zurnal_date_doc_ot').val());
		 formData.append('mf_zurnal_date_doc_do_g', $('#zurnal_date_doc_do').val());
		 formData.append('mf_zurnal_fio_member_g', $('#zurnal_fio_member').val());
		 formData.append('mf_zurnal_srok_istek', $('#pz_prosrok').val());
		 
		if(param == 'main'){
		
			$.ajax({
				url: '/ARM/examination/filter/count_items_for_pagination/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 

				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_record_g').html(result);
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
				url: '/ARM/examination/filter/mf_zurnal_g/',
				type: 'POST',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){

				$('.main_table tbody').html(result);
				preloaderEnd();

				}
			});
		}
}

function zurnal_query_personal(param){
	 
	
	var formData = new FormData();

		 formData.append('mf_zurnal_personal', $('#zurnal_pers').val());
		 formData.append('mf_zurnal_pers_dolg', $('#zurnal_pers_dolg').val());
		 formData.append('mf_zurnal_date_doc_ot', $('#zurnal_date_doc_ot').val());
		 formData.append('mf_zurnal_date_doc_do', $('#zurnal_date_doc_do').val());		 
		 formData.append('mf_zurnal_srok_istek', $('#pz_prosrok').val());
		 formData.append('mf_zurnal_date_srok_doc_ot', $('#zurnal_date_srok_doc_ot').val());
		 formData.append('mf_zurnal_date_srok_doc_do', $('#zurnal_date_srok_doc_do').val());
		 /*formData.append('mf_zurnal_insp', $('#zurnal_insp').val());
		 formData.append('mf_zurnal_branch', $('#formBranchObject').val());
		 formData.append('mf_zurnal_podrazdelenie', $('#formPodrazdelenieObject').val());
		 formData.append('mf_zurnal_otdel', $('#formOtdelObject').val());
		 formData.append('mf_zurnal_num_doc', $('#zurnal_num_doc').val());
		 formData.append('mf_zurnal_date_doc', $('#zurnal_date_doc').val());

		 formData.append('mf_zurnal_fio_member', $('#zurnal_fio_member').val());*/
		
		 
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
//console.log(result);				
					num_of_pgs = Math.ceil(result /$('#num_items_on_page').val()); 
					//console.log(num_of_pgs);
				i = 1;
				str_pgs='<span>Страницы: </span><script src="/ARM/basis/Assets/js/pagination.js"></script>';
				 while (i <= num_of_pgs) {
					str_pgs += "<li "+(i==1 ? "class='active_page'" : '')+">"+i+"</li>";
					i++;
				};
				$('#count_record_personal').html(result);
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
				url: '/ARM/basis/filter/mf_zurnal/',
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

var filterMain = {

	
	clearFilter: function(){				//очистка фильтра
	
		$('#main_block_filter select option[value="0"]').prop('selected', true);
		$('#main_block_filter input').val('');
		$('#main_block_filter input#num_items_on_page').val(100);
		$('#main_block_filter input#pz_prosrok').val('');
		$('#main_block_filter input#pz_prosrok').attr('checked',false);

			$.removeCookie('zurnal_pers');
			$.removeCookie('zurnal_pers_dolg');
			$.removeCookie('zurnal_insp');
			$.removeCookie('zurnal_branch');
			$.removeCookie('zurnal_podrazdelenie');
			$.removeCookie('zurnal_otdel');
			$.removeCookie('zurnal_num_doc');
			$.removeCookie('zurnal_date_doc_ot');
			$.removeCookie('zurnal_date_doc_do');
			$.removeCookie('zurnal_fio_member');
			$.removeCookie('zurnal_srok_istek');
			$.removeCookie('zurnal_date_srok_doc_ot');
			$.removeCookie('zurnal_date_srok_doc_do');
	},

	setFilterCookieZurnal: function(){						// Устанавливает куки для фильтра 
		/*$.cookie('formRegion', $('#formRegion').val());
		$.cookie('formDistrict', $('#formDistrict').val());
		$.cookie('formCity', $('#formCity').val());
		$.cookie('formCityZone', $('#formCityZone').val());
		$.cookie('formStreet', $('#street_unp').val());
	
		
		$.cookie('mf_num_page', 1);
		$.cookie('mf_num_items', $('#num_items_on_page').val());*/

		$.cookie('zurnal_pers', $('#zurnal_pers').val());
		$.cookie('zurnal_pers_dolg', $('#zurnal_pers_dolg').val());
		$.cookie('zurnal_insp', $('#zurnal_insp').val());
		$.cookie('zurnal_branch', $('#formBranchObject').val());
		$.cookie('zurnal_podrazdelenie', $('#formPodrazdelenieObject').val());
		$.cookie('zurnal_num_doc', $('#zurnal_num_doc').val());
		$.cookie('zurnal_date_doc', $('#zurnal_date_doc').val());
		$.cookie('zurnal_date_doc_ot', $('#zurnal_date_doc_ot').val());
		$.cookie('zurnal_date_doc_do', $('#zurnal_date_doc_do').val());
		$.cookie('zurnal_fio_member', $('#zurnal_fio_member').val());
		$.cookie('zurnal_srok_istek', $('#pz_prosrok').val());
		$.cookie('zurnal_date_srok_doc_ot', $('#zurnal_date_srok_doc_ot').val());
		$.cookie('zurnal_date_srok_doc_do', $('#zurnal_date_srok_doc_do').val());
		
	}
	

}

