<?php
function fun($sub_id){
//$sub_id=128;

//подключаем
	require $_SERVER['DOCUMENT_ROOT'].'/library/PhpSpreadsheet/vendor/autoload.php';
	include $_SERVER['DOCUMENT_ROOT']."/function/fun_address.php"; // $_SERVER['DOCUMENT_ROOT'] - указывает корневую директорию сайта



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
	
	

$writer = new Xls($spreadsheet);
//Сохраняем файл в текущей папке, в которой выполняется скрипт.
//Чтобы указать другую папку для сохранения. 
//Прописываем полный путь до папки и указываем имя файла
$writer->save('sub.xls');
}
echo "OK";
?>
