<?php

namespace Examination\Model\Test_book_t;

use Engine\Core\Database\ActiveRecord;

class test_book_t
{
    use ActiveRecord;

    protected $table = 'test_book_t';

	public $id; 
	public $doc_name; 
	public $doc_number; 
	public $date; 
	public $date_curr; 
	public $creator_id; 
	public $creator_fio; 
	public $person_id; 
	public $person_name; 
	public $person_position; 
	public $record_source; 
	public $test_result;
	public $record_mode; 
	public $test_validity; 
	public $branch_id; 
	public $otdel_id; 
	public $podrazd_id; 
	public $branch_full_name; 
	public $member_1_id; 
	public $member_1; 
	public $member_1_position; 
	public $member_2_id; 
	public $member_2; 
	public $member_2_position; 
	public $member_3_id; 
	public $member_3;
	public $member_3_position; 
	public $test_reasons_t; 
	public $themes; 
	public $test_result_resume; 
	public $test_result_resume2; 
	public $activity_line; 


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
    public function getDoc_name()
    {
        return $this->doc_name;
    }
    public function setDoc_name($doc_name)
    {
        $this->doc_name = $doc_name;
    }
  /////////////////////////////////////////
    public function getDoc_number()
    {
        return $this->doc_number;
    }
    public function setDoc_number($doc_number)
    {
        $this->doc_number = $doc_number;
    }
  /////////////////////////////////////////
    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    } 
	/////////////////////////////////////////
    public function getDate_curr()
    {
        return $this->date_curr;
    }
    public function setDate_curr($date_curr)
    {
        $this->date_curr = $date_curr;
    } 
  /////////////////////////////////////////
    public function getCreator_id()
    {
        return $this->creator_id;
    }
    public function setCreator_id($creator_id)
    {
        $this->creator_id = $creator_id;
    }	
	
  /////////////////////////////////////////
    public function getCreator_fio()
    {
        return $this->creator_fio;
    }
    public function setCreator_fio($creator_fio)
    {
        $this->creator_fio = $creator_fio;
    }	
  /////////////////////////////////////////
    public function getPerson_id()
    {
        return $this->person_id;
    }
    public function setPerson_id($person_id)
    {
        $this->person_id = $person_id;
    }	
  /////////////////////////////////////////
    public function getPerson_name()
    {
        return $this->person_name;
    }
    public function setPerson_name($person_name)
    {
        $this->person_name = $person_name;
    }	
  /////////////////////////////////////////
    public function getPerson_position()
    {
        return $this->person_position;
    }
    public function setPerson_position($person_position)
    {
        $this->person_position = $person_position;
    }	
/////////////////////////////////////////
    public function getRecord_source()
    {
        return $this->record_source;
    }
    public function setRecord_source($record_source)
    {
        $this->record_source = $record_source;
    }	
/////////////////////////////////////////
    public function getTest_result()
    {
        return $this->test_result;
    }
    public function setTest_result($test_result)
    {
        $this->test_result = $test_result;
    }	
/////////////////////////////////////////
    public function getRecord_mode()
    {
        return $this->record_mode;
    }
    public function setRecord_mode($record_mode)
    {
        $this->record_mode = $record_mode;
    }
/////////////////////////////////////////
    public function getTest_validity()
    {
        return $this->test_validity;
    }
    public function setTest_validity($test_validity)
    {
        $this->test_validity = $test_validity;
    }	
/////////////////////////////////////////
    public function getBranch_id()
    {
        return $this->branch_id;
    }
    public function setBranch_id($branch_id)
    {
        $this->branch_id = $branch_id;
    }	
/////////////////////////////////////////
    public function getOtdel_id()
    {
        return $this->otdel_id;
    }
    public function setOtdel_id($otdel_id)
    {
        $this->otdel_id = $otdel_id;
    }	
/////////////////////////////////////////
    public function getPodrazd_id()
    {
        return $this->podrazd_id;
    }
    public function setPodrazd_id($podrazd_id)
    {
        $this->podrazd_id = $podrazd_id;
    }	
/////////////////////////////////////////
    public function getBranch_full_name()
    {
        return $this->branch_full_name;
    }
    public function setBranch_full_name($branch_full_name)
    {
        $this->branch_full_name = $branch_full_name;
    }	
/////////////////////////////////////////
    public function getMember_1_id()
    {
        return $this->member_1_id;
    }
    public function setMember_1_id($member_1_id)
    {
        $this->member_1_id = $member_1_id;
    }
/////////////////////////////////////////
    public function getMember_1()
    {
        return $this->member_1;
    }
    public function setMember_1($member_1)
    {
        $this->member_1 = $member_1;
    }
/////////////////////////////////////////
    public function getMember_1_position()
    {
        return $this->member_1_position;
    }
    public function setMember_1_position($member_1_position)
    {
        $this->member_1_position = $member_1_position;
    }
/////////////////////////////////////////
    public function getMember_2_id()
    {
        return $this->member_2_id;
    }
    public function setMember_2_id($member_2_id)
    {
        $this->member_2_id = $member_2_id;
    }
/////////////////////////////////////////
    public function getMember_2()
    {
        return $this->member_2;
    }
    public function setMember_2($member_2)
    {
        $this->member_2 = $member_2;
    }
/////////////////////////////////////////
    public function getMember_2_position()
    {
        return $this->member_2_position;
    }
    public function setMember_2_position($member_2_position)
    {
        $this->member_2_position = $member_2_position;
    }	
/////////////////////////////////////////
    public function getMember_3_id()
    {
        return $this->member_3_id;
    }
    public function setMember_3_id($member_3_id)
    {
        $this->member_3_id = $member_3_id;
    }
/////////////////////////////////////////
    public function getMember_3()
    {
        return $this->member_3;
    }
    public function setMember_3($member_3)
    {
        $this->member_3 = $member_3;
    }
/////////////////////////////////////////
    public function getMember_3_position()
    {
        return $this->member_3_position;
    }
    public function setMember_3_position($member_3_position)
    {
        $this->member_3_position = $member_3_position;
    }
/////////////////////////////////////////
    public function getTest_reasons_t()
    {
        return $this->test_reasons_t;
    }
    public function setTest_reasons_t($test_reasons_t)
    {
        $this->test_reasons_t = $test_reasons_t;
    }	

/////////////////////////////////////////
    public function getThemes()
    {
        return $this->themes;
    }
    public function setThemes($themes)
    {
        $this->themes = $themes;
    }
/////////////////////////////////////////
    public function getTest_result_resume()
    {
        return $this->test_result_resume;
    }
    public function setTest_result_resume($test_result_resume)
    {
        $this->test_result_resume = $test_result_resume;
    }
/////////////////////////////////////////
    public function getTest_result_resume2()
    {
        return $this->test_result_resume2;
    }
    public function setTest_result_resume2($test_result_resume2)
    {
        $this->test_result_resume2 = $test_result_resume2;
    }	
/////////////////////////////////////////
    public function getActivity_line()
    {
        return $this->activity_line;
    }
    public function setActivity_line($activity_line)
    {
        $this->activity_line = $activity_line;
    }
}