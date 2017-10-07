<?php
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;

$bar = GDT_Bar::make();
$bar->addFields(array(
	GDT_Link::make('link_buzz_upload_sample')->href(href('Buzzerapp', 'AddSample'))->icon('upload'),
));
echo $bar->render();
