<?php

namespace Basis\Model\Api;

use Engine\Model;

class ApiRepository extends Model
{

    public function getPortalUnpData()
    {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			
	$unpData = trim($unp['VUNP']);	
	$url = 'http://www.portal.nalog.gov.by/grp/getData?unp='.$unpData.'&charset=UTF-8&type=json';

	curl_setopt($ch, CURLOPT_URL, $url);
	$response = curl_exec($ch);
	$data_arr = json_decode($response,true);
	
		foreach($data_arr as $data){
		//if(strcasecmp($data['CKODSOST'], '1') == 0){
		//	echo $data["VUNP"].'  '.$data['VNAIMK'].'<br/>'; 
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
					if(stristr($addr_item, 'г.') != FALSE || stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г.', '',trim($addr_item)));
					}
					if(stristr($addr_item, 'г ') != FALSE ){
						$city = trim(str_replace('г ', '',trim($addr_item)));
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
					if(stristr($addr_item, 'ул.') != FALSE){
						$street = trim(str_replace('ул.', '',trim($addr_item)));
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
					if(stristr($addr_item, 'д.') != FALSE){
						$some_str = trim(str_replace('д.', '',trim($addr_item)));
						if(strcmp(gettype($some_str[0]),'integer') === 0){
							
							$city = $some_str;
						}else{
							$build =$some_str;
						}
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
					
					if(stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'корп.') == FALSE && stristr($addr_item, 'д.') == FALSE && stristr($addr_item, 'г.') == FALSE && stristr($addr_item, 'обл.') == FALSE && stristr($addr_item, 'с/с.') == FALSE && stristr($addr_item, 'аг.') == FALSE  && stristr($addr_item, 'пер.') == FALSE && stristr($addr_item, 'пр.') == FALSE && stristr($addr_item, 'ком.') == FALSE && stristr($addr_item, 'к.') == FALSE  && stristr($addr_item, 'каб.') == FALSE  && stristr($addr_item, 'пом.') == FALSE  && stristr($addr_item, 'б-р.') == FALSE  && stristr($addr_item, 'офис') == FALSE && stristr($addr_item, 'этаж') == FALSE && stristr($addr_item, 'гп.') == FALSE && stristr($addr_item, 'р-н.') == FALSE && stristr($addr_item, 'пос.') == FALSE){
						$build = trim($addr_item);
					}
					
					if(stristr($addr_item, 'корп.') != FALSE || stristr($addr_item, 'к.') != FALSE){
						$build .= ' '. trim($addr_item);
					}

			}

		}
	curl_close($ch);

	};

	
	

      
  
	
	
	
	
	
	
	
}