var myTabs = {
	
	showContent: function(n){
	
		new_name_content = "content-"+n;

		$('input[name=uzel]+label').removeClass('active');
		$('.uzel_content').css({'display': 'none'});
		$('.uzel_razdel').css({'display': 'none'});
		 
		$('#'+new_name_content+'.uzel_content').css({'display': 'block'});
		$('#'+new_name_content+' .uzel_razdel').css({'display': 'block'});
		$('#'+new_name_content+' .uzel_name').css({'display': 'block'});

	},
	
	showContentTable: function(workId){
		
		var contenido=$('#'+workId).next(".accordion-content");
		//console.log($(workId).find(".accordion-content").html());

        if($('#'+workId).find(".accordion-content").css("display")=="none"){ //open		
          $('#'+workId).find(".accordion-content").slideDown(250);			
          $('#'+workId).find(".accordion-titulo-tab").addClass("open");
        }
        else{ //close		
          $('#'+workId).find(".accordion-content").slideUp(250);
          $('#'+workId).find(".accordion-titulo-tab").removeClass("open");	
        }
	},
	
	updStr: function(updId){
	
		var formData = new FormData();
		
		formData.append('id',  updId);		
		formData.append('id_uzel_block', $('#t_spr_uzel_block'+'-'+updId).val()); // select наименование раздела объекта тепловой энергии
		formData.append('id_systemheat_water', $('#t_systemheat_water'+'-'+updId).val()); // select тип системы отопления
		formData.append('id_systemheat_dependent', $('#t_systemheat_dependent'+'-'+updId).val()); // select схема присоединения
		formData.append('id_systemheat_type_op', $('#t_systemheat_type_op'+'-'+updId).val()); // select вид отопительных приборов
		formData.append('id_gvs_open', $('#t_gvs_open'+'-'+updId).val()); // select тип схемы горячего водоснабжения
		formData.append('info', $('#name_uzel'+'-'+updId).val()); // Информация об узле textarea
			 
			 $.ajax({
					url: '/ARM/basis/tabs/update/',
					type: "POST",
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
						console.log(result);
					}
					
					});
	},
	
	delTab: function(idTab){
	
		if(!confirm('Вы действительно хотите удалить данную вкладку?')) {
            return false;
        }
	
	
		var formData = new FormData();
	    //formData.append('item_id', $('#formObjectId').val());
	    formData.append('tab_id', idTab);
	


		$('input[id=uzel-'+idTab+']').remove();
		$('label[for=uzel-'+idTab+']').remove();
		$('div[id=content-'+idTab+']').remove();
		
		
		if($('.uzel_content').length == 1){
			
			$('#content-1.uzel_content').css({'display': 'none'});
			$('#empty_content').css({'display': 'block'});
		}else{
	
			id_first = $('input[name=uzel]').first().attr('id').split('-').pop(); 
				//console.log(id_first);
	
				$('input[name=uzel]').first().attr('checked',true);
				$('input[name=uzel]+label').first().addClass('active');
				$('#content-'+id_first+'.uzel_content').css({'display': 'block'});
				$('#content-'+id_first+' .uzel_razdel').css({'display': 'block'});
				$('#content-'+id_first+' .uzel_name').css({'display': 'block'});
		
		}
	
			
		

		
	
		
		$.ajax({
			url: '/ARM/basis/tabs/delete/',
			type: "POST",
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function(){

			},
			success: function(result){
				console.log(result);
			}
					
		});
		
	}
}