<?php
use GDO\Template\GDO_Bar;
use GDO\UI\GDO_Link;

$bar = GDO_Bar::make();
$bar->addFields(array(
	GDO_Link::make('link_buzz_upload_sample')->href(href('Buzzerapp', 'AddSample'))->icon('upload'),
));
echo $bar->render();
