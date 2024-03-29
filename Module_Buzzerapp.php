<?php
namespace GDO\Buzzerapp;

use GDO\Core\GDO_Module;
use GDO\Date\GDT_Duration;
use GDO\File\GDT_Filesize;
use GDO\UI\GDT_Link;
use GDO\UI\GDT_Page;
use GDO\Core\Application;

final class Module_Buzzerapp extends GDO_Module
{
	public $module_priority = 99;
	public function getClasses() { return ['GDO\Buzzerapp\BUZ_Sample', 'GDO\Buzzerapp\BUZ_Button']; }
	public function isSiteModule() { return true; }
	
	##############
	### Config ###
	##############
	public function getConfig()
	{
		return array(
			GDT_Filesize::make('buzz_file_size')->initial(1000000)->unsigned()->max(100000000),
			GDT_Duration::make('buzz_sample_length')->initial('10')->max("10m"),
		);
	}
	public function cfgMaxSize() { return $this->getConfigValue('buzz_file_size'); }
	public function cfgMaxLength() { return $this->getConfigValue('buzz_sample_length'); }
	
	################
	### Includes ###
	################
	public function onIncludeScripts()
	{
		$this->addCSS('css/buz.css');
		if (module_enabled('Angular') && Application::instance()->hasTheme('material'))
		{
		    $this->addJS('js/buz-ctrl.js');
		}
	}

	##############
	### Render ###
	##############
	public function onRenderTabs()
	{
	    GDT_Page::$INSTANCE->topTabs->addField(
	        $this->templatePHP('tabs.php'));
	}
	
	public function onInitSidebar()
	{
	    $nav = GDT_Page::$INSTANCE->topNav;
	    $nav->addField(GDT_Link::make('link_buzz')->href(href('Buzzerapp', 'Home')));
	}
	
}
