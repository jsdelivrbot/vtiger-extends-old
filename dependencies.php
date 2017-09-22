<?php
/**
 *
 */

use Pimple\Container;

$c = new Container();

$c['module Contacts'] = function ($c) {
    require_once __DIR__.'/modules/Contacts.php';
    return new VtigerExtends\Modules\Contacts();
};


