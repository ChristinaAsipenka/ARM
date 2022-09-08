<?php

namespace Examination\Model\Test_answers_elektro;

use Engine\Model;

class test_answers_elektroRepository extends Model
{

    public function getTest_answers_elektro()
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_elektro')
           // ->orderBy('test_questions_elektro.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getTest_answers_elektroData($id)
    {
        $test_answers_elektro = new Test_answers_elektro($id);

        return $test_answers_elektro->findOne();
    }
	
	public function getTest_answers_by_question($id)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_elektro')
			->where('id_question', $id)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getTest_answers_by_questionRand($id)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_elektro')
			->where('id_question', $id)
			->orderByRand()
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }


   /* public function createTest_answers_elektro($params)
    {
        $test_answers_elektro = new Test_answers_elektro;
        
		if(strlen($params['id_question'])>0){
			$test_answers_elektro->setId_question($params['id_question']);
		}
		if(strlen($params['answer'])>0){
			$test_answers_elektro->setAnswer($params['answer']);
		}
		if(strlen($params['mark'])>0){
			$test_answers_elektro->setMark($params['mark']);
		}
		
		$test_answers_elektroId = $test_answers_elektro->save();

        return $test_answers_elektroId;
    }*/


   /* public function updateTest_question_elektro($params)
    {
        if (isset($params['id'])) {
            $test_answers_elektro = new Test_answers_elektro($params['id']);
			
		if(strlen($params['id_question'])>0){
			$test_answers_elektro->setId_question($params['id_question']);
		}
		if(strlen($params['answer'])>0){
			$test_answers_elektro->setAnswer($params['answer']);
		}
		if(strlen($params['mark'])>0){
			$test_answers_elektro->setMark($params['mark']);
		}
           
		   $test_answers_elektro->save();
        }
    }*/
	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_answers_elektro')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function createTest_answers_elektro($params)
    {
        
		//print_r($params);

            $test_answers_elektro = new Test_answers_elektro($params['id_answer1']);
			
			if(strlen($params['answer1'])>0){
				$test_answers_elektro->setId_question($params['id']);
				$test_answers_elektro->setAnswer($params['answer1']);
				$test_answers_elektro->setMark((1 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer2']);
			
			if(strlen($params['answer2'])>0){
				$test_answers_elektro->setId_question($params['id']);
				$test_answers_elektro->setAnswer($params['answer2']);
				$test_answers_elektro->setMark((2 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer3']);
			
			if(strlen($params['answer3'])>0){
				$test_answers_elektro->setId_question($params['id']);
				$test_answers_elektro->setAnswer($params['answer3']);
				$test_answers_elektro->setMark((3 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer4']);
			
			if(strlen($params['answer4'])>0){
				$test_answers_elektro->setId_question($params['id']);
				$test_answers_elektro->setAnswer($params['answer4']);
				$test_answers_elektro->setMark((4 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			

    }	
	
	public function updateTest_answers_elektro($params)
    {
        

		if (isset($params['id'])) {
            $test_answers_elektro = new Test_answers_elektro($params['id_answer1']);
			
			if(strlen($params['answer1'])>0){
				$test_answers_elektro->setAnswer($params['answer1']);
				$test_answers_elektro->setMark(($params['id_answer1'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer2']);
			
			if(strlen($params['answer2'])>0){
				$test_answers_elektro->setAnswer($params['answer2']);
				$test_answers_elektro->setMark(($params['id_answer2'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer3']);
			
			if(strlen($params['answer3'])>0){
				$test_answers_elektro->setAnswer($params['answer3']);
				$test_answers_elektro->setMark(($params['id_answer3'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
			$test_answers_elektro = new Test_answers_elektro($params['id_answer4']);
			
			if(strlen($params['answer4'])>0){
				$test_answers_elektro->setAnswer($params['answer4']);
				$test_answers_elektro->setMark(($params['id_answer4'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_elektro->save();
			
        }
    }
	

	
}