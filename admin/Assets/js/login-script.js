$(document).ready(function(){


//////////////////////////// Живой поиск в строке для ввода логина при авторизации /////////////////////////////////////////////////////////////////////
$('input[name="login"]').bind("change keyup input click", function(event) {
event.preventDefault();
console.log(event.keyCode);
if(event.keyCode != 40 && event.keyCode != 38 && event.keyCode != 13){	

    if($(this).val()){
		my_str = $(this).val();
		my_url='/ARM/admin/preAuth/';

        $.ajax({
            type: 'POST',
			cache: false,
            url: my_url,
			datatype: 'JSON',
			data:{referal: my_str},
            success: function(data){
		
               $(".login_search_result").html(data).fadeIn();
				
				if(event.keyCode != 13  && event.keyCode != undefined){
					
					curElem = -1;	
				}
			}
       })
    }

}

if(event.keyCode == 40 || event.keyCode == 38 || event.keyCode == 13 ){	
	
			
			if($(".login_search_result").is(":visible")){
				var pre_result_list = Array.from($(".login_search_result li"));
				$(pre_result_list[curElem]).removeClass('active');
				
			//	console.log($(pre_result_list));
				//console.log(curElem);
				if(event.keyCode == 40 || event.keyCode == 38){
					if(event.keyCode == 40){
						curElem = curElem + 1;
					}else{
						
						curElem = curElem - 1;
					}
					
					if(curElem >= pre_result_list.length){
						curElem = 0;
					}
					if(curElem < 0){
						curElem = pre_result_list.length-1;
					}
					
					$(pre_result_list[curElem]).addClass('active');
				//console.log(pre_result_list[curElem].innerHTML);
					$("input[name='login']").val(pre_result_list[curElem].innerHTML);
				
				}
		
				if(event.keyCode == 13){
					
					if($(".login_search_result").is(":visible")){
				
						$("input[name='login']").val(pre_result_list[curElem].innerHTML);
					
						//$(".who_id").val($(pre_result_list[curElem]).attr('id_user')) ;
						//$("select[name='cod_branch'] option[value="+$(pre_result_list[curElem]).attr('user_cod_branch')+"]").attr("selected","selected");
						
					}
					$(".login_search_result").fadeOut();
				}
			
			}
		}





$(".login_search_result").hover(function(){
	$("input[name='login']").blur();
});

$(".login_search_result").on("click", "li", function(){
	$("input[name='login']").val($(this).text()); 
	//$(".who_id").val($(this).attr('id_user'));

	//$("select[name='cod_branch'] option[value="+$(this).attr('user_cod_branch')+"]").attr("selected","selected");
  $(".login_search_result").fadeOut();
	
});


});

	$('form').submit(function(){
		if($(".search_result").is(":visible") && $("input[name='password']").length > 0){

			event.preventDefault();	
		}
	})

 })