<?php
use GDO\Template\GDT_Bar;
use GDO\UI\GDT_Link;
$navbar instanceof GDT_Bar;
$navbar->addField(GDT_Link::make('link_buzz')->href(href('Buzzerapp', 'Home')));
