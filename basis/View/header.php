<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- Теги с директивами "не кешировать" для браузера и "узлов" веб-сети -->
	<meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate, public, private" />
	

	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="0" />
	
    <link rel="icon" href="\ARM\basis\Assets\image\ico_basis.png">

    <title>Базис</title>

	<!--link href="/ARM/basis/Assets/css/var.css" rel="stylesheet"-->
	<link href="/ARM/content/themes/default/css/main.css" rel="stylesheet">
	<!--link href="/ARM/content/themes/default/css/main_page.css" rel="stylesheet" type="text/css"-->
    <!--link href="/ARM/basis/Assets/css/dashboard.css" rel="stylesheet"-->
    <link rel="stylesheet" href="/ARM/content/themes/default/css/simplelineicons.github.io-master  /css/simple-line-icons.css">
	<link href="/ARM/basis/Assets/css/basis.css" rel="stylesheet">

	
</head>

<body>
<div class='main_wrapper'>
	<header>	
		<div id="masthead">
		<div class="head_of_page">
			<div class='header-left'>
				<a class="emblem_gegn" href="/index.php" title=""></a>
				<a class="" href="/ARM/basis/main/">
					<h3><span><i class="icon-basis"></i></span>&nbsp
					БАЗИС</h3>
				</a>
			</div>
			
			<div class='header-center container'>
				<!--div class="naim_org">
					<p>Министерство энергетики Республики Беларусь</p>
					<h1>Государственное учреждение "Государственный энергетический и газовый надзор"</h1>	
				</div-->
				<!--div class="naim_org title_test">
					<p>ТЕСТОВЫЙ</p>
				</div-->
				<div class="naim_org title_test">
					<p>Р А З Р А Б О Т К А</p>
				</div>
				
						<div class="main_nav_top">
		
		
							
							
								<ul class='hList'>
									<!--------------------------------------------------------------------------------------------------------------->	
									<li class="menu">
										
											<span class="menu-title"><?= $lang->dashboardMenu['subject'] ?></span>
									
										<!--<a class="" href="/ARM/basis/admin/">
											<span class="menu-title">Создать</span>
										</a>-->
								
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/subject/list/"><span><i class="icon-pin"></i></span>&nbsp
													<span>Мои потребители</span>
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/subject/create/"><span><i class="icon-plus"></i></span>&nbsp
													<span>Новый</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/subject/"><span><i class="icon-magnifier"></i></span>&nbsp
													<span>Поиск</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/filter/"><span><i class="icon-list"></i></span>&nbsp
													<span>Реестр</span>
												</a>
											</li>
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class="menu-title menu-title_2nd">Юр лица и ИП</span>
															
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/unp/create/"><span><i class="icon-plus"></i></span>&nbsp
													<span>Новое</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/unp/"><span><i class="icon-magnifier"></i></span>&nbsp
													<span>Поиск</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/unp/list/"><span><i class="icon-list"></i></span>&nbsp
													<span>Реестр</span>
												</a>
											</li>
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class="menu-title menu-title_3nd">Физ. лица</span>
														
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/individual_persons/create/"><span><i class="icon-plus"></i></span>&nbsp
													<span>Новое</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/individual_persons/"><span><i class="icon-magnifier"></i></span>&nbsp
													<span>Поиск</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/individual_persons/reestr/"><span><i class="icon-list"></i></span>&nbsp
													<span>Реестр</span>
												</a>
											</li>
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
									
											<span class="menu-title menu-title_2nd">Персонал</span>
												
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/personal/create/"><span><i class="icon-plus"></i></span>&nbsp
													<span>Новое</span> 
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/personal/"><span><i class="icon-magnifier"></i></span>&nbsp
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
									
											<span class='menu-title menu-title_3nd'><?= $lang->dashboardMenu['guide'] ?></span>
							
										<ul class='menu-dropdown two_column'>
				<!--Потребители-->
				<p class="menu_quides_line">---------------- потребитель ---------------------</p>				
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
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_type_property"><span><i class="icon-subject"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_type_property'] ?>							
												</a>
											</li>
											<!--
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_admin"><span><i class="icon-subject"></i></span>&nbsp
													<?//= $lang->dashboardMenu['adm_district'] ?>							
												</a>
											</li>
											-->											
											<!--Электро-->
											
				<!--Электро-->				
				<p class="menu_quides_line">---------------- электро ---------------------</p>				
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_energy_type"><span><i class="icon-energy"></i></span>&nbsp	<!--?????-->
													<?= $lang->dashboardMenu['spr_oe_energy_type'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_category_line"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['category_line'] ?>							
												</a>
											</li>											
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_klvl_type"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['line_snab'] ?>							
												</a>
											</li>											
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_oe_klvl_volt"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['line_napr'] ?>							
												</a>
											</li>											
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_type_object"><span><i class="icon-energy"></i></span>&nbsp
													<?= $lang->dashboardMenu['type_object'] ?>							
												</a>
											</li>
				<p class="menu_quides_line">---------------- тепло ---------------------</p>
				<!--Тепло-->	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_izol"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_isol'] ?>							
												</a>
											</li>	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_systemheat_water"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_systemheat_water'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_ot_pribor"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_type_ot_pribor'] ?>							
												</a>
											</li>
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
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_diametr_tube"><span><i class="icon-teplo"></i></span>&nbsp
													<?= $lang->dashboardMenu['diametr_tube'] ?>							
												</a>
											</li>	
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_type_razvodka"><span><i class="icon-teplo"></i></span>&nbsp
													<?//= $lang->dashboardMenu['spr_ot_type_razvodka'] ?>							
												</a>
											</li-->
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_nazn_sar"><span><i class="icon-teplo"></i></span>&nbsp
													<?//= $lang->dashboardMenu['spr_ot_nazn_sar'] ?>							
												</a>
											</li-->							
											<!--ГАЗ-->
				<p class="menu_quides_line">---------------- газ ---------------------</p>													
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_accidents"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['og_accidents'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_type_gaz"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['vid_gaz'] ?>							
												</a>
											</li>	
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_flue"><span><i class="icon-fire"></i></span>&nbsp
													<?//= $lang->dashboardMenu['vid_dym'] ?>							
												</a>
											</li-->	
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_flue_mater"><span><i class="icon-fire"></i></span>&nbsp
													<?//= $lang->dashboardMenu['mat_dym'] ?>							
												</a>
											</li-->	
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_device_type"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['gaz_type_ob'] ?>							
												</a>
											</li>
											<!--li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_to_gaz"><span><i class="icon-fire"></i></span>&nbsp
													<?//= $lang->dashboardMenu['to_gaz'] ?>							
												</a>
											</li-->											
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_obsl_go"><span><i class="icon-fire"></i></span>&nbsp
													<?= $lang->dashboardMenu['obsl_go'] ?>							
												</a>
											</li>																						
											<!--Структура-->	
											<!--
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
											case "spr_otdel": $name_table_spr = "Справочник отделов/РЭГИ"
											-->
				<p class="menu_quides_line">---------------- ответственные лица ---------------------</p>								
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=type_otv"><span><i class="icon-rp"></i></span>&nbsp
													<?= $lang->dashboardMenu['type_otv'] ?>							
												</a>
											</li>											
											<!--АДРЕС-->
				<p class="menu_quides_line">---------------- адрес ---------------------</p>							
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
				<p class="menu_quides_line">---------------- системные ---------------------</p>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_units_power"><span><i class="icon-anchor"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_units_power'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_og_type_home"><span><i class="icon-anchor"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_og_type_home'] ?>							
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/guides/list/?guide=spr_ot_podrazdel"><span><i class="icon-anchor"></i></span>&nbsp
													<?= $lang->dashboardMenu['spr_ot_podrazdel'] ?>							
												</a>
											</li>
				
										
										</ul>
												
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
										
											<span class='menu-title menu-title_2nd'><?= $lang->dashboardMenu['report'] ?></span>
										
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/personal/srok/"><span><i class="icon-note"></i></span>&nbsp
													Контроль сроков ПЗ
												</a>
											</li>
											<!--li>
												<a class="nav-link" href=""><span><i class="icon-note"></i></span>&nbsp
													Отчет 2 (в разработке)
												</a>
											</li>
											<li>
												<a class="nav-link" href=""><span><i class="icon-note"></i></span>&nbsp
													Отчет 3 (в разработке)
												</a>
											</li-->
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->
									<li class="menu">
									
											<span class='menu-title menu-title_3nd'><?= $lang->dashboardMenu['info'] ?></span>
									
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/ARM/basis/information/"><span><i class="icon-info"></i></span>&nbsp
													Информация
												</a>
											</li>
											<li>
												<a class="nav-link" href="/ARM/basis/information/docs/"><span><i class="icon-docs"></i></span>&nbsp
													Документы
												</a>
											</li>
										</ul>
									</li>
									<!--------------------------------------------------------------------------------------------------------------->		
									<li class="menu">
									
											<span class='menu-title menu-title_2nd'>Кабинет</span>
									
										<ul class='menu-dropdown'>
											<li>
												<a class="nav-link" href="/phonebook/person.php?id=<?=$_COOKIE['id_user']?>"><span><i class="icon-user-following"></i></span>&nbsp
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
					<span class='font-size-13'>Пользователь:</span>
					<br/>
					<?php echo (isset($_COOKIE['access_level']) ? '<span class="font-size-13">'.$_COOKIE['access_level'].' уровня,</span>' : '')?> 
					<br/>
					<?php 
					if(isset($_COOKIE['inspection_type'])){
						if($_COOKIE['inspection_type'] == 1){
							echo "<span class='font-size-13'>тепло</span>";
						}else if($_COOKIE['inspection_type'] == 2){
							echo "<span class='font-size-13'>газ</span>";
						}else if($_COOKIE['inspection_type'] == 3){
							echo "<span class='font-size-13'>электро</span>";
						}else if($_COOKIE['inspection_type'] == 0){
							echo "<span class='font-size-13'>---</span>";
						}	
					}else{
						echo "<span class='font-size-13'>нет</span>";
					}
					?>
				</div>
				
				<div class='logout'>
					<a href="/phonebook/person.php?id=<?=$_COOKIE['id_user']?>">
						<?php echo ( isset($auth_login) ? $auth_login : 'Авторизован')?>
					</a>
					<a href="/ARM/admin/logout/" class=''>
						<i class="icon-logout icons"></i> 
					</a>
				</div>
			</div>
			
		</div>	
	<div class='gray-header-line'></div>

			<ul class="main_nav_left">
				<li>
					<a href="/index.php"><i class="icon-web"><div>Наш сайт</div></i></a>
				</li>
				
				<li>
					<a href="/phonebook/"><i class="icon-pb"><div>Справочник</div></i></a>
				</li>
				
				<!-- *********** ПК АРМ Испектора *********** -->
				<hr style="color: var(--color-255)">
				<li>
					<a href="/ARM/basis/main/"><i class="icon-basis"><div>Базис</div></i></a>
				</li>
				
				<li>		
					<a href="/ARM/examination/main/"><i class="icon-test"><div>Персона</div></i></a>	
				</li>
				
				<li>
					<a href="/ARM/monitoring/main/"><i class="icon-mth"><div>МТХ и мониторинг</div></i></a>	
				</li>
				
				<li>
					<a href="/ARM/ozp/main/"><i class="icon-ozp"><div>ОЗП</div></i></a>
				</li>
				
				<li>
					<a href=""><i class="icon-event"><div>План-Отчет</div></i></a>
				</li>
				<hr style="color: var(--color-255)">
				
			</ul>
	
	
	
	</div>	
		<div id="masthead_left">

		</div>	
	</header>
	<?php Theme::block('preloader/preloader') ?>