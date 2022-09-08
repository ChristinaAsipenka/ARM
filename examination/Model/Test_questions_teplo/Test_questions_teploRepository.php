<?php

namespace Examination\Model\Test_questions_teplo;

use Engine\Model;

class test_questions_teploRepository extends Model
{

    public function getTest_questions_teplo()
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_teplo')
            ->orderBy('test_questions_teplo.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getTest_questions_teploData($id)
    {
        $test_questions_teplo = new Test_questions_teplo($id);

        return $test_questions_teplo->findOne();
    }
	
	
	public function getTest_questions_teplo_by_theme($id_theme, $limit)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_teplo')
			->where('id_theme', $id_theme)
			->orderByRand()
			->limit($limit)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	public function Select_questions_teploByThemes($id_theme)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_questions_teplo')
			->where('id_theme', $id_theme)
			->orderBy('test_questions_teplo.id', 'ASC')
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

    public function createTest_questions_teplo($params)
    {
        $test_questions_teplo = new Test_questions_teplo;
        
		if(strlen($params['id_theme'])>0){
			$test_questions_teplo->setId_theme($params['id_theme']);
		}
		if(strlen($params['question'])>0){
			$test_questions_teplo->setQuestion($params['question']);
		}
		
		$test_questions_teploId = $test_questions_teplo->save();

        return $test_questions_teploId;
    }


    public function updateTest_questions_teplo($params)
    {
        if (isset($params['id'])) {
            $test_questions_teplo = new Test_questions_teplo($params['id']);
			
			if(strlen($params['id_theme'])>0){
				$test_questions_teplo->setId_theme($params['id_theme']);
			}
			if(strlen($params['question'])>0){
				$test_questions_teplo->setQuestion($params['question']);
			}
           
		   $test_questions_teplo->save();
        }
    }
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_questions_teplo')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}

	
	
}