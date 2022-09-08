<div id="openModalObjectsInfo" class="modalDialogObjectsInfo">
	<div class="main_div_info">
		<legend class="legend_potr"><span><i class="icon-object"></i></span>&nbspИнформация об объекте:<p id="names"></p></legend>
		<div class="sticky">
			<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalObjectsInfo')">x</button>
		</div>
		</br>
		
		    <div class="">

						<div class="tabs">
							<input id="tab1" type="radio" name="tabs" checked>
							<label for="tab1" title="Вкладка 1"><span><i class="icon-info"></i></span></label>
						 
							<input id="tab2" type="radio" name="tabs">
							<label for="tab2" title="Вкладка 2"><span><i class="icon-energy"></i></span></label>
						 
							<input id="tab3" type="radio" name="tabs">
							<label for="tab3" title="Вкладка 3"><span><i class="icon-teplo"></i></span></label>
						 
							<input id="tab4" type="radio" name="tabs">
							<label for="tab4" title="Вкладка 4"><span><i class="icon-ti"></i></span></label>
							
							<input id="tab5" type="radio" name="tabs">
							<label for="tab5" title="Вкладка 4"><span><i class="icon-fire"></i></span></label>
						
						<div class='tabs-section'>
<!------Основная информация-------------------------------------------------------------------------------->
								<section id="content-tab1">
								<p class="p_gaz">Основная информация по объекту:</p>
								<hr/>
														
									<div class="div_info">
										<label class="label_info">Наименование:</label><p id="name"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Номер дела:</label><p id="delo_news"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Номер дела по старой нумерации:</label><p id="num_case_o"></p>
									</div>
									<!--div class="div_info">
										<label class="label_info">Закрепление объекта:</label><p id="mesto_object"></p>
									</div-->									
									<div class="div_info">
										<label class="label_info">Адрес местонахождения:</label><p id="adress_object"></p>
									</div>	
									<!--div class="div_info">
										<label class="label_info">Административный район:</label><p id="admin_spr"></p>
									</div-->									
								</section> 
<!------Электро------------------------------------------------------------------------------------------->								
								<section id="content-tab2">
								<p class="p_gaz">Информация по объекту электрической энергии</p>
								<hr/>
									<div class="div_info">
										<label class="label_info">Закрепленный инспектор:</label><p id="insp_e"></p>
									</div>		
									<hr/>
									
									<p class="p_gaz">Информация о надежности электроснабжения:</p>
									<div class="div_info">
										<label class="label_info">Установленная мощность, кВт:</label><p id="sum_power"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность эл.приемника 1 категории, кВт:</label><p id="e_cat_1"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность эл.приемника 1 особой категории, кВт (входит в том числе в 1 кат.):</label><p id="e_cat_1plus"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность эл.приемника 2 категории, кВт:</label><p id="e_cat_2"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность эл.приемника 3 категории, кВт:</label><p id="e_cat_3"></p>
									</div>
									<hr/>
									
									<p class="p_gaz">Сведения о режиме электропотребления:</p>
									<div class="div_info">
										<label class="label_info">Наличие брони:</label><p id="e_armor"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность аварийной брони, кВт:</label><p id="e_armor_crach"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Мощность технологической брони, кВт:</label><p id="e_armor_tech"></p>
									</div>	
									<div class="div_info">
										<label class="label_info">Время завершения технологического процесса, ч.:</label><p id="e_armor_time"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Дата составления акта:</label><p id="e_armor_date"></p>
									</div>
									<hr/>
									
									<p class="p_gaz">Сведения о субабонентах:</p>
									<div id='table_subobj'>
									</div>
									
									<hr/>
									<div class="div_info">
										<label class="label_info">Является субабонентом:</label><p id="e_subob"></p>
									</div>	
									<div class="div_info">
										<label class="label_info">Привязка субабонента к своему потребителю:</label><p id="e_subobj_subject"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Разрешенная мощность субабоненту, кВт:</label><p id="e_power"></p>
									</div>
									<hr/>


									<p class="p_gaz">Кабельные и воздушные линии</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_klvl">
												<thead>
													<tr>
														<th class="t2">Тип</th>
														<th class="t4">Напряжение линии, кВ</th>
														<th class="t4">Название и номер линии</th>
														<th class="t4">Марка провода</th>
														<th class="t4">Длина, км</th>
														<th class="t4">Точка подключения</th>
														<th class="t4">Год ввода в эксплуатацию</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>
										
									</div>									
									
									<div class = "resut_row_table"><div><p class="p_gaz">Транформаторные и распределительные подстанции</p></div><div><p class="numrow" id = "numrow_trps"></p></div></div>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_tp">
												<thead>
													<tr>
														<th class="t4">Наименование</th>
														<th class="t4">Тип</th>
														<th class="t4">Мощность, кВ</th>
														<th class="t4">Напряжение, кВт</th>
														<th class="t4">Год ввода в эксплуатацию</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>									
									
									
									
									<div class = "resut_row_table"><div><p class="p_gaz">АВР</p></div><div><p class="numrow" id = "numrow_avrs"></p></div></div>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_avr_info">
												<thead>
													<tr>
														<th class="t4">Место установки</th>
														<th class="t4">Напряжение, кВ</th>
														<th class="t4">Время срабатывания, секунд</th>
														<th class="t4">Дата последней проверки срабатывания</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
											
									</div>									


									<p class="p_gaz">Автономные источники электроснабжения</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_aie">
												<thead>
													<tr>
														<th class="t4">Наименование / марка</th>
														<th class="t4">Тип</th>
														<th class="t4">Напряжение, кВ</th>
														<th class="t4">Завод изготовитель</th>
														<th class="t4">Год выпуска</th>
														<th class="t4">Дата последнего тех.обсл.</th>
														<th class="t4">Место установки</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
									</div>


																
									<p class="p_gaz">Блок-станции/собственной генерации</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_oe_block">
												<thead>
													<tr>
														<th class="t2">Наименование</th>
														<th class="t4">Мощность, кВт</th>
														<th class="t4">Вид используемой энергии</th>
														<th class="t4">Возможность работы на выделенную нагрузку</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										
									</div>	
									
									<hr/>	
									<div class="div_info">
										<label class="label_info">Район электрических сетей:</label><p id="e_district"></p>
									</div>									
									<div class="div_info">
										<label class="label_info">Находится в зоне подтопления паводковыми водами:</label><p id="e_flood"></p>
									</div>										

								</section>
<!------Тепло--------------------------------------------------------------------------------------------->									
								<section id="content-tab3">
								<p class="p_gaz_info" id = "is_t_info"></p>
								
								<div class="hr"><hr/></div>
									<div class="div_info">
										<label class="label_info">Закрепленный инспектор:</label><p id="insp_t"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Функциональное назначение:</label><p id="t_id_spr_ot_functions"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Категория надежности теплоснабжения:</label><p id="t_id_spr_ot_cat"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Год ввода в эксплуатацию:</label><p id="t_year"></p>
									</div>
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Источники теплоснабжения</p>
									
									<div class="div_info">
										
											<div id="t_heat_source_ti_own_table">
																	
											</div>					
									</div>
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Тепловые сети объекта</p>
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet_t">
												<thead>
													<tr>
														<th class="t3">Точка подключения</th>
														<th class="t3">Длина участка, м.</th>
														<th class="t3">Условный диаметр, мм.</th>
														<th class="t3">Кол-во труб, шт.</th>
														<th class="t3">Техническое исполнение</th>
														<th class="t3">Вид трубы</th>
														<th class="t3">Вид изоляции</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>										
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Индивидуальный тепловой пункт</p>
									<p class="p_gaz">Приборы учета</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_tp">
												<thead>
													<tr>
														<th class="t4">Типы ПУ</th>
														<th class="t4">Кол-во ПУ, шт.</th>
														<!--th class="t4">Тип САР</th>
														<th class="t4">Кол-во САР, шт.</th-->
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
											
									</div>
									<p class="p_gaz">Системы автоматического регулирования</p>
									<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_personal_sar">
												<thead>
													<tr>
														<!--th class="t4">Типы ПУ</th>
														<th class="t4">Кол-во ПУ, шт.</th-->
														<th class="t4">Тип САР</th>
														<th class="t4">Назначение САР</th>
														<th class="t4">Кол-во САР, шт.</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
											
									</div>									
									
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Ситема отопления</p>
									<div class="div_info">
										<label class="label_info">Место присоединения:</label><p id="t_systemheat_place"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Тип:</label><p id="t_systemheat_water"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Разводка:</label><p id="t_systemheat_layout"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид отопительных приборов:</label><p id="t_systemheat_type_op"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Марка отопительных приборов:</label><p id="t_systemheat_mark_op"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Схема присоединения:</label><p id="t_systemheat_dependent"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид теплообменника:</label><p id="t_spr_id_ot_type_to"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Марка теплообменника:</label><p id="t_systemheat_mark_to"></p>
									</div>	
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Горячее водоснабжение</p>
									<div class="div_info">
										<label class="label_info">Тип схемы:</label><p id="t_gvs_open"></p>
									</div>
									<!--div class="div_info">
										<label class="label_info">Место расположения:</label><p id="t_gvs_in"></p>
									</div>
									<div class="div_info">
										<label class="label_info">убрать поле</label><p id="t_gvs_place"></p>
									</div-->
									<div class="div_info">
										<label class="label_info">Место присоединения:</label><p id="t_gvs_connect"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид теплообменника:</label><p id="t_gvs_type"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Марка теплообменника:</label><p id="t_gvs_mark"></p>
									</div>									
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Приточная вентиляция</p>
									<div class="div_info">
										<label class="label_info">Место присоединения:</label><p id="t_forced_vent_place"></p>
									</div>	
									<div class="div_info">
										<label class="label_info">Количество вентиляционных систем, шт.:</label><p id="t_forced_vent_count"></p>
									</div>
									<div class="hr"><hr/></div>									
									
									
									<p class="p_gaz">Нагрузки</p>
									<div class="form-group">
										<p class="p_gaz">Общая нагрузка, Гкал/ч: </p><p id = "sum_workload" class="p_gaz"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка на отопление, Гкал/ч:</label><p id="t_workload_heating"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка на ГВС, Гкал/ч:</label><p id="t_workload_gvs"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка на приточно-отопительную вентиляцию, Гкал/ч:</label><p id="t_workload_pov"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Технологическая нагрузка, Гкал/ч:</label><p id="t_workload_tech"></p>
									</div>
									<div class="div_info">
										<label class="label_info">В паре, т/ч:</label><p id="t_workload_vapor"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Процент возврата конденсата, %:</label><p id="t_workload_percent"></p>
									</div>		
									<div class="hr"><hr/></div>
									
									<p class="p_gaz">Аварийная и технологическая броня теплоснабжения</p>
									<div class="div_info">
										<label class="label_info">Наличие брони:</label><p id="t_armor"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка аварийной брони, Гкал/ч:</label><p id="t_armor_crach"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка аварийной брони, т/ч:</label><p id="t_armor_crach_vapor"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка технологической брони, Гкал/ч:</label><p id="t_armor_tech"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Нагрузка технологической брони, т/ч:</label><p id="t_armor_tech_vapor"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Время завершения технологического процесса, ч.:</label><p id="t_armor_time"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Дата составления акта:</label><p id="t_armor_date"></p>
									</div>									

									
								
								</section>
<!------ТИ------------------------------------------------------------------------------------------------>									
								<section id="content-tab4">
								<p class="p_gaz_info" id="is_ti_info"></p>
								
								<div class="hr"><hr/></div>
									<div class="div_info">
										<label class="label_info">Закрепленный инспектор:</label><p id="ti_insp"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Наименование теплоисточника:</label><p id="ti_name"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Включен в реестр ТИ:</label><p id="is_reestr_ti"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Назначение котельной:</label><p id="ti_id_spr_ot_boiler_type"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Год ввода в эксплуатацию:</label><p id="ti_year"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Установленная мощность котельной, Гкал/ч:</label><p id="ti_power"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид основного топлива:</label><p id="ti_id_spr_ot_type_fuel_1"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид резервного топлива:</label><p id="ti_id_spr_ot_type_fuel_2"></p>
									</div>

										<p class="p_gaz">Водогрейные котлы</p>
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_water">
												<thead>
													<tr>
														<th class="t2">Наименование/Марка</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														<th class="t4">Мощность, Гкал/ч</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>
										
										
										<p class="p_gaz">Паровые котлы</p>
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="boiler_vapor">
												<thead>
													<tr>
														<th class="t2">Наименование/Марка</th>
														<th class="t4">Год ввода в эксплуатацию</th>
														<th class="t4">Мощность, т/ч</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>										
										
										<div class="div_info">
											<label class="label_info">Вид отпускаемой тепловой энергии:</label><p id="ti_out_power"></p>
										</div>
										<div class="div_info">
											<label class="label_info">на отопление:</label><p id="ti_out_power_ot_is"></p>
										</div>
										<div class="div_info">
											<label class="label_info">на ГВС:</label><p id="ti_out_power_gvs_is"></p>
										</div>									
										<div class="div_info">
											<label class="label_info">на технологические нужды:</label><p id="ti_out_power_tech_is"></p>
										</div>
										<div class="div_info">
											<label class="label_info">на вентиляцию:</label><p id="ti_out_power_vent_is"></p>
										</div>										
									
									
										
										<p class="p_gaz">Тепловые сети теплоисточника</p>
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_ot_heatnet">
												<thead>
													<tr>
														<th class="t3">Точка подключения</th>
														<th class="t3">Длина участка, м.</th>
														<th class="t3">Условный диаметр, мм.</th>
														<th class="t3">Кол-во труб, шт.</th>
														<th class="t3">Техническое исполнение</th>
														<th class="t3">Вид трубы</th>
														<th class="t3">Вид изоляции</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>										
										
										<div>
											<p class="p_gaz">Подключенные объекты</p>
											<div id="ti_heat_object">
																	
											</div>					
										</div>
									
								</section>
<!------Газ------------------------------------------------------------------------------------------->									
								<section id="content-tab5">
								<p class="p_gaz_info" id = "is_g_info"></p>
								
								<div class="hr"><hr/></div>
									<div class="div_info">
										<label class="label_info">Закрепленный инспектор:</label><p id="g_insp"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Тип здания:</label><p id="type_home"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Количество квартир:</label><p id="count_flat"></p>
									</div>									
									<div class="div_info">
										<label class="label_info">Количество подъездов:</label><p id="count_pod"></p>
									</div>									
									
									
									
										<p class="p_gaz">Установленное газоиспользующее оборудование</p>
										<div class="mobileTable">
											<table class="cwdtable" cellspacing="0" cellpadding="1" border="1" id="obj_og_device">
												<thead>
													<tr>
														<th class="t2">Тип</th>
														<th class="t3">Количество, шт.</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>	
										</div>						
									
									
									<div class="div_info">
										<label class="label_info">Вид дымохода:</label><p id="g_id_spr_og_flue"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Материал дымохода:</label><p id="g_id_spr_og_flue_mater"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Размер дымохода, мм.:</label><p id="g_flue_size"></p>
									</div>
									<div class="div_info">
										<label class="label_info">Вид газа:</label><p id="g_id_spr_og_type_gaz"></p>
									</div>

								</section>
						
						
						
						
						
						
						</div>
					</div>
				
			</div>








	</div>
</div>
<div id="openModalObjectsInfo_overlay" class='overlay'></div>


