<?php

namespace Basis\Controller;

use Admin\Controller\AdminController;


class LogController extends AdminController{
	
//////////////////////////////////////////////	
	static function createLogFile($dirName, $fileName){
		
		// $fileName - имя лог-файла. Решено брать id потребителя/объекта 
		// $dirName - имя директории 
		
		$fp = fopen($_SERVER['DOCUMENT_ROOT']."/ARM/basis/logs/".$dirName."/".$fileName.".txt", "w");
		fclose($fp);
	}
	
	static function addInLogFile($dirName, $fileName, $array){
		
		
		date_default_timezone_set('Europe/Minsk');
		
		$fp = $_SERVER['DOCUMENT_ROOT']."/ARM/basis/logs/".$dirName."/".$fileName.".txt";
		
	//echo(filesize($fp));
	// если файл больше 20 кб создаем его копию 
		if(filesize($fp) > 20000){
			copy($fp, $_SERVER['DOCUMENT_ROOT']."/ARM/basis/logs/".$dirName."/".$fileName.'_copy'.".txt");
			$fp_new = fopen($_SERVER['DOCUMENT_ROOT']."/ARM/basis/logs/".$dirName."/".$fileName.".txt", "w");
			fclose($fp_new);
		}
		
		$str=date('Y-m-d H:i:s').' id_user:'.$_COOKIE['id_user'].' auth_login:'.$_COOKIE['auth_login'].' ';
		
		foreach($array as $item=>$value){
			$str .= $item.'=>'.$value.' ';
		}
				
		file_put_contents($fp, $str. PHP_EOL, FILE_APPEND);
		
	}

	
}

?>