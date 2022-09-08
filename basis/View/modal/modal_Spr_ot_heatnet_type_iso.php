<div id="openModalSpr_ot_heatnet_type_iso" class="modalDialog_ot_heatnet_type_iso">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_ot_heatnet_type_iso')">x</button>
		
		<p class="p_og_flue">Справочник типов изоляции</p>

			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_ot_heatnet_type_isoCheck as $heatnet_type_iso): ?>
							<tr ot_heatnet_type_iso="ot_heatnet_type_iso-<?= $heatnet_type_iso['id'] ?>"  onclick = "modalWindow.checkSpr_ot_heatnet_type_iso(<?= $heatnet_type_iso['id'] ?>)">
								<td>
									<?= $heatnet_type_iso['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>













	</div>
</div>
<div id="openModalSpr_ot_heatnet_type_iso_overlay" class='overlay'></div>	