<div id="openModalSubject" class="modalDialog">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalSubject')">x</button>
		<p class='modal_title'>Выберите потребителя</p>
		 <div class="search_request_modal">
			<input id="search" class='field_searchCard form-control' placeholder="Наименование потребителя полное, Краткое наименование..." searchdata = "object" sbobj='0'><button class='clear_field'>×</button></input>
			<ul id='pre-result'></ul>
		</div>
		<div id='search_result' class="search_request_modal_answer">
		</div>
	</div>
</div>
<div id="openModalSubject_overlay" class='overlay'></div>