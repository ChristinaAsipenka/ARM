<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL ^ E_WARNING); 

require_once $_SERVER['DOCUMENT_ROOT'].'/ARM/examination/loadExcel/PHPExcel-1.8/Classes/PHPExcel.php';

$connect = mysqli_connect('localhost','root','admin','gegn');

$excel = parse_excel_file('unp_brest.xlsx', 0);

ini_set('max_execution_time', 900000);

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

//print_r($excel);

//$my_query = mysqli_query($connect, "INSERT INTO `_unp_temp` (`_unp_temp`.`VUNP`, `_unp_temp`.`indx`) SELECT `unp`, `index_p`  from `_potr`");
///$unp_arr = mysqli_query($connect, "SELECT VUNP FROM `_unp_temp` WHERE VNAIMP is null LIMIT 500");
//print_r($unp_arr);
$i=0;
$j=0;


foreach($excel as $unp){
	
	$unpData = trim($unp[0]);
	$i++;	
	echo $i.'. '.$unpData.'->';
	
	$my_query =mysqli_fetch_array(mysqli_query($connect, "SELECT id FROM `reestr_unp` WHERE unp = $unpData"));
	$my_query_temp =mysqli_fetch_array(mysqli_query($connect, "SELECT id FROM `unp_temp` WHERE VUNP = $unpData"));
	//print_r(mysqli_fetch_array($my_query));
	//echo !isset($my_query[0]).'</br>';
	
	if(!isset($my_query[0]) && !isset($my_query_temp[0])){
		$url = 'http://www.portal.nalog.gov.by/grp/getData?unp='.$unpData.'&charset=UTF-8&type=json';
		$j++;
		curl_setopt($ch, CURLOPT_URL, $url);
		$response = curl_exec($ch);
		$data_arr = json_decode($response,true);
		sleep(10);
		echo ' Запрос: '.$unpData.'<br/>'; 
		//$i++;
	foreach($data_arr as $data){
		//if(strcasecmp($data['CKODSOST'], '1') == 0){
			echo 'Ответ: '.$data["VUNP"].'  '.$data['VNAIMK'].'<br/>'; 
			
			$VUNP = trim($data["VUNP"]); 
			$VNAIMP = $data["VNAIMP"]; 
			$VNAIMK = $data['VNAIMK']; 
			$VPADRES = $data['VPADRES'];
			$DREG = $data['DREG'];
			$NMNS = $data['NMNS']; 
			$VMNS = $data['VMNS'];
			$CKODSOST = $data['CKODSOST']; 
			$VKODS = $data['VKODS'];
			$DLIKV = $data['DLIKV']; 
			$VLIKV = $data['VLIKV'];
			
			$addr_arr = explode(',', $VPADRES);
			//print_r($addr_arr);
			//echo '<br/>';
			$obl = '';
			$disrt = '';
			$city = '';
			$build = '';
			$street = '';
			$flat = '';
			foreach($addr_arr as $addr_item){
				
				
					if(stristr($addr_item, 'обл.') != FALSE){
						$obl = trim(str_replace('обл.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'р-н') != FALSE){
						$disrt = trim(str_replace('р-н', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'д.') != FALSE){
						$some_str = trim(str_replace('д.', '',trim($addr_item)));
						
						//if(strcmp(gettype($some_str[0]),'string') === 0){
						if(strlen($some_str) > 4 ){	
							$city = $some_str;
						}else{
							$build =$some_str;
						}
					}
					
					if(stristr($addr_item, 'пос.') != FALSE){
						$city = trim(str_replace('пос.', '',trim($addr_item)));
					}
					// агрогородок
					if(stristr($addr_item, 'аг.') != FALSE){
						$city = trim(str_replace('аг.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'гп.') != FALSE){
						$city = trim(str_replace('гп.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'гп') != FALSE){
						$city = trim(str_replace('гп', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'г.п.') != FALSE){
						$city = trim(str_replace('г.п.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'ул.') != FALSE){
						$street = trim(str_replace('ул.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'Ул.') != FALSE){
						$street = trim(str_replace('Ул.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пр.') != FALSE){
						$street = trim(str_replace('пр.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пер.') != FALSE){
						$street = trim(str_replace('пер.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'б-р.') != FALSE){
						$street = trim(str_replace('б-р.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'тр.') != FALSE){
						$street = trim(str_replace('тр.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'тр-т') != FALSE){
						$street = trim(str_replace('тр-т', '',trim($addr_item)));
					}
					
					if(stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г ', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'г.') != FALSE || stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'кв.') != FALSE){
						$flat = trim(str_replace('кв.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'ком.') != FALSE){
						$flat = trim(str_replace('ком.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'оф.') != FALSE){
						$flat = trim(str_replace('оф.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'офис') != FALSE){
						$flat = trim(str_replace('офис', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'каб.') != FALSE){
						$flat = trim(str_replace('каб.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'пом.') != FALSE){
						$flat = trim(str_replace('пом.', '',trim($addr_item)));
					}
					
					
					//// если без известных префиксов, то это скорее всего здание
					
					if(stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'д.') == FALSE && stristr($addr_item, 'г.') == FALSE && stristr($addr_item, 'обл.') == FALSE && stristr($addr_item, 'с/с.') == FALSE && stristr($addr_item, 'аг.') == FALSE  && stristr($addr_item, 'пер.') == FALSE && stristr($addr_item, 'пр.') == FALSE && stristr($addr_item, 'ком.') == FALSE && stristr($addr_item, 'к.') == FALSE  && stristr($addr_item, 'каб.') == FALSE  && stristr($addr_item, 'пом.') == FALSE  && stristr($addr_item, 'б-р.') == FALSE  && stristr($addr_item, 'офис') == FALSE && stristr($addr_item, 'этаж') == FALSE && stristr($addr_item, 'гп.') == FALSE && stristr($addr_item, 'г.п.') == FALSE && stristr($addr_item, 'р-н') == FALSE && stristr($addr_item, 'пос.') == FALSE && stristr($addr_item, 'с/с') == FALSE && stristr($addr_item, 'ул.') == FALSE  && stristr($addr_item, 'Ул.') != FALSE && stristr($addr_item, 'тр.') != FALSE && stristr($addr_item, 'тр-т') != FALSE){
						$build = trim($addr_item);
					}
					
					if(stristr($addr_item, 'корп.') != FALSE || stristr($addr_item, 'к.') != FALSE){
						$build .= ' '. trim($addr_item);
					}

			}

//exit(); 

$region_id = 0;
$district_id = 0;
$city_id = 0;


	//	if(strlen($VPADRES) > 0){
			
		
	//	echo 'here';	
			
		
		
		//$last_id = mysqli_query($connect, "SELECT * FROM `unp_temp` ORDER BY id DESC LIMIT 1"); // последний доавленный ID 
		
		$arr_city = mysqli_fetch_array(mysqli_query($connect, "SELECT `id`, `id_spr_district`  FROM `spr_city` WHERE name LIKE '$city'"));
		
			if(count($arr_city) > 0){
				$city_id = $arr_city['id'];
				$district_id = $arr_city['id_spr_district'];
			}
		
		$arr_distr =  mysqli_fetch_array(mysqli_query($connect, "SELECT `id`, `id_spr_region`  FROM `spr_district` WHERE name LIKE '$disrt'"));

	
			if(count($arr_distr) > 0){
				$district_id = $arr_distr['id'];
				$region_id = $arr_distr['id_spr_region'];
			}elseif($district_id>0){
				$arr_distr =  mysqli_fetch_array(mysqli_query($connect, "SELECT `id`, `id_spr_region`  FROM `spr_district` WHERE id =$district_id"));
				$region_id = $arr_distr['id_spr_region'];
			}
		
		$arr_region =  mysqli_fetch_array(mysqli_query($connect, "SELECT `id`  FROM `spr_region` WHERE name LIKE '$obl'"));
		
	
			if(count($arr_region) > 0){
				
				$region_id = $arr_region['id'];
			}
	//	}
		
		$my_query = mysqli_query($connect, "INSERT INTO `unp_temp` (`VUNP`, `VNAIMP`, `VNAIMK`, `VPADRES`, `DREG`, `NMNS`, `VMNS`, `CKODSOST`, `VKODS`, `DLIKV`, `VLIKV`, `obl`, `reg`, `city`, `ul`, `building`, `flat`, `cod_obl`, `cod_reg`, `cod_city`) VALUES  ('$VUNP', '$VNAIMP', '$VNAIMK', '$VPADRES', '$DREG', '$NMNS', '$VMNS', '$CKODSOST', '$VKODS', '$DLIKV', '$VLIKV', '$obl', '$disrt', '$city', '$street', '$build', '$flat', '$region_id', '$district_id', '$city_id')");
		
		
		
		
		
			//$my_query = mysqli_query($connect, "UPDATE `_unp_temp` SET  `VNAIMP` = '$VNAIMP', `VNAIMK` = '$VNAIMK', `VPADRES`='$VPADRES', `DREG`= '$DREG', `NMNS`='$NMNS', `VMNS`='$VMNS', `CKODSOST`='$CKODSOST', `VKODS`='$VKODS', `DLIKV`='$DLIKV', `VLIKV`='$VLIKV', `obl`='$obl', `reg`='$disrt', `city`='$city', `ul`='$street', `building`='$build', `flat`= '$flat' WHERE `VUNP`= '$VUNP'");
		echo 'Добавлено в таблицу: '.$my_query.'<br/><br/>';
		}
		
	
		}
	
//exit();
};
curl_close($ch);
//print_r($data);
echo $i;


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