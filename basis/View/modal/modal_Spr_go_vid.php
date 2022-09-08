<div id="openModalSpr_go_vid" class="modalDialog_go_vid">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_go_vid')">x</button>
		
		<p class="p_og_flue">Справочник видов газоиспользующего оборудования</p>


			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_og_vid as $one_spr_og_vid): ?>
							<tr og_vid="og_vid-<?= $one_spr_og_vid['id'] ?>"  onclick = "modalWindow.checkSpr_og_vid(<?= $one_spr_og_vid['id'] ?>)">
								<td>
									<?= $one_spr_og_vid['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>












	</div>
</div>
<div id="openModalSpr_go_vid_overlay" class='overlay'></div>