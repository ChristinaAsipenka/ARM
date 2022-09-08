<?php

namespace Engine\Core\Template;

use Engine\Core\Template\Theme;
use Engine\DI\DI;
use Engine\Core\Template\Setting;

class View
{

    public $di;
    protected $theme;
	protected $setting;
	protected $menu;
	

    public function __construct(DI $di)
    {
        $this->di    = $di;
        $this->theme = new Theme();
		$this->setting = new Setting($di);
		$this->menu = new Menu($di);
		
    }


    public function render($template, $data = [])
    {
		/*include_once $this->getThemePath() . 'functions.php';*/
        
		
		$functions = Theme::getThemePath() . '/functions.php';
		
		if(file_exists($functions)){
			include_once $functions;
		}
		
		
		
		
		
		$templatePath = $this->getTemplatePath($template, ENV);

        if(!is_file($templatePath))
        {
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );
        }

        $data['lang'] = $this->di->get('language');
        $this->theme->setData($data);
        extract($data);

        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        }catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean();
    }


    /**
     * @param $template
     * @param null $env
     * @return string
     */
    private function getTemplatePath($template, $env = null)
    {
        if($env === 'Cms')
        {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';   
        }

        return path('view') . '/' . $template . '.php';
    }
	
	private function getThemePath()
    {

            return ROOT_DIR . '/content/themes/default/';

    }
	
	
	
	
	
}