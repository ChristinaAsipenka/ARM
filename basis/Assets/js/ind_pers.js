
var ind_pers = {
    ajaxMethod: 'POST',

    add: function() {
		event.preventDefault();
        var formData = new FormData();
		/*formData.append('id_reestr_unp', $('#formUnpId').val());*/
		formData.append('firstname', $('#ind_pers_firstname').val());
		formData.append('secondname', $('#ind_pers_secondname').val());
		formData.append('lastname', $('#ind_pers_lastname').val());
		formData.append('identification_number', $('#ind_pers_identification_number').val());

		error = ind_pers.checkFields();
//console.log(error);
		if(error == 0){		
		  $.ajax({
				url: '/ARM/basis/individual_persons/add/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
				
				alert('Данные сохранены');
				 //window.location = '/ARM/basis/responsible_persons/';
				 window.history.back();

				}
			});
		}else{
					var err_text = "";
					if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false;
		};	
    },

    update: function() {
		event.preventDefault();
        var formData = new FormData();

        formData.append('ind_pers_id', $('#ind_pers_id').val());
		/*formData.append('id_reestr_unp', $('#formUnpId').val());*/
		formData.append('firstname', $('#ind_pers_firstname').val());
		formData.append('secondname', $('#ind_pers_secondname').val());
		formData.append('lastname', $('#ind_pers_lastname').val());
		formData.append('identification_number', $('#ind_pers_identification_number').val());

		
		
		error = ind_pers.checkFields();

		if(error == 0){		

			$.ajax({
				url: '/ARM/basis/individual_persons/update/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					alert('Данные сохранены');
					//window.location = '/ARM/basis/responsible_persons/list/'+$('#formUnpId').val();
					window.history.back();
				  //console.log(result);
				}
			});
		}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>"
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
		};	
    },
	
	checkFields: function(){
		if($("#formPage").attr("mode") == "new_individual_person" || $("#formPage").attr("mode") == "edit_individual_person"){
			var fields = ["ind_pers_secondname", "ind_pers_firstname", "ind_pers_lastname", "ind_pers_identification_number"];
		}
	
		var error = 0; // флаг заполнения обязательных полей

		 $(".form").find(":input").each(function(){ // проверяем каждое поле формы
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
				
					if(!$.trim( $(this).val() ) ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
				
			 }
		});
		$(".form").find("select").each(function(){ // проверяем каждое поле формы
	
			 for(var i = 0; i < fields.length; i++){  // проходимся в цикле по массиву обязательных полей
				if($(this).attr("name") == fields[i]){	// если проверяемое поле есть в списке обязательных
					if( $(this).val() == 0 ){      // если поле не заполнено
						 $(this).addClass("formError");
						 error = 1;
					}else{
						 $(this).removeClass("formError");
					}	
				}
			 }
			 
		});
		return error ;
	},
	
	

	remove: function(itemId) {
       
	    if(!confirm('Вы действительно хотите удалить это физическое лицо?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
	  
	    if (itemId < 1) {
            return false;
        }
	  
		$.ajax({
				url: '/ARM/basis/individual_persons/checkSbj/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					if(result == 0){
						$.ajax({
							url: '/ARM/basis/individual_persons/removeItem/',
							type: 'POST',
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
								//console.log(result);
								$('.item-' + itemId).remove();
							}
						});
					}else{
						alert('Удаление невозможно');
					}
			}
			});

	},
	
	IndPersInfo: function(indpersId){
		
		var formData = new FormData();
		formData.append('subject_id', resppersId);
		
		$.ajax({
				url: '/ARM/basis/individual_persons/info/'+indpersId,
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					data = $.parseJSON(result);										
					$('#ind_pers_fio').html(data['individual_persons']['firstname']+' '+data['individual_persons']['secondname']+' '+data['individual_persons']['lastname']);

					$('#ind_pers_secondname').html(data['individual_persons']['firstname']);
					$('#ind_pers_firstname').html(data['individual_persons']['secondname']);
					$('#ind_pers_lastname').html(data['individual_persons']['lastname']);
					$('#ind_pers_post').html(data['individual_persons']['identification_number']);

					/*var now = data['individual_persons']['post_data'];
					if (now != null){
						d1 = now.replace(/(\d{4})-(\d\d)-(\d\d)/, "$3.$2.$1");
						$('#resp_pers_post_data').html(d1);
					}else{
						$('#resp_pers_post_data').html("");
					}*/
	
				}
			});
		
	}
	
	/*search_hide_show: function(value) {
		if(value == 1){
			
			
				var is_otv = $('#flag_insp').val();
				var name_unp = $('#formUnpId').val();

				
				
				if(name_unp > 0){
					if(is_otv == 1){	
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', false);
						$('#l1').html("Ответственное лицо за электрохозяйство:");
						$('div[id="otv_sob2"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob2] select').prop('disabled', false);
						$('#l2').html("Ответственное лицо за электрохозяйство (заместитель):");
					}else if(is_otv == 2){
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', false);
						$('#l1').html("Ответственное лицо за тепловое хозяйство:");						
					}else if(is_otv == 3){
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', false);
						$('#l1').html("Ответственное лицо за газовое хозяйство:");
					}			
					$('#otv_add').css({'display': 'inline-block'});
					$('div#but_otv_add a.submit_cancel').css({'display': 'inline-block'});
					$('#error_otv_unp1').css({'display': 'none'});
					$('#error_otv_unp2').css({'display': 'none'});
				}else{
					if(is_otv == 1){
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', true);
						$('#l1').html("Ответственное лицо за электрохозяйство:");
						$('div[id="otv_sob2"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob2] select').prop('disabled', true);
						$('#l2').html("Ответственное лицо за электрохозяйство (заместитель):");
					}else if(is_otv == 2){
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', true);
						$('#l1').html("Ответственное лицо за тепловое хозяйство:");						
					}else if(is_otv == 3){
						$('div[id="otv_sob1"]').css({'display': 'block'});
						$('div[id=dis_name_otv_sob1] select').prop('disabled', true);
						$('#l1').html("Ответственное лицо за газовое хозяйство:");	
					}			
					$('#error_otv_unp1').html("(в карточке потребителя не заполнено юридическое лицо)");
					$('#error_otv_unp2').html("(в карточке потребителя не заполнено юридическое лицо)");
					$('#otv_add').css({'display': 'none'});
					$('div#but_otv_add a.submit_cancel').css({'display': 'none'});
				}
		



			var formData = new FormData();
				formData.append('unp_otv_id', $('#formUnpId').val());
				$.ajax({
					url: '/ARM/basis/responsible_persons/ListRespPers/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){
						//console.log(result);
						//$('.item-' + itemId).remove();
						$('#name_otv_sob1').html(result);
						$('#name_otv_sob2').html(result);
					}
			});
			
			
			

			//$('div[id="otv_sob"]').css({'display': 'block'});
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			
			//$('#otv_add').css({'display': 'inline-block'});
			//$('div#but_otv_add a.submit_cancel').css({'display': 'inline-block'});
		}else if(value == 3){
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'block'});
			$("select[name='name_otv_sob']").val('');
			
				var otv_instr_dir_fam = $('#dir_fam').val().length;
				var otv_instr_dir_name = $('#dir_name').val().length;
				var otv_instr_dir_otch = $('#dir_otch').val().length;
				if(otv_instr_dir_fam > 0 && otv_instr_dir_name > 0 && otv_instr_dir_otch > 0){
					$('#name_otv_instr').val($('#dir_fam').val()+' '+$('#dir_name').val()+' '+$('#dir_otch').val());
					$('#otv_add').css({'display': 'inline-block'});
					$('div#but_otv_add a.submit_cancel').css({'display': 'inline-block'});
					$('#data_dog_instr').prop('disabled', false);
				}else{
					$('#error_otv_instr').html("(в карточке потребителя не заполнены ФИО рукодителя)");
					$('#otv_add').css({'display': 'none'});
					$('#data_dog_instr').prop('disabled', true);
					$('div#but_otv_add a.submit_cancel').css({'display': 'none'});
					
				}
			
			
		}else if(value == 2){
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			$('div[id="otv_stor"]').css({'display': 'block'});
			$('div[id="otv_num_pr_stor"]').css({'display': 'none'});
			$('div[id="otv_num_dog_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			$('#otv_add').css({'display': 'inline-block'});
			$('div#but_otv_add a.submit_cancel').css({'display': 'inline-block'});
		
		}else{
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob"]').css({'display': 'none'});
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			$('div[id="otv_num_pr_stor"]').css({'display': 'none'});
			$('div[id="otv_num_dog_stor"]').css({'display': 'none'});
			$('#id_stor_otv').val('');
			$('#stor_otv').html('');
			$('#num_pr').val('');
			$('#data_pr').val('');
			$('#num_stor_dog').val('');
			$('#data_stor_dog').val('');
			$("select[name='name_otv_sob']").val('');
			$('#otv_add').css({'display': 'none'});
			$('div#but_otv_add a.submit_cancel').css({'display': 'none'});
		}
		
	},*/
	
	/*num_dog_otv1_hide: function(value) {
		//console.log(value);
		if(value == 0){
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			
		}else{
			$('div[id="otv_num_dog_sob1"]').css({'display': 'block'});
		}
		
	},*/
	/*num_dog_otv2_hide: function(value) {
		if(value == 0){
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			
		}else{
			$('div[id="otv_num_dog_sob2"]').css({'display': 'block'});
		}
		
	},	*/
	/*insert_otv: function(otv_pos) {	
		////////////////////////// переносит данные на форму для ответственного за электрохозяйство 		
		if(otv_pos == 1){                
		
			otv_type_e = $('#type_otv').val();
			
			//otv_e1_id = $('#name_otv_sob1').val();                  //собственный
			otv_e2_id = $('#name_otv_sob2').val();
			otv_e1 =  $('#name_otv_sob1 option:selected').text();
			otv_e2 =  $('#name_otv_sob2 option:selected').text();
			//pr_num_e1 =  $('#num_pr1').val();
			//pr_data_e1 =  $('#data_pr1').val();
			pr_num_e2 =  $('#num_pr2').val();
			pr_data_e2 =  $('#data_pr2').val();			
			dog_num_e =  $('#num_stor_dog').val();
			dog_data_e =  $('#data_stor_dog').val();
			
			
			instr_otv_e =  $('#name_otv_instr').val();
			instr_data_e =  $('#data_instr').val();					//по инструктажу

			otv_st =  $('#stor_otv').text();

			if($('#name_otv_sob1').val() > 0){
				otv_e1_id = $('#name_otv_sob1').val();
			}else if($('#id_stor_otv').val() > 0){
				otv_e1_id = $('#id_stor_otv').val();
			}else{
				otv_e1_id = "";
			}
			
			if($('#num_pr1').val() > 0){
				pr_num_e1 = $('#num_pr1').val();
			}else if($('#num_pr').val() > 0){
				pr_num_e1 = $('#num_pr').val();
			}else{
				pr_num_e1 = "";
			}

			if($('#data_pr1').val() !== ""){
				pr_data_e1 = $('#data_pr1').val();
			}else if($('#data_pr').val() !== ""){
				pr_data_e1 = $('#data_pr').val();
			}else{
				pr_data_e1 = "";
			}

			$('#otv_type_e').val(otv_type_e);
			$('#otv_e1_id').val(otv_e1_id);
			$('#otv_e2_id').val(otv_e2_id);
			$('#order_num_e1').val(pr_num_e1);
			$('#order_data_e1').val(pr_data_e1);
			$('#order_num_e2').val(pr_num_e2);
			$('#order_data_e2').val(pr_data_e2);			
			$('#dog_num_e').val(dog_num_e);
			$('#dog_data_e').val(dog_data_e);		
			$('#instr_data_e').val(instr_data_e);


			if(otv_type_e == 1){								// вывод информации на форму в зависимости от выбранного типа ответственного	
				$('#otv_e1').html(otv_e1);
				$('#otv_e2').html(otv_e2);
			}else if(otv_type_e == 3){
				$('#otv_e1').html(instr_otv_e);
				$('#otv_e2').html('');
			}else if(otv_type_e == 2){
				$('#otv_e1').html(otv_st);
				$('#otv_e2').html('');
			}
	
		}
	
 /////////////////////////// переносит данные на форму для ответственного за теплохозяйство
		if(otv_pos == 2){                 
		
			otv_type_t = $('#type_otv').val();
			
			otv_t_id = $('#name_otv_sob1').val();                  //собственный
			otv_t =  $('#name_otv_sob1 option:selected').text();
			pr_num_t =  $('#num_pr1').val();
			pr_data_t =  $('#data_pr1').val();		
			dog_num_t =  $('#num_stor_dog').val();
			dog_data_t =  $('#data_stor_dog').val();
			
			otv_st =  $('#stor_otv').text();

			
			
			if($('#name_otv_sob1').val() > 0){
				otv_t_id = $('#name_otv_sob1').val();
			}else if($('#id_stor_otv').val() > 0){
				otv_t_id = $('#id_stor_otv').val();
			}else{
				otv_t_id = "";
			}
			
			if($('#num_pr1').val() > 0){
				pr_num_t = $('#num_pr1').val();
			}else if($('#num_pr').val() > 0){
				pr_num_t = $('#num_pr').val();
			}else{
				pr_num_t = "";
			}

			if($('#data_pr1').val() !== ""){
				pr_data_t = $('#data_pr1').val();
			}else if($('#data_pr').val() !== ""){
				pr_data_t = $('#data_pr').val();
			}else{
				pr_data_t = "";
			}

			$('#otv_type_t').val(otv_type_t);
			$('#otv_t_id').val(otv_t_id);
			$('#order_num_t').val(pr_num_t);
			$('#order_data_t').val(pr_data_t);			
			$('#dog_num_t').val(dog_num_t);
			$('#dog_data_t').val(dog_data_t);		



			if(otv_type_t == 1){								// вывод информации на форму в зависимости от выбранного типа ответственного	
				$('#otv_t').html(otv_t);
			}else if(otv_type_t == 2){
				$('#otv_t').html(otv_st);
			}
	
		}

 /////////////////////////// переносит данные на форму для ответственного за газовое хозяйство
		if(otv_pos == 3){                 
		
			otv_type_g = $('#type_otv').val();
			
			otv_g_id = $('#name_otv_sob1').val();                  //собственный
			otv_g =  $('#name_otv_sob1 option:selected').text();
			pr_num_g =  $('#num_pr1').val();
			pr_data_g =  $('#data_pr1').val();		
			dog_num_g =  $('#num_stor_dog').val();
			dog_data_g =  $('#data_stor_dog').val();
			
			otv_st =  $('#stor_otv').text();



			if($('#name_otv_sob1').val() > 0){
				otv_g_id = $('#name_otv_sob1').val();
			}else if($('#id_stor_otv').val() > 0){
				otv_g_id = $('#id_stor_otv').val();
			}else{
				otv_g_id = "";
			}
			
			if($('#num_pr1').val() > 0){
				pr_num_g = $('#num_pr1').val();
			}else if($('#num_pr').val() > 0){
				pr_num_g = $('#num_pr').val();
			}else{
				pr_num_g = "";
			}

			if($('#data_pr1').val() !== ""){
				pr_data_g = $('#data_pr1').val();
			}else if($('#data_pr').val() !== ""){
				pr_data_g = $('#data_pr').val();
			}else{
				pr_data_g = "";
			}





			$('#otv_type_g').val(otv_type_g);
			$('#otv_g_id').val(otv_g_id);
			$('#order_num_g').val(pr_num_g);
			$('#order_data_g').val(pr_data_g);			
			$('#dog_num_g').val(dog_num_g);
			$('#dog_data_g').val(dog_data_g);		



			
			
			
			
			
			if(otv_type_g == 1){								// вывод информации на форму в зависимости от выбранного типа ответственного	
				$('#otv_g').html(otv_g);
			}else if(otv_type_g == 2){
				$('#otv_g').html(otv_st);
			}
	
		}


		
		////////////////////////////////////////////////////
			$('div[id="otv_sob1"]').css({'display': 'none'});
			$('div[id="otv_sob2"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob1"]').css({'display': 'none'});
			$('div[id="otv_num_dog_sob2"]').css({'display': 'none'});
			$('div[id="otv_stor"]').css({'display': 'none'});
			$('div[id="otv_instr"]').css({'display': 'none'});
			
			$('div[id="otv_num_pr_stor"]').css({'display': 'none'});
			$('div[id="otv_num_dog_stor"]').css({'display': 'none'});
			$('#id_stor_otv').val('');
			$('#stor_otv').html('');
			$('#num_pr').val('');
			$('#data_pr').val('');
			$('#num_stor_dog').val('');
			$('#data_stor_dog').val('');
			
			$('#otv_add').css({'display': 'none'});
			$('div#but_otv_add a.submit_cancel').css({'display': 'none'});
			
			$("select[name='name_otv_sob1']").val('');
			$("select[name='name_otv_sob2']").val('');		
			$('#type_otv').val(0);
			$('#name_otv_sob1').val('');
			$('#name_otv_sob2').val('');			
			$('#num_pr1').val('');	
			$('#data_pr1').val('');
			$('#num_pr2').val('');	
			$('#data_pr2').val('');		
		
		$('#openModalRespPers').fadeOut(300);
		$('#openModalRespPers_overlay').fadeOut(300);
		
	},*/

	/*check_otv: function(id_otv_pers) {
		
		stor_otv =  $('.card_href[id_rersp="'+id_otv_pers+'"]').html();
		$('#id_stor_otv').val(id_otv_pers);
		$('#stor_otv').html(stor_otv);
		
		$('div[id="otv_num_pr_stor"]').css({'display': 'block'});
		$('div[id="otv_num_dog_stor"]').css({'display': 'block'});
	
		
		
		$('#openModalUNP').fadeOut(300);
		$('#openModalUNP_overlay').fadeOut(300);	
	}	*/

	
	
	
	
};

