<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Панель администратора</title>


    <!--link href="/ARM/basis/basis/Assets/css/bootstrap.min.css" rel="stylesheet"-->
	<link href="/ARM/basis/Assets/css/main.css" rel="stylesheet">
	<link href="/ARM/content/themes/default/css/main_page.css" rel="stylesheet" type="text/css">
    <link href="/ARM/basis/Assets/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="/ARM/basis/basis/Assets/css/simplelineicons.github.io-master  /css/simple-line-icons.css">
    <!--link rel="stylesheet" href="/ARM/basis/basis/Assets/js/plugins/redactor/redactor.css"-->
	<link href="/ARM/basis/Assets/css/subject.css" rel="stylesheet">
	<link href="/ARM/basis/Assets/css/object.css" rel="stylesheet">

	
</head>

<body>
<div class='main_wrapper'>
	<header>	
		
		<div class="head_of_page">
			<div class='header-left'>
				<a class="emblem_gegn" href="/index.php" title=""></a>
				<a class="" href="/ARM/basis/main/">
							<h3>ПО "БАЗИС"</h3>
						</a>
			</div>
			
			<div class='header-center container'>
				<div class="naim_org">
					<p>Министерство энергетики Республики Беларусь</p>
					<h1>Государственное учреждение <span>"Государственный энергетический и газовый надзор"</span></h1>	
				</div>
				
						<div class="main_nav_top">
		
		
							
							
								<ul class='hList'>
								
									<li class="menu">
										<a class="" href="/ARM/basis/main/">
											<span class="menu-title"><?= $lang->dashboardMenu['home'] ?></span>
										</a>
										<!--<a class="" href="/ARM/basis/admin/">
											<span class="menu-title">Создать</span>
										</a>-->
									
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/admin/"><span><i class="icon-info"></i></span>&nbsp
													Информация
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/subject/list/"><span><i class="icon-subject"></i></span>&nbsp
													Мои потребители
												</a>
											</li>
											
											
											<!--<li>
												<a class="nav-link" href="/ARM/basis/basis/unp/create/">
													Юридическое лицо
												</a>			
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/basis/subject/create/">
													Субъект/Потребителя
												</a>			
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/basis/objects/">
													Объект                  
												</a>							
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/basis/responsible_persons/create/">
													Ответственное лицо
												</a>			
											</li>	-->
										</ul>
									</li>
									
									<li class="menu">
										<a  class="" href="">							
											<span class='menu-title menu-title_2nd'><?= $lang->dashboardMenu['reestr'] ?></span>
										</a>	
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/unp/"><span><i class="icon-unp"></i></span>&nbsp
													Юридические лица
												</a>
														<!--ul class='third-level'>
															<li>
																<a class="nav-link" href="/ARM/basis/basis/unp/">
																	Поиск в реестре УНП							
																</a>
															</li>
															<li>
																<a class="nav-link" href="/ARM/basis/basis/unp/list/">
																	Реестр УНП						
																</a>
															</li>
														</ul-->
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/subject/"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['subject'] ?>
												</a>
														<!--ul  class='third-level'>
															<li>
																<a class="nav-link" href="/ARM/basis/basis/subject/">
																	Поиск в реестре Потребителей						
																</a>
															</li>
															<li>
																<a class="nav-link" href="/ARM/basis/basis/subject/list/">
																	Реестр Потребителей						
																</a>
															</li>											
														</ul-->
											</li>
													<!--<li class="nav-item">
														<a class="nav-link" href="/ARM/basis/basis/objects/">
															<?= $lang->dashboardMenu['objects'] ?>	
														</a>
													</li>-->
											<li class="nav-item">
												<a class="nav-link" href="/ARM/basis/responsible_persons/"><span><i class="icon-people"></i></span>&nbsp
													<?= $lang->dashboardMenu['responsible_persons'] ?>	
												</a>
											</li>
										</ul>
									</li>
									
									<li class="menu">
										<a class="" href="">
											<span class='menu-title menu-title_3rd'><?= $lang->dashboardMenu['guide'] ?></span>
										</a>	
										<ul class='menu-dropdown two_column'>
											<!--потребитель-->	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_type_property"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_type_property'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_department"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_department'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_kind_of_activity"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_kind_of_activity'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_shift_of_work"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_shift_of_work'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_admin"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['adm_district'] ?>							
												</a>
											</li>	
											<!--Электро-->
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_klvl_volt"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['line_napr'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_klvl_type"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['line_snab'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_energy_type"><span><i class="icon-energy"></i></span>&nbsp	<!--?????-->
													<?= $lang->dashboardMenu['spr_oe_energy_type'] ?>							
												</a>
											</li>
											<!--Тепло-->	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_systemheat_water"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_systemheat_water'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oti_type_fuel"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['vid_top_kot'] ?>							
												</a>
											</li>
											<!--li>
														<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oti_type_fuel_rezerv"><span><i class="icon-teplo"></i></span>&nbsp
															<?//= $lang->dashboardMenu['vid_top_kot_rez'] ?>							
														</a>
											</li-->
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_heatnet_type_underground"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_heatnet_type_underground'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_to"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_to'] ?>							
												</a>
											</li>		
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_heat_source"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_heat_source'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_cat"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['kat_nad'] ?>							
												</a>
											</li>
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_gvs_in"><span><i class="icon-teplo"></i></span>&nbsp
													<?//= $lang->dashboardMenu['spr_ot_gvs_in'] ?>							
												</a>
											</li-->
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oti_boiler_type"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_oti_boiler_type'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_gvs_open"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_gvs_open'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_systemheat_dependent"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_systemheat_dependent'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_heatnet_type_iso"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['type_izol'] ?>							
												</a>
											</li>							
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_functions"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['func_ob'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_izol"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_isol'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_ot_pribor"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_ot_pribor'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_razvodka"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_razvodka'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_nazn_sar"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_nazn_sar'] ?>							
												</a>
											</li>							
											<!--ГАЗ-->
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_type_home"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_og_type_home'] ?>							
												</a>
											</li>							
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_type_gaz"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['vid_gaz'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_flue"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['vid_dym'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_flue_mater"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['mat_dym'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_device_type"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['gaz_type_ob'] ?>							
												</a>
											</li>
											<!--Структура-->	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_branch"><span><i class="icon-grid"></i></span>&nbsp
													<?= $lang->dashboardMenu['branch'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_podrazdelenie"><span><i class="icon-grid"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_podrazdelenie'] ?>							
												</a>
											</li>
											<!--case "spr_otdel": $name_table_spr = "Справочник отделов/РЭГИ"-->
											<!--АДРЕС-->
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_region"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['region'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_district"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['district'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_city"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['city'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_city_zone"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['district_city'] ?>							
												</a>
											</li>		
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_type_city"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_type_city'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_type_street"><span><i class="icon-location-pin"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_type_street'] ?>							
												</a>
											</li>									
										</ul>
												
									</li>
									
									<li class="menu">
										<a class="" href="">
											<span class='menu-title menu-title_4rd'>Отчёты</span>
										</a>
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href=""><span><i class="icon-note"></i></span>&nbsp
													Отчет о (в разработке)
												</a>
											</li>
											<li>
												<a class="nav-link" href=""><span><i class="icon-note"></i></span>&nbsp
													Отчет 2 (в разработке)
												</a>
											</li>
											<li>
												<a class="nav-link" href=""><span><i class="icon-note"></i></span>&nbsp
													Отчет 3 (в разработке)
												</a>
											</li>
										</ul>
									</li>
									<!--
									<li class='menu'>
										<a class="" href="#">					
											<span  class='menu-title menu-title_3rd'><?= $lang->dashboardMenu['settings']; ?> </span>
										</a>
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/basis/settings/general/"><span><i class="icon-settings"></i></span>&nbsp
													<?= $lang->dashboardMenu['settings']; ?>
												</a>
											</li>
										</ul>
									</li>
									-->
									<li class="menu">
										<a class="" href="">
											<span class='menu-title menu-title_3rd'>Кабинет</span>
										</a>
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/phonebook/person.php?id=<?=$_COOKIE['id_user']?>"><span><i class="icon-user-following"></i></span>&nbsp
													Данные
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
	<div class='gray-line'></div>

		
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