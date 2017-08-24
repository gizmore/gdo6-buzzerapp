<?php
use GDO\Buzzerapp\BUZ_Button;
use GDO\Buzzerapp\Module_Buzzerapp;
use GDO\User\User;

$user = User::current();
$module = Module_Buzzerapp::instance();
$buttons = BUZ_Button::forUser($user);
$json = array(
	'buttons' => GDO_JSON::make()->convertJSON($buttons),
);

echo $module->onRenderTabs();
?>
<div
 ng-controller="BUZCtrl"
 ng-keydown="onKeyDown($event)"
 ng-init='initJSON(<?= json_encode($json); ?>)'>
 <div
 flex
 layout="row"
 layout-wrap
 layout-fill
  ng-controller="GWFSortCtrl"
  ng-init='initJSON({url:"<?= jxhref('Buzzerapp', 'SortButton'); ?>", selector:"a.buzz-img-btn"})'>
   <a
 flex="45"
    gdo-id="{{button.button_id}}"
    class="md-button buzz-img-btn a"
    ng-repeat="button in data.buttons"
    ng-click="play(button)">
     <img class="" ng-src="{{imageUrlForButton(button)}}" />
     <b>{{button.button_id}}</b>
   </a>
   <div ng-click="addButton">+</div>
 </div>
  
</div>
