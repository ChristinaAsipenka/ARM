<?php // счетчик статистики
	$first_url="arm_basis_view_index.php";
	include $_SERVER['DOCUMENT_ROOT']."\statistics\stat_count.php";
	
?>
<?php $this->theme->header(); ?>

<link href="/ARM/basis/Assets/css/start.css" rel="stylesheet">

<main>
    <div class="container">
	
	
	<!---- Вывод текста и лучи ----------------------------------------->
		<p id='head1' class='header'>Добро пожаловать</p>
		<p id='head2' class='header'>в БАЗИС</p>
		<p id='head3' class='header'>это программа для работы в базе данных </p>
		<p id='head4' class='header'>по поднадзорным субъектам Госэнергогазнадзора</p>
		<p id='head5' class='header'>Программное обеспечение «Базис»</p>
		<form>
			<button class="shine-button page-start" formaction="/ARM/basis/information/">ИНФОРМАЦИЯ</button>
		</form>
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
	
	</div>
</main>
        
<?php $this->theme->footer(); ?>