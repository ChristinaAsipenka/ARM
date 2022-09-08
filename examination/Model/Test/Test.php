<?php

namespace Examination\Model\Test;

use Engine\Core\Database\ActiveRecord;

class test
{
    use ActiveRecord;

    protected $table = 'test_result';

    public $id;
	public $id_otv;
    public $id_napr;
	public $id_group;
	public $num_sv;
	public $date_sv;
	public $num_pr;
	public $date_pr;
	public $name_org;
	public $test_vid;

/////////////////////////////////////////
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
////////////////////////////////////////
    public function getId_otv()
    {
        return $this->id_otv;
    }
    public function setId_otv($id_otv)
    {
        $this->id_otv = $id_otv;
    } 
 /////////////////////////////////////////
    public function getId_napr()
    {
        return $this->id_napr;
    }
    public function setId_napr($id_napr)
    {
        $this->id_napr = $id_napr;
    }
  /////////////////////////////////////////
    public function getId_group()
    {
        return $this->id_group;
    }
    public function setId_group($id_group)
    {
        $this->id_group = $id_group;
    }
  /////////////////////////////////////////
    public function getNum_sv()
    {
        return $this->num_sv;
    }
    public function setNum_sv($num_sv)
    {
        $this->num_sv = $num_sv;
    } 
  /////////////////////////////////////////
    public function getDate_sv()
    {
        return $this->date_sv;
    }
    public function setDate_sv($date_sv)
    {
        $this->date_sv = $date_sv;
    } 
  /////////////////////////////////////////
    public function getNum_pr()
    {
        return $this->num_pr;
    }
    public function setNum_pr($num_pr)
    {
        $this->num_pr = $num_pr;
    } 	
  /////////////////////////////////////////
    public function getDate_pr()
    {
        return $this->date_pr;
    }
    public function setDate_pr($date_pr)
    {
        $this->date_pr = $date_pr;
    } 
  /////////////////////////////////////////
    public function getName_org()
    {
        return $this->name_org;
    }
    public function setName_org($name_org)
    {
        $this->name_org = $name_org;
    } 
  /////////////////////////////////////////
    public function getTest_vid()
    {
        return $this->test_vid;
    }
    public function setTest_vid($test_vid)
    {
        $this->test_vid = $test_vid;
    } 	
}