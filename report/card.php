<?php


require_once '../PHPExcel-1.8/Classes/PHPExcel.php';

 /*$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_to_phpTemp;
    $cacheSettings = array( 'memoryCacheSize ' => '600MB');
    PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);*/


$phpexcel = new PHPExcel(); 
$phpexcel->setActiveSheetIndex(0);
$active_page = $phpexcel->getActiveSheet();



if(isset($_POST)){

			$query_inc =	mysqli_query($connect, "SELECT * FROM potr");


			$query_uch=mysqli_query($connect, "SELECT * FROM uchastki");
			$query_otd=mysqli_query($connect, "SELECT * FROM spr_podrazdelenie");
			$query_region=mysqli_query($connect, "SELECT * FROM region");
			$query_podch=mysqli_query($connect, "SELECT * FROM podch");
			$query_ved=mysqli_query($connect, "SELECT * FROM vedom");
			$query_obl=mysqli_query($connect, "SELECT * FROM oblast");
			$query_user=mysqli_query($connect, "SELECT id, fio FROM users");
			$query_user_gaz=mysqli_query($connect, "SELECT id, fio FROM users");
			$query_ozp=mysqli_query($connect, "SELECT * FROM ozp_potr_2021");
	$i=0;
	$s=2;


		while($row_inc=mysqli_fetch_array($query_inc)){
	
			$cod_region = "";
			$name_region = "";
			$name_uch = "";
			$cod_uch = "";
			$name_otd = "";
			$cod_otd = "";	
			$name_obl_f = "";
			$cod_obl_f = "";	
			$name_insp_t = "";
			$cod_insp_t = "";	
			$name_insp_g = "";
			$cod_insp_g = "";	
			$num_pass = "";
			$date_pass = "";
			$kol_ob_plan = "";
			$kol_ob_fact = "";	
						$date_gr = "";
						$kol_z1 = "";
						$osm_z1 = "";
						$date_z1 = "";
						$otm1 = "";
						$otm2 = "";
						$otm3 = "";
						$kol_z2 = "";
						$osm_z2 = "";
						$date_z2 = "";
						$otm4 = "";
						$otm5 = "";
						$otm6 = "";
	
	
			$cod_uch = $row_inc['cod_uch'];
				while($row_uch=mysqli_fetch_array($query_uch)){
					if($row_uch['cod_uch'] == $cod_uch){
						$name_uch = $row_uch['name_uch'];
						$cod_uch = $row_uch['cod_uch'];
					}
				}
			mysqli_data_seek($query_uch,0);	
				
			$cod_otd = $row_inc['cod_otd'];
				while($row_uch=mysqli_fetch_array($query_otd)){
					if($row_uch['id'] == $cod_otd){
						$name_otd = $row_uch['sokr_name'];
						$cod_otd = $row_uch['id'];
					}
				}
			mysqli_data_seek($query_otd,0);	
/************/
			$cod_region_p = $row_inc['cod_reg'];
					while($row_uch=mysqli_fetch_array($query_region)){
							if($row_uch['id'] == $cod_region_p){
								$cod_region = $row_uch['id'];
								$name_region = $row_uch['name_region'];
							}
					}
			mysqli_data_seek($query_region,0);
/***************/			
			$cod_podch = $row_inc['course'];
					while($row_uch=mysqli_fetch_array($query_podch)){
						if($row_uch['cod_podch'] == $cod_podch){
							$cod_podch = $row_uch['cod_podch'];
							$name_podch = $row_uch['name_podch'];
						}
					}
			mysqli_data_seek($query_podch,0);
			
			$cod_ved = $row_inc['cod_ved'];
					while($row_uch=mysqli_fetch_array($query_ved)){
						if($row_uch['cod_ved'] == $cod_ved){
							$cod_ved = $row_uch['cod_ved'];
							$name_ved = $row_uch['name_ved'];
						}
					}
			mysqli_data_seek($query_ved,0);

			$cod_obl_f = $row_inc['cod_obl_f'];
				while($row_uch=mysqli_fetch_array($query_obl)){
					if($row_uch['id'] == $cod_obl_f){
						$name_obl_f = $row_uch['name_obl'];
						$cod_obl_f = $row_uch['id'];
					}
				}
			mysqli_data_seek($query_obl,0);	

			
			$cod_user_t = $row_inc['cod_user'];
				while($row_uch=mysqli_fetch_array($query_user)){
					if($row_uch['id'] == $cod_user_t){
						$name_insp_t = $row_uch['fio'];
						$cod_insp_t = $row_uch['id'];
					}
				}
			mysqli_data_seek($query_user,0);	

			$cod_user_g = $row_inc['cod_user_gaz'];
				while($row_uch=mysqli_fetch_array($query_user_gaz)){
					if($row_uch['id'] == $cod_user_g){
						$name_insp_g = $row_uch['fio'];
						$cod_insp_g = $row_uch['id'];
					}
				}
			mysqli_data_seek($query_user_gaz,0);


			$cod_potr = $row_inc['id'];
				while($row_uch=mysqli_fetch_array($query_ozp)){
					if($row_uch['cod_potr'] == $cod_potr){
						$num_pass = $row_uch['num_pg'];
						$date_pass = date('d.m.Y',strtotime($row_uch['date_pg']));
						$kol_ob_plan = $row_uch['kol_ob_pg'];
						$kol_ob_fact = $row_uch['kol_ob_fg'];
						$date_gr = date('d.m.Y',strtotime($row_uch['date_grafik']));
						$kol_z1 = $row_uch['kol_z1'];
						$osm_z1 = $row_uch['osm_z1'];
						$date_z1 = date('d.m.Y',strtotime($row_uch['date_z1']));
						$otm1 = $row_uch['otm_z1'];
						$otm2 = $row_uch['otm_z2'];
						$otm3 = $row_uch['otm_z3'];
						$kol_z2 = $row_uch['kol_z1_rep'];
						$osm_z2 = $row_uch['osm_z1_rep'];
						$date_z2 = date('d.m.Y',strtotime($row_uch['date_z1_rep']));
						$otm4 = $row_uch['otm_z1_rep'];
						$otm5 = $row_uch['otm_z2_rep'];
						$otm6 = $row_uch['otm_z3_rep'];

					
					}
				}
			mysqli_data_seek($query_ozp,0);



			
			
	
			$active_page->setCellValueByColumnAndRow($i++,$s,($s-1));
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['name_org']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_otd);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_otd);			
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_uch);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_uch);
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_region);
	

			$active_page->setCellValueByColumnAndRow($i++,$s,$name_region);
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_podch);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_podch);			
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_ved);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_ved);			
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['unp']);
			$active_page->setCellValueByColumnAndRow($i++,$s,(!empty($row_inc['index_p']) ? $row_inc['index_p'] : "").(!empty($row_inc['rayon']) ? ", ".$row_inc['rayon'] : "").(!empty($row_inc['ulica']) ? ", ".$row_inc['ulica'] : "").(!empty($row_inc['dom']) ? ", д.".$row_inc['dom'] : ""));
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_obl_f);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_obl_f);
			$active_page->setCellValueByColumnAndRow($i++,$s,(!empty($row_inc['index_f']) ? $row_inc['index_f'] : "").(!empty($row_inc['obl_f']) ? ", ".$row_inc['obl_f'] : "").(!empty($row_inc['rayon_f']) ? ", ".$row_inc['rayon_f'] : "").(!empty($row_inc['ulica_f']) ? ", д.".$row_inc['ulica_f'] : "").(!empty($row_inc['dom_f']) ? ", д.".$row_inc['dom_f'] : ""));
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['email']);
			
			
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_insp_t);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_insp_t);
			$active_page->setCellValueByColumnAndRow($i++,$s,$cod_insp_g);
			$active_page->setCellValueByColumnAndRow($i++,$s,$name_insp_g);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['is_ozp']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['confirm']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_ob_sum']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_ob_p']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_obs']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_mzd']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_obd']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_gmdt']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_zdpv']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_mzdk']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['kol_go']);
			$active_page->setCellValueByColumnAndRow($i++,$s,$row_inc['id']);
			
			$active_page->setCellValueByColumnAndRow($i++,$s,$num_pass);
			$active_page->setCellValueByColumnAndRow($i++,$s,$date_pass);
			$active_page->setCellValueByColumnAndRow($i++,$s,$kol_ob_plan);
			$active_page->setCellValueByColumnAndRow($i++,$s,$kol_ob_fact);
			
			
			$active_page->setCellValueByColumnAndRow($i++,$s,$date_gr);
			$active_page->setCellValueByColumnAndRow($i++,$s,$kol_z1);
			$active_page->setCellValueByColumnAndRow($i++,$s,$osm_z1);
			$active_page->setCellValueByColumnAndRow($i++,$s,$date_z1);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm1);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm2);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm3);
			$active_page->setCellValueByColumnAndRow($i++,$s,$kol_z2);
			$active_page->setCellValueByColumnAndRow($i++,$s,$osm_z2);
			$active_page->setCellValueByColumnAndRow($i++,$s,$date_z2);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm4);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm5);
			$active_page->setCellValueByColumnAndRow($i++,$s,$otm6);
			

			$i=0;
			$s++;
			//echo $s;
		}








	$border = array(
		'borders'=>array(
			'allborders'=>array(
				'style' => PHPExcel_Style_Border::BORDER_THIN,
				'color' => array('rgb'=>'000000')
			)
		)
	);
		$bg = array(
			'fill'=>array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb'=>'DCDCDC')
		)
	);



/************************************************  шапка таблицы **********************************/	
	$active_page->getColumnDimension("A")->setWidth(7);
	$active_page->getColumnDimension("B")->setWidth(40);
	$active_page->getColumnDimension("C")->setWidth(7);
	$active_page->getColumnDimension("D")->setWidth(20);
	$active_page->getColumnDimension("E")->setWidth(7);
	$active_page->getColumnDimension("F")->setWidth(20);	
	$active_page->getColumnDimension("G")->setWidth(7);
	$active_page->getColumnDimension("H")->setWidth(20);
	$active_page->getColumnDimension("I")->setWidth(7);
	$active_page->getColumnDimension("J")->setWidth(20);
	$active_page->getColumnDimension("K")->setWidth(7);
	$active_page->getColumnDimension("L")->setWidth(20);	
	$active_page->getColumnDimension("M")->setWidth(20);
	$active_page->getColumnDimension("N")->setWidth(30);
	$active_page->getColumnDimension("O")->setWidth(7);
	$active_page->getColumnDimension("P")->setWidth(20);
	$active_page->getColumnDimension("Q")->setWidth(30);
	$active_page->getColumnDimension("R")->setWidth(25);
	$active_page->getColumnDimension("S")->setWidth(7);
	$active_page->getColumnDimension("T")->setWidth(25);
	$active_page->getColumnDimension("S")->setWidth(7);
	$active_page->getColumnDimension("T")->setWidth(25);	
	$active_page->getColumnDimension("U")->setWidth(7);
	$active_page->getColumnDimension("V")->setWidth(25);	
	$active_page->getColumnDimension("W")->setWidth(20);
	$active_page->getColumnDimension("X")->setWidth(20);
	$active_page->getColumnDimension("Y")->setWidth(20);
	$active_page->getColumnDimension("Z")->setWidth(20);
	$active_page->getColumnDimension("AA")->setWidth(20);
	$active_page->getColumnDimension("AB")->setWidth(20);
	$active_page->getColumnDimension("AC")->setWidth(20);
	$active_page->getColumnDimension("AD")->setWidth(20);
	$active_page->getColumnDimension("AE")->setWidth(20);
	$active_page->getColumnDimension("AF")->setWidth(20);
	$active_page->getColumnDimension("AG")->setWidth(20);
	$active_page->getColumnDimension("AH")->setWidth(7);
	$active_page->getColumnDimension("AI")->setWidth(20);
	$active_page->getColumnDimension("AJ")->setWidth(20);
	$active_page->getColumnDimension("AK")->setWidth(20);
	$active_page->getColumnDimension("AL")->setWidth(20);
	
	
	$active_page->getColumnDimension("AM")->setWidth(20);
	$active_page->getColumnDimension("AN")->setWidth(20);
	$active_page->getColumnDimension("AO")->setWidth(20);
	$active_page->getColumnDimension("AP")->setWidth(20);
	$active_page->getColumnDimension("AQ")->setWidth(20);
	$active_page->getColumnDimension("AR")->setWidth(20);
	$active_page->getColumnDimension("AS")->setWidth(20);
	$active_page->getColumnDimension("AT")->setWidth(20);
	$active_page->getColumnDimension("AU")->setWidth(20);
	$active_page->getColumnDimension("AV")->setWidth(20);
	$active_page->getColumnDimension("AW")->setWidth(20);
	$active_page->getColumnDimension("AX")->setWidth(20);
	$active_page->getColumnDimension("AY")->setWidth(20);
	$active_page->getColumnDimension("AZ")->setWidth(20);

	$active_page->setCellValue("A1", '№ п.п.');
	$active_page->setCellValue("B1", 'Наименование организации');
	$active_page->setCellValue("C1", 'Код отделения');	
	$active_page->setCellValue("D1", 'Отделение');
	$active_page->setCellValue("E1", 'Код участка');	
	$active_page->setCellValue("F1", 'Участок');	
	$active_page->setCellValue("G1", 'Код района');	
	$active_page->setCellValue("H1", 'Район');
	$active_page->setCellValue("I1", 'Код подчиненности');	
	$active_page->setCellValue("J1", 'Подчиненность');
	$active_page->setCellValue("K1", 'Код ведомства');	
	$active_page->setCellValue("L1", 'Ведомство');	
	$active_page->setCellValue("M1", 'УНП');	
	$active_page->setCellValue("N1", 'Юридический адрес');
	$active_page->setCellValue("O1", 'Код отделения (факт.адрес)');
	$active_page->setCellValue("P1", 'Отделение (факт.адрес)');
	$active_page->setCellValue("Q1", 'Фактический адрес');
	$active_page->setCellValue("R1", 'Почта');
	$active_page->setCellValue("S1", 'Код инспектора(тепло)');	
	$active_page->setCellValue("T1", 'Инспектор(тепло)');
	$active_page->setCellValue("U1", 'Код инспектора(газ)');	
	$active_page->setCellValue("V1", 'Инспектор(газ)');
	$active_page->setCellValue("W1", 'ОЗП (1 - включен в график, 0 - не включен)');
	$active_page->setCellValue("X1", 'Наличие жилищного фонда (1 - есть, 0 - нет)');
	
	$active_page->setCellValue("Y1", 'Общее количество объектов');
	$active_page->setCellValue("Z1", 'Общее количество объектов (плановое) ');
	$active_page->setCellValue("AA1", 'общежития ');
	$active_page->setCellValue("AB1", 'многоквартирные жилые дома');
	$active_page->setCellValue("AC1", 'одноквартирные, блокированные жилые дома');
	$active_page->setCellValue("AD1", 'Количество газифицированных многоквартирных жилых домов, подключенных к сетям теплоснабжения');
	$active_page->setCellValue("AE1", 'в том числе количество жилых домов, оборудованных газовыми проточными водонагревателями');
	$active_page->setCellValue("AF1", 'Количество многоквартирных жилых домов с отопительными газовыми котлами');
	$active_page->setCellValue("AG1", 'Количество газифицированных общежитий ');
	$active_page->setCellValue("AH1", 'ID потребителя');
	$active_page->setCellValue("AI1", 'Номер паспорта готовности');
	$active_page->setCellValue("AJ1", 'Дата паспорта готовности');
	$active_page->setCellValue("AK1", 'Количество объектов (плановое)');
	$active_page->setCellValue("AL1", 'Количество объектов (фактическое)');
	
	$active_page->setCellValue("AM1", 'Дата ОЗП по графику');
	$active_page->setCellValue("AN1", 'Количество заявок (основная)');
	$active_page->setCellValue("AO1", 'Количество осмотров (основная)');
	$active_page->setCellValue("AP1", 'Дата заявки (основная)');
	$active_page->setCellValue("AQ1", 'Отметка тепло (основная)');
	$active_page->setCellValue("AR1", 'Отметка газ (основная)');
	$active_page->setCellValue("AS1", 'Отметка электро (основная)');
	$active_page->setCellValue("AT1", 'Количество заявок (повторная)');
	$active_page->setCellValue("AU1", 'Количество осмотров (повторная)');
	$active_page->setCellValue("AV1", 'Дата заявки (повторная)');
	$active_page->setCellValue("AW1", 'Отметка тепло (повторная)');
	$active_page->setCellValue("AX1", 'Отметка газ (повторная)');
	$active_page->setCellValue("AY1", 'Отметка электро (повторная)');



	$active_page->getStyle('A1:AY'.($s-1))->getAlignment()->setWrapText(true);
	$active_page->getStyle('A1:AY1')->applyFromArray($bg);
	$active_page->getStyle('A1:AY1')->getFont()->setBold(true);	
	$active_page->getStyle('A1:AY1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$active_page->getStyle('A1:AY1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	

	
	$active_page->getStyle('A1:AY'.($s-1))->applyFromArray($border);	
	$active_page->getStyle('A2:AY'.($s-1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	



	/********************* сохранение файла ********************************/
	$objWriter = PHPExcel_IOFactory::createWriter($phpexcel, 'Excel2007');
	$objWriter->save("../doc/потр.xlsx");
	$XLSPath = "../arm/doc/потр.xlsx";
	/********************* открытие файла ********************************/
echo $XLSPath;
	exit();
	
}	
?>