<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="\ARM\examination\Assets\image\ico_persona.png">

    <title>Персона</title>

	<!--link href="/ARM/examination/Assets/css/var.css" rel="stylesheet"-->
	<link href="/ARM/examination/Assets/css/start.css" rel="stylesheet">
	<link href="/ARM/content/themes/default/css/main.css" rel="stylesheet">
	<!--link href="/ARM/content/themes/default/css/main_page.css" rel="stylesheet" type="text/css"-->
    <!--link href="/ARM/basis/Assets/css/dashboard.css" rel="stylesheet"-->
    <link rel="stylesheet" href="/ARM/content/themes/default/css/simplelineicons.github.io-master  /css/simple-line-icons.css">
	<link href="/ARM/basis/Assets/css/basis.css" rel="stylesheet">
	<!--link href="/ARM/basis/Assets/css/object.css" rel="stylesheet"-->
	<link href="/ARM/examination/Assets/css/test.css" rel="stylesheet">
	<link href="/ARM/examination/Assets/css/print.css" rel="stylesheet">
	
</head>

<body>
<div class='main_wrapper'>
	<header>	
		<div id="masthead">
		<div class="head_of_page">
			<div class='header-left'>
				<a class="emblem_gegn" href="/index.php" title=""></a>
				<a class="" href="/ARM/examination/main/">
					<h3><span><i class="icon-test"></i></span>&nbsp
					ПЕРСОНА</h3>
				</a>
			</div>
			
			<div class='header-center container'>
				<div class="naim_org">
					<p>Министерство энергетики Республики Беларусь</p>
					<h1>Государственное учреждение <span>"Государственный энергетический и газовый надзор"</span></h1>	
				</div>
				
						<div class="main_nav_top">
		
		
							
							
								<ul class='hList'>
									<!--------------------------------------------------------------------------------------------------------------->	
									<li class="menu">
										
											<span class="menu-title"><?= $lang->dashboardMenu['test'] ?></span>
									
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/examination/testing/test/"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['start_test'] ?>
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/testing/enter_result/"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['enter_result'] ?>
												</a>
											</li>
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class="menu-title menu-title_2nd"><?= $lang->dashboardMenu['zurnal'] ?></span>
											
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/examination/zurnal/zurnal_e/"><span><i class="icon-list"></i></span>&nbsp
													<span>&nbsp<?= $lang->dashboardMenu['zurnal_e'] ?></span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/zurnal/zurnal_t/"><span><i class="icon-list"></i></span>&nbsp
													<span>&nbsp<?= $lang->dashboardMenu['zurnal_t'] ?></span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/zurnal/zurnal_g/"><span><i class="icon-list"></i></span>&nbsp
													<span>&nbsp<?= $lang->dashboardMenu['zurnal_g'] ?></span>
												</a>
											</li>
										</ul>
															
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
									
											<span class="menu-title menu-title_3nd">Персонал</span>
														
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/responsible_persons/create/"><span><i class="icon-plus"></i></span>&nbsp
													<span>Новое</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/responsible_persons/"><span><i class="icon-magnifier"></i></span>&nbsp
													<span>Поиск</span> 
												</a>
											</li>
											<!--li>
												<a class="nav-link" href="/ARM/basis/responsible_persons/reestr/"><span><i class="icon-list"></i></span>&nbsp
													<span>Реестр</span>
												</a>
											</li-->
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
									
											<span class="menu-title menu-title_2nd"><?= $lang->dashboardMenu['question'] ?></span>
													
										<ul class='menu-dropdown'>
											<li>

														<a class="nav-link" href="/ARM/examination/edit_questions/edit/"><span><i class=""></i></span>&nbsp
															<?= $lang->dashboardMenu['edit_test'] ?> 
														</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/testing/settings/"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['nastr_test'] ?> 
												</a>
											</li>
											<!--li>
												<a class="nav-link" href="/ARM/examination/testing/loadexcel/"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['loadexcel'] ?> 
												</a>
											</li-->
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class="menu-title menu-title_3nd"><?= $lang->dashboardMenu['guides'] ?></span>
									
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_vid"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_vid'] ?>							
												</a>
											</li>											
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_group"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_group'] ?>							
												</a>
											</li>																		
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_napr"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_napr'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_theme_elektro"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_theme_elektro'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_theme_teplo"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_theme_teplo'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/examination/guides/list/?guide=spr_test_theme_gaz"><span><i class=""></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_test_theme_gaz'] ?>							
												</a>
											</li>											
										</ul>										
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class="menu-title menu-title_2nd"><?= $lang->dashboardMenu['reports'] ?></span>
									
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
									
											<span class="menu-title menu-title_3nd"><?= $lang->dashboardMenu['info'] ?></span>
									
									</li>
									<!--------------------------------------------------------------------------------------------------------------->									
									<li class="menu">
					
											<span class='menu-title menu-title_2nd'>Кабинет</span>
					
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="http://10.170.1.6/phonebook/person.php?id=<?=$_COOKIE['id_user']?>"><span><i class="icon-user-following"></i></span>&nbsp
													Личные данные
												</a>
											</li>
										</ul>
									</li>									
									
								</ul>
							
						</div>
			</div>

			<div class="header-right">
				
				<div>
					<!--a href="/ARM/basis/basis/account/"-->
					<a href="http://10.170.1.6/phonebook/person.php?id=<?=$_COOKIE['id_user']?>">
						<span class='font-size-13'>Вы вошли как:</span><br/>
						<?php echo ( isset($auth_login) ? $auth_login : 'пользователь')?> <br/>
						<?php echo (isset($_COOKIE['access_level']) ? '<span class="font-size-13">ур.'.$_COOKIE['access_level'].'</span>' : '')?> 
						<?php 
						if(isset($_COOKIE['inspection_type'])){
							if($_COOKIE['inspection_type'] == 1){
								echo "<span class='font-size-13'>тепло</span>";
							}else if($_COOKIE['inspection_type'] == 2){
								echo "<span class='font-size-13'>газ</span>";
							}else if($_COOKIE['inspection_type'] == 3){
								echo "<span class='font-size-13'>электро</span>";
							}else if($_COOKIE['inspection_type'] == 0){
								echo "<span class='font-size-13'></span>";
							}	
						}else{
								echo "<span class='font-size-13'></span>";
						}
						?>
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
				<a href="/website/index.html"><i class="icon-web"><div>Наш сайт</div></i></a>
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
	<?php Theme::block('preloader/preloader') ?>