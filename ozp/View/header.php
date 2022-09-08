<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="\ARM\basis\Assets\image\ico_.png">

    <title>ОЗП</title>


	<link href="/ARM/ozp/Assets/css/var.css" rel="stylesheet">
	<link href="/ARM/ozp/Assets/css/start.css" rel="stylesheet">
	<link href="/ARM/content/themes/default/css/main.css" rel="stylesheet">
	<link href="/ARM/content/themes/default/css/main_page.css" rel="stylesheet" type="text/css">
    <link href="/ARM/basis/Assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="/ARM/content/themes/default/css/simplelineicons.github.io-master  /css/simple-line-icons.css">
	<link href="/ARM/basis/Assets/css/basis.css" rel="stylesheet">
	<link href="/ARM/ozp/Assets/css/print.css" rel="stylesheet">
	
</head>

<body>
<div class='main_wrapper'>
	<header>	
		<div id="masthead">
		<div class="head_of_page">
			<div class='header-left'>
				<a class="emblem_gegn" href="/index.php" title=""></a>
				<a class="" href="/ARM/basis/main/">
					<h3><span><i class="icon-ozp"></i></span>&nbsp
					ОЗП</h3>
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
					<a href="http://10.170.1.6/phonebook/person.php?id=<?=$_COOKIE['id_user']?>">
						<span class='font-size-13'>Вы вошли как:</span><br/>
						<?php echo ( isset($auth_login) ? $auth_login : 'пользователь')?> 
					</a>
				</div>
				<div class='logout'>
					<a href="/ARM/admin/logout/" class='font-size-15'>
						<i class="icon-logout icons"></i> ВЫЙТИ
					</a>
				</div>
			</div>
		</div>	
	<div class='gray-header-line'></div>
	
	
	
	
	
	
			<ul class="main_nav_left">
			  <li>
				<a href="/"><i class="icon-web"><div>Наш сайт</div></i></a>
			  </li>
			  <li>
				<a href="/ARM/basis/main/"><i class="icon-basis"><div>Базис</div></i></a>

			  </li>
			  <li>
				<!--<i><a href="/ARM/examination/main/"><img src="/ARM/basis/Assets/image/menuv/ok.png" width="15px" height="15px" alt="Проверка знаний"><div>Проверка знаний</div></a></i>
				<i class="icon-test"><a href="/ARM/examination/main/"><div>Проверка знаний</div></a></i>-->
				
				<a href="/ARM/examination/main/"><i class="icon-test"><div>Персона</div></i></a>
			  </li>
			  <li>
				<a href="/ARM/monitoring/main/"><i class="icon-mth"><div>МТХ и мониторинг</div></i></a>	
			  </li>
			  <li>
				<a href="/ARM/ozp/main/"><i class="icon-ozp"><div>ОЗП</div></i></a>
				
			  </li>
			  <li>
				<a href="/ARM/gaz/main/"><i class="icon-gaz"><div>Газовик</div></i></a>
				
			  </li>

			  <li>
				<a href="http://10.170.1.6/phonebook/"><i class="icon-pb"><div>Справочник</div></i></a>
				
			  </li>
			</ul>
	

	
	
	</div>	
		<div id="masthead_left">

		</div>	
	</header>