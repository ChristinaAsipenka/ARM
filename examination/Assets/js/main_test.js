/********************************************** js прохождения теста ****************************************************************************/		
var	testResultData = new FormData();
var main_test = {
	
	ajaxMethod: 'POST',
	
	nextQuestion : function($block_number){
		
		event.preventDefault();
		$('.fieldset_test_block[block_number = '+($block_number-1)+']').css({'display':'none'});
		$('.fieldset_test_block[block_number = '+$block_number+']').css({'display':'block'});
		
	
	},
	
	showAllQuestions : function(){
		$('.fieldset_test_block').css({'display':'block'});
		$('.commission_list').css({'display':'block'});
	},
	
	writeTestResult : function(){
		clearInterval(counterInterval);
		$.ajax({
				url: '/ARM/examination/testing/write_test_result/',
				type: this.ajaxMethod,
				data: testResultData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend: function(){

				},
				success: function(result){
					//console.log(result);
					//$('main').html(result);
				}
				
				
			});
	}
};

function WrongAnswersString(){
	// формируем данные о неверно отвеченных вопросах
			var wrong_answers_text = '';
		
			
			$('.fieldset_test_block label.wrong_answer').each(function(){
				
				var block_fieldset = $(this).closest('fieldset'); // блок с вопросом и вариантами ответов
				wrong_answers_text = wrong_answers_text + 'Q:'+ block_fieldset.find('.test_question').text() + '\n';
			
			
				block_fieldset.children('label').each(function(){
					
					wrong_answers_text = wrong_answers_text + 'A ';
					
					if($(this).hasClass('wrong_answer')){
						wrong_answers_text = wrong_answers_text + '(chosen)';
					}
					
					if($(this).find('input').attr('mark') == 1){
						wrong_answers_text = wrong_answers_text + '(true)';
					}
					
					wrong_answers_text = wrong_answers_text + ': '+$(this).find('span').text();
					
					
					wrong_answers_text = wrong_answers_text + '\n';
					
				});
				
			})
			
			return wrong_answers_text;
};

$(window).ready(function(){
	
	if($('input[name=test_vid]').val() == 1){
		updateCounter();
	
		counterInterval = setInterval(updateCounter, 1000);
	}
	
	col_from_settings = $('#col_from_settings').text();
	



	$('.test_answer input[type=radio]').click(function(){
		
		var curr_date = new Date().toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });	
		
		var input_name = $(this).attr('name');
		var block_number = $(this).closest('fieldset').attr('block_number');
		var test_vid = $('input[name=test_vid]').val();
		var col_wrong_answers = $('input[name=col_wrong_answers]').val();
		
		
		
		//console.log($(this).attr('mark'));
		
		if($(this).attr('mark') == 0){
			
			$(this).parent('label').addClass('wrong_answer');
			
			$('input[name='+input_name+'][mark=1]').parent('label').addClass('right_answer');

		
			
			
			///console.log(wrong_answers_text);
			
		
		}else{
			$(this).parent('label').addClass('right_answer');
		}
		
		$('input[name='+input_name+']').prop('disabled', true);
		
		// подсчитываем количество верных и ошибочных ответов
	    var	wrong_answers = $('.wrong_answer input:checked').length;
	    var	right_answers = $('.right_answer input:checked').length;
		var all_questions = wrong_answers+right_answers;
		$('#all_questions').html(all_questions);
		$('#for_right_answers').html(right_answers);
		$('#for_wrong_answers').html(wrong_answers);
	
		if(test_vid == 1 && wrong_answers ==col_wrong_answers){
			$('#btn_showAllQuestions').prop("disabled",false);
			$('#btn_printAllQuestions').prop("disabled",false);
			
			$('#messenger_test').css({'display':'block'});
			$('#messenger_test').html('тест не пройден');
			$('fieldset[block_number='+block_number+'] .btn_next_question').prop('disabled', true);
			
			if($('input[name="test_vid"]').val() == 1){
				$('#print_protocol').prop("disabled",false);
			}
			
			// данные для дозаписи в журнал результатов	
			testResultData.append('test_result', 'не сдан');
			testResultData.append('test_result_resume', all_questions+'/'+wrong_answers);
			testResultData.append('test_result_resume2', WrongAnswersString()); 		//текст неправильных ответов и заданных вопросов
			
			if($('input[name=book_eID]').val() !=='undefined'){
				testResultData.append('book_eID', $('input[name=book_eID]').val());
			}
			
			if($('input[name=book_tID]').val() !=='undefined'){
				testResultData.append('book_tID', $('input[name=book_tID]').val());
			}
		
			main_test.writeTestResult();
			return false;
		}
		
		if(all_questions == col_from_settings){
			$('#btn_showAllQuestions').prop("disabled",false);
			$('#btn_printAllQuestions').prop("disabled",false);
			
			if($('input[name="test_vid"]').val() == 1){
				$('#print_protocol').prop("disabled",false);
			}
		//	console.log($('input[name=col_wrong_answers]').val());
			
			if($('input[name=col_wrong_answers]').val() <= wrong_answers){
				$('#messenger_test').css({'display':'block'});
				$('#messenger_test').html('тест не пройден');
				
				testResultData.append('test_result', 'не сдан');
				
				
				testResultData.append('test_result_resume', all_questions+'/'+wrong_answers);
				testResultData.append('test_result_resume2', WrongAnswersString()); 								//текст неправильных ответов и заданных вопросов
				
			}else{
		
				$('#messenger_test').css({'display':'block'});
				$('#messenger_test').css({'background':'#EEFFED'});
				$('#messenger_test').css({'color':'#567F53'});
				$('#messenger_test').html('тест пройден');
				
			// данные для дозаписи в журнал результатов	
			
				cur_date_full = new Date();
				var years_validity = $('input[name = "test_validity_year"]').val();
				var nextDateYear = cur_date_full.getFullYear()+parseInt(years_validity);
				var nextDateMonth = (cur_date_full.getMonth() + 1);
				var nextDateDay = (cur_date_full.getUTCDate());
		
				test_validity = new Date(nextDateYear+'-'+nextDateMonth+'-'+nextDateDay).toLocaleDateString('fr-CA', { year: 'numeric', month: '2-digit', day: '2-digit' });
				
				
				testResultData.append('test_result', 'сдан');  									//результат теста
				testResultData.append('record_mode', 'действущая'); 							//статус записи
				testResultData.append('test_result_resume', all_questions+'/'+wrong_answers); 	//количество вопросов/количество неправильных ответов
				testResultData.append('test_result_resume2', WrongAnswersString()); 				//текст неправильных ответов и заданных вопросов
				testResultData.append('test_validity', test_validity); 							//проверка на срок
				
				if($('input[name=book_eID]').val() !=='undefined'){
					testResultData.append('book_eID', $('input[name=book_eID]').val());
				}
				
				if($('input[name=book_tID]').val() !=='undefined'){
					testResultData.append('book_tID', $('input[name=book_tID]').val());
				}
				
			}
			
			if(test_vid == 1){
				main_test.writeTestResult();
			}
			
			
		}else{
		
			$('fieldset[block_number='+block_number+'] .btn_next_question').prop('disabled', false);
		}
		
	});
	
	
	
	
});

function updateCounter(){

	var secondsForTest = $('#seconds_left_full').val();
	
	var minsForTestLeft =  Math.floor(secondsForTest/60);
	
	if(secondsForTest >= 0){
		$('#minuts').text(minsForTestLeft);
		$('#seconds').text(secondsForTest% 60 >= 10 ? secondsForTest% 60 : '0'+secondsForTest% 60 );
		
		var secondsForTestLeft = (secondsForTest- 1) % 60;
		
		
		 $('#seconds_left_full').val(secondsForTest - 1);
	
	}else{
		clearInterval(counterInterval);
		$('.fieldset_test_block input').prop('disabled', true);
		$('.btn_next_question').prop('disabled', true);
		$('#messenger_test').css({'display':'block'});
		$('#messenger_test').css({'background':'#EDF4FF'});
		$('#messenger_test').css({'color':'rgb(83, 102, 127)'});
		$('#messenger_test').html('время на прохождение теста истекло');
		
		$('#btn_showAllQuestions').prop("disabled",false);
		$('#btn_printAllQuestions').prop("disabled",false);
		if($('input[name="test_vid"]').val() == 1){
			$('#print_protocol').prop("disabled",false);
		}
	}
	
}