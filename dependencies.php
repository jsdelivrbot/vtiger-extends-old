<?php
/**
 *
 */

use Pimple\Container;

$container = new Container();

$container['module Contacts'] = function ($c) {
    require_once __DIR__.'/modules/Contacts.php';
    return new VtigerExtends\Modules\Contacts();
};

