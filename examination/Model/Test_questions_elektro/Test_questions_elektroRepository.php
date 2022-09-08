<?php

namespace Examination\Model\Test_questions_elektro;

use Engine\Model;

class test_questions_elektroRepository extends Model
{

    public function getTest_questions_elektro()
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_elektro')
            ->orderBy('test_questions_elektro.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getTest_questions_elektroData($id)
    {
        $test_questions_elektro = new Test_questions_elektro($id);

        return $test_questions_elektro->findOne();
    }
	
	
	public function getTest_questions_elektro_by_theme($id_theme, $limit)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_elektro')
			->where('id_theme', $id_theme)
			->orderByRand()
			->limit($limit)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function Select_questions_elektroByThemes($id_theme)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_elektro')
			->where('id_theme', $id_theme)
			->orderBy('test_questions_elektro.id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function createTest_questions_elektro($params)
    {
        $test_questions_elektro = new Test_questions_elektro;
        
		if(strlen($params['id_theme'])>0){
			$test_questions_elektro->setId_theme($params['id_theme']);
		}
		if(strlen($params['question'])>0){
			$test_questions_elektro->setQuestion($params['question']);
		}
		
		$test_questions_elektroId = $test_questions_elektro->save();

        return $test_questions_elektroId;
    }


    public function updateTest_questions_elektro($params)
    {
        if (isset($params['id'])) {
            $test_questions_elektro = new Test_questions_elektro($params['id']);
			
			if(strlen($params['id_theme'])>0){
				$test_questions_elektro->setId_theme($params['id_theme']);
			}
			if(strlen($params['question'])>0){
				$test_questions_elektro->setQuestion($params['question']);
			}
           
		   $test_questions_elektro->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_questions_elektro')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	
	
}