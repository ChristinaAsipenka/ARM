<div id="openModalSpr_t_systemheat_type_op" class="modalDialog_systemheat_type_op">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_t_systemheat_type_op')">x</button>
		
		<p class="p_og_flue">Справочник видов отопительных приборов</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_type_ot_pribor'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_type_ot_priborCheck as $type_ot_priborCheck): ?>
							<tr ot_type_ot_pribor="ot_type_ot_pribor-<?= $type_ot_priborCheck['id'] ?>"  onclick = "modalWindow.checkSpr_ot_type_ot_pribor(<?= $type_ot_priborCheck['id'] ?>)">
								<td>
									<?= $type_ot_priborCheck['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_systemheat_layout_overlay" class='overlay'></div>