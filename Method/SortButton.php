<?php
namespace GDO\Buzzerapp\Method;

use GDO\Buzzerapp\BUZ_Button;
use GDO\Core\GDO;
use GDO\Table\MethodSort;
use GDO\User\GDO_User;

final class SortButton extends MethodSort
{
	public function gdoSortObjects() { return BUZ_Button::table(); }
	
	public function canSort(GDO $gdo)
	{
		$gdo instanceof BUZ_Button;
		return $gdo->getUserID() === GDO_User::current()->getID();
	}
	
}
