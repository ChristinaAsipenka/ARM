var test = {
    ajaxMethod: 'POST',

/************************************** Добавление результата теста вручную******************************************************/
    add_result: function() {
		
		
		event.preventDefault();
		var error;
		var record_mode = 'действующая'; 
		var cur_date = new Date().toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
		var test_date = new Date($('#date_test').val());

		var cur_date_full = new Date();
		
		

			
		
		
		
		
		if($('#test_napr').val() == 2){
				docName = "протокол";
			
			}
		
		if($('#test_napr').val() == 1){
				docName = "выписка";
			
			}
			
			
		
		if($('#test_result').val() == 1){
			
			var nextDateYear = (test_date.getFullYear()  +  parseInt($('#test_validity').val()));
			var nextDateMonth = (test_date.getMonth() + 1);
			
		}else{
			var nextDateYear = (test_date.getFullYear());
			var nextDateMonth = (test_date.getMonth() + 1 + 1 );
			
			if(nextDateMonth == 13){
				nextDateMonth = 1;
				nextDateYear = (test_date.getFullYear() + 1);
			}
			
			record_mode = 'направлен на повторную'; 
		}
		var nextDateDay = test_date.getUTCDate();	
		nextDate = new Date(nextDateYear+'-'+nextDateMonth+'-'+nextDateDay).toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
		
        var formData = new FormData();

		formData.append('id_otv', $('#id_rp').val()); // id тестируемого
		formData.append('test_napr', $('#test_napr').val()); // направление электро/тепло
		formData.append('id_group', $('#test_group').val()); // группа электро
		formData.append('doc_name',docName);   //
		//formData.append('date_sv', $('#otv_date_sv').val());
		formData.append('num_pr', $('#otv_num_pr').val());
		formData.append('date_pr', $('#otv_date_pr').val());
		formData.append('name_org', $('#otv_name_org').val());
		
		////////////////////////////////////////////////////////////
		
		formData.append('id_otv', $('#id_rp').val());
			formData.append('test_napr', $('#test_napr').val());
			formData.append('test_group', $('#test_group').val());
			
			 
			formData.append('formUnpId', $('#formUnpId').val());   // 
			formData.append('name_unp', $('#name_unp').text());   // 
			
			formData.append('resp_pers_secondname', $('#resp_pers_secondname').val());   // 
			formData.append('resp_pers_firstname', $('#resp_pers_firstname').val());   // 
			formData.append('resp_pers_lastname', $('#resp_pers_lastname').val());   // 
			formData.append('person_name', $('#resp_pers_secondname').val()+' '+$('#resp_pers_firstname').val()+' '+$('#resp_pers_lastname').val());   // 
			formData.append('resp_pers_post', $('#resp_pers_post').val());   // 
			formData.append('resp_pers_post_data', $('#resp_pers_post_data').val());   // 
			formData.append('resp_pers_tel', $('#resp_pers_tel').val());   // 
			formData.append('resp_pers_email', $('#resp_pers_email').val());   //
			
			formData.append('formBranchObject', $('#formBranchObject').val());   // 
			formData.append('formPodrazdelenieObject', $('#formPodrazdelenieObject').val());   //
			formData.append('formOtdelObject', $('#formOtdelObject').val());   // 
			
			formData.append('member_1', $('#member_1').val());   // 
			formData.append('member_1_id', $('#member_1_id').val());   // 
			formData.append('member_1_position', $('#member_1_position').text());   //
			formData.append('member_2', $('#member_2').val());   // 
			formData.append('member_2_id', $('#member_2_id').val());   // 
			formData.append('member_2_position', $('#member_2_position').text());   // 
			formData.append('member_3', $('#member_3').val());   // 
			formData.append('member_3_id', $('#member_3_id').val());   // 
			formData.append('member_3_position', $('#member_3_position').text());   // 
			
			formData.append('test_reasons_e', $('#test_reasons_el').val());   // причина проведения тестирования электро		
			formData.append('test_date_old', $('#test_date_old').val());   //
			formData.append('experience_position', $('#experience_position').val());   // стаж работы		
			formData.append('test_validity_positive', $('#test_validity').val());   // проверка на срок 1 или 3 года в случае, если тест сдан
			formData.append('test_reasons_teplo', $('#test_reasons').val());   // причина проведения тестирования тепло
			
			formData.append('date_curr', cur_date);   // 
			formData.append('date', $('#date_test').val());   // 
		//	formData.append('doc_name', docName);   // 
			//formData.append('creator_id', 'выписка');   // 
			formData.append('creator_id', $.cookie('id_user'));   // 
			formData.append('creator_fio', $.cookie('auth_login'));   // 
			formData.append('branch_id', $.cookie('spr_cod_branch'));   // 
			formData.append('otdel_id', $.cookie('spr_cod_otd'));   // 
			formData.append('podrazd_id', $.cookie('spr_cod_podrazd'));   // 
			formData.append('branch_full_name', $('#formBranchObject option:selected').text());   // 
			
			formData.append('record_source', $('#record_source option:selected').text());   // 
			formData.append('test_result', $('#test_result option:selected').text());   // 
			formData.append('record_mode', record_mode);   // 
			formData.append('test_validity', nextDate);   // первоначальная запись в журнал
			formData.append('themes', $('#themes_teplo').val());   // первоначальная запись в журнал
		//	formData.append('test_validity_year', test_validity_year);   // 
		
		////////////////////////////////////////////////////////////
	/*for (var value of formData.values()) {
   console.log(value);
}
	*/	
		


		error = test.checkFields();

	if(error === 0){		
      $.ajax({
            url: '/ARM/examination/testing/add_result/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){
				
	   //console.log(result);
						alert('Данные сохранены');
								

				if(result > 0 &&  $('#test_result').val() == 1){
					
					if($('#test_napr').val() == 2){
					$('#print_protocol').attr('onclick','report_zurnal.zurnalMain_t('+result+')')
			
					}
				
				if($('#test_napr').val() == 1){
							$('#print_protocol').attr('onclick','report_zurnal.zurnalMain_e('+result+')')
					
					}
					
					//if($('input[name="test_vid"]').val() == 1){
						$('#print_protocol').prop('disabled',false)
					//}
				}
							
            }
			
			
        });
		
		
	}else{
				var err_text = "";
				if(error) {
					err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>";
				}
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
	}
	
	
    },
/************************************** Добавление результата теста вручную******************************************************/
    add_test: function() {
		
		
		event.preventDefault();
		var error;
        var formData = new FormData();

		formData.append('id_otv', $('#id_rp').val());		// id тестируемого
		formData.append('id_napr', $('#test_napr').val());   // направление электро/тепло
		formData.append('id_group', $('#test_group').val()); // группа электро
		formData.append('test_vid', $('#test_vid').val());   // вид теста пробный/официальный
		
		error = test.checkFields();

	if(error === 0){		
      $.ajax({
            url: '/ARM/examination/testing/add_test/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(){
		

							alert('Данные сохранены');
							window.location = '/ARM/examination/main/';				  
            }
			
			
        });
		
		
	}else{
				var err_text = "";
				if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>";
				$('#messenger').hide().fadeIn(500).html(err_text);
				return false;
	}
    },	
/******************************************************* Обязательные поля для заполнения при создании записи в таблице результатов теста****************************************************************/    
	checkFields: function(){
		var fields = [];
		
		if($("#formPage").attr("mode") == "enter_result"){
			 fields = ["test_napr", "otv_num_sv"];
		}else if($("#formPage").attr("mode") == "new_testing"){
			if($('#test_napr').val() == 1){ // проверка знаний по электро
				 fields = ["test_napr", "formUnpId", "resp_pers_id", "test_group", "resp_pers_post", "branchNameObject", "podrazdelenieNameObject", "otdelNameObject", "member_1", "member_2", "member_3", "test_reasons_el", "experience_position", "test_validity"];
			}
			
			if($('#test_napr').val() == 2){ // проверка знаний по теплу
				 fields = ["test_napr", "formUnpId", "resp_pers_id", "resp_pers_post", "branchNameObject", "podrazdelenieNameObject", "otdelNameObject", "member_1", "member_2", "member_3", "test_reasons_teplo"];
			}
		}
	
		var error = 0; // флаг заполнения обязательных полей
		$('resp_pers_post').prop('disabled', false);
		if(fields.length > 0){
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
						if( $(this).val() === 0 ){      // если поле не заполнено
							 $(this).addClass("formError");
							 error = 1;
						}else{
							 $(this).removeClass("formError");
						}	
					}
				 }
				 
			});
			$('resp_pers_post').prop('disabled', true);
		
		}
		
		return error ;
	},	
/********************** Показать скрыть блок группа по электробезопасности в зависимости от выбора направления деятельности**********************/
	group_hide_show: function(value) {
		
		
		
		if(value == 0){
			$('button.btn_start_test').prop('disabled',true);
			$('div[group_block="elektro"]').css({'display': 'none'});
		}else if(value == 1){
			
			$('div[group_block="elektro"]').css({'display': 'block'});
			$("select[name='test_group']").val(0);
			$('button.btn_start_test').prop('disabled',true);
			
		}else if(value == 2){
			$('div[group_block="elektro"]').css({'display': 'none'});
			$("select[name='test_group']").val(0);
			$('button.btn_start_test').prop('disabled',false);
			$('.test_el_enter').css('display','none');
			$('.test_teplo_enter').css('display','block');
		}
		
	},
	
	group_electro_start: function(value) {
		if(value > 0){
				
				$('button.btn_start_test').prop('disabled',false);
				$('.test_el_enter').css('display','block');
				$('.test_teplo_enter').css('display','none');
			}else{
				$('button.btn_start_test').prop('disabled',true);
			}
	},
/*************************Добавление новой записи в справочник через кнопку плюс на форме*********************/
	create_url: function(attr_spr) {
		event.preventDefault();
		var params = attr_spr;
		var result;
        var str_option;
			$.ajax({
                    type: "POST",
                    url: '/ARM/examination/guides/list/',
                    data: { params: params },
                    success: function(data)
                    
					{						
			// Добавление/формирование новой записи в справочнике городов по кнопке плюс на вкладке потребителей 				
							result =  $.parseJSON(data);
							switch(attr_spr){
								case 'spr_otv':
									str_option = '<option value="0">Выберите область</option>';
										$.each(result,function(ind, val){
											if(ind === 'region_data'){
												$.each(val,function(ind1, val1){
													str_option = str_option + '<option value="'+val1.id+'">'+val1.name+'</option>';
												});
											}
										});
									$("select#formRegionSpr").html(str_option);	
									break;								
		
							}
                    }
				
				});
 
				   $.ajax({
                    type: "POST",
                    url: '/ARM/examination/View/modal/modal_Guides.php',
                    data: { params: params },
                    success: function(data)
                    {
                       //console.log(data);
					   $("div[class='modalDialog_guidesfromOtv']").html(data);
					   $("div#openModalGuides").css({'display': 'block'});
						
                    }
				});
	
	},

	ShowSearchWindow : function(){
			event.preventDefault();
		$('.searchWindow').fadeIn();
	},
	
	hideSearchBlock : function(){
		event.preventDefault();
		$('.searchWindow').fadeOut();
	},

	start_test : function(){
		event.preventDefault();
		
		var cur_date = new Date().toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
		//cur_date = cur_date;
		
		var cur_date_full = new Date();
		var error = 0;
		
		//nextDateYear = (cur_date_full.getFullYear() + 1);
		
		
		if($('#test_vid').val() == 1){

			error = test.checkFields();
		}
		
		if(error === 0){	
			
			var docName = 'выписка';
			var record_source = 'тест на ПЭВМ';
			var test_result = 'не завершен';
			var record_mode = 'недействующая'; 
			var test_reason_el = $('#test_reasons_el').val();
			var test_reason_teplo = $('#test_reasons_teplo').val();
			var test_validity_year = $('#test_validity').val();
			
			var nextDate = cur_date; // если причина проведения "повторная", то дату следующей проверки ставим текущую, которая при успешном прохождении теста меняется на новую
	
			
		
			
			if(test_reason_el != 1 && test_reason_teplo != 1){
				
				var nextDateYear = cur_date_full.getFullYear();
				var nextDateMonth = (cur_date_full.getMonth() + 1 + 1);
				var nextDateDay = (cur_date_full.getUTCDate());
			
				nextDate = new Date(nextDateYear+'-'+nextDateMonth+'-'+nextDateDay).toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
			
				record_mode ='направлен на повторную'; // если причина проведения не "повторная", то статус записи "направлен на повторную"

			}
			
			if($('#test_napr').val() == 2){
				docName = "протокол";
			
			}
			
			var formData = new FormData();

			formData.append('id_otv', $('#id_rp').val());
			formData.append('test_napr', $('#test_napr').val());
			formData.append('test_group', $('#test_group').val());
			formData.append('test_vid', $('#test_vid').val());
			 
			formData.append('formUnpId', $('#formUnpId').val());   // 
			formData.append('name_unp', $('#name_unp').text());   // 
			
			formData.append('resp_pers_secondname', $('#resp_pers_secondname').val());   // 
			formData.append('resp_pers_firstname', $('#resp_pers_firstname').val());   // 
			formData.append('resp_pers_lastname', $('#resp_pers_lastname').val());   // 
			formData.append('person_name', $('#resp_pers_secondname').val()+' '+$('#resp_pers_firstname').val()+' '+$('#resp_pers_lastname').val());   // 
			formData.append('resp_pers_post', $('#resp_pers_post').val());   // 
			formData.append('resp_pers_post_data', $('#resp_pers_post_data').val());   // 
			formData.append('resp_pers_tel', $('#resp_pers_tel').val());   // 
			formData.append('resp_pers_email', $('#resp_pers_email').val());   //
			
			formData.append('formBranchObject', $('#formBranchObject').val());   // 
			formData.append('formPodrazdelenieObject', $('#formPodrazdelenieObject').val());   //
			formData.append('formOtdelObject', $('#formOtdelObject').val());   // 
			
			formData.append('member_1', $('#member_1').val());   // 
			formData.append('member_1_id', $('#member_1_id').val());   // 
			formData.append('member_1_position', $('#member_1_position').text());   //
			formData.append('member_2', $('#member_2').val());   // 
			formData.append('member_2_id', $('#member_2_id').val());   // 
			formData.append('member_2_position', $('#member_2_position').text());   // 
			formData.append('member_3', $('#member_3').val());   // 
			formData.append('member_3_id', $('#member_3_id').val());   // 
			formData.append('member_3_position', $('#member_3_position').text());   // 
			
			formData.append('test_reasons_e', $('#test_reasons_el').val());   // причина проведения тестирования электро		
			formData.append('test_date_old', $('#test_date_old').val());   // причина проведения тестирования электро		
			formData.append('experience_position', $('#experience_position').val());   // стаж работы		
			formData.append('test_validity_positive', $('#test_validity').val());   // проверка на срок 1 или 3 года в случае, если тест сдан
			formData.append('test_reasons_teplo', $('#test_reasons_teplo').val());   // причина проведения тестирования тепло
			
			formData.append('date', cur_date);   // 
			formData.append('date_curr', cur_date);   // 
			formData.append('doc_name', docName);   // 
			//formData.append('creator_id', 'выписка');   // 
			formData.append('creator_id', $.cookie('id_user'));   // 
			formData.append('creator_fio', $.cookie('auth_login'));   // 
			formData.append('branch_id', $.cookie('spr_cod_branch'));   // 
			formData.append('otdel_id', $.cookie('spr_cod_otd'));   // 
			formData.append('podrazd_id', $.cookie('spr_cod_podrazd'));   // 
			formData.append('branch_full_name', $('#formBranchObject option:selected').text());   // 
			
			formData.append('record_source', record_source);   // 
			formData.append('test_result', test_result);   // 
			formData.append('record_mode', record_mode);   // 
			formData.append('test_validity', nextDate);   // первоначальная запись в журнал
			formData.append('test_validity_year', test_validity_year);   // первоначальная запись в журнал

			
			//var inspect_type = $.cookie('podrazdelenie');
			
			
			
			
			$.ajax({
				url: '/ARM/examination/testing/new_test/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result)
				{ 
					//console.log(result);
					$('main').html(result);
				}
				
				
			});
			
		}else{
					var err_text = "";
					if(error) err_text += "<p>Заполните пожалуйста все обязательные поля помеченные звездочкой!!!</p>";
					$('#messenger').hide().fadeIn(500).html(err_text);
					return false;
		}	
		
	
	},
	
	createNewRP : function(){
	event.preventDefault();

		$('button.test_chose_unp').css('display','block');	
		$('button.test_create_rp').css('display','block');	
		$('input[name=resp_pers_secondname]').prop('disabled',false);
		$('input[name=resp_pers_firstname]').prop('disabled',false);
		$('input[name=resp_pers_lastname]').prop('disabled',false);
		$('input[name=resp_pers_post]').prop('disabled',false);
		$('input[name=resp_pers_post_data]').prop('disabled',false);
		$('input[name=resp_pers_tel]').prop('disabled',false);
		$('input[name=resp_pers_email]').prop('disabled',false);
	},
/*****************************
********* Редактирование вопросов теста у электриков******************************************************/
    add_test_answer: function() {
		
	
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";

		if(($('#name_question_elektro').val()).length > 0 && ($('#name_theme_question_elektro').val()) > 0 && ($('#name_a1_electro').val()).length > 0 && ($('#name_a2_electro').val()).length > 0 && ($('#name_a3_electro').val()).length > 0 && ($('#name_a4_electro').val()).length> 0 && ($('input#true_question1').prop('checked') === true || $('input#true_question2').prop('checked') === true || $('input#true_question3').prop('checked') === true || $('input#true_question4').prop('checked') === true)){


					formData.append('id', $('textarea#name_question_elektro').attr('id_question'));
					formData.append('question', $('textarea#name_question_elektro').val());
					formData.append('id_theme', $('select#name_theme_question_elektro').val());

					formData.append('id_question', $('textarea#name_question_elektro').attr('id_question'));
					
					/*formData.append('mark', $('textarea#name_a1_electro').val());	*/	
					formData.append('id_answer1', $('textarea#name_a1_electro').attr('id_answer'));
					formData.append('id_answer2', $('textarea#name_a2_electro').attr('id_answer'));
					formData.append('id_answer3', $('textarea#name_a3_electro').attr('id_answer'));
					formData.append('id_answer4', $('textarea#name_a4_electro').attr('id_answer'));
					
					formData.append('mark', $('input[name=true_answer]:checked').val());
					
					formData.append('answer1', $('textarea#name_a1_electro').val());
					formData.append('answer2', $('textarea#name_a2_electro').val());
					formData.append('answer3', $('textarea#name_a3_electro').val());
					formData.append('answer4', $('textarea#name_a4_electro').val());

					var str_table = $('table#edit_q_elektro tbody').html();
					var id_str = $('textarea#name_question_elektro').attr('id_question');
					var id_q = $('select#name_theme_question_elektro').val();
					var name_q = $('textarea#name_question_elektro').val();
					
					

				  $.ajax({                                 /****************** вопрос ************************/
						url: '/ARM/examination/testing/add_test_question/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){


							if(id_str.length===0){		  
									$('table#edit_q_elektro tbody').html(str_table+result);
									

							}else{

									$('table#edit_q_elektro tbody tr[id_question_elekto="'+id_str+'"] td[name="name_question_elektro"]').html(name_q);
									$('table#edit_q_elektro tbody tr[id_question_elekto="'+id_str+'"]').attr('id_themes_elekto',id_q);

							}					
						}
						
						
					});		
		}else{
					err_text += "<p>заполните все поля и выберите правильный вариант ответа!!!</p>";
					$('#messenger_modal_q_e').hide().fadeIn(500).html(err_text);
					if(($('#name_question_elektro').val()).length === 0){
						$('#name_question_elektro').addClass("formError");
					}else{
						$('#name_question_elektro').removeClass("formError");
					}
					if(($('#name_theme_question_elektro').val()) === 0){
						$('#name_theme_question_elektro').addClass("formError");
					}else{
						$('#name_theme_question_elektro').removeClass("formError");
					}
					if(($('#name_a1_electro').val()).length === 0){
						$('#name_a1_electro').addClass("formError");
					}else{
						$('#name_a1_electro').removeClass("formError");
					}					
					if(($('#name_a2_electro').val()).length === 0){
						$('#name_a2_electro').addClass("formError");
					}else{
						$('#name_a2_electro').removeClass("formError");
					}
					if(($('#name_a3_electro').val()) === 0){
						$('#name_a3_electro').addClass("formError");
					}else{
						$('#name_a3_electro').removeClass("formError");
					}					
					if(($('#name_a4_electro').val()) === 0){
						$('#name_a4_electro').addClass("formError");
					}else{
						$('#name_a4_electro').removeClass("formError");
					}			
		}			
					
					
					
					
					
		if(($('#name_question_elektro').val()).length > 0 && ($('#name_theme_question_elektro').val()) > 0 && ($('#name_a1_electro').val()).length > 0 && ($('#name_a2_electro').val()).length > 0 && ($('#name_a3_electro').val()).length > 0 && ($('#name_a4_electro').val()).length> 0 && ($('input#true_question1').prop('checked') === true || $('input#true_question2').prop('checked') === true || $('input#true_question3').prop('checked') === true || $('input#true_question4').prop('checked') === true)){					
					
					
						$('textarea[name=name_question_elektro]').attr('id_question','');	
		
		
						$('#messenger_modal_q_e').html("");
						$('#name_question_elektro').removeClass("formError");
						$('#name_theme_question_elektro').removeClass("formError");
						$('#name_a1_electro').removeClass("formError");
						$('#name_a2_electro').removeClass("formError");
						$('#name_a3_electro').removeClass("formError");
						$('#name_a4_electro').removeClass("formError");

						$('textarea[name=name_question_elektro]').attr('id_question','');
						$('#ModalQuestion_elekto textarea').val('');
						$('#ModalQuestion_elekto select').val(0);
						$('#ModalQuestion_elekto textarea').css({'background-color': ''});
						$('#ModalQuestion_elekto input[name =true_answer]').prop('checked', false);
						
						
						$('#true_question1').val(1);
						$('#true_question2').val(2);
						$('#true_question3').val(3);
						$('#true_question4').val(4);
		
		
		
						$('#ModalQuestion_elekto').fadeOut(300);
						$('#ModalQuestion_elekto_overlay').fadeOut(300);	
		
		
		
		}					
	
	
    },
/************************************** Редактирование вопросов теста у тепловиков******************************************************/
    add_test_answer_teplo: function() {
		
	
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";

		
		
	
		
		
		if(($('#name_question_teplo').val()).length > 0 && ($('#name_theme_question_teplo').val()) > 0 && ($('#name_a1_teplo').val()).length > 0 && ($('#name_a2_teplo').val()).length > 0 && ($('#name_a3_teplo').val()).length > 0 && ($('#name_a4_teplo').val()).length> 0 && ($('input#true_question_t1').prop('checked') === true || $('input#true_question_t2').prop('checked') === true || $('input#true_question_t3').prop('checked') === true || $('input#true_question_t4').prop('checked') === true)){
		
			
					formData.append('id', $('textarea#name_question_teplo').attr('id_question'));
					formData.append('question', $('textarea#name_question_teplo').val());
					formData.append('id_theme', $('select#name_theme_question_teplo').val());

					formData.append('id_question', $('textarea#name_question_teplo').attr('id_question'));
					
					/*formData.append('mark', $('textarea#name_a1_electro').val());	*/	
					formData.append('id_answer1', $('textarea#name_a1_teplo').attr('id_answer'));
					formData.append('id_answer2', $('textarea#name_a2_teplo').attr('id_answer'));
					formData.append('id_answer3', $('textarea#name_a3_teplo').attr('id_answer'));
					formData.append('id_answer4', $('textarea#name_a4_teplo').attr('id_answer'));
					
					formData.append('mark', $('input[name=true_answer_t]:checked').val());
					
					formData.append('answer1', $('textarea#name_a1_teplo').val());
					formData.append('answer2', $('textarea#name_a2_teplo').val());
					formData.append('answer3', $('textarea#name_a3_teplo').val());
					formData.append('answer4', $('textarea#name_a4_teplo').val());

					var str_table = $('table#edit_q_teplo tbody').html();
					var id_str = $('textarea#name_question_teplo').attr('id_question');
					var id_q = $('select#name_theme_question_teplo').val();
					var name_q = $('textarea#name_question_teplo').val();
					

					
				  $.ajax({                                 /****************** вопрос ************************/
						url: '/ARM/examination/testing/add_test_question_teplo/',
						type: this.ajaxMethod,
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						beforeSend: function(){

						},
						success: function(result){


							if(id_str.length===0){		  
									$('table#edit_q_teplo tbody').html(str_table+result);
									

							}else{

									$('table#edit_q_teplo tbody tr[id_question_teplo="'+id_str+'"] td[name="name_question_teplo"]').html(name_q);
									$('table#edit_q_teplo tbody tr[id_question_teplo="'+id_str+'"]').attr('id_themes_teplo',id_q);

							}					
						}
						
						
					});		
		}else{
					err_text += "<p>заполните все поля и выберите правильный вариант ответа!!!</p>";
					$('#messenger_modal_q_tep').hide().fadeIn(500).html(err_text);
					if(($('#name_question_teplo').val()).length === 0){
						$('#name_question_teplo').addClass("formError");
					}else{
						$('#name_question_teplo').removeClass("formError");
					}
					if(($('#name_theme_question_teplo').val()) === 0){
						$('#name_theme_question_teplo').addClass("formError");
					}else{
						$('#name_theme_question_teplo').removeClass("formError");
					}
					if(($('#name_a1_teplo').val()).length === 0){
						$('#name_a1_teplo').addClass("formError");
						$('#true_question_t1').addClass("formError");
					}else{
						$('#name_a1_teplo').removeClass("formError");
					}					
					if(($('#name_a2_teplo').val()).length === 0){
						$('#name_a2_teplo').addClass("formError");
					}else{
						$('#name_a2_teplo').removeClass("formError");
					}
					if(($('#name_a3_teplo').val()) === 0){
						$('#name_a3_teplo').addClass("formError");
					}else{
						$('#name_a3_teplo').removeClass("formError");
					}					
					if(($('#name_a4_teplo').val()) === 0){
						$('#name_a4_teplo').addClass("formError");
					}else{
						$('#name_a4_teplo').removeClass("formError");
					}				
		}		
		
		
		
		if(($('#name_question_teplo').val()).length > 0 && ($('#name_theme_question_teplo').val()) > 0 && ($('#name_a1_teplo').val()).length > 0 && ($('#name_a2_teplo').val()).length > 0 && ($('#name_a3_teplo').val()).length > 0 && ($('#name_a4_teplo').val()).length> 0 && ($('input#true_question_t1').prop('checked') === true || $('input#true_question_t2').prop('checked') === true || $('input#true_question_t3').prop('checked') === true || $('input#true_question_t4').prop('checked') === true)){		
		
				

						$('#messenger_modal_q_tep').html("");
						$('#name_question_teplo').removeClass("formError");
						$('#name_theme_question_teplo').removeClass("formError");
						$('#name_a1_teplo').removeClass("formError");
						$('#name_a2_teplo').removeClass("formError");
						$('#name_a3_teplo').removeClass("formError");
						$('#name_a4_teplo').removeClass("formError");

						$('textarea[name=name_question_teplo]').attr('id_question','');
						$('#ModalQuestion_teplo textarea').val('');
						$('#ModalQuestion_teplo select').val(0);
						$('#ModalQuestion_teplo textarea').css({'background-color': ''});
						$('#ModalQuestion_teplo input[name =true_answer_t]').prop('checked', false);
						
						$('#true_question_t1').val(1);
						$('#true_question_t2').val(2);
						$('#true_question_t3').val(3);
						$('#true_question_t4').val(4);

						$('#ModalQuestion_teplo').fadeOut(300);
						$('#ModalQuestion_teplo_overlay').fadeOut(300);	
		}						
	
	
    },	
/************************************** выбор вопросов  в зависимости от выбранной темы у электриков******************************************************/
    select_by_themes: function() {
		
	
		event.preventDefault();
        var formData = new FormData();



		formData.append('id_t', $('select#themes_el').val());


			  $.ajax({                             
					url: '/ARM/examination/testing/select_q_themes/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){

							$('table#edit_q_elektro tbody').html(result);
							
							$('#count_theme').html('Всего: '+$('table#edit_q_elektro tbody tr').length+' шт.');
							
					}
					
					
				});		

    },
/************************************** выбор вопросов  в зависимости от выбранной темы у тепловиков******************************************************/
    select_by_themes_t: function() {
		
	
		event.preventDefault();
        var formData = new FormData();



		formData.append('id_tep', $('select#themes_tep').val());


			  $.ajax({                             
					url: '/ARM/examination/testing/select_q_themes_t/',
					type: this.ajaxMethod,
					data: formData,
					cache: false,
					processData: false,
					contentType: false,
					beforeSend: function(){

					},
					success: function(result){

							$('table#edit_q_teplo tbody').html(result);
							
							$('#count_theme_t').html('Всего: '+$('table#edit_q_teplo tbody tr').length+' шт.');
							
					}
					
					
				});		

    },
	is_prosroch: function() {
		if($("input[name='pz_prosrok']").prop('checked')){
			$("input[name='pz_prosrok']").prop('value', 1);
		}else{
			$("input[name='pz_prosrok']").prop('value', 0);
		}
		
	},
	
	test_cancel: function(){
		
		window.location = '/ARM/examination/testing/test/';			
		
	}


	
};

$(window).load(function() {
	
	$('#count_record_e').html($('.main_table tbody tr').length);
	$('#count_record_t').html($('.main_table tbody tr').length);
	$('#count_record_g').html($('.main_table tbody tr').length);

	if($("#test_napr").val() == 1){
			$('div[group_block="elektro"]').css({'display': 'block'});
	}else{
			$('div[group_block="elektro"]').css({'display': 'none'});
	}
	
											var sum_count2 = 0;
											$('#q_elektro tbody tr td[name=count_g2]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count2 = sum_count2 + parseFloat(sum_edit);
															
														}
													$("#q_gr2").html(sum_count2);
											});
											
											var sum_count3 = 0;
											$('#q_elektro tbody tr td[name=count_g3]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count3 = sum_count3 + parseFloat(sum_edit);
															
														}
													$("#q_gr3").html(sum_count3);
											});											
											
											var sum_count4 = 0;
											$('#q_elektro tbody tr td[name=count_g4]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count4 = sum_count4 + parseFloat(sum_edit);
															
														}
													$("#q_gr4").html(sum_count4);
											});											
											
											var sum_count5 = 0;
											$('#q_elektro tbody tr td[name=count_g5]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count5 = sum_count5 + parseFloat(sum_edit);
															
														}
													$("#q_gr5").html(sum_count5);
											});
	
											var sum_count = 0;
											$('#q_teplo tbody tr td[name=count_g]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count = sum_count + parseFloat(sum_edit);
															
														}
													$("#q_teplo1").html(sum_count);
											});

});

$(window).ready(function(){
	
  $(".accordion-titulo").click(function(e){
           
        e.preventDefault();
    
        var contenido=$(this).next(".accordion-content");

        if(contenido.css("display")=="none"){ //open		
          contenido.slideDown(250);			
          $(this).addClass("open");
        }
        else{ //close		
          contenido.slideUp(250);
          $(this).removeClass("open");	
        }



      });	
  

  $("input[name='true_answer']").click(function(){
           
      // event.preventDefault();
	var true_answer = $(this).val();  

   
				$('textarea#name_a1_electro').css({'background-color': ''});
				$('textarea#name_a2_electro').css({'background-color': ''});
				$('textarea#name_a3_electro').css({'background-color': ''});
				$('textarea#name_a4_electro').css({'background-color': ''});

				$('textarea[id_answer="'+true_answer+'"]').css({'background-color': 'aquamarine'});


				
      });
	  
  $("input[name='true_answer_t']").click(function(){
           
      // event.preventDefault();
	var true_answer_t = $(this).val();  

   
				$('textarea#name_a1_teplo').css({'background-color': ''});
				$('textarea#name_a2_teplo').css({'background-color': ''});
				$('textarea#name_a3_teplo').css({'background-color': ''});
				$('textarea#name_a4_teplo').css({'background-color': ''});

				$('textarea[id_answer="'+true_answer_t+'"]').css({'background-color': 'aquamarine'});



				
      });	

	$('#test_napr').change(function(){
		if($('#test_vid').val() == 1){
			if($(this).val() == 1){
				$('.test_el').css('display','block');
				$('.test_teplo').css('display','none');
				
			}else{
				$('.test_el').css('display','none');
				$('.test_teplo').css('display','block');
				
			}
		}
	});

	/*$('#test_napr').change(function(){
		if($(this).val() == 1){
			$('.test_el').css('display','block');
			$('.test_teplo').css('display','none');
			
		}else{
			$('.test_el').css('display','none');
			$('.test_teplo').css('display','block');
			
		}
	});*/


	$('#test_vid').change(function(){
		
		//console.log($(this).val());
		if($(this).val() == 1){
			$('.fieldset_rp').css('display','block');
		}else{
			$('.fieldset_rp').css('display','none');
		}
	});
	  
	  
	$('#resp_pers_post_data').change(function(){
		
	//	console.log($(this).val());
		var post_year = parseInt($(this).val().slice(0, 4));
		var post_month = parseInt($(this).val().slice(5, 7));
		var post_day = parseInt($(this).val().slice(8, 10));
		var res_year;
					
			var cur_date = new Date();
			
			
			if(post_month > (cur_date.getMonth()+1) || ((cur_date.getMonth()+1) == post_month && post_day > cur_date.getUTCDate()) ){
			
				res_year = cur_date.getFullYear() - post_year - 1;
			}else{
			
				res_year = cur_date.getFullYear() - post_year;
			}
			
			$('input[name=experience_position]').val(res_year);
	}); 
});

