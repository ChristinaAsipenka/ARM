<?php

namespace Examination\Model\Test;

use Engine\Model;

class testRepository extends Model
{

    public function getTest()
    {
        $sql = $this->queryBuilder->select()
            ->from('test_result')
            ->orderBy('id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }
	
	
	public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_result')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}
	


/*****************************************************************************************/
    public function getTestData($id)
    {
        $test = new Test($id);

        return $test->findOne();
    }


    public function InsertResult($params)
    {

print_r($params);
      /*  $test = new Test;
		
		if(strlen($params['id_otv'])>0){
			$test->setId_otv($params['id_otv']);
		}		
		if(strlen($params['id_napr'])>0){
			$test->setId_napr($params['id_napr']);
		}		
		if(strlen($params['id_group'])>0){
			$test->setId_group($params['id_group']);
		}		
		if(strlen($params['num_sv'])>0){
			$test->setNum_sv($params['num_sv']);
		}		
		if(strlen($params['date_sv'])>0){
			$test->setDate_sv($params['date_sv']);
		}		
		if(strlen($params['num_pr'])>0){
			$test->setNum_pr($params['num_pr']);
		}		
		if(strlen($params['date_pr'])>0){
			$test->setDate_pr($params['date_pr']);
		}		
		if(strlen($params['name_org'])>0){
			$test->setName_org($params['name_org']);
		}		
		
		
		$testId = $test->save();

        return $testId;*/
    }


    public function CreateTest($params)
    {

        $test = new Test;
		
		if(strlen($params['id_otv'])>0){
			$test->setId_otv($params['id_otv']);
		}		
		if(strlen($params['id_napr'])>0){
			$test->setId_napr($params['id_napr']);
		}		
		if(strlen($params['id_group'])>0){
			$test->setId_group($params['id_group']);
		}		
		if(strlen($params['test_vid'])>0){
			$test->setTest_vid($params['test_vid']);
		}		
	
		
		
		$testId = $test->save();

        return $testId;
    }
	
	

	













	
	
}