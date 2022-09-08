$(document).ready(function(){
	
	$('.clear_field').click(function(){
		//if($("#search").val() > 0) {
			$("#heatSource").val('');
			$('.clear_field').fadeOut();
			$('#pre-resultSource').fadeOut();
		//}
	});
	
	
	$("#heatSource").bind("change keyup click input", function(event) {
			event.preventDefault(); 
			
		  // получаем то, что написал пользователь
        var searchString    = $("#heatSource").val();

        // формируем строку запроса
       
		/*if(searchString.length > 0) {
			$('.clear_field').fadeIn();
		}*/

		
		if(event.keyCode == 13 || $("#heatSource").lenght == 9){
			mainSearchObj();
		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if($("#pre-resultSource").is(":visible")){
				var pre_result_list = Array.from($("#pre-resultSource li"));
				$(pre_result_list[curElem]).removeClass('active');
				
				if(event.keyCode == 40){
					curElem = curElem + 1;
				}else{
					
					curElem = curElem - 1;
				}
				
				if(curElem > pre_result_list.length){
					curElem = 0;
				}
				if(curElem < 0){
					curElem = pre_result_list.length;
				}
				
				$(pre_result_list[curElem]).addClass('active');
				$("#heatSource").val(pre_result_list[curElem].innerHTML);
			}
		}else{
		
		
			var searchString    = $("#heatSource").val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $("#heatSource").attr('searchdata');
	

			$("#pre-resultSource li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/basis/search/",
						data: data,
					   success: function(html){ 
							$("#pre-resultSource").fadeIn();
							$("#pre-resultSource").append(html);
							curElem = -1;
					  }
					});
				}else{
					 $("#pre-resultSource").fadeOut();
				}

				return false;
		}
		
		
	 });
	
	$("#pre-resultSource").hover(function(){
		$("#heatSource").blur();
	});

	$("#pre-resultSource").on("click", "li", function(){
		$("#heatSource").val($(this).text()); 
		mainSearchObj();
	   
		
	});

})

function mainSearchObj(){
	var searchString    = $("#heatSource").val().trim();
	var data = 'searchString='+ searchString;
	data =data + '&fullSearch=1'; // только для проверки уникальности УНП
    data = data + '&searchData=' + $("#heatSource").attr('searchdata'); 


		$(".result_html").remove();
        if(searchString.length >= 3){
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/ARM/basis/search/",
                data: data,
				success: function(html){ // запустится после получения результатов
					//$("#search").blur();
					//$("#search_result").empty();
                   // $("#search_result").append(html);
					//console.log(html.length);
					
					$("#search_resultSource").empty();
						
					if(html.length > 0){
						$("#search_resultSource").append(html);
						$("#heatSource").val('');
					}
					
					
				}
            })
        }
		 $("#pre-resultSource").fadeOut();
        return false;
}