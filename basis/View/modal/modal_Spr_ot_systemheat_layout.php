<div id="openModalSpr_ot_systemheat_layout" class="modalDialog_systemheat_layout">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_systemheat_layout')">x</button>
		
		<p class="p_og_flue">Справочник видов разводки</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_type_razvodka'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_type_razvodkaCheck as $razvodkaCheck): ?>
							<tr ot_type_razvodka="ot_type_razvodka-<?= $razvodkaCheck['id'] ?>"  onclick = "modalWindow.checkSpr_ot_systemheat_layout(<?= $razvodkaCheck['id'] ?>)">
								<td>
									<?= $razvodkaCheck['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_systemheat_layout_overlay" class='overlay'></div>