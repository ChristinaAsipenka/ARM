<?php

namespace Examination\Model\Spr_test_teplo_settings;

use Engine\Core\Database\ActiveRecord;

class spr_test_teplo_settings
{
    use ActiveRecord;

    protected $table = 'spr_test_teplo_settings';

    public $id;
    public $name;
	public $count_g;


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
    public function getCount_g()
    {
        return $this->count_g;
    }
    public function setCount_g($count_g)
    {
        $this->count_g = $count_g;
    }





}