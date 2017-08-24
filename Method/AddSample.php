<?php
namespace GDO\Buzzerapp\Method;

use GDO\Audio\GDO_AudioIcon;
use GDO\Buzzerapp\BUZ_Button;
use GDO\Buzzerapp\BUZ_Sample;
use GDO\Buzzerapp\Module_Buzzerapp;
use GDO\Form\GDO_AntiCSRF;
use GDO\Form\GDO_Form;
use GDO\Form\GDO_Submit;
use GDO\Form\MethodForm;

final class AddSample extends MethodForm
{
	public function execute()
	{
		$response = parent::execute();
		$tabs = Module_Buzzerapp::instance()->onRenderTabs();
		return $tabs->add($response);
	}
	
	public function createForm(GDO_Form $form)
	{
		$gdo = BUZ_Sample::table();
		$form->addFields(array(
			$gdo->gdoColumn('sample_file'),
			GDO_Submit::make(),
			GDO_AntiCSRF::make(),
		));
	}
	
	public function formValidated(GDO_Form $form)
	{
		$sample = BUZ_Sample::blank($form->getFormData())->insert();
		$button = BUZ_Button::blank()->setVar('button_sample', $sample->getID())->insert();
		GDO_AudioIcon::make()->file($button->getSample()->getFile())->generatePNG();
		return $this->message('msg_buzz_uploaded');
	}
}
