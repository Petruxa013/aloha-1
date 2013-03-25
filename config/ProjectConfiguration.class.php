<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__) . '/../lib/vendor/phpexcel/PHPExcel.php';
sfCoreAutoload::register();

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

class ProjectConfiguration extends sfProjectConfiguration
{
	public function setup()
	{
		$this->enablePlugins('sfDoctrinePlugin');
		$this->enablePlugins('sfDoctrineGuardPlugin');
		$this->enablePlugins('bootstrapAdminThemePlugin');
		$this->enablePlugins('csDoctrineActAsAttachablePlugin');
		$this->enablePlugins('idlErrorManagementPlugin');
	}
}
