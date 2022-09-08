<?php

namespace Examination\Model\Test_answers_teplo;

use Engine\Model;

class test_answers_teploRepository extends Model
{

    public function getTest_answers_teplo()
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_teplo')
           // ->orderBy('test_questions_elektro.id', 'ASC')
            ->sql();

        return $this->db->query($sql);
    }


    public function getTest_answers_teploData($id)
    {
        $test_answers_teplo = new Test_answers_teplo($id);

        return $test_answers_teplo->findOne();
    }
	
	public function getTest_answers_by_question($id)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_teplo')
			->where('id_question', $id)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }
	
	public function getTest_answers_by_questionRand($id)
    {
        $sql = $this->queryBuilder->select()
            ->from('test_answers_teplo')
			->where('id_question', $id)
			->orderByRand()
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);
    }

	
	
    public function removeItems($itemId)
    {

		$sql = $this->queryBuilder
			->delete()
            ->from('test_answers_teplo')
            ->where('id', $itemId)
            ->sql();

        return $this->db->query($sql, $this->queryBuilder->values);

	}	
	
	public function createTest_answers_teplo($params)
    {
        
		//print_r($params);

            $test_answers_teplo = new Test_answers_teplo($params['id_answer1']);
			
			if(strlen($params['answer1'])>0){
				$test_answers_teplo->setId_question($params['id']);
				$test_answers_teplo->setAnswer($params['answer1']);
				$test_answers_teplo->setMark((1 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer2']);
			
			if(strlen($params['answer2'])>0){
				$test_answers_teplo->setId_question($params['id']);
				$test_answers_teplo->setAnswer($params['answer2']);
				$test_answers_teplo->setMark((2 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer3']);
			
			if(strlen($params['answer3'])>0){
				$test_answers_teplo->setId_question($params['id']);
				$test_answers_teplo->setAnswer($params['answer3']);
				$test_answers_teplo->setMark((3 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer4']);
			
			if(strlen($params['answer4'])>0){
				$test_answers_teplo->setId_question($params['id']);
				$test_answers_teplo->setAnswer($params['answer4']);
				$test_answers_teplo->setMark((4 == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			

    }	
	
	public function updateTest_answers_teplo($params)
    {
        

		if (isset($params['id'])) {
            $test_answers_teplo = new Test_answers_teplo($params['id_answer1']);
			
			if(strlen($params['answer1'])>0){
				$test_answers_teplo->setAnswer($params['answer1']);
				$test_answers_teplo->setMark(($params['id_answer1'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer2']);
			
			if(strlen($params['answer2'])>0){
				$test_answers_teplo->setAnswer($params['answer2']);
				$test_answers_teplo->setMark(($params['id_answer2'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer3']);
			
			if(strlen($params['answer3'])>0){
				$test_answers_teplo->setAnswer($params['answer3']);
				$test_answers_teplo->setMark(($params['id_answer3'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
			$test_answers_teplo = new Test_answers_teplo($params['id_answer4']);
			
			if(strlen($params['answer4'])>0){
				$test_answers_teplo->setAnswer($params['answer4']);
				$test_answers_teplo->setMark(($params['id_answer4'] == $params['mark'] ? 1 : 0));
			}
         
			$test_answers_teplo->save();
			
        }
    }
	

	
}