<?php $this->theme->header(); ?>
	<!-- LOGO БАЗЫ --->	<div class = "logo_units"><span><i class="icon-rp"></i></span><p>Настройка билетов</p></div>
    <main>
        <div class="container">
			<div class="top_of_page">
				<!--------------------------------- Информация о странице --------------------------------->
                <div class="page_title">
                    <h5>Настройка билетов</h5>
					<h3><span><i class="icon-rp">&nbsp</i></span>Формирование билетов и результатов</h3>
                </div>
            </div>
					
            <div class="base_part">
               
                <form id="formPage" mode="settings" class='form'>	
<!----------------------------------------------------------------------------------------Основная информация------------------------------------------------------>		
										
										
										<div class="accordion-container">
									
											<a href="#" class="accordion-titulo"><div><p id = "numrow_ist_teplo"> - для подтверждения (присвоения) группы по электробезопасности электротехническому (электротехнологическому) персоналу</p></div><span class="toggle-icon"></span></a>
											
											<div class="accordion-content">												
												
												
											<div class="form-group">
												<div class="block w6">
													<label class="col_q_font">Количество вопросов: </label>
												</div>
												<p class='label_enter' id="q_gr2" name = 'q_gr2'></p>
												<div class="col_q_rasst"><p class='label_enter' id="q_gr3" name = 'q_gr3'></p></div>
												<div class="col_q_rasst"><p class='label_enter' id="q_gr4" name = 'q_gr4'></p></div>
												<div class="col_q_rasst"><p class='label_enter' id="q_gr5" name = 'q_gr5'></p></div>
												
											</div>	
												<!--thead width="100%">
													<tr>
														<th width="50%" >Количество вопросов:</th>
														<th width="10%" ><span class='label_enter' id="q_gr2" name = 'q_gr2'></span></th>
														<th width="10%" ><span class='label_enter' id="q_gr3" name = 'q_gr3'></span></th>
														<th width="10%" ><span class='label_enter' id="q_gr4" name = 'q_gr4'></span></th>
														<th width="10%" ><span class='label_enter' id="q_gr5" name = 'q_gr5'></span></th>
														<th width="10%" ></th>
													</tr>
												</thead-->
												
												<!------------------------------------------------ Таблица заполнения количества вопросов по темам у электриков--------------------------------------->
												<div class="mobileTable">									
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id = "q_elektro">
															<thead>
																<tr>
																	<th width="50%" class="t3">Тема</th>
																	<th width="10%" class="t3">II гр.</th>
																	<th width="10%" class="t3">III гр.</th>
																	<th width="10%" class="t3">IV гр.</th>
																	<th width="10%" class="t3">V гр.</th>
																	<th width="10%" class="t3">Операции</th>
																</tr>
															</thead>
															<tbody>
																<?php


																	foreach($spr_test_themes_elektro as $test_themes_elektro){
																	echo "<tr id_test_theemes='".$test_themes_elektro['id']."'>";
																	echo "<td width='50%' name='name_themes'>".$test_themes_elektro['name']."</td>";																	
																	echo "<td width='10%' name='count_g2' class ='count_g'>".($test_themes_elektro['group2'] > 0 ? $test_themes_elektro['group2'] : 0)."</td>";
																	echo "<td width='10%' name='count_g3' class ='count_g'>".($test_themes_elektro['group3'] > 0 ? $test_themes_elektro['group3'] : 0)."</td>";
																	echo "<td width='10%' name='count_g4' class ='count_g'>".($test_themes_elektro['group4'] > 0 ? $test_themes_elektro['group4'] : 0)."</td>";
																	echo "<td width='10%' name='count_g5' class ='count_g'>".($test_themes_elektro['group5'] > 0 ? $test_themes_elektro['group5'] : 0)."</td>";
																	echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_theemes',".$test_themes_elektro['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></td></tr>";
																	}
																?>
															</tbody>					
														</table>

												</div>
													
												<!------------------------------------------------ Таблица заполнения количества неправильных ответов и количества попыток  у электриков--------------->							<div class="mobileTable">									
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id = "wrong_a_elektro">
															<thead>
																<tr>
																	<th width="50%" class="t3">Настройки</th>
																	<th width="10%" class="t3">II гр.</th>
																	<th width="10%" class="t3">III гр.</th>
																	<th width="10%" class="t3">IV гр.</th>
																	<th width="10%" class="t3">V гр.</th>
																	<th width="10%" class="t3">Операции</th>
																</tr>
															</thead>
															<tbody>
																<?php

																	
																	echo "<tr id_test_wrong_answer='".$spr_test_elektro_settings[0]['id']."'>";
																	echo "<td width='50%' name='name_wrong_a'>".$spr_test_elektro_settings[0]['name']."</td>";
																	echo "<td width='10%' name='count_wrong_a2' class ='count_g'>".($spr_test_elektro_settings[0]['group2'] > 0 ? $spr_test_elektro_settings[0]['group2'] : 0)."</td>";
																	echo "<td width='10%' name='count_wrong_a3' class ='count_g'>".($spr_test_elektro_settings[0]['group3'] > 0 ? $spr_test_elektro_settings[0]['group3'] : 0)."</td>";
																	echo "<td width='10%' name='count_wrong_a4' class ='count_g'>".($spr_test_elektro_settings[0]['group4'] > 0 ? $spr_test_elektro_settings[0]['group4'] : 0)."</td>";
																	echo "<td width='10%' name='count_wrong_a5' class ='count_g'>".($spr_test_elektro_settings[0]['group5'] > 0 ? $spr_test_elektro_settings[0]['group5'] : 0)."</td>";			
																	echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_wrong_answer',".$spr_test_elektro_settings[0]['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></td></tr>";

																	echo "<tr id_test_attempt='".$spr_test_elektro_settings[1]['id']."'>";
																	echo "<td width='50%' name='name_attempt'>".$spr_test_elektro_settings[1]['name']."</td>";
																	echo "<td width='10%' name='count_attempt_a2' class ='count_g'>".($spr_test_elektro_settings[1]['group2'] > 0 ? $spr_test_elektro_settings[1]['group2'] : 0)."</td>";
																	echo "<td width='10%' name='count_attempt_a3' class ='count_g'>".($spr_test_elektro_settings[1]['group3'] > 0 ? $spr_test_elektro_settings[1]['group3'] : 0)."</td>";
																	echo "<td width='10%' name='count_attempt_a4' class ='count_g'>".($spr_test_elektro_settings[1]['group4'] > 0 ? $spr_test_elektro_settings[1]['group4'] : 0)."</td>";
																	echo "<td width='10%' name='count_attempt_a5' class ='count_g'>".($spr_test_elektro_settings[1]['group5'] > 0 ? $spr_test_elektro_settings[1]['group5'] : 0)."</td>";		
																	echo "<td width='10%' ><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_attempt',".$spr_test_elektro_settings[1]['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></td></tr>";																	
		
																	
																?>
															</tbody>					
														</table>

												</div>													
													
													
													
													
													

											</div>
											
										</div>			
										<!----------------------------------------------------------------->
										<div class="accordion-container">
									
											<a href="#" class="accordion-titulo"><div><p> - для проверки знаний вопросов по охране труда у лиц ответственного за тепловое хозяйство</p></div><span class="toggle-icon"></span></a>
											
											<div class="accordion-content">												
											

											<div class="form-group">
												<div class="block w7">
													<label class="col_q_font">Количество вопросов: </label>
												</div>
												<p class='label_enter' id="q_teplo" name = 'q_teplo'></p>
												
											</div>											
											<!------------------------------------------------ Таблица заполнения количества вопросов по темам у тепловиков--------------------------------------->
												<div class="mobileTable">									
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id = "q_teplo">
															<thead>
																<tr>
																	<th width='50%'class="t3">Тема</th>
																	<th width='40%'class="t3">Количество вопросов</th>
																	<th width='10%' class="t3">Операции</th>
																</tr>
															</thead>
															<tbody>
																<?php

																	foreach($spr_test_themes_teplo as $test_themes_teplo){
																	echo "<tr id_test_theemes_teplo='".$test_themes_teplo['id']."'>";
																	echo "<td width='50%' name='name_themes'>".$test_themes_teplo['name']."</td>";
																	echo "<td width='40%' name='count_g' class ='count_g'>".($test_themes_teplo['count_g'] > 0 ? $test_themes_teplo['count_g'] : 0)."</td>";
																	echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_theemes_teplo',".$test_themes_teplo['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></td></tr>";
																	}
																?>
															</tbody>					
														</table>

												</div>



												<!------------------------------------------------ Таблица заполнения количества неправильных ответов и количества попыток  у тепловиков--------------->							<div class="mobileTable">									
														<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id = "wrong_a_teplo">
															<thead>
																<tr>
																	<th class="t3">Настройки</th>
																	<th class="t3">Кол-во</th>
																	<th class="t3">Операции</th>
																</tr>
															</thead>
															<tbody>
																<?php

																	
																	echo "<tr id_test_wrong_answer_t='".$spr_test_teplo_settings[0]['id']."'>";
																	echo "<td width='50%' name='name_wrong_a_t'>".$spr_test_teplo_settings[0]['name']."</td>";
																	echo "<td width='40%' name='count_wrong_a_t' class ='count_g'>".($spr_test_teplo_settings[0]['count_g'] > 0 ? $spr_test_teplo_settings[0]['count_g'] : 0)."</td>";
																	echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_wrong_answer_t',".$spr_test_teplo_settings[0]['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></td></tr>";

																	echo "<tr id_test_attempt_t='".$spr_test_teplo_settings[1]['id']."'>";
																	echo "<td width='50%' name='name_attempt_t'>".$spr_test_teplo_settings[1]['name']."</td>";
																	echo "<td width='40%' name='count_attempt_a2' class ='count_g'>".($spr_test_teplo_settings[1]['count_g'] > 0 ? $spr_test_teplo_settings[1]['count_g'] : 0)."</td>";
																	echo "<td width='10%'><div class='menu-item-event'><div><button class='button-edit' onclick = \"modalWindow.openModalEdit('ModalTest_attempt_t',".$spr_test_teplo_settings[1]['id'].")\"><i class='icon-fixed-width icon-pencil'></i></button></div></td></tr>";																	
		
																	
																?>
															</tbody>					
														</table>

												</div>






											</div>
											
										</div>											
										
						
				</form>


										                 
											
              

            </div>
        </div>
    </main>

<?php Theme::block('modal/modal_Test_theemes') ?>
<?php Theme::block('modal/modal_Test_theemes_teplo') ?>
<?php Theme::block('modal/modal_Test_wrong_answer') ?>
<?php Theme::block('modal/modal_Test_wrong_answer_t') ?>
<?php Theme::block('modal/modal_Test_attempt') ?>
<?php Theme::block('modal/modal_Test_attempt_t') ?>

<?php $this->theme->footer(); ?>