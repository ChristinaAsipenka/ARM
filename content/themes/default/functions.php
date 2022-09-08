<?php

function function_address($ar){


echo "HELLO";

	/*foreach ($ar as $key => $value) {
		$ar[$key]=trim($ar[$key]," \t\n\r\0\x0B");					// удаляем пробелы вначале и конце 	
		$ar[$key]=str_replace('  ',' ',$ar[$key]); 					// заменяем два пробела на один
	}

	$znak=".";   //последняя точка в адресе 
	
	if ($ar['on_ct_z']==0) 	{$ar['ct_z']=null;} 	 								// не выводим аргумент ['ct_z'] 
	if (($ar['ct_z']!=null) and ($ar['ct_keyr']==1))	{$ar['ct_z']="(".$ar['ct_z']." район)".$znak; 	$znak=", "; }										// аргумент ['ct_z'] с точкой а следующие с запятой
	
	if ($ar['flt']==null) 	{} 														else {	$ar['flt']=$ar['flt'].$znak;	$znak=", ";	} 					// аргумент ['flt'] с точкой а следующие с запятой					
	if ($ar['bld']==null) 	{$ar['bld']="номер дома неизвестен".$znak;	$znak=", ";}else {	$ar['bld']=$ar['bld'].$znak;	$znak=", ";	} 					// аргумент ['bld'] с точкой а следующие с запятой
	if ($ar['st']==null) 	{$ar['st']="улица неизвестна".$znak;	$znak=", ";} 	else {	$ar['st']=$ar['st_t'].trim($ar['st']).$znak;	$znak=", ";	}	// аргумент ['st'] добавляем тип ['st_t'] и  с точкой а следующие с запятой

	if ($ar['ct']==null) 	{
		if ($ar['ct_keyr']==1) {
			$ar['rgn']=null; 																// если областной область не выводим
			$ar['dst']=null;																// если областной район не выводим
			$ar['ct']=$ar['ct_t'].$ar['ct'].$znak;					 
			$znak=", ";																		// аргумент ['ct'] с точкой а следующие с запятой
		} else {
			$ar['ct']=$ar['ct_t'].$ar['ct'].$znak;	$znak=", ";	
		}
	}
	
	if ($ar['dst']==null) {} else {	$ar['dst']=$ar['dst']." район".$znak;	$znak=", ";	} 	// аргумент ['dst'] с точкой а следующие с запятой
	if ($ar['rgn']==null) {} else {	$ar['rgn']=$ar['rgn'].$znak;	$znak=", ";	} 			// аргумент ['rgn'] с точкой а следующие с запятой
	
	if ($ar['ind']==null) {} else {	$ar['ind']=$ar['ind'].$znak;	$znak=", ";	} 			// аргумент ['ind'] с точкой а следующие с запятой	
	if ($ar['on_ind']==0) {$ar['ind']=null;} 	  else { } 									// не выводим аргумент ['ind'] 
		
	$text=	$ar['ind'].$ar['rgn'].$ar['dst'].$ar['ct'].$ar['st'].$ar['bld'].$ar['flt'].$ar['ct_z'];		//сбор строки адреса
	if (mb_strlen($text)==0) {$text="-";}
	return $text;*/						
}

?>