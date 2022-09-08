<div id="openModalUNP" class="modalDialog">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalUNP')">x</button>
		<p class='modal_title'>Выберите юр. лицо</p>
		 <div class="search_request_modal">
			<input id="search" class='field_searchCard form-control' placeholder="УНП, Наименование полное, Краткое наименование..." searchdata = "unp"><button class='clear_field'>×</button></input>
			<ul id='pre-result'></ul>
		</div>
		<div id='search_result'>
		</div>
	</div>
</div>
<div id="openModalUNP_overlay" class='overlay'></div>