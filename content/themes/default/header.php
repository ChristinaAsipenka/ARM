<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>ПО "Базис"</title>



	<link href="/ARM/basis/Assets/css/main.css" rel="stylesheet" type="text/css">
	<link href="/ARM/content/themes/default/css/main_page.css" rel="stylesheet" type="text/css">
    <link href="/ARM/basis/Assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="/ARM/basis/Assets/css/simplelineicons.github.io-master/css/simple-line-icons.css">
   
	<link href="/ARM/basis/Assets/css/subject.css" rel="stylesheet">
	<link href="/ARM/basis/Assets/css/object.css" rel="stylesheet">

	
</head>

<body>
<div class='main_wrapper'>
	<header>	
		
		<div class="head_of_page">
			<div class='header-left'>
				<a class="emblem_gegn" href="/index.php" title=""></a>
				<a class="" href="/ARM/basis/">
							<h3>ПО "БАЗИС"</h3>
						</a>
			</div>
			
			<div class='header-center container'>
				<div class="naim_org">
					<p>Министерство энергетики Республики Беларусь</p>
					<h1>Государственное учреждение <span>"Государственный энергетический и газовый надзор"</span></h1>	
				</div>
				
						
			</div>

			<div class="header-right">
				
				<div>
					<!--a href="/ARM/basis/basis/account/"-->
					<a href="/phonebook/person.php?id=<?=$_COOKIE['id_user']?>">
						<?php echo ( isset($auth_login) ? $auth_login : '')?> <br/><span class='font-size-13'>(Личный кабинет)</span>
					</a>
				</div>
				<div class='logout'>
					<a href="/ARM/admin/logout/" class='font-size-13'>
						<i class="icon-logout icons"></i> Выйти
					</a>
				</div>
			</div>
		</div>	
	<div class='gray-header-line'></div>

		
		<ul class="main_nav_left">
		  <li>
			<i><a href="/website/index.html"><img src="/ARM/basis/Assets/image/menuv/web.png" width="15px" height="15px" alt="Наш сайт"><div>Наш сайт</div></i>
		  </li>
		  <li>
			<i><a href="/ARM/basis/main/"><img src="/ARM/basis/Assets/image/menuv/basisv.png" width="15px" height="15px" alt="Базис"><div>ПО "Базис"</div></a></i>

		  </li>
		  <li>
			<i><a href="/ARM/examination/main/"><img src="/ARM/basis/Assets/image/menuv/ok.png" width="15px" height="15px" alt="Проверка знаний"><div>Проверка знаний</div></a></i>
			
		  </li>
		  <li>
			<i><a href="/ARM/ozp/main/"><img src="/ARM/basis/Assets/image/menuv/ozp.png" width="15px" height="15px" alt="ОЗП"><div>ОЗП</div></i>
			
		  </li>
		  <li>
			<i><a href="/ARM/gaz/main/"><img src="/ARM/basis/Assets/image/menuv/gaz.png" width="15px" height="15px" alt="Газовик"><div>Газовик</div></i>
			
		  </li>

		  <li>
			<i><a href="/phonebook/"><img src="/ARM/basis/Assets/image/menuv/pbv.png" width="15px" height="15px" alt="Справочник"><div>Справочник</div></i>
			
		  </li>
		</ul>
	</header>