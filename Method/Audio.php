<?php
namespace GDO\Buzzerapp\Method;

use GDO\Buzzerapp\BUZ_Button;
use GDO\Core\Method;
use GDO\Util\Common;

final class Audio extends Method
{
	public function execute()
	{
		$buttonId = Common::getRequestString('button');
		$button = BUZ_Button::findById($buttonId);
		$fileId = $button->getSample()->getFileID();
		return method('GWF', 'GetFile')->executeWithId($fileId);
	}
}
