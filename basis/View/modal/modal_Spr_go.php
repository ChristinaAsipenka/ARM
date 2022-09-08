<div id="openModalSpr_go" class="modalDialog_go">
	<div class="modal_go">
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSpr_go')">x</button>
		
		<p class="p_og_flue">Газоиспользующее оборудование</p>

			
			<div class="form-group">
				<label for = 'go' class='label_subject'>Газовое оборудование:</label>
					<input type="hidden" name="go_id" id="go_id" value="">
					<input type='text' name = 'go' id = 'go' class='form-control'>
					<button onclick = "modalWindow.openModal('openModalSpr_go_vid')">...</button>
			</div>






			<div class="form-group">
				<label for = 'go_count' class='label_subject'>Количество:</label>
					<input type='number' name = 'go_count' id = 'go_count' class='form-control' step="any"  min='0'>
			</div>








	</div>
</div>
<div id="openModalSpr_go_overlay" class='overlay'></div>