<div id="openModalSpr_oti_boiler_type" class="modalDialog_oti_boiler_type">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_oti_boiler_type')">x</button>
		
		<p class="p_og_flue">Справочник назначения котельной</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_oti_boiler_type'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_oti_boiler_typeCheck as $one_spr_oti_boiler_type): ?>
							<tr oti_boiler="oti_boiler-<?= $one_spr_oti_boiler_type['id'] ?>"  onclick = "modalWindow.checkSpr_oti_boiler_type(<?= $one_spr_oti_boiler_type['id'] ?>)">
								<td>
									<?= $one_spr_oti_boiler_type['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_oti_boiler_type_overlay" class='overlay'></div>