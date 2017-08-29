<?php
namespace GDO\Buzzerapp;

use GDO\DB\GDO;
use GDO\DB\GDT_AutoInc;
use GDO\DB\GDT_CreatedBy;
use GDO\DB\GDT_Object;
use GDO\Table\GDT_Sort;
use GDO\UI\GDT_Color;
use GDO\User\GDO_User;

final class BUZ_Button extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDT_AutoInc::make('button_id'),
			GDT_CreatedBy::make('button_user')->notNull(),
			GDT_Object::make('button_sample')->table(BUZ_Sample::table())->notNull(),
			GDT_Color::make('button_color'),
			GDT_Sort::make('button_sort'),
		);
	}
	
	/**
	 * @return User
	 */
	public function getUser() { return $this->getValue('button_user'); }
	public function getUserID() { return $this->getVar('button_user'); }
	
	/**
	 * @return BUZ_Sample
	 */
	public function getSample() { return $this->getValue('button_sample'); }
	public function getSampleID() { return $this->getVar('button_sample'); }
	
	/**
	 * @param GDO_User $user
	 * @return BUZ_Button[]
	 */
	public static function forUser(GDO_User $user)
	{
		return self::table()->select()->where("button_user={$user->getID()}")->exec()->fetchAllObjects();
	}
	
}
