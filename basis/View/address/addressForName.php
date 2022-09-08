<fieldset class = "fieldset_potr">
	<legend class="legend_potr"><span><i class="icon-location-pin"></i></span>&nbspДобавление населенного пункт к наименованию р.потребителя</legend>	

<div class="block w6">
<div class="form-group">
	<div class="block w2-5">
		<label for="formTitle" class='label_subject'>Область:</label>
	</div>
	<select class="form-controls" name="regionNameFname" id="formRegionFname" onchange='address.selectDistrict("Fname")'>
		<option value='0'>Выберите область</option>
		<?php if(isset($regions)){
		 foreach($regions as $region):
			 if(isset($subject['id'])){?>
				<option value=<?=$region['id']?> <?= ($region['id'] == $subject['fname_address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
			<?php }else{?>
				<option value=<?=$region['id']?>><?=$region['name']?></option>
		<?php 
			}
		endforeach; 
		}
		?>			
	</select>
</div>
	
<div class="form-group">	
	<div class="block w2-5">
		<label for="formTitle" class='label_subject'>Район:</label>
	</div>
	<select class="form-controls"  name="districtNameFname" id="formDistrictFname" onchange='address.selectCity("Fname")'>

			<?php 
			print_r($unp);
			if(isset($districtsFname)){
				
					if(isset($subject)){
						if(isset($subject['fname_address_district'])){
							echo "<option value='0'>Выберите район</option>";
							foreach($districtsFname as $district){
								echo "<option value=".$district['id']. " ".($district['id'] == $subject['fname_address_district'] ? 'selected="selected"' : '')."  >".$district['name']."</option>";
							}
						}else{
							
							echo "<option value='0'>Выберите район</option>";
							foreach($districtsFname as $district){
								echo "<option value=".$district['id']. " ".($district['id'] == $unp['address_district'] ? 'selected="selected"' : '')."  >".$district['name']."</option>";
							}
						}
						
					
					}else{
						echo "<option value='0'>Выберите район</option>";
						foreach($districtsFname as $district){
							echo "	<option value=".$district['id'].">".$district['name']."</option>";
						}
					}
					
				}
				?>
	</select>
	<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
</div>

<div class="form-group">
	<div class="block w2-5">
		<label for="formTitle" class='label_subject'>Населенный пункт:</label>
	</div>	
	<select class="form-controls"  name="cityNameFname" id="formCityFname">	
			
			<?php 

			if(isset($citiesFname)){
				
				if(isset($subject['id'])){
				
					if(isset($subject['fname_address_city']) || $subject['fname_address_city'] > 0){
						echo "<option value='0'>Выберите город</option>";
						foreach($citiesFname as $city){
							echo "<option value=".$city['id']." ".($city['id'] == $subject['fname_address_city'] ? 'selected="selected"' : '')."  >".$city['name']."</option>";
						}
					}else{
						echo "<option value='0'>Выберите город</option>";
						foreach($citiesFname as $city){
							echo "<option value=".$city['id']." ".($city['id'] == $unp['address_city'] ? 'selected="selected"' : '')."  >".$city['name']."</option>";
						}
					}
					
				}else{
					echo "<option value='0'>Выберите город</option>";
					foreach($citiesFname as $city){
						echo "<option value=".$city['id'].">".$city['name']."</option>";
					}
				}

			}
			?>
	</select>
	<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новый город</span></button></div-->
</div>
<p class="sbj_podr">Рекомендуется для всех р.потребителей добавлять к названию населенный пункт, соответствующий названию структурного подразделения Госэнергогазнадзора за которым он будет закреплен.</p>
<hr/>

	<div class ='nav_buttons'>
		<button class="button_filter" onclick="subject.add_addressForName()"><span><i class="icon-plus"></i></span>Добавить</button>									
	</div>
	<!--button class = "shine-button" onclick="subject.add_addressForName()">Добавить</button-->
</div>
</fieldset>	

