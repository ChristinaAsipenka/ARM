<div id="openModalSpr_oti_type_fuel_rezerv" class="modalDialog_oti_type_fuel_rezerv">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_oti_type_fuel_rezerv')">x</button>
		
		<p class="p_og_flue">Справочник видов резервного топлива</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_oti_type_fuel_rezerv'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_oti_type_fuel_rezervCheck as $one_spr_oti_type_fuel_rezerv): ?>
							<tr oti_type_fuel_rezerv="oti_type_fuel_rezerv-<?= $one_spr_oti_type_fuel_rezerv['id'] ?>"  onclick = "modalWindow.checkSpr_oti_type_fuel_rezerv(<?= $one_spr_oti_type_fuel_rezerv['id'] ?>)">
								<td>
									<?= $one_spr_oti_type_fuel_rezerv['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_oti_type_fuel_rezerv_overlay" class='overlay'></div>