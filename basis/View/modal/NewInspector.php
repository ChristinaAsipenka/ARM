<div id="openNewInspector" class="modalDialog" id_obj='' id_sbj=''>
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openNewInspector')">x</button>
		
		<div class='window_part'>
			<div class='window_part_left'>
		<p class='modal_title'>Объекты потребителя</p>
			<div id='obj_list'>
			</div>
			<input type='hidden' name = 'arm_gruppa' value="">
		</div>
		
			<div class='window_part_right'>
			<p class='modal_title'>Новый инспектор</p>
			 <div class="fm">
		<select id='fm_branch' <?php echo ($access_level > 4 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите филиал</option>
			<?php
			
				foreach($branch as $one_branch)
				{
					echo '<option value="'.$one_branch['id'].'" '.($one_branch['id'] == $spr_cod_branch ?  'selected' : '').'>'.$one_branch['sokr_name'].'</option>';
				}
			?>
		</select>
		<select id='fm_podrazdelenie' <?php echo ($access_level > 3 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите МРО</option>
			<?php
			
				foreach($podrazdelenie as $one_podrazdelenie)
				{
					echo '<option value="'.$one_podrazdelenie['id'].'" '.($one_podrazdelenie['id'] == $spr_cod_podrazd ?  'selected' : '').'>'.$one_podrazdelenie['sokr_name'].'</option>';
				}
			?>
		</select>
		<select id='fm_otdel' <?php echo ($access_level > 2 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите РЭГИ</option>
			<?php
			
				foreach($otdel as $one_otdel)
				{
					echo '<option value="'.$one_otdel['id'].'" '.((($access_level == 2 || $access_level == 3) &&  $one_otdel['id'] == $spr_cod_otd )?  'selected' : '').'>'.$one_otdel['sokr_name'].'</option>';
				}
			?>
		</select>
		<select id='fm_fio'  <?php echo ($access_level > 1 ? '' : 'disabled') ;?>>
			<option value='0'>Выберите инспектора</option>
			<?php
				if(isset($user)){
					foreach($user as $one_user)
					{
						echo '<option value="'.$one_user['id'].'" '.(($access_level == 2 && $one_user['id'] == $id_user) ?  'selected' : '').' arm_gruppa = "'.$one_user['arm_gruppa'].'">'.$one_user['fio'].'</option>';
					}
				}
			?>
		</select>
			
	 </div>
		</div>
		
		</div>
		<button onclick='subject.NewInsp();' id='btn_transfer'>Передать</button>
	</div>
</div>
<div id="openNewInspector_overlay" class='overlay'></div>