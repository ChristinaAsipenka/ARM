<?php // счетчик статистики
	$first_url="arm_basis_view_dashboard.php";
	include $_SERVER['DOCUMENT_ROOT']."\statistics\stat_count.php";
	
?>
<?php $this->theme->header(); ?>

<link href="/ARM/basis/Assets/css/start.css" rel="stylesheet">
<!-- LOGO БАЗЫ 	<div class = "logo_units"><span><i class="icon-basis"></i></span><p>Базис</p></div-->


<main>
    <div class="container">
	
	
	<!---- Вывод текста и лучи ----------------------------------------->
		<p id='head1' class='header'>Добро пожаловать</p>
		<p id='head2' class='header'>в БАЗИС</p>
		<p id='head3' class='header'>это программа для работы в базе данных </p>
		<p id='head4' class='header'>по поднадзорным субъектам Госэнергогазнадзора</p>
		<p id='head5' class='header'>Программное обеспечение «Базис»</p>
		
		<button class="shine-button page-start">Информация</button>
		
		<div class='light x1'></div>
		<div class='light x2'></div>
		<div class='light x3'></div>
		<div class='light x4'></div>
		<div class='light x5'></div>
		<div class='light x6'></div>
		<div class='light x7'></div>
		<div class='light x8'></div>
		<div class='light x9'></div>
	<!------------------------------------------------------------------>


		<!--div class='main_page_info'>
            <h1>Добро пожаловать в БАЗИС.</h1>
			<br>
			<p>Программное обеспечение «Базис» — это база данных по поднадзорным субъектам Госэнергогазнадзора. </p><br>
			
			
			<br><br><br>
			<h1>Документы:</h1>
			<br><br>
			<a href="../admin/library/doc/ТЗ_от_ГУ.pdf" target=new_blank>
			1. Техническое задание «Формирование базы данных по поднадзорным субъектам» согласно служебной записке от 17.12.2020 Лосенкова Д.М.</a>
			<br><br>
			<a href="../admin/library/doc/2021-11-17_№ПС-09-2_протокол.pdf" target=new_blank>
			2. Протокол 17.11.2021 №ПС-09/2 совещания рабочей группы по разработке программного обеспечения для нужд государственного учреждения «Государственный энергетический и газовый надзор»</a>
			<br><br>
			<a href="../admin/library/doc/2021-11-17_ПО_Базис_Инструкция.docx" target=new_blank>
			3. Инструкция по работе в ПО "Базис"</a>
			<br><br>
			<a href="../admin/library/doc/2021-11-17_Информационное_наполнение_баз_данных_ПО_Базис.docx" target=new_blank>
			4. Информационное наполнение баз данных ПО "Базис"</a>
		</div-->
	
	
	</div>
</main>
        
<?php $this->theme->footer(); ?>