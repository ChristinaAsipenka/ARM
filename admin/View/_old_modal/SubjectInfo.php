<div id="openModalSubjectInfo" class="modalDialogSubjectInfo">
	<div class="main_div_info">
		<legend class="legend_potr"><span><i class="icon-subject"></i></span>&nbspИнформация о потребителе</legend>
		<div class="sticky">
			<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSubjectInfo')">x</button>
		</div>	
			<fieldset class = "fieldset_info">
				<legend class="legend_potr"><p id="name_subj" class="p_info"></p></legend>
										
					<div class="div_info">
						<p class="label_info">Юридическое лицо:</p><p id="id_unp"></p>
					</div>
					<div class="div_info">
						<p class="label_info">Наименование:</p><p id="id_unp_name_main"></p>
					</div>					
					<div class="div_info">
						<p class="label_info">Номер дела:</p><p id="delo_new"></p>
					</div>
					<div class="div_info">
						<label class="label_info">Номер дела по старой нумерации:</label><p id="delo"></p>
					</div>
					<div class="div_info">
						<label class="label_info">Вышестоящая организация:</label><p id="id_unp_head"></p>
					</div>
					<div class="div_info">
						<label class="label_info">Форма собственности:</label><p id="property"></p>
					</div>
					<div class="div_info">
						<label class="label_info">Ведомственная принадлежность:</label><p id="department"></p>
					</div>
					<div class="div_info">
						<label class="label_info">Основной вид деятельности:</label><p id="unp_type_act"></p>
					</div>					
					<div class="div_info">
						<label class="label_info">Сменность работ:</label><p id="unp_shift_work"></p>
					</div>					
					<hr/>
					<div class="div_info">
						<label class="label_info">Закрепление потребителя:</label><p id="unp_zakrep"></p>
					</div>					
					<hr/>				   
				   
					<div class="div_info">
						<label class="label_info">Фактический адрес:</label><p id="place_adress"></p>
					</div>				   
					<div class="div_info">
						<label class="label_info">Почтовый адрес:</label><p id="post_adress"></p>
					</div>	
					<hr/>
					
					<div class="div_info">
						<label class="label_info">Договор с энергоснабжающей организацией электрической энергии:</label><p id="supply_dog"></p>
					</div>					   
					<hr/>
					
					<div class="div_info">
						<label class="label_info">Руководство:</label>
					</div>					   
				   	<div class="div_info_insp">
						<label class="label_info">Руководитель организации:</label><p id="ruk"></p>
					</div>
				   	<div class="div_info_insp">
						<label class="label_info">Главный инженер:</label><p id="gi"></p>
					</div>
				   	<div class="div_info_insp">
						<label class="label_info">Главный энергетик:</label><p id="ge"></p>
					</div>	
					<hr/>
					
					<div class="div_info">
						<label class="label_info">Ответственные лица:</label>
					</div>					   
				   	<div class="div_info_insp">
						<label class="label_info">за электрохозяйство:</label><p id="resp_o_e"></p>
					</div>
				   	<div class="div_info_insp">
						<label class="label_info">за электрохозяйство(заместитель):</label><p id="resp_o_e_zam"></p>
					</div>
				   	<div class="div_info_insp">
						<label class="label_info">за тепловое хозяйство:</label><p id="resp_o_t"></p>
					</div>	
				   	<div class="div_info_insp">
						<label class="label_info">за газовое хозяйство:</label><p id="resp_o_g"></p>
					</div>					
					<hr/>					

					<div class="div_info"><label class="label_info">Объекты потребителя и закрепленные за ними инспектора:</label></div>
					<br>
					<table class='objects_list'>
						<thead>
							<tr>
								<th>Наименование</th>
								<th>Инспектор ЭТИ</th>
								<th>Инспектор Тепло</th>
								<th>Инспектор ТИ</th>
								<th>Инспектор ГН</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
										
											
					</table>
					<hr/>
					
					<div class="div_info"><label class="label_info">Сведения о режиме электропотребления:</label></div>
					<br>
					<table class='bron_list'>
						<thead>
							<tr>
								<th>Наименование</th>
								<th>Мощность аварийной брони (кВт)</th>
								<th>Мощность технологической брони (кВт)</th>
								<th>Время завершения технологического процесса</th>
								<th>Дата составления акта</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
					
					</table>
					<hr/>
					
					<div class="div_info"><label class="label_info">Аварийная и технологическая броня теплоснабжения:</label></div>
					<br>
					<table class='bron_list_teplo'>
						<thead>
							<tr>
								<th>Наименование</th>
								<th>Нагрузка аварийной брони (Гкал/ч)</th>
								<th>Нагрузка аварийной брони (т/ч)</th>
								<th>Нагрузка технологической брони (Гкал/ч)</th>
								<th>Нагрузка технологической брони (т/ч)</th>
								<th>Время завершения технологического процесса (ч.)</th>
								<th>Дата составления акта</th>
							</tr>
						</thead>
						<tbody>
								
						</tbody>
										
											
					</table>					
			</fieldset>







	</div>
</div>
<div id="openModalSubjectInfo_overlay" class='overlay'></div>