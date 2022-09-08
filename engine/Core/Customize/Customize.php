<?php
namespace Engine\Core\Customize;

use Engine\DI\DI;



class Customize
{

    protected $config;
    private static $instance = null;
	public static $di;


    public function __construct(DI $di)
    {
	   static::$di = $di;
	   $this->config = new Config();
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    protected function __clone()
    {
    }


    static public function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self(static::$di);
        }

        return self::$instance;
    }


    public function getAdminMenuItems()
    {
        return $this->getConfig()->get('dashboardMenu');
    }


   /* public function getAdminSettingItems()
    {
        return $this->getConfig()->get('settingMenu');
    }*/
	

	
	
	
}