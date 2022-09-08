<fieldset id="address_post_block" class = "fieldset_potr">
	<legend class="legend_potr"><span><i class="icon-location-pin"></i></span>&nbspПочтовый адрес</legend>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Индекс:</label>
	</div>	
	<input type="text" name="indexPost" class="form-controls" id="formIndexPost" maxlength = '6' value="<?= isset($subject['post_address_index']) ? $subject['post_address_index'] : (isset($unp_head['address_index'])? $unp_head['address_index']:'') ?>">
</div>
<div class="form-group">
	<div class="block w3">	
		<label for="formTitle" class='label_subject'>Область:</label>
	</div>	
	<select class="form-controls" name="regionNamePost" id="formRegionPost" onchange='address.selectDistrict("Post")'>
		<option value='0'>Выберите область</option>			
			
		<?php 
		print_r($regions);
		
		if(isset($regions)){
		 foreach($regions as $region):?>
			<?php if(isset($subject['id'])){?>
			<option value=<?=$region['id']?> <?= ($region['id'] == $subject['post_address_region'] ? 'selected="selected"' : '');?>  ><?=$region['name']?></option>
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
	<!--div class="tooltip_post"><button class = "btn_add_fields" onclick="subject.create_url('spr_region'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
</div>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Район:</label>
	</div>	
	<select class="form-controls"  name="districtNamePost" id="formDistrictPost" onchange='address.selectCity("Post")'>
		<option value='0'>Выберите район</option>
			<?php if(isset($districtsPost)){?>
				<?php foreach($districtsPost as $district):
						if(isset($subject)){
				?>
				
					<option value=<?=$district['id']?> <?= ($district['id'] == $subject['post_address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
				<?php }elseif(isset($unp_head)){?>
					<option value=<?=$district['id']?> <?= ($district['id'] == $unp_head['address_district'] ? 'selected="selected"' : '');?>  ><?=$district['name']?></option>
				<?php }else{?>
				<option value=<?=$district['id']?>><?=$district['name']?></option>
				<?php 
					}
			 endforeach; 
			 }?>
		
	</select>
	<!--div class="tooltip_post"><button class = "btn_add_fields" onclick="subject.create_url('spr_district'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
</div>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Населенный пункт:</label>
	</div>
		<select class="form-controls form-small" name="spr_type_city_post" id="spr_type_city_post">
		<option value='0'>---</option>
		
			
			<?php foreach($spr_type_city as $one_spr_type_city):
		 if(isset($subject['id'])){?>
					<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $subject['post_address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
			<?php }elseif(isset($unp_head)){?>
				<option value="<?=$one_spr_type_city['id']?>"<?= ($one_spr_type_city['id'] == $unp_head['address_city_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_city['name']?></option>
			<?php }else{?>
				<option value=<?=$one_spr_type_city['id']?>><?=$one_spr_type_city['name']?></option>
			<?php }
		endforeach; ?>
			
		</select>	
	<!--div class="tooltip_post"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
	<select class="form-controls"  name="cityNamePost" id="formCityPost"  onchange='address.selectCityZone("Post")'>
		<option value='0'>Выберите город</option>
			
			<?php if(isset($citiesPost)){?>
				<?php foreach($citiesPost as $city):?>
					<?php if(isset($subject['id'])){?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $subject['post_address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
					<?php }elseif(isset($unp_head)){?>
					<option value=<?=$city['id']?> <?= ($city['id'] == $unp_head['address_city'] ? 'selected="selected"' : '');?>  ><?=$city['name']?></option>
					<?php }else{?>
					<option value=<?=$city['id']?>><?=$city['name']?></option>
				<?php 
					}
				endforeach; ?>
			<?php }?>
	</select>
	<div class="block w0-6">
		<div class="tooltip_post"><button class = "btn_add_fields" onclick="main.create_url('spr_city'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись в справочник</span></button></div>
	</div>	

	
	<label for="formTitle" class='label_subject'>Район города:</label>

	<select class="form-controls"  name="cityZoneNamePost" id="formCityZonePost">
		<option value='0'>Выберите район города</option>
					
			<?php if(isset($citiesZone)){?>
				<?php foreach($citiesZone as $cityZone):
					if(isset($subject['id'])){
				?>
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $subject['post_address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }elseif(isset($unp_head)){?>
					<option value=<?=$cityZone['id']?> <?= ($cityZone['id'] == $unp_head['address_city_zone'] ? 'selected="selected"' : '');?>  ><?=$cityZone['name']?></option>
				<?php }else{?>
					<option value=<?=$cityZone['id']?>><?=$cityZone['name']?></option>
				<?php 
				}
				endforeach; ?>	
			<?php }?>
	</select>
<!--div class="tooltip_post"><button class = "btn_add_fields" onclick="subject.create_url('spr_city_zone'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->	
</div>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Улица и прочее:</label>
	</div>	
		<select class="form-controls form-small" name="spr_type_street_post" id="spr_type_street_post">
		<option value='0'>---</option>
					
			<?php foreach($spr_type_street as $one_spr_type_street):
			if(isset($subject['id'])){
		?>
				<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $subject['post_address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
		<?php }elseif(isset($unp_head)){?>	
			<option value="<?=$one_spr_type_street['id']?>"<?= ($one_spr_type_street['id'] == $unp_head['address_street_type'] ? 'selected="selected"' : '');?>><?=$one_spr_type_street['name']?></option>
		<?php }else{?>
			<option value="<?=$one_spr_type_street['id']?>"><?=$one_spr_type_street['name']?></option>
		<?php 
			}
			endforeach; ?>
		</select>
		<!--div class="tooltip_post"><button class = "btn_add_fields" onclick="subject.create_url('spr_type_street'); modalWindow.openModal('openModalGuidesFromSubject')"><i class="icon-plus"></i><span class = "tooltiptext">Добавить новую запись</span></button></div-->
	<input type="text" name="streetNamePost" class="form-controls" id="formStreetPost" value="<?= isset($subject['post_address_street']) ? $subject['post_address_street'] : (isset($unp_head['address_street'])? $unp_head['address_street'] : '') ?>">
</div>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Дом/строение/корпус:</label>
	</div>	
	<input type="text" name="buildingNumberPost" class="form-controls" id="formBuildingPost" value="<?= isset($subject['post_address_building']) ? $subject['post_address_building'] : (isset($unp_head['address_building'])? $unp_head['address_building']:'') ?>">
</div>
<div class="form-group">
	<div class="block w3">
		<label for="formTitle" class='label_subject'>Квартира/офис и пр.:</label>
	</div>	
	<input type="text" name="flatNumberPost" class="form-controls" id="formFlatPost" value="<?= isset($subject['post_address_flat']) ? $subject['post_address_flat'] : (isset($unp_head['address_flat'])? $unp_head['address_flat']:'') ?>">
</div>
</fieldset>	



