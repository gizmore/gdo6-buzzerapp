<?php
namespace GDO\Buzzerapp\Method;

use GDO\Audio\GDT_AudioIcon;
use GDO\Buzzerapp\BUZ_Button;
use GDO\Core\Method;
use GDO\Net\Stream;
use GDO\Util\Common;

final class Icon extends Method
{
	public function execute()
	{
		$buttonId = Common::getRequestString('button');
		$button = BUZ_Button::findById($buttonId);
		$file = $button->getSample()->getFile();
		$icon = GDT_AudioIcon::make()->file($file)->generatePNG();
		$path = $icon->tempPathFile('.png');
		header('Content-Type: image/png');
		header('Content-Size: '.filesize($path));
		Stream::path($path);
	}
}
