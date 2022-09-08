<?php
$sub_id=95;

//подключаем
	require '../PhpSpreadsheet/vendor/autoload.php';

//Устанавливаем доступы к базе данных:
	$host = 'localhost'; 	//имя хоста, на локальном компьютере это localhost
	$user = 'root'; 		//имя пользователя, по умолчанию это root
	$password = ''; 		//пароль, по умолчанию пустой
	$db_name = 'gegn'; 		//имя базы данных


//Соединяемся с базой данных используя наши доступы:
	$link=mysqli_connect($host, $user, $password, $db_name); //or die("Не могу соединиться с MySQL.");


//запрос
	$arr_sub=mysqli_query($link,"
	SELECT reestr_subject.name, reestr_subject.supply_name, reestr_subject.supply_dog_num, reestr_subject.supply_dog_date
	FROM `reestr_subject`
	WHERE reestr_subject.id=".$sub_id); 
	$row = mysqli_fetch_array($arr_sub);											
	

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xls;

//Создаем экземпляр класса электронной таблицы
	$spreadsheet = new Spreadsheet();
//Получаем текущий активный лист
	$sheet = $spreadsheet->getActiveSheet();
	$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
	$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(4);		//разместить страницах в высоту
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

	$r=1;																							//ряд
	$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
	$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(14);								// устанавливаем стили шрифта
	//$sheet->getStyle('A1')->applyFromArray(['font' => ['size' => 14, 'bold' => true, ],]); 		// устанавливаем стили
	$sheet->getRowDimension($r)->setRowHeight(18);													//Установка высоты строки
	$sheet->setCellValue('A'.$r, 'УЧЁТНАЯ КАРТОЧКА');												// Записываем в ячейку данные

	$r++;																							
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setSize(14);
	$sheet->getRowDimension($r)->setRowHeight(18);
	$sheet->setCellValue('A'.$r, 'потребителя электрической энергии');
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(50);
	
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getStyle('A'.$r) ->getFont() ->setBold(true);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); //толнкая линия границы
	$sheet->setCellValue('A'.$r, $row['name']);
	
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
	$sheet->setCellValue('G'.$r, $row['name']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Вышестоящая организация');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name']);
	
	$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Форма собственности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name']);
	
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
	$sheet->setCellValue('G'.$r, $row['name']);
	
	$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(наименование энергоснабжающей организации)');
	$sheet->getRowDimension($r)->setRowHeight(12);

	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$temp_date = explode("-", $row['supply_dog_date']);
	$temp_date = $temp_date[2].'.'.$temp_date[1].'.'.$temp_date[0];
	$sheet->setCellValue('A'.$r, 'Заключен от '.$temp_date.'г. №'.$row['supply_dog_num']);

	$r++;
	$sheet->mergeCells('A'.$r.':B'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'УНП');
	$sheet->mergeCells('C'.$r.':h'.$r);
	$spreadsheet->getActiveSheet()->getStyle('C'.$r.':h'.$r) ->getBorders() ->getBottom() 	->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$spreadsheet->getActiveSheet()->getStyle('C'.$r.':h'.$r) ->getBorders() ->getTop()  	->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$spreadsheet->getActiveSheet()->getStyle('C'.$r.':h'.$r) ->getBorders() ->getLeft() 	->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$spreadsheet->getActiveSheet()->getStyle('C'.$r.':h'.$r) ->getBorders() ->getRight() 	->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('C'.$r, 30000000);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Основной вид деятельности');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name']);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Сменность работы');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name']);	
	
			$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Руководитель организации');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name']);
	
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
	$sheet->setCellValue('G'.$r, $row['name']);
	
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
	$sheet->setCellValue('G'.$r, $row['name']);
	
		$r++;
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$sheet->getStyle('G'.$r) ->getFont() ->setItalic(true) ->setSize(9);
	$sheet->setCellValue('G'.$r, '(фамилия, имя, отчество (при наличии), тел.)');
	$sheet->getRowDimension($r)->setRowHeight(12);

			$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getRowDimension($r)->setRowHeight(20);
	
		$r++;
	$sheet->mergeCells('A'.$r.':F'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Лицо, ответственное за электрохозяйство');
	$sheet->mergeCells('G'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('G'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $row['name'].",");
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
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); //толнкая линия границы
	$sheet->setCellValue('A'.$r, $row['name']);
	
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Перечень объектов потребителя электрической энергии:');
	
	//таблица ------------------------------------------------------------------------------------------------------------------
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, '2');
	$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, '3');
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, '4');
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, '5');
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------
	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':A'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('B'.$r.':G'.$r);	$sheet->setCellValue('B'.$r, 'ва ва ввфывап ыавп'); 
	$sheet->mergeCells('H'.$r.':N'.$r);	$sheet->setCellValue('H'.$r, '2');
	$sheet->mergeCells('O'.$r.':P'.$r);	$sheet->setCellValue('O'.$r, '3');
	$sheet->mergeCells('Q'.$r.':R'.$r);	$sheet->setCellValue('Q'.$r, '4');
	$sheet->mergeCells('S'.$r.':U'.$r);	$sheet->setCellValue('S'.$r, '5');
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------
	
	
	$r++; $r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->setCellValue('A'.$r, 'Краткая характеристика электроснабжения потребителя электрической энергии');
	
	$r++; $r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Схемы внешнего и внутреннего электроснабжения (прилагаются к учетной карточке)');
	
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Электротехнологические установки:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(30);	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':N'.$r);	$sheet->setCellValue('A'.$r, 'nhek asdf asdfsa'); 
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, '3131321');
	$sheet->mergeCells('s'.$r.':Z'.$r);	$sheet->setCellValue('s'.$r, 'IV');
	}
	//--------------------------------------------------------------------------------------------------------

	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Воздушные и кабельные линии свыше 1000 В и их параметры:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(30);	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':G'.$r);	$sheet->setCellValue('A'.$r, 'nhek asdf asdfsa'); 
	$sheet->mergeCells('H'.$r.':P'.$r);	$sheet->setCellValue('H'.$r, 'nheask asdf asdfsa 5464as as546'); 
	$sheet->mergeCells('Q'.$r.':T'.$r);	$sheet->setCellValue('Q'.$r, '3131321');
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, ';tcnm 24634');
	}
	//--------------------------------------------------------------------------------------------------------
	
	$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Высоковольтные распределительные устройства (далее - РУ) и трансформаторные подстанции (далее - ТП):');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(30);	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, 'Наименование РУ и ТП'); 
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, '46'); 
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, '3131321');
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, '634');
	}
	//--------------------------------------------------------------------------------------------------------
	
		$r++;													//название таблицы
	$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Высоковольтные двигатели, в т.ч. синхронные:');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка
	$sheet->getRowDimension($r)->setRowHeight(30);	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':i'.$r);	$sheet->setCellValue('A'.$r, 'Наименование вавав'); 
	$sheet->mergeCells('j'.$r.':n'.$r);	$sheet->setCellValue('j'.$r, '46'); 
	$sheet->mergeCells('o'.$r.':T'.$r);	$sheet->setCellValue('o'.$r, '3131321');
	$sheet->mergeCells('U'.$r.':Z'.$r);	$sheet->setCellValue('U'.$r, '634');
	}
	//--------------------------------------------------------------------------------------------------------
	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':E'.$r);	$sheet->setCellValue('A'.$r, 'Наименование вавав'); 
	$sheet->mergeCells('F'.$r.':G'.$r);	$sheet->setCellValue('F'.$r, '46'); 
	$sheet->mergeCells('H'.$r.':K'.$r);	$sheet->setCellValue('H'.$r, '3131321');
	$sheet->mergeCells('L'.$r.':M'.$r);	$sheet->setCellValue('L'.$r, '634');
	$sheet->mergeCells('N'.$r.':P'.$r);	$sheet->setCellValue('N'.$r, 'Наименование вавав'); 
	$sheet->mergeCells('Q'.$r.':S'.$r);	$sheet->setCellValue('Q'.$r, '46'); 
	$sheet->mergeCells('T'.$r.':U'.$r);	$sheet->setCellValue('T'.$r, '3131321');
	$sheet->mergeCells('V'.$r.':W'.$r);	$sheet->setCellValue('V'.$r, '3131321');
	$sheet->mergeCells('X'.$r.':Z'.$r);	$sheet->setCellValue('X'.$r, '634');
	}
	//--------------------------------------------------------------------------------------------------------
	
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('G'.$r.':J'.$r);	$sheet->setCellValue('G'.$r, '2');
	$sheet->mergeCells('K'.$r.':N'.$r);	$sheet->setCellValue('K'.$r, '3');
	$sheet->mergeCells('O'.$r.':R'.$r);	$sheet->setCellValue('O'.$r, '4');
	$sheet->mergeCells('S'.$r.':V'.$r);	$sheet->setCellValue('S'.$r, '5');
	$sheet->mergeCells('W'.$r.':Z'.$r);	$sheet->setCellValue('W'.$r, '6');
	}
	//--------------------------------------------------------------------------------------------------------
	
	$r++;$r++;
	$sheet->mergeCells('A'.$r.':Z'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'Автономные источники электроснабжения (АИЭ):');
	//таблица ------------------------------------------------------------------------------------------------------------------
	$r++;													//таблица шапка				
	$sheet->getRowDimension($r)->setRowHeight(30);	
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);		$sheet->setCellValue('A'.$r, 'Наименование АИЭ');
	$sheet->mergeCells('G'.$r.':H'.$r);		$sheet->setCellValue('G'.$r, 'Кол-во');
	$sheet->mergeCells('I'.$r.':L'.$r);		$sheet->setCellValue('I'.$r, 'Суммарная мощность, кВт');
	$sheet->mergeCells('M'.$r.':Q'.$r);		$sheet->setCellValue('M'.$r, 'Завод-изготовитель');							
	$sheet->mergeCells('R'.$r.':U'.$r);		$sheet->setCellValue('R'.$r, 'Год выпуска');										
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
	
	for($tr=1; $tr<=3; $tr++) {								//таблица строки
	$r++;																			
	$sheet->getRowDimension($r)->setRowHeight(30);
	$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
	$sheet->mergeCells('A'.$r.':F'.$r);	$sheet->setCellValue('A'.$r, '1'); 
	$sheet->mergeCells('G'.$r.':H'.$r);	$sheet->setCellValue('G'.$r, '2');
	$sheet->mergeCells('I'.$r.':L'.$r);	$sheet->setCellValue('I'.$r, '3');
	$sheet->mergeCells('M'.$r.':Q'.$r);	$sheet->setCellValue('M'.$r, '4');
	$sheet->mergeCells('R'.$r.':U'.$r);	$sheet->setCellValue('R'.$r, '5');
	$sheet->mergeCells('V'.$r.':Z'.$r);	$sheet->setCellValue('V'.$r, '6');
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
	$sheet->mergeCells('D'.$r.':Z'.$r);
	$spreadsheet->getActiveSheet()->getStyle('D'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->setCellValue('G'.$r, $temp_date.'г.');
	
	$r++;
	$sheet->mergeCells('A'.$r.':N'.$r);
	$sheet->getCell('A'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('A'.$r, 'аварийная броня электроснабжения общей мощностью (кВт)):');
	$sheet->mergeCells('O'.$r.':R'.$r);
	$spreadsheet->getActiveSheet()->getStyle('O'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN); 
	$sheet->getCell('O'.$r)->getStyle() ->getAlignment() ->setHorizontal('left');
	$sheet->setCellValue('O'.$r, '5646465'.';');
	

	
	
	
	
$writer = new Xls($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения. 
//Прописываем полный путь до папки и указываем имя файла
$writer->save('hello.xls');

?>