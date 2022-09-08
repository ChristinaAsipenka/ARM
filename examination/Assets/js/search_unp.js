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

	
	$("#search_unp").bind("change keyup click input", function(event) {
		
			event.preventDefault(); 

		  // получаем то, что написал пользователь
        var searchString    = $("#search_unp").val();


        // формируем строку запроса
       
		if(searchString.length > 0) {
			$('.clear_field').fadeIn();
			$('.clear_field').blur();
		}

		
		if(event.keyCode == 13){
			
	
			event.preventDefault(); 

			mainSearchUnp();
		
			
			
		
		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if($("#pre-result_unp").is(":visible")){
				
				$('button.btn_add_fields').blur();
				
				var pre_result_list = Array.from($("#pre-result_unp li"));
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
				
				console.log(pre_result_list.length);
				console.log(curElem);
				
				$("#search_unp").val(pre_result_list[curElem].innerHTML);
			
			}
		}else{
		
		
			var searchString    = $("#search_unp").val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $("#search_unp").attr('searchdata');
		
	//console.log(data);
			$("#pre-result_unp li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/examination/search/",
						data: data,
					   success: function(html){
						  // console.log('res');
							$("#pre-result_unp").fadeIn();
							
							$("#pre-result_unp").append(html);
							//$("#pre-result_unp").focus();
							curElem = -1;
					  }
					});
				}else{
					 $("#pre-result_unp").fadeOut();
				}

				return false;
		}
		
	 });
	

	
	$('#pre-result_unp').mouseleave(function(){
	  $('#pre-result_unp').hide();

	});
	
	$('#pre-result_unp').mouseover(function(){
	//  console.log('focus');
	  $("#pre-result_unp").focus();

	});
	

	$("#pre-result_unp").on("click", "li", function(){
		//console.log('here');
		$("#search_unp").val($(this).text());
		
			mainSearchUnp();
		
	   
		
	});


})


function mainSearchUnp(){
	

	var searchString    = $("#search_unp").val().trim();
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
					$("#search_result_unp").empty();
                    $("#search_result_unp").append(html);
					
				}
            });
        }
	$("#pre-result_unp").fadeOut();
    return false;
}
