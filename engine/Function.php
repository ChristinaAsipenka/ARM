<?php

/**
 * Returns path to a Flexi CMS folder.
 *
 * @param  string $section
 * @return string
 */
function path($section)
{

	$pathMask = ROOT_DIR . DIRECTORY_SEPARATOR . '%s';
    // Return path to correct section.
   
	if(ENV == 'Cms'){
		
		$pathMask = ROOT_DIR . DIRECTORY_SEPARATOR . strtolower(ENV) . DIRECTORY_SEPARATOR . '%s';
	
	}


   switch (strtolower($section))
    {
        case 'controller':
			return sprintf($pathMask, 'Controller');
        case 'config':
			return sprintf($pathMask, 'Config');
        case 'model':
			return sprintf($pathMask, 'Model');
        case 'view':
			return sprintf($pathMask, 'View');
        case 'language':
			return sprintf($pathMask, 'Language');
        default:
            return ROOT_DIR;
    }
}

/**
 * Returns list languages
 *
 * @return array
 */
function languages()
{
    $directory = path('language');
    $list      = scandir($directory);
    $languages = [];

    if (!empty($list)) {
        unset($list[0]);
        unset($list[1]);

        foreach ($list as $dir) {
            $pathLangDir = $directory . DIRECTORY_SEPARATOR . $dir;
            $pathConfig  = $pathLangDir . '/config.json';
            if (is_dir($pathLangDir) and is_file($pathConfig)) {
                $config = file_get_contents($pathConfig);
                $info   = json_decode($config);

                $languages[] = $info;
				
				//echo $config;
				//print_r($info);
				
            }
        }
	
    }

    return $languages;
}