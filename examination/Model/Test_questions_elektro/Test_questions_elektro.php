<?php

namespace Examination\Model\Test_questions_elektro;

use Engine\Core\Database\ActiveRecord;

class test_questions_elektro
{
    use ActiveRecord;

    protected $table = 'test_questions_elektro';

    public $id;
    public $id_theme;
	public $question;

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
    public function getId_theme()
    {
        return $this->id_theme;
    }
    public function setId_theme($id_theme)
    {
        $this->id_theme = $id_theme;
    }
 /////////////////////////////////////////
    public function getQuestion()
    {
        return $this->question;
    }
    public function setQuestion($question)
    {
        $this->question = $question;
    }  
}