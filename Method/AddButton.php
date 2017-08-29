<?php
namespace GDO\Buzzerapp\Method;

use GDO\Buzzerapp\BUZ_Button;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Form;
use GDO\Form\GDT_Submit;
use GDO\Form\MethodForm;

final class AddButton extends MethodForm
{
	public function createForm(GDT_Form $form)
	{
		$gdo = BUZ_Button::table();
		$form->addFields(array(
			$gdo->gdoColumn('button_sample'),
			GDT_Submit::make(),
			GDT_AntiCSRF::make(),
		));
	}
}
