$(document).ready(function(){
	
	$('.clear_field').click(function(){
		//if($("#search").val() > 0) {
			$("#search").val('');
			$("#search_indpers").val('');
			$('.clear_field').fadeOut();
			$('#pre-result').fadeOut();
			$('#search_result').html('');
			$('#pre-result_ind_pers').fadeOut();
			$('#search_result_ind_pers').html('');
			
			
		//}
	});

	
	$("#search").bind("change keyup click input", function(event) {
			
			event.preventDefault(); 
			
		  // получаем то, что написал пользователь
        var searchString    = $("#search").val();


        // формируем строку запроса
       
		if(searchString.length > 0) {
			$('.clear_field').fadeIn();
		}

		
		if(event.keyCode == 13){
			
			mainSearch();

		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if($("#pre-result").is(":visible")){
				var pre_result_list = Array.from($("#pre-result li"));
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
				$("#search").val(pre_result_list[curElem].innerHTML);
				
				if($("#search").attr('searchdata') == 'responsible_person_fio'){
					$("#id_rp").val($(pre_result_list[curElem]).attr('id_rp'));
				}
			}
		}else{
		
		
			var searchString    = $("#search").val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $("#search").attr('searchdata');
			data = data + '&sbobj=' + $("#search").attr('sbobj');
	//console.log(data);
			$("#pre-result li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/basis/search/",
						data: data,
					   success: function(html){
						  // console.log('res');
							$("#pre-result").fadeIn();
							
							$("#pre-result").append(html);
						//	$("#pre-result").focus();
							curElem = -1;
					  }
					});
				}else{
					 $("#pre-result").fadeOut();
				}

				return false;
		}
		
		
	 });
	
	/*$("#pre-result").hover(function(){
		$("#pre-result").blur();
	});*/
	
	/*$('#pre-result').mouseleave(function(){
	  $('#pre-result').hide();

	});*/
	
	$('#pre-result').mouseover(function(){
	//  console.log('focus');
	  $("#pre-result").focus();

	});
	
	$("#pre-result").focus(function(){
	 // console.log('focus');
	

	});

	$("#pre-result").on("click", "li", function(){
		//console.log('here');
		$("#search").val($(this).text());
		
			mainSearch();

	});








	$("#search_indpers").bind("change keyup click input", function(event) {
			
			event.preventDefault(); 
			
		  // получаем то, что написал пользователь
        var searchString    = $("#search_indpers").val();


        // формируем строку запроса
       
		if(searchString.length > 0) {
			$('.clear_field').fadeIn();
		}

		
		if(event.keyCode == 13){
			mainSearchIndPers();
		}else if(event.keyCode == 40 || event.keyCode == 38){	
			if($("#pre-result_ind_pers").is(":visible")){
				var pre_result_list = Array.from($("#pre-result_ind_pers li"));
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
				$("#search_indpers").val(pre_result_list[curElem].innerHTML);
			}
		}else{
		
			var searchString    = $("#search_indpers").val().trim();
		
			var data = 'searchString='+ searchString;
			data = data + '&fullSearch=0';
			data = data + '&searchData=' + $("#search_indpers").attr('searchdata');
			data = data + '&sbobj=' + $("#search_indpers").attr('sbobj');
	//console.log(data);
			$("#pre-result_ind_pers li").remove();
				if(searchString.length >= 3) {
					$.ajax({
						type: "POST",
						url: "/ARM/basis/search/",
						data: data,
					   success: function(html){ 
							$("#pre-result_ind_pers").fadeIn();
							$("#pre-result_ind_pers").append(html);
							curElem = -1;
					  }
					});
				}else{
					 $("#pre-result_ind_pers").fadeOut();
				}

				return false;
		}
		
		
	 });

	$("#pre-result_ind_pers").hover(function(){
		$("#search_indpers").blur();
	});
	

	$("#pre-result_ind_pers").on("click", "li", function(){
		$("#search_indpers").val($(this).text()); 
		mainSearchIndPers();
		
	   
		
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
                url: "/ARM/basis/search/",
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



function mainSearchIndPers(){
	
	var searchString    = $("#search_indpers").val().trim();
	var data = 'searchString='+ searchString;
	data =data + '&fullSearch=1';
    data = data + '&searchData=' + $("#search_indpers").attr('searchdata'); 
	data = data + '&sbobj=' + $("#search_indpers").attr('sbobj');
		$(".result_html").remove();
        if(searchString.length >= 3){
            // делаем ajax запрос
            $.ajax({
                type: "POST",
                url: "/ARM/basis/search/",
                data: data,
				success: function(html){ // запустится после получения результатов
					//$("#search").blur();
					$("#search_result_ind_pers").empty();
                    $("#search_result_ind_pers").append(html);
					
				}
            });
        }
	
	$("#pre-result_ind_pers").fadeOut();
    return false;
}