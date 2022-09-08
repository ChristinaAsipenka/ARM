<div id="openModalSpr_ot_gvs_open" class="modalDialog_ot_gvs_open">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_gvs_open')">x</button>
		
		<p class="p_og_flue">Справочник типа схемы</p>
<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_gvs_open'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_gvs_openCheck as $one_spr_ot_gvs_open): ?>
							<tr ot_gvs_open="ot_gvs_open-<?= $one_spr_ot_gvs_open['id'] ?>"  onclick = "modalWindow.checkSpr_ot_gvs_open(<?= $one_spr_ot_gvs_open['id'] ?>)">
								<td>
									<?= $one_spr_ot_gvs_open['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_gvs_open_overlay" class='overlay'></div>