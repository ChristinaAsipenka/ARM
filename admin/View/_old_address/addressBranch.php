<fieldset class = "fieldset_potr">
	<legend class="legend_potr"><span><i class="icon-pin"></i></span>&nbspЗакрепление потребителя</legend>	

	
<div class="form-group">
	<label for="formTitle" class='label_subject'>Филиал:</label>
	<select class="form-controls" name="branchNameObject" id="formBranchObject" onchange='address.selectPodrazdelenie("Object")'>
		<option value='0'>Выберите филиал</option>

			
			
			<?php
			if(isset($branchs)){
				
				 foreach($branchs as $branch){
					
					if(isset($objects['id'])){
					?>
				
					<option value=<?=$branch['id']?> <?= ($branch['id'] == $objects['spr_branch'] ? 'selected="selected"' : '');?>  ><?=$branch['name']?></option>
				<?php }elseif(isset($subject['id'])){?>
					<option value=<?=$branch['id']?> <?= ($branch['id'] == $subject['spr_branch'] ? 'selected="selected"' : '');?>  ><?=$branch['name']?></option>
				<?php }else{?>
					<option value=<?=$branch['id']?> <?= ($branch['id'] == $spr_cod_branch ? 'selected="selected"' : '');?> ><?=$branch['name']?></option>
			<?php }
			 }
			}
			?>
			
			
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_branch'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>

<div class="form-group">
	<label for="formTitle" class='label_subject'>МрО:</label>
	<select class="form-controls"  name="podrazdelenieNameObject" id="formPodrazdelenieObject" onchange='address.selectOtdel("Object"), object.usersList()'>
		<option value='0'>Выберите МрО</option>
			<?php if(isset($podrazdelenies)){
				 foreach($podrazdelenies as $podrazdelenie){
					if(isset($objects['spr_podrazdelenie'])){?>
						<option value=<?=$podrazdelenie['id']?> <?= ($podrazdelenie['id'] == $objects['spr_podrazdelenie'] ? 'selected="selected"' : '');?>  ><?=$podrazdelenie['name_podrazd']?></option>
					<?php }elseif(isset($subject['spr_podrazdelenie'])){?>
						<option value=<?=$podrazdelenie['id']?> <?= ($podrazdelenie['id'] == $subject['spr_podrazdelenie'] ? 'selected="selected"' : '');?>  ><?=$podrazdelenie['name_podrazd']?></option>					
					<?php }else{?>
						<option value=<?=$podrazdelenie['id']?> <?= ($podrazdelenie['id'] == $spr_cod_podrazd ? 'selected="selected"' : '');?>  ><?=$podrazdelenie['name_podrazd']?></option>
					<?php };
				 }; 
			 };
			 
			 ?>
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_podrazdelenie'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>


<div class="form-group">
	<label for="formTitle" class='label_subject'>РЭГИ:</label>
	<select class="form-controls"  name="otdelNameObject" id="formOtdelObject">	
		<option value='0'>Выберите РЭГИ</option>		
			<?php if(isset($otdels)){?>
				<?php foreach($otdels as $otdel){
						if(isset($objects['spr_otdel'])){
					
				?>
					<option value=<?=$otdel['id']?> <?= ($otdel['id'] == $objects['spr_otdel'] ? 'selected="selected"' : '');?>  ><?=$otdel['name_otdel']?></option>
				<?php }elseif(isset($subject['spr_otdel'])){?>	
					<option value=<?=$otdel['id']?> <?= ($otdel['id'] == $subject['spr_otdel'] ? 'selected="selected"' : '');?>  ><?=$otdel['name_otdel']?></option>
				<?php }else{?>	
					
					<option value=<?=$otdel['id']?> <?= ($otdel['id'] == $spr_cod_otd ? 'selected="selected"' : '');?>  ><?=$otdel['name_otdel']?></option>
				<?php
				}

				}; ?>
			<?php }?>
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_otdel'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>


</fieldset>	

