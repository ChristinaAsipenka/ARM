<div id="openModalSpr_oti_type_fuel" class="modalDialog_oti_type_fuel">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_oti_type_fuel')">x</button>
		
		<p class="p_og_flue">Справочник видов основного топлива</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_oti_type_fuel'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_oti_type_fuelCheck as $one_spr_oti_type_fuel): ?>
							<tr oti_type_fuel="oti_type_fuel-<?= $one_spr_oti_type_fuel['id'] ?>"  onclick = "modalWindow.checkSpr_oti_type_fuel(<?= $one_spr_oti_type_fuel['id'] ?>)">
								<td>
									<?= $one_spr_oti_type_fuel['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_oti_type_fuel_overlay" class='overlay'></div>