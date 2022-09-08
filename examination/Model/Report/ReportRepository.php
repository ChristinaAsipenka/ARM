<?php

namespace Examination\Model\Report;

use Engine\Model;
use Library\PhpSpreadsheet\vendor\autoload;
use Library\PhpSpreadsheet\Spreadsheet;
use Library\PhpSpreadsheet\Writer\Xls;

class ReportRepository extends Model
{
/******************************************************************************************************************************/
/*********************************************** Печать протокола электро  **********************************************************/	
/******************************************************************************************************************************/

	public function ZurnalByMainPage_e($work_array,$filter){

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
			
			$sheet->setTitle('Протокол');
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

	    //--------------------------------------------- ПРОТОКОЛ---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия для проверки знаний по вопросам охраны труда');			
			$r++;																							
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);				
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['branch_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование комиссии)');				
			$r++;
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['podrazd_name'].", ".$work_array[0]['otdel_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование межрайонного отделения, районной энергогазинспекции)');				
			$r=$r+3;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'ПРОТОКОЛ');			
			$r++;	

			$sheet->mergeCells('A'.$r.':S'.$r);
			$sheet->getStyle('A'.$r.':S'.$r)->getAlignment()->setHorizontal('right');			
			$sheet->getStyle('A'.$r.':S'.$r) ->getFont() ->setBold(true) ->setSize(12);																					
			$sheet->setCellValue('A'.$r, 'проверки знаний по вопросам охраны труда № ');			
			$sheet->mergeCells('T'.$r.':W'.$r);
			$sheet->getStyle('T'.$r.':W'.$r)->getAlignment()->setHorizontal('left');	
			$sheet->getStyle('T'.$r.':W'.$r) ->getFont() ->setBold(true) ->setSize(12) ->setUnderline(true);			
			$sheet->setCellValue('T'.$r, $work_array[0]['doc_number']);
			$sheet->getRowDimension($r)->setRowHeight(20);	
			$r=$r+2;		

			$timestamp = strtotime($work_array[0]['date']);
			$year = date('Y', $timestamp);
			$month = date('m', $timestamp);
			$day = date('d', $timestamp);


			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $day);	
			
	
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('C'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('C'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('C'.$r, $month);				
			
			$sheet->mergeCells('E'.$r.':G'.$r); 
			$sheet->getStyle('E'.$r.':G'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('E'.$r.':G'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('E'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('E'.$r, $year." г.");			
			$r++;
			
			$sheet->mergeCells('B'.$r.':D'.$r); 
			$sheet->getStyle('B'.$r.':D'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('B'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('B'.$r, '(дата)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия в составе:');			
			$r++;
			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'председатель комиссии:');			
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_1'].", ".$work_array[0]['member_1_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;	

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'члены комиссии:');
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_2'].", ".$work_array[0]['member_2_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;

			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_3'].", ".$work_array[0]['member_3_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия провела проверку знаний по вопросам охраны труда:');			
			$r++;

		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$sheet->getRowDimension($r)->setRowHeight(60);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'Фамилия, собственное имя, отчество(если таковое имеется) лица, проходящего проверку знаний');
			$sheet->setCellValue('H'.$r, 'Профессия рабочего, должность служащего или отдельный вид работ(услуг) лица, проходящего проверку, наименование организации(индивидуальный предприниматель, вид деятельности)');
			$sheet->setCellValue('O'.$r, 'Вид проверки знаний');
			$sheet->setCellValue('S'.$r, 'Номер билета');
			$sheet->setCellValue('U'.$r, 'Результат проверки знаний(сдан, не сдан, не завершен)');
			$sheet->setCellValue('X'.$r, 'Роспись лица, проходившего проверку знаний по вопросам охраны труда');
			$r++;
			
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(10);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, '2');
			$sheet->setCellValue('H'.$r, '3');
			$sheet->setCellValue('O'.$r, '4');
			$sheet->setCellValue('S'.$r, '5');
			$sheet->setCellValue('U'.$r, '6');
			$sheet->setCellValue('X'.$r, '7');			
			$r++;
		//---------------------------------------  заполнение таблицы ---------------------------//

			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);			
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9)->setItalic(true);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(70);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);

			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, $work_array[0]['person_name']);
			$sheet->setCellValue('H'.$r, $work_array[0]['person_position']." - лицо, ответственное за электрохозяйство ".$work_array[0]['unp_name']);
			$sheet->setCellValue('O'.$r, $work_array[0]['spr_test_reasons_elektro_name']);
			$sheet->setCellValue('S'.$r, '-');
			$sheet->setCellValue('U'.$r, $work_array[0]['test_result']." (до ".date('d.m.Y',strtotime($work_array[0]['test_validity'])).")");
			$sheet->setCellValue('X'.$r, '');
			$r=$r+2;


			/********************* председатель комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Председатель комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_1']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			/********************* члены комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Члены комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_2']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_3']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;		

       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/examination/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'protokol.xls"');
			$writer->save($path_doc.'protokol.xls');
	}
	
	
	


/******************************************************************************************************************************/
/*********************************************** Печать протокола тепло  **********************************************************/	
/******************************************************************************************************************************/

	public function ZurnalByMainPage_t($work_array,$filter){

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
			
			$sheet->setTitle('Протокол');
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

	    //--------------------------------------------- ПРОТОКОЛ---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия для проверки знаний по вопросам охраны труда');			
			$r++;																							
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);				
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['branch_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование комиссии)');				
			$r++;
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['podrazd_name'].", ".$work_array[0]['otdel_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование межрайонного отделения, районной энергогазинспекции)');				
			$r=$r+3;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'ПРОТОКОЛ');			
			$r++;	

			$sheet->mergeCells('A'.$r.':S'.$r);
			$sheet->getStyle('A'.$r.':S'.$r)->getAlignment()->setHorizontal('right');			
			$sheet->getStyle('A'.$r.':S'.$r) ->getFont() ->setBold(true) ->setSize(12);																					
			$sheet->setCellValue('A'.$r, 'проверки знаний по вопросам охраны труда № ');			
			$sheet->mergeCells('T'.$r.':W'.$r);
			$sheet->getStyle('T'.$r.':W'.$r)->getAlignment()->setHorizontal('left');	
			$sheet->getStyle('T'.$r.':W'.$r) ->getFont() ->setBold(true) ->setSize(12) ->setUnderline(true);			
			$sheet->setCellValue('T'.$r, $work_array[0]['doc_number']);
			$sheet->getRowDimension($r)->setRowHeight(20);	
			$r=$r+2;		

			$timestamp = strtotime($work_array[0]['date']);
			$year = date('Y', $timestamp);
			$month = date('m', $timestamp);
			$day = date('d', $timestamp);


			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $day);	
			
	
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('C'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('C'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('C'.$r, $month);				
			
			$sheet->mergeCells('E'.$r.':G'.$r); 
			$sheet->getStyle('E'.$r.':G'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('E'.$r.':G'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('E'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('E'.$r, $year." г.");			
			$r++;
			
			$sheet->mergeCells('B'.$r.':D'.$r); 
			$sheet->getStyle('B'.$r.':D'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('B'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('B'.$r, '(дата)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия в составе:');			
			$r++;
			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'председатель комиссии:');			
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_1'].", ".$work_array[0]['member_1_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;	

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'члены комиссии:');
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_2'].", ".$work_array[0]['member_2_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;

			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_3'].", ".$work_array[0]['member_3_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия провела проверку знаний по вопросам охраны труда:');			
			$r++;

		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$sheet->getRowDimension($r)->setRowHeight(60);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'Фамилия, собственное имя, отчество(если таковое имеется) лица, проходящего проверку знаний');
			$sheet->setCellValue('H'.$r, 'Профессия рабочего, должность служащего или отдельный вид работ(услуг) лица, проходящего проверку, наименование организации(индивидуальный предприниматель, вид деятельности)');
			$sheet->setCellValue('O'.$r, 'Вид проверки знаний');
			$sheet->setCellValue('S'.$r, 'Номер билета');
			$sheet->setCellValue('U'.$r, 'Результат проверки знаний(сдан, не сдан, не завершен)');
			$sheet->setCellValue('X'.$r, 'Роспись лица, проходившего проверку знаний по вопросам охраны труда');
			$r++;
			
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(10);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, '2');
			$sheet->setCellValue('H'.$r, '3');
			$sheet->setCellValue('O'.$r, '4');
			$sheet->setCellValue('S'.$r, '5');
			$sheet->setCellValue('U'.$r, '6');
			$sheet->setCellValue('X'.$r, '7');			
			$r++;
		//---------------------------------------  заполнение таблицы ---------------------------//

			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);			
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9)->setItalic(true);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(200);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);

			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, $work_array[0]['person_name']);
			$sheet->setCellValue('H'.$r, $work_array[0]['person_position']." - лицо, ответственное за тепловое хозяйство ".$work_array[0]['unp_name'].", (".$work_array[0]['themes'].")");
			$sheet->setCellValue('O'.$r, $work_array[0]['spr_test_reasons_teplo_name']);
			$sheet->setCellValue('S'.$r, '-');
			$sheet->setCellValue('U'.$r, $work_array[0]['test_result']." (до ".date('d.m.Y',strtotime($work_array[0]['test_validity'])).")");
			$sheet->setCellValue('X'.$r, '');
			$r=$r+2;


			/********************* председатель комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Председатель комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_1']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			/********************* члены комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Члены комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_2']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_3']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;		

       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/examination/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'protokol.xls"');
			$writer->save($path_doc.'protokol.xls');
	}



/******************************************************************************************************************************/
/*********************************************** Печать протокола газ  **********************************************************/	
/******************************************************************************************************************************/

	public function ZurnalByMainPage_g($work_array,$filter){

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
			
			$sheet->setTitle('Протокол');
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

	    //--------------------------------------------- ПРОТОКОЛ---------------------------//																					
			$sheet->mergeCells('A'.$r.':Z'.$r); 															
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия для проверки знаний по вопросам охраны труда');			
			$r++;																							
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);				
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['branch_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование комиссии)');				
			$r++;
			
			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $work_array[0]['podrazd_name'].", ".$work_array[0]['otdel_name']);			
			$r++;

			$sheet->mergeCells('A'.$r.':Z'.$r); 
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('A'.$r, '(наименование межрайонного отделения, районной энергогазинспекции)');				
			$r=$r+3;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setBold(true) ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'ПРОТОКОЛ');			
			$r++;	

			$sheet->mergeCells('A'.$r.':S'.$r);
			$sheet->getStyle('A'.$r.':S'.$r)->getAlignment()->setHorizontal('right');			
			$sheet->getStyle('A'.$r.':S'.$r) ->getFont() ->setBold(true) ->setSize(12);																					
			$sheet->setCellValue('A'.$r, 'проверки знаний по вопросам охраны труда № ');			
			$sheet->mergeCells('T'.$r.':W'.$r);
			$sheet->getStyle('T'.$r.':W'.$r)->getAlignment()->setHorizontal('left');	
			$sheet->getStyle('T'.$r.':W'.$r) ->getFont() ->setBold(true) ->setSize(12) ->setUnderline(true);			
			$sheet->setCellValue('T'.$r, $work_array[0]['doc_number']);
			$sheet->getRowDimension($r)->setRowHeight(20);	
			$r=$r+2;		

			$timestamp = strtotime($work_array[0]['date']);
			$year = date('Y', $timestamp);
			$month = date('m', $timestamp);
			$day = date('d', $timestamp);


			$sheet->getStyle('A'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('A'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, $day);	
			
	
			$sheet->getStyle('C'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('C'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('C'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('C'.$r, $month);				
			
			$sheet->mergeCells('E'.$r.':G'.$r); 
			$sheet->getStyle('E'.$r.':G'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('E'.$r.':G'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('E'.$r) ->getFont() ->setSize(12);					
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('E'.$r, $year." г.");			
			$r++;
			
			$sheet->mergeCells('B'.$r.':D'.$r); 
			$sheet->getStyle('B'.$r.':D'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('B'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('B'.$r, '(дата)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия в составе:');			
			$r++;
			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'председатель комиссии:');			
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_1'].", ".$work_array[0]['member_1_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;	

			$sheet->mergeCells('A'.$r.':G'.$r); 	
			$sheet->getStyle('A'.$r.':G'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'члены комиссии:');
			
			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_2'].", ".$work_array[0]['member_2_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r++;

			$sheet->mergeCells('H'.$r.':Z'.$r); 	
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('H'.$r, $work_array[0]['member_3'].", ".$work_array[0]['member_3_position']);			
			$r++;	

			$sheet->mergeCells('H'.$r.':Z'.$r); 
			$sheet->getStyle('H'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(должность служащего, фамилия, инициалы)');				
			$r=$r+2;

			$sheet->mergeCells('A'.$r.':Z'.$r); 	
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Комиссия провела проверку знаний по вопросам охраны труда:');			
			$r++;

		//---------------------------------------  шапка таблицы ---------------------------------//
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$sheet->getRowDimension($r)->setRowHeight(60);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '№ п/п');
			$sheet->setCellValue('C'.$r, 'Фамилия, собственное имя, отчество(если таковое имеется) лица, проходящего проверку знаний');
			$sheet->setCellValue('H'.$r, 'Профессия рабочего, должность служащего или отдельный вид работ(услуг) лица, проходящего проверку, наименование организации(индивидуальный предприниматель, вид деятельности)');
			$sheet->setCellValue('O'.$r, 'Вид проверки знаний');
			$sheet->setCellValue('S'.$r, 'Номер билета');
			$sheet->setCellValue('U'.$r, 'Результат проверки знаний(сдан, не сдан, не завершен)');
			$sheet->setCellValue('X'.$r, 'Роспись лица, проходившего проверку знаний по вопросам охраны труда');
			$r++;
			
			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(10);			
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);		
			
			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, '2');
			$sheet->setCellValue('H'.$r, '3');
			$sheet->setCellValue('O'.$r, '4');
			$sheet->setCellValue('S'.$r, '5');
			$sheet->setCellValue('U'.$r, '6');
			$sheet->setCellValue('X'.$r, '7');			
			$r++;
		//---------------------------------------  заполнение таблицы ---------------------------//

			$sheet->mergeCells('A'.$r.':B'.$r);
			$sheet->mergeCells('C'.$r.':G'.$r);
			$sheet->mergeCells('H'.$r.':N'.$r);
			$sheet->mergeCells('O'.$r.':R'.$r);
			$sheet->mergeCells('S'.$r.':T'.$r);
			$sheet->mergeCells('U'.$r.':W'.$r);
			$sheet->mergeCells('X'.$r.':Z'.$r);			
			
			$sheet->getStyle('A'.$r.':Z'.$r) ->getFont() ->setSize(9)->setItalic(true);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->getRowDimension($r)->setRowHeight(200);
			$sheet->getStyle('A'.$r.':Z'.$r)->getAlignment()->setWrapText(true);
			$spreadsheet->getActiveSheet()->getStyle('A'.$r.':Z'.$r) ->getBorders() ->getallBorders() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);

			$sheet->setCellValue('A'.$r, '1');
			$sheet->setCellValue('C'.$r, $work_array[0]['person_name']);
			$sheet->setCellValue('H'.$r, $work_array[0]['person_position']." - лицо, ответственное за газовое хозяйство ".$work_array[0]['unp_name'].", (".$work_array[0]['themes'].")");
			$sheet->setCellValue('O'.$r, $work_array[0]['spr_test_reasons_gaz_name']);
			$sheet->setCellValue('S'.$r, '-');
			$sheet->setCellValue('U'.$r, $work_array[0]['test_result']." (до ".date('d.m.Y',strtotime($work_array[0]['test_validity'])).")");
			$sheet->setCellValue('X'.$r, '');
			$r=$r+2;


			/********************* председатель комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Председатель комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_1']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			/********************* члены комиссии ****************/
			$sheet->mergeCells('A'.$r.':F'.$r); 	
			$sheet->getStyle('A'.$r.':F'.$r)->getAlignment()->setHorizontal('left');			
			$sheet->getStyle('A'.$r) ->getFont() ->setSize(12);									
			$sheet->getRowDimension($r)->setRowHeight(20);													
			$sheet->setCellValue('A'.$r, 'Члены комиссии:');	

			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_2']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('H'.$r.':K'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);			
			$sheet->mergeCells('O'.$r.':Z'.$r); 										
			$sheet->getRowDimension($r)->setRowHeight(20);
			$spreadsheet->getActiveSheet()->getStyle('O'.$r.':Z'.$r) ->getBorders() ->getBottom() ->setBorderStyle(\Library\PhpSpreadsheet\Style\Border::BORDER_THIN);
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');
			$sheet->setCellValue('O'.$r, $work_array[0]['member_3']);
			$r++;
			
			$sheet->mergeCells('H'.$r.':K'.$r);  
			$sheet->getStyle('H'.$r.':K'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('H'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('H'.$r, '(личная подпись)');				
			$sheet->mergeCells('O'.$r.':Z'.$r);  
			$sheet->getStyle('O'.$r.':Z'.$r)->getAlignment()->setHorizontal('center');		
			$sheet->getStyle('O'.$r) ->getFont() ->setSize(8);					
			$sheet->getRowDimension($r)->setRowHeight(10);													
			$sheet->setCellValue('O'.$r, '(инициалы, фамилия)');			
			$r++;		

       //------------------------------------------- вывод на экран ----------------------------//
			$writer = new Xls($spreadsheet);
			//Сохраняем файл в текущей папке, в которой выполняется скрипт.
			//Чтобы указать другую папку для сохранения. 
			//Прописываем полный путь до папки и указываем имя файла
			
			$path_doc = $_SERVER['DOCUMENT_ROOT'].'/ARM/examination/PrintDoc/';
			
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$path_doc.'protokol.xls"');
			$writer->save($path_doc.'protokol.xls');
	}	
	
}
?>