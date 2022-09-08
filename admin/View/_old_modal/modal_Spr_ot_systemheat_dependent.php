<div id="openModalSpr_ot_systemheat_dependent" class="modalDialog_systemheat_dependent">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_systemheat_dependent')">x</button>
		
		<p class="p_og_flue">Справочник схем присоединения</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_systemheat_dependent'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_systemheat_dependentCheck as $systemheat_dependentCheck): ?>
							<tr systemheat_dependent="systemheat_dependent-<?= $systemheat_dependentCheck['id'] ?>"  onclick = "modalWindow.checkSpr_ot_systemheat_dependent(<?= $systemheat_dependentCheck['id'] ?>)">
								<td>
									<?= $systemheat_dependentCheck['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_systemheat_dependent_overlay" class='overlay'></div>