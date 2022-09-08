<div id="openModalSpr_ot_type_to" class="modalDialog_ot_type_to">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_type_to')">x</button>
		
		<p class="p_og_flue">Справочник видов теплообменника</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_type_to'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_type_toCheck as $ot_type_toCheck): ?>
							<tr ot_type_to="ot_type_to-<?= $ot_type_toCheck['id'] ?>"  onclick = "modalWindow.checkSpr_ot_type_to(<?= $ot_type_toCheck['id'] ?>)">
								<td>
									<?= $ot_type_toCheck['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_type_to_overlay" class='overlay'></div>