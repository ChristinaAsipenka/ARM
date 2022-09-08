$(window).ready(function() {
	
	$('#pagination li').click(function(){
		$('#pagination li.active_page').removeClass('active_page');
		$(this).addClass('active_page');
		//console.log(window.location.href);
		/// костыльное решение, но лучше не придумала... в зависимости от того, на какой странице работаем с пагинацией делаем тот или иной запрос
		if(window.location.href.indexOf('filter') !== -1){
			obj_query('page');
		};
		
		if(window.location.href.indexOf('unp') !== -1){
			unp_query('page');
		}
		
	});
})