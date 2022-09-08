<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/ARM/examination/loadExcel/PHPExcel-1.8/Classes/PHPExcel.php';
$connect = mysqli_connect('localhost','root','admin','gegn');
//$excel = PHPExcel_IOFactory::load('questions.xlsx');


for($i=1; $i <=4; $i++){
$excel = parse_excel_file('questions.xlsx', $i-1);

//print_r($excel);


	foreach($excel as $array_item){
		
		$str0 = trim($array_item[0]);
		$str1 = trim($array_item[1]);
		$str2 = trim($array_item[2]);
		$str3 = trim($array_item[3]);
		$str4 = trim($array_item[4]);
		
		$id_qstn = mysqli_query($connect, "INSERT INTO `test_questions_teplo` (`id_theme`, `question`) VALUES  ('".$i."', '$str0')");
		
		$id_qstn_arr = mysqli_query($connect, "SELECT * FROM `test_questions_teplo` WHERE `question` LIKE '$str0' AND `id_theme`=".$i."");
		
		$id_qstn = mysqli_fetch_array($id_qstn_arr);
		
		echo 'id вопроса -> '.$id_qstn['id'].'<br>';
		
		$id_qstn =$id_qstn['id'];
		
		$arr_answrs = mysqli_query($connect, "INSERT INTO `test_answers_teplo` (`id_question`, `answer`, `mark`) VALUES  ('$id_qstn', '$str1', '1')");
		print_r($arr_answrs);
		echo '1->'.$str1.'<br>';
		$arr_answrs = mysqli_query($connect, "INSERT INTO `test_answers_teplo` (`id_question`, `answer`, `mark`) VALUES  ('$id_qstn', '$str2', '0')");
		print_r($arr_answrs);
		echo '2->'.$str2.'<br>';
		$arr_answrs = mysqli_query($connect, "INSERT INTO `test_answers_teplo` (`id_question`, `answer`, `mark`) VALUES  ('$id_qstn', '$str3', '0')");
		print_r($arr_answrs);
		echo '3->'.$str3.'<br>';
		$arr_answrs = mysqli_query($connect, "INSERT INTO `test_answers_teplo` (`id_question`, `answer`, `mark`) VALUES  ('$id_qstn', '$str4', '0')");
		print_r($arr_answrs);
		echo '4->'.$str4.'<br>';
		
		
	}

}


function parse_excel_file( $filename , $i){
	// подключаем библиотеку
	require_once dirname(__FILE__) . '/PHPExcel-1.8/Classes/PHPExcel.php';

	$result = array();

	// получаем тип файла (xls, xlsx), чтобы правильно его обработать
	$file_type = PHPExcel_IOFactory::identify( $filename );
	// создаем объект для чтения
	$objReader = PHPExcel_IOFactory::createReader( $file_type );
	$objPHPExcel = $objReader->load( $filename ); // загружаем данные файла в объект
	$objPHPExcel->setActiveSheetIndex($i);
	$result = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив

	return $result;
}

?>