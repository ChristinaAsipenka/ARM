<div id="ModalSpr_og_device_type" class="modalDialog_og_device_type">
	<div class="modal_div">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('ModalSpr_og_device_type')">x</button>
		
		<p class="p_og_flue">Справочник типов газоиспользующего оборудования</p>


			<table class="table_spr">
                <thead>
                <tr>
                    <th>Наименование</th>
                </tr>
                </thead>
					<tbody>

					<?php foreach($spr_og_device_typeCheck as $one_spr_og_device_type): ?>
							<tr device_type="device_type-<?= $one_spr_og_device_type['id'] ?>"  onclick = "modalWindow.checkSpr_og_device_type(<?= $one_spr_og_device_type['id'] ?>)">
								<td>
									<?= $one_spr_og_device_type['name'] ?>
								</td>
							</tr>
							<?php endforeach; ?>
						
					</tbody>
            </table>


	</div>
</div>
<div id="ModalSpr_og_device_type_overlay" class='overlay'></div>