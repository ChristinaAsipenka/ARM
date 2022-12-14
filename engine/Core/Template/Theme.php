<?php

namespace Engine\Core\Template;

use Engine\Core\Config\Config;

//use Engine\Core\Template\Asset;

class Theme
{
    /**
     * Rules template name
     */
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s',
    ];

    const URL_THEME_MASK = '%s/content/themes/%s';
	/**
     * Url current theme
     * @type string
     */
    protected static $url = '';

    /**
     * @var array
     */
    protected static $data = [];

	public $asset;
	
	public $theme;
	
	public function __construct(){
	
		$this->theme = $this;
		$this->asset = new Asset();
	}
	
	
	public static function getUrl(){
	
		//$currentTheme = Config::item('defaultTheme', 'main');
	$currentTheme = 'default';
	$baseUrl = '/ARM';
	
		return sprintf(self::URL_THEME_MASK, $baseUrl, $currentTheme);
		
	}
	
	public static function title(){
	

		$nameSite = Setting::get('name_site');
		$description = Setting::get('description');
	
		echo $nameSite . ' | ' . $description;
		
	}
	
	
	
	
    /**
     * @param null $name
     */
    public static function header($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }
	
	 /**
     * @param null $name
     */
    public static function functions($name = null)
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     */
    public static function footer($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     */
    public static function sidebar($name = '')
    {
        $name = (string) $name;
        $file = self::detectNameFile($name, __FUNCTION__);

        Component::load($file);
    }

    /**
     * @param string $name
     * @param array $data
     */
    public static function block($name = '', $data = [])
    {
        $name = (string) $name;

        if ($name !== '') {
            Component::load($name, $data);
        }
    }

    /**
     * @param $name
     * @param $function
     * @return string
     */
    private static function detectNameFile($name, $function)
    {
        return empty(trim($name)) ? $function : sprintf(self::RULES_NAME_FILE[$function], $name);
    }

    /**
     * @return array
     */
    public static function getData()
    {
        return static::$data;
    }

    /**
     * @param array $data
     */
    public static function setData($data)
    {
        static::$data = $data;
    }
	
	public static function getTemplatePath($template, $env = null)
    {
        if($env === 'Cms')
        {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return path('view') . '/' . $template . '.php';
    }
	
	public static function getThemePath()
    {

            return ROOT_DIR . '/content/themes/default/';

    }
}