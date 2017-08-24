<?php
namespace GDO\Buzzerapp\Method;

use GDO\Buzzerapp\BUZ_Button;
use GDO\DB\GDO;
use GDO\Table\MethodSort;
use GDO\User\User;

final class SortButton extends MethodSort
{
	public function gdoSortObjects() { return BUZ_Button::table(); }
	
	public function canSort(GDO $gdo)
	{
		$gdo instanceof BUZ_Button;
		return $gdo->getUserID() === User::current()->getID();
	}
	
}
