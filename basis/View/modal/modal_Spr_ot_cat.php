<div id="openModalSpr_ot_cat" class="modalDialog_ot_cat">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_cat')">x</button>
		
		<p class="p_og_flue">Справочник категорий надежности теплоснабжения</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_ot_cat'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_catCheck as $one_spr_ot_cat): ?>
							<tr ot_cat="ot_cat-<?= $one_spr_ot_cat['id'] ?>"  onclick = "modalWindow.checkSpr_ot_cat(<?= $one_spr_ot_cat['id'] ?>)">
								<td>
									<?= $one_spr_ot_cat['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_ot_cat_overlay" class='overlay'></div>