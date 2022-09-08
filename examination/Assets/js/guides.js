var guides = {
    ajaxMethod: 'POST',


	/************************ добавление в справочник тем теста электро***********************************************/
	add_test_theme_elektro: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_theme"]').val();
				

				var err_text = "";		
				if(($('#razdel_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#razdel_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					
					
					if(($('#razdel_name').val()).length == 0){
						$('#razdel_name').addClass("formError");
					}										
				}
				
				
				
		var razdel_name = $('input#razdel_name').val();


		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_theme_elektro/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){



			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="razdel_name"]').html(razdel_name);

					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#razdel_name').val()).length > 0){
					$("input[name='id_test_theme']").val('');				
					$("input[name='razdel_name']").val('');
					$('#messenger_modal').html("");
					$('#razdel_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },	
	
	/************************ добавление в справочник тем теста тепло***********************************************/
	add_test_theme_teplo: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_theme"]').val();
				

				var err_text = "";		
				if(($('#razdel_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#razdel_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					
					
					if(($('#razdel_name').val()).length == 0){
						$('#razdel_name').addClass("formError");
					}										
				}
				
				
				
		var razdel_name = $('input#razdel_name').val();


		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_theme_teplo/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){



			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="razdel_name"]').html(razdel_name);

					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#razdel_name').val()).length > 0){
					$("input[name='id_test_theme']").val('');				
					$("input[name='razdel_name']").val('');
					$('#messenger_modal').html("");
					$('#razdel_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },
	/************************ добавление в справочник тем теста газ***********************************************/
	add_test_theme_gaz: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_theme"]').val();
				

				var err_text = "";		
				if(($('#razdel_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#razdel_name').val());
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					
					
					if(($('#razdel_name').val()).length == 0){
						$('#razdel_name').addClass("formError");
					}										
				}
				
				
				
		var razdel_name = $('input#razdel_name').val();


		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_theme_gaz/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){



			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="razdel_name"]').html(razdel_name);

					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#razdel_name').val()).length > 0){
					$("input[name='id_test_theme']").val('');				
					$("input[name='razdel_name']").val('');
					$('#messenger_modal').html("");
					$('#razdel_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },	
	/************************ добавление в справочник направлений деятельности***********************************************/
	add_test_napr: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_napr"]').val();
				

				var err_text = "";		
				if(($('#napr_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#napr_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#napr_name').addClass("formError");
				}
				
				
				
		var napr_name = $('input#napr_name').val();

		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_napr/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){


			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="napr_name"]').html(napr_name);
					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#napr_name').val()).length > 0){
					$("input[name='id_test_napr']").val('');				
					$("input[name='napr_name']").val('');
					$('#messenger_modal').html("");
					$('#napr_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },
	/************************ добавление в справочник групп электробезопасности***********************************************/
	add_test_group: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_group"]').val();
				

				var err_text = "";		
				if(($('#group_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#group_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#group_name').addClass("formError");
				}
				
				
				
		var group_name = $('input#group_name').val();

		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_group/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){


			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="group_name"]').html(group_name);
					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#group_name').val()).length > 0){
					$("input[name='id_test_group']").val('');				
					$("input[name='group_name']").val('');
					$('#messenger_modal').html("");
					$('#group_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },
	/************************ добавление в справочник видов теста***********************************************/
	add_test_vid: function() {
		event.preventDefault();
	
		var formData = new FormData();
		var id_edit = $('input[name="id_test_vid"]').val();
				

				var err_text = "";		
				if(($('#vid_name').val()).length > 0){
					formData.append('id', id_edit);				
					formData.append('name', $('#vid_name').val());			
					formData.append('guides_place', $('#guides_place').val());
				}else{
					err_text += "<p>все поля должны быть заполнены!!!</p>"
					$('#messenger_modal').hide().fadeIn(500).html(err_text);
					$('#vid_name').addClass("formError");
				}
				
				
				
		var vid_name = $('input#vid_name').val();

		str_tbody_first = $("#spr_guides tbody").html() 
		spr_select_first = $("#shift_work").html();

      $.ajax({
            url: '/ARM/examination/guides/add_test_vid/',
            type: this.ajaxMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend: function(){

            },
            success: function(result){


			if(id_edit>0){

					$('tr.item-'+id_edit+' td[name="vid_name"]').html(vid_name);
					
					
			}else{			  
					  
					  if((result).length > 0){
						  
					  		if($('#guides_place').val() == 2){
								str_tbody =  str_tbody_first + result;
								$("#spr_guides tbody").html(str_tbody);
							}else{
								spr_select = spr_select_first + result;
								$("#shift_work").html(spr_select); 
							}
					 }
			} 

				
				if(($('#vid_name').val()).length > 0){
					$("input[name='id_test_vid']").val('');				
					$("input[name='vid_name']").val('');
					$('#messenger_modal').html("");
					$('#vid_name').removeClass("formError");
					guides.closeModalWindow();
					
				}
					
				
            }
        });
	
    },
	
	
	add_test_question: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_theemes"]').val();
				

		var group2 = $('#theemes_count_g2').val();
		var group3 = $('#theemes_count_g3').val();
		var group4 = $('#theemes_count_g4').val();
		var group5 = $('#theemes_count_g5').val();

				
					formData.append('id', id_edit);					
					formData.append('group2', ($('#theemes_count_g2').val().length > 0 ? $('#theemes_count_g2').val() : 0));			
					formData.append('group3', ($('#theemes_count_g3').val().length > 0 ? $('#theemes_count_g3').val() : 0));
					formData.append('group4', ($('#theemes_count_g4').val().length > 0 ? $('#theemes_count_g4').val() : 0));
					formData.append('group5', ($('#theemes_count_g5').val().length > 0 ? $('#theemes_count_g5').val() : 0));
					
					
		
						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_question/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
						
							
							if(id_edit>0){
									
									$("tr[id_test_theemes="+id_edit+"] td[name='count_g2']").html(group2.length > 0 ? group2 : 0);
									$("tr[id_test_theemes="+id_edit+"] td[name='count_g3']").html(group3.length > 0 ? group3 : 0);
									$("tr[id_test_theemes="+id_edit+"] td[name='count_g4']").html(group4.length > 0 ? group4 : 0);
									$("tr[id_test_theemes="+id_edit+"] td[name='count_g5']").html(group5.length > 0 ? group5 : 0);


									
											var sum_count2 = 0;
											$('#q_elektro tbody tr td[name=count_g2]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count2 = sum_count2 + parseFloat(sum_edit);
															
														};
													$("#q_gr2").html(sum_count2);
											});
											
											var sum_count3 = 0;
											$('#q_elektro tbody tr td[name=count_g3]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count3 = sum_count3 + parseFloat(sum_edit);
															
														};
													$("#q_gr3").html(sum_count3);
											});											
											
											var sum_count4 = 0;
											$('#q_elektro tbody tr td[name=count_g4]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count4 = sum_count4 + parseFloat(sum_edit);
															
														};
													$("#q_gr4").html(sum_count4);
											});											
											
											var sum_count5 = 0;
											$('#q_elektro tbody tr td[name=count_g5]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count5 = sum_count5 + parseFloat(sum_edit);
															
														};
													$("#q_gr5").html(sum_count5);
											});											
											

									
									
							}
							}
						});
	
					$("input[name='id_test_themes']").val('');
					$('input[name="theemes_count_g2"]').val('');
					$("input[name='theemes_count_g3']").val('');				
					$("input[name='theemes_count_g4']").val('');
					$("input[name='theemes_count_g5']").val('');


					
					$('#ModalTest_theemes').fadeOut(300);
					$('#ModalTest_theemes_overlay').fadeOut(300);

    },	



	add_test_wrong_answer: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_wrong_answer"]').val();
				

		var group2 = $('#answer_count_wrong_a2').val();
		var group3 = $('#answer_count_wrong_a3').val();
		var group4 = $('#answer_count_wrong_a4').val();
		var group5 = $('#answer_count_wrong_a5').val();

				
					formData.append('id', id_edit);					
					formData.append('group2', ($('#answer_count_wrong_a2').val().length > 0 ? $('#answer_count_wrong_a2').val() : 0));			
					formData.append('group3', ($('#answer_count_wrong_a3').val().length > 0 ? $('#answer_count_wrong_a3').val() : 0));
					formData.append('group4', ($('#answer_count_wrong_a4').val().length > 0 ? $('#answer_count_wrong_a4').val() : 0));
					formData.append('group5', ($('#answer_count_wrong_a5').val().length > 0 ? $('#answer_count_wrong_a5').val() : 0));
					
					
		
						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_wrong_answer/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
												
							if(id_edit>0){
									
									$("tr[id_test_wrong_answer="+id_edit+"] td[name='count_wrong_a2']").html(group2.length > 0 ? group2 : 0);
									$("tr[id_test_wrong_answer="+id_edit+"] td[name='count_wrong_a3']").html(group3.length > 0 ? group3 : 0);
									$("tr[id_test_wrong_answer="+id_edit+"] td[name='count_wrong_a4']").html(group4.length > 0 ? group4 : 0);
									$("tr[id_test_wrong_answer="+id_edit+"] td[name='count_wrong_a5']").html(group5.length > 0 ? group5 : 0);
		
							}
							}
						});
	
					$("input[name='id_test_wrong_a']").val('');
					$('input[name="answer_count_wrong_a2"]').val('');
					$("input[name='answer_count_wrong_a3']").val('');				
					$("input[name='answer_count_wrong_a4']").val('');
					$("input[name='answer_count_wrong_a5']").val('');


					
					$('#ModalTest_wrong_answer').fadeOut(300);
					$('#ModalTest_wrong_answer_overlay').fadeOut(300);

    },	
	
	add_test_attempt: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_attempt"]').val();
				

		var group2 = $('#attempt_count_attempt_a2').val();
		var group3 = $('#attempt_count_attempt_a3').val();
		var group4 = $('#attempt_count_attempt_a4').val();
		var group5 = $('#attempt_count_attempt_a5').val();

				
					formData.append('id', id_edit);					
					formData.append('group2', ($('#attempt_count_attempt_a2').val().length > 0 ? $('#attempt_count_attempt_a2').val() : 0));			
					formData.append('group3', ($('#attempt_count_attempt_a3').val().length > 0 ? $('#attempt_count_attempt_a3').val() : 0));
					formData.append('group4', ($('#attempt_count_attempt_a4').val().length > 0 ? $('#attempt_count_attempt_a4').val() : 0));
					formData.append('group5', ($('#attempt_count_attempt_a5').val().length > 0 ? $('#attempt_count_attempt_a5').val() : 0));
					
					
		
						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_attempt/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
											
							if(id_edit>0){
									
									$("tr[id_test_attempt="+id_edit+"] td[name='count_attempt_a2']").html(group2.length > 0 ? group2 : 0);
									$("tr[id_test_attempt="+id_edit+"] td[name='count_attempt_a3']").html(group3.length > 0 ? group3 : 0);
									$("tr[id_test_attempt="+id_edit+"] td[name='count_attempt_a4']").html(group4.length > 0 ? group4 : 0);
									$("tr[id_test_attempt="+id_edit+"] td[name='count_attempt_a5']").html(group5.length > 0 ? group5 : 0);
		
							}
							}
						});
	
					$("input[name='id_test_attempt']").val('');
					$('input[name="attempt_count_attempt_a2"]').val('');
					$("input[name='attempt_count_attempt_a3']").val('');				
					$("input[name='attempt_count_attempt_a4']").val('');
					$("input[name='attempt_count_attempt_a5']").val('');


					
					$('#ModalTest_attempt').fadeOut(300);
					$('#ModalTest_attempt_overlay').fadeOut(300);

    },	
	
	add_test_question_teplo: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_theemes_teplo"]').val();
				

		var count_g = $('#teplo_count_g').val();
			
					formData.append('id', id_edit);					
					formData.append('count_g', ($('#teplo_count_g').val().length > 0 ? $('#teplo_count_g').val() : 0));			

					
					
		
						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_question_teplo/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
						
						
							if(id_edit>0){
									
									$("tr[id_test_theemes_teplo="+id_edit+"] td[name='count_g']").html(count_g.length > 0 ? count_g : 0);

											var sum_count = 0;
											$('#q_teplo tbody tr td[name=count_g]').each(function() {
												
													
													 var sum_edit = $(this).html();
														if (!isNaN(sum_edit) && sum_edit.length !== 0) {
															sum_count = sum_count + parseFloat(sum_edit);
															
														};
													$("#q_teplo1").html(sum_count);
											});
													
							}
							}
						});
	
					$("input[name='id_test_theemes_teplo']").val('');
					$('input[name="theemes_count_g2"]').val('');

					
					$('#ModalTest_theemes_teplo').fadeOut(300);
					$('#ModalTest_theemes_teplo_overlay').fadeOut(300);

    },

	add_test_wrong_answer_t: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_wrong_answer_t"]').val();
				

		var count_g = $('#t_count_wrong_a_t').val();


				
					formData.append('id', id_edit);					
					formData.append('count_g', ($('#t_count_wrong_a_t').val().length > 0 ? $('#t_count_wrong_a_t').val() : 0));			


						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_wrong_answer_t/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
											
							if(id_edit>0){
									
									$("tr[id_test_wrong_answer_t="+id_edit+"] td[name='count_wrong_a_t']").html(count_g.length > 0 ? count_g : 0);

		
							}
							}
						});
	
					$("input[name='id_test_wrong_answer_t']").val('');
					$('input[name="t_count_wrong_a_t"]').val('');



					
					$('#ModalTest_wrong_answer_t').fadeOut(300);
					$('#ModalTest_wrong_answer_t_overlay').fadeOut(300);

    },

	add_test_attempt_t: function() {
		event.preventDefault();
        var formData = new FormData();
		var err_text = "";
		var id_edit = $('input[name="id_test_attempt_t"]').val();
				
		var count_g = $('#t_count_attempt_a2').val();


				
					formData.append('id', id_edit);					
					formData.append('count_g', ($('#t_count_attempt_a2').val().length > 0 ? $('#t_count_attempt_a2').val() : 0));			

					
					
		
						str_tbody_first = $("#q_elektro tbody").html() 

					  $.ajax({
							url: '/ARM/examination/guides/add_test_attempt_t/',
							type: this.ajaxMethod,
							data: formData,
							cache: false,
							processData: false,
							contentType: false,
							beforeSend: function(){

							},
							success: function(result){
console.log(result);											
							if(id_edit>0){
									
									$("tr[id_test_attempt_t="+id_edit+"] td[name='count_attempt_a2']").html(count_g.length > 0 ? count_g : 0);

		
							}
							}
						});
	
					$("input[name='id_test_attempt_t']").val('');
					$('input[name="t_count_attempt_a2"]').val('');



					
					$('#ModalTest_attempt_t').fadeOut(300);
					$('#ModalTest_attempt_t_overlay').fadeOut(300);

    },		
/***************************************************************************************************************/
	closeModalWindow: function(){
		$('#openModalGuidesFromSubject').fadeOut(300);
		$('#openModalGuides').fadeOut(300);
		$('#openModalGuides_overlay').fadeOut(300);
		$('#openModalGuides input').val('');
		$('#openModalGuides select option[value=0]').prop('selected', true);
		$('#openModalGuides .p_og_flue').text('Новая запись');
		$('#openModalGuides input').val('');
		$('#openModalGuides input[name="guides_place"]').val(2);
		$('#openModalGuides .add_btn').text('Добавить'); // просто меняем название кнопки
		$('#openModalGuidesFromSubject_overlay').fadeOut(300);
	},







/**************************** удаление записи из вправочника*************************************/
	remove: function(itemId) {
 

 
	    if(!confirm('Вы действительно хотите удалить данную запись?')) {
            return false;
        }
		
		var formData = new FormData();
	    formData.append('item_id', itemId);
		formData.append('name_table', $('#spr_guides').attr('name_table'));
	  
	    if (itemId < 1) {
            return false;
        }
	  
	  
	  
			$.ajax({
				url: '/ARM/examination/guides/removeItem/',
				type: this.ajaxMethod,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				
				success: function(result){
					
					console.log(result);
					
					$('.item-' + itemId).remove();
				}
			});
	


	}





	
	
};

