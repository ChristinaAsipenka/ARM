
<script src="/ARM/examination/Assets/js/main_test.js"></script>
<!--script src="/ARM/examination/Assets/js/countdown.js"></script-->
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5><?php echo ($test_vid == 1 ? 'Экзамен' : 'Пробное тестирование'); ?></h5>
					<h3><span id='test_vid'>
							<?php echo ($test_napr == 1 ? '<span>по проверке знаний электротехнического (электротехнологического) персонала </span>' : '<span>по проверке знаний персонала ответственного за тепловое хозяйство</span>');
								if(isset($test_group) && $test_group > 0){
									echo ' на '.$test_group.' группу.';
								}
							?>
						</span>
					</h3>
                </div>
            </div>
					
            <div class="base_part">
            
				
				<div>
					<p><span class='person_name'>
							<?php echo (strlen($resp_pers_secondname) > 0 ? $resp_pers_secondname : '');?> 
							<?php echo (strlen($resp_pers_firstname) > 0 ? $resp_pers_firstname : '');?> 
							<?php echo (strlen($resp_pers_lastname) > 0 ? $resp_pers_lastname : '');?>
						</span> 
						<span class='t'><?php echo (strlen($resp_pers_post) > 0 ? " - ".$resp_pers_post : '<label class="font-size-11">* результаты пробного тестирования не сохраняются</label>');?></span>
						<span class=''><?php echo (strlen($name_unp) > 0 ? "<br>наниматель: ".$name_unp : '');?></span>	
					</p>	
				</div>
				
			 
			   	<?php if(isset($book_eID)){?>
					<input type='hidden' name='book_eID' value='<?php echo $book_eID; ?>'>	
					
					
				<?php }else{?>
					<input type='hidden' name='book_tID' value='<?php echo $book_tID; ?>'>
									
				<?php }?>

				<input type='hidden' name='test_vid' value='<?php echo $test_vid; ?>'>			   
				<input type='hidden' name='test_validity_year' value='<?php echo $test_validity_year; ?>'>	<!-- проверка знаний действительна ??? лет -->	
				
				
				<?php if($test_vid == 1){?>
				<div id='countdown' class='countdown'>
				<input type='hidden' name='minuts_for_test' id='minuts_for_test' value='<?php echo $set_time; ?>'>	
				<input type='hidden' name='seconds_left_full' id='seconds_left_full' value='<?php echo $set_time*60; ?>'>	
		
					<div class='time'><span id='minuts'></span></div>:
					<div class='time'><span id='seconds'></span></div>
				</div>				
				<?php }?>
				<form id="formPage" mode="new_testing" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
				
			
				<?php 
				
				shuffle($arr_qstns);
				$block_number = 0;
					foreach($arr_qstns as $one_qstn){
						$block_number++;
					?>	
					<fieldset class = "fieldset_test_block" id_question='<?php echo $one_qstn['id'];?>' block_number='<?php echo $block_number; ?>'>	
					<!--p>(Номер вопроса <?php /*echo $one_qstn['id'];*/?>)</p-->
						<p class='test_question'><?php echo 'Вопрос №'.$block_number.".<br>".$one_qstn['question'];?></p>
						
						<?php
						foreach($arr_answrs as $one_answr){
						
							if($one_answr['id_question'] == $one_qstn['id']){
						
								echo '<label for="'.$one_answr['id'].'" class="test_answer" id_question="answer_'.$one_answr['id'].'"><input type="radio" name="question'.$one_qstn['id'].'" value="'.$one_answr['id'].'" mark="'.$one_answr['mark'].'" id='.$one_answr['id'].'><span>'.$one_answr['answer'].'</span></label>';
							}
						?>
						
						
						<?php } 
						
						if($block_number < count($arr_qstns)){
						?>
						
						<button onclick="main_test.nextQuestion('<?php echo $block_number+1; ?>')" class='btn_next_question' disabled>>> Следующий >> </button>
						<?php	}?>
					</fieldset>	
					<?php 	}
				?>
					<input type='hidden' name='col_wrong_answers' value='<?php echo $set_wrong_answers; ?>'>	
					<input type='hidden' name='col_try' value='<?php echo $set_try; ?>'>	
					
				</form>
				<div class='commission_list'>
					<p>Председатель комиссии: <span><?php echo (strlen($member_1) > 0 ? $member_1 : '');?></span>, <span><?php echo (strlen($member_1_position) > 0 ? $member_1_position : '');?></span></p>
					<p>Член комиссии: <span><?php echo (strlen($member_2) > 0 ? $member_2 : '');?></span>, <span><?php echo (strlen($member_2_position) > 0 ? $member_2_position : '');?></span></p>
					<p>Член комиссии: <span><?php echo (strlen($member_3) > 0 ? $member_3 : '');?></span>, <span><?php echo (strlen($member_3_position) > 0 ? $member_3_position : '');?></span></p>
				</div>
				<div id="messenger_test"></div>
				
					<p>Всего вопросов: <span id="all_questions"></span> из <span id='col_from_settings'><?=count($arr_qstns) ?></span></p>
					<p>Количество правильных ответов: <span id="for_right_answers"></span></p>
					<p>Количество неверных ответов: <span id="for_wrong_answers"></span></p>
					<p id='test_result'></p>
			
				<!--------------------------------- Кнопки навигации НИЖНИЕ --------------------------------->
				<div class="nav_buttons">
					<button type="submit" class="shine-button" onclick="test.test_cancel()">Завершить</button>
					<button type="submit" class="shine-button" onclick="main_test.showAllQuestions()" id='btn_showAllQuestions' disabled>Просмотреть весь билет</button>
					<button type="submit" class="shine-button" onclick="main_test.showAllQuestions(); window.print();return false;" id='btn_printAllQuestions' disabled>Распечатать билет</button>
					<button type="submit" class="shine-button" id='print_protocol' onclick="<?php echo ($test_napr == 1 ? 'report_zurnal.zurnalMain_e('.$book_eID.')' : 'report_zurnal.zurnalMain_t('.$book_tID.')'); ?>" disabled='disabled'>Печать протокола (выписки)</button>
				</div>
										                 
											
              

            </div>
        </div>


