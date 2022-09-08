<?php
$sub_id=95;

//подключаем
	require '../PhpSpreadsheet/vendor/autoload.php';
	include $_SERVER['DOCUMENT_ROOT']."/function/fun_address.php"; // $_SERVER['DOCUMENT_ROOT'] - указывает корневую директорию сайта

//Устанавливаем доступы к базе данных:
	$host = 'localhost'; 	//имя хоста, на локальном компьютере это localhost
	$user = 'root'; 		//имя пользователя, по умолчанию это root
	$password = ''; 		//пароль, по умолчанию пустой
	$db_name = 'gegn'; 		//имя базы данных


//Соединяемся с базой данных используя наши доступы:
	$link=mysqli_connect($host, $user, $password, $db_name); //or die("Не могу соединиться с MySQL.");


//запрос на адрес в потребителей
	$arr_adr=mysqli_query($link,"
		SELECT 
	reestr_subject.place_address_index,	
    spr_region.name AS Rgn, 	  
    spr_district.name AS Dst, 
	spr_city.name AS Ct,	
    spr_city_zone.name AS Ctz,
	reestr_subject.place_address_street, 	
    reestr_subject.place_address_building, 	
    reestr_subject.place_address_flat

	FROM `reestr_subject`
		JOIN spr_region ON reestr_subject.place_address_region=spr_region.id
		JOIN spr_district ON reestr_subject.place_address_district=spr_district.id
		JOIN spr_city ON reestr_subject.place_address_city=spr_city.id
		JOIN spr_city_zone ON reestr_subject.place_address_city_zone=spr_city_zone.id

	WHERE reestr_subject.id=".$sub_id); 
	$adr = mysqli_fetch_array($arr_adr);											
			
	$address_p=fun_address($adr);
	//print_r($address_p);
	
//запрос оновные данные в потребителей
	$arr_sub=mysqli_query($link,"
	SELECT reestr_subject.name,
	reestr_unp.name AS vso,
	reestr_unp.unp AS unp,
	spr_type_property.name AS fs,
	supply_name, supply_dog_date, supply_dog_num,
	type_activity, shift_work,
	ruk_firstname, ruk_secondname, ruk_lastname, ruk_tel, gi_firstname, gi_secondname, gi_lastname, gi_tel, ge_firstname, ge_secondname, ge_lastname, ge_tel	
	FROM `reestr_subject`
		JOIN reestr_unp ON reestr_subject.id_unp=reestr_unp.id	
		JOIN spr_type_property ON reestr_subject.type_property=spr_type_property.id
	WHERE reestr_subject.id=".$sub_id); 
	$r_sub = mysqli_fetch_array($arr_sub);

//запрос в потребителей объекты
	$arr_obj=mysqli_query($link,"
	SELECT reestr_object.name
	FROM `reestr_object`
	WHERE reestr_object.id_reestr_subject=".$sub_id); 
	//print_r($arr_obj);
	

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
	
	$sheet->setTitle('УКТИ');
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
	$sheet->setCellValue('A'.$r, 'теплоисточника');
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(50);
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setBold(true);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); //толнкая линия границы
	$sheet->setCellValue('A'.$r, $r_sub['name']);
	
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
	$sheet->setCellValue('G'.$r, $address_p);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Вышестоящая организация');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['vso']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Форма собственности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['fs']);
	
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
	$sheet->setCellValue('G'.$r, $r_sub['supply_name']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':p'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left'); //('right');
	if ($r_sub['supply_dog_date']==0) {
		$temp_date="___ __________ _____"; 						//если нет даты рисуем форму под неё
		}else{
		$temp_date = explode("-", $r_sub['supply_dog_date']);	
		$temp_date = $temp_date[2].'.'.$temp_date[1].'.'.$temp_date[0]; //переварачиваем дату
	}	
	if ($r_sub['supply_dog_num']==0) {$r_sub['supply_dog_num']="____";}		//если нет номреа рисуем форму под него
	$sheet->setCellValue('A'.$r, 'Заключен от '.$temp_date.'г. №'.$r_sub['supply_dog_num']);
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
	$sheet->setCellValue('g'.$r, $r_sub['unp']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Основной вид деятельности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['type_activity']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Сменность работы');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['shift_work']);	
	
			$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Руководитель организации');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['ruk_secondname']." ".$r_sub['ruk_lastname']." ".$r_sub['ruk_firstname'].", тел.".$r_sub['ruk_tel']); 
	
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
	$sheet->setCellValue('G'.$r, $r_sub['gi_secondname']." ".$r_sub['gi_lastname']." ".$r_sub['gi_firstname'].", тел.".$r_sub['gi_tel']); 
	
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
	$sheet->setCellValue('G'.$r, $r_sub['ge_secondname']." ".$r_sub['ge_lastname']." ".$r_sub['ge_firstname'].", тел.".$r_sub['ge_tel']); 
	
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
	$sheet->setCellValue('a'.$r, 'Лицо, ответственное за тепловое хозяйство');
	$sheet->mergeCells('G'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, 'otv_t'." тел.:56-56-54".",");
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
	$sheet->setCellValue('K'.$r, $temp_date.'г.');
	
	$r++;$r++;
	$sheet->mergeCells('a'.$r.':F'.$r);
	$sheet->getCell('a'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('a'.$r, 'Лицо, ответственное за тепловое хозяйство теплоисточника');
	$sheet->mergeCells('G'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, 'otv_ti'." тел.:56-56-54".",");
	$sheet->getRowDimension($r)->setRowHeight(45);													//Установка высоты строки
	
	
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
	$sheet->setCellValue('K'.$r, $temp_date.'г.');
 
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':h'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Установленная мощность');
	$sheet->mergeCells('I'.$r.':k'.$r);
	$spreadsheet->getActiveSheet()->getStyle('i'.$r.':k'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('i'.$r, '5466');
	$sheet->mergeCells('l'.$r.':m'.$r);
	$sheet->getCell('l'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('l'.$r, ' Гкал/ч;');
	$sheet->mergeCells('n'.$r.':p'.$r);
	$spreadsheet->getActiveSheet()->getStyle('n'.$r.':p'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('n'.$r, '6345866');
	$sheet->mergeCells('q'.$r.':r'.$r);
	$sheet->getCell('q'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('q'.$r, ' т/ч;');
	
	$r++;
	$sheet->mergeCells('A'.$r.':h'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Подключенная нагрузка');
	$sheet->mergeCells('I'.$r.':k'.$r);
	$spreadsheet->getActiveSheet()->getStyle('i'.$r.':k'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('i'.$r, '5466');
	$sheet->mergeCells('l'.$r.':m'.$r);
	$sheet->getCell('l'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('l'.$r, ' Гкал/ч;');
	$sheet->mergeCells('n'.$r.':p'.$r);
	$spreadsheet->getActiveSheet()->getStyle('n'.$r.':p'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->setCellValue('n'.$r, '6345866');
	$sheet->mergeCells('q'.$r.':r'.$r);
	$sheet->getCell('q'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('q'.$r, ' т/ч;');
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Тип котлов и количество');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['ruk_secondname']." ".$r_sub['ruk_lastname']." ".$r_sub['ruk_firstname'].", тел.".$r_sub['ruk_tel']); 
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Тип теплоисточника');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $r_sub['ruk_secondname']." ".$r_sub['ruk_lastname']." ".$r_sub['ruk_firstname'].", тел.".$r_sub['ruk_tel']); 
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(производственный, производственно-отопительный, отопительный)');
	$sheet->getRowDimension($r)->setRowHeight(12);
	
	$r++;
	$sheet->mergeCells('A'.$r.':c'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Топливо');
	$sheet->mergeCells('d'.$r.':k'.$r);
	$spreadsheet->getActiveSheet()->getStyle('d'.$r.':k'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('d'.$r, 'ytjfytj'); 
	$sheet->mergeCells('l'.$r.':n'.$r);
	$sheet->setCellValue('l'.$r, 'рабочее;');
	$sheet->mergeCells('o'.$r.':w'.$r);
	$spreadsheet->getActiveSheet()->getStyle('o'.$r.':w'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('o'.$r, 'ллллллллл'); 
	$sheet->mergeCells('x'.$r.':z'.$r);
	$sheet->setCellValue('x'.$r, 'резервное.');
	
	$r++;
	$sheet->mergeCells('A'.$r.':p'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Состояние системы топливоподачи и сжигания резервного топлива');
	$sheet->mergeCells('q'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('q'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('q'.$r, '6345866');	
	
	
	
	
		$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Основное оборудование');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(45);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);		$sheet->setCellValue('A'.$r, '№ п/п');
	$sheet->mergeCells('c'.$r.':j'.$r);		$sheet->setCellValue('c'.$r, 'Оборудование (указывать рабочее или резервное)');
	$sheet->mergeCells('k'.$r.':m'.$r);		$sheet->setCellValue('k'.$r, 'Тип');
	$sheet->mergeCells('n'.$r.':p'.$r);		$sheet->setCellValue('n'.$r, 'Теплоноситель');	 $sheet->getStyle('n'.$r) ->getFont() ->setSize(10);						
	$sheet->mergeCells('q'.$r.':t'.$r);		$sheet->setCellValue('q'.$r, 'Мощность');
	$sheet->mergeCells('u'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, 'Шт.');	
	$sheet->mergeCells('W'.$r.':Z'.$r);		$sheet->setCellValue('W'.$r, 'Примечание'); 
	
	$r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('c'.$r.':j'.$r);	$sheet->setCellValue('c'.$r, $n++); $sheet->getStyle('c'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('k'.$r.':m'.$r);	$sheet->setCellValue('k'.$r, $n++); $sheet->getStyle('k'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('n'.$r.':p'.$r);	$sheet->setCellValue('n'.$r, $n++); $sheet->getStyle('n'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('q'.$r.':t'.$r);	$sheet->setCellValue('q'.$r, $n++); $sheet->getStyle('q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('u'.$r.':V'.$r);	$sheet->setCellValue('u'.$r, $n++); $sheet->getStyle('u'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, $n++); $sheet->getStyle('W'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('c'.$r.':j'.$r);	$sheet->setCellValue('c'.$r, '2');
	$sheet->mergeCells('k'.$r.':m'.$r);	$sheet->setCellValue('k'.$r, '3');
	$sheet->mergeCells('n'.$r.':p'.$r);	$sheet->setCellValue('n'.$r, '4');
	$sheet->mergeCells('q'.$r.':t'.$r);	$sheet->setCellValue('q'.$r, '5');
	$sheet->mergeCells('u'.$r.':V'.$r);	$sheet->setCellValue('u'.$r, '5');
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------	
	
			$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Вспомогательное оборудование');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(45);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);		$sheet->setCellValue('A'.$r, '№ п/п');
	$sheet->mergeCells('c'.$r.':j'.$r);		$sheet->setCellValue('c'.$r, 'Оборудование (указывать рабочее или резервное)');
	$sheet->mergeCells('k'.$r.':m'.$r);		$sheet->setCellValue('k'.$r, 'Тип');
	$sheet->mergeCells('n'.$r.':t'.$r);		$sheet->setCellValue('n'.$r, 'Технические характеристики');	 						
	$sheet->mergeCells('u'.$r.':V'.$r);		$sheet->setCellValue('u'.$r, 'Шт.');	
	$sheet->mergeCells('W'.$r.':Z'.$r);		$sheet->setCellValue('W'.$r, 'Примечание'); 
	
	$r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('c'.$r.':j'.$r);	$sheet->setCellValue('c'.$r, $n++); $sheet->getStyle('c'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('k'.$r.':m'.$r);	$sheet->setCellValue('k'.$r, $n++); $sheet->getStyle('k'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('n'.$r.':t'.$r);	$sheet->setCellValue('n'.$r, $n++); $sheet->getStyle('n'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('u'.$r.':V'.$r);	$sheet->setCellValue('u'.$r, $n++); $sheet->getStyle('u'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, $n++); $sheet->getStyle('W'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('c'.$r.':j'.$r);	$sheet->setCellValue('c'.$r, '2');
	$sheet->mergeCells('k'.$r.':m'.$r);	$sheet->setCellValue('k'.$r, '3');
	$sheet->mergeCells('n'.$r.':t'.$r);	$sheet->setCellValue('n'.$r, '4');
	$sheet->mergeCells('u'.$r.':V'.$r);	$sheet->setCellValue('u'.$r, '5');
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------	
	
		$r++;	$r++;
	$sheet->mergeCells('a'.$r.':F'.$r);
	$sheet->getCell('a'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('a'.$r, 'Характеристика приборов учета тепловой энергии');
	$sheet->mergeCells('G'.$r.':z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, '1.установлен в ИТП (СКМ-2, Ду-32), 2.установлен в ИТП (СКМ-2, Ду-32)');
	$sheet->getRowDimension($r)->setRowHeight(50);													//Установка высоты строки
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(объем учета, типы, диаметры, места установки))');
	$sheet->getRowDimension($r)->setRowHeight(12);
	
		$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Потребители тепловой энергии');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(45);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);		$sheet->setCellValue('A'.$r, '№ п/п');
	$sheet->mergeCells('c'.$r.':h'.$r);		$sheet->setCellValue('c'.$r, 'Перечень объектов');
	$sheet->mergeCells('i'.$r.':m'.$r);		$sheet->setCellValue('i'.$r, 'Место нахождения');
	$sheet->mergeCells('n'.$r.':p'.$r);		$sheet->setCellValue('n'.$r, 'Категория надежности по теплоснабжению.');	$sheet->getStyle('n'.$r) ->getFont() ->setSize(8);						
	$sheet->mergeCells('q'.$r.':V'.$r);		$sheet->setCellValue('q'.$r, '№ договора');										
	$sheet->mergeCells('W'.$r.':Z'.$r);		$sheet->setCellValue('W'.$r, 'Нагрузка'); 
	
	$r++; $n=1;											//таблица строка нумерации столбцов		
	$sheet->getRowDimension($r)->setRowHeight(10);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, $n++); $sheet->getStyle('A'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('c'.$r.':h'.$r);	$sheet->setCellValue('c'.$r, $n++); $sheet->getStyle('c'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('i'.$r.':m'.$r);	$sheet->setCellValue('i'.$r, $n++); $sheet->getStyle('i'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('n'.$r.':p'.$r);	$sheet->setCellValue('n'.$r, $n++); $sheet->getStyle('n'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('q'.$r.':V'.$r);	$sheet->setCellValue('q'.$r, $n++); $sheet->getStyle('q'.$r) ->getFont() ->setSize(8);
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, $n++); $sheet->getStyle('W'.$r) ->getFont() ->setSize(8);
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(35);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':b'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('c'.$r.':h'.$r);	$sheet->setCellValue('c'.$r, '2');
	$sheet->mergeCells('i'.$r.':m'.$r);	$sheet->setCellValue('i'.$r, '3');
	$sheet->mergeCells('n'.$r.':p'.$r);	$sheet->setCellValue('n'.$r, '4');
	$sheet->mergeCells('q'.$r.':V'.$r);	$sheet->setCellValue('q'.$r, '5');
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------	

	
	
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
	$sheet->getRowDimension($r)->setRowHeight(40);	
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->setCellValue('A'.$r, 'Наличие несчастных случаев со смертельным исходом, связанных с эксплуатацией теплоустановок, если этот случай произошел на теплоустановках и вызван воздействием теплоносителя, происшедших по вине нанимателя:');
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
	
	
	
$writer = new Xls($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения. 
//Прописываем полный путь до папки и указываем имя файла
$writer->save('UKTI.xls');

echo "OK";
?>