<div id="openModalSpr_og_flue" class="modalDialog_og_flue">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_og_flue')">x</button>
		
		<p class="p_og_flue">Справочник видов дымохода</p>

<div class="tooltip"><button class = "btn_add_fields_modal" onclick="subject.create_url('spr_og_flue'); modalWindow.openModal('openModalGuidesFromSubject')"><span class = "tooltiptext">Добавить новую запись</span>Новая запись</button></div>			
			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_vidCheckDym as $one_spr_vidDym): ?>
							<tr og_flue="og_flue-<?= $one_spr_vidDym['id'] ?>"  onclick = "modalWindow.checkSpr_og_flue(<?= $one_spr_vidDym['id'] ?>)">
								<td>
									<?= $one_spr_vidDym['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>













	</div>
</div>
<div id="openModalSpr_og_flue_overlay" class='overlay'></div>