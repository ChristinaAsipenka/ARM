<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-question"></i></span><p>Проверка заний</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Загрузка вопросов из Excel</h5>
					<!--h3><span><i class="icon-test">&nbsp</i></span>Проверка знаний</h3--->
                </div>
            </div>
					
            <div class="base_part">
               
                <form id="formPage" mode="new_testing" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
					<div class="form-group">
						<div class="block w2-5">
							<label for="formTitle" class='label_subject'><span class = "formTextRed">*</span>Группа электробезопасности:</label>
						</div>	
						<select class="form-controls" name="test_group" id="test_group">
							<option value='0'>Выберите группу электробезопасности:</option>
							<?php foreach($spr_test_group as $test_group):?>
								<option value=<?=$test_group['id']?>><?=$test_group['name']?></option>
							<?php endforeach; ?>
						</select>
					</div>
										
				</form>
				
            </div>
        </div>
    </main>



<?php $this->theme->footer(); ?>