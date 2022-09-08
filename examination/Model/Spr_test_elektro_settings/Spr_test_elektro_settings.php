<?php

namespace Examination\Model\Spr_test_elektro_settings;

use Engine\Core\Database\ActiveRecord;

class spr_test_elektro_settings
{
    use ActiveRecord;

    protected $table = 'spr_test_elektro_settings';

    public $id;
    public $name;
	public $group2;
	public $group3;
	public $group4;
	public $group5;

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
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
 /////////////////////////////////////////
    public function getGroup2()
    {
        return $this->group2;
    }
    public function setGroup2($group2)
    {
        $this->group2 = $group2;
    }
 /////////////////////////////////////////
    public function getGroup3()
    {
        return $this->group3;
    }
    public function setGroup3($group3)
    {
        $this->group3 = $group3;
    }
 /////////////////////////////////////////
    public function getGroup4()
    {
        return $this->group4;
    }
    public function setGroup4($group4)
    {
        $this->group4 = $group4;
    }
 /////////////////////////////////////////
    public function getGroup5()
    {
        return $this->group5;
    }
    public function setGroup5($group5)
    {
        $this->group5 = $group5;
    }




}