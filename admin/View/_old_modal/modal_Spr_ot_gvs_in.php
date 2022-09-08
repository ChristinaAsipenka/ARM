<div id="openModalSpr_ot_gvs_in" class="modalDialog_ot_gvs_in">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_gvs_in')">x</button>
		
		<p class="p_og_flue">Справочник типа присоединения</p>
<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_gvs_in'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_gvs_inCheck as $one_spr_ot_gvs_in): ?>
							<tr ot_gvs_in="ot_gvs_in-<?= $one_spr_ot_gvs_in['id'] ?>"  onclick = "modalWindow.checkSpr_ot_gvs_in(<?= $one_spr_ot_gvs_in['id'] ?>)">
								<td>
									<?= $one_spr_ot_gvs_in['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_gvs_in_overlay" class='overlay'></div>