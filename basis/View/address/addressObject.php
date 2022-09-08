<fieldset class = "fieldset_potr">
	<legend class="legend_potr"><span><i class="icon-location-pin"></i></span>&nbspАдрес местонахождения</legend>	
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Индекс:</label>
	</div>	
	<input type="text" name="indexObject" class="form-controls" id="formIndexObject" maxlength = '6'  value="<?= isset($objects['address_index']) ? $objects['address_index'] : ( isset($subject['place_address_index']) ? $subject['place_address_index'] :' ') ?>">
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Область:</label>
	</div>	
	<select class="form-controls" name="regionNameObject" id="formRegionObject" onchange='address.selectDistrict("Object")'>
		<option value='0'>Выберите область</option>

			
			<?php if(isset($regions)){?>
				<?php foreach($regions as $region):
				if(isset($objects['address_region'])){
				
				?>
						
				
					<option value=<?=$region['id']?> <?= ($region['id'] == $objects['address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
			
			<?php }elseif(isset($subject['place_address_region'])){?>
					<option value=<?=$region['id']?> <?= ($region['id'] == $subject['place_address_region'] ? 'selected="selected"' : '');?> ><?=$region['name']?></option>
			<?php }else{?>	
				<option value=<?=$region['id']?>><?=$region['name']?></option>
			<?php };
				endforeach;?>	
			<?php }?>
			
			
	</select>
	<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Район:</label>
	</div>
	<select class="form-controls"  name="districtNameObject" id="formDistrictObject" onchange='address.selectCity("Object")'>
		<option value='0'>Выберите район</option>
			<?php if(isset($districts)){
				 foreach($districts as $district):
					if(isset($objects['address_district'])){
				?>
				
						<option value=<?=$district['id']?> <?= ($district['id'] == $objects['address_district']? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
					<?php }elseif(isset($subject['place_address_district'])){?>
						<option value=<?=$district['id']?> <?= ($district['id'] == $subject['place_address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
					<?php }else{?>
						<option value=<?=$district['id']?>><?=$district['name']?></option>					
					<?php };
					endforeach; ?>
			<?php }?>
	</select>
	<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Населенный пункт:</label>
	</div>
	
		<select class="form-controls form-small" name="spr_type_city_object" id="spr_type_city_object">
		<option value='0'>---</option>
			
				<?php foreach($spr_type_city as $one_spr_type_city){
				 if(isset($objects['address_city_type'])){
				?>	
					<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $objects['address_city_type']? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
					
			<?php }elseif(isset($subject['place_address_city_type'])){?>
					<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $subject['place_address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
					<?php }else{?>
						<option value=<?=$one_spr_type_city['id']?>><?=$one_spr_type_city['name']?></option>
					<?php };
				
				} ?>
		
		</select>	
	<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->

	<select class="form-controls"  name="cityNameObject" id="formCityObject"  onchange='address.selectCityZone("Object")'>	
		<option value='0'>Выберите город</option>		
			<?php if(isset($cities)){?>
				<?php foreach($cities as $city):
				
				if(isset($objects['address_city'])){
				?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $objects['address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
				<?php }elseif(isset($subject['place_address_city'])){?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $subject['place_address_city']? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
					<?php }else{?>
					<option value=<?=$city['id']?>><?=$city['name']?></option>
					<?php };
				
				endforeach; ?>
			<?php }?>
	</select>
	<div class="block w0-6">
		<div class="tooltip"><button class = "btn_add_fields" onclick="main.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись в справочник</span></button></div>
	</div>
	<label for="formTitle" class="label_subject">Район города:</label>
	<select class="form-controls"  name="cityZoneNameObject" id="formCityZoneObject">
		<option value='0'>Выберите район города</option>
			<?php if(isset($citiesZone)){?>
				<?php foreach($citiesZone as $cityZone):
				if(isset($objects['address_city_zone'])){
				?>
				
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == ($objects['address_city_zone']) ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }elseif(isset($subject['place_address_city_zone'])){?>	
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $subject['place_address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }else{?>
					<option value=<?=$cityZone['id']?> ><?=$cityZone['name']?></option>
				<?php 
				};
				endforeach; ?>	
			<?php }?>
	</select>
<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->	
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Улица и прочее:</label>
	</div>
	
		<select class="form-controls form-small" name="spr_type_street_object" id="spr_type_street_object">
		<option value='0'>---</option>
			<?php echo $objects['address_street_type'] ;?>
			
				<?php foreach($spr_type_street as $one_spr_type_street):
			
					if(isset($objects['address_street_type'] )){
						
						
						?>
						<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $objects['address_street_type']  ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
						
					<?php }else{ ?>
						<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $subject['place_address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
					<?php }
				endforeach; ?>
			
		</select>
<!--div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->		
	<input type="text" name="streetNameObject" class="form-controls" id="formStreetObject"  value="<?= isset($objects['address_street']) ? $objects['address_street'] : ( isset($subject['place_address_street']) ? $subject['place_address_street'] :' ') ?>">
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Дом/строение/корпус:</label>
	</div>
	<input type="text" name="buildingNumberObject" class="form-controls" id="formBuildingObject" value="<?= isset($objects['address_building']) ? $objects['address_building'] : ( isset($subject['place_address_building']) ? $subject['place_address_building'] :' ') ?>">
</div>
<div class="form-group">
	<div class="block w2">
		<label for="formTitle" class="label_subject">Квартира/офис и пр.:</label>
	</div>
	<input type="text" name="flatNumberObject" class="form-controls" id="formFlatObject" value="<?= isset($objects['address_flat']) ? $objects['address_flat'] : ( isset($subject['place_address_flat']) ? $subject['place_address_flat'] :' ') ?>">
</div>
</fieldset>	

