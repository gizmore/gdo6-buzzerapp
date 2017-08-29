<?php
namespace GDO\Buzzerapp\Method;

use GDO\Core\Method;
use GDO\User\GDO_User;

final class Home extends Method
{
	public function execute()
	{
		if (GDO_User::current()->isAuthenticated())
		{
			return $this->templatePHP('home.php');
		}
		else
		{
			return $this->templatePHP('about.php');
		}
	}
	
	
}