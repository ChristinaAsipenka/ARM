<div id="openModalIndPers" class="modalDialog">
	<div>
		<button title="закрыть" class="close" onclick = "modalWindow.closeModal('openModalIndPers')">x</button>
		<p class='modal_title'>Выберите физическое лицо</p>
		 <div class="search_request_modal">
			<input id="search_indpers" class='field_searchCard form-control' placeholder="Фамилия..." searchdata = "individual_persons"><button class='clear_field'>×</button></input>
			<ul id='pre-result_ind_pers'></ul>
		</div>
		<div id='search_result_ind_pers' class="search_request_modal_answer">
		</div>
	</div>
</div>
<div id="openModalIndPers_overlay" class='overlay'></div>