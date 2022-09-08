<?php

namespace Basis\Model\Report;

use Engine\Model;
use Library\PhpSpreadsheet\vendor\autoload;
use Library\PhpSpreadsheet\Spreadsheet;
use Library\PhpSpreadsheet\Writer\Xls;
	/*use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xls;*/

class ReportRepository extends Model
{

/******************************************************************************************************************************/
/*********************************************** Печать фильтра ПОТРЕБИТЕЛИ  **********************************************************/	
/******************************************************************************************************************************/

public function filter_subject_list($work_array,$filter){

		$rn=1; 																							//кол-во пустых строк в таблицах
		$zap="-";																						//данные в пустых строках				
		$n=1;	
		$r=1;	


	//подключаем
			require $_SERVER['DOCUMENT_ROOT'].'/ARM/library/PhpSpreadsheet/vendor/autoload.php';
		//Создаем экземпляр класса электронной таблицы
			$spreadsheet = new Spreadsheet();
		//Получаем текущий активный лист
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
			$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
			$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
			
			$sheet->setTitle('РП');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');				//в стоблцах выравнивание по центру
			$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
			$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
			$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
			$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы
			//$sheet->getStyle('A:Z')->getAlignment()->setWrapText(true); // перенос текста для ячейки

		//Установка ширины столбца
			$columns = range('A', 'Z');
			for($c=0;$c<=25;$c++) {
				$sheet->getColumnDimension($columns[$c])->setWidth(4);
			}

	    //--------------------------------------------- заголовок файла---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(14);								// устанавливаем стили шрифта 	
			$sheet->getRowDimension($r)->setRowHeight(20);													//Установка высоты строки
			$sheet->setCellValue('A'.$r, 'Список региональных потребителей по заданному фильтру');			// Записываем в ячейку данные
			$r=$r+2;																							

		//---------------------------------------  параметры фильтра ---------------------------------//
			$sheet->mergeCells('A'.$r.':R'.$r);
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->setCellValue('A'.$r, 'Параметры фильтра');$r++;			
			
			
			if(isset($filter['spr_cod_branch']) && $filter['spr_cod_branch'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Филиал :');
				$sheet->setCellValue('K'.$r, $filter['spr_cod_branch_name']);$r++;
			}
			if(isset($filter['spr_cod_podrazd']) && $filter['spr_cod_podrazd'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);;
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'МрО :');
				$sheet->setCellValue('K'.$r, $filter['spr_cod_podrazd_name']);$r++;
			}
			if(isset($filter['spr_otdel']) && $filter['spr_otdel'] >0){	
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Группа :');
				$sheet->setCellValue('K'.$r, $filter['spr_otdel_name']);$r++;
			}
			if(isset($filter['id_user']) && $filter['id_user'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Инспектор :');
				$sheet->setCellValue('K'.$r, $filter['id_user_name']);$r++;
			}

			if(isset($filter['formRegionFact']) && $filter['formRegionFact'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фактический адрес(область) :');
				$sheet->setCellValue('K'.$r, $filter['formRegionFact_name']);$r++;
			}
			
			if(isset($filter['formDistrictFact']) && $filter['formDistrictFact'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фактический адрес(район) :');
				$sheet->setCellValue('K'.$r, $filter['formDistrictFact_name']);$r++;
			}

			if(isset($filter['formCityFact']) && $filter['formCityFact'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фактический адрес(нас.пункт) :');
				$sheet->setCellValue('K'.$r, $filter['formCityFact_name']);$r++;
			}

			if(isset($filter['formCityZoneFact']) && $filter['formCityZoneFact'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фактический адрес(район города) :');
				$sheet->setCellValue('K'.$r, $filter['formCityZoneFact_name']);$r++;
			}

			if(isset($filter['formStreetFact']) && strlen($filter['formStreetFact']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фактический адрес(улица) :');
				$sheet->setCellValue('K'.$r, $filter['formStreetFact']);$r++;
			}

			if(isset($filter['formRegionPost']) && $filter['formRegionPost'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Почтовый адрес(область) :');
				$sheet->setCellValue('K'.$r, $filter['formRegionPost_name']);$r++;
			}
			
			if(isset($filter['formDistrictPost']) && $filter['formDistrictPost'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Почтовый адрес(район) :');
				$sheet->setCellValue('K'.$r, $filter['formDistrictPost_name']);$r++;
			}

			if(isset($filter['formCityPost']) && $filter['formCityPost'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Почтовый адрес(нас.пункт) :');
				$sheet->setCellValue('K'.$r, $filter['formCityPost_name']);$r++;
			}


			if(isset($filter['formStreetPost']) && strlen($filter['formStreetPost']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Почтовый адрес(улица) :');
				$sheet->setCellValue('K'.$r, $filter['formStreetPost']);$r++;
			}

			if(isset($filter['formBranchObject']) && $filter['formBranchObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Закрепление(филиал) :');
				$sheet->setCellValue('K'.$r, $filter['formBranchObject_name']);$r++;
			}

			if(isset($filter['formPodrazdelenieObject']) && $filter['formPodrazdelenieObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Закрепление(МрО) :');
				$sheet->setCellValue('K'.$r, $filter['formPodrazdelenieObject_name']);$r++;
			}

			if(isset($filter['formOtdelObject']) && $filter['formOtdelObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Закрепление(РЭГИ) :');
				$sheet->setCellValue('K'.$r, $filter['formOtdelObject_name']);$r++;
			}

			if(isset($filter['formRegionObject']) && $filter['formRegionObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Адрес объекта(область) :');
				$sheet->setCellValue('K'.$r, $filter['formRegionObject_name']);$r++;
			}
			
			if(isset($filter['formDistrictObject']) && $filter['formDistrictObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Адрес объекта(район)  :');
				$sheet->setCellValue('K'.$r, $filter['formDistrictObject_name']);$r++;
			}

			if(isset($filter['formCityObject']) && $filter['formCityObject'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Адрес объекта(город)  :');
				$sheet->setCellValue('K'.$r, $filter['formCityObject_name']);$r++;
			}


			if(isset($filter['formStreetObject']) && strlen($filter['formStreetObject']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Адрес объекта(улица)  :');
				$sheet->setCellValue('K'.$r, $filter['formStreetObject']);$r++;
			}



			
			$r=$r+1;
		
		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':E'.$r);
			$sheet->mergeCells('F'.$r.':Z'.$r);
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');		
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'Номер дела');
			$sheet->setCellValue('F'.$r, 'Наименование регионального потребителя');
		
		//---------------------------------------  заполнение таблицы ---------------------------//
		//print_r($work_array);
		foreach($work_array as $item_array){
			
			$r++;
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':E'.$r);
			$sheet->mergeCells('F'.$r.':Z'.$r);
			
			

			$text = strlen($item_array['name']);
			if($text < 330 && $text > 170){
				$sheet->getRowDimension($r)->setRowHeight(40);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); // перенос текста для ячейки*/			
			}else if($text > 330){
				$sheet->getRowDimension($r)->setRowHeight(60);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); // перенос текста для ячейки*/					
			}else{
				$sheet->getRowDimension($r)->setRowHeight(20);
			}

			
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			
					$sheet->setCellValue('A'.$r, $n);
					$sheet->setCellValue('C'.$r, $item_array['id']);
					$sheet->setCellValue('F'.$r, $item_array['name']);

			$n++;
		}
	
       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/basis/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'sub.xls"');
			$writer->save($path_doc.'sub.xls');
	}
	
	
	
	
/******************************************************************************************************************************/
/*********************************************** Печать фильтра УНП  **********************************************************/	
/******************************************************************************************************************************/	
	
public function filter_unp_list($work_array,$filter){

		$rn=1; 																							//кол-во пустых строк в таблицах
		$zap="-";																						//данные в пустых строках				
		$n=1;	
		$r=1;	


	//подключаем
			require $_SERVER['DOCUMENT_ROOT'].'/ARM/library/PhpSpreadsheet/vendor/autoload.php';
		//Создаем экземпляр класса электронной таблицы
			$spreadsheet = new Spreadsheet();
		//Получаем текущий активный лист
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
			$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
			$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
			
			$sheet->setTitle('УНП');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');				//в стоблцах выравнивание по центру
			$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
			$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
			$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
			$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы
			//$sheet->getStyle('A:Z')->getAlignment()->setWrapText(true); // перенос текста для ячейки

		//Установка ширины столбца
			$columns = range('A', 'Z');
			for($c=0;$c<=25;$c++) {
				$sheet->getColumnDimension($columns[$c])->setWidth(4);
			}

	    //--------------------------------------------- заголовок файла---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(14);								// устанавливаем стили шрифта 	
			$sheet->getRowDimension($r)->setRowHeight(20);													//Установка высоты строки
			$sheet->setCellValue('A'.$r, 'Список юридических лиц и ИП по заданному фильтру');			// Записываем в ячейку данные
			$r=$r+2;																							

		//---------------------------------------  параметры фильтра ---------------------------------//
			$sheet->mergeCells('A'.$r.':R'.$r);
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->setCellValue('A'.$r, 'Параметры фильтра');$r++;			
			


			if(isset($filter['formRegion']) && $filter['formRegion'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Область :');
				$sheet->setCellValue('K'.$r, $filter['formRegion_name']);$r++;
			}
			
			if(isset($filter['formDistrict']) && $filter['formDistrict'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Район :');
				$sheet->setCellValue('K'.$r, $filter['formDistrict_name']);$r++;
			}

			if(isset($filter['formCity']) && $filter['formCity'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Населенный пункт :');
				$sheet->setCellValue('K'.$r, $filter['formCity_name']);$r++;
			}

			if(isset($filter['formCityZone']) && $filter['formCityZone'] >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Район города :');
				$sheet->setCellValue('K'.$r, $filter['formCityZone_name']);$r++;
			}

			if(isset($filter['street_unp']) && strlen($filter['street_unp']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Улица :');
				$sheet->setCellValue('K'.$r, $filter['street_unp']);$r++;
			}


			$r=$r+1;
		
		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':E'.$r);
			$sheet->mergeCells('F'.$r.':Z'.$r);
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');		
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'УНП');
			$sheet->setCellValue('F'.$r, 'Наименование ЮЛ или ИП');
		
		//---------------------------------------  заполнение таблицы ---------------------------//
		//print_r($work_array);
		foreach($work_array as $item_array){
			
			$r++;
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':E'.$r);
			$sheet->mergeCells('F'.$r.':Z'.$r);
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			
			
			$text = strlen($item_array['name']);
			if($text < 330 && $text > 170){
				$sheet->getRowDimension($r)->setRowHeight(40);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); // перенос текста для ячейки*/			
			}else if($text > 330){
				$sheet->getRowDimension($r)->setRowHeight(60);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); // перенос текста для ячейки*/					
			}else{
				$sheet->getRowDimension($r)->setRowHeight(20);
			}
			
			
			
			
					$sheet->setCellValue('A'.$r, $n);
					$sheet->setCellValue('C'.$r, $item_array['unp']);
					$sheet->setCellValue('F'.$r, $item_array['name']);
			$n++;
		}
	
       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/basis/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'unp.xls"');
			$writer->save($path_doc.'unp.xls');
	}	



/******************************************************************************************************************************/
/*********************************************** Печать фильтра ОТВЕТСТВЕННЫЕ ЛИЦА  **********************************************************/	
/******************************************************************************************************************************/	
	
public function filter_indpers_list($work_array,$filter){

		$rn=1; 																							//кол-во пустых строк в таблицах
		$zap="-";																						//данные в пустых строках				
		$n=1;	
		$r=1;	


	//подключаем
			require $_SERVER['DOCUMENT_ROOT'].'/ARM/library/PhpSpreadsheet/vendor/autoload.php';
		//Создаем экземпляр класса электронной таблицы
			$spreadsheet = new Spreadsheet();
		//Получаем текущий активный лист
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
			$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
			$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
			
			$sheet->setTitle('Физические лица');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');				//в стоблцах выравнивание по центру
			$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
			$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
			$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
			$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы
			//$sheet->getStyle('A:Z')->getAlignment()->setWrapText(true); // перенос текста для ячейки

		//Установка ширины столбца
			$columns = range('A', 'Z');
			for($c=0;$c<=25;$c++) {
				$sheet->getColumnDimension($columns[$c])->setWidth(4);
			}

	    //--------------------------------------------- заголовок файла---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(14);								// устанавливаем стили шрифта 	
			$sheet->getRowDimension($r)->setRowHeight(20);													//Установка высоты строки
			$sheet->setCellValue('A'.$r, 'Список физических лиц по заданному фильтру');			// Записываем в ячейку данные
			$r=$r+2;																							

		//---------------------------------------  параметры фильтра ---------------------------------//
			$sheet->mergeCells('A'.$r.':R'.$r);
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->setCellValue('A'.$r, 'Параметры фильтра');$r++;			
			


			if(isset($filter['mf_ip_firstname']) && strlen($filter['mf_ip_firstname']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Фамилия :');
				$sheet->setCellValue('K'.$r, $filter['mf_ip_firstname']);$r++;
			}
			if(isset($filter['mf_ip_secondname']) && strlen($filter['mf_ip_secondname']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Имя :');
				$sheet->setCellValue('K'.$r, $filter['mf_ip_secondname']);$r++;
			}
			if(isset($filter['mf_ip_lastname']) && strlen($filter['mf_ip_lastname']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Отчество :');
				$sheet->setCellValue('K'.$r, $filter['mf_ip_lastname']);$r++;
			}			
			if(isset($filter['mf_ip_identification_number']) && strlen($filter['mf_ip_identification_number']) >0){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Идентификационный номер :');
				$sheet->getStyle('K'.$r)->getAlignment()->setHorizontal('left');
				$sheet->setCellValue('K'.$r, $filter['mf_ip_identification_number']);$r++;
			}
			
			$r=$r+1;
		
		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':I'.$r);
			$sheet->mergeCells('J'.$r.':Z'.$r);
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');		
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'Идентификационный номер');
			$sheet->setCellValue('J'.$r, 'ФИО');
		
		//---------------------------------------  заполнение таблицы ---------------------------//
		//print_r($work_array);
		foreach($work_array as $item_array){
			
			$r++;
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':I'.$r);
			$sheet->mergeCells('J'.$r.':Z'.$r);
			$sheet->getStyle('J'.$r)->getAlignment()->setWrapText(true); // перенос текста для ячейки*/
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			
			$fio = $item_array['firstname']." ".$item_array['secondname']." ".$item_array['lastname'];

					$sheet->setCellValue('A'.$r, $n);
					$sheet->setCellValue('C'.$r, $item_array['identification_number']);
					$sheet->setCellValue('J'.$r, $fio);
			$n++;
		}
       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/basis/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'indpers.xls"');
			$writer->save($path_doc.'indpers.xls');
	}	




/******************************************************************************************************************************/
/*********************************************** Печать письма о несоблюдении сроков  **********************************************************/	
/******************************************************************************************************************************/

	//public function letter_srok($work_array,$filter){
	public function letter_srok($work_array, $params){
		$rn=1; 																							//кол-во пустых строк в таблицах
		$zap="-";																						//данные в пустых строках				
		$n=1;	
		$r=1;	


	//подключаем
			require $_SERVER['DOCUMENT_ROOT'].'/ARM/library/PhpSpreadsheet/vendor/autoload.php';
		//Создаем экземпляр класса электронной таблицы
			$spreadsheet = new Spreadsheet();
		//Получаем текущий активный лист
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
			$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
			$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
			
			$sheet->setTitle('Истек срок ПЗ');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');				//в стоблцах выравнивание по центру
			$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
			$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
			$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
			$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы


		//Установка ширины столбца
			$columns = range('A', 'Z');
			for($c=0;$c<=25;$c++) {
				$sheet->getColumnDimension($columns[$c])->setWidth(4);
			}

	    //------------------------------------------------------------------------//																					
			$sheet->mergeCells('A'.$r.':M'.$r); 															
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(10);									
			$sheet->getRowDimension($r)->setRowHeight(215);													
			$sheet->getStyle('A'.$r.':M'.$r)->getAlignment()->setWrapText(true);
			$sheet->getStyle('A'.$r.':M'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('A'.$r, 
			'                  Віцебскае рэспубліканскае ўнітарнае 
			прадпрыемства электраэнергетыкі 
			«Віцебскэнерга»
			(РУП «ВІЦЕБСКЭНЕРГА»)
			ФIЛIЯЛ «ЭНЕРГАНАГЛЯД»
			Вiцебскае мiжраённае аддзяленне
			вул. Ленiна, 10а, 210015, г. Віцебск
			тэл: +375 (212) 64 82 56 - прыёмная
			факс: +375 (212) 64 82 57;       
			E-mail: mrov@nadzor.vitebsk.energo.by       
			http://www.enadzor.vitebsk.energo.by
			р/р BY89BPSB30121160830129330000
			у ААТ «БПС-Сбербанк»
			г.Мінск, б-р Мулявіна, 6
			BIC: BPSBBY2X УНП 300000252
			код для ЭСЧФ – 0695');			
			$sheet->mergeCells('N'.$r.':Z'.$r); 															
			$sheet->getStyle('N'.$r) ->getFont() ->setSize(10);									
			$sheet->getRowDimension($r)->setRowHeight(215);													
			$sheet->getStyle('N'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$sheet->setCellValue('N'.$r, 
			'                  Витебское республиканское унитарное
			предприятие электроэнергетики 
			«Витебскэнерго» 
			(РУП «ВИТЕБСКЭНЕРГО»)
			ФИЛИАЛ «ЭНЕРГОНАДЗОР»
			Витебское межрайонное отделение 
			ул. Ленина, 10а, 210015, г. Витебск
			тел: +375 (212) 64 82 56 - приёмная
			факс: +375 (212) 64 82 57;       
			E-mail: mrov@nadzor.vitebsk.energo.by       
			http://www.enadzor.vitebsk.energo.by
			р/с BY89BPSB30121160830129330000
			в ОАО «БПС-Сбербанк»
			г.Минск, б-р Мулявина, 6
			BIC: BPSBBY2X УНП 300000252
			код для ЭСЧФ - 0695');			
			$r++;																							
			
			
			$sheet->mergeCells('A'.$r.':F'.$r); 
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':F'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);													
			
			$sheet->getStyle('G'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('G'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);
			$sheet->setCellValue('G'.$r, '№');
			
			$sheet->mergeCells('H'.$r.':L'.$r); 
			$sheet->getStyle('H'.$r.':L'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':L'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);			
			$r++;
			
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->getStyle('A'.$r.':B'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);
			$sheet->setCellValue('A'.$r, 'На №');
			
			$sheet->mergeCells('C'.$r.':F'.$r); 
			$sheet->getStyle('C'.$r.':F'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('C'.$r.':F'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('C'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);													
			
			$sheet->getStyle('G'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('G'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);
			$sheet->setCellValue('G'.$r, 'ад');
			
			$sheet->mergeCells('H'.$r.':L'.$r); 
			$sheet->getStyle('H'.$r.':L'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':L'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(11);				
			$sheet->getRowDimension($r)->setRowHeight(16);			
			$r=$r+2;
			
			$sheet->mergeCells('R'.$r.':Z'.$r); 
			$sheet->getStyle('R'.$r.':Z'.$r)->getAlignment()->setHorizontal('left');		
			$sheet->getStyle('R'.$r) ->getFont() ->setSize(13);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('R'.$r, 'Руководителю');				
			$r++;			

			$sheet->mergeCells('R'.$r.':Z'.$r); 
			$sheet->getStyle('R'.$r.':Z'.$r)->getAlignment()->setHorizontal('left');
			$sheet->getStyle('R'.$r.':Z'.$r)->getAlignment()->setWrapText(true);			
			$sheet->getStyle('R'.$r) ->getFont() ->setSize(13);					
			$sheet->getRowDimension($r)->setRowHeight(100);													
			$sheet->setCellValue('R'.$r, "(".$work_array[0]['unp_name'].")");				
			$r++;
			
			
			$sheet->mergeCells('A'.$r.':M'.$r); 
			$sheet->getStyle('A'.$r.':M'.$r)->getAlignment()->setHorizontal('left');
			$sheet->getStyle('A'.$r.':M'.$r)->getAlignment()->setWrapText(true);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(13);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			
			if($params['zurnal_napr'] == 1){
				$sheet->setCellValue('A'.$r, 'Об ответственном за электро хозяйство');	
			}elseif($params['zurnal_napr'] == 2){
				$sheet->setCellValue('A'.$r, 'Об ответственном за тепловое хозяйство');	
			}elseif($params['zurnal_napr'] == 3){
				$sheet->setCellValue('A'.$r, 'Об ответственном за газовое хозяйство');	
			}
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			/*$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('left');*/
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(13);					
			$sheet->getRowDimension($r)->setRowHeight(180);													
			
			if($params['zurnal_napr'] == 1){
				$sheet->setCellValue('A'.$r, 
				'                 В Вашей организации истек срок проверки знаний у лица ответственного за электро хозяйство с учетом знания требований ТКП 458-2012, ТКП 459-2012, Правил подготовки организаций к отопительному сезону, его проведения и завершения, иных НПА, ТНПА и локальных НПА, соблюдение которых входит в его профессиональные (должностные) обязанности.
                Для приведения организации эксплуатации теплоустановок в соответствие с главой 4 ТКП 458-2012 «Правила технической эксплуатации теплоустановок и тепловых сетей потребителей» Вам необходимо, обеспечить организацию проверки знаний по вопросам охраны труда у лица ответственного за тепловое хозяйство в комиссии с участием инспектора Госэнергонадзора, либо в комиссии Витебского МРО филиала Госэнергогазнадзора по Витебской области (ТКП 458-2012 глава 4).
                О своем решении сообщите.');	
			}elseif($params['zurnal_napr'] == 2){
				$sheet->setCellValue('A'.$r, 
				'                 В Вашей организации истек срок проверки знаний у лица ответственного за тепловое хозяйство с учетом знания требований ТКП 458-2012, ТКП 459-2012, Правил подготовки организаций к отопительному сезону, его проведения и завершения, иных НПА, ТНПА и локальных НПА, соблюдение которых входит в его профессиональные (должностные) обязанности.
                Для приведения организации эксплуатации теплоустановок в соответствие с главой 4 ТКП 458-2012 «Правила технической эксплуатации теплоустановок и тепловых сетей потребителей» Вам необходимо, обеспечить организацию проверки знаний по вопросам охраны труда у лица ответственного за тепловое хозяйство в комиссии с участием инспектора Госэнергонадзора, либо в комиссии Витебского МРО филиала Госэнергогазнадзора по Витебской области (ТКП 458-2012 глава 4).
                О своем решении сообщите.');	
			}elseif($params['zurnal_napr'] == 3){
				$sheet->setCellValue('A'.$r, 
				'                 В Вашей организации истек срок проверки знаний у лица ответственного за газовое хозяйство.');
			}			

       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/basis/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'srok.xls"');
			$writer->save($path_doc.'srok.xls');
	}

/******************************************************************************************************************************/
/*********************************************** Печать фильтра ПОТРЕБИТЕЛИ  **********************************************************/	
/******************************************************************************************************************************/

		public function filter_letter_list($work_array,$filter){

		$rn=1; 																							//кол-во пустых строк в таблицах
		$zap="-";																						//данные в пустых строках				
		$n=1;	
		$r=1;	


	//подключаем
			require $_SERVER['DOCUMENT_ROOT'].'/ARM/library/PhpSpreadsheet/vendor/autoload.php';
		//Создаем экземпляр класса электронной таблицы
			$spreadsheet = new Spreadsheet();
		//Получаем текущий активный лист
			$sheet = $spreadsheet->getActiveSheet();
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1); 		//разместить страницах в ширина
			$spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(10);		//разместить страницах в высоту
			$spreadsheet->getDefaultStyle()->getFont()->setName('Times New Roman');	//шрифт по умолчанию
			$spreadsheet->getDefaultStyle()->getFont()->setSize(12);				//размер шрифта по умолчанию
			
			$sheet->setTitle('Персонал');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');				//в стоблцах выравнивание по центру
			$sheet->getStyle('A:Z')->getAlignment()->setVertical('center'); 						//в стоблцах выравнивание по центру
			$sheet->getPageMargins() ->setLeft(0.5) ->setRight(0.5) ->setTop(0.5) ->setBottom(0.5) ->setHeader(0) ->setFooter(0);	//отступы и колонтитулы
			$spreadsheet->getActiveSheet()->getPageSetup()->setHorizontalCentered(true);			//горизонтальное центрирование страницы
			$spreadsheet->getActiveSheet()->getPageSetup()->setVerticalCentered(false);				//вертикальное центрирование страницы
			//$sheet->getStyle('A:Z')->getAlignment()->setWrapText(true); // перенос текста для ячейки

		//Установка ширины столбца
			$columns = range('A', 'Z');
			for($c=0;$c<=25;$c++) {
				$sheet->getColumnDimension($columns[$c])->setWidth(4);
			}

	    //--------------------------------------------- заголовок файла---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															//Объединение ячеек
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(14);								// устанавливаем стили шрифта 	
			$sheet->getRowDimension($r)->setRowHeight(20);													//Установка высоты строки
			$sheet->setCellValue('A'.$r, 'Список ответственных лиц по заданному фильтру');			// Записываем в ячейку данные
			$r=$r+2;																							

		//---------------------------------------  параметры фильтра ---------------------------------//
			$sheet->mergeCells('A'.$r.':R'.$r);
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->setCellValue('A'.$r, 'Параметры фильтра');$r++;			
			
			
			if((isset($filter['mf_zurnal_personal']) && strlen($filter['mf_zurnal_personal'] >0))){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'ФИО ответственного лица:');
				$sheet->setCellValue('K'.$r, $filter['mf_zurnal_personal']);$r++;
			}
			if((isset($filter['mf_zurnal_pers_dolg']) && strlen($filter['mf_zurnal_pers_dolg'] >0))){
				$sheet->mergeCells('A'.$r.':I'.$r);;
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Должность ответственного лица:');
				$sheet->setCellValue('K'.$r, $filter['mf_zurnal_pers_dolg']);$r++;
			}
			if((isset($filter['mf_zurnal_srok_istek']) && strlen($filter['mf_zurnal_srok_istek'] >0))){	
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Истек срок проверки знаний :');
				$sheet->setCellValue('K'.$r, 'да');$r++;
			}
			if((isset($filter['mf_zurnal_date_doc_ot']) && strlen($filter['mf_zurnal_date_doc_ot'] >0)) || (isset($filter['mf_zurnal_date_doc_do']) && strlen($filter['mf_zurnal_date_doc_do'] >0))){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Проверка знаний за период :');
			
				if(strlen($filter['mf_zurnal_date_doc_ot'] >0) && strlen($filter['mf_zurnal_date_doc_do'] <= 0)){
					$sheet->setCellValue('K'.$r, 'от '.date('d.m.Y',strtotime($filter['mf_zurnal_date_doc_ot'])));					
				}
				if(strlen($filter['mf_zurnal_date_doc_ot'] <= 0) && strlen($filter['mf_zurnal_date_doc_do'] > 0)){
					$sheet->setCellValue('K'.$r, 'до '.date('d.m.Y',strtotime($filter['mf_zurnal_date_doc_do'])));					
				}				
				if(strlen($filter['mf_zurnal_date_doc_ot'] > 0) && strlen($filter['mf_zurnal_date_doc_do'] > 0)){
					$sheet->setCellValue('K'.$r, 'от '.date('d.m.Y',strtotime($filter['mf_zurnal_date_doc_ot'])).' до '.date('d.m.Y',strtotime($filter['mf_zurnal_date_doc_do'])));					
				}				
				$r++;
			}
			if((isset($filter['mf_zurnal_date_srok_doc_ot']) && strlen($filter['mf_zurnal_date_srok_doc_ot'] >0)) || (isset($filter['mf_zurnal_date_srok_doc_do']) && strlen($filter['mf_zurnal_date_srok_doc_do'] >0))){
				$sheet->mergeCells('A'.$r.':I'.$r);
				$sheet->mergeCells('K'.$r.':R'.$r);
				$sheet->getStyle('A'.$r.':I'.$r)->getAlignment()->setHorizontal('right');
				$spreadsheet->getActiveSheet()->getStyle('A'.$r.':R'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');
				$sheet->setCellValue('A'.$r, 'Истекает срок проверки знаний:');
			
				if(strlen($filter['mf_zurnal_date_srok_doc_ot'] >0) && strlen($filter['mf_zurnal_date_srok_doc_do'] <= 0)){
					$sheet->setCellValue('K'.$r, 'от '.date('d.m.Y',strtotime($filter['mf_zurnal_date_srok_doc_ot'])));					
				}
				if(strlen($filter['mf_zurnal_date_srok_doc_ot'] <= 0) && strlen($filter['mf_zurnal_date_srok_doc_do'] > 0)){
					$sheet->setCellValue('K'.$r, 'до '.date('d.m.Y',strtotime($filter['mf_zurnal_date_srok_doc_do'])));					
				}				
				if(strlen($filter['mf_zurnal_date_srok_doc_ot'] > 0) && strlen($filter['mf_zurnal_date_srok_doc_do'] > 0)){
					$sheet->setCellValue('K'.$r, 'от '.date('d.m.Y',strtotime($filter['mf_zurnal_date_srok_doc_ot'])).' до '.date('d.m.Y',strtotime($filter['mf_zurnal_date_srok_doc_do'])));					
				}				
				$r++;
			}

			$r=$r+1;
		
		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':K'.$r);
			$sheet->mergeCells('L'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':Z'.$r);
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setBold(true) ->setSize(12);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');	
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r)->getFill()->setFillType(\Library\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('d3d3d3');		
			$sheet->getStyle('A'.$r)->getAlignment()->setWrapText(true); 
			$sheet->getStyle('C'.$r)->getAlignment()->setWrapText(true);
			$sheet->getStyle('L'.$r)->getAlignment()->setWrapText(true);
			$sheet->getStyle('U'.$r)->getAlignment()->setWrapText(true);
			$sheet->getRowDimension($r)->setRowHeight(30);
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'ФИО ответственного лица / должность');
			$sheet->setCellValue('L'.$r, 'Направление деятельности');
			$sheet->setCellValue('U'.$r, 'Следующая проверка знаний');
		
		//---------------------------------------  заполнение таблицы ---------------------------//
		//print_r($work_array);
		foreach($work_array as $item_array){
			
			$r++;
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':K'.$r);
			$sheet->mergeCells('L'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':Z'.$r);
			
			

			/*$text = strlen($item_array['name']);
			if($text < 330 && $text > 170){
				$sheet->getRowDimension($r)->setRowHeight(40);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); 		
			}else if($text > 330){
				$sheet->getRowDimension($r)->setRowHeight(60);
				$sheet->getStyle('F'.$r)->getAlignment()->setWrapText(true); 				
			}else{
				$sheet->getRowDimension($r)->setRowHeight(20);
			}*/

			
			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('L'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('U'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('A'.$r)->getAlignment()->setWrapText(true); 
			$sheet->getStyle('C'.$r)->getAlignment()->setWrapText(true);
			$sheet->getStyle('L'.$r)->getAlignment()->setWrapText(true);
			$sheet->getStyle('U'.$r)->getAlignment()->setWrapText(true);
			$sheet->getRowDimension($r)->setRowHeight(30);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			
					$sheet->setCellValue('A'.$r, $n);
					$sheet->setCellValue('C'.$r, $item_array['person_name'].' / '.$item_array['person_position']);
					$sheet->setCellValue('L'.$r, $item_array['napr_name']);
					$sheet->setCellValue('U'.$r, date('d.m.Y',strtotime($item_array['test_validity'])));

			$n++;
		}
	
       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/basis/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'personal.xls"');
			$writer->save($path_doc.'personal.xls');
	}
	
	
}
?>