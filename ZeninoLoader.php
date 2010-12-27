<?php
class ZeninoLoader
{
	static protected
    $instance = null,
		$paths = array(
			dirname(__FILE__).'/core/',
			dirname(__FILE__).'/container/',
			dirname(__FILE__).'/exception/',
			dirname(__FILE__).'/i12n/',
			dirname(__FILE__).'/util/'
		);
		
	protected function __construct(){}
	/**
	 * Retrieves the singleton instance of this class.
	 *
	 * @return ZeninoLoader A ZeninoLoader instance.
	 */
	static public function getInstance()
	{
		if (!isset(self::$instance))
		{
			self::$instance = new ZeninoLoader();
		}
		return self::$instance;
	}
	/**
	 * Register ZeninoLoader in spl autoloader.
	 *
	 * @return void
	 */
	static public function register()
	{
		if (false === spl_autoload_register(array(self::getInstance(), 'autoload')))
		{
			throw new Exception(
				sprintf(
					'Unable to register %s::autoload as an autoloading method.', 
					get_class(self::getInstance())
				)
			);
		}
	}
	/**
	 * Handles autoloading of classes
	 *
	 * @param  string  $class  A class name.
	 *
	 * @return boolean Returns true if the class has been loaded
	 */
	public function autoload($class)
	{
    if (class_exists($class, false) || interface_exists($class, false))
    {
      return true;
    }
		foreach(self::$paths as $path)
		{
			if (!file_exists($path . $file))
			{
					return false;
			}
			require $file;
		}
		return true;
	}
	
}