<div id="openModalSpr_ot_systemheat_water" class="modalDialog_systemheat_water">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_systemheat_water')">x</button>
		
		<p class="p_og_flue">Справочник систем отопления</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_systemheat_water'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_systemheat_waterCheck as $systemheat_waterCheck): ?>
							<tr systemheat_water="systemheat_water-<?= $systemheat_waterCheck['id'] ?>"  onclick = "modalWindow.checkSpr_ot_systemheat_water(<?= $systemheat_waterCheck['id'] ?>)">
								<td>
									<?= $systemheat_waterCheck['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_systemheat_water_overlay" class='overlay'></div>