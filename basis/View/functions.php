<?php
/* преобразует адрес в удобочитаемый
для использования передать массив со следующими ассициативными ключами
	+ind		[0] индекс
	+rgn		[1] область		
	+dst		[2] район	
	+ct_t	[3] тип нас.пункта
	+ct		[4] город
	+ct_keyr	[5]	key region (областной или нет)
	+ct_z	[6] район города	
	+st_t	[7]	тип улицы
	+st		[8] улица		
	+bld		[9] дом		
	+flt		[10] помещение 	
	on_ind	[11] вывод индекса в адресе (0/1 off/on)
	on_ct_z	[12] вывод района города в адресе (0/1 off/on)
	
	Брест 46 	Витебск 376 	Гомель 902		Гродно 1111		Минск 1550 		Могилев 1798
*/
//function fun_address($ar['ind'],$ar['rgn'],$ar['dst'],$ar['ct_t'],$ar['ct'],$ar['ct_keyR'],$ar['ct_z'],$ar['st_t'],$ar['st'],$ar['bld'],$ar['flt'],$ar['on_ind'],$ar['on_Ct_Z']){


function function_address($params){

//print_r($params);

	$address_index  = trim($params[0]);
	$spr_region_name  = trim($params[1]);
	$spr_district_name  = trim($params[2]);
	$spr_type_city_name  = trim($params[3]);
	$spr_city_name  = trim($params[4]);
	$address_type_street  = trim($params[5]);
	$address_street  = trim($params[6]);
	$address_building  = trim($params[7]);
	$address_flat  = trim($params[8]);
	$spr_city_zone_name  = trim($params[9]);
	$spr_city_key_region  = trim($params[10]);
	
	$on_ind = trim($params[11]);
	$on_ct_z = trim($params[12]);
	
	
	
	
	/*foreach ($ar as $key => $value) {
		$ar[$key]=trim($ar[$key]," \t\n\r\0\x0B");					// удаляем пробелы вначале и конце 	
		$ar[$key]=str_replace('  ',' ',$ar[$key]); 					// заменяем два пробела на один
	}*/

	$znak=".";   //последняя точка в адресе 
	
	if ($on_ct_z==0){					// не выводим аргумент ['$spr_city_zone_name'] 
		$spr_city_zone_name=null;
	} 	 								
	
	if (($spr_city_zone_name!=null) and ($spr_city_key_region==1)){			// аргумент [$spr_city_zone_name] с точкой а следующие с запятой
		$spr_city_zone_name="(".$spr_city_zone_name." район)".$znak; 	
		$znak=", "; 
	}	
	
	if ($address_flat==null){        // аргумент [$address_flat] с точкой а следующие с запятой
		
	}else{	
		$address_flat=$address_flat.$znak;
		$znak=", ";	
		} 					
	

	if ($address_building==null){			// аргумент $address_building с точкой а следующие с запятой
		$address_building="номер дома неизвестен".$znak;	
		$znak=", ";
	}else{	
		$address_building=$address_building.$znak;	
		$znak=", ";	
	} 					
	
	
	if ($address_street==null){					// аргумент $address_street добавляем тип $address_type_street и  с точкой а следующие с запятой
		$address_street="улица неизвестна".$znak;	
		$znak=", ";
	}else{	
		$address_street=$address_type_street.trim($address_street).$znak;	
		$znak=", ";	
	}	

	if ($spr_city_name==null){
		
	}else{	
		if ($spr_city_key_region==1) {
			$spr_region_name=null; 																// если областной область не выводим
			$spr_district_name=null;																// если областной район не выводим
			$spr_city_name=$spr_type_city_name.$spr_city_name.$znak;					 
			$znak=", ";																		// аргумент $spr_city_name с точкой а следующие с запятой
		} else {
			$spr_city_name=$spr_type_city_name.$spr_city_name.$znak;	
			$znak=", ";	
		}
	}
	
	if($spr_district_name==null){			// аргумент $spr_district_name с точкой а следующие с запятой
		
	}else{
		$spr_district_name=$spr_district_name." район".$znak;	
		$znak=", ";	
	} 	
	
	
	
	if ($spr_region_name==null){				// аргумент $spr_region_name с точкой а следующие с запятой
		
	}else{	
		$spr_region_name=$spr_region_name.$znak;	
		$znak=", ";
	} 			
	
	
	
	if ($address_index==null || $address_index=='хххххх' || $address_index=='xxxxxx'){						// аргумент ['ind'] с точкой а следующие с запятой	
		$address_index=null;
	} else {	
		$address_index=$address_index.$znak;	
		$znak=", ";	
	} 			
	
	
	if ($on_ind ==0){							// не выводим аргумент ['ind']
		$address_index=null;
	}else {

	} 									 
		
	$addr =	$address_index.$spr_region_name.$spr_district_name.$spr_city_name.$address_street.$address_building.$address_flat.$spr_city_zone_name;		//сбор строки адреса
	
	if (mb_strlen($addr)==0){
		$addr="-";
	}


	return $addr;					
}

?>