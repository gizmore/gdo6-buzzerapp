<?php
namespace GDO\Buzzerapp\Method;

use GDO\Buzzerapp\BUZ_Button;
use GDO\Form\GDO_AntiCSRF;
use GDO\Form\GDO_Form;
use GDO\Form\GDO_Submit;
use GDO\Form\MethodForm;

final class AddButton extends MethodForm
{
	public function createForm(GDO_Form $form)
	{
		$gdo = BUZ_Button::table();
		$form->addFields(array(
			$gdo->gdoColumn('button_sample'),
			GDO_Submit::make(),
			GDO_AntiCSRF::make(),
		));
	}
}
