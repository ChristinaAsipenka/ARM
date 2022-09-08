$(document).ready(function(){
	
	$('.clear_field').click(function(event){
		event.preventDefault(); 
		
		if(event.which == 1){
			 
		
		//if($("#search_unp").val() > 0) {
			$("#search_unp").val('');
			$('.clear_field').fadeOut();
			$('#pre-result_unp').fadeOut();
			$('#search_result_unp').html('');
		}
	});

	
	$(".commission_member .search").bind("change keyup click input", function(event) {
		
			event.preventDefault(); 

		  // получаем то, что написал пользователь
       // var searchString    = $("#search_unp").val();
        var searchString    = $(this).val();
		
		var parenBlock = $(this).parent().parent(); // внешний блок с элементами для поиска (div с классом commission_member)
		var preResult = parenBlock.find('.pre-result'); // блок для выпадающего списка (ul с классом pre-result)
		var userPosition = parenBlock.find('.user_position'); // 
		var userPodrazd = parenBlock.find('.user_podrazd'); // 
		var user_id = parenBlock.find('.user_id'); // 
      
	  

        // формируем строку запроса
       
		if(searchString.length > 0) {
			$('.clear_field').fadeIn();
			$('.clear_field').blur();
		}

		
		if(event.keyCode == 13){
			
	
			event.preventDefault(); 

		//	mainSearchFio(searchString);
		
			preResult.fadeOut();
			
		
		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if(preResult.is(":visible")){
				
				//$('button.btn_add_fields').blur();
				
				var pre_result_list = Array.from(preResult.children("li"));
				$(pre_result_list[curElem]).removeClass('active');
				
				if(event.keyCode == 40){

					curElem = curElem + 1;
					
					if(curElem == pre_result_list.length){
						curElem = 0;
					}

					
				}else{
					
					curElem = curElem - 1;
				}
				
				if(curElem > pre_result_list.length){
					curElem = 0;
				}
				if(curElem < 0){
					curElem = pre_result_list.length;
				}
				if(curElem == pre_result_list.length){
					curElem = curElem - 1;
				}
				
				$(pre_result_list[curElem]).addClass('active'); 
				$(pre_result_list[curElem]).focus(); 
				
			//	console.log(pre_result_list.length);
				//console.log(curElem);
				
				$(this).val(pre_result_list[curElem].innerHTML);
				$(userPosition).text($(pre_result_list[curElem]).attr('dolgnost'));
				$(userPodrazd).text($(pre_result_list[curElem]).attr('podrazd'));
				$(user_id).val($(pre_result_list[curElem]).attr('user_id'));

			}
		}else{
		
	
			var searchString    = $(this).val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $(this).attr('searchdata');
		
	//console.log(data);
			$("#pre-result_unp li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/examination/search/",
						data: data,
					   success: function(html){
						  // console.log(html);
							preResult.empty();
							preResult.fadeIn();
							
							preResult.append(html);
							//$("#pre-result_unp").focus();
							curElem = -1;
					  }
					});
				}else{
					preResult.fadeOut();
				}

				return false;
		}
		
	 });
	

	
	$('.pre-result').mouseleave(function(){
	  $(this).hide();

	});
	
	$('.pre-result').mouseover(function(){
	//  console.log('focus');
	  $(this).focus();

	});
	

	$(".pre-result").on("click", "li", function(){
		
		var parenBlock = $(this).parent().parent().parent(); // внешний блок с элементами для поиска (div с классом commission_member)
		var inputSearch = parenBlock.find('.search'); // блок для выпадающего списка (ul с классом pre-result)
		var inputPosition = parenBlock.find('.user_position'); //
		var inputPodrazd = parenBlock.find('.user_podrazd'); //
		var user_id = parenBlock.find('.user_id'); // 
		
		inputSearch.val($(this).text());
		user_id.val($(this).attr('user_id'));
		inputPosition.text($(this).attr('dolgnost'));
		inputPodrazd.text($(this).attr('podrazd'));
		$(".pre-result").fadeOut();
		//console.log($(this).attr('podrazd'));
	});

})

function mainSearchFio(searchString){
	

	var searchString    = searchString;
	var data = 'searchString='+ searchString;
	data =data + '&fullSearch=1';
    data = data + '&searchData=' + $("#search_unp").attr('searchdata'); 
	data = data + '&sbobj=' + $("#search_unp").attr('sbobj');
	
		$(".result_html").remove();
		
        if(searchString.length >= 3){
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/ARM/examination/search/",
                data: data,
				success: function(html){ // запустится после получения результатов
					//$("#search_unp").blur();
					//console.log(html);
					$("#search_result_unp").empty();
                    $("#search_result_unp").append(html);
					
				}
            });
        }
	$("#pre-result_unp").fadeOut();
    return false;
}

