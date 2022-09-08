<div id="openModalSpr_flue_mater" class="modalDialog_flue_mater">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_flue_mater')">x</button>
		
		<p class="p_og_flue">Справочник материалов дымохода</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_og_flue_mater'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_flue_materCheck as $one_spr_flue_mater): ?>
							<tr flue_mater="flue_mater-<?= $one_spr_flue_mater['id'] ?>"  onclick = "modalWindow.checkSpr_flue_mater(<?= $one_spr_flue_mater['id'] ?>)">
								<td>
									<?= $one_spr_flue_mater['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_flue_mater_overlay" class='overlay'></div>