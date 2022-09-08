<div id="openModalSpr_type_gaz" class="modalDialog_type_gaz">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_type_gaz')">x</button>
		
		<p class="p_og_flue">Справочник видов потребляемого газа</p>
<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_og_type_gaz'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_type_gazCheck as $one_spr_type_gaz): ?>
							<tr type_gaz="type_gaz-<?= $one_spr_type_gaz['id'] ?>"  onclick = "modalWindow.checkSpr_type_gaz(<?= $one_spr_type_gaz['id'] ?>)">
								<td>
									<?= $one_spr_type_gaz['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_type_gaz_overlay" class='overlay'></div>