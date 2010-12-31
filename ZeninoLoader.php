<?php

require_once dirname(__FILE__).'/autoload/DirectoriesAutoloader.php';
  
class ZeninoLoader
{
	static protected
		$paths = null,
    $cache_dir = null;
    
	static public function register()
  {
    self::setupPaths();
    $autoloader = DirectoriesAutoloader::instance(self::$cache_dir);
    foreach(self::$paths as $dir)
    {
      $autoloader->addDirectory($dir);
    }
    spl_autoload_register(array($autoloader, 'autoload'));
  }
  
  static protected function setupPaths()
  {
    if(is_null(self::$paths))
    {
      self::$paths = array(
        dirname(__FILE__).'/core',
        dirname(__FILE__).'/container',
        dirname(__FILE__).'/exception',
        dirname(__FILE__).'/i18n',
        dirname(__FILE__).'/util',
        dirname(__FILE__).'/helper'
      );
    }
    if(is_null(self::$cache_dir))
    {
      self::$cache_dir = dirname(__FILE__).'/cache/autoload.cache.php';
    }   
  }
  
}
