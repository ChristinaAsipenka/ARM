$(window).ready(function() {
	
	$('#pagination li').click(function(){
		$('#pagination li.active_page').removeClass('active_page');
		$(this).addClass('active_page');
		//console.log(window.location.href);
		$.cookie('mf_num_page', $('#pagination li.active_page').text());
		/// костыльное решение, но лучше не придумала... в зависимости от того, на какой странице работаем с пагинацией делаем тот или иной запрос
		if(window.location.href.indexOf('filter') !== -1){
			obj_query('page');
		};
		
		if(window.location.href.indexOf('unp') !== -1){
			unp_query('page');
		}
		
		if(window.location.href.indexOf('individual_persons') !== -1){
			indpers_query('page');
		}
		if(window.location.href.indexOf('zurnal_e') !== -1){
			zurnal_query('page');
		}
		if(window.location.href.indexOf('zurnal_t') !== -1){
			zurnal_query_t('page');
		}
		if(window.location.href.indexOf('zurnal_g') !== -1){
			zurnal_query_g('page');
		}
		if(window.location.href.indexOf('srok') !== -1){
			zurnal_query_personal('page');
		}
		
	});
})