<?php

namespace Examination\Model\Loadexcel;

use Engine\Model;

class LoadexcelRepository extends Model
{
    public function pre_search_result($work_array, $preResultStr, $search_field)
    {
		//echo $search_field;

		if(count($work_array) > 0) {
			$current_id = 0;
			$current_rp_fio = '';
				//print_r($work_array);
				foreach($work_array as $item_array){
					
					if($search_field =='rp_fio'){
							if($current_rp_fio != $item_array['firstname']){
								$preResultStr .= "<li>$item_array[secondname]</li>";
								$current_rp_fio = $item_array['secondname'];
								
							}						
						
						}else if($search_field =='reestr_unp_name'){
							if($current_name != $item_array['reestr_unp_name']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								
								$current_name = $item_array['reestr_unp_name'];
							}
						}else if($search_field =='unp'){
							if($current_id != $item_array['unp']){
								$preResultStr .= "<li>$item_array[$search_field]</li>";
								$current_id = $item_array['unp'];
								
							}
						}							
				};
			}
		return $preResultStr;

    }	
	
	
}	