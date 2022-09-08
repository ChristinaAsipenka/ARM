<?php
$sub_id=128;

//подключаем
	require $_SERVER['DOCUMENT_ROOT'].'/library/PhpSpreadsheet/vendor/autoload.php';
	include $_SERVER['DOCUMENT_ROOT']."/function/fun_address.php"; // $_SERVER['DOCUMENT_ROOT'] - указывает корневую директорию сайта

//Устанавливаем доступы к базе данных:
	$host = 'localhost'; 	//имя хоста, на локальном компьютере это localhost
	$user = 'root'; 		//имя пользователя, по умолчанию это root
	$password = ''; 		//пароль, по умолчанию пустой
	$db_name = 'gegn'; 		//имя базы данных


//Соединяемся с базой данных используя наши доступы:
	$link=mysqli_connect($host, $user, $password, $db_name); //or die("Не могу соединиться с MySQL.");

	
//запрос -----на данные потребителя (с адресом)-----------------------------------------------------------------------------------------------------------------------------------------------------
	$arr_subject=mysqli_query($link,"
	SELECT 
	reestr_subject.name,
	reestr_unp.name AS vso,
	reestr_unp.unp AS unp,
	spr_type_property.name AS fs,
	spr_kind_of_activity.name AS activity, spr_shift_of_work.name AS sh_work,
	supply_name, supply_dog_date, supply_dog_num,
	ruk_firstname, ruk_secondname, ruk_lastname, ruk_tel, gi_firstname, gi_secondname, gi_lastname, gi_tel, ge_firstname, ge_secondname, ge_lastname, ge_tel,
	
	reestr_subject.place_address_index AS ind,	
    spr_region.name AS rgn, 	  
    spr_district.name AS dst,
	spr_type_city.sokr_name AS ct_t,
	spr_city.name AS ct,
	spr_city.key_region AS ct_keyr,
    spr_city_zone.name AS ct_z,
	spr_type_street.sokr_name AS st_t,
	reestr_subject.place_address_street AS st, 	
    reestr_subject.place_address_building AS bld, 	
    reestr_subject.place_address_flat AS flt

	FROM `reestr_subject`
		left JOIN reestr_unp ON reestr_subject.id_unp=reestr_unp.id	
		left JOIN spr_type_property ON reestr_subject.type_property=spr_type_property.id
		left JOIN spr_kind_of_activity ON reestr_subject.type_activity=spr_kind_of_activity.id
		left JOIN spr_shift_of_work ON reestr_subject.shift_work=spr_shift_of_work.id
		Left JOIN spr_region ON reestr_subject.place_address_region=spr_region.id
		Left JOIN spr_district ON reestr_subject.place_address_district=spr_district.id
		Left JOIN spr_city ON reestr_subject.place_address_city=spr_city.id
		Left JOIN spr_city_zone ON reestr_subject.place_address_city_zone=spr_city_zone.id
		Left JOIN spr_type_city ON reestr_subject.place_address_city_type=spr_type_city.id
		Left JOIN spr_type_street ON reestr_subject.place_address_street_type=spr_type_street.id
		
	WHERE reestr_subject.id=".$sub_id); 
	$r_subject = mysqli_fetch_array($arr_subject,MYSQLI_ASSOC);  	//передали в массив значения 
	
	
echo $sub_id;	
echo "<br>";echo "<br> 60 ";
print_r($r_subject);
echo "<br>";
//	-----------------------------------------------------------------------------------------------------------------------------------------------------
	
//запрос ----- на объекты потребителя--- есть ли они, запомнил их  в массиве $arr_obj_all-----------------------------------------------------------------------------------------------------------------------------------
	$arr_obj_all=mysqli_query($link,"
	SELECT reestr_object.id,
	reestr_object.name
	FROM `reestr_object`
	WHERE reestr_object.id_reestr_subject=".$sub_id); 
	
	
echo "<br> 73 ";	
print_r($arr_obj_all);
echo mysqli_num_rows($arr_obj_all);
echo "<br>";
while($r_obj_all2 = mysqli_fetch_array($arr_obj_all)){				
	echo "<br> arr_obj_all 77 ";
	print_r($r_obj_all2);
}
mysqli_data_seek($arr_obj_all,0);


	// проверка на наличие электро объектов у потребителя
	$obj_n_bd=array();
	$obj_klvl=array(); $obj_trp=array(); $obj_aie=array();
	$subabon=array();
	if (mysqli_num_rows($arr_obj_all)==0){
	
echo "--------------нет объектов-----------------";

		}else{	
			while($r_obj_all = mysqli_fetch_array($arr_obj_all)){
				//запрос ------ на данные в конкрентом объекте 
				echo "<br> id объектов: ";
				echo $r_obj_all['id'];
					// создание двухмерного массива для хранения данных о всех объектах потребителя
					$arr_obj=mysqli_query($link,"
					SELECT 
						reestr_object.name,
						reestr_object.e_cat_1 AS ec1, reestr_object.e_cat_1plus AS ec1p, reestr_object.e_cat_2 AS ec2, reestr_object.e_cat_3 AS ec3,
						
						reestr_object.address_index AS ind,	
						spr_region.name AS rgn, 	  
						spr_district.name AS dst,
						spr_type_city.sokr_name AS ct_t,
						spr_city.name AS ct,	
						spr_city.key_region AS ct_keyr,
						spr_city_zone.name AS ct_z,
						spr_type_street.sokr_name AS st_t,
						reestr_object.address_street AS st, 	
						reestr_object.address_building AS bld, 	
						reestr_object.address_flat AS flt
					
					FROM `reestr_object`				
						Left JOIN spr_region ON reestr_object.address_region=spr_region.id
						Left JOIN spr_district ON reestr_object.address_district=spr_district.id
						Left JOIN spr_city ON reestr_object.address_city=spr_city.id
						Left JOIN spr_city_zone ON reestr_object.address_city_zone=spr_city_zone.id
						Left JOIN spr_type_city ON reestr_object.address_city_type=spr_type_city.id
						Left JOIN spr_type_street ON reestr_object.address_street_type=spr_type_street.id
						
					WHERE reestr_object.id=".$r_obj_all['id']);
					
					array_push($obj_n_bd,mysqli_fetch_array($arr_obj,MYSQLI_ASSOC)); 	// $obj_n_bd двухмерный массив объектов с данными

				//-------------------------------------------- 

				
				//запрос ------ на субабоненты у потребителя  // $arr_subabon массив субабонентов с данными
					$arr_subabon=mysqli_query($link,"  
					SELECT 
						reestr_object.name,
						reestr_subject.name AS Pname,
						
						reestr_subject.type_activity AS Pactivity,
						reestr_subject.shift_work AS Psh_work,
					
						reestr_object.address_index AS ind,	
						spr_region.name AS rgn, 	  
						spr_district.name AS dst,
						spr_type_city.sokr_name AS ct_t,
						spr_city.name AS ct,	
						spr_city.key_region AS ct_keyr,
						spr_city_zone.name AS ct_z,
						spr_type_street.sokr_name AS st_t,
						reestr_object.address_street AS st, 	
						reestr_object.address_building AS bld, 	
						reestr_object.address_flat AS flt,
						
						reestr_object.e_cat_1 AS ec1,
						reestr_object.e_cat_1plus AS ec1p,
						reestr_object.e_cat_2 AS ec2,
						reestr_object.e_cat_3 AS ec3
					FROM `reestr_object`
						Left JOIN reestr_subject ON reestr_object.id_reestr_subject=reestr_subject.id
						left join spr_kind_of_activity ON reestr_subject.type_activity=spr_kind_of_activity.id		
						left join spr_shift_of_work ON reestr_subject.shift_work=spr_shift_of_work.id
						Left JOIN spr_region ON reestr_object.address_region=spr_region.id
						Left JOIN spr_district ON reestr_object.address_district=spr_district.id
						Left JOIN spr_city ON reestr_object.address_city=spr_city.id
						Left JOIN spr_city_zone ON reestr_object.address_city_zone=spr_city_zone.id
						Left JOIN spr_type_city ON reestr_object.address_city_type=spr_type_city.id
						Left JOIN spr_type_street ON reestr_object.address_street_type=spr_type_street.id	
					WHERE reestr_object.e_subobj_obj=".$r_obj_all['id']);
					
				//-------------------------------------------- 	
				
				//запрос ------ на [кл и вл] потребителя по всем объектам  // $arr_klvl массив субабонентов с данными
					$arr_klvl=mysqli_query($link,"  
					SELECT 
						spr_oe_klvl_type.name_short AS KLt,	obj_oe_klvl.name AS KLn, obj_oe_klvl.name_center AS KLnc, obj_oe_klvl.length AS KLl, spr_oe_klvl_volt.name AS KLv, obj_oe_klvl.mark AS KLm						
					FROM `obj_oe_klvl`
						Left JOIN spr_oe_klvl_type ON obj_oe_klvl.type=spr_oe_klvl_type.id
						Left JOIN spr_oe_klvl_volt ON obj_oe_klvl.volt=spr_oe_klvl_volt.id
					WHERE obj_oe_klvl.id_reestr_object=".$r_obj_all['id']);
					
					while ($row = mysqli_fetch_array($arr_klvl, MYSQLI_ASSOC)) {
						array_push($obj_klvl,$row); 	// $obj_klvl двухмерный массив объектов с данными
					}
				//-------------------------------------------- 	
				
				//запрос ------ на [тп и рп] потребителя по всем объектам  // $arr_klvl массив субабонентов с данными
					$arr_trp=mysqli_query($link,"  
					SELECT 				
						obj_oe_trp.name AS TRPn, obj_oe_trp.id_type AS TRPt, obj_oe_trp.power AS TRPp, obj_oe_trp.volt AS TRPv, obj_oe_trp.year_begin AS TRPy
					FROM `obj_oe_trp`
					WHERE obj_oe_trp.id_reestr_object=".$r_obj_all['id']);
					
					while ($row = mysqli_fetch_array($arr_trp, MYSQLI_ASSOC)) {
						array_push($obj_trp,$row); 	// $obj_trp двухмерный массив объектов с данными
					}
				//-------------------------------------------- 	
				
				//запрос ------ на [АИЭ] потребителя по всем объектам  // $arr_klvl массив субабонентов с данными
					$arr_aie=mysqli_query($link,"  
					SELECT 				
						obj_oe_aie.name AS AIEn, obj_oe_aie.type AS AIEt, obj_oe_aie.power AS AIEp, obj_oe_aie.factory AS AIEf, obj_oe_aie.year AS AIEy, obj_oe_aie.date_last AS AIEd, obj_oe_aie.place AS AIEpl
					FROM `obj_oe_aie`
					WHERE obj_oe_aie.id_reestr_object=".$r_obj_all['id']);
					
					while ($row = mysqli_fetch_array($arr_aie, MYSQLI_ASSOC)) {
						array_push($obj_aie,$row); 	// $obj_aie двухмерный массив объектов с данными
					}
				//-------------------------------------------- 	
			}

	}
	
echo "<br> 177 ";	
print_r($obj_n_bd);
echo "<br>";

echo "<br> 201 ";	
print_r($obj_klvl);
echo "<br>";

echo "<br> 180 ";	
while($r_obj_all4 = mysqli_fetch_array($arr_subabon)){				
	echo "<br> arr_subobj_ob 77 ";
	print_r($r_obj_all4);
}
mysqli_data_seek($arr_subabon,0);
echo "<br>";

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xls;

//Создаем экземпляр класса электронной таблицы
	$spreadsheet = new Spreadsheet();
//Получаем текущий активный лист
	$sheet = $spreadsheet->getActiveSheet();
	$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
	$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
	$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
	$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
	
	$sheet->setTitle('УКПЭЭ');
	$sheet->getStyle('A:Z')->getAlignment()->setHorizontal('center');					 	//в стоблцах выравнивание по центру
	$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
	$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
	$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
	$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы
	$sheet->getStyle('A:Z')->getAlignment()->setWrapText(true); // перенос текста для ячейки

//Установка ширины столбца
	$columns = range('A', 'Z');
	for($c=0;$c<=25;$c++) {
		$sheet->getColumnDimension($columns[$c])->setWidth(4);
	}

//---------------------------------------------------------------------------создаем форму карточки ---------------------------------------------------------------------------------------------------------------
	$rn=1; 																							//кол-во пустых строк в таблицах
	$zap="-";																						//данные в пустых строках				
		
	$r=1;																							//ряд
	$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
	$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(16);								// устанавливаем стили шрифта
	//$sheet->getStyle('A1')->applyFromArray(['font' => ['size' => 14, 'bold' => true, ],]); 		// устанавливаем стили
	$sheet->getRowDimension($r)->setRowHeight(20);													//Установка высоты строки
	$sheet->setCellValue('A'.$r, 'УЧЁТНАЯ КАРТОЧКА');												// Записываем в ячейку данные

	$r++;																							
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setSize(16);
	$sheet->getRowDimension($r)->setRowHeight(20);
	$sheet->setCellValue('A'.$r, 'потребителя электрической энергии');
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(50);
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setBold(true);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); //толнкая линия границы
	$sheet->setCellValue('A'.$r, $r_subject['name']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('A'.$r, '(наименование организации, индивидуального предпринимателя)');
	$sheet->getRowDimension($r)->setRowHeight(12);													

	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Место нахождения');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	//---- получение данных
	$r_subject['on_ind']=1;						//добавили в массив значение -- [11] вывод индекса
	$r_subject['on_ct_z']=1;					//добавили в массив значение -- [12] вывод района города
	$address_p=fun_address($r_subject);			//передаем массив в функцию для формирование строки адреса
	//----
	$sheet->setCellValue('G'.$r, $address_p);
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Вышестоящая организация');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['vso']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Форма собственности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['fs']);
	
	$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(государственная (республиканская, коммунальная), частная)');
	$sheet->getRowDimension($r)->setRowHeight(12);

	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Договор с');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['supply_name']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':p'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left'); //('right');
	if ($r_subject['supply_dog_date']==0) {
		$temp_date="___ __________ _____"; 						//если нет даты рисуем форму под неё
		}else{
		$temp_date = explode("-", $r_subject['supply_dog_date']);	
		$temp_date = $temp_date[2].'.'.$temp_date[1].'.'.$temp_date[0]; //переварачиваем дату
	}	
	if ($r_subject['supply_dog_num']==0) {$r_subject['supply_dog_num']="____";}		//если нет номреа рисуем форму под него
	$sheet->setCellValue('A'.$r, 'Заключен от '.$temp_date.'г. №'.$r_subject['supply_dog_num']);
	$sheet->mergeCells('q'.$r.':Z'.$r);
	$sheet->getStyle('q'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->getCell('q'.$r)->getStyle() ->getAlignment() ->setVertical('top');
	$sheet->setCellValue('q'.$r, '(наименование энергоснабжающей организации)');

	$r++;
	$r++;
	$sheet->mergeCells('A'.$r.':f'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'УНП');
	$sheet->mergeCells('G'.$r.':K'.$r);
	$spreadsheet->getActiveSheet()->getStyle('g'.$r.':k'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('g'.$r, $r_subject['unp']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Основной вид деятельности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['activity']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Сменность работы');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['sh_work']);	
	
			$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Руководитель организации');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['ruk_secondname']." ".$r_subject['ruk_lastname']." ".$r_subject['ruk_firstname'].", тел.".$r_subject['ruk_tel']); 
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(фамилия, имя, отчество (при наличии), тел.)');
	$sheet->getRowDimension($r)->setRowHeight(12);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Главный инженер');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['gi_secondname']." ".$r_subject['gi_lastname']." ".$r_subject['gi_firstname'].", тел.".$r_subject['gi_tel']); 
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(фамилия, имя, отчество (при наличии), тел.)');
	$sheet->getRowDimension($r)->setRowHeight(12);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Главный энергетик');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_subject['ge_secondname']." ".$r_subject['ge_lastname']." ".$r_subject['ge_firstname'].", тел.".$r_subject['ge_tel']); 
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(фамилия, имя, отчество (при наличии), тел.)');
	$sheet->getRowDimension($r)->setRowHeight(12);

			$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
		$r++;
	$sheet->mergeCells('a'.$r.':F'.$r);
	$sheet->getCell('a'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('a'.$r, 'Лицо, ответственное за электрохозяйство');
	$sheet->mergeCells('G'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, 'Данные для примера ..... otv_e'.",");
	$sheet->getRowDimension($r)->setRowHeight(30);													//Установка высоты строки
	
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(фамилия, имя, отчество (при наличии), тел.)');
	$sheet->getRowDimension($r)->setRowHeight(12);

		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('right');
	$sheet->setCellValue('A'.$r, 'назначено приказом №');
	$sheet->mergeCells('G'.$r.':I'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':I'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, 555);	
	$sheet->setCellValue('J'.$r, 'от');	
	$sheet->mergeCells('K'.$r.':Q'.$r);
	$spreadsheet->getActiveSheet()->getStyle('K'.$r.':Q'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('K'.$r, $temp_date.'г.,');
	$sheet->mergeCells('R'.$r.':Z'.$r);
	$sheet->setCellValue('R'.$r, 'группа по электробезопасности:');
	
		$r++;
	$sheet->mergeCells('b'.$r.':Y'.$r);
	$spreadsheet->getActiveSheet()->getStyle('b'.$r.':y'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); //толнкая линия границы
	$sheet->setCellValue('b'.$r, "3 группа для электротехнического (администартивно-технического) персонала, подтвердена тогда-то");
	

	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Перечень объектов потребителя электрической энергии:');
	
	//таблица Объектов потребителя------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$sheet->getRowDimension($r+1)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$spreadsheet->getActiveSheet()->getStyle('A'.($r+1).':Z'.($r+1)) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.($r+1));		$sheet->setCellValue('A'.$r, 'Наименование объекта');
	$sheet->mergeCells('H'.$r.':N'.($r+1));		$sheet->setCellValue('H'.$r, 'Место расположения');
	$sheet->mergeCells('O'.$r.':R'.$r);			$sheet->setCellValue('O'.$r, 'Мощность, кВт');
	$sheet->mergeCells('O'.($r+1).':P'.($r+1));	$sheet->setCellValue('O'.($r+1), 'установ- ленная');							$sheet->getStyle('O'.($r+1)) ->getFont() ->setSize(10);
	$sheet->mergeCells('Q'.($r+1).':R'.($r+1));	$sheet->setCellValue('Q'.($r+1), 'расчетная');									$sheet->getStyle('Q'.($r+1)) ->getFont() ->setSize(10);
	$sheet->mergeCells('S'.$r.':U'.($r+1));		$sheet->setCellValue('S'.$r, 'Категорийность по надежности электро- снабжения');	$sheet->getStyle('S'.$r) ->getFont() ->setSize(10);
	$sheet->mergeCells('V'.$r.':Z'.($r+1));		$sheet->setCellValue('V'.$r, 'Профиль работ');
	
	$r++; $r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $n++); $sheet->getStyle('H'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, $n++); $sheet->getStyle('O'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, $n++); $sheet->getStyle('Q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $n++); $sheet->getStyle('S'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $n++); $sheet->getStyle('V'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {
	$r++;														// пустая строка																
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $zap); 
	$sheet->mergeCells('O'.$r.':P'.$r); $sheet->setCellValue('O'.$r, $zap); 
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, $zap); 
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $zap); 
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $zap); 
	}
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	
	//таблица субъектов ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Перечень субабонентов, присоединенных к электрическим сетям:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$sheet->getRowDimension($r+1)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$spreadsheet->getActiveSheet()->getStyle('A'.($r+1).':Z'.($r+1)) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':A'.($r+1));		$sheet->setCellValue('A'.$r, '№ п/п');
	$sheet->mergeCells('B'.$r.':G'.($r+1));		$sheet->setCellValue('B'.$r, 'Наименование субабонента');
	$sheet->mergeCells('H'.$r.':N'.($r+1));		$sheet->setCellValue('H'.$r, 'Место нахождения');
	$sheet->mergeCells('O'.$r.':R'.$r);			$sheet->setCellValue('O'.$r, 'Мощность, кВт');
	$sheet->mergeCells('O'.($r+1).':P'.($r+1));	$sheet->setCellValue('O'.($r+1), 'установ- ленная');							$sheet->getStyle('O'.($r+1)) ->getFont() ->setSize(10);
	$sheet->mergeCells('Q'.($r+1).':R'.($r+1));	$sheet->setCellValue('Q'.($r+1), 'расчетная');									$sheet->getStyle('Q'.($r+1)) ->getFont() ->setSize(10);
	$sheet->mergeCells('S'.$r.':U'.($r+1));		$sheet->setCellValue('S'.$r, 'Категорийность по надежности электро- снабжения');	$sheet->getStyle('S'.$r) ->getFont() ->setSize(10);
	$sheet->mergeCells('V'.$r.':Z'.($r+1));		$sheet->setCellValue('V'.$r, 'Профиль работ');
	
	$r++;
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':A'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('B'.$r.':G'.$r);	$sheet->setCellValue('B'.$r, $n++); $sheet->getStyle('B'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $n++); $sheet->getStyle('H'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, $n++); $sheet->getStyle('O'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, $n++); $sheet->getStyle('Q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $n++); $sheet->getStyle('S'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $n++); $sheet->getStyle('V'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {								//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':A'.$r);	$sheet->setCellValue('A'.$r, $tr); 
	$sheet->mergeCells('B'.$r.':G'.$r);	$sheet->setCellValue('B'.$r, $zap); 
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $zap);
	$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, $zap);
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, $zap);
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $zap);
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	
	$r++; $r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->setCellValue('A'.$r, 'Краткая характеристика электроснабжения потребителя электрической энергии');
	
	$r++; $r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Схемы внешнего и внутреннего электроснабжения (прилагаются к учетной карточке)');
	
	
	
	//таблица электротехнологические установки ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Электротехнологические установки:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(35);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':N'.$r);		$sheet->setCellValue('A'.$r, 'Наименование электротехнологических установок');
	$sheet->mergeCells('O'.$r.':R'.$r);		$sheet->setCellValue('O'.$r, 'Мощность, кВт');
	$sheet->mergeCells('S'.$r.':Z'.$r);		$sheet->setCellValue('s'.$r, 'Категорийность электроустановок по надежности электроснабжения');
	
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':N'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, $n++); $sheet->getStyle('O'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('s'.$r.':Z'.$r);	$sheet->setCellValue('s'.$r, $n++); $sheet->getStyle('s'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {					//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':N'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, $zap);
	$sheet->mergeCells('s'.$r.':Z'.$r);	$sheet->setCellValue('s'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	
	//таблица ВЛ КЛ ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Воздушные и кабельные линии свыше 1000 В и их параметры:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(35);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);		$sheet->setCellValue('A'.$r, 'Тип и номер линии');
	$sheet->mergeCells('H'.$r.':P'.$r);		$sheet->setCellValue('H'.$r, 'Точка подключения');
	$sheet->mergeCells('Q'.$r.':T'.$r);		$sheet->setCellValue('Q'.$r, 'Длина, км');
	$sheet->mergeCells('U'.$r.':Z'.$r);		$sheet->setCellValue('U'.$r, 'Марка провода, кабеля');
	
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('H'.$r.':P'.$r);	$sheet->setCellValue('H'.$r, $n++); $sheet->getStyle('H'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('Q'.$r.':T'.$r);	$sheet->setCellValue('Q'.$r, $n++); $sheet->getStyle('Q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('u'.$r, $n++); $sheet->getStyle('u'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {							//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('H'.$r.':P'.$r);	$sheet->setCellValue('H'.$r, $zap); 
	$sheet->mergeCells('Q'.$r.':T'.$r);	$sheet->setCellValue('Q'.$r, $zap);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	
	//таблица РУ и ТП ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Высоковольтные распределительные устройства (далее - РУ) и трансформаторные подстанции (далее - ТП):');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(35);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);		$sheet->setCellValue('A'.$r, 'Наименование РУ и ТП');
	$sheet->mergeCells('j'.$r.':n'.$r);		$sheet->setCellValue('j'.$r, 'Количество трансформаторов');
	$sheet->mergeCells('o'.$r.':T'.$r);		$sheet->setCellValue('o'.$r, 'Мощность трансформаторов, кВА');
	$sheet->mergeCells('U'.$r.':Z'.$r);		$sheet->setCellValue('U'.$r, 'Напряжение, кВ');
	
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, $n++); $sheet->getStyle('j'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, $n++); $sheet->getStyle('o'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('u'.$r, $n++); $sheet->getStyle('u'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, $zap); 
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, $zap);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	
	//таблица Двигаиели ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Высоковольтные двигатели, в т.ч. синхронные:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(35);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);		$sheet->setCellValue('A'.$r, 'Наименование');
	$sheet->mergeCells('j'.$r.':n'.$r);		$sheet->setCellValue('j'.$r, 'Количество');
	$sheet->mergeCells('o'.$r.':T'.$r);		$sheet->setCellValue('o'.$r, 'Мощность');
	$sheet->mergeCells('U'.$r.':Z'.$r);		$sheet->setCellValue('U'.$r, 'Напряжение, кВ');
	
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, $n++); $sheet->getStyle('j'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, $n++); $sheet->getStyle('o'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('u'.$r, $n++); $sheet->getStyle('u'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {								//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, $zap); 
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, $zap);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	//таблица Электрокотельные и др ------------------------------------------------------------------------------------------------------------------
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Электрокотельные, другое электронагревательное оборудование:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(65);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':E'.$r);		$sheet->setCellValue('A'.$r, 'Тип электронагревателя');
	$sheet->mergeCells('F'.$r.':G'.$r);		$sheet->setCellValue('F'.$r, 'Кол- во');
	$sheet->mergeCells('H'.$r.':k'.$r);		$sheet->setCellValue('H'.$r, 'Назначение');
	$sheet->mergeCells('L'.$r.':M'.$r);		$sheet->setCellValue('L'.$r, 'Суммарная мощность');
	$sheet->mergeCells('N'.$r.':P'.$r);		$sheet->setCellValue('N'.$r, 'Наличие разрешения (дата выдачи)');
	$sheet->mergeCells('Q'.$r.':S'.$r);		$sheet->setCellValue('Q'.$r, 'Режим работы');
	$sheet->mergeCells('T'.$r.':U'.$r);		$sheet->setCellValue('T'.$r, 'Наличие автоматики');
	$sheet->mergeCells('V'.$r.':W'.$r);		$sheet->setCellValue('V'.$r, 'Наличие прибора учета');
	$sheet->mergeCells('X'.$r.':Z'.$r);		$sheet->setCellValue('X'.$r, 'Наличие аккумуляции (емк)');
	
	$r++;	$n=1;											//таблица строка нумерации столбцов						
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':E'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('F'.$r.':G'.$r);	$sheet->setCellValue('F'.$r, $n++); $sheet->getStyle('F'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('H'.$r.':K'.$r);	$sheet->setCellValue('H'.$r, $n++); $sheet->getStyle('H'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('L'.$r.':M'.$r);	$sheet->setCellValue('L'.$r, $n++); $sheet->getStyle('L'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('N'.$r.':P'.$r);	$sheet->setCellValue('N'.$r, $n++); $sheet->getStyle('N'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('Q'.$r.':S'.$r);	$sheet->setCellValue('Q'.$r, $n++); $sheet->getStyle('Q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('T'.$r.':U'.$r);	$sheet->setCellValue('T'.$r, $n++); $sheet->getStyle('T'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('V'.$r.':W'.$r);	$sheet->setCellValue('V'.$r, $n++); $sheet->getStyle('V'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('X'.$r.':Z'.$r);	$sheet->setCellValue('X'.$r, $n++); $sheet->getStyle('X'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {							//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':E'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('F'.$r.':G'.$r);	$sheet->setCellValue('F'.$r, $zap); 
	$sheet->mergeCells('H'.$r.':K'.$r);	$sheet->setCellValue('H'.$r, $zap);
	$sheet->mergeCells('L'.$r.':M'.$r);	$sheet->setCellValue('L'.$r, $zap);
	$sheet->mergeCells('N'.$r.':P'.$r);	$sheet->setCellValue('N'.$r, $zap); 
	$sheet->mergeCells('Q'.$r.':S'.$r);	$sheet->setCellValue('Q'.$r, $zap); 
	$sheet->mergeCells('T'.$r.':U'.$r);	$sheet->setCellValue('T'.$r, $zap);
	$sheet->mergeCells('V'.$r.':W'.$r);	$sheet->setCellValue('V'.$r, $zap);
	$sheet->mergeCells('X'.$r.':Z'.$r);	$sheet->setCellValue('X'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	//таблица компенсирующие устройства ------------------------------------------------------------------------------------------------------------------
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Компенсирующие устройства:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(65);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);		$sheet->setCellValue('A'.$r, 'Наименование устройства');
	$sheet->mergeCells('G'.$r.':J'.$r);		$sheet->setCellValue('G'.$r, 'Напряжение');
	$sheet->mergeCells('K'.$r.':N'.$r);		$sheet->setCellValue('K'.$r, 'Количество');
	$sheet->mergeCells('O'.$r.':R'.$r);		$sheet->setCellValue('O'.$r, 'Суммарная мощность, кВАр');							
	$sheet->mergeCells('S'.$r.':V'.$r);		$sheet->setCellValue('S'.$r, 'Количество с автоматическим регулированием');										
	$sheet->mergeCells('W'.$r.':Z'.$r);		$sheet->setCellValue('W'.$r, 'Максимальное значение автоматически регулируемой мощности, кВАр'); $sheet->getStyle('W'.$r) ->getFont() ->setSize(10);
	
	$r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('G'.$r.':J'.$r);	$sheet->setCellValue('G'.$r, $n++); $sheet->getStyle('G'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('K'.$r.':N'.$r);	$sheet->setCellValue('K'.$r, $n++); $sheet->getStyle('K'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, $n++); $sheet->getStyle('O'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('S'.$r.':V'.$r);	$sheet->setCellValue('S'.$r, $n++); $sheet->getStyle('S'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, $n++); $sheet->getStyle('W'.$r) ->getFont() ->setSize(8);
									
	for($tr=1; $tr<=$rn; $tr++) {								//пустая строка
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('G'.$r.':J'.$r);	$sheet->setCellValue('G'.$r, $zap);
	$sheet->mergeCells('K'.$r.':N'.$r);	$sheet->setCellValue('K'.$r, $zap);
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, $zap);
	$sheet->mergeCells('S'.$r.':V'.$r);	$sheet->setCellValue('S'.$r, $zap);
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	//таблица АИЭ ------------------------------------------------------------------------------------------------------------------
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Автономные источники электроснабжения (АИЭ):');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(35);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);		$sheet->setCellValue('A'.$r, 'Наименование / ТИП');
	$sheet->mergeCells('G'.$r.':H'.$r);		$sheet->setCellValue('G'.$r, 'Кол-во');
	$sheet->mergeCells('I'.$r.':L'.$r);		$sheet->setCellValue('I'.$r, 'Суммарная мощность, кВт');
	$sheet->mergeCells('M'.$r.':Q'.$r);		$sheet->setCellValue('M'.$r, 'Завод-изготовитель');							
	$sheet->mergeCells('R'.$r.':U'.$r);		$sheet->setCellValue('R'.$r, 'Год выпуска / дата последнего тех.обсл.');	$sheet->getStyle('R'.$r) ->getFont() ->setSize(10);									
	$sheet->mergeCells('V'.$r.':Z'.$r);		$sheet->setCellValue('V'.$r, 'Место установки');
	
	$r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('G'.$r.':H'.$r);	$sheet->setCellValue('G'.$r, $n++); $sheet->getStyle('G'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('I'.$r.':L'.$r);	$sheet->setCellValue('I'.$r, $n++); $sheet->getStyle('I'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('M'.$r.':Q'.$r);	$sheet->setCellValue('M'.$r, $n++); $sheet->getStyle('M'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('R'.$r.':U'.$r);	$sheet->setCellValue('R'.$r, $n++); $sheet->getStyle('R'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $n++); $sheet->getStyle('V'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=$rn; $tr++) {								//пустые строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, $zap); 
	$sheet->mergeCells('G'.$r.':H'.$r);	$sheet->setCellValue('G'.$r, $zap);
	$sheet->mergeCells('I'.$r.':L'.$r);	$sheet->setCellValue('I'.$r, $zap);
	$sheet->mergeCells('M'.$r.':Q'.$r);	$sheet->setCellValue('M'.$r, $zap);
	$sheet->mergeCells('R'.$r.':U'.$r);	$sheet->setCellValue('R'.$r, $zap);
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $zap);
	}
	//--------------------------------------------------------------------------------------------------------
	
	$r++; $r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Характеристика средств расчетного учета электрической энергии (индукционные, сумматоры, системы)');
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(40);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('a'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('A'.$r, 'наименование, тип, напряжение, наличие автоматизированной системы контроля и учета электрической энергии (мощности)');
 
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':J'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Наличие релейной защиты - основные типы:');
	$sheet->mergeCells('K'.$r.':Z'.$r);
	$sheet->getStyle('K'.$r) ->getFont() ->setUnderline(true);
	$sheet->getCell('K'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('K'.$r, 'нет/есть тип');
	
	$r++;
	$sheet->mergeCells('A'.$r.':J'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Наличие АВР (количество, напряжение):');
	$sheet->mergeCells('K'.$r.':Z'.$r);
	$sheet->getStyle('K'.$r) ->getFont() ->setUnderline(true);
	$sheet->getCell('K'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('K'.$r, 'нет/есть 5646465');
	

	$r++;
	$sheet->mergeCells('A'.$r.':C'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'По акту от');
	$sheet->mergeCells('D'.$r.':r'.$r);
	$spreadsheet->getActiveSheet()->getStyle('D'.$r.':r'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->getCell('d'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('d'.$r, $temp_date.'г.');
	
	$r++;
	$sheet->mergeCells('A'.$r.':N'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'аварийная броня электроснабжения общей мощностью (кВт)');
	$sheet->mergeCells('O'.$r.':R'.$r);
	$spreadsheet->getActiveSheet()->getStyle('O'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->getCell('O'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('O'.$r, '5646465'.';');
	
	$r++;
	$sheet->mergeCells('A'.$r.':O'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'технологическая броня электроснабжения общей мощностью (кВт)');
	$sheet->mergeCells('p'.$r.':R'.$r);
	$spreadsheet->getActiveSheet()->getStyle('p'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('p'.$r, '5646465');
	$sheet->mergeCells('S'.$r.':u'.$r);
	$sheet->setCellValue('s'.$r, ', время (ч)');
	$sheet->mergeCells('v'.$r.':w'.$r);
	$spreadsheet->getActiveSheet()->getStyle('v'.$r.':w'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('v'.$r, '25');
	$sheet->getCell('x'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('x'.$r, '.');
	
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Наличие случаев аварий в работе объектов энергетического хозяйства:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);		$sheet->setCellValue('A'.$r, 'Год'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->mergeCells('G'.$r.':H'.$r);		$sheet->setCellValue('G'.$r, '');
	$sheet->mergeCells('I'.$r.':J'.$r);		$sheet->setCellValue('I'.$r, '');
	$sheet->mergeCells('k'.$r.':l'.$r);		$sheet->setCellValue('k'.$r, '');							
	$sheet->mergeCells('M'.$r.':N'.$r);		$sheet->setCellValue('m'.$r, '');										
	$sheet->mergeCells('o'.$r.':p'.$r);		$sheet->setCellValue('o'.$r, '');
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	
		$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);		$sheet->setCellValue('A'.$r, 'Количество аварий'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->mergeCells('G'.$r.':H'.$r);		$sheet->setCellValue('G'.$r, '');
	$sheet->mergeCells('I'.$r.':J'.$r);		$sheet->setCellValue('I'.$r, '');
	$sheet->mergeCells('k'.$r.':l'.$r);		$sheet->setCellValue('k'.$r, '');							
	$sheet->mergeCells('M'.$r.':N'.$r);		$sheet->setCellValue('m'.$r, '');										
	$sheet->mergeCells('o'.$r.':p'.$r);		$sheet->setCellValue('o'.$r, '');
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	//--------------------------------------------------------------------------------------------------------
	
	$r++; $r++;
	$sheet->getRowDimension($r)->setRowHeight(65);	
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->setCellValue('A'.$r, 'Наличие несчастных случаев со смертельным исходом, связанных с эксплуатацией электроустановок, если этот случай произошел на электроустановках и вызван воздействием электрического тока, электрической дуги, наведенных зарядов, молнии, иными факторами (травмирование вращающимися механизмом, падение с высоты, термический ожог и др.), если им предшествовал электроудар, происшедших по вине нанимателя:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':p'.$r);		$sheet->setCellValue('A'.$r, 'Год'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');										
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	
		$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':p'.$r);		$sheet->setCellValue('A'.$r, 'Количество несчастных случаев со смертельным исходом,
	происшедших по вине нанимателя'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');									
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	//--------------------------------------------------------------------------------------------------------
	
	$r++; $r++;
	$sheet->getRowDimension($r)->setRowHeight(50);	
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->setCellValue('A'.$r, 'Наличие фактов нарушения требований законодательства в сфере энергетики, контроль за соблюдением которых осуществляет орган Госэнергогазнадзора в соответствии с Положением о государственном энергетическом и газовом надзоре, утвержденным постановлением Совета Министров Республики Беларусь от 29 марта 2019г. №213:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':p'.$r);		$sheet->setCellValue('A'.$r, 'Год'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');										
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	
	$r++;														
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':p'.$r);		$sheet->setCellValue('A'.$r, 'Количество нфактов нарушения актов законодательства в сфере энергетики, требования которых нарушены'); 	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');									
	$sheet->mergeCells('q'.$r.':r'.$r);		$sheet->setCellValue('q'.$r, '');
	$sheet->mergeCells('s'.$r.':t'.$r);		$sheet->setCellValue('s'.$r, '');							
	$sheet->mergeCells('U'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, '');										
	$sheet->mergeCells('w'.$r.':x'.$r);		$sheet->setCellValue('w'.$r, '');
	$sheet->mergeCells('Y'.$r.':Z'.$r);		$sheet->setCellValue('y'.$r, '');
	//--------------------------------------------------------------------------------------------------------
	
	$r++;	$r++;
	$sheet->mergeCells('A'.$r.':H'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Дата составления учетной карточки ');
	$sheet->mergeCells('J'.$r.':p'.$r);
	$spreadsheet->getActiveSheet()->getStyle('j'.$r.':p'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('j'.$r, $temp_date.'г.');
		
	$r++;
	$sheet->mergeCells('A'.$r.':H'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Изменения внесены по состоянию на ');
	$sheet->mergeCells('J'.$r.':p'.$r);
	$spreadsheet->getActiveSheet()->getStyle('j'.$r.':p'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('j'.$r, $temp_date.'г.');
	
	$r++;	$r++;
	$sheet->mergeCells('A'.$r.':H'.$r);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':h'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('A'.$r, 'Инженер'); 
	$sheet->mergeCells('k'.$r.':p'.$r);
	$spreadsheet->getActiveSheet()->getStyle('k'.$r.':p'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('k'.$r, '');
	$sheet->mergeCells('r'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('r'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('r'.$r, 'А.С. Иванов');
	
	$r++;
	$sheet->getRowDimension($r)->setRowHeight(12);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->mergeCells('A'.$r.':H'.$r); 
	$sheet->setCellValue('A'.$r, '(должность лица, заполнившего карточку)'); 
	$sheet->mergeCells('k'.$r.':p'.$r);
	$sheet->setCellValue('k'.$r, '(подпись)');
	$sheet->mergeCells('r'.$r.':z'.$r);
	$sheet->setCellValue('r'.$r, '(инициалы, фамилия)');
	
	
	
//------------------------------------------- наполнение таблиц ------------------------------------------------------------------------------------------------------------------
	
//таблица Объектов потребителя ------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=34;												//стартовая строка по пустой форме
	$r_add=0;													//количество добавленных строк
	$r=$start_r+$r_add;	
	for($tr=0; $tr<=(mysqli_num_rows($arr_obj_all)-1); $tr++) {
	//объект
		$name=$obj_n_bd[$tr]['name'];
	// обработка адреса
		$obj_n_bd [$tr]['on_ind']=0;								//добавили в массив значение -- [11] вывод индекса
		$obj_n_bd [$tr]['on_ct_z']=1;								//добавили в массив значение -- [12] вывод района города
		$address_ob="-";
		$address_ob=fun_address($obj_n_bd[$tr]);
	// обработка для надежности электроснабжения и мощности
		$ss=$obj_n_bd[$tr] ['ec1']+$obj_n_bd [$tr]['ec2']+$obj_n_bd [$tr]['ec3']; if ($ss==0) {$ss="-";}
		$cat="-";
		if ($obj_n_bd [$tr]['ec3']>0) {$cat="III";};
		if ($obj_n_bd [$tr]['ec2']>0) {$cat="II";};
		if ($obj_n_bd [$tr]['ec1']>0) {$cat="I";};
		if ($obj_n_bd [$tr]['ec1p']>0) {$cat="I особая";};
		
	// заполнение строки-------------------------------------------- 			
											
		if ($i!=0){$spreadsheet->getActiveSheet()->insertNewRowBefore($r, 1);$r_add=$r_add+1;} 		// добавление строки и счетчик количества добавленных строк	
		$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $name); $sheet->getStyle('A'.$r) ->getFont() ->setSize(10);
		$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $address_ob); $sheet->getStyle('H'.$r) ->getFont() ->setSize(10);
		$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, $ss);
		$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, '-');
		$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $cat);
		$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $r_subject['activity']); $sheet->getStyle('V'.$r) ->getFont() ->setSize(10);
		
		$kh=max(mb_strlen($name,'utf-8'),mb_strlen($address_ob,'utf-8'),mb_strlen($r_subject['activity'],'utf-8'))/20; //коэф. высоты строки
		if ($kh<1){$kh=2.3;}	//коэф для коротких значений
		$sheet->getRowDimension($r)->setRowHeight(15*$kh);
		$r=$r+1;	
		$i=$i+1;			
	}



//таблица субабонентов ------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=40;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
	while($obj_row = mysqli_fetch_array($arr_subabon)){				
	//субабонент: потребитель и объект	
		$name=$obj_row['Pname'].",\n".$obj_row['name'];
	// обработка адреса
		$obj_row ['on_ind']=0;								//добавили в массив значение -- [11] вывод индекса
		$obj_row ['on_ct_z']=1;								//добавили в массив значение -- [12] вывод района города
		$address_ob="-";
		$address_ob=fun_address($obj_row);
	// обработка для надежности электроснабжения и мощности
		$ss=$obj_row['ec1']+$obj_row ['ec2']+$obj_row ['ec3']; if ($ss==0) {$ss="-";}
		$cat="-";
		if ($obj_row ['ec3']>0) {$cat="III";};
		if ($obj_row ['ec2']>0) {$cat="II";};
		if ($obj_row ['ec1']>0) {$cat="I";};
		if ($obj_row ['ec1p']>0) {$cat="I особая";};
	// заполнение строки-------------------------------------------- 			
			
		if ($i!=0){$spreadsheet->getActiveSheet()->insertNewRowBefore($r, 1);$r_add=$r_add+1;} 		// добавление строки и счетчик количества добавленных строк	
		$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
		$sheet->mergeCells('A'.$r.':A'.$r);	$sheet->setCellValue('A'.$r, $i+1); 
		$sheet->mergeCells('B'.$r.':G'.$r);	$sheet->setCellValue('B'.$r, $name);	$sheet->getStyle('B'.$r) ->getFont() ->setSize(10);
		$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, $address_ob); $sheet->getStyle('H'.$r) ->getFont() ->setSize(10);
		$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, $ss);
		$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, $zap);
		$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, $cat);
		$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $zap);
		
		$kh=max(mb_strlen($name,'utf-8'),mb_strlen($address_ob,'utf-8'))/20; //коэф. высоты строки
		if ($kh<1){$kh=2.3;}	//коэф для коротких значений
		$sheet->getRowDimension($r)->setRowHeight(15*$kh);
		$r=$r+1;
		$i=$i+1;	
	}

	//--------------------------------------------------------------------------------------------------------

//таблица ВЛ КЛ объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=54;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
	for($tr=0; $tr<count($obj_klvl); $tr++) {
		if ($obj_klvl[$tr]['KLv']>=1){								// проверка свыше 1000В
		// заполнение строки-------------------------------------------- 			
				
			if ($i!=0){$spreadsheet->getActiveSheet()->insertNewRowBefore($r, 1);$r_add=$r_add+1;} 		// добавление строки и счетчик количества добавленных строк	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, $obj_klvl[$tr]['KLt'].": ".$obj_klvl[$tr]['KLv']."кВ, ".$obj_klvl[$tr]['KLn']); 
			$sheet->mergeCells('H'.$r.':P'.$r);	$sheet->setCellValue('H'.$r, $obj_klvl[$tr]['KLnc']); 
			$sheet->mergeCells('Q'.$r.':T'.$r);	$sheet->setCellValue('Q'.$r, $obj_klvl[$tr]['KLl']);
			$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, $obj_klvl[$tr]['KLm']);
		
			$kh=max(mb_strlen($obj_klvl[$tr]['KLt'].": ".$obj_klvl[$tr]['KLn'],'utf-8'),mb_strlen($obj_klvl[$tr]['KLnc'],'utf-8'))/20; //коэф. высоты строки
			if ($kh<1){$kh=2.3;} //коэф для коротких значений
			$sheet->getRowDimension($r)->setRowHeight(15*$kh);			
			$r=$r+1;
			$i=$i+1;		
		}	
	}
	
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	


//таблица ТП РП объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=59;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
	for($tr=0; $tr<count($obj_trp); $tr++) {
		// заполнение строки-------------------------------------------- 			
				
			if ($i!=0){$spreadsheet->getActiveSheet()->insertNewRowBefore($r, 1);$r_add=$r_add+1;} 		// добавление строки и счетчик количества добавленных строк	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, $obj_trp[$tr]['TRPn'].", ".$obj_trp[$tr]['TRPt'].", ".$obj_trp[$tr]['TRPy']); 
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, 1); 
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, $obj_trp[$tr]['TRPp']);
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, $obj_trp[$tr]['TRPv']);
	
			$kh=max(mb_strlen($obj_trp[$tr]['TRPn'].", ".$obj_trp[$tr]['TRPt'].", ".$obj_trp[$tr]['TRPy'],'utf-8'),mb_strlen($obj_trp[$tr]['TRPp'],'utf-8'))/20; //коэф. высоты строки
			if ($kh<1){$kh=2.3;} //коэф для коротких значений
			$sheet->getRowDimension($r)->setRowHeight(15*$kh);			
			$r=$r+1;
			$i=$i+1;		
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	

//таблица Высоковольтные двигатели объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=64;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//таблица Электрокотельни объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=69;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//таблица Компенсирующие устройства объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=74;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//таблица АИЭ объектов------------------------------------------------------------------------------------------------------------------
	$i=0;														//счетчик первого прохода и добавленных строк
	$start_r=79;												//стартовая строка по пустой форме
	$r=$start_r+$r_add;
	for($tr=0; $tr<count($obj_aie); $tr++) {
		// заполнение строки-------------------------------------------- 			
				
			if ($i!=0){$spreadsheet->getActiveSheet()->insertNewRowBefore($r, 1);$r_add=$r_add+1;} 		// добавление строки и счетчик количества добавленных строк	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, $obj_aie[$tr]['AIEn']." /".$obj_aie[$tr]['AIEt']); 
			$sheet->mergeCells('G'.$r.':H'.$r);	$sheet->setCellValue('G'.$r, 1);
			$sheet->mergeCells('I'.$r.':L'.$r);	$sheet->setCellValue('I'.$r, $obj_aie[$tr]['AIEp']);
			$sheet->mergeCells('M'.$r.':Q'.$r);	$sheet->setCellValue('M'.$r, $obj_aie[$tr]['AIEf']);
			$sheet->mergeCells('R'.$r.':U'.$r);	$sheet->setCellValue('R'.$r, $obj_aie[$tr]['AIEy']." /".$obj_aie[$tr]['AIEd']);
			$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, $obj_aie[$tr]['AIEpl']);
	
			$kh=max(mb_strlen($obj_aie[$tr]['AIEn'].", ".$obj_aie[$tr]['AIEt'].", ".$obj_aie[$tr]['AIEy'],'utf-8'),mb_strlen($obj_aie[$tr]['AIEp'],'utf-8'))/20; //коэф. высоты строки
			if ($kh<1){$kh=2.3;} //коэф для коротких значений
			$sheet->getRowDimension($r)->setRowHeight(15*$kh);			
			$r=$r+1;
			$i=$i+1;		
	}
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------	


$writer = new Xls($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения. 
//Прописываем полный путь до папки и указываем имя файла
$writer->save('UKPEE.xls');

echo "OK";
?>