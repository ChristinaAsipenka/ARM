<fieldset class = "fieldset_potr">
	<legend class="legend_potr"><span><i class="icon-location-pin"></i></span>&nbspФактический адрес</legend>	
<div class="form-group">
	<label for="formTitle" class='label_subject'>Индекс:</label>
	<input type="text" name="indexFact" class="form-controls" id="formIndexFact" maxlength = '6'  value="<?= isset($subject['place_address_index']) ? $subject['place_address_index'] : (isset($unp_head['address_index'])? $unp_head['address_index']:'') ?>" onchange='address.selectIndex()'>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Область:</label>
	<select class="form-controls" name="regionNameFact" id="formRegionFact" onchange='address.selectDistrict("Fact")'>
		<option value='0'>Выберите область</option>
		<?php if(isset($regions)){
		 foreach($regions as $region):?>
			<?php if(isset($subject['id'])){?>
			<option value=<?=$region['id']?> <?= ($region['id'] == $subject['place_address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
			<?php }elseif(isset($unp_head)){?>
			<option value=<?=$region['id']?> <?= ($region['id'] == $unp_head['address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
			<?php }else{?>
			<option value=<?=$region['id']?>><?=$region['name']?></option>
		<?php 
			}
		endforeach; 
		}
		?>			
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Район:</label>
	<select class="form-controls"  name="districtNameFact" id="formDistrictFact" onchange='address.selectCity("Fact")'>
		<option value='0'>Выберите район</option>
			<?php if(isset($districts)){?>
				<?php foreach($districts as $district):
					if(isset($subject)){
				?>
				
					<option value=<?=$district['id']?> <?= ($district['id'] == $subject['place_address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
				<?php }elseif(isset($unp_head)){?>
					<option value=<?=$district['id']?> <?= ($district['id'] == $unp_head['address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
				<?php }else{?>
				<option value=<?=$district['id']?>><?=$district['name']?></option>
				<?php 
					}
				endforeach; ?>
			<?php }?>
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Город/населенный пункт:</label>
	
	
	<select class="form-controls" name="spr_type_city_place" id="spr_type_city_place">
		<option value='0'>---</option>
		
		<?php foreach($spr_type_city as $one_spr_type_city):?>
			<?php if(isset($subject['id'])){?>
					<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $subject['place_address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
			<?php }elseif(isset($unp_head)){?>
				<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $unp_head['address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
			<?php }else{?>
				<option value=<?=$one_spr_type_city['id']?>><?=$one_spr_type_city['name']?></option>
			<?php }
		endforeach; ?>
	
	</select>
<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>	

	<select class="form-controls"  name="cityNameFact" id="formCityFact"  onchange='address.selectCityZone("Fact")'>	
		<option value='0'>Выберите город</option>		
			<?php if(isset($cities)){?>
				<?php foreach($cities as $city):?>
					<?php if(isset($subject['id'])){?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $subject['place_address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
					<?php }elseif(isset($unp_head)){?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $unp_head['address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
					<?php }else{?>
					<option value=<?=$city['id']?>><?=$city['name']?></option>
				<?php 
					}
				endforeach; ?>
			<?php }?>
	</select>
	<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Район города:</label>
	<select class="form-controls"  name="cityZoneNameFact" id="formCityZoneFact"  onchange='address.selectcityZoneName()'>
		<option value='0'>Выберите район города</option>
			<?php if(isset($citiesZone)){?>
				<?php foreach($citiesZone as $cityZone):
					if(isset($subject['id'])){
				?>
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $subject['place_address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }elseif(isset($unp_head)){?>
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $unp_head['address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }else{?>
					<option value=<?=$cityZone['id']?>><?=$cityZone['name']?></option>
				<?php 
				}
				endforeach; ?>	
			<?php }?>
	</select>
<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>	
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Улица/проспект:</label>
	

	<select class="form-controls" name="spr_type_street_place" id="spr_type_street_place">
		<option value='0'>---</option>
		<?php foreach($spr_type_street as $one_spr_type_street):
			if(isset($subject['id'])){
		?>
				<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $subject['place_address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
		<?php }elseif(isset($unp_head)){?>	
			<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $unp_head['address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
		<?php }else{?>
			<option value="<?=$one_spr_type_street['id']?>"><?=$one_spr_type_street['name']?></option>
		<?php 
			}
			endforeach; ?>
	</select>
<div class="tooltip"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div>	
	
	<input type="text" name="streetNameFact" class="form-controls" id="formStreetFact"  value="<?= isset($subject['place_address_street']) ? $subject['place_address_street'] : (isset($unp_head['address_street'])? $unp_head['address_street'] : '') ?>"   onchange='address.selectStreet()'>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Дом/строение/корпус:</label>
	<input type="text" name="buildingNumberFact" class="form-controls" id="formBuildingFact" value="<?= isset($subject['place_address_building']) ? $subject['place_address_building'] : (isset($unp_head['address_building'])? $unp_head['address_building']:'') ?>"  onchange='address.selectBuilding()'>
</div>
<div class="form-group">
	<label for="formTitle" class='label_subject'>Квартира/офис:</label>
	<input type="text" name="flatNumberFact" class="form-controls" id="formFlatFact" value="<?= isset($subject['place_address_flat']) ? $subject['place_address_flat'] : (isset($unp_head['address_flat'])? $unp_head['address_flat']:'') ?>"  onchange='address.selectFlat()'>
</div>
</fieldset>	

