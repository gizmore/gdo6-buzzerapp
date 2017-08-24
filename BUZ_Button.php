<?php
namespace GDO\Buzzerapp;

use GDO\DB\GDO;
use GDO\DB\GDO_AutoInc;
use GDO\DB\GDO_CreatedBy;
use GDO\DB\GDO_Object;
use GDO\Table\GDO_Sort;
use GDO\UI\GDO_Color;
use GDO\User\User;

final class BUZ_Button extends GDO
{
	public function gdoColumns()
	{
		return array(
			GDO_AutoInc::make('button_id'),
			GDO_CreatedBy::make('button_user')->notNull(),
			GDO_Object::make('button_sample')->table(BUZ_Sample::table())->notNull(),
			GDO_Color::make('button_color'),
			GDO_Sort::make('button_sort'),
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
	 * @param User $user
	 * @return BUZ_Button[]
	 */
	public static function forUser(User $user)
	{
		return self::table()->select()->where("button_user={$user->getID()}")->exec()->fetchAllObjects();
	}
	
}
