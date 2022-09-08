<?php

namespace Examination\Model\Test_answers_elektro;

use Engine\Core\Database\ActiveRecord;

class test_answers_elektro
{
    use ActiveRecord;

    protected $table = 'test_answers_elektro';

    public $id;
    public $id_question;
	public $answer;
	public $mark;

/////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
 /////////////////////////////////////////
    public function getId_question()
    {
        return $this->id_question;
    }
    public function setId_question($id_question)
    {
        $this->id_question = $id_question;
    }
 /////////////////////////////////////////
    public function getAnswer()
    {
        return $this->answer;
    }
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    } 
 /////////////////////////////////////////
    public function getMark()
    {
        return $this->mark;
    }
    public function setMark($mark)
    {
        $this->mark = $mark;
    }	
}