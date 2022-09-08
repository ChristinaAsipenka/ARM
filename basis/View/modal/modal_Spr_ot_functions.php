<div id="openModalSpr_ot_functions" class="modalDialog_ot_functions">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_functions')">x</button>
		
		<p class="p_og_flue">Справочник функциональных назначений</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_functions'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_functionsCheck as $one_spr_ot_functions): ?>
							<tr ot_functions="ot_functions-<?= $one_spr_ot_functions['id'] ?>"  onclick = "modalWindow.checkSpr_ot_functions(<?= $one_spr_ot_functions['id'] ?>)">
								<td>
									<?= $one_spr_ot_functions['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_functions_overlay" class='overlay'></div>