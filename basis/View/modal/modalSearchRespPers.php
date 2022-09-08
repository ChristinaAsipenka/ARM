<div id="openModalRespPers" class="modalDialog">
	<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalRespPers')">x</button>
	
	<p class="modal_title">Назначение ответственного лица</p>
	
	<div class="form-group type_otv">
		<label for="formTitle" class='label_subject'>Тип ответственного:</label>
			<input type="hidden" name="flag_insp" id="flag_insp" value="">
			<select class="form-controls" name="type_otv" id="type_otv" onclick="personal.search_hide_show(this.value)">
				<option value='0'>Выберите тип ответственного</option>
					<?php foreach($spr_otv_vibor as $type_otv):?>
						<option value=<?=$type_otv['id']?>><?=$type_otv['name']?></option>
					<?php endforeach; ?>
			</select>
	</div>


<!-------------------------------------------------------------- блок для выбора собственного ответственного -------------------------------------------->	
	<div id  = "otv_sob1">
		<div class="form-group type_otv" id="dis_name_otv_sob1">
			<p class='label_subject' id = "l1"></p>
				<select class="form-controls" name="name_otv_sob1" id="name_otv_sob1" onclick="personal.num_dog_otv1_hide(this.value)">
					<option value='0'>Выберите ответственное лицо</option>
						<?php foreach($spr_name_otv_sob as $name_otv_sob1):?>
							<option value=<?=$name_otv_sob1['id']?>><?=$name_otv_sob1['name']?></option>
						<?php endforeach; ?>
				</select>
		<p id = "error_otv_unp1" class="error_otv_unp1"></p>
		</div>	
	</div>
	<div id  = "otv_num_dog_sob1">
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Номер приказа:</label>
			<input type='text' name = 'num_pr1' id = 'num_pr1' class='form-controls'>
		</div>
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Дата приказа:</label>
			<input type='date' name = 'data_pr1' id = 'data_pr1' class='form-controls'>
		</div>		
	</div>
	
	<div id  = "otv_sob2">
		<div class="form-group type_otv" id="dis_name_otv_sob2">
			<p class='label_subject'  id = "l2"></p>
				<select class="form-controls" name="name_otv_sob2" id="name_otv_sob2" onclick="personal.num_dog_otv2_hide(this.value)">
					<option value='0'>Выберите ответственное лицо</option>
						<?php foreach($spr_name_otv_sob as $name_otv_sob2):?>
							<option value=<?=$name_otv_sob2['id']?>><?=$name_otv_sob2['name']?></option>
						<?php endforeach; ?>
				</select>
		<p id = "error_otv_unp2" class="error_otv_unp2"></p>
		</div>	
	</div>
	<div id  = "otv_num_dog_sob2">
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Номер приказа:</label>
			<input type='text' name = 'num_pr2' id = 'num_pr2' class='form-controls'>
		</div>
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Дата приказа:</label>
			<input type='date' name = 'data_pr2' id = 'data_pr2' class='form-controls'>
		</div>		
	</div>
<!-------------------------------------------------------------- блок для выбора стороннего ответственного ------------------------------------------------------------------------->	
	<div id = "otv_stor">
		<div class="form-group type_otv">																				
			<label for = 'search' class='label_subject'>Ответственное лицо:</label>
				<div class="search-request">
					<input type="hidden" name="formUnpOtvId" id="formUnpOtvId" value="">
					<span id="name_otv_stor"></span>
				</div>
				<button onclick = "modalWindow.openModal('openModalUNP')" id='unp_resp' class="shine-button">Выбрать из реестра юридических лиц и ИП</button>
		</div>
		<input type="hidden" class='label_subject' id = "id_stor_otv" value=""></p>
		<p class="otv_stor_p" id = "stor_otv"></p>
		
		<div id  = "otv_num_pr_stor">
			<div class="form-group type_otv">
				<label for="formTitle" class='label_subject'>Номер приказа:</label>
				<input type='text' name = 'num_pr' id = 'num_pr' class='form-controls'>
			</div>
			<div class="form-group type_otv">
				<label for="formTitle" class='label_subject'>Дата приказа:</label>
				<input type='date' name = 'data_pr' id = 'data_pr' class='form-controls'>
			</div>		
		</div>	
		<div id  = "otv_num_dog_stor">
			<div class="form-group type_otv">
				<label for="formTitle" class='label_subject'>Номер договора:</label>
				<input type='text' name = 'num_stor_dog' id = 'num_stor_dog' class='form-controls'>
			</div>
			<div class="form-group type_otv">
				<label for="formTitle" class='label_subject'>Дата договора:</label>
				<input type='date' name = 'data_stor_dog' id = 'data_stor_dog' class='form-controls'>
			</div>
		</div>	
	</div>
	<!--/div>
<!-------------------------------------------------------------- блок для выбора ответственного по инструктажу ------------------------------------------------------------------------->	
	<div id = "otv_instr">
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Руководитель:</label>
			<input type='text' name = 'name_otv_instr' id = 'name_otv_instr' class='form-controls fam_dir' disabled="">
			<p id = "error_otv_instr" class="error_otv_instr"></p>
		</div>		
		<div class="form-group type_otv">
			<label for="formTitle" class='label_subject'>Дата инструктажа:</label>
			<input type='date' name = 'data_instr' id = 'data_instr' class='form-controls'>
		</div>
	</div>












<!-------------------------------------------------------------- блок кнопок ------------------------------------------------------------------------->
	<div class="group otv_button">
		<div class="group-button" id="but_otv_add">
			<button type="submit" id="otv_add" class="btn btn-primary" onclick="personal.insert_otv()">Добавить</button>
			<button type="submit" class="btn btn-primary" onclick = "modalWindow.closeModal('openModalRespPers')">Отмена</button>
		</div>
	</div>	




</div>
<div id="openModalRespPers_overlay" class='overlay'></div>

<?php Theme::block('modal/modalSearchUnp') ?>