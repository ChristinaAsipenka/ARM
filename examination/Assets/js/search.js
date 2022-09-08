$(document).ready(function(){
	
	$('.clear_field').click(function(event){
		event.preventDefault(); 
		
		if(event.which == 1){
			 
		
		//if($("#search").val() > 0) {
			$("#search").val('');
			$('.clear_field').fadeOut();
			$('#pre-result').fadeOut();
			$('#search_result').html('');
		}
	});

	
	$("#search").bind("change keyup click input", function(event) {
			  // получаем то, что написал пользователь
        var searchString    = $("#search").val();
		
        // формируем строку запроса
       
		if(searchString.length > 0) {
			$('.clear_field').fadeIn();
			$('.clear_field').blur();
		}

		
		if(event.keyCode == 13){
			event.preventDefault();		
			mainSearch();
			
		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if($("#pre-result").is(":visible")){
			
				$('button.btn_add_fields').blur();
				
				var pre_result_list = Array.from($("#pre-result li"));
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
				
				$("#search").val(pre_result_list[curElem].innerHTML);
			
			}
		} else {
			var searchString    = $("#search").val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $("#search").attr('searchdata');
	
			$("#pre-result li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/examination/search/",
						data: data,
					   success: function(html){
							$("#pre-result").fadeIn();
							
							$("#pre-result").append(html);
							$("#pre-result").focus();
							curElem = -1;
					  }
					});
				}else{
					 $("#pre-result").fadeOut();
				}

				return false;
		}
		
	 });
	

	
	$('#pre-result').mouseleave(function(){
	  $('#pre-result').hide();

	});
	
	$('#pre-result').mouseover(function(){
	//  console.log('focus');
	  $("#pre-result").focus();

	});
	

	$("#pre-result").on("click", "li", function(){
		//console.log('here');
		$("#search").val($(this).text());
		
			mainSearch();
		
	});


})


function mainSearch(){
	var searchString    = $("#search").val().trim();

	var data = 'searchString='+ searchString;
	data =data + '&fullSearch=1';
    data = data + '&searchData=' + $("#search").attr('searchdata'); 
	data = data + '&sbobj=' + $("#search").attr('sbobj');
	
		$(".result_html").remove();
		
        if(searchString.length >= 3){
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/ARM/examination/search/",
                data: data,
				success: function(html){ // запустится после получения результатов
					//$("#search").blur();
					$("#search_result").empty();
                    $("#search_result").append(html);
					
				}
            });
        }
	$("#pre-result").fadeOut();
    return false;
}
