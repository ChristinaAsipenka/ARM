<?php

namespace Engine;

use Engine\Core\Database\QueryBuilder;
use Engine\DI\DI;

abstract class Model
{
    /**
     * @var DI
     */
    protected $di;

    protected $db;

    protected $config;

    public $queryBuilder;
	
	protected $load;

    /**
     * Model constructor.
     * @param $di
     */
    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->config  = $this->di->get('config');
		$this->load    = $this->di->get('load');

        $this->queryBuilder = new QueryBuilder();
    }
}