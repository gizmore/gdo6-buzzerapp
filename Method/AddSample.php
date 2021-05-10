<?php
namespace GDO\Buzzerapp\Method;

use GDO\Audio\GDT_AudioIcon;
use GDO\Buzzerapp\BUZ_Button;
use GDO\Buzzerapp\BUZ_Sample;
use GDO\Buzzerapp\Module_Buzzerapp;
use GDO\Form\GDT_AntiCSRF;
use GDO\Form\GDT_Form;
use GDO\Form\GDT_Submit;
use GDO\Form\MethodForm;

final class AddSample extends MethodForm
{
	public function execute()
	{
		$response = parent::execute();
		$tabs = Module_Buzzerapp::instance()->onRenderTabs();
		return $tabs->addField($response);
	}
	
	public function createForm(GDT_Form $form)
	{
		$gdo = BUZ_Sample::table();
		$form->addFields(array(
			$gdo->gdoColumn('sample_file'),
			GDT_AntiCSRF::make(),
		));
		$form->actions()->addField(GDT_Submit::make());
	}
	
	public function formValidated(GDT_Form $form)
	{
		$sample = BUZ_Sample::blank($form->getFormData())->insert();
		$button = BUZ_Button::blank()->setVar('button_sample', $sample->getID())->insert();
		GDT_AudioIcon::make()->file($button->getSample()->getFile())->generatePNG();
		return $this->message('msg_buzz_uploaded');
	}
}
