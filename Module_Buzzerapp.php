<?php
namespace GDO\Buzzerapp;

use GDO\Core\Module;
use GDO\Date\GDO_Duration;
use GDO\File\GDO_Filesize;
use GDO\Template\GDO_Bar;

final class Module_Buzzerapp extends Module
{
	public $module_priority = 99;
	public function getClasses() { return ['GDO\Buzzerapp\BUZ_Sample', 'GDO\Buzzerapp\BUZ_Button']; }
	
	##############
	### Config ###
	##############
	public function getConfig()
	{
		return array(
			GDO_Filesize::make('buzz_file_size')->initial(1000000)->unsigned()->max(100000000),
			GDO_Duration::make('buzz_sample_length')->initial('10')->max(600),
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
		$this->addJavascript('js/buz-ctrl.js');
	}

	##############
	### Render ###
	##############
	public function onRenderTabs()
	{
		return $this->templatePHP('tabs.php');
	}
	
	public function onRenderFor(GDO_Bar $navbar)
	{
		$this->templatePHP('sidebars.php', ['navbar' => $navbar]);
	}
}
